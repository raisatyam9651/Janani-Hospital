"""Content-level cross-check: every route in the live bundle vs the static build.

Compares headings, section counts, image counts and visible text so a missing
section shows up even where a pixel diff would not reach.
"""
import os
import re
import sys

from playwright.sync_api import sync_playwright

CHROME = os.path.expandvars(r"%LOCALAPPDATA%\ms-playwright\chromium-1234\chrome-win64\chrome.exe")
LIVE = "https://jananihospitals.com"
STATIC = "http://localhost:8899"

# Routes declared in the deployed bundle (assets/index-*.js -> path:"...")
ROUTES = [
    ("/", "/index.html"),
    ("/about", "/pages/about.html"),
    ("/appointment", "/pages/contact.html"),
    ("/contact", "/pages/contact.html"),
    ("/book-lab-test", "/pages/book-lab-test.html"),
    ("/gallery", "/pages/gallery.html"),
    ("/health-packages", "/pages/health-packages.html"),
    ("/thank-you", "/pages/thank-you.html"),
] + [(f"/department/{d}", f"/pages/department-{d}.html") for d in (
    "ivf", "pediatrics", "obg", "medicine", "surgery", "ortho", "urology",
    "laparoscopy", "neonatology", "critical-care", "anc", "pain-clinic",
    "infertility", "endoscopy", "hysteroscopy")]

PROBE = """() => {
  const norm = t => (t || '').replace(/\\s+/g, ' ').trim();
  const vis = el => {
    const r = el.getBoundingClientRect();
    return (r.width > 0 && r.height > 0) || el.offsetParent !== null;
  };
  return {
    headings: [...document.querySelectorAll('h1,h2,h3,h4')].filter(vis).map(h => norm(h.innerText)).filter(Boolean),
    sections: document.querySelectorAll('section').length,
    images: [...document.images].filter(vis).length,
    brokenImages: [...document.images].filter(i => i.complete && i.naturalWidth === 0).length,
    links: document.querySelectorAll('a[href]').length,
    textLen: norm(document.body.innerText).length,
    height: document.body.scrollHeight,
    crashed: !document.querySelector('nav') || !document.querySelector('footer'),
  };
}"""

SCROLL = """async () => {
  const step = window.innerHeight * 0.6;
  for (let y = 0; y < document.body.scrollHeight; y += step) {
    window.scrollTo(0, y); await new Promise(r => setTimeout(r, 200));
  }
  window.scrollTo(0, 0); await new Promise(r => setTimeout(r, 300));
}"""


def grab(browser, url):
    pg = browser.new_page(viewport={"width": 1440, "height": 900})
    errs = []
    pg.on("pageerror", lambda e: errs.append(str(e)[:90]))
    try:
        pg.goto(url, wait_until="load", timeout=90000)
        pg.wait_for_timeout(3000)
        pg.evaluate(SCROLL)
        pg.wait_for_timeout(600)
        data = pg.evaluate(PROBE)
    except Exception as exc:  # noqa: BLE001
        data = {"error": str(exc)[:80]}
    data["jsErrors"] = errs
    pg.close()
    return data


problems = []
with sync_playwright() as p:
    browser = p.chromium.launch(executable_path=CHROME)
    print(f"{'route':<30}{'sections':>9}{'headings':>10}{'images':>8}{'text':>8}   status")
    for lpath, spath in ROUTES:
        a = grab(browser, LIVE + lpath)
        b = grab(browser, STATIC + spath)

        if a.get("crashed"):
            print(f"{lpath:<30}{'':>9}{'':>10}{'':>8}{'':>8}   LIVE PAGE CRASHES: {a['jsErrors'][:1]}")
            problems.append((lpath, "live page crashes", a["jsErrors"][:1]))
            continue

        missing = [h for h in a["headings"] if h not in b["headings"]]
        extra = [h for h in b["headings"] if h not in a["headings"]]
        dsec = b["sections"] - a["sections"]
        dimg = b["images"] - a["images"]
        dtext = b["textLen"] - a["textLen"]

        bits = []
        if missing:
            bits.append(f"MISSING HEADINGS {missing[:3]}")
        if extra:
            bits.append(f"EXTRA HEADINGS {extra[:3]}")
        if dsec:
            bits.append(f"sections {dsec:+d}")
        if dimg:
            bits.append(f"images {dimg:+d}")
        if abs(dtext) > 5:
            bits.append(f"text {dtext:+d} chars")
        if b["brokenImages"]:
            bits.append(f"{b['brokenImages']} BROKEN IMG")
        if b["jsErrors"]:
            bits.append(f"JS {b['jsErrors'][:1]}")

        status = "ok" if not bits else "  ".join(bits)
        if bits:
            problems.append((lpath, status, None))
        print(f"{lpath:<30}{a['sections']:>9}{len(a['headings']):>10}"
              f"{a['images']:>8}{a['textLen']:>8}   {status}")
    browser.close()

print()
if problems:
    print(f"{len(problems)} route(s) need attention:")
    for r, s, extra in problems:
        print(f"  {r}: {s}" + (f" {extra}" if extra else ""))
else:
    print("Every live route matches: same sections, same headings, same images, same text.")
sys.exit(0)
