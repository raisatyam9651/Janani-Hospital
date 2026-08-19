"""Dumps the rendered DOM of live pages so the static build can be matched to it.

usage: python tools/dump-live.py <path> [<path> ...]
Writes tools/_live/dom/<name>.html
"""
import os
import re
import sys

from playwright.sync_api import sync_playwright

CHROME = os.path.expandvars(r"%LOCALAPPDATA%\ms-playwright\chromium-1234\chrome-win64\chrome.exe")
LIVE = "https://jananihospitals.com"
OUT = "tools/_live/dom"
os.makedirs(OUT, exist_ok=True)

paths = sys.argv[1:] or ["/"]

SCROLL = """async () => {
  const step = window.innerHeight * 0.6;
  for (let y = 0; y < document.body.scrollHeight; y += step) {
    window.scrollTo(0, y);
    await new Promise(r => setTimeout(r, 200));
  }
  window.scrollTo(0, 0);
  await new Promise(r => setTimeout(r, 400));
}"""

with sync_playwright() as p:
    b = p.chromium.launch(executable_path=CHROME)
    for path in paths:
        pg = b.new_page(viewport={"width": 1440, "height": 900})
        pg.goto(LIVE + path, wait_until="load", timeout=120000)
        pg.wait_for_timeout(3500)
        pg.evaluate(SCROLL)
        pg.wait_for_timeout(800)
        html = pg.evaluate("document.getElementById('root').innerHTML")
        name = (path.strip("/").replace("/", "_") or "index")
        # light pretty-print so diffs are readable
        html = re.sub(r"><", ">\n<", html)
        with open(f"{OUT}/{name}.html", "w", encoding="utf-8") as fh:
            fh.write(html)
        links = pg.evaluate(
            "[...new Set([...document.querySelectorAll('a[href^=\"/\"]')].map(a => a.getAttribute('href')))].sort()")
        print(f"{path:32} {len(html):>8} chars   links: {links}")
        pg.close()
    b.close()
