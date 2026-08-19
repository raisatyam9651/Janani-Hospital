"""Captures the live navbar's interactive states: mega menu, mobile menu, scrolled nav."""
import os
import re

from playwright.sync_api import sync_playwright

CHROME = os.path.expandvars(r"%LOCALAPPDATA%\ms-playwright\chromium-1234\chrome-win64\chrome.exe")
LIVE = "https://jananihospitals.com"
OUT = "tools/_live/dom"
os.makedirs(OUT, exist_ok=True)

tidy = lambda h: re.sub(r"\n+", "\n", re.sub(r"><", ">\n<", re.sub(r"<svg[^>]*>[\s\S]*?</svg>", "[svg]", h)))

with sync_playwright() as p:
    b = p.chromium.launch(executable_path=CHROME)

    # --- desktop mega menu -------------------------------------------------
    pg = b.new_page(viewport={"width": 1440, "height": 900})
    pg.goto(LIVE + "/", wait_until="load", timeout=120000)
    pg.wait_for_timeout(3500)
    pg.locator("nav button:has-text('Departments')").hover()
    pg.wait_for_timeout(700)
    panel = pg.evaluate("""() => {
      const d = document.querySelector('nav .relative > div.absolute') ||
                document.querySelector('nav div[class*="w-["]');
      return d ? d.outerHTML : 'NOT FOUND';
    }""")
    open(f"{OUT}/nav-megamenu.html", "w", encoding="utf-8").write(tidy(panel))
    print("mega menu:", len(panel), "chars")
    pg.screenshot(path="tools/_live/megamenu.png", clip={"x": 0, "y": 0, "width": 1440, "height": 620})

    # --- scrolled navbar ---------------------------------------------------
    pg.evaluate("window.scrollTo(0, 400)")
    pg.wait_for_timeout(900)
    nav = pg.evaluate("document.querySelector('nav').getAttribute('class')")
    print("scrolled nav class:", nav)
    pg.close()

    # --- mobile menu -------------------------------------------------------
    pg = b.new_page(viewport={"width": 390, "height": 844})
    pg.goto(LIVE + "/", wait_until="load", timeout=120000)
    pg.wait_for_timeout(3500)
    pg.locator("nav button").last.click()
    pg.wait_for_timeout(700)
    mob = pg.evaluate("""() => {
      const d = document.querySelector('nav div[class*="xl:hidden"][class*="absolute"]');
      return d ? d.outerHTML : 'NOT FOUND';
    }""")
    open(f"{OUT}/nav-mobile.html", "w", encoding="utf-8").write(tidy(mob))
    print("mobile menu:", len(mob), "chars")
    pg.screenshot(path="tools/_live/mobilemenu.png", full_page=False)
    pg.close()
    b.close()
