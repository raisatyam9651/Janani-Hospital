/* ==========================================================================
   appointment.js — Book Appointment submit feedback

   The form posts to the same Formester endpoint as the contact form and the
   footer modal. This file deliberately does NOT preventDefault: an earlier
   version did, faked a two-second delay and then redirected to a thank-you
   page without ever sending the booking anywhere. All it does now is guard
   against a double submit and show that something is happening while the
   POST is in flight, so the page still works with JavaScript disabled.
   ========================================================================== */
(function () {
  "use strict";

  var form = document.querySelector("[data-appointment-form]");
  if (!form) return;

  var button = form.querySelector("[data-appointment-submit]");
  var label = form.querySelector("[data-appointment-label]");
  var sent = false;

  form.addEventListener("submit", function (event) {
    // Let the browser's own validation stop an incomplete form first.
    if (!form.checkValidity || !form.checkValidity()) return;

    if (sent) {
      event.preventDefault(); // second click while the first is still going
      return;
    }
    sent = true;

    if (label) label.textContent = "Sending your request...";
    // Deferred: disabling a submit button synchronously inside the handler
    // cancels the submission in some browsers.
    if (button) {
      window.setTimeout(function () {
        button.disabled = true;
        button.style.opacity = "0.7";
      }, 0);
    }
  });
})();
