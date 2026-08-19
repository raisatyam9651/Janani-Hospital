/* ==========================================================================
   lab-test.js — Book a Lab Test confirmation  (src/pages/BookLabTest.jsx)
   ========================================================================== */
(function () {
  "use strict";

  var form = document.querySelector("[data-lab-form]");
  if (!form) return;

  form.addEventListener("submit", function (event) {
    event.preventDefault();
    var name = form.querySelector("#name").value;
    var test = form.querySelector("#test").value;
    window.alert("Booking submitted for " + name + " for a " + test + ".");
  });
})();
