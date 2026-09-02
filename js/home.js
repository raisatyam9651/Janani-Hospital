/* ==========================================================================
   home.js — interactive behaviour for the Home page
   Ports the component state from Hero, DepartmentsSection,
   JananiHospitalSections, TestimonialsSection and FaqSection.
   ========================================================================== */
(function () {
  "use strict";

  var ROOT = document.body.getAttribute("data-root") || "";
  var IMG = ROOT + "assets/images/homepage/";

  function departmentHref(id) {
    return ROOT + "department/" + id + ".php";
  }

  var APPOINTMENT_HREF = ROOT + "pages/book-appointment.php";

  /* ======================================================================
     HERO — department search
     ====================================================================== */
  (function initHeroSearch() {
    var input = document.querySelector("[data-hero-search]");
    var results = document.querySelector("[data-hero-results]");
    var cta = document.querySelector("[data-hero-cta]");
    var ctaLabel = document.querySelector("[data-hero-cta-label]");
    if (!input || !results || !cta) return;

    // Mirrors `allDepartments` in Hero.jsx — note this list and its ids are
    // deliberately different from the ones in the Departments section.
    var departments = [
      { id: "ivf", name: "IVF & Fertility", icon: "heart", color: "--pink-600", patients: "2K+", doctors: 8, rating: 4.9, keywords: ["fertility", "ivf", "reproductive", "pregnancy"] },
      { id: "pediatrics", name: "Pediatrics", icon: "baby", color: "--blue-600", patients: "5K+", doctors: 12, rating: 4.9, keywords: ["children", "kids", "pediatric", "child", "baby"] },
      { id: "obg", name: "OBG", icon: "users", color: "--purple-600", patients: "3K+", doctors: 15, rating: 4.8, keywords: ["women", "pregnancy", "maternity", "gynecology", "obstetrics"] },
      { id: "medicine", name: "General Medicine", icon: "activity", color: "--green-600", patients: "8K+", doctors: 20, rating: 4.7, keywords: ["general", "medicine", "primary", "care", "physician"] },
      { id: "surgery", name: "General Surgery", icon: "scissors", color: "--red-600", patients: "4K+", doctors: 10, rating: 4.8, keywords: ["surgery", "operation", "surgical", "surgeon"] },
      { id: "urology", name: "Urology", icon: "droplet", color: "--cyan-600", patients: "2K+", doctors: 6, rating: 4.8, keywords: ["kidney", "bladder", "urological", "urine"] },
      { id: "critical-care", name: "Critical Care", icon: "monitor", color: "--orange-600", patients: "2K+", doctors: 12, rating: 4.8, keywords: ["icu", "emergency", "critical", "intensive"] },
      { id: "laparoscopy", name: "Laparoscopy", icon: "eye", color: "--indigo-600", patients: "1.5K+", doctors: 5, rating: 4.9, keywords: ["laparoscopic", "minimally invasive", "keyhole"] },
      { id: "orthopedics", name: "Orthopedics", icon: "shield", color: "--orange-500", patients: "3K+", doctors: 8, rating: 4.9, keywords: ["bone", "joint", "fracture", "orthopedic"] },
    ];

    var selectedId = null;

    function syncCta() {
      cta.setAttribute(
        "href",
        selectedId ? departmentHref(selectedId) : APPOINTMENT_HREF
      );
      if (ctaLabel) {
        ctaLabel.textContent = selectedId ? "Book Now" : "Book Dept";
      }
    }

    function closeResults() {
      results.classList.remove("is-open");
      results.innerHTML = "";
    }

    function renderResults(matches) {
      results.innerHTML = matches
        .map(function (dept) {
          return (
            '<button type="button" class="hero__search-result" data-dept-id="' +
            dept.id +
            '">' +
            '<span class="hero__search-result-icon" style="--d-fg: var(' +
            dept.color +
            ')">' +
            window.Icons.svg(dept.icon) +
            "</span>" +
            '<span class="hero__search-result-body">' +
            '<span class="hero__search-result-name">' +
            dept.name +
            "</span>" +
            '<span class="hero__search-result-meta">' +
            dept.doctors +
            " doctors • " +
            dept.patients +
            " • ⭐" +
            dept.rating +
            "</span>" +
            "</span>" +
            "</button>"
          );
        })
        .join("");
      results.classList.add("is-open");
    }

    input.addEventListener("input", function () {
      var term = input.value;
      var lower = term.toLowerCase();

      // Clear the pinned department as soon as the text stops matching it.
      if (selectedId) {
        var selected = departments.filter(function (d) {
          return d.id === selectedId;
        })[0];
        if (selected && selected.name.toLowerCase().indexOf(lower) === -1) {
          selectedId = null;
        }
      }

      if (term.trim()) {
        var matches = departments.filter(function (dept) {
          return (
            dept.name.toLowerCase().indexOf(lower) !== -1 ||
            dept.keywords.some(function (keyword) {
              return keyword.toLowerCase().indexOf(lower) !== -1;
            })
          );
        });
        if (matches.length) {
          renderResults(matches);
        } else {
          closeResults();
        }
      } else {
        closeResults();
        selectedId = null;
      }

      syncCta();
    });

    results.addEventListener("click", function (event) {
      var button = event.target.closest("[data-dept-id]");
      if (!button) return;
      var dept = departments.filter(function (d) {
        return d.id === button.getAttribute("data-dept-id");
      })[0];
      if (!dept) return;
      input.value = dept.name;
      selectedId = dept.id;
      closeResults();
      syncCta();
    });

    // Dismiss the suggestion list when focus moves elsewhere.
    document.addEventListener("click", function (event) {
      if (!event.target.closest("[data-hero-search-field]")) closeResults();
    });

    syncCta();
  })();

  /* ======================================================================
     DEPARTMENTS — filter pills + active department card
     ====================================================================== */
  (function initDepartments() {
    var track = document.querySelector("[data-dept-track]");
    var cardHost = document.querySelector("[data-dept-card]");
    var prevBtn = document.querySelector("[data-dept-prev]");
    var nextBtn = document.querySelector("[data-dept-next]");
    var cardPrevBtn = document.querySelector("[data-dept-card-prev]");
    var cardNextBtn = document.querySelector("[data-dept-card-next]");
    if (!track || !cardHost) return;

    var departments = [
      {
        id: "ivf", name: "IVF & Fertility", icon: "heart", theme: "theme-pink",
        description: "Our IVF & Fertility department offers state-of-the-art reproductive technologies including advanced IVF cycles, ICSI procedures, and comprehensive fertility preservation options. With personalized treatment protocols and world-class embryology labs, we help couples achieve their parenthood dreams.",
        image: "IVF & Fertility-Department.png",
        services: ["IVF Treatment", "IUI Procedures", "ICSI Treatment", "Fertility Preservation", "Embryo Freezing", "PGD/PGS Testing"],
        doctors: 8, rating: 4.9, emergencyAvailable: false, patients: "2K+", experience: "15+ Years", priority: "high",
      },
      {
        id: "pediatrics", name: "Pediatrics", icon: "baby", theme: "theme-blue",
        description: "Comprehensive pediatric care from newborns to adolescents featuring child-friendly facilities, vaccination programs, developmental assessments, and specialized pediatric surgical services. Our expert team ensures holistic child health monitoring.",
        image: "Pediatrics-Department.png",
        services: ["Newborn Care", "Vaccination", "Pediatric Surgery", "Child Development", "Growth Monitoring", "Neonatal Intensive Care"],
        doctors: 12, rating: 4.9, emergencyAvailable: true, patients: "5K+", experience: "20+ Years", priority: "high",
      },
      {
        id: "obg", name: "OBG", icon: "users", theme: "theme-purple",
        description: "Complete women's healthcare encompassing high-risk pregnancy management, advanced gynecological surgeries, fertility treatments, and menopause care programs. Our OBG specialists provide comprehensive maternal-fetal medicine services.",
        image: "OBG-Department.png",
        services: ["Maternity Care", "Gynecological Surgery", "High-Risk Pregnancy", "Menopause Care", "Laparoscopic Gynecology", "Fetal Medicine"],
        doctors: 15, rating: 4.8, emergencyAvailable: true, patients: "3K+", experience: "25+ Years", priority: "high",
      },
      {
        id: "medicine", name: "General Medicine", icon: "activity", theme: "theme-green",
        description: "Primary care excellence for all age groups featuring comprehensive health checkups, chronic disease management programs, preventive healthcare initiatives, and personalized wellness counseling. Our internal medicine specialists focus on holistic patient care.",
        image: "General-Medicine-Department.png",
        services: ["Primary Care", "Chronic Disease Management", "Preventive Health", "Health Checkups", "Executive Health Programs", "Lifestyle Counseling"],
        doctors: 20, rating: 4.7, emergencyAvailable: true, patients: "8K+", experience: "30+ Years", priority: "high",
      },
      {
        id: "surgery", name: "General Surgery", icon: "scissors", theme: "theme-red",
        description: "Advanced general surgical procedures utilizing minimally invasive laparoscopic techniques, robotic-assisted surgeries, and day-care surgical options for rapid recovery and minimal scarring. Our surgeons specialize in complex abdominal procedures.",
        image: "General-Surgery-Department.png",
        services: ["Laparoscopic Surgery", "General Surgery", "Emergency Surgery", "Day Care Surgery", "Robotic Surgery", "Colorectal Surgery"],
        doctors: 10, rating: 4.8, emergencyAvailable: true, patients: "4K+", experience: "22+ Years", priority: "high",
      },
      {
        id: "ortho", name: "Orthopedics", icon: "activity", theme: "theme-orange",
        description: "Complete musculoskeletal care including joint replacement surgeries, arthroscopic procedures, spine surgeries, and sports medicine rehabilitation programs. Our orthopedic specialists employ advanced implant technologies.",
        image: "Orthopedics-Department.png",
        services: ["Joint Replacement", "Arthroscopy", "Spine Surgery", "Sports Medicine", "Trauma Care", "Pediatric Orthopedics"],
        doctors: 8, rating: 4.9, emergencyAvailable: true, patients: "3K+", experience: "18+ Years", priority: "high",
      },
      {
        id: "urology", name: "Urology", icon: "droplet", theme: "theme-cyan",
        description: "Comprehensive urological care for kidney stones, prostate disorders, urinary incontinence, and male infertility using laser technologies, endourology procedures, and reconstructive surgeries. Our specialists provide personalized treatment plans.",
        image: "Urology-Department.png",
        services: ["Kidney Stone Treatment", "Prostate Care", "Urological Surgery", "Laparoscopic Urology", "Laser Lithotripsy", "Male Infertility"],
        doctors: 6, rating: 4.8, emergencyAvailable: true, patients: "2K+", experience: "15+ Years", priority: "high",
      },
      {
        id: "laparoscopy", name: "Laparoscopy", icon: "monitor", theme: "theme-indigo",
        description: "State-of-the-art minimally invasive surgical center offering advanced laparoscopic procedures across multiple specialties with 3D laparoscopy systems and single-incision techniques for superior precision.",
        image: "Laparoscopy-Department.png",
        services: ["Laparoscopic Surgery", "Diagnostic Laparoscopy", "Minimally Invasive Procedures", "Hernia Repair", "Bariatric Surgery", "Thoracoscopy"],
        doctors: 5, rating: 4.9, emergencyAvailable: false, patients: "1.5K+", experience: "12+ Years", priority: "high",
      },
      {
        id: "neonatology", name: "Neonatology", icon: "baby", theme: "theme-pink",
        description: "Specialized intensive care for newborn infants with critical medical needs.",
        image: "Neonatology-Department.png",
        services: ["NICU Care", "Neonatal Surgery", "Premature Baby Care", "Newborn Screening"],
        doctors: 4, rating: 4.9, emergencyAvailable: true, patients: "800+", experience: "10+ Years", priority: "medium",
      },
      {
        id: "critical-care", name: "Critical Care", icon: "heart", theme: "theme-red",
        description: "Intensive care units with advanced life support systems and critical care specialists.",
        image: "Critical-Care.png",
        services: ["ICU Care", "Ventilator Support", "Critical Care Medicine", "Emergency Response"],
        doctors: 12, rating: 4.8, emergencyAvailable: true, patients: "2K+", experience: "20+ Years", priority: "medium",
      },
      {
        id: "anc", name: "Antenatal Care", icon: "users", theme: "theme-purple",
        description: "Comprehensive care during pregnancy ensuring maternal and fetal well-being.",
        image: "Antenatal-Care-Department.png",
        services: ["Pregnancy Monitoring", "High-Risk Pregnancy Care", "Prenatal Screening", "Birth Preparation"],
        doctors: 8, rating: 4.9, emergencyAvailable: false, patients: "1.8K+", experience: "15+ Years", priority: "medium",
      },
      {
        id: "pain-clinic", name: "Pain Clinic", icon: "activity", theme: "theme-blue",
        description: "Specialized pain management treatments for chronic and acute pain conditions.",
        image: "Pain-Clinic-Department.png",
        services: ["Pain Management", "Interventional Pain Procedures", "Physical Therapy", "Medication Management"],
        doctors: 4, rating: 4.7, emergencyAvailable: false, patients: "1K+", experience: "8+ Years", priority: "medium",
      },
      {
        id: "infertility", name: "Infertility", icon: "heart", theme: "theme-pink",
        description: "Comprehensive fertility evaluation and treatment for male and female infertility.",
        image: "Infertility-Department.png",
        services: ["Fertility Assessment", "Hormone Therapy", "IUI Treatment", "Counseling"],
        doctors: 6, rating: 4.8, emergencyAvailable: false, patients: "1.2K+", experience: "12+ Years", priority: "medium",
      },
      {
        id: "endoscopy", name: "Endoscopy", icon: "eye", theme: "theme-green",
        description: "Advanced diagnostic and therapeutic endoscopic procedures for digestive disorders.",
        image: "Endoscopy-Department.png",
        services: ["Upper GI Endoscopy", "Colonoscopy", "ERCP", "Endoscopic Surgery"],
        doctors: 3, rating: 4.8, emergencyAvailable: false, patients: "1.5K+", experience: "10+ Years", priority: "medium",
      },
      {
        id: "hysteroscopy", name: "Hysteroscopy", icon: "eye", theme: "theme-purple",
        description: "Advanced hysteroscopic procedures for uterine and fertility-related conditions.",
        image: "Hysteroscopy-Department.png",
        services: ["Diagnostic Hysteroscopy", "Operative Hysteroscopy", "Fibroid Removal", "Polypectomy"],
        doctors: 4, rating: 4.9, emergencyAvailable: false, patients: "800+", experience: "8+ Years", priority: "medium",
      },
    ];

    var activeId = "ivf";
    var icon = window.Icons.svg;

    function escapeHtml(value) {
      return String(value).replace(/&/g, "&amp;").replace(/</g, "&lt;");
    }

    /* ---- Filter pills ---- */
    track.innerHTML = departments
      .map(function (dept) {
        return (
          '<button type="button" class="dept-pill ' +
          dept.theme +
          '" data-dept-filter="' +
          dept.id +
          '">' +
          icon(dept.icon) +
          '<span class="dept-pill__name">' +
          escapeHtml(dept.name) +
          "</span>" +
          (dept.priority === "high" ? '<span class="dept-pill__dot"></span>' : "") +
          "</button>"
        );
      })
      .join("");

    function renderCard() {
      var dept = departments.filter(function (d) {
        return d.id === activeId;
      })[0];
      if (!dept) {
        cardHost.innerHTML = "";
        return;
      }

      var statsHtml =
        '<div class="dept-stat dept-stat--rating">' +
        '<div class="dept-stat__value">' + icon("star") + dept.rating + "</div>" +
        '<div class="dept-stat__label">Rating</div>' +
        "</div>" +
        '<div class="dept-stat dept-stat--services">' +
        '<div class="dept-stat__value">' + dept.services.length + "</div>" +
        '<div class="dept-stat__label">Services</div>' +
        "</div>" +
        '<div class="dept-stat dept-stat--availability' +
        (dept.emergencyAvailable ? " is-emergency" : "") +
        '">' +
        '<div class="dept-stat__value">' +
        (dept.emergencyAvailable ? "24/7" : "Scheduled") +
        "</div>" +
        '<div class="dept-stat__label lg-only">Availability</div>' +
        '<div class="dept-stat__label below-lg">Available</div>' +
        "</div>" +
        (dept.priority === "high"
          ? '<div class="dept-stat dept-stat--featured">' +
            '<div class="dept-stat__value">' +
            icon("award") +
            '<span class="lg-only-inline">Featured</span>' +
            '<span class="below-lg">Top</span>' +
            "</div>" +
            '<div class="dept-stat__label lg-only">Priority Dept</div>' +
            '<div class="dept-stat__label below-lg">Priority</div>' +
            "</div>"
          : "");

      var chipsHtml = dept.services
        .slice(0, 6)
        .map(function (service) {
          return (
            '<div class="dept-chip"><span>' + escapeHtml(service) + "</span></div>"
          );
        })
        .join("");

      cardHost.innerHTML =
        '<div class="dept-card ' + dept.theme + '">' +
        '<div class="dept-card__inner">' +
        // --- media -------------------------------------------------------
        '<div class="dept-card__media">' +
        '<img src="' + IMG + encodeURI(dept.image) + '" alt="' + escapeHtml(dept.name) + '">' +
        (dept.priority === "high"
          ? '<div class="dept-card__badge dept-card__badge--featured">Featured</div>'
          : "") +
        (dept.emergencyAvailable
          ? '<div class="dept-card__badge dept-card__badge--emergency">24/7</div>'
          : "") +
        '<div class="dept-card__media-info"><div class="dept-card__media-card">' +
        '<div class="dept-card__media-row">' +
        '<div class="dept-card__media-icon">' + icon(dept.icon) + "</div>" +
        '<div style="min-width:0;flex:1 1 0%">' +
        '<h3 class="dept-card__media-name">' + escapeHtml(dept.name) + "</h3>" +
        '<p class="dept-card__media-exp">' + dept.experience + "</p>" +
        "</div></div></div></div>" +
        "</div>" +
        // --- body --------------------------------------------------------
        '<div class="dept-card__body">' +
        '<div class="dept-card__head">' +
        '<div class="dept-card__title-group">' +
        '<span class="dept-card__accent-bar"></span>' +
        '<h2 class="dept-card__title">' + escapeHtml(dept.name) + "</h2>" +
        "</div>" +
        '<div class="dept-card__rating">' +
        '<span class="dept-card__rating-stars">' + icon("star") + "<span>" + dept.rating + "</span></span>" +
        '<span class="dept-card__rating-count">(' + dept.patients + ")</span>" +
        "</div>" +
        "</div>" +
        '<p class="dept-card__desc">' + escapeHtml(dept.description) + "</p>" +
        '<div class="dept-card__stats">' + statsHtml + "</div>" +
        '<div class="dept-card__services">' +
        '<div class="dept-card__services-head">' +
        icon("activity") +
        '<span class="dept-card__services-label">Core Services</span>' +
        "</div>" +
        '<div class="dept-card__services-track">' + chipsHtml + "</div>" +
        "</div>" +
        '<div class="dept-card__foot">' +
        '<div class="dept-card__contact">' +
        '<a href="tel:+917090831208" class="dept-card__phone">' +
        icon("phone") +
        '<span class="sm-up-inline">+91 70908 31208</span>' +
        '<span class="below-sm">Call Now</span>' +
        "</a>" +
        '<span class="dept-card__divider"></span>' +
        '<span class="dept-card__location">' + icon("map-pin") + "<span>Vijayapura</span></span>" +
        "</div>" +
        '<div class="dept-card__actions">' +
        '<a href="' + departmentHref(dept.id) + '" class="dept-card__btn dept-card__btn--primary">' +
        "<span>Details</span>" + icon("arrow-right") +
        "</a>" +
        '<a href="' + APPOINTMENT_HREF + '" class="dept-card__btn dept-card__btn--ghost">' +
        icon("calendar") + "<span>Book</span>" +
        "</a>" +
        "</div></div></div></div></div>";
    }

    function syncActivePill() {
      Array.prototype.forEach.call(
        track.querySelectorAll("[data-dept-filter]"),
        function (pill) {
          pill.classList.toggle(
            "is-active",
            pill.getAttribute("data-dept-filter") === activeId
          );
        }
      );
    }

    track.addEventListener("click", function (event) {
      var pill = event.target.closest("[data-dept-filter]");
      if (!pill) return;
      activeId = pill.getAttribute("data-dept-filter");
      syncActivePill();
      renderCard();
    });

    /* ---- Horizontal scroll & department slide navigation ---- */
    function getActiveIndex() {
      for (var i = 0; i < departments.length; i++) {
        if (departments[i].id === activeId) return i;
      }
      return 0;
    }

    function selectDepartmentByIndex(index) {
      if (index < 0 || index >= departments.length) return;
      activeId = departments[index].id;
      syncActivePill();
      renderCard();
      var activePill = track.querySelector('.is-active');
      if (activePill && typeof activePill.scrollIntoView === 'function') {
        activePill.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
      }
      syncScrollButtons();
    }

    function syncScrollButtons() {
      var activeIdx = getActiveIndex();
      var isFirst = activeIdx <= 0;
      var isLast = activeIdx >= departments.length - 1;

      if (prevBtn) prevBtn.disabled = isFirst && track.scrollLeft <= 0;
      if (nextBtn) {
        nextBtn.disabled = isLast &&
          track.scrollLeft >= track.scrollWidth - track.clientWidth - 1;
      }
      if (cardPrevBtn) cardPrevBtn.disabled = isFirst;
      if (cardNextBtn) cardNextBtn.disabled = isLast;
    }

    if (prevBtn) {
      prevBtn.addEventListener("click", function () {
        var idx = getActiveIndex();
        if (idx > 0) {
          selectDepartmentByIndex(idx - 1);
        } else {
          track.scrollBy({ left: -220, behavior: "smooth" });
        }
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener("click", function () {
        var idx = getActiveIndex();
        if (idx < departments.length - 1) {
          selectDepartmentByIndex(idx + 1);
        } else {
          track.scrollBy({ left: 220, behavior: "smooth" });
        }
      });
    }

    if (cardPrevBtn) {
      cardPrevBtn.addEventListener("click", function () {
        var idx = getActiveIndex();
        if (idx > 0) selectDepartmentByIndex(idx - 1);
      });
    }

    if (cardNextBtn) {
      cardNextBtn.addEventListener("click", function () {
        var idx = getActiveIndex();
        if (idx < departments.length - 1) selectDepartmentByIndex(idx + 1);
      });
    }

    /* Mobile Touch Swipe navigation on Department Card */
    var touchStartX = 0;
    var touchEndX = 0;
    cardHost.addEventListener("touchstart", function (e) {
      if (e.changedTouches && e.changedTouches.length) {
        touchStartX = e.changedTouches[0].screenX;
      }
    }, { passive: true });

    cardHost.addEventListener("touchend", function (e) {
      if (e.changedTouches && e.changedTouches.length) {
        touchEndX = e.changedTouches[0].screenX;
        var diffX = touchEndX - touchStartX;
        if (Math.abs(diffX) > 40) {
          var idx = getActiveIndex();
          if (diffX < 0 && idx < departments.length - 1) {
            selectDepartmentByIndex(idx + 1);
          } else if (diffX > 0 && idx > 0) {
            selectDepartmentByIndex(idx - 1);
          }
        }
      }
    }, { passive: true });

    track.addEventListener("scroll", syncScrollButtons, { passive: true });
    window.addEventListener("resize", syncScrollButtons);

    syncActivePill();
    renderCard();
    syncScrollButtons();
  })();

  /* ======================================================================
     Generic slider (awards + testimonials)
     ====================================================================== */
  function createSlider(rootSelector, options) {
    var root = document.querySelector(rootSelector);
    if (!root) return null;

    var track = root.querySelector("[data-slider-track]");
    var prev = root.querySelector("[data-slider-prev]");
    var next = root.querySelector("[data-slider-next]");
    if (!track) return null;

    var count = options.count;
    var step = options.step; // percentage of the track shifted per slide
    var index = 0;

    function apply() {
      track.style.transform = "translateX(-" + index * step + "%)";
    }

    function go(delta) {
      index = (index + delta + count) % count;
      apply();
    }

    if (prev) prev.addEventListener("click", function () { go(-1); });
    if (next) next.addEventListener("click", function () { go(1); });

    apply();
    return { go: go };
  }

  // Awards: three cards, each slide shifts the track by one third.
  createSlider("[data-awards-slider]", { count: 3, step: 33.333 });

  // Testimonials: three slides of two cards, auto-advancing every 5s.
  var testimonials = createSlider("[data-testimonials-slider]", {
    count: 3,
    step: 100,
  });

  if (testimonials) {
    setInterval(function () {
      testimonials.go(1);
    }, 5000);
  }

  /* ======================================================================
     FAQ accordion — one panel open at a time
     ====================================================================== */
  (function initFaq() {
    var items = document.querySelectorAll("[data-faq-item]");
    if (!items.length) return;

    Array.prototype.forEach.call(items, function (item) {
      var trigger = item.querySelector("[data-faq-trigger]");
      if (!trigger) return;

      trigger.addEventListener("click", function () {
        var willOpen = !item.classList.contains("is-open");

        Array.prototype.forEach.call(items, function (other) {
          other.classList.remove("is-open");
          var otherTrigger = other.querySelector("[data-faq-trigger]");
          if (otherTrigger) otherTrigger.setAttribute("aria-expanded", "false");
        });

        if (willOpen) {
          item.classList.add("is-open");
          trigger.setAttribute("aria-expanded", "true");
        }
      });
    });
  })();
})();
