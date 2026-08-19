// Emits About, Contact, Book Appointment, Book a Lab Test, Health Packages
// and the dynamic-route General Medicine department page.
import fs from 'node:fs';
import { page, icon } from './lib/chrome.mjs';
import { DOCTORS } from './build-content.mjs';

const ROOT = '../';
const IMG = `${ROOT}assets/images`;
const P = (f) => `${ROOT}pages/${f}`;

const esc = (s) => String(s)
  .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
const remote = (u) => u.replace(/&/g, '&amp;');
const asset = (p) => (/^https?:\/\//.test(p)
  ? remote(p)
  : IMG + encodeURI(decodeURI(p)).replace(/&/g, '&amp;'));

const breadcrumb = () => `    <nav class="breadcrumb" aria-label="Breadcrumb">
      <div class="breadcrumb__inner">
        <ol class="breadcrumb__list">
          <li class="breadcrumb__item">
            <span class="breadcrumb__current">${icon('home')}<span>Home</span></span>
          </li>
        </ol>
      </div>
    </nav>`;

const out = {};

/* ==========================================================================
   ABOUT  (/about)
   ========================================================================== */
const VALUES = [
  ['heart', 'v-red', 'Compassionate Care', 'We treat every patient with empathy, respect, and understanding, ensuring their comfort and dignity.'],
  ['shield', 'v-teal', 'Excellence', 'We strive for the highest standards in medical care, continuously improving our services and outcomes.'],
  ['activity', 'v-orange', 'Innovation', 'We embrace cutting-edge technology and innovative treatments for the best possible patient care.'],
  ['users', 'v-blue', 'Collaboration', 'We work together as a team, fostering cooperation and communication for optimal patient outcomes.'],
  ['trending-up', 'v-purple', 'Continuous Learning', 'We commit to ongoing education and professional development to stay at the forefront of medicine.'],
  ['award', 'v-emerald', 'Integrity', 'We maintain the highest ethical standards in all our interactions and medical practices.'],
];

const ABOUT_STATS = [
  ['Patients Served', '1M+'], ['Surgeries', '50K+'],
  ['Cities Covered', '06'], ['Years Glory', '25+'],
];

const MILESTONES = [
  ['1999', 'Foundation', 'Janani Hospital was established with a vision to provide world-class healthcare.', 'https://images.unsplash.com/photo-1629909613654-28e377c37b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'],
  ['2005', 'Expansion', 'Opened our second facility and expanded cardiac care services.', '/about/cardiac%20care.jpg'],
  ['2010', 'Recognition', 'Received JCI accreditation for quality healthcare standards.', '/about/2010.jpg'],
  ['2015', 'Innovation', 'Introduced robotic surgery and advanced medical technology.', '/about/2015.jpg'],
  ['2020', 'Digital Health', 'Launched telemedicine and digital health initiatives.', '/about/telemedicine.jpg'],
  ['2024', 'Excellence', 'Celebrating 25 years of healthcare excellence and innovation.', '/homepage/awards.jpeg'],
];

const gridPattern = (i) => `<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                <defs>
                  <pattern id="grid-pattern-${i}" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M0 40L40 0H20L0 20M40 40V20L20 40" stroke="currentColor" stroke-width="2"
                      fill="none" style="color:var(--gray-900)" />
                  </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid-pattern-${i})" />
              </svg>`;

out['about.html'] = page({
  root: ROOT, pageId: 'about', title: 'About Janani Hospital',
  description: 'Pioneering excellence in healthcare for over two decades with compassionate care and cutting-edge technology.',
  canonical: 'pages/about.html',
  css: ['pages.css', 'marketing.css'], js: ['reveal.js'],
  icons: ['arrow-right', 'target', 'eye', 'heart', 'shield', 'activity', 'users',
    'trending-up', 'award', 'clock', 'phone', 'check-circle'],
  body: `  <main class="mk">

    <section class="mk-hero">
      <img src="https://images.unsplash.com/photo-1551190822-a9333d879b1f?ixlib=rb-4.0.3&amp;auto=format&amp;fit=crop&amp;w=1920&amp;q=80"
        alt="About Janani Hospital">
      <div class="mk-hero__scrim"></div>
      <div class="mk-hero__inner">
        <div class="mk-section__inner">
          <div class="mk-hero__content" data-reveal="left" data-reveal-on="mount">
            <h1 class="mk-hero__title">About Janani <span>Hospital</span></h1>
            <p class="mk-hero__lede">
              Pioneering excellence in healthcare for over two decades with compassionate care and cutting-edge
              technology.
            </p>
            <a href="${P('contact.html')}" class="mk-btn mk-btn--teal">
              <span>Book Appointment</span>
              ${icon('arrow-right')}
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="mk-section mk-section--sm">
      <div class="mk-orb mk-orb--tr"></div>
      <div class="mk-orb mk-orb--bl"></div>

      <div class="mk-section__inner">
        <div class="about-intro">
          <div class="about-intro__text" data-reveal="up">
            <h2 class="about-intro__title">
              Providing World-Class <span>Healthcare</span> for Everyone
            </h2>
            <p class="about-intro__kicker">Our Mission &amp; Vision</p>
            <p class="about-intro__body">
              Founded in 1999, Janani Hospital has grown from a local clinic into a state-of-the-art medical
              institution. We believe that everyone deserves access to premium healthcare, delivered with empathy and
              precision.
            </p>

            <div class="about-mv">
              <div class="about-mv__card about-mv__card--teal">
                <div class="about-mv__icon about-mv__icon--teal">${icon('target')}</div>
                <h3 class="about-mv__title">Our Mission</h3>
                <p class="about-mv__text">
                  "Personalized healing through advanced technology and compassionate human touch."
                </p>
              </div>
              <div class="about-mv__card about-mv__card--orange">
                <div class="about-mv__icon about-mv__icon--orange">${icon('eye')}</div>
                <h3 class="about-mv__title">Our Vision</h3>
                <p class="about-mv__text">
                  "Setting the global standard for accessible and ethical medical excellence."
                </p>
              </div>
            </div>
          </div>

          <div class="about-figure" data-reveal="up">
            <div class="about-figure__frame">
              <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-4.0.3&amp;auto=format&amp;fit=crop&amp;w=1000&amp;q=80"
                alt="Medical Excellence">
            </div>
            <div class="about-figure__shape about-figure__shape--a"></div>
            <div class="about-figure__shape about-figure__shape--b"></div>
          </div>
        </div>

        <div class="about-stats" data-reveal="up-lg">
${ABOUT_STATS.map(([label, value]) => `          <div class="about-stat">
            <p class="about-stat__label">${label}</p>
            <p class="about-stat__value"><span class="about-stat__dot">.</span>${value}</p>
          </div>`).join('\n')}
        </div>
      </div>
    </section>

    <section class="mk-section">
      <div class="mk-orb mk-orb--tl"></div>
      <div class="mk-orb mk-orb--br"></div>

      <div class="mk-section__inner">
        <div class="values-head">
          <div class="values-head__text">
            <span class="mk-eyebrow" data-reveal="up">Our Identity</span>
            <h2 class="values-head__title" data-reveal="up">
              Our <span class="values-head__gradient">Core Values</span><br>
              <span class="values-head__sub">Values that Drive Us</span>
            </h2>
          </div>
          <div class="values-head__rule" data-reveal="scale-sm"><span></span></div>
        </div>

        <div class="values-grid">
${VALUES.map(([ic, cls, title, text], i) => `          <div class="value-card ${cls}" data-reveal="up-lg" data-reveal-delay="${i * 100}">
            <div class="value-card__pattern">${gridPattern(i)}</div>
            <div class="value-card__glow"></div>
            <div class="value-card__inner">
              <div class="value-card__icon-outer">
                <div class="value-card__icon">${icon(ic)}</div>
              </div>
              <h3 class="value-card__title">${title}</h3>
              <p class="value-card__text">${text}</p>
            </div>
            <div class="value-card__rule"><span></span></div>
          </div>`).join('\n')}
        </div>
      </div>
    </section>

    <section class="mk-section mk-section--sm mk-section--gray">
      <div class="mk-section__inner">
        <div class="mk-head" style="margin-bottom:1.5rem">
          <span class="mk-eyebrow">Our Path</span>
          <h2 class="mk-title" style="margin-bottom:0">Historical <span>Milestones</span></h2>
        </div>

        <div class="timeline">
          <div class="timeline__spine"><span></span></div>

          <div>
${MILESTONES.map(([year, title, desc, img], i) => `            <div class="milestone${i % 2 === 1 ? ' milestone--flip' : ''}" data-reveal="up-xl">
              <div class="milestone__text">
                <div class="milestone__group">
                  <h3 class="milestone__ghost">${year}</h3>
                  <div class="milestone__year">${year}</div>
                  <h4 class="milestone__title">${title}</h4>
                  <p class="milestone__desc">${desc}</p>
                </div>
              </div>

              <div class="milestone__dot"><i></i><span></span></div>

              <div class="milestone__media">
                <div class="milestone__figure">
                  <img src="${asset(img)}" alt="${esc(title)}">
                  <div class="milestone__cap">
                    <i></i>
                    <span>View Details</span>
                  </div>
                </div>
              </div>
            </div>`).join('\n')}
          </div>
        </div>
      </div>
    </section>

    <section class="mk-section mk-section--sm">
      <div class="mk-section__inner">
        <div class="about-cta">
          <div class="about-cta__orb-a"></div>
          <div class="about-cta__orb-b"></div>

          <div class="about-cta__inner">
            <div data-reveal="scale-sm">
              <h2 class="about-cta__title">
                Join Our Family of <br class="about-cta__br">
                Healthy, Happy <span>Patients</span>
              </h2>
              <p class="about-cta__lede">
                Trust Janani Hospital for world-class medical attention. Our team of specialists is ready to provide
                the best care 24/7.
              </p>

              <div class="about-cta__actions">
                <a href="${P('contact.html')}" class="about-cta__btn about-cta__btn--light">
                  ${icon('clock')}
                  <span>Book Appointment</span>
                </a>
                <a href="${P('contact.html')}" class="about-cta__btn about-cta__btn--ghost">
                  ${icon('phone')}
                  <span>Contact Us</span>
                </a>
              </div>

              <div class="about-cta__badges">
                <div>${icon('check-circle')} <span>24/7 Emergency</span></div>
                <div>${icon('check-circle')} <span>Expert Specialists</span></div>
                <div>${icon('check-circle')} <span>Advanced Facilities</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>`,
});

/* ==========================================================================
   CONTACT  (/contact)
   ========================================================================== */
const QUICK = [
  ['calendar', 'q-teal', 'Book Appointment', 'Schedule a consultation with our specialists'],
  ['alert-triangle', 'q-red', 'Emergency Care', '24/7 emergency medical services available'],
  ['user', 'q-blue', 'Patient Portal', 'Access your medical records and reports'],
];

const CONTACT_INFO = [
  ['phone', 't-red', 'Call Us', '+91 70908 31208\n24/7 Emergency Hotline'],
  ['mail', 't-blue', 'Email Us', 'Jananihospital2018@gmail.com'],
  ['clock', 't-orange', 'Hours', '24/7 Emergency Care\nOPD: 8:00 AM - 8:00 PM'],
];

const contactField = (id, type, label, placeholder, required) => `                <div>
                  <label for="${id}" class="contact-label">${label}</label>
                  <input type="${type}" id="${id}" name="${id}"${required ? ' required' : ''} class="contact-input"
                    placeholder="${placeholder}">
                </div>`;

out['contact.html'] = page({
  root: ROOT, pageId: 'contact', title: 'Contact Us - Janani Hospital',
  description: "Have questions about your health? Our expert team is here to help you 24/7 with compassionate care and medical excellence.",
  canonical: 'pages/contact.html',
  css: ['pages.css', 'marketing.css'], js: ['reveal.js'],
  icons: ['phone', 'arrow-right', 'calendar', 'alert-triangle', 'user', 'send', 'mail', 'clock'],
  body: `  <main class="mk">

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
                ${icon('phone', 'icon--lg')}
                <span>Emergency Call</span>
              </a>
              <a href="${P('contact.html')}" class="mk-btn mk-btn--teal">
                <span>Book Appointment</span>
                ${icon('arrow-right', 'icon--lg')}
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
${QUICK.map(([ic, cls, title, text], i) => `          <div class="quick-card ${cls}" data-reveal="up-lg" data-reveal-delay="${i * 100}">
            <div class="quick-card__icon">${icon(ic)}</div>
            <h3 class="quick-card__title">${title}</h3>
            <p class="quick-card__text">${text}</p>
            <div class="quick-card__rule"><span></span></div>
          </div>`).join('\n')}
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
${contactField('name', 'text', 'Full Name *', 'Enter your full name', true)}
${contactField('email', 'email', 'Email Address *', 'Enter your email', true)}
                </div>

${contactField('phone', 'tel', 'Phone Number', 'Enter your phone number', false)}

                <div>
                  <label for="message" class="contact-label">Message *</label>
                  <textarea id="message" name="message" required rows="4" class="contact-input"
                    placeholder="Tell us about your medical concern or question..."></textarea>
                </div>

                <button type="submit" class="contact-submit">
                  ${icon('send')}
                  <span>Send Message</span>
                </button>
              </form>
            </div>
          </div>

          <div data-reveal="right">
            <div class="contact-info">
${CONTACT_INFO.map(([ic, cls, title, text], i) => `              <div class="info-tile ${cls}" data-reveal="up" data-reveal-delay="${i * 100}">
                <div class="info-tile__icon">${icon(ic)}</div>
                <h3 class="info-tile__title">${title}</h3>
                <p class="info-tile__text">${esc(text)}</p>
                <div class="info-tile__rule"><span></span></div>
              </div>`).join('\n')}
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>`,

});

/* ==========================================================================
   BOOK APPOINTMENT  (/appointment and /book-appointment)
   ========================================================================== */
const SERVICES = ['IVF & Fertility', 'Pediatrics', 'OBG', 'General Medicine',
  'Surgery', 'Orthopedics', 'Urology', 'Laparoscopy'];
const SLOTS = ['09:00 AM', '09:30 AM', '10:00 AM', '10:30 AM', '11:00 AM',
  '11:30 AM', '04:00 PM', '04:30 PM', '05:00 PM', '05:30 PM'];

const options = (list, placeholder) =>
  [`                      <option value="">${placeholder}</option>`]
    .concat(list.map((v) => `                      <option value="${esc(v)}">${esc(v)}</option>`))
    .join('\n');

out['book-appointment.html'] = page({
  root: ROOT, pageId: 'book-appointment', title: 'Book an Appointment - Janani Hospital',
  description: 'Book your appointment online and receive instant confirmation via email.',
  canonical: 'pages/book-appointment.html',
  css: ['pages.css', 'forms.css'], js: ['appointment.js'],
  icons: ['home', 'check-circle', 'calendar', 'activity', 'user', 'clock', 'phone',
    'mail', 'message-square'],
  body: `  <main class="page">
${breadcrumb()}

    <div class="page__inner page__inner--md">
      <div class="appt">
        <div class="appt__grid">

          <div class="appt__aside">
            <div class="appt__aside-inner">
              <h1 class="appt__title">Schedule Your Visit</h1>
              <p class="appt__lede">
                Book your appointment online and receive instant confirmation via email. We're here to provide the
                best care for you and your family.
              </p>

              <div class="appt__points">
                <div class="appt__point">
                  <div class="appt__point-icon">${icon('check-circle')}</div>
                  <div>
                    <p class="appt__point-title">Instant Confirmation</p>
                    <p class="appt__point-sub">Automated email to patient &amp; doctor</p>
                  </div>
                </div>
                <div class="appt__point">
                  <div class="appt__point-icon">${icon('calendar')}</div>
                  <div>
                    <p class="appt__point-title">Flexible Timing</p>
                    <p class="appt__point-sub">Choose your preferred slot</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="appt__hotline">
              <p class="appt__hotline-label">Emergency Hotline</p>
              <p class="appt__hotline-number">+91 123 456 7890</p>
            </div>

            <div class="appt__orb appt__orb--a"></div>
            <div class="appt__orb appt__orb--b"></div>
          </div>

          <div class="appt__form-col">
            <form class="appt-form" data-appointment-form>
              <div class="appt-form__row">
                <div class="appt-field">
                  <label for="service" class="appt-field__label">
                    ${icon('activity')} Select Service
                  </label>
                  <select id="service" name="service" required class="appt-input">
${options(SERVICES, 'Choose Service')}
                  </select>
                </div>

                <div class="appt-field">
                  <label for="doctor" class="appt-field__label">
                    ${icon('user')} Select Doctor
                  </label>
                  <select id="doctor" name="doctor" required class="appt-input">
${options(DOCTORS.map((d) => d.name), 'Choose Doctor')}
                  </select>
                </div>
              </div>

              <div class="appt-form__row">
                <div class="appt-field">
                  <label for="date" class="appt-field__label">
                    ${icon('calendar')} Appointment Date
                  </label>
                  <input type="date" id="date" name="date" required class="appt-input">
                </div>

                <div class="appt-field">
                  <label for="time" class="appt-field__label">
                    ${icon('clock')} Preferred Time
                  </label>
                  <select id="time" name="time" required class="appt-input">
${options(SLOTS, 'Choose Time Slot')}
                  </select>
                </div>
              </div>

              <div class="appt-field">
                <label for="name" class="appt-field__label">
                  ${icon('user')} Full Name
                </label>
                <input type="text" id="name" name="name" required class="appt-input"
                  placeholder="Enter patient's full name">
              </div>

              <div class="appt-form__row">
                <div class="appt-field">
                  <label for="phone" class="appt-field__label">
                    ${icon('phone')} Phone Number
                  </label>
                  <input type="tel" id="phone" name="phone" required class="appt-input"
                    placeholder="e.g. +91 98765 43210">
                </div>
                <div class="appt-field">
                  <label for="email" class="appt-field__label">
                    ${icon('mail')} Email Address
                  </label>
                  <input type="email" id="email" name="email" required class="appt-input"
                    placeholder="e.g. patient@example.com">
                </div>
              </div>

              <div class="appt-field">
                <label for="message" class="appt-field__label">
                  ${icon('message-square')} Reason for Visit (Optional)
                </label>
                <textarea id="message" name="message" rows="3" class="appt-input"
                  placeholder="Briefly describe your symptoms or concern..."></textarea>
              </div>

              <button type="submit" class="appt-submit" data-appointment-submit>
                <span data-appointment-label>Confirm Appointment</span>
                ${icon('check-circle')}
              </button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </main>`,
});

/* ==========================================================================
   BOOK A LAB TEST  (/book-lab-test)
   ========================================================================== */
const LAB_FIELDS = [
  ['name', 'text', 'Full Name', 'John Doe', 'user', true],
  ['email', 'email', 'Email', 'you@example.com', 'mail', true],
  ['phone', 'tel', 'Phone', '123-456-7890', 'phone', false],
];

out['book-lab-test.html'] = page({
  root: ROOT, pageId: 'book-lab-test', title: 'Book a Lab Test - Janani Hospital',
  description: 'Schedule your diagnostic tests with ease at Janani Hospital.',
  canonical: 'pages/book-lab-test.html',
  css: ['forms.css'], js: ['lab-test.js'],
  icons: ['user', 'mail', 'phone', 'send'],
  body: `  <main class="lab">
    <div class="container">
      <div class="lab__card">
        <div class="lab__head">
          <h1 class="lab__title">Book a Lab Test</h1>
          <p class="lab__lede">Schedule your diagnostic tests with ease.</p>
        </div>

        <form class="lab-form" data-lab-form>
${LAB_FIELDS.map(([id, type, label, placeholder, ic, required]) => `          <div>
            <label for="${id}" class="lab-label">${label}</label>
            <div class="lab-control">
              <div class="lab-control__icon">${icon(ic)}</div>
              <input type="${type}" name="${id}" id="${id}" class="lab-input" placeholder="${placeholder}"${required ? ' required' : ''}>
            </div>
          </div>`).join('\n')}

          <div>
            <label for="test" class="lab-label">Select Test</label>
            <select id="test" name="test" class="lab-select">
              <option value="blood_test">Blood Test</option>
              <option value="urine_test">Urine Test</option>
              <option value="x_ray">X-Ray</option>
              <option value="mri">MRI Scan</option>
            </select>
          </div>

          <div>
            <button type="submit" class="lab-submit">
              ${icon('send')}
              Book Now
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>`,
});

/* ==========================================================================
   HEALTH PACKAGES  (/health-packages)
   ========================================================================== */
const PACKAGES = [
  { id: 'basic', name: 'Basic Health Check-up', price: '₹1,299', originalPrice: '₹1,999', discount: '35%', includes: ['Complete Blood Count', 'Blood Sugar Fasting', 'Liver Function Tests', 'Kidney Function Tests', 'Lipid Profile', 'ECG', 'Chest X-Ray', 'Doctor Consultation'], badge: 'Most Popular', from: '--teal-500', to: '--teal-600' },
  { id: 'comprehensive', name: 'Comprehensive Health Check-up', price: '₹2,499', originalPrice: '₹3,999', discount: '38%', includes: ['Everything in Basic', 'Thyroid Function Tests', 'Vitamin D3 & B12', 'TSH Profile', 'Urine Routine', 'Stress Test', 'Pap Smear Test', '2D Echo', 'Doctor Consultation'], badge: 'Recommended', from: '--blue-500', to: '--blue-600' },
  { id: 'executive', name: 'Executive Health Check-up', price: '₹4,999', originalPrice: '₹7,999', discount: '38%', includes: ['Everything in Comprehensive', 'Cardiac MRI', 'CT Scan', 'Pulmonary Function Test', 'Hormone Panel', 'Tumor Markers', 'Genetic Counseling', 'Nutrition Consultation', 'Senior Specialist Consultation'], badge: 'Premium', from: '--purple-500', to: '--purple-600' },
  { id: 'women', name: 'Women Health Package', price: '₹1,999', originalPrice: '₹2,999', discount: '33%', includes: ['CBC with ESR', 'Blood Sugar (Fasting & PP)', 'HbA1c', 'TSH Profile', 'Urine Routine & Culture', 'Pap Smear Test', 'USG Abdomen', 'Mammography', 'Bone Density Test', 'Gynecological Consultation'], badge: 'Popular', from: '--pink-500', to: '--pink-600' },
  { id: 'senior', name: 'Senior Citizen Package', price: '₹3,999', originalPrice: '₹5,999', discount: '33%', includes: ['Complete Blood Count', 'Kidney & Liver Function', 'Blood Sugar', 'Thyroid Function', 'Vitamin D3, B12', 'Bone Density Test', 'ECG & 2D Echo', 'Chest X-Ray', 'Urine Routine', 'Senior Specialist Consultation', 'Medication Review'], badge: 'Recommended', from: '--orange-500', to: '--orange-600' },
  { id: 'corporate', name: 'Corporate Health Package', price: '₹2,999', originalPrice: '₹4,999', discount: '40%', includes: ['Complete Blood Count', 'Basic Metabolic Panel', 'Liver Function Tests', 'Kidney Function Tests', 'ECG', 'Chest X-Ray', 'Doctor Consultation', 'Health Report Summary', 'Corporate Wellness Counseling'], badge: 'Corporate', from: '--green-500', to: '--green-600' },
  { id: 'dental', name: 'Dental Check-up', price: '₹799', originalPrice: '₹999', discount: '20%', includes: ['Oral Examination', 'Oral Health Screening', 'Dental X-Ray', 'Scaling & Polishing', 'Fluoride Treatment', 'Dental Consultation'], badge: null, from: '--cyan-500', to: '--teal-600' },
  { id: 'eye', name: 'Eye Check-up', price: '₹1,299', originalPrice: '₹1599', discount: '19%', includes: ['Vision Testing', 'Intraocular Pressure', 'Refraction Test', 'Slit Lamp Examination', 'Color Vision Test', 'Eye Examination', 'Ophthalmologist Consultation'], badge: null, from: '--violet-500', to: '--indigo-600' },
];

out['health-packages.html'] = page({
  root: ROOT, pageId: 'health-packages', title: 'Health Packages - Janani Hospital',
  description: 'Choose from our comprehensive health check-up packages.',
  canonical: 'pages/health-packages.html',
  css: ['forms.css'], js: ['packages.js'],
  icons: ['check-circle', 'calendar'],
  body: `  <main class="packages-page">
    <section class="packages">
      <div class="container">
        <div class="packages__head">
          <h1 class="packages__title">Our Health Packages</h1>
          <p class="packages__lede">Choose from our comprehensive health check-up packages.</p>
        </div>

        <div class="packages__grid">
${PACKAGES.map((p) => `          <div class="pkg" data-package="${p.id}" data-name="${esc(p.name)}"
            style="--pkg-from: var(${p.from}); --pkg-to: var(${p.to})">
${p.badge ? `            <div class="pkg__badge-wrap">
              <div class="pkg__badge">${p.badge}</div>
            </div>
` : ''}            <div class="pkg__head">
              <h3 class="pkg__name">${esc(p.name)}</h3>
              <div class="pkg__prices">
                <span class="pkg__price">${p.price}</span>
                <span class="pkg__was">${p.originalPrice}</span>
                <span class="pkg__off">${p.discount} OFF</span>
              </div>
            </div>
            <div class="pkg__body">
              <h4>Package Includes:</h4>
              <div class="pkg__list">
${p.includes.map((s) => `                <div class="pkg__item">${icon('check-circle')}<span>${esc(s)}</span></div>`).join('\n')}
              </div>
            </div>
            <div class="pkg__foot">
              <button type="button" class="pkg__select" data-package-select>
                ${icon('calendar')}
                <span data-package-label>Select Package</span>
              </button>
            </div>
          </div>`).join('\n')}
        </div>
      </div>
    </section>

    <template data-package-booking-template>
      <section class="pkg-booking is-visible" data-package-booking>
      <div class="container">
        <div class="pkg-booking__inner">
          <div class="pkg-booking__card">
            <h3 class="pkg-booking__title">Book: <span data-package-booking-name></span></h3>
            <p class="pkg-booking__lede">Fill in your details to schedule your appointment.</p>
          </div>
          <form class="pkg-booking__form" data-package-form>
            <button type="submit" class="pkg-booking__submit" data-package-submit>Book Appointment</button>
            </form>
          </div>
        </div>
      </section>
    </template>
  </main>`,
});

/* ==========================================================================
   GENERAL MEDICINE  (dynamic route /department/:id -> medicine)
   ========================================================================== */
const MED = {
  name: 'General Medicine',
  hero: '/General-Medicine.png',
  description: 'Our General Medicine department provides comprehensive primary care, focusing on prevention, diagnosis, and treatment of a wide range of health issues.',
  overviewStats: [
    ['users', '15K+', 'Patients Treated'], ['activity', '20+', 'Expert Physicians'],
    ['award', '95%', 'Recovery Rate'], ['clock', '24/7', 'Emergency Care'],
  ],
  highlights: ['Experienced General Physicians', 'Comprehensive Health Checkups',
    'Chronic Disease Management', 'Preventive Healthcare Programs',
    'Emergency Medicine Services', 'Geriatric Care'],
  services: [
    ['Primary Care', 'Comprehensive primary healthcare for all age groups.', '/general_medicine/Primary Care.jpg'],
    ['Health Checkups', 'Preventive health screening packages for early detection.', '/general_medicine/Health Checkups.jpg'],
  ],
  contact: { phone: '+91 70908 31208', email: 'Jananihospital2018@gmail.com', hours: '24/7 Emergency | OPD: 8 AM - 8 PM' },
  faq: [
    ['What conditions are treated in General Medicine?', 'We treat a wide range of conditions including infections, hypertension, diabetes, respiratory illnesses, and other non-surgical health problems.'],
    ['Do I need an appointment for a consultation?', 'While we accept walk-in patients, we highly recommend booking an appointment to avoid long waiting times.'],
  ],
};

out['department-medicine.html'] = page({
  root: ROOT, pageId: 'department-medicine', title: 'General Medicine - Janani Hospital',
  description: esc(MED.description),
  canonical: 'pages/department-medicine.html',
  css: ['department.css'], js: ['department.js'],
  icons: ['activity', 'calendar', 'phone', 'users', 'award', 'clock', 'check-circle',
    'mail', 'shield', 'arrow-right', 'chevron-down'],
  body: `  <main class="dept-page">

    <section class="dept-hero">
      <div class="dept-hero__bg" style="background-image: url('${asset(MED.hero)}')"></div>
      <div class="dept-hero__scrim"></div>
      <div class="dept-hero__inner">
        <div class="dept-hero__shell">
          <div class="dept-hero__content">
            <div class="dept-hero__head">
              <div class="dept-hero__badge">${icon('activity')}</div>
              <div>
                <h1 class="dept-hero__title">${MED.name}</h1>
                <p class="dept-hero__tagline">Comprehensive Medical Care</p>
              </div>
            </div>
            <p class="dept-hero__lede">${esc(MED.description)}</p>
            <div class="dept-hero__actions">
              <a href="${P('contact.html')}" class="dept-hero__btn dept-hero__btn--primary">
                ${icon('calendar')}
                <span>Book Consultation</span>
              </a>
              <a href="tel:+917090831208" class="dept-hero__btn dept-hero__btn--ghost">
                ${icon('phone')}
                <span>Call Now</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="dept-stats-bar dept-stats-bar--compact">
      <div class="container">
        <div class="dept-stats-bar__card">
          <div class="dept-stats-bar__grid">
${MED.overviewStats.map(([ic, value, label]) => `            <div class="dept-stat-cell">
              <div class="dept-stat-cell__icon">${icon(ic)}</div>
              <p class="dept-stat-cell__value">${value}</p>
              <p class="dept-stat-cell__label">${label}</p>
            </div>`).join('\n')}
          </div>
        </div>
      </div>
    </section>

    <section class="dept-overview">
      <div class="container">
        <div class="dept-overview__grid">
          <div class="dept-overview__main">
            <div class="dept-panel">
              <h2 class="dept-panel__title">
                <span class="dept-panel__bar"></span>
                Why Choose Our General Medicine Department?
              </h2>
              <div class="dept-grid-2">
${MED.highlights.map((h) => `                <div class="dept-tick">
                  <span class="dept-tick__mark">${icon('check-circle')}</span>
                  <span class="dept-tick__text">${h}</span>
                </div>`).join('\n')}
              </div>
            </div>
          </div>

          <div>
            <div class="dept-rail">
              <div class="dept-rail__head">
                <h3 class="dept-rail__title">Contact General Medicine</h3>
              </div>
              <div class="dept-rail__list">
${[['phone', 'Department Phone', MED.contact.phone], ['mail', 'Email Address', MED.contact.email], ['clock', 'Working Hours', MED.contact.hours]]
      .map(([ic, label, value]) => `                <div class="dept-rail__item">
                  <div class="dept-rail__icon">${icon(ic)}</div>
                  <div>
                    <p class="dept-rail__label">${label}</p>
                    <p class="dept-rail__value">${value}</p>
                  </div>
                </div>`).join('\n')}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="dept-section dept-section--white">
      <div class="container">
        <div class="dept-section__head" style="margin-bottom:2.5rem">
          <h2 class="dept-section__title">Our Services</h2>
        </div>
        <div class="dept-services dept-services--pair">
${MED.services.map(([name, desc, img]) => `          <article class="dept-service dept-service--plain">
            <div class="dept-service__media dept-service__media--plain">
              <img src="${asset(img)}" alt="${esc(name)}">
            </div>
            <div class="dept-service__body">
              <h3 class="dept-service__name dept-service__name--plain">${name}</h3>
              <p class="dept-service__desc">${desc}</p>
              <a href="${P('contact.html')}" class="dept-service__cta">
                <span>Book Consultation</span>
                ${icon('arrow-right')}
              </a>
            </div>
          </article>`).join('\n')}
        </div>
      </div>
    </section>

    <section class="dept-section dept-section--white">
      <div class="container">
        <div class="dept-section__head" style="margin-bottom:2.5rem">
          <h2 class="dept-section__title">Frequently Asked Questions</h2>
        </div>
        <div class="dept-faq">
${MED.faq.map(([q, a]) => `          <div class="dept-faq__item dept-faq__item--plain" data-faq-item>
            <button type="button" class="dept-faq__trigger" data-faq-trigger aria-expanded="false">
              <span class="dept-faq__q-text dept-faq__q-text--plain">${q}</span>
              <span class="dept-faq__chevron dept-faq__chevron--plain">${icon('chevron-down')}</span>
            </button>
            <div class="dept-faq__panel">
              <div class="dept-faq__answer dept-faq__answer--plain">${a}</div>
            </div>
          </div>`).join('\n')}
        </div>
      </div>
    </section>

  </main>`,
});

/* ========================================================================== */
for (const [file, html] of Object.entries(out)) {
  fs.writeFileSync(`website/pages/${file}`, html);
}
console.log(`generated ${Object.keys(out).length} pages:`, Object.keys(out).join(', '));
