/* ==========================================================================
   reveal.js — entrance animations
   Stands in for framer-motion's `initial`/`animate` (on mount) and
   `whileInView` (on scroll). Elements opt in with:
     data-reveal="up|up-lg|up-xl|left|right|scale|scale-sm|fade"
     data-reveal-on="mount"   -> plays immediately (default: on scroll)
     data-reveal-delay="100"  -> milliseconds
   ========================================================================== */
(function () {
  "use strict";

  var nodes = document.querySelectorAll("[data-reveal]");
  if (!nodes.length) return;

  function show(el) {
    var delay = el.getAttribute("data-reveal-delay");
    if (delay) el.style.transitionDelay = delay + "ms";
    el.classList.add("is-revealed");
  }

  // No IntersectionObserver (or reduced motion): show everything up front.
  if (!("IntersectionObserver" in window)) {
    Array.prototype.forEach.call(nodes, show);
    return;
  }

  var observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        show(entry.target);
        observer.unobserve(entry.target); // framer's `viewport={{ once: true }}`
      });
    },
    { rootMargin: "0px 0px -10% 0px", threshold: 0.01 }
  );

  Array.prototype.forEach.call(nodes, function (el) {
    if (el.getAttribute("data-reveal-on") === "mount") {
      requestAnimationFrame(function () {
        requestAnimationFrame(function () {
          show(el);
        });
      });
    } else {
      observer.observe(el);
    }
  });
})();
