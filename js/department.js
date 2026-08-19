/* ==========================================================================
   department.js — FAQ accordion on the department pages
   Mirrors the `activeIndex` state in the department page components: one
   panel open at a time, clicking the open one closes it.
   ========================================================================== */
(function () {
  "use strict";

  var items = document.querySelectorAll("[data-faq-item]");
  if (!items.length) return;

  Array.prototype.forEach.call(items, function (item) {
    var trigger = item.querySelector("[data-faq-trigger]");
    if (!trigger) return;

    trigger.addEventListener("click", function () {
      var willOpen = !item.classList.contains("is-open");

      Array.prototype.forEach.call(items, function (other) {
        other.classList.remove("is-open");
        var t = other.querySelector("[data-faq-trigger]");
        if (t) t.setAttribute("aria-expanded", "false");
      });

      if (willOpen) {
        item.classList.add("is-open");
        trigger.setAttribute("aria-expanded", "true");
      }
    });
  });
})();
