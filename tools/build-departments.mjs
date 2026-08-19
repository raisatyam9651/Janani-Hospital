// Emits the 13 shared-template department pages from the data extracted out of
// the React components. IVF has its own layout and is generated separately.
import fs from 'node:fs';
import { page, icon } from './lib/chrome.mjs';

const departments = JSON.parse(fs.readFileSync('tools/departments.json', 'utf8'));
const prose = JSON.parse(fs.readFileSync('tools/dept-prose.json', 'utf8'));

const ROOT = '../';
const IMG = `${ROOT}assets/images`;
// Live maps /appointment to the Contact page, so every booking CTA lands there.
const APPT = `${ROOT}pages/contact.html`;

const esc = (s) => String(s)
  .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
// public/ paths keep their folder names under assets/images/. Some paths in the
// React source are already percent-encoded, so decode before re-encoding to
// avoid turning %20 into %2520.
const asset = (p) => (/^https?:\/\//.test(p)
  ? p.replace(/&/g, '&amp;')
  : IMG + encodeURI(decodeURI(p)).replace(/&/g, '&amp;'));
const ic = (o) => (o && o.__icon) || 'heart';

const GOOGLE_G = '<svg viewBox="0 0 24 24"><path d="M21.35,11.1H12.18V13.83H18.69C18.36,17.64 15.19,19.27 12.19,19.27C8.36,19.27 5,16.25 5,12.5C5,8.75 8.36,5.73 12.19,5.73C14.43,5.73 15.92,6.6 16.78,7.39L18.88,5.3C16.99,3.52 14.86,2.5 12.19,2.5C6.42,2.5 2,7.3 2,12.5C2,17.7 6.42,22.5 12.19,22.5C17.62,22.5 21.75,18.5 21.75,12.81C21.75,12.09 21.64,11.59 21.35,11.1Z" /></svg>';

const stars = (n) => Array.from({ length: n }, () => icon('star')).join('');

function build(id) {
  const d = departments[id].data;
  const t = prose[id];
  const icons = new Set(['calendar', 'phone', 'mail', 'clock', 'check-circle', 'monitor',
    'shield', 'award', 'star', 'arrow-right', 'chevron-down', 'users', t.heroIcon,
    t.heroBtn2.icon, t.railBtn2.icon, t.ctaBtn2.icon]);
  d.overviewStats.forEach((s) => icons.add(ic(s.icon)));
  d.services.forEach((s) => icons.add(ic(s.icon)));
  d.technology.forEach((s) => icons.add(ic(s.icon)));

  const compact = t.statsVariant === 'compact';

  const statCells = d.overviewStats.map((s) => `            <div class="dept-stat-cell">
              <div class="dept-stat-cell__icon">${icon(ic(s.icon))}</div>
              <p class="dept-stat-cell__value">${esc(s.number)}</p>
              <p class="dept-stat-cell__label">${esc(s.label)}</p>
            </div>`).join('\n');

  const highlights = d.highlights.map((h) => `              <div class="dept-tick">
                <span class="dept-tick__mark">${icon('check-circle')}</span>
                <span class="dept-tick__text">${esc(h)}</span>
              </div>`).join('\n');

  const technology = d.technology.map((tc) => `              <div class="dept-tech">
                <div class="dept-tech__row">
                  <div class="dept-tech__icon">${icon(ic(tc.icon))}</div>
                  <div class="dept-tech__body">
                    <h4 class="dept-tech__name">${esc(tc.name)}</h4>
                    <p class="dept-tech__desc">${esc(tc.description)}</p>
                  </div>
                </div>
              </div>`).join('\n');

  const railItems = [
    ['phone', 'Department Phone', d.contact.phone],
    ['mail', 'Email Address', d.contact.email],
    ['clock', 'Working Hours', d.contact.hours],
  ].map(([i, label, value]) => `              <div class="dept-rail__item">
                <div class="dept-rail__icon">${icon(i)}</div>
                <div>
                  <p class="dept-rail__label">${label}</p>
                  <p class="dept-rail__value">${esc(value)}</p>
                </div>
              </div>`).join('\n');

  const services = d.services.map((s) => {
    const shown = s.procedures.slice(0, 3).map((pr) =>
      `                    <span class="dept-chip-proc">${esc(pr)}</span>`).join('\n');
    const more = s.procedures.length > 3
      ? `\n                    <span class="dept-chip-more">+${s.procedures.length - 3} more</span>` : '';
    return `            <article class="dept-service">
              <div class="dept-service__media">
                <img src="${asset(s.image)}" alt="${esc(s.name)}">
              </div>
              <div class="dept-service__body">
                <h3 class="dept-service__name">${esc(s.name)}</h3>
                <div class="dept-service__count">
                  ${icon('users')}
                  <span class="dept-service__count-text"><strong>${esc(s.stats.patients)}</strong> Patients Treated</span>
                </div>
                <p class="dept-service__desc">${esc(s.description)}</p>
                <div class="dept-service__procs">
                  <p class="dept-service__procs-label">${esc(t.procLabel)}</p>
                  <div class="dept-service__chips">
${shown}${more}
                  </div>
                </div>
                <a href="${APPT}" class="dept-service__cta">
                  <span>Book Consultation</span>
                  ${icon('arrow-right')}
                </a>
              </div>
            </article>`;
  }).join('\n');

  const reviews = d.reviews.map((r) => `            <div class="dept-review">
              <div class="dept-review__head">
                <img class="dept-review__avatar" src="${r.image}" alt="${esc(r.name)}">
                <div>
                  <h4 class="dept-review__name">${esc(r.name)}</h4>
                  <div class="dept-review__stars" aria-label="${r.rating} out of 5 stars">${stars(r.rating)}</div>
                </div>
              </div>
              <p class="dept-review__text">"${esc(r.review)}"</p>
              <div class="dept-review__source">${GOOGLE_G}Verified on Google</div>
            </div>`).join('\n');

  const facilities = d.facilities.map((f) => `              <div class="dept-tick dept-tick--grow">
                <span class="dept-tick__mark">${icon('check-circle')}</span>
                <span class="dept-tick__text">${esc(f)}</span>
              </div>`).join('\n');

  const achievements = d.achievements.map((a) => `              <div class="dept-tick dept-tick--grow">
                <span class="dept-tick__mark">${icon('star')}</span>
                <span class="dept-tick__text">${esc(a)}</span>
              </div>`).join('\n');

  const faqs = d.faq.map((f) => `          <div class="dept-faq__item" data-faq-item>
            <button type="button" class="dept-faq__trigger" data-faq-trigger aria-expanded="false">
              <span class="dept-faq__q">
                <span class="dept-faq__q-mark">Q</span>
                <span class="dept-faq__q-text">${esc(f.question)}</span>
              </span>
              <span class="dept-faq__chevron">${icon('chevron-down')}</span>
            </button>
            <div class="dept-faq__panel">
              <div class="dept-faq__answer-wrap">
                <div class="dept-faq__answer-row">
                  <div class="dept-faq__answer">${esc(f.answer)}</div>
                </div>
              </div>
            </div>
          </div>`).join('\n');

  const body = `  <main class="dept-page">

    <section class="dept-hero">
      <div class="dept-hero__bg" style="background-image: url('${asset(d.hero)}')"></div>
      <div class="dept-hero__scrim"></div>
      <div class="dept-hero__inner">
        <div class="dept-hero__shell">
          <div class="dept-hero__content">
            <div class="dept-hero__head">
              <div class="dept-hero__badge">${icon(t.heroIcon)}</div>
              <div>
                <h1 class="dept-hero__title">${esc(d.name)}</h1>
                <p class="dept-hero__tagline">${esc(t.heroSubtitle)}</p>
              </div>
            </div>
            <p class="dept-hero__lede">${esc(d.description)}</p>
            <div class="dept-hero__actions">
              <a href="${APPT}" class="dept-hero__btn dept-hero__btn--primary">
                ${icon('calendar')}
                <span>Book Consultation</span>
              </a>
              <a href="tel:${d.contact.phone.replace(/\s/g, '')}" class="dept-hero__btn dept-hero__btn--ghost">
                ${icon(t.heroBtn2.icon)}
                <span>${esc(t.heroBtn2.label)}</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="dept-stats-bar${compact ? ' dept-stats-bar--compact' : ''}">
      <div class="container">
        <div class="dept-stats-bar__card">
          <div class="dept-stats-bar__grid">
${statCells}
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
                ${esc(t.whyHeading)}
              </h2>
              <div class="dept-grid-2">
${highlights}
              </div>
            </div>

            <div class="dept-panel">
              <h3 class="dept-panel__subtitle">
                <span class="dept-panel__subtitle-icon">${icon('monitor')}</span>
                Advanced Technology &amp; Equipment
              </h3>
              <div class="dept-grid-2">
${technology}
              </div>
            </div>
          </div>

          <div>
            <div class="dept-rail">
              <div class="dept-rail__head">
                <h3 class="dept-rail__title">${esc(t.contactTitle)}</h3>
                <p class="dept-rail__subtitle">${esc(t.contactSubtitle)}</p>
              </div>
              <div class="dept-rail__list">
${railItems}
              </div>
              <div class="dept-rail__actions">
                <a href="${APPT}" class="dept-rail__btn dept-rail__btn--primary">
                  ${icon('calendar')}
                  <span>Book Consultation</span>
                </a>
                <a href="tel:${d.contact.phone.replace(/\s/g, '')}" class="dept-rail__btn dept-rail__btn--ghost">
                  ${icon(t.railBtn2.icon)}
                  <span>${esc(t.railBtn2.label)}</span>
                </a>
              </div>
              <div class="dept-rail__note${t.emergencyAccent === 'red' ? ' dept-rail__note--red' : ''}">
                <p><strong>${esc(t.emergencyStrong)}</strong> ${esc(t.emergencyRest)}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="dept-section dept-section--white">
      <div class="container">
        <div class="dept-section__head">
          <div class="dept-pill-wrap"><span class="dept-pill-label dept-pill-label--teal">${esc(t.badges[0])}</span></div>
          <h2 class="dept-section__title">${esc(t.h2s[0])}</h2>
          <p class="dept-section__lede">${esc(t.leads[0])}</p>
        </div>
        <div class="dept-services">
${services}
        </div>
      </div>
    </section>

    <section class="dept-section dept-section--white">
      <div class="container">
        <div class="dept-section__head">
          <div class="dept-pill-wrap"><span class="dept-pill-label dept-pill-label--red">${esc(t.badges[1])}</span></div>
          <h2 class="dept-section__title">${esc(t.h2s[1])}</h2>
          <p class="dept-section__lede">${esc(t.leads[1])}</p>
        </div>
        <div class="dept-reviews">
${reviews}
        </div>
      </div>
    </section>

    <section class="dept-section dept-section--gray">
      <div class="container">
        <div class="dept-split">
          <div class="dept-panel dept-panel--bordered">
            <div class="dept-panel__header">
              <div class="dept-panel__header-icon">${icon('shield')}</div>
              <h3 class="dept-panel__header-title">World-Class Facilities</h3>
            </div>
            <div class="dept-stack">
${facilities}
            </div>
          </div>

          <div class="dept-panel dept-panel--bordered">
            <div class="dept-panel__header">
              <div class="dept-panel__header-icon">${icon('award')}</div>
              <h3 class="dept-panel__header-title">Our Achievements</h3>
            </div>
            <div class="dept-stack">
${achievements}
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="dept-section dept-section--white">
      <div class="container">
        <div class="dept-section__head">
          <div class="dept-pill-wrap"><span class="dept-pill-label dept-pill-label--teal">${esc(t.badges[2])}</span></div>
          <h2 class="dept-section__title">${esc(t.h2s[2])}</h2>
          <p class="dept-section__lede">${esc(t.leads[2])}</p>
        </div>

        <div class="dept-faq">
${faqs}
        </div>

        <div class="dept-cta">
          <div class="dept-cta__card">
            <h3 class="dept-cta__title">${esc(t.ctaTitle)}</h3>
            <p class="dept-cta__lede">${esc(t.stillLead)}</p>
            <div class="dept-cta__actions">
              <a href="${APPT}" class="dept-cta__btn dept-cta__btn--primary">
                ${icon('calendar')}
                <span>Schedule Consultation</span>
              </a>
              <a href="tel:${d.contact.phone.replace(/\s/g, '')}" class="dept-cta__btn dept-cta__btn--ghost">
                ${icon(t.ctaBtn2.icon)}
                <span>${esc(t.ctaBtn2.label)}</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>`;

  return page({
    root: ROOT,
    pageId: `department-${id}`,
    title: `${d.name} - Janani Hospital`,
    description: esc(d.description),
    canonical: `pages/department-${id}.html`,
    css: ['department.css'],
    js: ['department.js'],
    icons: [...icons],
    body,
  });
}

const ids = Object.keys(prose);
for (const id of ids) {
  fs.writeFileSync(`website/pages/department-${id}.html`, build(id));
}
console.log(`generated ${ids.length} department pages:`, ids.join(', '));
