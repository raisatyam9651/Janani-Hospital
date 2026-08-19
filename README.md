# Janani Hospital — static site

A plain HTML5 / CSS3 / vanilla-JavaScript replica of **https://jananihospitals.com**.
No framework, no build step, no runtime dependencies — upload the contents of
this folder to any static host and it runs.

Verified page-by-page against the live site: every page matches to the pixel at
1440px and 390px (identical page heights; the only residual difference is text
antialiasing, under 0.09%).

## Structure

```
website/
├── index.html            Home            (live route "/")
├── pages/                33 pages total  (see the route map below)
├── css/
│   ├── base.css          reset, design tokens, layout primitives, icon base
│   ├── layout.css        navbar + footer  (every page)
│   ├── home.css          home page sections
│   ├── department.css    the 15 department pages
│   ├── pages.css         breadcrumb, page shell, content pages
│   ├── forms.css         appointment / lab test / health packages
│   └── marketing.css     about + contact
├── js/
│   ├── icons.js          Feather icon registry (replaces react-icons/SafeIcon)
│   ├── layout.js         navbar: scroll state, mega menu, mobile menu
│   ├── reveal.js         scroll/mount entrance animations (replaces framer-motion)
│   ├── home.js           hero search, department carousel, sliders, FAQ
│   ├── department.js     department FAQ accordion
│   ├── accordion.js      generic single-open accordion
│   ├── gallery.js        gallery filter + lightbox
│   ├── doctors.js        doctor search + department filter
│   ├── appointment.js    appointment submit flow
│   ├── lab-test.js       lab-test submit
│   └── packages.js       health-package selection
└── assets/images/        139 images + 1 video, mirroring the original folders
```

## Route map

### Live pages

These are the pages jananihospitals.com serves, and what the navigation links to.

| Live route | File |
|---|---|
| `/` | `index.html` |
| `/about` | `pages/about.html` |
| `/contact` | `pages/contact.html` |
| `/appointment` | `pages/contact.html` (live renders Contact here) |
| `/department/{ivf,pediatrics,obg,medicine,surgery,ortho,urology,laparoscopy,neonatology,critical-care,anc,pain-clinic,infertility,endoscopy,hysteroscopy}` | `pages/department-{id}.html` |
| `/health-packages` | `pages/health-packages.html` |
| `/book-lab-test` | `pages/book-lab-test.html` |
| `/thank-you` | `pages/thank-you.html` |

Note: on the live site `/appointment` renders the Contact page, so every
"Book Appointment" / "Book Consultation" / "Book Now" button here links to
`pages/contact.html`.

### Built but not linked

These pages exist in `../src` but render blank on the live site — that
deployment predates them. They are converted and working, but nothing links to
them, so browsing this folder matches the live site exactly. Add them back to
`tools/lib/chrome.mjs` (navbar + `FOOTER_DEPTS`) whenever you deploy the newer
build.

| Source route | File |
|---|---|
| `/book-appointment` | `pages/book-appointment.html` |
| `/privacy` | `pages/privacy-policy.html` |
| `/gallery` | `pages/gallery.html` |
| `/blogs` | `pages/blogs.html` |
| `/careers` | `pages/careers.html` |
| `/doctors` | `pages/doctors.html` |
| `/doctor/{1..4}` | `pages/doctor-{id}.html` |
| `/patient-info` | `pages/patient-information.html` |
| `/appointment-confirmed` | `pages/appointment-confirmed.html` |

## Conventions

Each page declares two attributes on `<body>`:

```html
<body data-page="about" data-root="../">
```

* `data-page` — drives the active navbar link (`js/layout.js`). The header
  itself is transparent at the top of every page and turns opaque on scroll,
  exactly as the live site behaves.
* `data-root` — path back to the site root (`""` for `index.html`, `"../"` for
  everything in `pages/`). Used by the scripts that build links at runtime.

Icons are an inline `<symbol>` sprite at the top of each page, referenced with
`<svg class="icon"><use href="#i-name"></use></svg>`. The sprite is inlined
rather than loaded from a shared file so icons also render when a page is
opened directly off disk.

## Editing the shared header/footer

The navbar and footer markup is identical on every page (so it stays crawlable
without JavaScript). It is generated from a single source at
`../tools/lib/chrome.mjs`; after editing that file run:

```
node tools/build-departments.mjs
node tools/build-content.mjs
node tools/build-rest.mjs
```

from the repository root, then `node tools/sync-index-chrome.mjs` to copy the
same header/footer/sprite into the hand-authored `index.html`.

## Checking it against the live site

```
python -m http.server 8899 --directory website      # serve this folder
python tools/compare-live.py "/=/index.html" --widths=1440,390
python tools/verify-parity.py                       # home page behaviour
python tools/verify-pages.py                        # inner page behaviour
python tools/smoke.py                               # console errors / overflow
python tools/check-links.py                         # every local href resolves
```
