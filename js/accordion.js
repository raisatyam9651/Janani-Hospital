/* ==========================================================================
   accordion.js — generic single-open accordion
   Used by the Patient Information FAQ and the General Medicine page.
   ========================================================================== */
(function () {
  "use strict";

  var groups = document.querySelectorAll("[data-accordion]");

  groups.forEach(function (group) {
    var items = group.querySelectorAll("[data-accordion-item]");

    items.forEach(function (item) {
      var trigger = item.querySelector("[data-accordion-trigger]");
      if (!trigger) return;

      trigger.addEventListener("click", function () {
        var willOpen = !item.classList.contains("is-open");

        items.forEach(function (other) {
          other.classList.remove("is-open");
          var t = other.querySelector("[data-accordion-trigger]");
          if (t) t.setAttribute("aria-expanded", "false");
        });

        if (willOpen) {
          item.classList.add("is-open");
          trigger.setAttribute("aria-expanded", "true");
        }
      });
    });
  });
})();
