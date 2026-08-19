"""Exhaustive live-vs-static audit: every live page at three widths, in parallel.

usage: python tools/audit-live.py [--widths 390,768,1440] [--only substr]
Writes screenshots to tools/_audit/ and prints a compact report.
"""
import asyncio
import os
import sys

import numpy as np
from PIL import Image
from playwright.async_api import async_playwright

CHROME = os.path.expandvars(r"%LOCALAPPDATA%\ms-playwright\chromium-1234\chrome-win64\chrome.exe")
LIVE = "https://jananihospitals.com"
STATIC = "http://localhost:8899"
OUT = "tools/_audit"
# Full-page screenshots resize the viewport internally; two pages doing that
# at once in the same browser produces offset/stitched captures.
CONCURRENCY = 1

PAGES = [
    ("/", "/index.html"),
    ("/about", "/pages/about.html"),
    ("/contact", "/pages/contact.html"),
    ("/appointment", "/pages/contact.html"),
    ("/health-packages", "/pages/health-packages.html"),
    ("/book-lab-test", "/pages/book-lab-test.html"),
    ("/thank-you", "/pages/thank-you.html"),
] + [(f"/department/{d}", f"/pages/department-{d}.html") for d in (
    "ivf", "pediatrics", "obg", "medicine", "surgery", "ortho", "urology",
    "laparoscopy", "neonatology", "critical-care", "anc", "pain-clinic",
    "infertility", "endoscopy", "hysteroscopy")]

widths = [390, 768, 1440]
only = None
for arg in sys.argv[1:]:
    if arg.startswith("--widths"):
        widths = [int(w) for w in arg.split("=", 1)[1].split(",")]
    elif arg.startswith("--only"):
        only = arg.split("=", 1)[1]
if only:
    PAGES = [p for p in PAGES if only in p[0]]

os.makedirs(OUT, exist_ok=True)

SCROLL = """async () => {
  const step = window.innerHeight * 0.6;
  for (let y = 0; y < document.body.scrollHeight; y += step) {
    window.scrollTo(0, y);
    await new Promise(r => setTimeout(r, 220));
  }
  window.scrollTo(0, document.body.scrollHeight);
  await new Promise(r => setTimeout(r, 700));
  window.scrollTo(0, 0);
  await new Promise(r => setTimeout(r, 350));
}"""

SETTLED = """async () => {
  await document.fonts.ready;
  await Promise.all([...document.images].map(img => img.complete
    ? (img.decode ? img.decode().catch(() => {}) : null)
    : new Promise(res => { img.onload = img.onerror = res; })));
  await new Promise(r => requestAnimationFrame(() => requestAnimationFrame(r)));
}"""

FREEZE = """*, *::before, *::after {
  animation: none !important;
  transition: none !important;
}
section > img { transform: none !important; }"""


async def shoot(ctx, url, path, width):
    pg = await ctx.new_page()
    await pg.set_viewport_size({"width": width, "height": 900})
    await pg.add_init_script("window.setInterval=function(){return 0;};")
    await pg.goto(url, wait_until="load", timeout=120000)
    await pg.wait_for_timeout(2600)
    await pg.evaluate(SCROLL)
    await pg.wait_for_timeout(900)
    # Both sides pull the same remote photos; screenshotting before they have
    # all decoded produces enormous false diffs.
    await pg.evaluate(SETTLED)
    await pg.wait_for_timeout(400)
    await pg.add_style_tag(content=FREEZE)
    await pg.evaluate("() => document.querySelectorAll('section img').forEach(e => e.style.transform='none')")
    # Must be parked at the very top: a fixed navbar plus a non-zero scroll
    # offset makes the stitched full-page capture come out shifted.
    for _ in range(5):
        await pg.evaluate("window.scrollTo(0, 0)")
        await pg.wait_for_timeout(200)
        if await pg.evaluate("window.scrollY") == 0:
            break
    await pg.wait_for_timeout(250)
    await pg.screenshot(path=path, full_page=True)
    await pg.close()


def diff(fa, fb):
    a = np.asarray(Image.open(fa).convert("RGB"), dtype=np.int16)
    s = np.asarray(Image.open(fb).convert("RGB"), dtype=np.int16)
    ha, hs = a.shape[0], s.shape[0]
    h = min(ha, hs)
    d = np.abs(a[:h] - s[:h]).max(axis=2) > 40
    rows = np.where(d.sum(axis=1) > 3)[0]
    regions = []
    if len(rows):
        st = prev = rows[0]
        for y in rows[1:]:
            if y - prev > 15:
                regions.append((int(st), int(prev)))
                st = y
            prev = y
        regions.append((int(st), int(prev)))
    return ha, hs, 100.0 * d.sum() / d.size, len(rows), regions


async def main():
    results = []
    sem = asyncio.Semaphore(CONCURRENCY)
    async with async_playwright() as p:
        browser = await p.chromium.launch(executable_path=CHROME)
        ctx = await browser.new_context()

        async def job(lpath, spath, w):
            name = (spath.strip("/").replace("/", "_").replace(".html", "") or "index")
            fa, fb = f"{OUT}/{name}-{w}-live.png", f"{OUT}/{name}-{w}-static.png"
            async with sem:
                try:
                    await shoot(ctx, LIVE + lpath, fa, w)
                    await shoot(ctx, STATIC + spath, fb, w)
                except Exception as exc:  # noqa: BLE001
                    results.append((lpath, w, None, None, None, None, str(exc)[:50]))
                    return
            ha, hs, pct, nrows, regions = diff(fa, fb)
            results.append((lpath, w, ha, hs, pct, nrows, regions))

        await asyncio.gather(*[job(l, s, w) for l, s in PAGES for w in widths])
        await browser.close()

    results.sort(key=lambda r: (r[0], r[1]))
    print(f"{'page':<30}{'w':>6}{'live_h':>8}{'static_h':>9}{'diff%':>9}{'rows':>6}  regions")
    worst = 0.0
    mismatch = 0
    for lpath, w, ha, hs, pct, nrows, regions in results:
        if ha is None:
            print(f"{lpath:<30}{w:>6}   ERROR  {regions}")
            mismatch += 1
            continue
        flag = "" if ha == hs else f"  <-- HEIGHT {hs - ha:+d}"
        if ha != hs:
            mismatch += 1
        worst = max(worst, pct)
        r = str(regions[:3]) if regions else ""
        print(f"{lpath:<30}{w:>6}{ha:>8}{hs:>9}{pct:>8.4f}%{nrows:>6}  {r}{flag}")
    print(f"\n{len(results)} comparisons | worst diff {worst:.4f}% | height mismatches: {mismatch}")


asyncio.run(main())
