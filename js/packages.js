/* ==========================================================================
   packages.js — health package selection
   Picking a package marks the card and reveals the booking form below.
   ========================================================================== */
(function () {
  "use strict";

  var cards = document.querySelectorAll("[data-package]");
  var template = document.querySelector("[data-package-booking-template]");
  if (!cards.length) return;

  var booking = null;
  var bookingName = null;
  var form = null;

  /* The original only mounts this panel once a package is picked, so it is
     kept in a <template> and cloned in on first selection. */
  function mountBooking() {
    if (booking || !template) return;
    booking = template.content.firstElementChild.cloneNode(true);
    template.parentNode.insertBefore(booking, template);
    bookingName = booking.querySelector("[data-package-booking-name]");
    form = booking.querySelector("[data-package-form]");
    if (form) form.addEventListener("submit", onSubmit);
  }

  function onSubmit(event) {
    event.preventDefault();
    var submit = form.querySelector("[data-package-submit]");
    submit.disabled = true;
    submit.textContent = "Booking...";
    setTimeout(function () {
      submit.disabled = false;
      submit.textContent = "Book Appointment";
      window.alert("Thank you! We will contact you soon.");
    }, 1000);
  }

  cards.forEach(function (card) {
    var button = card.querySelector("[data-package-select]");
    if (!button) return;

    button.addEventListener("click", function () {
      cards.forEach(function (other) {
        other.classList.toggle("is-selected", other === card);
        var l = other.querySelector("[data-package-label]");
        if (l) l.textContent = other === card ? "Selected" : "Select Package";
      });

      mountBooking();
      if (bookingName) bookingName.textContent = card.getAttribute("data-name");
    });
  });
})();
