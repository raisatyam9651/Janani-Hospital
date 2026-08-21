/* ==========================================================================
   layout.js — behaviour for the shared navbar
   Replaces the useState/useEffect logic in src/components/Navbar.jsx.
   Loaded on every page; each page declares its identity via
   <body data-page="..."> which drives the active link + transparent header.
   ========================================================================== */
(function () {
  "use strict";

  var SCROLL_THRESHOLD = 50; // matches `window.scrollY > 50` in the React app
  var DROPDOWN_CLOSE_DELAY = 200; // matches the 200ms setTimeout on mouse leave

  var nav = document.querySelector("[data-site-nav]");
  if (!nav) return;

  var page = document.body.getAttribute("data-page") || "";

  /* ---------------------------------------------------------------------
     Scroll state.
     - Non-home pages: immediately solid (white bg, dark text) on load.
     - Home page: transparent at top, becomes solid once scrolled > 50px.
     - One-way latch: once solid, it NEVER goes transparent again — no
       "background disappears when scrolling back up" glitch.
     --------------------------------------------------------------------- */
  var isHomePage = (page === "home");
  var hasBecomesolid = !isHomePage; // non-home pages start already solid

  function syncScrollState() {
    if (!hasBecomesolid) {
      hasBecomesolid = window.scrollY > SCROLL_THRESHOLD;
    }
    nav.classList.toggle("is-scrolled", hasBecomesolid);
    nav.classList.toggle("is-solid",    hasBecomesolid);
  }

  window.addEventListener("scroll", syncScrollState, { passive: true });
  syncScrollState();

  /* ---------------------------------------------------------------------
     Active link highlighting
     --------------------------------------------------------------------- */
  Array.prototype.forEach.call(
    nav.querySelectorAll("[data-nav]"),
    function (link) {
      if (link.getAttribute("data-nav") === page) {
        link.classList.add("is-active");
      }
    }
  );

  /* ---------------------------------------------------------------------
     Departments mega menu (desktop)
     Opens on hover, closes after a short delay so the pointer can travel
     from the trigger down into the panel. Click and Escape are also wired
     up so the menu is reachable by keyboard and touch.
     --------------------------------------------------------------------- */
  var dropdown = nav.querySelector("[data-dropdown]");

  if (dropdown) {
    var trigger = dropdown.querySelector("[data-dropdown-trigger]");
    var closeTimer = null;

    var openDropdown = function () {
      if (closeTimer) {
        clearTimeout(closeTimer);
        closeTimer = null;
      }
      dropdown.classList.add("is-open");
      if (trigger) trigger.setAttribute("aria-expanded", "true");
    };

    var closeDropdown = function () {
      dropdown.classList.remove("is-open");
      if (trigger) trigger.setAttribute("aria-expanded", "false");
    };

    var scheduleClose = function () {
      closeTimer = setTimeout(closeDropdown, DROPDOWN_CLOSE_DELAY);
    };

    dropdown.addEventListener("mouseenter", openDropdown);
    dropdown.addEventListener("mouseleave", scheduleClose);

    if (trigger) {
      trigger.addEventListener("click", function (event) {
        event.preventDefault();
        if (dropdown.classList.contains("is-open")) {
          closeDropdown();
        } else {
          openDropdown();
        }
      });
    }

    // Links inside the panel dismiss it before navigating.
    Array.prototype.forEach.call(
      dropdown.querySelectorAll("a"),
      function (link) {
        link.addEventListener("click", closeDropdown);
      }
    );

    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape") closeDropdown();
    });

    document.addEventListener("click", function (event) {
      if (!dropdown.contains(event.target)) closeDropdown();
    });
  }

  /* ---------------------------------------------------------------------
     Mobile menu + departments accordion
     --------------------------------------------------------------------- */
  var toggle = nav.querySelector("[data-menu-toggle]");
  var accordion = nav.querySelector("[data-mobile-accordion]");
  var accordionTrigger = nav.querySelector("[data-mobile-accordion-trigger]");

  function closeMobileMenu() {
    nav.classList.remove("is-menu-open");
    if (toggle) toggle.setAttribute("aria-expanded", "false");
    if (accordion) {
      accordion.classList.remove("is-open");
      if (accordionTrigger) {
        accordionTrigger.setAttribute("aria-expanded", "false");
      }
    }
  }

  if (toggle) {
    toggle.addEventListener("click", function () {
      var open = nav.classList.toggle("is-menu-open");
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
      toggle.setAttribute("aria-label", open ? "Close menu" : "Open menu");
      if (!open && accordion) {
        accordion.classList.remove("is-open");
        if (accordionTrigger) {
          accordionTrigger.setAttribute("aria-expanded", "false");
        }
      }
    });
  }

  if (accordionTrigger && accordion) {
    accordionTrigger.addEventListener("click", function () {
      var open = accordion.classList.toggle("is-open");
      accordionTrigger.setAttribute("aria-expanded", open ? "true" : "false");
    });
  }

  // Every link in the mobile panel closes the panel, as in the original.
  var mobileMenu = nav.querySelector("[data-mobile-menu]");
  if (mobileMenu) {
    Array.prototype.forEach.call(
      mobileMenu.querySelectorAll("a"),
      function (link) {
        link.addEventListener("click", closeMobileMenu);
      }
    );
  }
})();
