"""Pixel-compares the generated pages against the LIVE production site.

usage: python tools/compare-live.py <live-path>=<static-path> [...] [--widths 390,1440]
"""
import os
import sys

import numpy as np
from PIL import Image
from playwright.sync_api import sync_playwright

CHROME = os.path.expandvars(r"%LOCALAPPDATA%\ms-playwright\chromium-1234\chrome-win64\chrome.exe")
LIVE = "https://jananihospitals.com"
STATIC = "http://localhost:8899"
SHOT = "tools/_live"

pairs, widths = [], [1440]
for arg in sys.argv[1:]:
    if arg.startswith("--widths"):
        widths = [int(w) for w in arg.split("=", 1)[1].split(",")]
    else:
        pairs.append(arg.split("=", 1))

os.makedirs(SHOT, exist_ok=True)

SCROLL = """async () => {
  const step = window.innerHeight * 0.5;
  for (let y = 0; y < document.body.scrollHeight; y += step) {
    window.scrollTo(0, y);
    await new Promise(r => setTimeout(r, 260));
  }
  window.scrollTo(0, document.body.scrollHeight);
  await new Promise(r => setTimeout(r, 900));
  window.scrollTo(0, 0);
  await new Promise(r => setTimeout(r, 400));
}"""

FREEZE = """*, *::before, *::after {
  animation: none !important;
  transition: none !important;
}
section > img { transform: none !important; }"""


def capture(pg, url, out):
    pg.goto(url, wait_until="load", timeout=120000)
    pg.wait_for_timeout(3000)
    pg.evaluate(SCROLL)
    pg.wait_for_timeout(1500)
    pg.add_style_tag(content=FREEZE)
    pg.evaluate("() => document.querySelectorAll('section img').forEach(e => { e.style.transform = 'none'; })")
    pg.wait_for_timeout(300)
    pg.screenshot(path=out, full_page=True)


rows = []
with sync_playwright() as p:
    b = p.chromium.launch(executable_path=CHROME)
    for lpath, spath in pairs:
        name = (spath.strip("/").replace("/", "_").replace(".html", "") or "index")
        for w in widths:
            shots = {}
            for tag, base, path in (("live", LIVE, lpath), ("static", STATIC, spath)):
                pg = b.new_page(viewport={"width": w, "height": 900})
                pg.add_init_script("window.setInterval=function(){return 0;};")
                f = f"{SHOT}/{name}-{w}-{tag}.png"
                capture(pg, base + path, f)
                pg.close()
                shots[tag] = f
            a = np.asarray(Image.open(shots["live"]).convert("RGB"), dtype=np.int16)
            s = np.asarray(Image.open(shots["static"]).convert("RGB"), dtype=np.int16)
            ha, hs = a.shape[0], s.shape[0]
            h = min(ha, hs)
            d = np.abs(a[:h] - s[:h]).max(axis=2)
            strong = d > 40
            bad = np.where(strong.sum(axis=1) > 3)[0]
            regions = []
            if len(bad):
                st = prev = bad[0]
                for y in bad[1:]:
                    if y - prev > 15:
                        regions.append((int(st), int(prev)))
                        st = y
                    prev = y
                regions.append((int(st), int(prev)))
            rows.append((lpath, w, ha, hs, 100.0 * strong.sum() / strong.size, len(bad), regions[:4]))
    b.close()

print(f"{'page':<34}{'w':>6}{'live_h':>9}{'static_h':>9}{'diff%':>9}{'rows':>7}  regions")
for lpath, w, ha, hs, pct, nrows, regions in rows:
    flag = "" if ha == hs else f"  <-- HEIGHT {hs - ha:+d}"
    print(f"{lpath:<34}{w:>6}{ha:>9}{hs:>9}{pct:>8.4f}%{nrows:>7}  {regions if regions else ''}{flag}")
