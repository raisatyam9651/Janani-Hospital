"""Loads every generated page and reports console errors, failed requests and overflow."""
import glob
import os

from playwright.sync_api import sync_playwright

CHROME = os.path.expandvars(r"%LOCALAPPDATA%\ms-playwright\chromium-1234\chrome-win64\chrome.exe")
BASE = "http://localhost:8899"

pages = ["/index.html"] + sorted(
    "/pages/" + os.path.basename(p) for p in glob.glob("website/pages/*.html")
)

bad = 0
with sync_playwright() as p:
    b = p.chromium.launch(executable_path=CHROME)
    for width in (390, 1440):
        print(f"--- viewport {width} ---")
        for path in pages:
            errs, failed = [], []
            pg = b.new_page(viewport={"width": width, "height": 900})
            pg.on("console", lambda m: errs.append(m.text) if m.type == "error" else None)
            pg.on("pageerror", lambda e: errs.append("pageerror: " + str(e)))
            pg.on("requestfailed",
                  lambda r: failed.append(r.url) if r.url.startswith(BASE) else None)
            pg.goto(BASE + path, wait_until="load", timeout=60000)
            pg.wait_for_timeout(1200)
            overflow = pg.evaluate(
                "document.documentElement.scrollWidth > document.documentElement.clientWidth + 1")
            # Only icons that are actually on screen; collapsed menus are display:none.
            icons = pg.evaluate(
                "[...document.querySelectorAll('svg.icon')]"
                ".filter(s => s.checkVisibility && s.checkVisibility() && !s.getBoundingClientRect().width).length")
            problems = []
            if errs:
                problems.append(f"console={errs[:2]}")
            if failed:
                problems.append(f"failed={[u.replace(BASE, '') for u in failed[:3]]}")
            if overflow:
                problems.append("H-OVERFLOW")
            if icons:
                problems.append(f"{icons} zero-size icons")
            if problems:
                bad += 1
                print(f"  {path:42} {'; '.join(problems)}")
            pg.close()
    b.close()

print(f"\n{len(pages)} pages x 2 viewports - {'ALL CLEAN' if not bad else str(bad) + ' with problems'}")
