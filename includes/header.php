<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/png" href="/assets/images/logo.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title><?= isset($page_title) ? $page_title : '' ?></title>
  <meta name="description" content="<?= isset($page_description) ? $page_description : '' ?>">
  <meta name="keywords"
    content="Janani Hospital, hospital, healthcare, multispeciality, surgery, IVF, pediatrics, OBG, medicine, Vijayapura">
  <meta name="author" content="Janani Hospital">

  <meta property="og:title" content="<?= isset($page_title) ? $page_title : '' ?>">
  <meta property="og:description" content="<?= isset($page_description) ? $page_description : '' ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://example.com">
  <meta property="og:image"
    content="https://images.unsplash.com/photo-1551190822-a9333d879b1f?ixlib=rb-4.0.3&amp;auto=format&amp;fit=crop&amp;w=1200&amp;q=80">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Janani Hospital - World-Class Healthcare">
  <meta name="twitter:description"
    content="Providing world-class medical care with compassion and cutting-edge technology for your family's health and wellbeing.">
  <meta name="twitter:image"
    content="https://images.unsplash.com/photo-1551190822-a9333d879b1f?ixlib=rb-4.0.3&amp;auto=format&amp;fit=crop&amp;w=1200&amp;q=80">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="/css/base.css">
  <link rel="stylesheet" href="/css/layout.css">
  <link rel="stylesheet" href="/css/home.css">
</head>

<body data-page="home" data-root="">

  <!-- ==========================================================================
       Feather icon sprite. Inlined (rather than referenced from an external
       file) so icons also render when the page is opened straight off disk.
       ========================================================================== -->
  <svg xmlns="http://www.w3.org/2000/svg" style="position:absolute;width:0;height:0;overflow:hidden"
    aria-hidden="true" focusable="false">
    <defs>
      <symbol id="i-activity" viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></symbol>
      <symbol id="i-alert-triangle" viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></symbol>
      <symbol id="i-arrow-right" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></symbol>
      <symbol id="i-award" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></symbol>
      <symbol id="i-baby" viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></symbol>
      <symbol id="i-calendar" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></symbol>
      <symbol id="i-check-circle" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></symbol>
      <symbol id="i-chevron-down" viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></symbol>
      <symbol id="i-chevron-left" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></symbol>
      <symbol id="i-chevron-right" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></symbol>
      <symbol id="i-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></symbol>
      <symbol id="i-droplet" viewBox="0 0 24 24"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/></symbol>
      <symbol id="i-eye" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></symbol>
      <symbol id="i-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></symbol>
      <symbol id="i-heart" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></symbol>
      <symbol id="i-home" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></symbol>
      <symbol id="i-mail" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></symbol>
      <symbol id="i-map-pin" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></symbol>
      <symbol id="i-menu" viewBox="0 0 24 24"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></symbol>
      <symbol id="i-message-square" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></symbol>
      <symbol id="i-monitor" viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></symbol>
      <symbol id="i-phone" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></symbol>
      <symbol id="i-scissors" viewBox="0 0 24 24"><circle cx="6" cy="6" r="3"/><circle cx="6" cy="18" r="3"/><line x1="20" y1="4" x2="8.12" y2="15.88"/><line x1="14.47" y1="14.48" x2="20" y2="20"/><line x1="8.12" y1="8.12" x2="12" y2="12"/></symbol>
      <symbol id="i-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></symbol>
      <symbol id="i-send" viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></symbol>
      <symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></symbol>
      <symbol id="i-star" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></symbol>
      <symbol id="i-target" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></symbol>
      <symbol id="i-users" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></symbol>
      <symbol id="i-x" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></symbol>
    </defs>
  </svg>

  <!-- ==========================================================================
       NAVBAR
       ========================================================================== -->
  <nav class="site-nav" data-site-nav>
    <div class="shell">
      <div class="site-nav__bar">

        <a href="/" class="site-nav__logo" aria-label="Janani Hospital � home">
          <img src="https://res.cloudinary.com/damfndmrm/image/upload/v1767163208/logo_eqtacj.png"
            alt="Janani Hospital">
          <span class="site-nav__logo-text"></span>
        </a>

        <div class="site-nav__menu">
        <a href="/pages/about.php" class="nav-link" data-nav="about">About</a>

          <div class="nav-dropdown" data-dropdown>
            <button type="button" class="nav-dropdown__trigger" data-dropdown-trigger aria-expanded="false"
              aria-haspopup="true">
              <span>Departments</span>
              <svg class="icon nav-dropdown__chevron"><use href="#i-chevron-down"></use></svg>
            </button>

            <div class="nav-dropdown__panel">
              <div class="nav-dropdown__head">
                <div>
                  <h4 class="nav-dropdown__title">Medical Departments</h4>
                  <p class="nav-dropdown__subtitle">All specialties in one place</p>
                </div>
                <a href="/pages/contact.php" class="nav-dropdown__cta">
                  <svg class="icon"><use href="#i-calendar"></use></svg>
                  <span>Book Now</span>
                </a>
              </div>

              <div class="nav-dropdown__grid">
          <a href="/department/ivf.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-heart"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">IVF &amp; Fertility</span>
                <span class="dept-tile__dot"></span>
              </span>
              <span class="dept-tile__desc">Advanced reproductive treatments</span>
            </span>
          </a>
          <a href="/department/pediatrics.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-baby"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Pediatrics</span>
                <span class="dept-tile__dot"></span>
              </span>
              <span class="dept-tile__desc">Child healthcare services</span>
            </span>
          </a>
          <a href="/department/obg.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-users"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">OBG</span>
                <span class="dept-tile__dot"></span>
              </span>
              <span class="dept-tile__desc">Women's healthcare</span>
            </span>
          </a>
          <a href="/department/medicine.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-activity"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">General Medicine</span>
                <span class="dept-tile__dot"></span>
              </span>
              <span class="dept-tile__desc">Primary care services</span>
            </span>
          </a>
          <a href="/department/surgery.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-scissors"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Surgery</span>
                <span class="dept-tile__dot"></span>
              </span>
              <span class="dept-tile__desc">Surgical procedures</span>
            </span>
          </a>
          <a href="/department/ortho.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-activity"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Orthopedics</span>
                <span class="dept-tile__dot"></span>
              </span>
              <span class="dept-tile__desc">Bone &amp; joint care</span>
            </span>
          </a>
          <a href="/department/urology.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-droplet"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Urology</span>
                <span class="dept-tile__dot"></span>
              </span>
              <span class="dept-tile__desc">Urinary system care</span>
            </span>
          </a>
          <a href="/department/laparoscopy.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-monitor"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Laparoscopy</span>
                <span class="dept-tile__dot"></span>
              </span>
              <span class="dept-tile__desc">Minimally invasive surgery</span>
            </span>
          </a>
          <a href="/department/neonatology.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-baby"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Neonatology</span>
              </span>
              <span class="dept-tile__desc">Newborn intensive care</span>
            </span>
          </a>
          <a href="/department/critical-care.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-heart"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Critical Care</span>
              </span>
              <span class="dept-tile__desc">ICU services</span>
            </span>
          </a>
          <a href="/department/anc.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-users"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Antenatal Care</span>
              </span>
              <span class="dept-tile__desc">Pregnancy care</span>
            </span>
          </a>
          <a href="/department/pain-clinic.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-activity"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Pain Clinic</span>
              </span>
              <span class="dept-tile__desc">Pain management</span>
            </span>
          </a>
          <a href="/department/infertility.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-heart"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Infertility</span>
              </span>
              <span class="dept-tile__desc">Fertility treatments</span>
            </span>
          </a>
          <a href="/department/endoscopy.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-eye"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Endoscopy</span>
              </span>
              <span class="dept-tile__desc">Diagnostic procedures</span>
            </span>
          </a>
          <a href="/department/hysteroscopy.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-eye"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Hysteroscopy</span>
              </span>
              <span class="dept-tile__desc">Uterine examination</span>
            </span>
          </a>
              </div>
            </div>
          </div>

        <a href="/blog/index.php" class="nav-link" data-nav="blog">Blog</a>
        <a href="/pages/contact.php" class="nav-link" data-nav="contact">Contact</a>
        </div>

        <div class="site-nav__cta">
          <a href="#" onclick="openAppointmentModal(event)" class="btn-book">
            <svg class="icon btn-book__icon"><use href="#i-calendar"></use></svg>
            <span>Book Appointment</span>
          </a>
        </div>

        <button type="button" class="nav-toggle" data-menu-toggle aria-expanded="false" aria-label="Open menu"
          aria-controls="mobile-menu">
          <svg class="icon nav-toggle__open"><use href="#i-menu"></use></svg>
          <svg class="icon nav-toggle__close"><use href="#i-x"></use></svg>
        </button>
      </div>

      <div class="mobile-menu" id="mobile-menu" data-mobile-menu>
        <div class="mobile-menu__list">
          <a href="/" class="mobile-link" data-nav="home">
            <span class="mobile-link__icon mobile-link__icon--emerald"><svg class="icon"><use href="#i-heart"></use></svg></span>
            <span>Home</span>
          </a>
          <a href="/pages/about.php" class="mobile-link" data-nav="about">
            <span class="mobile-link__icon mobile-link__icon--teal"><svg class="icon"><use href="#i-users"></use></svg></span>
            <span>About</span>
          </a>

          <div class="mobile-accordion" data-mobile-accordion>
            <button type="button" class="mobile-accordion__trigger" data-mobile-accordion-trigger
              aria-expanded="false">
              <span class="mobile-accordion__label">
                <span class="mobile-link__icon mobile-link__icon--emerald"><svg class="icon"><use href="#i-monitor"></use></svg></span>
                <span>Departments</span>
              </span>
              <svg class="icon mobile-accordion__chevron"><use href="#i-chevron-down"></use></svg>
            </button>
            <div class="mobile-accordion__panel">
            <a href="/department/ivf.php" class="mobile-dept"><svg class="icon"><use href="#i-heart"></use></svg><span class="mobile-dept__name">IVF &amp; Fertility</span><span class="mobile-dept__dot"></span></a>
            <a href="/department/pediatrics.php" class="mobile-dept"><svg class="icon"><use href="#i-baby"></use></svg><span class="mobile-dept__name">Pediatrics</span><span class="mobile-dept__dot"></span></a>
            <a href="/department/obg.php" class="mobile-dept"><svg class="icon"><use href="#i-users"></use></svg><span class="mobile-dept__name">OBG</span><span class="mobile-dept__dot"></span></a>
            <a href="/department/medicine.php" class="mobile-dept"><svg class="icon"><use href="#i-activity"></use></svg><span class="mobile-dept__name">General Medicine</span><span class="mobile-dept__dot"></span></a>
            <a href="/department/surgery.php" class="mobile-dept"><svg class="icon"><use href="#i-scissors"></use></svg><span class="mobile-dept__name">Surgery</span><span class="mobile-dept__dot"></span></a>
            <a href="/department/ortho.php" class="mobile-dept"><svg class="icon"><use href="#i-activity"></use></svg><span class="mobile-dept__name">Orthopedics</span><span class="mobile-dept__dot"></span></a>
            <a href="/department/urology.php" class="mobile-dept"><svg class="icon"><use href="#i-droplet"></use></svg><span class="mobile-dept__name">Urology</span><span class="mobile-dept__dot"></span></a>
            <a href="/department/laparoscopy.php" class="mobile-dept"><svg class="icon"><use href="#i-monitor"></use></svg><span class="mobile-dept__name">Laparoscopy</span><span class="mobile-dept__dot"></span></a>
            <a href="/department/neonatology.php" class="mobile-dept"><svg class="icon"><use href="#i-baby"></use></svg><span class="mobile-dept__name">Neonatology</span></a>
            <a href="/department/critical-care.php" class="mobile-dept"><svg class="icon"><use href="#i-heart"></use></svg><span class="mobile-dept__name">Critical Care</span></a>
            <a href="/department/anc.php" class="mobile-dept"><svg class="icon"><use href="#i-users"></use></svg><span class="mobile-dept__name">Antenatal Care</span></a>
            <a href="/department/pain-clinic.php" class="mobile-dept"><svg class="icon"><use href="#i-activity"></use></svg><span class="mobile-dept__name">Pain Clinic</span></a>
            <a href="/department/infertility.php" class="mobile-dept"><svg class="icon"><use href="#i-heart"></use></svg><span class="mobile-dept__name">Infertility</span></a>
            <a href="/department/endoscopy.php" class="mobile-dept"><svg class="icon"><use href="#i-eye"></use></svg><span class="mobile-dept__name">Endoscopy</span></a>
            <a href="/department/hysteroscopy.php" class="mobile-dept"><svg class="icon"><use href="#i-eye"></use></svg><span class="mobile-dept__name">Hysteroscopy</span></a>
            </div>
          </div>

          <a href="/blog/index.php" class="mobile-link" data-nav="blog">
            <span class="mobile-link__icon mobile-link__icon--emerald"><svg class="icon"><use href="#i-activity"></use></svg></span>
            <span>Blog</span>
          </a>
          <a href="/pages/contact.php" class="mobile-link" data-nav="contact">
            <span class="mobile-link__icon mobile-link__icon--purple"><svg class="icon"><use href="#i-activity"></use></svg></span>
            <span>Contact</span>
          </a>

          <a href="#" onclick="openAppointmentModal(event)" class="mobile-menu__cta">
            <svg class="icon"><use href="#i-calendar"></use></svg>
            <span>Book Appointment</span>
          </a>
        </div>
      </div>
    </div>
  </nav>

  
