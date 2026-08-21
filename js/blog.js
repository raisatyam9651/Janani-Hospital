/* ==========================================================================
   blog.js — search and category filtering for /blog/.

   The listing is rendered server-side from includes/blog-posts.php; every card
   carries data-category and a lowercased data-search haystack. Filtering is
   therefore a pure show/hide over the DOM — no fetch, no re-render, and the
   page still works with JavaScript disabled (all cards simply stay visible).

   A ?category=... in the URL (used by the tag link on a post page) is applied
   on load and kept in sync with history.replaceState so the filtered view can
   be shared or reloaded.
   ========================================================================== */
(function () {
  "use strict";

  var list = document.querySelector("[data-blog-list]");
  if (!list) return;

  var cards = Array.prototype.slice.call(list.querySelectorAll("[data-blog-card]"));
  var empty = list.querySelector("[data-blog-empty]");
  var search = document.getElementById("blog-search");
  var catButtons = Array.prototype.slice.call(document.querySelectorAll("[data-blog-category]"));
  var resetButtons = Array.prototype.slice.call(document.querySelectorAll("[data-blog-reset]"));

  var state = { category: "", query: "" };

  function apply() {
    var query = state.query.trim().toLowerCase();
    var visible = 0;

    cards.forEach(function (card) {
      var matchesCategory = !state.category || card.getAttribute("data-category") === state.category;
      var matchesQuery = !query || (card.getAttribute("data-search") || "").indexOf(query) !== -1;
      var show = matchesCategory && matchesQuery;

      card.hidden = !show;
      if (show) visible++;
    });

    if (empty) empty.hidden = visible !== 0;

    catButtons.forEach(function (btn) {
      var isActive = btn.getAttribute("data-blog-category") === state.category;
      btn.classList.toggle("is-active", isActive);
      btn.setAttribute("aria-pressed", isActive ? "true" : "false");
    });
  }

  // Keep the address bar in step, so a filtered view survives a reload or a
  // shared link. Guarded — replaceState throws on file:// in some browsers.
  function syncUrl() {
    if (!window.history || !window.history.replaceState) return;
    try {
      var url = window.location.pathname;
      if (state.category) url += "?category=" + encodeURIComponent(state.category);
      window.history.replaceState(null, "", url);
    } catch (e) {
      /* not fatal — filtering still works */
    }
  }

  catButtons.forEach(function (btn) {
    btn.addEventListener("click", function () {
      var category = btn.getAttribute("data-blog-category");
      // Clicking the active category clears it, so the button toggles.
      state.category = state.category === category ? "" : category;
      apply();
      syncUrl();
    });
  });

  resetButtons.forEach(function (btn) {
    btn.addEventListener("click", function () {
      state.category = "";
      state.query = "";
      if (search) search.value = "";
      apply();
      syncUrl();
    });
  });

  if (search) {
    search.addEventListener("input", function () {
      state.query = search.value;
      apply();
    });
    // Enter in a search field would otherwise submit nothing and reload.
    search.addEventListener("keydown", function (e) {
      if (e.key === "Enter") e.preventDefault();
    });
  }

  // Initial state from ?category=... (the tag link on a post page).
  var params = new URLSearchParams(window.location.search);
  var initial = params.get("category");
  if (initial) {
    var known = catButtons.some(function (btn) {
      return btn.getAttribute("data-blog-category") === initial;
    });
    if (known) state.category = initial;
  }

  apply();
})();
