/* ==========================================================================
   doctors.js — name/specialty search + department filter
   (src/pages/OurDoctors.jsx)
   ========================================================================== */
(function () {
  "use strict";

  var cards = document.querySelectorAll("[data-doctor]");
  var search = document.querySelector("[data-doctor-search]");
  var depts = document.querySelectorAll("[data-doctor-dept]");
  var empty = document.querySelector("[data-doctors-empty]");
  if (!cards.length) return;

  var term = "";
  var dept = "All";

  function apply() {
    var shown = 0;
    cards.forEach(function (card) {
      var name = (card.getAttribute("data-name") || "").toLowerCase();
      var specialty = (card.getAttribute("data-specialty") || "").toLowerCase();
      var matchesSearch = name.indexOf(term) !== -1 || specialty.indexOf(term) !== -1;
      var matchesDept = dept === "All" || card.getAttribute("data-dept") === dept;
      var visible = matchesSearch && matchesDept;
      card.hidden = !visible;
      if (visible) shown++;
    });
    if (empty) empty.hidden = shown !== 0;
  }

  if (search) {
    search.addEventListener("input", function () {
      term = search.value.toLowerCase();
      apply();
    });
  }

  depts.forEach(function (btn) {
    btn.addEventListener("click", function () {
      dept = btn.getAttribute("data-doctor-dept");
      depts.forEach(function (b) {
        b.classList.toggle("is-active", b === btn);
      });
      apply();
    });
  });

  apply();
})();
