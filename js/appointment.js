/* ==========================================================================
   appointment.js — Book Appointment Interactive Experience & Submit Feedback

   Handles:
   1. Minimum date constraint (preventing past date selection)
   2. Dynamic Service -> Doctor dropdown auto-filtering
   3. Quick Time Slot chips sync with the time select control
   4. Form submit feedback & double submission protection
   ========================================================================== */
(function () {
  "use strict";

  var form = document.querySelector("[data-appointment-form]");
  if (!form) return;

  // 1. Set minimum date to today
  var dateInput = form.querySelector("[data-appointment-date]");
  if (dateInput) {
    var today = new Date().toISOString().split("T")[0];
    dateInput.setAttribute("min", today);
  }

  // 2. Department -> Doctor auto-filtering
  var serviceSelect = form.querySelector("[data-service-select]");
  var doctorSelect = form.querySelector("[data-doctor-select]");

  if (serviceSelect && doctorSelect) {
    var doctorOptions = Array.prototype.slice.call(doctorSelect.querySelectorAll("option"));

    serviceSelect.addEventListener("change", function () {
      var selectedDept = this.value;

      doctorOptions.forEach(function (option) {
        if (!option.value) return; // Keep placeholder visible

        var deptAttr = option.getAttribute("data-dept");
        if (!deptAttr || deptAttr === "all" || !selectedDept) {
          option.hidden = false;
          option.disabled = false;
        } else {
          var depts = deptAttr.split(",").map(function (d) { return d.trim(); });
          var match = depts.some(function (d) {
            return selectedDept.toLowerCase().indexOf(d.toLowerCase()) !== -1 ||
                   d.toLowerCase().indexOf(selectedDept.toLowerCase()) !== -1;
          });

          option.hidden = !match;
          option.disabled = !match;
        }
      });

      // If current doctor option is hidden, reset doctor selection to default
      var currentDoctorOpt = doctorSelect.options[doctorSelect.selectedIndex];
      if (currentDoctorOpt && currentDoctorOpt.hidden) {
        doctorSelect.value = "";
      }
    });
  }

  // 3. Quick Time Slot Chip sync
  var timeSelect = form.querySelector("[data-time-select]");
  var slotButtons = form.querySelectorAll(".appt-slot-btn");

  if (timeSelect && slotButtons.length > 0) {
    function updateSlotButtons(val) {
      slotButtons.forEach(function (btn) {
        if (btn.getAttribute("data-slot") === val) {
          btn.classList.add("is-selected");
        } else {
          btn.classList.remove("is-selected");
        }
      });
    }

    slotButtons.forEach(function (btn) {
      btn.addEventListener("click", function () {
        var slotVal = this.getAttribute("data-slot");
        if (!slotVal) return;

        timeSelect.value = slotVal;
        updateSlotButtons(slotVal);

        // Trigger change event on select for validity checks
        var event;
        if (typeof Event === "function") {
          event = new Event("change", { bubbles: true });
        } else {
          event = document.createEvent("Event");
          event.initEvent("change", true, true);
        }
        timeSelect.dispatchEvent(event);
      });
    });

    timeSelect.addEventListener("change", function () {
      updateSlotButtons(this.value);
    });
  }

  // 4. Submit state & double-click protection
  var button = form.querySelector("[data-appointment-submit]");
  var label = form.querySelector("[data-appointment-label]");
  var sent = false;

  form.addEventListener("submit", function (event) {
    if (!form.checkValidity || !form.checkValidity()) return;

    if (sent) {
      event.preventDefault();
      return;
    }
    sent = true;

    if (label) label.textContent = "Processing Your Booking...";
    if (button) {
      window.setTimeout(function () {
        button.disabled = true;
        button.style.opacity = "0.75";
        button.style.cursor = "not-allowed";
      }, 0);
    }
  });
})();

