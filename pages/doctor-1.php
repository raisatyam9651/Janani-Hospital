<?php
$page_title = "Dr. Janani Ramesh | IVF and Fertility Specialist, Vijayapura";
$page_description = "Dr. Janani Ramesh is an IVF and reproductive medicine specialist at Janani Hospital, Vijayapura, with a high fertility treatment success rate. Book now.";
$page_css  = ['pages.css'];
$page_name = 'doctor-1';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
<main class="page">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <div class="breadcrumb__inner">
        <ol class="breadcrumb__list">
          <li class="breadcrumb__item">
            <span class="breadcrumb__current"><svg class="icon"><use href="#i-home"></use></svg><span>Home</span></span>
          </li>
        </ol>
      </div>
    </nav>

    <div class="page__inner">
      <a href="/pages/doctors.php" class="profile-back">
        <svg class="icon"><use href="#i-arrow-left"></use></svg> Back to All Doctors
      </a>

      <div class="profile-layout">
        <div>
          <div class="profile-card" data-reveal="up" data-reveal-on="mount">
            <div class="profile-card__media">
              <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&amp;fit=crop&amp;q=80&amp;w=600" alt="Dr. Janani Ramesh">
              <div class="profile-card__rating"><svg class="icon"><use href="#i-star"></use></svg> 4.9</div>
            </div>
            <div class="profile-card__body">
              <h1 class="profile-card__name">Dr. Janani Ramesh</h1>
              <p class="profile-card__specialty">IVF &amp; Infertility Specialist</p>
              <div class="profile-card__stats">
                <div class="profile-stat">
                  <p class="profile-stat__label">Experience</p>
                  <p class="profile-stat__value">15+ Years</p>
                </div>
                <div class="profile-stat">
                  <p class="profile-stat__label">Success Rate</p>
                  <p class="profile-stat__value">98%</p>
                </div>
              </div>
              <a href="/pages/book-appointment.php" class="profile-card__cta">
                <svg class="icon"><use href="#i-calendar"></use></svg>
                <span>Book Appointment</span>
              </a>
            </div>
          </div>
        </div>

        <div class="profile-layout__main">
          <div class="profile-panel" data-reveal="right" data-reveal-on="mount" data-reveal-delay="100">
            <h2 class="profile-panel__title">
              <svg class="icon"><use href="#i-book-open"></use></svg> Professional Summary
            </h2>
            <p class="profile-panel__lede">
              Expert in reproductive medicine and advanced IVF procedures with a high success rate. Dr. Janani Ramesh is one of the leading specialists in IVF &amp; Fertility with
              extensive clinical experience. Dedicated to providing personalized patient care and implementing the
              latest medical technologies to achieve the best possible outcomes.
            </p>

            <div class="profile-cols">
              <div>
                <h3>Qualifications</h3>
                <ul>
                  <li><svg class="icon"><use href="#i-award"></use></svg> MBBS, DGO, ART Specialist</li>
                  <li><svg class="icon"><use href="#i-award"></use></svg> Fellowship in Reproductive Medicine</li>
                </ul>
              </div>
              <div>
                <h3>Specializations</h3>
                <ul>
                  <li><span class="profile-dot"></span> Advanced IVF Procedures</li>
                  <li><span class="profile-dot"></span> Laparoscopic Surgery</li>
                  <li><span class="profile-dot"></span> High-Risk Pregnancy</li>
                  <li><span class="profile-dot"></span> Hormonal Management</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="profile-panel" data-reveal="right" data-reveal-on="mount" data-reveal-delay="200">
            <h2 class="profile-panel__title">
              <svg class="icon"><use href="#i-clock"></use></svg> Working Hours
            </h2>
            <div class="profile-hours">
              <div class="profile-hours__row">
                <span class="profile-hours__day">Monday - Friday</span>
                <span class="profile-hours__time">10:00 AM - 04:00 PM</span>
              </div>
              <div class="profile-hours__row">
                <span class="profile-hours__day">Saturday</span>
                <span class="profile-hours__time">10:00 AM - 01:00 PM</span>
              </div>
              <div class="profile-hours__row">
                <span class="profile-hours__day">Sunday</span>
                <span class="profile-hours__time">Emergency On-call Only</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
