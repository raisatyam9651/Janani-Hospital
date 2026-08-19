<?php
$page_title = "Patient Information - Janani Hospital in Vijayapura";
$page_description = "Everything you need to know about your visit to Janani Hospitals. in Vijayapura.";
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
      <div class="page__head">
        <h1 class="page__title" data-reveal="up" data-reveal-on="mount">
          Essential <span class="accent-emerald">Patient Guide</span>
        </h1>
        <p class="page__lede" data-reveal="up" data-reveal-on="mount" data-reveal-delay="100">
          Everything you need to know about your visit to Janani Hospitals.
        </p>
      </div>

      <div class="info-grid">
        <div class="info-card" data-reveal="up" data-reveal-delay="0">
          <div class="info-card__head">
            <div class="info-card__icon"><svg class="icon"><use href="#i-clock"></use></svg></div>
            <h2 class="info-card__title">OPD Timings</h2>
          </div>
            <div class="info-stack">
              <p class="info-note">Consultations available throughout the week.</p>
              <div class="info-pair">
                <div class="info-slot">
                  <p class="info-slot__day">Mon - Sat</p>
                  <p class="info-slot__time">09:00 AM - 08:00 PM</p>
                </div>
                <div class="info-slot">
                  <p class="info-slot__day">Sunday</p>
                  <p class="info-slot__time">10:00 AM - 01:00 PM</p>
                </div>
              </div>
              <p class="info-alert">*Emergency services are available 24/7.</p>
            </div>
        </div>
        <div class="info-card" data-reveal="up" data-reveal-delay="100">
          <div class="info-card__head">
            <div class="info-card__icon"><svg class="icon"><use href="#i-info"></use></svg></div>
            <h2 class="info-card__title">Visiting Hours</h2>
          </div>
            <div class="info-stack">
              <ul class="info-rows">
                <li><span>Morning Slot</span><span>11:00 AM - 12:00 PM</span></li>
                <li><span>Evening Slot</span><span>05:00 PM - 07:00 PM</span></li>
              </ul>
              <div class="info-box">
                <p>• Only one visitor pass per patient.</p>
                <p>• Children below 12 years are not allowed in the wards.</p>
              </div>
            </div>
        </div>
        <div class="info-card" data-reveal="up" data-reveal-delay="200">
          <div class="info-card__head">
            <div class="info-card__icon"><svg class="icon"><use href="#i-file-text"></use></svg></div>
            <h2 class="info-card__title">Admission &amp; Discharge</h2>
          </div>
            <div class="info-body">
              <h4>Admission Process:</h4>
              <p>Provide your doctor's admission advice at the registration desk. Carry valid ID proof and insurance
                documents.</p>
              <h4 class="is-spaced">Discharge Process:</h4>
              <p>Discharges are usually processed between 10:00 AM and 12:00 PM. All pending bills must be cleared
                before the discharge summary is handed over.</p>
            </div>
        </div>
        <div class="info-card" data-reveal="up" data-reveal-delay="300">
          <div class="info-card__head">
            <div class="info-card__icon"><svg class="icon"><use href="#i-shield"></use></svg></div>
            <h2 class="info-card__title">Insurance &amp; TPA</h2>
          </div>
            <div class="info-stack">
              <p style="color:var(--gray-600)">We provide cashless facilities for major insurance partners and TPAs.</p>
              <div class="info-chips">
                <div class="info-chip">Star Health</div>
                <div class="info-chip">Apollo Munich</div>
                <div class="info-chip">HDFC ERGO</div>
                <div class="info-chip">NIVA Bupa</div>
                <div class="info-chip">Care Health</div>
                <div class="info-chip">ICICI Lombard</div>
              </div>
              <p class="info-fine">Please contact our insurance desk for the updated list of partners.</p>
            </div>
        </div>
      </div>

      <div class="info-faq-panel">
        <div class="info-faq__head">
          <h2 class="info-faq__title">Frequently Asked Questions</h2>
          <p class="info-faq__lede">Quick answers to common queries.</p>
        </div>

        <div class="info-faq__list" data-accordion>
          <div class="info-faq__item" data-accordion-item>
            <button type="button" class="info-faq__trigger" data-accordion-trigger aria-expanded="false">
              <span class="info-faq__q">How do I book an appointment?</span>
              <svg class="icon info-faq__plus"><use href="#i-plus"></use></svg><svg class="icon info-faq__minus"><use href="#i-minus"></use></svg>
            </button>
            <div class="info-faq__panel">
              <div class="info-faq__answer">You can book an appointment through our website's 'Book Appointment' page, or by calling our helpdesk at +91 123 456 7890.</div>
            </div>
          </div>
          <div class="info-faq__item" data-accordion-item>
            <button type="button" class="info-faq__trigger" data-accordion-trigger aria-expanded="false">
              <span class="info-faq__q">What insurance providers do you work with?</span>
              <svg class="icon info-faq__plus"><use href="#i-plus"></use></svg><svg class="icon info-faq__minus"><use href="#i-minus"></use></svg>
            </button>
            <div class="info-faq__panel">
              <div class="info-faq__answer">We are empanelled with major insurance providers including Star Health, Apollo Munich, HDFC ERGO, and many others. Please check our insurance section for a full list.</div>
            </div>
          </div>
          <div class="info-faq__item" data-accordion-item>
            <button type="button" class="info-faq__trigger" data-accordion-trigger aria-expanded="false">
              <span class="info-faq__q">What are the visiting hours for inpatients?</span>
              <svg class="icon info-faq__plus"><use href="#i-plus"></use></svg><svg class="icon info-faq__minus"><use href="#i-minus"></use></svg>
            </button>
            <div class="info-faq__panel">
              <div class="info-faq__answer">Visiting hours are from 11:00 AM to 12:00 PM and 5:00 PM to 6:00 PM. Only one visitor is allowed per patient at a time.</div>
            </div>
          </div>
          <div class="info-faq__item" data-accordion-item>
            <button type="button" class="info-faq__trigger" data-accordion-trigger aria-expanded="false">
              <span class="info-faq__q">How can I get my lab reports?</span>
              <svg class="icon info-faq__plus"><use href="#i-plus"></use></svg><svg class="icon info-faq__minus"><use href="#i-minus"></use></svg>
            </button>
            <div class="info-faq__panel">
              <div class="info-faq__answer">Lab reports can be collected from the diagnostics department.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
