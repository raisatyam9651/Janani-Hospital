<?php
$page_title = "Janani Hospital - World-Class Healthcare in Vijayapura";
$page_description = "Janani Hospital provides world-class, accessible healthcare services with advanced medical technology and personalized patient care. in Vijayapura.";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
<main>

    <!-- ========================================================================
         HERO
         ======================================================================== -->
    <div class="hero">
      <div class="hero__overlay"></div>

      <div class="shell hero__inner">
        <div class="hero__grid">

          <div class="hero__content">
            <div class="hero__intro">
              <p class="hero__eyebrow">Medical Experts Ready for You</p>
              <h1 class="hero__title">
                Quality Medical Care
                <span class="hero__title-accent">&amp; Treatment</span>
              </h1>
              <p class="hero__lede">Find specialist doctors and book appointments instantly.</p>
            </div>

            <div class="hero__search">
              <div class="hero__search-field" data-hero-search-field>
                <svg class="icon hero__search-icon">
                  <use href="#i-search"></use>
                </svg>
                <input type="text" id="hero-search" class="hero__search-input"
                  aria-label="Search departments" placeholder="Search departments (IVF, Pediatrics...)"
                  autocomplete="off" data-hero-search>
                <div class="hero__search-results" data-hero-results role="listbox"
                  aria-label="Matching departments"></div>
              </div>

              <a href="/pages/book-appointment.php" class="hero__search-cta" data-hero-cta>
                <span data-hero-cta-label>Book Dept</span>
                <svg class="icon">
                  <use href="#i-arrow-right"></use>
                </svg>
              </a>
            </div>
          </div>

          <div class="hero__media">
            <div class="hero__media-frame">
              <img src="/assets/images/homepage/Advanced%20Medical%20Facilities-Banner-image.png"
                alt="Advanced Medical Facilities">
            </div>
          </div>
        </div>

        <div class="hero__services">
          <a href="/" class="hero-service">
            <div class="hero-service__row">
              <div class="hero-service__group">
                <span class="hero-service__icon"><svg class="icon">
                    <use href="#i-check-circle"></use>
                  </svg></span>
                <span class="hero-service__title">Health Check</span>
              </div>
            </div>
          </a>
          <a href="/" class="hero-service">
            <div class="hero-service__row">
              <div class="hero-service__group">
                <span class="hero-service__icon"><svg class="icon">
                    <use href="#i-home"></use>
                  </svg></span>
                <span class="hero-service__title">Homecare</span>
              </div>
            </div>
          </a>
          <a href="/" class="hero-service">
            <div class="hero-service__row">
              <div class="hero-service__group">
                <span class="hero-service__icon"><svg class="icon">
                    <use href="#i-activity"></use>
                  </svg></span>
                <span class="hero-service__title">Book a Test</span>
              </div>
            </div>
          </a>
          <a href="contact.php" class="hero-service">
            <div class="hero-service__row">
              <div class="hero-service__group">
                <span class="hero-service__icon"><svg class="icon">
                    <use href="#i-phone"></use>
                  </svg></span>
                <span class="hero-service__title">Contact</span>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <!-- ========================================================================
         DEPARTMENTS
         ======================================================================== -->
    <section id="departments" class="departments">
      <div class="shell">
        <div class="section-head">
          <h2 class="section-title">
            Our Medical <span class="section-title__accent">Departments</span>
          </h2>
          <p class="section-lede">
            Comprehensive healthcare services across multiple specialties with world-class facilities
          </p>
        </div>

        <div class="dept-filters">
          <div class="dept-filters__row">
            <button type="button" class="dept-filters__arrow" data-dept-prev aria-label="Scroll departments left">
              <svg class="icon">
                <use href="#i-chevron-left"></use>
              </svg>
            </button>

            <!-- Filter pills are rendered by js/home.js from the department data -->
            <div class="dept-filters__track" data-dept-track role="tablist" aria-label="Medical departments"></div>

            <button type="button" class="dept-filters__arrow" data-dept-next aria-label="Scroll departments right">
              <svg class="icon">
                <use href="#i-chevron-right"></use>
              </svg>
            </button>
          </div>
        </div>

        <!-- Active department card, rendered by js/home.js -->
        <div class="dept-card-wrap" data-dept-card></div>
      </div>
    </section>

    <!-- ========================================================================
         ABOUT
         ======================================================================== -->
    <section id="about" class="about">
      <div class="shell">
        <div class="section-head section-head--lg">
          <h2 class="section-title section-title--gap-lg">About Janani Hospital</h2>
          <p class="section-lede section-lede--lg">Pioneering excellence in healthcare for over two decades</p>
        </div>

        <div class="about__grid">
          <div class="about__col">
            <div class="about-card">
              <div class="about-card__row">
                <div class="about-card__icon about-card__icon--teal">
                  <svg class="icon">
                    <use href="#i-target"></use>
                  </svg>
                </div>
                <div>
                  <h3 class="about-card__title">Our Mission</h3>
                  <p class="about-card__text">
                    To provide world-class, accessible healthcare services with advanced medical technology and
                    personalized patient care for women and children.
                  </p>
                </div>
              </div>
            </div>

            <div class="about-card">
              <div class="about-card__row">
                <div class="about-card__icon about-card__icon--red">
                  <svg class="icon">
                    <use href="#i-eye"></use>
                  </svg>
                </div>
                <div>
                  <h3 class="about-card__title">Our Vision</h3>
                  <p class="about-card__text">
                    To be the most trusted healthcare center for women and children, setting new standards in maternal
                    and pediatric care excellence.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="about__col">
            <div class="about__media">
              <img
                src="https://images.unsplash.com/photo-1551190822-a9333d879b1f?ixlib=rb-4.0.3&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80"
                alt="Janani Hospital Medical Facility">
              <div class="about__badge">
                <div class="about__badge-value">25+</div>
                <div class="about__badge-label">Years Excellence</div>
              </div>
            </div>

            <div class="about__stats">
              <div class="about-stat">
                <div class="about-stat__value about-stat__value--teal">50K+</div>
                <div class="about-stat__label">Happy Patients</div>
              </div>
              <div class="about-stat">
                <div class="about-stat__value about-stat__value--red">25K+</div>
                <div class="about-stat__label">Successful Deliveries</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ========================================================================
         WHY CHOOSE JANANI HOSPITAL
         ======================================================================== -->
    <section class="why">
      <div class="why__inner">
        <div class="why__grid">
          <div class="why__text">
            <h2 class="why__title">Why Choose Janani Hospital?</h2>
            <p class="why__body">
              Janani Hospital, recognized as a leading <strong>Women's &amp; Children's Healthcare Center</strong>, has
              been dedicated to providing exceptional medical care with compassion and expertise. We combine experienced
              healthcare professionals, state-of-the-art technology, and world-class infrastructure to ensure the best
              possible health outcomes for mothers, children, and families.
            </p>
          </div>

          <div class="why__cards">
            <div class="why__cards-grid">
              <div class="why-card">
                <div class="why-card__icon why-card__icon--teal">
                  <svg class="icon">
                    <use href="#i-users"></use>
                  </svg>
                </div>
                <h3 class="why-card__title">Expert Medical Team</h3>
              </div>
              <div class="why-card">
                <div class="why-card__icon why-card__icon--red">
                  <svg class="icon">
                    <use href="#i-heart"></use>
                  </svg>
                </div>
                <h3 class="why-card__title">Compassionate Care</h3>
              </div>
              <div class="why-card">
                <div class="why-card__icon why-card__icon--orange">
                  <svg class="icon">
                    <use href="#i-monitor"></use>
                  </svg>
                </div>
                <h3 class="why-card__title">Advanced Technology</h3>
              </div>
              <div class="why-card">
                <div class="why-card__icon why-card__icon--teal">
                  <svg class="icon">
                    <use href="#i-shield"></use>
                  </svg>
                </div>
                <h3 class="why-card__title">Trusted Excellence</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ========================================================================
         AWARDS & RECOGNITION
         ======================================================================== -->
    <section class="awards">
      <div class="awards__inner">
        <div class="awards__head">
          <h2 class="awards__title">Awards &amp; Recognition</h2>
        </div>

        <div class="awards__grid">
          <div class="awards__illus">
            <div style="position:relative">
              <img src="https://res.cloudinary.com/damfndmrm/image/upload/v1767163207/award_dzdzl8.png" width="200"
                height="280" alt="">
            </div>
          </div>

          <div class="awards__slider-col">
            <div class="slider" data-awards-slider>
              <div class="slider__viewport">
                <div class="slider__track" data-slider-track>
                  <div class="awards__slide">
                    <article class="award-card">
                      <img src="/assets/images/homepage/awards.jpeg" alt="Excellence in Women's Healthcare ">
                      <div class="award-card__body">
                        <h3 class="award-card__title">Excellence in Women's Healthcare </h3>
                        <a href="/blog/excellence-womens-healthcare.php" class="award-card__link">Read More</a>
                      </div>
                    </article>
                  </div>
                  <div class="awards__slide">
                    <article class="award-card">
                      <img src="/assets/images/homepage/awards3.jpeg" alt="Healthcare Excellence Awards">
                      <div class="award-card__body">
                        <h3 class="award-card__title">Healthcare Excellence Awards</h3>
                        <a href="/blog/healthcare-excellence-awards.php" class="award-card__link">Read More</a>
                      </div>
                    </article>
                  </div>
                  <div class="awards__slide">
                    <article class="award-card">
                      <img src="/assets/images/homepage/awards1.jpeg"
                        alt="Outstanding Patient Care Recognition - Medical Board India">
                      <div class="award-card__body">
                        <h3 class="award-card__title">Outstanding Patient Care Recognition - Medical Board India</h3>
                        <a href="/blog/outstanding-patient-care.php" class="award-card__link">Read More</a>
                      </div>
                    </article>
                  </div>
                </div>
              </div>

              <button type="button" class="slider__nav slider__nav--prev" data-slider-prev aria-label="Previous slide">
                <svg class="icon icon--24">
                  <use href="#i-chevron-left"></use>
                </svg>
              </button>
              <button type="button" class="slider__nav slider__nav--next" data-slider-next aria-label="Next slide">
                <svg class="icon icon--24">
                  <use href="#i-chevron-right"></use>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ========================================================================
         PATIENT SUCCESS STORIES
         ======================================================================== -->
    <section class="testimonials">
      <div class="shell">        <!-- Review Pixel -->
<script type="text/javascript">
!function(){var e,t=document;e=function(){if(window.EMRPixel)return console.info("EMR: Pixel already loaded");var e=t.createElement("script");e.defer=!0,e.src="https://cdn2.revw.me/js/pixel.js?t="+864e5*Math.ceil(new Date/864e5);var n=t.getElementsByTagName("script")[0];n.charset="utf-8",n.parentNode.insertBefore(e,n),e.onload=function(){EMRPixel.init("reviewmagnet.in",111)}},"interactive"===t.readyState||"complete"===t.readyState?e():t.addEventListener("DOMContentLoaded",e)}();
</script><emr-simple-slider widget-id="da02c720-3ce9-4ca4-8280-7cf54ec9615d"></emr-simple-slider>
<!-- Review Pixel End -->
      </div>
    </section>

    <!-- ========================================================================
         FAQ
         ======================================================================== -->
    <section id="faq" class="faq">
      <div class="shell">
        <div class="section-head section-head--lg section-head--faq">
          <h2 class="section-title section-title--gap-lg">
            Frequently Asked <span class="section-title__accent">Questions</span>
          </h2>
          <p class="section-lede section-lede--lg">
            Find answers to common questions about our services and procedures
          </p>
        </div>

        <div class="faq__grid">
          <div class="faq__list">

            <div class="faq-item" data-faq-item>
              <button type="button" class="faq-item__trigger" data-faq-trigger aria-expanded="false">
                <span class="faq-item__question">How do I book an appointment?</span>
                <span class="faq-item__chevron"><svg class="icon">
                    <use href="#i-chevron-down"></use>
                  </svg></span>
              </button>
              <div class="faq-item__panel">
                <div class="faq-item__answer">
                  You can book an appointment through our website by clicking the "Book Appointment" button, or by
                  calling our reception at +91 70908 31208. We also accept walk-in appointments, but booking in advance
                  is recommended.
                </div>
              </div>
            </div>

            <div class="faq-item" data-faq-item>
              <button type="button" class="faq-item__trigger" data-faq-trigger aria-expanded="false">
                <span class="faq-item__question">What are the visiting hours?</span>
                <span class="faq-item__chevron"><svg class="icon">
                    <use href="#i-chevron-down"></use>
                  </svg></span>
              </button>
              <div class="faq-item__panel">
                <div class="faq-item__answer">
                  General visiting hours are from 10:00 AM to 12:00 PM and 5:00 PM to 7:00 PM. For critical care units,
                  visiting hours are more restricted. Please check with the specific department for their policies.
                </div>
              </div>
            </div>

            <div class="faq-item" data-faq-item>
              <button type="button" class="faq-item__trigger" data-faq-trigger aria-expanded="false">
                <span class="faq-item__question">What documents should I bring for my first visit?</span>
                <span class="faq-item__chevron"><svg class="icon">
                    <use href="#i-chevron-down"></use>
                  </svg></span>
              </button>
              <div class="faq-item__panel">
                <div class="faq-item__answer">
                  For your first visit, please bring a valid photo ID, any previous medical records or test results, a
                  list of current medications, and your insurance information if applicable.
                </div>
              </div>
            </div>

            <div class="faq-item" data-faq-item>
              <button type="button" class="faq-item__trigger" data-faq-trigger aria-expanded="false">
                <span class="faq-item__question">Do you accept health insurance?</span>
                <span class="faq-item__chevron"><svg class="icon">
                    <use href="#i-chevron-down"></use>
                  </svg></span>
              </button>
              <div class="faq-item__panel">
                <div class="faq-item__answer">
                  Yes, we have tie-ups with most major health insurance providers. Please visit our insurance desk or
                  contact us to verify if your specific plan is covered.
                </div>
              </div>
            </div>

            <div class="faq-item" data-faq-item>
              <button type="button" class="faq-item__trigger" data-faq-trigger aria-expanded="false">
                <span class="faq-item__question">What facilities are available for international patients?</span>
                <span class="faq-item__chevron"><svg class="icon">
                    <use href="#i-chevron-down"></use>
                  </svg></span>
              </button>
              <div class="faq-item__panel">
                <div class="faq-item__answer">
                  We offer a range of services for international patients, including visa assistance, airport transfers,
                  accommodation arrangements, and dedicated patient coordinators to ensure a seamless experience.
                </div>
              </div>
            </div>

            <div class="faq-item" data-faq-item>
              <button type="button" class="faq-item__trigger" data-faq-trigger aria-expanded="false">
                <span class="faq-item__question">Where can I find my lab test results?</span>
                <span class="faq-item__chevron"><svg class="icon">
                    <use href="#i-chevron-down"></use>
                  </svg></span>
              </button>
              <div class="faq-item__panel">
                <div class="faq-item__answer">
                  You can collect a physical copy of your lab test results from our records department or request them during your follow-up visit.
                </div>
              </div>
            </div>

          </div>

          <div class="faq__aside">
            <div class="faq-stats">
              <div class="faq-stats__blob faq-stats__blob--a"></div>
              <div class="faq-stats__blob faq-stats__blob--b"></div>

              <div class="faq-stats__inner">
                <div class="faq-stats__head">
                  <div class="faq-stats__head-icon">
                    <svg class="icon">
                      <use href="#i-award"></use>
                    </svg>
                  </div>
                  <h3 class="faq-stats__title">Why Choose Us?</h3>
                </div>

                <div class="faq-stats__grid">
                  <div class="faq-stat">
                    <div class="faq-stat__inner">
                      <div class="faq-stat__icon"><svg class="icon">
                          <use href="#i-users"></use>
                        </svg></div>
                      <div class="faq-stat__value">10K+</div>
                      <div class="faq-stat__label">Happy Patients</div>
                    </div>
                  </div>
                  <div class="faq-stat">
                    <div class="faq-stat__inner">
                      <div class="faq-stat__icon"><svg class="icon">
                          <use href="#i-clock"></use>
                        </svg></div>
                      <div class="faq-stat__value">24/7</div>
                      <div class="faq-stat__label">Emergency Care</div>
                    </div>
                  </div>
                  <div class="faq-stat">
                    <div class="faq-stat__inner">
                      <div class="faq-stat__icon"><svg class="icon">
                          <use href="#i-award"></use>
                        </svg></div>
                      <div class="faq-stat__value">50+</div>
                      <div class="faq-stat__label">Expert Doctors</div>
                    </div>
                  </div>
                  <div class="faq-stat">
                    <div class="faq-stat__inner">
                      <div class="faq-stat__icon"><svg class="icon">
                          <use href="#i-phone"></use>
                        </svg></div>
                      <div class="faq-stat__value">98%</div>
                      <div class="faq-stat__label">Success Rate</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ========================================================================
         CONTACT
         ======================================================================== -->
    <section id="contact" class="contact">
      <div class="shell">
        <div class="section-head">
          <h2 class="section-title">Get In <span class="section-title__accent">Touch</span></h2>
          <p class="section-lede">
            Have questions about your health? Our expert team is here to help you 24/7. Reach out to us for any medical
            assistance.
          </p>
        </div>

        <div class="contact__grid">
          <div class="contact__aside">
            <div class="contact-card">
              <h3 class="contact-card__title">Contact Information</h3>
              <div class="contact-card__list">
                <div class="contact-item">
                  <div class="contact-item__icon contact-item__icon--red">
                    <svg class="icon">
                      <use href="#i-phone"></use>
                    </svg>
                  </div>
                  <div>
                    <h4 class="contact-item__label">Call Us</h4>
                    <p class="contact-item__value"><a href="tel:+917090831208" style="color: inherit; text-decoration: none;">+91 70908 31208</a></p>
                  </div>
                </div>
                <div class="contact-item">
                  <div class="contact-item__icon contact-item__icon--teal">
                    <svg class="icon">
                      <use href="#i-mail"></use>
                    </svg>
                  </div>
                  <div>
                    <h4 class="contact-item__label">Email Us</h4>
                    <p class="contact-item__value"><a href="mailto:Jananihospital2018@gmail.com" style="color: inherit; text-decoration: none;">Jananihospital2018@gmail.com</a></p>
                  </div>
                </div>
                <div class="contact-item">
                  <div class="contact-item__icon contact-item__icon--red">
                    <svg class="icon">
                      <use href="#i-clock"></use>
                    </svg>
                  </div>
                  <div>
                    <h4 class="contact-item__label">Working Hours</h4>
                    <p class="contact-item__value">24/7 Emergency Care<br>OPD: 8:00 AM - 8:00 PM</p>
                  </div>
                </div>
                <div class="contact-item">
                  <div class="contact-item__icon contact-item__icon--teal">
                    <svg class="icon">
                      <use href="#i-map-pin"></use>
                    </svg>
                  </div>
                  <div>
                    <h4 class="contact-item__label">Location</h4>
                    <p class="contact-item__value">Beside Karnataka Bank, Near BDA Cross, Jalnagar main road, KK Colony, Vijayapura, Karnataka 586109, India</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="contact__form-col">
            <div class="contact-card contact-card--form">
              <h3 class="contact-card__title">Send us a Message</h3>
              <form accept-charset="UTF-8" action="https://app.formester.com/forms/ZU90MDpYm/submissions" method="POST"
                class="contact-form">
                <div class="contact-form__row">
                  <div>
                    <label for="name" class="form-label">Full Name *</label>
                    <input type="text" id="name" name="name" required class="form-control"
                      placeholder="Enter your full name">
                  </div>
                  <div>
                    <label for="email" class="form-label">Email Address *</label>
                    <input type="email" id="email" name="email" required class="form-control"
                      placeholder="Enter your email">
                  </div>
                </div>
                <div>
                  <label for="phone" class="form-label">Phone Number</label>
                  <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your phone number">
                </div>
                <div>
                  <label for="message" class="form-label">Message *</label>
                  <textarea id="message" name="message" required rows="4" class="form-control"
                    placeholder="Tell us about your medical concern or question..."></textarea>
                </div>
                <button type="submit" class="form-submit">
                  <svg class="icon">
                    <use href="#i-send"></use>
                  </svg>
                  <span>Send Message</span>
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="contact__emergency">
          <div class="emergency-card">
            <h3 class="emergency-card__title">Medical Emergency?</h3>
            <p class="emergency-card__text">Call our 24/7 emergency hotline for immediate assistance</p>
            <a href="tel:+917090831208" class="emergency-card__cta">
              <svg class="icon">
                <use href="#i-phone"></use>
              </svg>
              <span>+91 70908 31208</span>
            </a>
          </div>
        </div>
        </div>
        
        <div style="margin-top: 3rem; border-radius: var(--radius-md); overflow: hidden; width: 100%; height: 400px;">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.364135058298!2d75.72489569999999!3d16.808282199999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc655ac7e5e8a89%3A0xafd78de0837b5bcc!2sJanani%20Multispeciality%20Hospital%20and%20Research%20Centre!5e0!3m2!1sen!2sus!4v1787131868985!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe> 
        </div>
      </div>
    </section>

  </main>

  <!-- ==========================================================================
       FOOTER
       ========================================================================== -->
  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
