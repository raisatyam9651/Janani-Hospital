"""Probes which routes the live SPA actually renders content for."""
import os

from playwright.sync_api import sync_playwright

CHROME = os.path.expandvars(r"%LOCALAPPDATA%\ms-playwright\chromium-1234\chrome-win64\chrome.exe")
LIVE = "https://jananihospitals.com"

ROUTES = [
    "/", "/about", "/contact", "/appointment", "/book-appointment", "/privacy",
    "/gallery", "/health-packages", "/book-lab-test", "/thank-you", "/blogs",
    "/careers", "/doctors", "/doctor/1", "/patient-info", "/appointment-confirmed",
    "/terms",
    "/department/ivf", "/department/pediatrics", "/department/obg",
    "/department/medicine", "/department/surgery", "/department/ortho",
    "/department/urology", "/department/laparoscopy", "/department/neonatology",
    "/department/critical-care", "/department/anc", "/department/pain-clinic",
    "/department/infertility", "/department/endoscopy", "/department/hysteroscopy",
]

with sync_playwright() as p:
    b = p.chromium.launch(executable_path=CHROME)
    pg = b.new_page(viewport={"width": 1440, "height": 900})
    print(f"{'route':<32}{'status':>7}{'mainH':>8}{'chars':>8}  first heading")
    for route in ROUTES:
        try:
            resp = pg.goto(LIVE + route, wait_until="load", timeout=90000)
            pg.wait_for_timeout(2600)
            info = pg.evaluate("""() => {
              const m = document.querySelector('main');
              const h = document.querySelector('main h1, main h2');
              return {
                mainH: m ? Math.round(m.getBoundingClientRect().height) : -1,
                chars: m ? m.innerText.trim().length : 0,
                head: h ? h.innerText.replace(/\\s+/g,' ').trim().slice(0, 44) : '',
              };
            }""")
            print(f"{route:<32}{resp.status:>7}{info['mainH']:>8}{info['chars']:>8}  {info['head']}")
        except Exception as exc:  # noqa: BLE001
            print(f"{route:<32}  ERROR  {str(exc)[:60]}")
    pg.close()
    b.close()
