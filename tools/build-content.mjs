// Emits the content pages: Privacy, Thank You, Blogs, Careers, Gallery,
// Our Doctors, Doctor Profile and Patient Information.
import fs from 'node:fs';
import { page, icon } from './lib/chrome.mjs';

const ROOT = '../';
const IMG = `${ROOT}assets/images`;
const P = (f) => `${ROOT}pages/${f}`;

const esc = (s) => String(s)
  .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
const attr = (s) => esc(s);
const remote = (u) => u.replace(/&/g, '&amp;');

/** Breadcrumb: every page passes `pageName`, which the component ignores. */
const breadcrumb = () => `    <nav class="breadcrumb" aria-label="Breadcrumb">
      <div class="breadcrumb__inner">
        <ol class="breadcrumb__list">
          <li class="breadcrumb__item">
            <span class="breadcrumb__current">${icon('home')}<span>Home</span></span>
          </li>
        </ol>
      </div>
    </nav>`;

const pageHead = (title, accent, lede) => `      <div class="page__head">
        <h1 class="page__title" data-reveal="up" data-reveal-on="mount">
          ${title} <span class="accent-emerald">${accent}</span>
        </h1>
        <p class="page__lede" data-reveal="up" data-reveal-on="mount" data-reveal-delay="100">
          ${lede}
        </p>
      </div>`;

const out = {};

/* ==========================================================================
   PRIVACY POLICY  (/privacy)
   ========================================================================== */
const LEGAL = [
  ['1. Introduction', `<p>At Janani Hospitals, we are committed to protecting your privacy and ensuring the security of your personal and medical information. This Privacy Policy outlines how we collect, use, and safeguard your data when you visit our website or use our services.</p>`],
  ['2. Information Collection', `<p>We collect information that you provide to us directly, such as when you book an appointment, fill out a contact form, or subscribe to our newsletter. This may include:</p>
              <ul>
                <li>Personal identification (Name, Email, Phone Number)</li>
                <li>Medical history and reason for visit (when booking appointments)</li>
                <li>Technical data (IP address, browser type, etc.)</li>
              </ul>`],
  ['3. Use of Information', `<p>The information we collect is used to:</p>
              <ul>
                <li>Schedule and manage medical appointments</li>
                <li>Communicate with you regarding your health and our services</li>
                <li>Send automated confirmation emails to patients and doctors</li>
                <li>Improve our website and patient experience</li>
              </ul>`],
  ['4. Data Security', `<p>We implement robust security measures to protect your data from unauthorized access, alteration, or disclosure. Medical records are handled with the highest level of confidentiality in compliance with healthcare regulations.</p>`],
  ['5. Third-Party Sharing', `<p>We do not sell or rent your personal information to third parties. We may share information with trusted service providers who assist us in operating our website or providing medical services, provided they agree to keep this information confidential.</p>`],
];

out['privacy-policy.html'] = page({
  root: ROOT, pageId: 'privacy', title: 'Privacy Policy - Janani Hospital',
  description: 'How Janani Hospital collects, uses and safeguards your personal and medical information.',
  canonical: 'pages/privacy-policy.html',
  css: ['pages.css'], js: [], icons: ['home'],
  body: `  <main class="page">
${breadcrumb()}

    <div class="page__inner page__inner--narrow">
      <div class="legal">
        <h1 class="legal__title">Privacy <span class="accent-emerald">Policy</span></h1>

        <div class="legal__body">
${LEGAL.map(([h, b]) => `          <section>
            <h2>${h}</h2>
            ${b}
          </section>`).join('\n\n')}

          <div class="legal__updated">
            Last updated: May 04, 2026
          </div>
        </div>
      </div>
    </div>
  </main>`,
});

/* ==========================================================================
   THANK YOU  (/thank-you and /appointment-confirmed)
   ========================================================================== */
const thanksBody = `  <main class="thanks">
    <div class="thanks__blob thanks__blob--a"></div>
    <div class="thanks__blob thanks__blob--b"></div>
    <div class="thanks__dots"></div>

    <div class="thanks__card" data-reveal="up" data-reveal-on="mount">
      <div class="thanks__mark">
        <span class="thanks__ping"></span>
        ${icon('check-circle')}
      </div>

      <h1 class="thanks__title">Thank You!</h1>

      <p class="thanks__text">
        Your message has been successfully sent. <br>
        We'll get back to you as soon as possible.
      </p>

      <div class="thanks__actions">
        <a href="${ROOT}index.html" class="thanks__btn thanks__btn--primary">
          ${icon('home')}
          <span>Back Home</span>
        </a>
        <a href="${P('about.html')}" class="thanks__btn thanks__btn--ghost">
          <span>About Us</span>
          ${icon('arrow-right')}
        </a>
      </div>
    </div>
  </main>`;

for (const file of ['thank-you.html', 'appointment-confirmed.html']) {
  out[file] = page({
    root: ROOT, pageId: 'thank-you', title: 'Thank You - Janani Hospital',
    description: 'Your message has been sent. The Janani Hospital team will get back to you shortly.',
    canonical: `pages/${file}`,
    css: ['pages.css'], js: ['reveal.js'], icons: ['check-circle', 'home', 'arrow-right'],
    body: thanksBody,
  });
}

/* ==========================================================================
   BLOGS  (/blogs)
   ========================================================================== */
const BLOGS = [
  { title: "Understanding Women's Health: Essential Checkups", excerpt: 'Regular health checkups are crucial for women at every stage of life. Learn about the essential tests and when to schedule them.', author: 'Dr. Janani S.', date: 'May 10, 2026', image: 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&q=80&w=800', category: "Women's Health" },
  { title: 'Modern Advances in IVF Technology', excerpt: 'In vitro fertilization has come a long way. Discover the latest techniques that are improving success rates for couples.', author: 'Dr. Ramesh Kumar', date: 'May 05, 2026', image: 'https://images.unsplash.com/photo-1581056771107-24ca5f033842?auto=format&fit=crop&q=80&w=800', category: 'Fertility' },
  { title: 'Pediatric Care: Common Childhood Illnesses', excerpt: 'A guide for parents on identifying and managing common illnesses in children, and when to seek professional medical help.', author: 'Dr. Priya Dharshini', date: 'April 28, 2026', image: 'https://images.unsplash.com/photo-1536640712247-c45474d8598b?auto=format&fit=crop&q=80&w=800', category: 'Pediatrics' },
];
const BLOG_CATEGORIES = ['General Medicine', "Women's Health", 'Pediatrics', 'Fertility', 'Surgery', 'Wellness'];

out['blogs.html'] = page({
  root: ROOT, pageId: 'blogs', title: 'Health Tips & Latest Updates - Janani Hospital',
  description: 'Stay informed with the latest medical insights, health advice, and news from Janani Hospitals.',
  canonical: 'pages/blogs.html',
  css: ['pages.css'], js: ['reveal.js'],
  icons: ['home', 'calendar', 'user', 'arrow-right', 'search'],
  body: `  <main class="page">
${breadcrumb()}

    <div class="page__inner">
${pageHead('Health Tips &amp;', 'Latest Updates', 'Stay informed with the latest medical insights, health advice, and news from Janani Hospitals.')}

      <div class="blog-layout">
        <div class="blog-layout__main">
${BLOGS.map((b, i) => `          <article class="blog-card" data-reveal="up-lg" data-reveal-delay="${i * 100}">
            <div class="blog-card__row">
              <div class="blog-card__media">
                <img src="${remote(b.image)}" alt="${attr(b.title)}">
                <span class="blog-card__tag">${esc(b.category)}</span>
              </div>
              <div class="blog-card__body">
                <div>
                  <div class="blog-card__meta">
                    <span>${icon('calendar')} ${esc(b.date)}</span>
                    <span>${icon('user')} ${esc(b.author)}</span>
                  </div>
                  <h2 class="blog-card__title">${esc(b.title)}</h2>
                  <p class="blog-card__excerpt">${esc(b.excerpt)}</p>
                </div>
                <button type="button" class="blog-card__more">Read More ${icon('arrow-right')}</button>
              </div>
            </div>
          </article>`).join('\n')}
        </div>

        <aside class="sidebar">
          <div class="side-card">
            <h3 class="side-card__title">Search</h3>
            <div class="side-search">
              <input type="text" id="blog-search" aria-label="Search articles"
                placeholder="Search articles...">
              ${icon('search')}
            </div>
          </div>

          <div class="side-card">
            <h3 class="side-card__title">Categories</h3>
            <ul class="side-list">
${BLOG_CATEGORIES.map((c) => `              <li>
                <button type="button">
                  <span>${esc(c)}</span>
                  <span class="side-list__count">12</span>
                </button>
              </li>`).join('\n')}
            </ul>
          </div>

          <div class="newsletter">
            <h3 class="newsletter__title">Stay Healthy!</h3>
            <p class="newsletter__text">
              Subscribe to our newsletter for weekly health tips and hospital updates.
            </p>
            <form class="newsletter__form">
              <input type="email" id="newsletter-email" aria-label="Your email address"
                placeholder="Your email address">
              <button type="button">Subscribe Now</button>
            </form>
          </div>
        </aside>
      </div>
    </div>
  </main>`,
});

/* ==========================================================================
   CAREERS  (/careers)
   ========================================================================== */
const JOBS = [
  { title: 'Senior Gynaecologist', department: 'OBG & Fertility', location: 'Janani Hospital, Main Branch', type: 'Full-Time', experience: '8+ Years' },
  { title: 'Registered Staff Nurse', department: 'Critical Care (ICU)', location: 'Janani Hospital, Main Branch', type: 'Full-Time', experience: '2-4 Years' },
  { title: 'Patient Relationship Manager', department: 'Administration', location: 'Janani Hospital, Main Branch', type: 'Full-Time', experience: '3+ Years' },
  { title: 'Lab Technician', department: 'Diagnostics', location: 'Janani Hospital, Main Branch', type: 'Full-Time', experience: '1-3 Years' },
];

out['careers.html'] = page({
  root: ROOT, pageId: 'careers', title: 'Careers - Janani Hospital',
  description: 'Join our exceptional team. Explore current openings at Janani Hospital.',
  canonical: 'pages/careers.html',
  css: ['pages.css'], js: ['reveal.js'],
  icons: ['home', 'map-pin', 'clock', 'briefcase', 'send'],
  body: `  <main class="page">
${breadcrumb()}

    <div class="careers-hero">
      <div class="careers-hero__bg">
        <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&amp;fit=crop&amp;q=80&amp;w=2000"
          alt="Hospital Team">
      </div>
      <div class="careers-hero__content">
        <h1 class="careers-hero__title" data-reveal="up-lg" data-reveal-on="mount">
          Join Our <span>Exceptional Team</span>
        </h1>
        <p class="careers-hero__lede" data-reveal="up-lg" data-reveal-on="mount" data-reveal-delay="100">
          Empowering healthcare professionals to deliver world-class patient care. Your journey to excellence starts
          here.
        </p>
      </div>
    </div>

    <div class="page__inner" style="margin-top:0">
      <div class="careers-layout">
        <div class="careers-layout__main">
          <h2 class="careers__heading">Current Openings</h2>
${JOBS.map((j, i) => `          <div class="job" data-reveal="left" data-reveal-delay="${i * 100}">
            <div class="job__row">
              <div>
                <span class="job__dept">${esc(j.department)}</span>
                <h3 class="job__title">${esc(j.title)}</h3>
                <div class="job__meta">
                  <span>${icon('map-pin')} ${esc(j.location)}</span>
                  <span>${icon('clock')} ${esc(j.type)}</span>
                  <span>${icon('briefcase')} ${esc(j.experience)} exp</span>
                </div>
              </div>
              <button type="button" class="job__apply">Apply Now</button>
            </div>
          </div>`).join('\n')}
        </div>

        <div class="careers-aside">
          <div class="careers-cv">
            <h3 class="careers-cv__title">Didn't find a role?</h3>
            <p class="careers-cv__text">
              We are always looking for talented individuals to join our team. Send us your CV for future
              opportunities.
            </p>
            <div>
              <div class="careers-cv__row">
                <div class="careers-cv__icon">${icon('send')}</div>
                <div>
                  <p class="careers-cv__label">Email your CV</p>
                  <p class="careers-cv__value">careers@jananihospital.com</p>
                </div>
              </div>
            </div>
          </div>

          <div class="careers-why">
            <div class="careers-why__inner">
              <h3 class="careers-why__title">Why Janani?</h3>
              <ul class="careers-why__list">
                <li><span class="careers-why__tick">✓</span>Modern medical infrastructure</li>
                <li><span class="careers-why__tick">✓</span>Continuous learning &amp; growth</li>
                <li><span class="careers-why__tick">✓</span>Supportive work environment</li>
              </ul>
            </div>
            <div class="careers-why__glow"></div>
          </div>
        </div>
      </div>
    </div>
  </main>`,
});

/* ==========================================================================
   GALLERY  (/gallery)
   ========================================================================== */
const GALLERY = [
  { type: 'image', src: 'WhatsApp Image 2026-04-25 at 3.00.53 PM.jpeg', category: 'Facilities', title: 'Hospital Entrance' },
  { type: 'image', src: 'WhatsApp Image 2026-04-25 at 3.01.07 PM.jpeg', category: 'Infrastructure', title: 'Reception Area' },
  { type: 'image', src: 'WhatsApp Image 2026-04-25 at 3.01.16 PM.jpeg', category: 'Facilities', title: 'Consultation Room' },
  { type: 'image', src: 'WhatsApp Image 2026-04-25 at 3.01.17 PM.jpeg', category: 'Infrastructure', title: 'Waiting Lounge' },
  { type: 'image', src: 'WhatsApp Image 2026-04-25 at 3.01.18 PM.jpeg', category: 'Facilities', title: 'Modern Equipment' },
  { type: 'video', src: 'WhatsApp Video 2026-04-25 at 3.10.10 PM.mp4', category: 'Infrastructure', title: 'Hospital Tour', thumbnail: 'WhatsApp Image 2026-04-25 at 3.03.13 PM.jpeg' },
  { type: 'image', src: 'WhatsApp Image 2026-04-25 at 3.03.14 PM.jpeg', category: 'Team', title: 'Our Medical Team' },
  { type: 'image', src: 'WhatsApp Image 2026-04-25 at 3.03.14 PM (1).jpeg', category: 'Events', title: 'Health Awareness Camp' },
];
const GALLERY_CATS = ['All', 'Infrastructure', 'Facilities', 'Team', 'Events'];
const gal = (f) => `${IMG}/gallery/${encodeURI(f)}`;

out['gallery.html'] = page({
  root: ROOT, pageId: 'gallery', title: 'Gallery - Janani Hospital',
  description: 'Explore our state-of-the-art facilities and glimpse into the care we provide at Janani Hospitals.',
  canonical: 'pages/gallery.html',
  css: ['pages.css'], js: ['reveal.js', 'gallery.js'],
  icons: ['home', 'play', 'maximize-2', 'x'],
  body: `  <main class="page">
${breadcrumb()}

    <div class="page__inner">
${pageHead('Visual', 'Showcase', 'Explore our state-of-the-art facilities and glimpse into the care we provide at Janani Hospitals.')}

      <div class="gallery-filters">
${GALLERY_CATS.map((c, i) => `        <button type="button" class="gallery-filter${i === 0 ? ' is-active' : ''}" data-gallery-filter="${c}">${c}</button>`).join('\n')}
      </div>

      <div class="gallery-grid">
${GALLERY.map((g, i) => `        <div class="gallery-item" data-gallery-item data-category="${attr(g.category)}" data-type="${g.type}"
          data-src="${gal(g.src)}" data-title="${attr(g.title)}" data-reveal="scale" data-reveal-on="mount"
          data-reveal-delay="${i * 100}">
          <div class="gallery-item__frame">
            <img src="${gal(g.type === 'video' ? g.thumbnail : g.src)}" alt="${attr(g.title)}">
          </div>
          <div class="gallery-item__overlay">
            <span class="gallery-item__cat">${esc(g.category)}</span>
            <h3 class="gallery-item__title">
              ${esc(g.title)}
              ${g.type === 'video' ? icon('play', 'icon--play') : icon('maximize-2')}
            </h3>
          </div>${g.type === 'video' ? `
          <div class="gallery-item__play">${icon('play')}</div>` : ''}
        </div>`).join('\n')}
      </div>

      <div class="lightbox" data-lightbox>
        <button type="button" class="lightbox__close" data-lightbox-close aria-label="Close">${icon('x')}</button>
        <div class="lightbox__stage" data-lightbox-panel>
          <div data-lightbox-stage style="width:100%;height:100%"></div>
          <div class="lightbox__caption">
            <h2 data-lightbox-title></h2>
            <p data-lightbox-category></p>
          </div>
        </div>
      </div>
    </div>
  </main>`,
});

/* ==========================================================================
   OUR DOCTORS  (/doctors) + DOCTOR PROFILE (/doctor/:id)
   ========================================================================== */
export const DOCTORS = [
  { id: 1, name: 'Dr. Janani Ramesh', specialty: 'IVF & Infertility Specialist', qualification: 'MBBS, DGO, ART Specialist', experience: '15+ Years', image: 'https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&fit=crop&q=80&w=600', description: 'Expert in reproductive medicine and advanced IVF procedures with a high success rate.', department: 'IVF & Fertility' },
  { id: 2, name: 'Dr. Ramesh Kumar', specialty: 'Senior Gynecologist', qualification: 'MBBS, MS (OBG)', experience: '20+ Years', image: 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&q=80&w=600', description: 'Specialized in high-risk pregnancy management and laparoscopic surgeries.', department: 'OBG' },
  { id: 3, name: 'Dr. Priya Dharshini', specialty: 'Pediatrician', qualification: 'MBBS, MD (Pediatrics)', experience: '10+ Years', image: 'https://images.unsplash.com/photo-1559839734-2b71f153678f?auto=format&fit=crop&q=80&w=600', description: 'Dedicated to providing compassionate and comprehensive care for infants and children.', department: 'Pediatrics' },
  { id: 4, name: 'Dr. Suresh Babu', specialty: 'Orthopedic Surgeon', qualification: 'MBBS, MS (Ortho)', experience: '12+ Years', image: 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&q=80&w=600', description: 'Specialist in joint replacement and sports medicine.', department: 'Orthopedics' },
];
const DEPTS = ['All', ...new Set(DOCTORS.map((d) => d.department))];

out['doctors.html'] = page({
  root: ROOT, pageId: 'doctors', title: 'Our Doctors - Janani Hospital',
  description: 'Highly qualified and experienced medical professionals dedicated to your health and well-being.',
  canonical: 'pages/doctors.html',
  css: ['pages.css'], js: ['reveal.js', 'doctors.js'],
  icons: ['home', 'search', 'filter', 'arrow-right', 'calendar'],
  body: `  <main class="page">
${breadcrumb()}

    <div class="page__inner">
${pageHead('Meet Our', 'Expert Doctors', 'Highly qualified and experienced medical professionals dedicated to your health and well-being.')}

      <div class="doctors-filters">
        <div class="doctors-search">
          ${icon('search')}
          <input type="text" id="doctor-search" data-doctor-search
            aria-label="Search by name or specialty" placeholder="Search by name or specialty...">
        </div>

        <div class="doctors-depts">
          ${icon('filter')}
          <div class="doctors-depts__list">
${DEPTS.map((d, i) => `            <button type="button" class="doctors-dept${i === 0 ? ' is-active' : ''}" data-doctor-dept="${attr(d)}">${esc(d)}</button>`).join('\n')}
          </div>
        </div>
      </div>

      <div class="doctors-grid">
${DOCTORS.map((d, i) => `        <div class="doctor-card" data-doctor data-name="${attr(d.name)}" data-specialty="${attr(d.specialty)}"
          data-dept="${attr(d.department)}" data-reveal="scale" data-reveal-on="mount"
          data-reveal-delay="${i * 50}">
          <div class="doctor-card__media">
            <img src="${remote(d.image)}" alt="${attr(d.name)}">
            <div class="doctor-card__hover">
              <a href="${P(`doctor-${d.id}.html`)}" class="doctor-card__view">
                <span>View Profile</span>
                ${icon('arrow-right')}
              </a>
            </div>
          </div>
          <div class="doctor-card__body">
            <h3 class="doctor-card__name">${esc(d.name)}</h3>
            <p class="doctor-card__specialty">${esc(d.specialty)}</p>
            <p class="doctor-card__desc">${esc(d.description)}</p>
            <div class="doctor-card__foot">
              <span class="doctor-card__exp">${esc(d.experience)} Exp</span>
              <a href="${P('book-appointment.html')}" class="doctor-card__book" title="Book Appointment">
                ${icon('calendar')}
              </a>
            </div>
          </div>
        </div>`).join('\n')}
      </div>

      <div class="doctors-empty" data-doctors-empty hidden>
        <p>No doctors found matching your criteria.</p>
      </div>
    </div>
  </main>`,
});

const SPECIALIZATIONS = ['Advanced IVF Procedures', 'Laparoscopic Surgery', 'High-Risk Pregnancy', 'Hormonal Management'];
const SCHEDULE = [
  ['Monday - Friday', '10:00 AM - 04:00 PM'],
  ['Saturday', '10:00 AM - 01:00 PM'],
  ['Sunday', 'Emergency On-call Only'],
];

for (const d of DOCTORS) {
  out[`doctor-${d.id}.html`] = page({
    // /doctor/:id is its own route, so the Doctors nav link is not active here.
    root: ROOT, pageId: 'doctor-profile', title: `${d.name} - Janani Hospital`,
    description: esc(d.description),
    canonical: `pages/doctor-${d.id}.html`,
    css: ['pages.css'], js: ['reveal.js'],
    icons: ['home', 'arrow-left', 'star', 'calendar', 'book-open', 'award', 'clock'],
    body: `  <main class="page">
${breadcrumb()}

    <div class="page__inner">
      <a href="${P('doctors.html')}" class="profile-back">
        ${icon('arrow-left')} Back to All Doctors
      </a>

      <div class="profile-layout">
        <div>
          <div class="profile-card" data-reveal="up" data-reveal-on="mount">
            <div class="profile-card__media">
              <img src="${remote(d.image)}" alt="${attr(d.name)}">
              <div class="profile-card__rating">${icon('star')} 4.9</div>
            </div>
            <div class="profile-card__body">
              <h1 class="profile-card__name">${esc(d.name)}</h1>
              <p class="profile-card__specialty">${esc(d.specialty)}</p>
              <div class="profile-card__stats">
                <div class="profile-stat">
                  <p class="profile-stat__label">Experience</p>
                  <p class="profile-stat__value">${esc(d.experience)}</p>
                </div>
                <div class="profile-stat">
                  <p class="profile-stat__label">Success Rate</p>
                  <p class="profile-stat__value">98%</p>
                </div>
              </div>
              <a href="${P('book-appointment.html')}" class="profile-card__cta">
                ${icon('calendar')}
                <span>Book Appointment</span>
              </a>
            </div>
          </div>
        </div>

        <div class="profile-layout__main">
          <div class="profile-panel" data-reveal="right" data-reveal-on="mount" data-reveal-delay="100">
            <h2 class="profile-panel__title">
              ${icon('book-open')} Professional Summary
            </h2>
            <p class="profile-panel__lede">
              ${esc(d.description)} ${esc(d.name)} is one of the leading specialists in ${esc(d.department)} with
              extensive clinical experience. Dedicated to providing personalized patient care and implementing the
              latest medical technologies to achieve the best possible outcomes.
            </p>

            <div class="profile-cols">
              <div>
                <h3>Qualifications</h3>
                <ul>
                  <li>${icon('award')} ${esc(d.qualification)}</li>
                  <li>${icon('award')} Fellowship in Reproductive Medicine</li>
                </ul>
              </div>
              <div>
                <h3>Specializations</h3>
                <ul>
${SPECIALIZATIONS.map((s) => `                  <li><span class="profile-dot"></span> ${esc(s)}</li>`).join('\n')}
                </ul>
              </div>
            </div>
          </div>

          <div class="profile-panel" data-reveal="right" data-reveal-on="mount" data-reveal-delay="200">
            <h2 class="profile-panel__title">
              ${icon('clock')} Working Hours
            </h2>
            <div class="profile-hours">
${SCHEDULE.map(([days, time]) => `              <div class="profile-hours__row">
                <span class="profile-hours__day">${days}</span>
                <span class="profile-hours__time">${time}</span>
              </div>`).join('\n')}
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>`,
  });
}

/* ==========================================================================
   PATIENT INFORMATION  (/patient-info)
   ========================================================================== */
const INFO_FAQ = [
  ['How do I book an appointment?', "You can book an appointment through our website's 'Book Appointment' page, or by calling our helpdesk at +91 123 456 7890."],
  ['What insurance providers do you work with?', 'We are empanelled with major insurance providers including Star Health, Apollo Munich, HDFC ERGO, and many others. Please check our insurance section for a full list.'],
  ['What are the visiting hours for inpatients?', 'Visiting hours are from 11:00 AM to 12:00 PM and 5:00 PM to 6:00 PM. Only one visitor is allowed per patient at a time.'],
  ['How can I get my lab reports?', 'Lab reports can be collected from the diagnostics department, or accessed online through our patient portal using your UHID.'],
];
const INSURERS = ['Star Health', 'Apollo Munich', 'HDFC ERGO', 'NIVA Bupa', 'Care Health', 'ICICI Lombard'];

const INFO_SECTIONS = [
  ['OPD Timings', 'clock', `            <div class="info-stack">
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
            </div>`],
  ['Visiting Hours', 'info', `            <div class="info-stack">
              <ul class="info-rows">
                <li><span>Morning Slot</span><span>11:00 AM - 12:00 PM</span></li>
                <li><span>Evening Slot</span><span>05:00 PM - 07:00 PM</span></li>
              </ul>
              <div class="info-box">
                <p>• Only one visitor pass per patient.</p>
                <p>• Children below 12 years are not allowed in the wards.</p>
              </div>
            </div>`],
  ['Admission &amp; Discharge', 'file-text', `            <div class="info-body">
              <h4>Admission Process:</h4>
              <p>Provide your doctor's admission advice at the registration desk. Carry valid ID proof and insurance
                documents.</p>
              <h4 class="is-spaced">Discharge Process:</h4>
              <p>Discharges are usually processed between 10:00 AM and 12:00 PM. All pending bills must be cleared
                before the discharge summary is handed over.</p>
            </div>`],
  ['Insurance &amp; TPA', 'shield', `            <div class="info-stack">
              <p style="color:var(--gray-600)">We provide cashless facilities for major insurance partners and TPAs.</p>
              <div class="info-chips">
${INSURERS.map((i) => `                <div class="info-chip">${i}</div>`).join('\n')}
              </div>
              <p class="info-fine">Please contact our insurance desk for the updated list of partners.</p>
            </div>`],
];

out['patient-information.html'] = page({
  root: ROOT, pageId: 'patient-info', title: 'Patient Information - Janani Hospital',
  description: 'Everything you need to know about your visit to Janani Hospitals.',
  canonical: 'pages/patient-information.html',
  css: ['pages.css'], js: ['reveal.js', 'accordion.js'],
  icons: ['home', 'clock', 'info', 'file-text', 'shield', 'plus', 'minus'],
  body: `  <main class="page">
${breadcrumb()}

    <div class="page__inner">
${pageHead('Essential', 'Patient Guide', 'Everything you need to know about your visit to Janani Hospitals.')}

      <div class="info-grid">
${INFO_SECTIONS.map(([title, ic, content], i) => `        <div class="info-card" data-reveal="up" data-reveal-delay="${i * 100}">
          <div class="info-card__head">
            <div class="info-card__icon">${icon(ic)}</div>
            <h2 class="info-card__title">${title}</h2>
          </div>
${content}
        </div>`).join('\n')}
      </div>

      <div class="info-faq-panel">
        <div class="info-faq__head">
          <h2 class="info-faq__title">Frequently Asked Questions</h2>
          <p class="info-faq__lede">Quick answers to common queries.</p>
        </div>

        <div class="info-faq__list" data-accordion>
${INFO_FAQ.map(([q, a]) => `          <div class="info-faq__item" data-accordion-item>
            <button type="button" class="info-faq__trigger" data-accordion-trigger aria-expanded="false">
              <span class="info-faq__q">${esc(q)}</span>
              ${icon('plus', 'info-faq__plus')}${icon('minus', 'info-faq__minus')}
            </button>
            <div class="info-faq__panel">
              <div class="info-faq__answer">${esc(a)}</div>
            </div>
          </div>`).join('\n')}
        </div>
      </div>
    </div>
  </main>`,
});

/* ========================================================================== */
for (const [file, html] of Object.entries(out)) {
  fs.writeFileSync(`website/pages/${file}`, html);
}
console.log(`generated ${Object.keys(out).length} content pages:`, Object.keys(out).join(', '));
