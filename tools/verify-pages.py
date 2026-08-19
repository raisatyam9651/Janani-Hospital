"""Behavioural checks for the converted inner pages."""
import os

from playwright.sync_api import sync_playwright

CHROME = os.path.expandvars(r"%LOCALAPPDATA%\ms-playwright\chromium-1234\chrome-win64\chrome.exe")
BASE = "http://localhost:8899"
fails = []
console_errors = {}


def check(label, cond):
    if not cond:
        fails.append(label)
    print(f"  {'PASS' if cond else '**FAIL**':10} {label}")


with sync_playwright() as p:
    b = p.chromium.launch(executable_path=CHROME)

    def open_page(path, width=1440):
        pg = b.new_page(viewport={"width": width, "height": 900})
        errs = []
        pg.on("console", lambda m: errs.append(m.text) if m.type == "error" else None)
        pg.on("pageerror", lambda e: errs.append(str(e)))
        pg.goto(BASE + path, wait_until="load", timeout=60000)
        pg.wait_for_timeout(1500)
        console_errors[path] = errs
        return pg

    # ---------------------------------------------------------------- gallery
    print("GALLERY")
    pg = open_page("/pages/gallery.html")
    check("8 items rendered", pg.locator("[data-gallery-item]").count() == 8)
    check("all visible under the All filter",
          pg.locator("[data-gallery-item]:not([hidden])").count() == 8)
    pg.locator("[data-gallery-filter=Team]").click()
    pg.wait_for_timeout(300)
    check("Team filter narrows to 1", pg.locator("[data-gallery-item]:not([hidden])").count() == 1)
    check("filter button marked active",
          pg.locator("[data-gallery-filter=Team]").evaluate("e=>e.classList.contains('is-active')"))
    pg.locator("[data-gallery-filter=All]").click()
    pg.wait_for_timeout(300)
    check("All restores every item", pg.locator("[data-gallery-item]:not([hidden])").count() == 8)
    check("lightbox closed initially", not pg.locator("[data-lightbox]").is_visible())
    pg.locator("[data-gallery-item]").first.click()
    pg.wait_for_timeout(400)
    check("clicking an item opens the lightbox", pg.locator("[data-lightbox]").is_visible())
    check("lightbox shows the image", pg.locator("[data-lightbox-stage] img").count() == 1)
    check("caption filled",
          pg.locator("[data-lightbox-title]").inner_text() == "Hospital Entrance")
    pg.keyboard.press("Escape")
    pg.wait_for_timeout(300)
    check("Escape closes the lightbox", not pg.locator("[data-lightbox]").is_visible())
    pg.locator("[data-gallery-item][data-type=video]").click()
    pg.wait_for_timeout(400)
    check("video item opens a <video>", pg.locator("[data-lightbox-stage] video").count() == 1)
    pg.locator("[data-lightbox-close]").click()
    pg.wait_for_timeout(300)
    check("close button dismisses the lightbox", not pg.locator("[data-lightbox]").is_visible())
    pg.close()

    # ---------------------------------------------------------------- doctors
    print("OUR DOCTORS")
    pg = open_page("/pages/doctors.html")
    check("4 doctors listed", pg.locator("[data-doctor]").count() == 4)
    pg.locator("[data-doctor-search]").fill("priya")
    pg.wait_for_timeout(300)
    check("search by name filters to 1",
          pg.locator("[data-doctor]:not([hidden])").count() == 1)
    pg.locator("[data-doctor-search]").fill("surgeon")
    pg.wait_for_timeout(300)
    check("search by specialty works",
          pg.locator("[data-doctor]:not([hidden])").count() == 1)
    pg.locator("[data-doctor-search]").fill("zzz")
    pg.wait_for_timeout(300)
    check("no matches shows the empty state", pg.locator("[data-doctors-empty]").is_visible())
    pg.locator("[data-doctor-search]").fill("")
    pg.wait_for_timeout(300)
    pg.locator("[data-doctor-dept=OBG]").click()
    pg.wait_for_timeout(300)
    check("department filter narrows to 1",
          pg.locator("[data-doctor]:not([hidden])").count() == 1)
    check("department button marked active",
          pg.locator("[data-doctor-dept=OBG]").evaluate("e=>e.classList.contains('is-active')"))
    pg.locator("[data-doctor-dept=All]").click()
    pg.wait_for_timeout(300)
    check("All restores every doctor", pg.locator("[data-doctor]:not([hidden])").count() == 4)
    check("profile link points at the right page",
          pg.locator(".doctor-card__view").first.get_attribute("href").endswith("doctor-1.html"))
    pg.close()

    # ------------------------------------------------------- patient info FAQ
    print("PATIENT INFORMATION")
    pg = open_page("/pages/patient-information.html")
    items = pg.locator("[data-accordion-item]")
    check("4 FAQ entries", items.count() == 4)
    check("all closed initially", pg.locator("[data-accordion-item].is-open").count() == 0)
    items.nth(1).locator("[data-accordion-trigger]").click()
    pg.wait_for_timeout(300)
    check("clicking opens one", items.nth(1).evaluate("e=>e.classList.contains('is-open')"))
    check("minus icon replaces plus",
          items.nth(1).locator(".info-faq__minus").is_visible()
          and not items.nth(1).locator(".info-faq__plus").is_visible())
    items.nth(3).locator("[data-accordion-trigger]").click()
    pg.wait_for_timeout(300)
    check("opening another closes the first",
          pg.locator("[data-accordion-item].is-open").count() == 1)
    items.nth(3).locator("[data-accordion-trigger]").click()
    pg.wait_for_timeout(300)
    check("clicking again closes it", pg.locator("[data-accordion-item].is-open").count() == 0)
    pg.close()

    # --------------------------------------------------------- health packages
    print("HEALTH PACKAGES")
    pg = open_page("/pages/health-packages.html")
    check("8 packages listed", pg.locator("[data-package]").count() == 8)
    check("booking panel hidden initially",
          not pg.locator("[data-package-booking]").is_visible())
    pg.locator("[data-package=women] [data-package-select]").click()
    pg.wait_for_timeout(300)
    check("selecting marks the card",
          pg.locator("[data-package=women]").evaluate("e=>e.classList.contains('is-selected')"))
    check("button label switches to Selected",
          pg.locator("[data-package=women] [data-package-label]").inner_text() == "Selected")
    check("booking panel revealed", pg.locator("[data-package-booking]").is_visible())
    check("booking panel names the package",
          pg.locator("[data-package-booking-name]").inner_text() == "Women Health Package")
    pg.locator("[data-package=senior] [data-package-select]").click()
    pg.wait_for_timeout(300)
    check("selecting another deselects the first",
          pg.locator("[data-package].is-selected").count() == 1
          and pg.locator("[data-package=women] [data-package-label]").inner_text() == "Select Package")
    pg.close()

    # ------------------------------------------------------- book appointment
    print("BOOK APPOINTMENT")
    pg = open_page("/pages/book-appointment.html")
    check("service options populated",
          pg.locator("#service option").count() == 9)  # placeholder + 8
    check("doctor options populated", pg.locator("#doctor option").count() == 5)
    check("time slots populated", pg.locator("#time option").count() == 11)
    pg.select_option("#service", "Pediatrics")
    pg.select_option("#doctor", "Dr. Ramesh Kumar")
    pg.fill("#date", "2026-09-01")
    pg.select_option("#time", "10:00 AM")
    pg.fill("#name", "Test Patient")
    pg.fill("#phone", "+91 90000 00000")
    pg.fill("#email", "test@example.com")
    pg.locator("[data-appointment-submit]").click()
    pg.wait_for_timeout(400)
    check("submitting shows the sending state",
          "Sending" in pg.locator("[data-appointment-label]").inner_text())
    pg.wait_for_url("**/thank-you.html", timeout=8000)
    check("redirects to the thank-you page", pg.url.endswith("thank-you.html"))
    pg.close()

    # ------------------------------------------------------- department page
    print("DEPARTMENT PAGE (IVF)")
    pg = open_page("/pages/department-ivf.html")
    faqs = pg.locator("[data-faq-item]")
    check("FAQ entries present", faqs.count() >= 3)
    check("all closed initially", pg.locator("[data-faq-item].is-open").count() == 0)
    faqs.first.locator("[data-faq-trigger]").click()
    pg.wait_for_timeout(300)
    check("clicking opens the answer",
          faqs.first.evaluate("e=>e.classList.contains('is-open')")
          and faqs.first.locator(".dept-faq__panel").is_visible())
    faqs.nth(1).locator("[data-faq-trigger]").click()
    pg.wait_for_timeout(300)
    check("only one open at a time", pg.locator("[data-faq-item].is-open").count() == 1)
    check("hero CTA points at the contact page (live behaviour)",
          pg.locator(".dept-hero__btn--primary").get_attribute("href").endswith("contact.html"))
    check("every booking CTA on the page resolves to contact.html",
          all(h.endswith("contact.html") for h in pg.eval_on_selector_all(
              ".dept-hero__btn--primary, .dept-rail__btn--primary, .dept-service__cta, .dept-cta__btn--primary",
              "els => els.map(e => e.getAttribute('href'))")))
    check("call link is a tel: URL",
          pg.locator(".dept-hero__btn--ghost").get_attribute("href").startswith("tel:"))
    pg.close()

    # ------------------------------------------------------------ lab test
    print("BOOK A LAB TEST")
    pg = open_page("/pages/book-lab-test.html")
    check("test options present", pg.locator("#test option").count() == 4)
    pg.fill("#name", "Test Patient")
    pg.fill("#email", "test@example.com")
    pg.once("dialog", lambda d: d.accept())
    pg.locator(".lab-submit").click()
    pg.wait_for_timeout(500)
    check("submit stays on the page (alert confirmation)", "book-lab-test" in pg.url)
    pg.close()

    # --------------------------------------------------- navbar on inner page
    print("NAVBAR ON INNER PAGES")
    pg = open_page("/pages/about.html")
    nav = pg.locator("[data-site-nav]")
    check("transparent at the top, as on the live site",
          not nav.evaluate("e=>e.classList.contains('is-solid')"))
    pg.evaluate("window.scrollTo(0,400)")
    pg.wait_for_timeout(700)
    check("turns solid once scrolled", nav.evaluate("e=>e.classList.contains('is-solid')"))
    pg.evaluate("window.scrollTo(0,0)")
    pg.wait_for_timeout(700)
    check("About link marked active",
          pg.locator(".nav-link[data-nav=about]").evaluate("e=>e.classList.contains('is-active')"))
    check("logo links back to the home page",
          pg.locator(".site-nav__logo").get_attribute("href").endswith("index.html"))
    pg.locator("[data-dropdown-trigger]").hover()
    pg.wait_for_timeout(300)
    check("mega menu opens", pg.locator(".nav-dropdown__panel").is_visible())
    check("mega menu Book Now points at the contact page",
          pg.locator(".nav-dropdown__cta").get_attribute("href").endswith("contact.html"))
    check("department links resolve relative to /pages/",
          pg.locator(".dept-tile").first.get_attribute("href") == "../pages/department-ivf.html")
    pg.close()

    b.close()

print()
bad = {k: v for k, v in console_errors.items() if v}
print("CONSOLE ERRORS:", bad if bad else "none")
print("RESULT:", "ALL CHECKS PASSED" if not fails and not bad else f"{len(fails)} FAILED -> {fails}")
