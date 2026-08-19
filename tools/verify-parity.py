"""Behavioural parity check for the converted Home page (temporary, not shipped)."""
import os
import re
from playwright.sync_api import sync_playwright

CHROME = os.path.expandvars(r"%LOCALAPPDATA%\ms-playwright\chromium-1234\chrome-win64\chrome.exe")
URL = "http://localhost:8899/index.html"
fails = []


def check(label, cond):
    if not cond:
        fails.append(label)
    print(f"  {'PASS' if cond else '**FAIL**':10} {label}")


with sync_playwright() as p:
    b = p.chromium.launch(executable_path=CHROME)

    pg = b.new_page(viewport={"width": 1440, "height": 900})
    errs = []
    pg.on("console", lambda m: errs.append(m.text) if m.type == "error" else None)
    pg.goto(URL, wait_until="load")
    pg.wait_for_timeout(1500)
    nav = pg.locator("[data-site-nav]")

    print("NAVBAR")
    check("transparent at top", not nav.evaluate("e=>e.classList.contains('is-solid')"))
    pg.evaluate("window.scrollTo(0,300)")
    pg.wait_for_timeout(700)
    check("solid after scrolling past 50px", nav.evaluate("e=>e.classList.contains('is-solid')"))
    check("CTA becomes emerald on scroll",
          pg.locator(".btn-book").evaluate("e=>getComputedStyle(e).backgroundColor") == "rgb(5, 150, 105)")
    pg.evaluate("window.scrollTo(0,0)")
    pg.wait_for_timeout(700)
    check("transparent again at top", not nav.evaluate("e=>e.classList.contains('is-solid')"))
    check("desktop nav has exactly About / Departments / Contact",
          [t.strip() for t in pg.locator(".site-nav__menu .nav-link, .nav-dropdown__trigger").all_inner_texts()]
          == ["About", "Departments", "Contact"])
    check("Book Appointment CTA points at the contact page",
          pg.locator(".btn-book").get_attribute("href").endswith("contact.html"))

    print("DEPARTMENTS MEGA MENU")
    check("hidden initially", not pg.locator(".nav-dropdown__panel").is_visible())
    pg.locator("[data-dropdown-trigger]").hover()
    pg.wait_for_timeout(300)
    check("opens on hover", pg.locator(".nav-dropdown__panel").is_visible())
    check("contains 15 department tiles", pg.locator(".nav-dropdown__panel .dept-tile").count() == 15)
    check("chevron rotates when open",
          "matrix(-1, 0, 0, -1" in pg.locator(".nav-dropdown__chevron").evaluate("e=>getComputedStyle(e).transform"))
    pg.mouse.move(200, 800)  # well clear of the nav and the open panel
    pg.wait_for_timeout(600)
    check("closes after the 200ms leave delay", not pg.locator(".nav-dropdown__panel").is_visible())

    print("HERO SEARCH")
    cta = pg.locator("[data-hero-cta]")
    check("default CTA points at appointment page",
          cta.get_attribute("href").endswith("book-appointment.html")
          and pg.locator("[data-hero-cta-label]").inner_text() == "Book Dept")
    pg.locator("[data-hero-search]").fill("kids")
    pg.wait_for_timeout(300)
    check("keyword search 'kids' finds Pediatrics",
          pg.locator(".hero__search-result").count() == 1
          and "Pediatrics" in pg.locator(".hero__search-result-name").inner_text())
    pg.locator("[data-hero-search]").fill("f")
    pg.wait_for_timeout(300)
    check("partial term returns multiple matches", pg.locator(".hero__search-result").count() > 1)
    pg.locator("[data-hero-search]").fill("IVF")
    pg.wait_for_timeout(250)
    pg.locator(".hero__search-result").first.click()
    pg.wait_for_timeout(250)
    check("selecting a result retargets the CTA",
          cta.get_attribute("href").endswith("department-ivf.html")
          and pg.locator("[data-hero-cta-label]").inner_text() == "Book Now")
    check("input is filled with the department name",
          pg.locator("[data-hero-search]").input_value() == "IVF & Fertility")
    pg.locator("[data-hero-search]").fill("zzz")
    pg.wait_for_timeout(300)
    check("typing a non-matching term unpins the department",
          cta.get_attribute("href").endswith("book-appointment.html"))
    pg.locator("[data-hero-search]").fill("")
    pg.wait_for_timeout(250)
    check("clearing hides the result list", not pg.locator(".hero__search-results").is_visible())

    print("DEPARTMENT CAROUSEL")
    check("renders 15 filter pills", pg.locator(".dept-pill").count() == 15)
    check("IVF active by default", pg.locator(".dept-pill.is-active .dept-pill__name").inner_text() == "IVF & Fertility")
    check("prev arrow disabled at start", pg.locator("[data-dept-prev]").is_disabled())
    check("next arrow enabled at start", not pg.locator("[data-dept-next]").is_disabled())
    pg.locator("[data-dept-filter=urology]").click()
    pg.wait_for_timeout(300)
    check("clicking a pill swaps the card", pg.locator(".dept-card__title").inner_text() == "Urology")
    check("card adopts the department theme",
          pg.locator(".dept-card").evaluate("e=>e.classList.contains('theme-cyan')"))
    check("Details link targets the department page",
          pg.locator(".dept-card__btn--primary").get_attribute("href").endswith("department-urology.html"))
    check("24/7 badge shown for emergency departments",
          pg.locator(".dept-card__badge--emergency").count() == 1)
    pg.locator("[data-dept-filter=laparoscopy]").click()
    pg.wait_for_timeout(300)
    check("badge hidden for non-emergency departments",
          pg.locator(".dept-card__badge--emergency").count() == 0)
    for _ in range(12):
        if pg.locator("[data-dept-next]").is_disabled():
            break
        pg.locator("[data-dept-next]").click()
        pg.wait_for_timeout(250)
    check("next arrow disables at end of track", pg.locator("[data-dept-next]").is_disabled())
    check("prev arrow enabled once scrolled", not pg.locator("[data-dept-prev]").is_disabled())

    print("SLIDERS")
    tr = pg.locator("[data-awards-slider] [data-slider-track]")
    pg.locator("[data-awards-slider] [data-slider-next]").click()
    pg.wait_for_timeout(200)
    check("awards next advances one third", "33.333" in tr.get_attribute("style"))
    pg.locator("[data-awards-slider] [data-slider-prev]").click()
    pg.wait_for_timeout(200)
    pg.locator("[data-awards-slider] [data-slider-prev]").click()
    pg.wait_for_timeout(200)
    check("awards wraps around backwards", "66.666" in tr.get_attribute("style"))
    # The testimonial track also auto-advances every 5s, so compare the slide
    # index before/after rather than asserting an absolute transform.
    tt = pg.locator("[data-testimonials-slider] [data-slider-track]")
    idx = lambda: round(abs(float(re.search(r"translateX\((-?[\d.]+)%",
                                            tt.get_attribute("style")).group(1))) / 100)
    before = idx()
    pg.locator("[data-testimonials-slider] [data-slider-next]").click()
    pg.wait_for_timeout(200)
    check("testimonials next advances one slide (wrapping)", idx() == (before + 1) % 3)
    before = idx()
    pg.locator("[data-testimonials-slider] [data-slider-prev]").click()
    pg.wait_for_timeout(200)
    check("testimonials prev goes back one slide", idx() == (before - 1) % 3)
    before = tt.get_attribute("style")
    pg.wait_for_timeout(5400)
    check("testimonials auto-advance after 5s", tt.get_attribute("style") != before)

    print("FAQ")
    it = pg.locator("[data-faq-item]")
    check("all panels closed initially", pg.locator("[data-faq-item].is-open").count() == 0)
    it.nth(0).locator("[data-faq-trigger]").click()
    pg.wait_for_timeout(700)
    check("clicking opens the panel",
          it.nth(0).evaluate("e=>e.classList.contains('is-open')")
          and it.nth(0).locator(".faq-item__panel").bounding_box()["height"] > 0)
    it.nth(2).locator("[data-faq-trigger]").click()
    pg.wait_for_timeout(700)
    check("opening another closes the first",
          not it.nth(0).evaluate("e=>e.classList.contains('is-open')")
          and it.nth(2).evaluate("e=>e.classList.contains('is-open')"))
    it.nth(2).locator("[data-faq-trigger]").click()
    pg.wait_for_timeout(700)
    check("clicking the open one closes it", pg.locator("[data-faq-item].is-open").count() == 0)

    check("no console errors", not errs)
    if errs:
        print("   errors:", errs)
    pg.close()

    print("MOBILE (390px)")
    pg = b.new_page(viewport={"width": 390, "height": 800})
    pg.goto(URL, wait_until="load")
    pg.wait_for_timeout(1200)
    check("desktop menu hidden", not pg.locator(".site-nav__menu").is_visible())
    check("burger button visible", pg.locator("[data-menu-toggle]").is_visible())
    check("mobile panel closed initially", not pg.locator("[data-mobile-menu]").is_visible())
    pg.locator("[data-menu-toggle]").click()
    pg.wait_for_timeout(300)
    check("burger opens the panel", pg.locator("[data-mobile-menu]").is_visible())
    check("burger icon swaps to close icon",
          pg.locator(".nav-toggle__close").is_visible() and not pg.locator(".nav-toggle__open").is_visible())
    check("departments accordion starts closed", not pg.locator(".mobile-accordion__panel").is_visible())
    pg.locator("[data-mobile-accordion-trigger]").click()
    pg.wait_for_timeout(300)
    check("accordion opens with 15 links",
          pg.locator(".mobile-accordion__panel").is_visible() and pg.locator(".mobile-dept").count() == 15)
    pg.locator("[data-menu-toggle]").click()
    pg.wait_for_timeout(300)
    check("burger closes the panel", not pg.locator("[data-mobile-menu]").is_visible())
    check("hero image hidden below lg", not pg.locator(".hero__media").is_visible())
    check("no horizontal overflow",
          not pg.evaluate("document.documentElement.scrollWidth > document.documentElement.clientWidth"))
    pg.close()
    b.close()

print()
print("RESULT:", "ALL CHECKS PASSED" if not fails else f"{len(fails)} FAILED -> {fails}")
