/* ==========================================================================
   gallery.js — category filter + lightbox  (src/pages/Gallery.jsx)
   ========================================================================== */
(function () {
  "use strict";

  var items = document.querySelectorAll("[data-gallery-item]");
  var filters = document.querySelectorAll("[data-gallery-filter]");
  var box = document.querySelector("[data-lightbox]");
  if (!items.length) return;

  /* ---- Category filter ---- */
  filters.forEach(function (btn) {
    btn.addEventListener("click", function () {
      var cat = btn.getAttribute("data-gallery-filter");

      filters.forEach(function (b) {
        b.classList.toggle("is-active", b === btn);
      });

      items.forEach(function (item) {
        var match = cat === "All" || item.getAttribute("data-category") === cat;
        item.hidden = !match;
        // Re-run the entrance transition for the items coming back into view.
        if (match) {
          item.classList.remove("is-revealed");
          requestAnimationFrame(function () {
            item.classList.add("is-revealed");
          });
        }
      });
    });
  });

  /* ---- Lightbox ---- */
  if (!box) return;

  var stage = box.querySelector("[data-lightbox-stage]");
  var titleEl = box.querySelector("[data-lightbox-title]");
  var catEl = box.querySelector("[data-lightbox-category]");

  function close() {
    box.classList.remove("is-open");
    stage.innerHTML = "";
    document.body.style.overflow = "";
  }

  function open(item) {
    var type = item.getAttribute("data-type");
    var src = item.getAttribute("data-src");
    stage.innerHTML =
      type === "video"
        ? '<video src="' + src + '" controls autoplay></video>'
        : '<img src="' + src + '" alt="' + item.getAttribute("data-title") + '">';
    titleEl.textContent = item.getAttribute("data-title");
    catEl.textContent = item.getAttribute("data-category");
    box.classList.add("is-open");
    document.body.style.overflow = "hidden";
  }

  items.forEach(function (item) {
    item.addEventListener("click", function () {
      open(item);
    });
  });

  box.addEventListener("click", function (event) {
    if (!event.target.closest("[data-lightbox-panel]")) close();
  });

  var closeBtn = box.querySelector("[data-lightbox-close]");
  if (closeBtn) closeBtn.addEventListener("click", close);

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape" && box.classList.contains("is-open")) close();
  });
})();
