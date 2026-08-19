/* ==========================================================================
   appointment.js — Book Appointment submit flow
   The React page fakes a 2s API call and then routes to /thank-you.
   ========================================================================== */
(function () {
  "use strict";

  var form = document.querySelector("[data-appointment-form]");
  if (!form) return;

  var button = form.querySelector("[data-appointment-submit]");
  var label = form.querySelector("[data-appointment-label]");

  form.addEventListener("submit", function (event) {
    event.preventDefault();
    button.disabled = true;
    button.style.opacity = "0.7";
    label.textContent = "Sending Confirmation Emails...";

    setTimeout(function () {
      window.location.href = "thank-you.html";
    }, 2000);
  });
})();
