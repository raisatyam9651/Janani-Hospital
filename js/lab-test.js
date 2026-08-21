/* ==========================================================================
   lab-test.js — Book a Lab Test submit feedback

   As with appointment.js, no preventDefault. The previous version swallowed
   the submit and showed a window.alert() saying the booking had been made,
   while nothing was ever sent. The form now posts to the same Formester
   endpoint as the rest of the site; this only prevents a double submit and
   shows progress, so the page still works without JavaScript.
   ========================================================================== */
(function () {
  "use strict";

  var form = document.querySelector("[data-lab-form]");
  if (!form) return;

  var button = form.querySelector(".lab-submit");
  var original = button ? button.innerHTML : "";
  var sent = false;

  form.addEventListener("submit", function (event) {
    if (!form.checkValidity || !form.checkValidity()) return;

    if (sent) {
      event.preventDefault();
      return;
    }
    sent = true;

    if (button) {
      button.textContent = "Booking your test...";
      window.setTimeout(function () {
        button.disabled = true;
        button.style.opacity = "0.7";
      }, 0);
    }
  });
})();
