<?php
$page_title = "Contact Us - Janani Hospital in Vijayapura";
$page_description = "Have questions about your health? Our expert team is here to help you 24/7 with compassionate care and medical excellence. in Vijayapura.";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
<main class="mk">

    <section class="mk-hero">
      <img src="https://images.unsplash.com/photo-1582750433449-648ed127bb54?ixlib=rb-4.0.3&amp;auto=format&amp;fit=crop&amp;w=1920&amp;q=80"
        alt="Contact Janani Hospital">
      <div class="mk-hero__scrim"></div>
      <div class="mk-hero__inner">
        <div class="mk-section__inner">
          <div class="mk-hero__content" data-reveal="left" data-reveal-on="mount">
            <h1 class="mk-hero__title">Get In <span>Touch</span></h1>
            <p class="mk-hero__lede">
              Have questions about your health? Our expert team is here to help you 24/7 with compassionate care and
              medical excellence.
            </p>
            <div class="contact-hero-actions">
              <a href="tel:+917090831208" class="mk-btn mk-btn--red">
                <svg class="icon icon--lg"><use href="#i-phone"></use></svg>
                <span>Emergency Call</span>
              </a>
              <a href="/pages/contact.php" class="mk-btn mk-btn--teal">
                <span>Book Appointment</span>
                <svg class="icon icon--lg"><use href="#i-arrow-right"></use></svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="mk-section">
      <div class="mk-orb mk-orb--tr"></div>
      <div class="mk-orb mk-orb--bl"></div>

      <div class="mk-section__inner">
        <div class="mk-head">
          <span class="mk-eyebrow">Quick Access</span>
          <h2 class="mk-title">How Can We <span>Help You?</span></h2>
          <p class="mk-lede">Choose from our convenient services designed to make your healthcare journey seamless.</p>
        </div>

        <div class="contact-quick">
          <div class="quick-card q-teal" data-reveal="up-lg" data-reveal-delay="0" style="cursor: pointer;" onclick="openAppointmentModal(event)">
            <div class="quick-card__icon"><svg class="icon"><use href="#i-calendar"></use></svg></div>
            <h3 class="quick-card__title">Book Appointment</h3>
            <p class="quick-card__text">Schedule a consultation with our specialists</p>
            <div class="quick-card__rule"><span></span></div>
          </div>
          <div class="quick-card q-red" data-reveal="up-lg" data-reveal-delay="100">
            <div class="quick-card__icon"><svg class="icon"><use href="#i-alert-triangle"></use></svg></div>
            <h3 class="quick-card__title">Emergency Care</h3>
            <p class="quick-card__text">24/7 emergency medical services available</p>
            <div class="quick-card__rule"><span></span></div>
          </div>

        </div>
      </div>
    </section>

    <section class="mk-section mk-section--gray">
      <div class="mk-orb mk-orb--tl"></div>
      <div class="mk-orb mk-orb--br"></div>

      <div class="mk-section__inner">
        <div class="mk-head">
          <span class="mk-eyebrow">Connect With Us</span>
          <h2 class="mk-title">Let's Start a <span>Conversation</span></h2>
          <p class="mk-lede">We're here to listen, help, and provide the medical care you deserve.</p>
        </div>

        <div class="contact-grid">
          <div data-reveal="left">
            <div class="contact-panel">
              <h3 class="contact-panel__title">Send us a Message</h3>
              <form accept-charset="UTF-8" action="https://app.formester.com/forms/ZU90MDpYm/submissions"
                method="POST" class="contact-form">
                <div class="contact-form__row">
                <div>
                  <label for="name" class="contact-label">Full Name *</label>
                  <input type="text" id="name" name="name" required class="contact-input"
                    placeholder="Enter your full name">
                </div>
                <div>
                  <label for="email" class="contact-label">Email Address *</label>
                  <input type="email" id="email" name="email" required class="contact-input"
                    placeholder="Enter your email">
                </div>
                </div>

                <div>
                  <label for="phone" class="contact-label">Phone Number</label>
                  <input type="tel" id="phone" name="phone" class="contact-input"
                    placeholder="Enter your phone number">
                </div>

                <div>
                  <label for="message" class="contact-label">Message *</label>
                  <textarea id="message" name="message" required rows="4" class="contact-input"
                    placeholder="Tell us about your medical concern or question..."></textarea>
                </div>

                <button type="submit" class="contact-submit">
                  <svg class="icon"><use href="#i-send"></use></svg>
                  <span>Send Message</span>
                </button>
              </form>
            </div>
          </div>

          <div data-reveal="right">
            <div class="contact-info">
              <div class="info-tile t-red" data-reveal="up" data-reveal-delay="0">
                <div class="info-tile__icon"><svg class="icon"><use href="#i-phone"></use></svg></div>
                <h3 class="info-tile__title">Call Us</h3>
                <p class="info-tile__text"><a href="tel:+917090831208" style="color: inherit; text-decoration: none;">+91 70908 31208</a>
24/7 Emergency Hotline</p>
                <div class="info-tile__rule"><span></span></div>
              </div>
              <div class="info-tile t-blue" data-reveal="up" data-reveal-delay="100">
                <div class="info-tile__icon"><svg class="icon"><use href="#i-mail"></use></svg></div>
                <h3 class="info-tile__title">Email Us</h3>
                <p class="info-tile__text"><a href="mailto:Jananihospital2018@gmail.com" style="color: inherit; text-decoration: none;">Jananihospital2018@gmail.com</a></p>
                <div class="info-tile__rule"><span></span></div>
              </div>
              <div class="info-tile t-orange" data-reveal="up" data-reveal-delay="200">
                <div class="info-tile__icon"><svg class="icon"><use href="#i-clock"></use></svg></div>
                <h3 class="info-tile__title">Hours</h3>
                <p class="info-tile__text">24/7 Emergency Care
OPD: 8:00 AM - 8:00 PM</p>
                <div class="info-tile__rule"><span></span></div>
              </div>
              <div class="info-tile t-red" data-reveal="up" data-reveal-delay="300">
                <div class="info-tile__icon"><svg class="icon"><use href="#i-map-pin"></use></svg></div>
                <h3 class="info-tile__title">Location</h3>
                <p class="info-tile__text">Beside Karnataka Bank, Near BDA Cross, Jalnagar main road, KK Colony, Vijayapura, Karnataka 586109, India</p>
                <div class="info-tile__rule"><span></span></div>
              </div>

            </div>
          </div>
        </div>

        <div style="margin-top: 3rem; border-radius: var(--radius-md); overflow: hidden; width: 100%; height: 400px;">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.364135058298!2d75.72489569999999!3d16.808282199999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc655ac7e5e8a89%3A0xafd78de0837b5bcc!2sJanani%20Multispeciality%20Hospital%20and%20Research%20Centre!5e0!3m2!1sen!2sus!4v1787131868985!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe> 
        </div>
      </div>
    </section>

  </main>

  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
