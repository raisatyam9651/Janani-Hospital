// Shared page chrome: <head>, icon sprite, navbar and footer.
// Every generated page pulls its header/footer from here so the markup can
// never drift between pages.
import fs from 'node:fs';

const ICONS = JSON.parse(fs.readFileSync('tools/icon-paths.json', 'utf8'));

/** Inline <symbol> sprite for the icons a page actually uses. */
export function sprite(names) {
  const uniq = [...new Set(names)].sort();
  const syms = uniq.map((n) => {
    const body = ICONS[n];
    if (!body) throw new Error(`unknown icon: ${n}`);
    return `      <symbol id="i-${n}" viewBox="0 0 24 24">${body}</symbol>`;
  }).join('\n');
  return `  <svg xmlns="http://www.w3.org/2000/svg" style="position:absolute;width:0;height:0;overflow:hidden"
    aria-hidden="true" focusable="false">
    <defs>
${syms}
    </defs>
  </svg>`;
}

export const icon = (name, cls = '') =>
  `<svg class="icon${cls ? ' ' + cls : ''}"><use href="#i-${name}"></use></svg>`;

/** Departments shown in the navbar mega menu + mobile accordion. */
export const NAV_DEPARTMENTS = [
  ['IVF &amp; Fertility', 'heart', 'ivf', 'Advanced reproductive treatments', true],
  ['Pediatrics', 'baby', 'pediatrics', 'Child healthcare services', true],
  ['OBG', 'users', 'obg', "Women's healthcare", true],
  ['General Medicine', 'activity', 'medicine', 'Primary care services', true],
  ['Surgery', 'scissors', 'surgery', 'Surgical procedures', true],
  ['Orthopedics', 'activity', 'ortho', 'Bone &amp; joint care', true],
  ['Urology', 'droplet', 'urology', 'Urinary system care', true],
  ['Laparoscopy', 'monitor', 'laparoscopy', 'Minimally invasive surgery', true],
  ['Neonatology', 'baby', 'neonatology', 'Newborn intensive care', false],
  ['Critical Care', 'heart', 'critical-care', 'ICU services', false],
  ['Antenatal Care', 'users', 'anc', 'Pregnancy care', false],
  ['Pain Clinic', 'activity', 'pain-clinic', 'Pain management', false],
  ['Infertility', 'heart', 'infertility', 'Fertility treatments', false],
  ['Endoscopy', 'eye', 'endoscopy', 'Diagnostic procedures', false],
  ['Hysteroscopy', 'eye', 'hysteroscopy', 'Uterine examination', false],
];

/** Icons the shared chrome always needs. */
export const CHROME_ICONS = [
  'activity', 'arrow-right', 'baby', 'calendar', 'chevron-down', 'clock',
  'droplet', 'eye', 'heart', 'mail', 'menu', 'monitor', 'phone', 'scissors',
  'users', 'x',
];

export const SITE_URL = 'https://jananihospitals.com';

export function head({ root, title, description, css, canonical = '', extraHead = '' }) {
  const img = 'https://images.unsplash.com/photo-1551190822-a9333d879b1f?ixlib=rb-4.0.3&amp;auto=format&amp;fit=crop&amp;w=1200&amp;q=80';
  const url = `${SITE_URL}/${canonical}`;
  const sheets = ['base.css', 'layout.css', ...css]
    .map((f) => `  <link rel="stylesheet" href="${root}css/${f}">`).join('\n');
  return `<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/png" href="${root}assets/images/logo.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>${title}</title>
  <meta name="description" content="${description}">
  <meta name="keywords"
    content="Janani Hospital, hospital, healthcare, multispeciality, surgery, IVF, pediatrics, OBG, medicine">
  <meta name="author" content="Janani Hospital">
  <link rel="canonical" href="${url}">

  <meta property="og:title" content="${title}">
  <meta property="og:description" content="${description}">
  <meta property="og:type" content="website">
  <meta property="og:url" content="${url}">
  <meta property="og:image" content="${img}">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="${title}">
  <meta name="twitter:description" content="${description}">
  <meta name="twitter:image" content="${img}">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"
    rel="stylesheet">

${sheets}${extraHead ? '\n' + extraHead : ''}
</head>`;
}

export function navbar(root) {
  const home = root ? `${root}index.html` : 'index.html';
  const p = (f) => `${root}pages/${f}`;

  const tiles = NAV_DEPARTMENTS.map(([name, ic, id, desc, high]) => `          <a href="${p(`department-${id}.html`)}" class="dept-tile">
            <span class="dept-tile__icon">${icon(ic)}</span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">${name}</span>${high ? '\n                <span class="dept-tile__dot"></span>' : ''}
              </span>
              <span class="dept-tile__desc">${desc}</span>
            </span>
          </a>`).join('\n');

  const mobileDepts = NAV_DEPARTMENTS.map(([name, ic, id, , high]) =>
    `            <a href="${p(`department-${id}.html`)}" class="mobile-dept">${icon(ic)}<span class="mobile-dept__name">${name}</span>${high ? '<span class="mobile-dept__dot"></span>' : ''}</a>`).join('\n');

  const link = (href, page, label) =>
    `        <a href="${href}" class="nav-link" data-nav="${page}">${label}</a>`;

  return `<nav class="site-nav" data-site-nav>
    <div class="shell">
      <div class="site-nav__bar">

        <a href="${home}" class="site-nav__logo" aria-label="Janani Hospital — home">
          <img src="https://res.cloudinary.com/damfndmrm/image/upload/v1767163208/logo_eqtacj.png"
            alt="Janani Hospital">
          <span class="site-nav__logo-text"></span>
        </a>

        <div class="site-nav__menu">
${link(p('about.html'), 'about', 'About')}

          <div class="nav-dropdown" data-dropdown>
            <button type="button" class="nav-dropdown__trigger" data-dropdown-trigger aria-expanded="false"
              aria-haspopup="true">
              <span>Departments</span>
              ${icon('chevron-down', 'nav-dropdown__chevron')}
            </button>

            <div class="nav-dropdown__panel">
              <div class="nav-dropdown__head">
                <div>
                  <h4 class="nav-dropdown__title">Medical Departments</h4>
                  <p class="nav-dropdown__subtitle">All specialties in one place</p>
                </div>
                <a href="${p('contact.html')}" class="nav-dropdown__cta">
                  ${icon('calendar')}
                  <span>Book Now</span>
                </a>
              </div>

              <div class="nav-dropdown__grid">
${tiles}
              </div>
            </div>
          </div>

${link(p('contact.html'), 'contact', 'Contact')}
        </div>

        <div class="site-nav__cta">
          <a href="${p('contact.html')}" class="btn-book">
            ${icon('calendar', 'btn-book__icon')}
            <span>Book Appointment</span>
          </a>
        </div>

        <button type="button" class="nav-toggle" data-menu-toggle aria-expanded="false" aria-label="Open menu"
          aria-controls="mobile-menu">
          ${icon('menu', 'nav-toggle__open')}
          ${icon('x', 'nav-toggle__close')}
        </button>
      </div>

      <div class="mobile-menu" id="mobile-menu" data-mobile-menu>
        <div class="mobile-menu__list">
          <a href="${home}" class="mobile-link" data-nav="home">
            <span class="mobile-link__icon mobile-link__icon--emerald">${icon('heart')}</span>
            <span>Home</span>
          </a>
          <a href="${p('about.html')}" class="mobile-link" data-nav="about">
            <span class="mobile-link__icon mobile-link__icon--teal">${icon('users')}</span>
            <span>About</span>
          </a>

          <div class="mobile-accordion" data-mobile-accordion>
            <button type="button" class="mobile-accordion__trigger" data-mobile-accordion-trigger
              aria-expanded="false">
              <span class="mobile-accordion__label">
                <span class="mobile-link__icon mobile-link__icon--emerald">${icon('monitor')}</span>
                <span>Departments</span>
              </span>
              ${icon('chevron-down', 'mobile-accordion__chevron')}
            </button>
            <div class="mobile-accordion__panel">
${mobileDepts}
            </div>
          </div>

          <a href="${p('contact.html')}" class="mobile-link" data-nav="contact">
            <span class="mobile-link__icon mobile-link__icon--purple">${icon('activity')}</span>
            <span>Contact</span>
          </a>

          <a href="${p('contact.html')}" class="mobile-menu__cta">
            ${icon('calendar')}
            <span>Book Appointment</span>
          </a>
        </div>
      </div>
    </div>
  </nav>`;
}

const FOOTER_QUICK = [
  ['IVF &amp; Fertility', 'department-ivf.html'], ['Pediatrics', 'department-pediatrics.html'],
  ['OBG', 'department-obg.html'], ['General Medicine', 'department-medicine.html'],
  ['Surgery', 'department-surgery.html'], ['Orthopedics', 'department-ortho.html'],
  ['Urology', 'department-urology.html'],
];
const FOOTER_DEPTS = [
  ['Laparoscopy', 'department-laparoscopy.html'], ['Neonatology', 'department-neonatology.html'],
  ['Critical Care', 'department-critical-care.html'], ['Antenatal Care', 'department-anc.html'],
  ['Pain Clinic', 'department-pain-clinic.html'], ['Infertility', 'department-infertility.html'],
  ['Endoscopy', 'department-endoscopy.html'],
];

export function footer(root) {
  const p = (f) => `${root}pages/${f}`;
  const list = (items) => items.map(([label, href]) =>
    `            <li><a href="${p(href)}" class="footer-link">${icon('arrow-right')}<span>${label}</span></a></li>`).join('\n');

  return `<footer class="site-footer">
    <div class="container site-footer__main">
      <div class="site-footer__grid">

        <div class="site-footer__brand">
          <div class="site-footer__brand-head">
            <img src="https://quest-media-storage-bucket.s3.us-east-2.amazonaws.com/1759402892809-logo.jpg"
              alt="Janani Hospital">
            <div>
              <h3 class="site-footer__brand-name">Janani Hospital</h3>
            </div>
          </div>
          <p class="site-footer__tagline">
            Providing exceptional healthcare services with compassion and cutting-edge technology. Your health and
            wellbeing is our priority.
          </p>
        </div>

        <div>
          <h4 class="site-footer__heading">Quick Links</h4>
          <ul class="site-footer__list site-footer__list--links">
${list(FOOTER_QUICK)}
          </ul>
        </div>

        <div>
          <h4 class="site-footer__heading">Departments</h4>
          <ul class="site-footer__list site-footer__list--depts">
${list(FOOTER_DEPTS)}
          </ul>
        </div>

        <div>
          <h4 class="site-footer__heading">Contact Us</h4>
          <div class="site-footer__contact">
            <div class="footer-contact">
              ${icon('phone')}
              <div>
                <p class="footer-contact__primary">+91 70908 31208</p>
                <p class="footer-contact__secondary">24/7 Emergency</p>
              </div>
            </div>
            <div class="footer-contact">
              ${icon('mail')}
              <div>
                <p class="footer-contact__primary">Jananihospital2018@gmail.com</p>
                <p class="footer-contact__secondary">General Inquiries</p>
              </div>
            </div>
            <div class="footer-contact">
              ${icon('clock')}
              <div>
                <p class="footer-contact__primary">24/7 Emergency</p>
                <p class="footer-contact__secondary">OPD: 8 AM - 8 PM</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="site-footer__bottom">
      <div class="container site-footer__bottom-inner">
        <p class="site-footer__legal">© 2026 Janani Hospital. All rights reserved.</p>
        <p class="site-footer__made">Made with ❤️ by <a href="https://brandingpioneers.com/">Branding Pioneers</a></p>
      </div>
    </div>
  </footer>`;
}

/** Assemble a complete page. */
export function page({ root, pageId, title, description, css, js, icons, body, canonical = '', extraHead = '' }) {
  const scripts = ['icons.js', 'layout.js', ...js]
    .map((f) => `  <script src="${root}js/${f}"></script>`).join('\n');
  return `<!doctype html>
<html lang="en">

${head({ root, title, description, css, canonical, extraHead })}

<body data-page="${pageId}" data-root="${root}">

${sprite([...CHROME_ICONS, ...icons])}

  ${navbar(root)}

${body}

  ${footer(root)}

${scripts}
</body>

</html>
`;
}
