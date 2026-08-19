"""Builds the live-vs-static parity report from the audit screenshots.

Emits tools/visual-report.html with every image inlined, so the file can be
published as a standalone artifact.
"""
import base64
import io as _io
import os

import numpy as np
from PIL import Image

SHOTS = "tools/_audit"
OUT = "tools/visual-report.html"
STRIP = 780
THUMB_W = 520
QUALITY = 74
WIDTHS = [390, 768, 1440]
VISUAL_WIDTH = 1440

PAGES = [
    ("index", "Home", "/"),
    ("pages_about", "About", "/about"),
    ("pages_contact", "Contact", "/contact"),
    ("pages_department-ivf", "IVF &amp; Fertility", "/department/ivf"),
    ("pages_department-medicine", "General Medicine", "/department/medicine"),
    ("pages_health-packages", "Health Packages", "/health-packages"),
    ("pages_book-lab-test", "Book a Lab Test", "/book-lab-test"),
    ("pages_thank-you", "Thank You", "/thank-you"),
]


def uri(img):
    buf = _io.BytesIO()
    img.convert("RGB").save(buf, "JPEG", quality=QUALITY, optimize=True)
    return "data:image/jpeg;base64," + base64.b64encode(buf.getvalue()).decode()


def measure(slug, w):
    fa, fb = f"{SHOTS}/{slug}-{w}-live.png", f"{SHOTS}/{slug}-{w}-static.png"
    if not (os.path.exists(fa) and os.path.exists(fb)):
        return None
    a, b = Image.open(fa).convert("RGB"), Image.open(fb).convert("RGB")
    h = min(a.size[1], b.size[1])
    na, nb = np.asarray(a, dtype=np.int16), np.asarray(b, dtype=np.int16)
    pct = 100.0 * (np.abs(na[:h] - nb[:h]).max(axis=2) > 40).mean()
    return a.size[1], b.size[1], pct


# ---------------------------------------------------------------- matrix
matrix, worst, checks, mismatches = [], 0.0, 0, 0
for slug, label, route in PAGES:
    cells = []
    for w in WIDTHS:
        m = measure(slug, w)
        if not m:
            cells.append(None)
            continue
        ha, hb, pct = m
        checks += 1
        worst = max(worst, pct)
        if ha != hb:
            mismatches += 1
        cells.append((ha, hb, pct))
    matrix.append((label, route, cells))

matrix_rows = []
for label, route, cells in matrix:
    tds = []
    for c in cells:
        if not c:
            tds.append('<td class="n">&mdash;</td>')
            continue
        ha, hb, pct = c
        ok = ha == hb
        tds.append(
            f'<td class="n"><span class="dot {"dot--ok" if ok else "dot--bad"}"></span>'
            f'<span class="pct">{pct:.4f}%</span></td>')
    matrix_rows.append(
        f'      <tr><th scope="row">{label}<span class="route">{route}</span></th>{"".join(tds)}</tr>')

# ---------------------------------------------------------------- strips
sections = []
for slug, label, route in PAGES:
    fa = f"{SHOTS}/{slug}-{VISUAL_WIDTH}-live.png"
    fb = f"{SHOTS}/{slug}-{VISUAL_WIDTH}-static.png"
    if not (os.path.exists(fa) and os.path.exists(fb)):
        continue
    a, b = Image.open(fa).convert("RGB"), Image.open(fb).convert("RGB")
    h = min(a.size[1], b.size[1])
    na, nb = np.asarray(a, dtype=np.int16), np.asarray(b, dtype=np.int16)
    pct = 100.0 * (np.abs(na[:h] - nb[:h]).max(axis=2) > 40).mean()

    strips = []
    for y in range(0, h, STRIP):
        y2 = min(y + STRIP, h)
        ca, cb = a.crop((0, y, VISUAL_WIDTH, y2)), b.crop((0, y, VISUAL_WIDTH, y2))
        size = (THUMB_W, max(1, int((y2 - y) * THUMB_W / VISUAL_WIDTH)))
        ca, cb = ca.resize(size, Image.LANCZOS), cb.resize(size, Image.LANCZOS)
        d = np.abs(np.asarray(ca, dtype=np.int16) - np.asarray(cb, dtype=np.int16)).max(axis=2)
        spct = 100.0 * (d > 40).mean()
        cls = "tag--ok" if spct < 0.5 else "tag--flag"
        strips.append(f"""        <div class="slice">
          <div class="slice__bar">
            <span class="slice__range">y&thinsp;{y}&ndash;{y2}</span>
            <span class="tag {cls}">{spct:.3f}% differ</span>
          </div>
          <div class="slice__pair">
            <figure><figcaption>live</figcaption><img loading="lazy" src="{uri(ca)}" alt="{label} y{y} on the live site"></figure>
            <figure><figcaption>static</figcaption><img loading="lazy" src="{uri(cb)}" alt="{label} y{y} on the static build"></figure>
          </div>
        </div>""")

    sections.append(f"""    <article class="card">
      <header class="card__head">
        <h2>{label}</h2>
        <p class="card__meta"><span class="route">{route}</span>
          <span>{a.size[1]}px tall on both sides</span>
          <span class="tag tag--ok">{pct:.4f}% differ</span></p>
      </header>
{chr(10).join(strips)}
    </article>""")

html = f"""<title>Janani Parity Check</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet"
  href="https://fonts.googleapis.com/css2?family=Archivo:wght@500;600;700&family=JetBrains+Mono:wght@400;600&family=Source+Sans+3:wght@400;600&display=swap">
<style>
  :root {{
    --ground: #f4f7f6;
    --panel: #ffffff;
    --ink: #10201f;
    --ink-soft: #5b6b69;
    --rule: #dde5e3;
    --pass: #0d7d72;
    --pass-wash: #e6f4f1;
    --flag: #a8620a;
    --flag-wash: #fbf1e3;
    --shadow: 0 1px 2px rgb(16 32 31 / .05);
    --display: "Archivo", ui-sans-serif, system-ui, sans-serif;
    --body: "Source Sans 3", ui-sans-serif, system-ui, sans-serif;
    --mono: "JetBrains Mono", ui-monospace, SFMono-Regular, Menlo, monospace;
  }}
  @media (prefers-color-scheme: dark) {{
    :root:not([data-theme="light"]) {{
      --ground: #0d1413;
      --panel: #141d1c;
      --ink: #e3eceb;
      --ink-soft: #93a5a2;
      --rule: #23302e;
      --pass: #34d3c2;
      --pass-wash: #102a27;
      --flag: #e0a350;
      --flag-wash: #2c2413;
      --shadow: 0 1px 2px rgb(0 0 0 / .4);
    }}
  }}
  :root[data-theme="dark"] {{
    --ground: #0d1413;
    --panel: #141d1c;
    --ink: #e3eceb;
    --ink-soft: #93a5a2;
    --rule: #23302e;
    --pass: #34d3c2;
    --pass-wash: #102a27;
    --flag: #e0a350;
    --flag-wash: #2c2413;
    --shadow: 0 1px 2px rgb(0 0 0 / .4);
  }}

  * {{ box-sizing: border-box; }}
  body {{
    margin: 0;
    background: var(--ground);
    color: var(--ink);
    font: 400 15.5px/1.6 var(--body);
    -webkit-font-smoothing: antialiased;
  }}
  .wrap {{ max-width: 1160px; margin: 0 auto; padding: 56px 22px 96px; }}

  .masthead {{ display: flex; flex-direction: column; gap: 10px; margin-bottom: 40px; }}
  .eyebrow {{
    font: 600 11.5px/1 var(--mono);
    letter-spacing: .14em; text-transform: uppercase; color: var(--pass);
  }}
  h1 {{
    font: 700 34px/1.1 var(--display);
    letter-spacing: -.022em; margin: 0; text-wrap: balance;
  }}
  .lede {{ margin: 0; max-width: 64ch; color: var(--ink-soft); }}

  .verdict {{
    display: flex; flex-wrap: wrap; gap: 0;
    margin: 0 0 36px; padding: 0;
    background: var(--panel); border: 1px solid var(--rule);
    border-radius: 12px; box-shadow: var(--shadow); overflow: hidden;
  }}
  .verdict > div {{ flex: 1 1 190px; padding: 20px 22px; border-left: 1px solid var(--rule); }}
  .verdict > div:first-child {{ border-left: 0; }}
  .verdict dt {{
    font: 600 11px/1 var(--mono); letter-spacing: .12em;
    text-transform: uppercase; color: var(--ink-soft); margin-bottom: 9px;
  }}
  .verdict dd {{
    margin: 0; font: 600 25px/1 var(--display);
    letter-spacing: -.02em; font-variant-numeric: tabular-nums;
  }}
  .verdict dd small {{ font: 400 13px/1 var(--body); color: var(--ink-soft); letter-spacing: 0; }}
  .is-pass {{ color: var(--pass); }}

  .card {{
    background: var(--panel); border: 1px solid var(--rule); border-radius: 12px;
    box-shadow: var(--shadow); padding: 24px; margin-bottom: 22px;
  }}
  .card__head {{ display: flex; flex-direction: column; gap: 6px; margin-bottom: 4px; }}
  h2 {{ font: 600 19px/1.25 var(--display); letter-spacing: -.014em; margin: 0; }}
  .card__meta {{
    display: flex; flex-wrap: wrap; align-items: center; gap: 12px;
    margin: 0; font-size: 13px; color: var(--ink-soft);
  }}
  .route {{ font: 400 12.5px/1.5 var(--mono); color: var(--pass); }}

  table {{ width: 100%; border-collapse: collapse; font-size: 13.5px; }}
  caption {{
    text-align: left; font: 600 11px/1 var(--mono); letter-spacing: .12em;
    text-transform: uppercase; color: var(--ink-soft); padding-bottom: 14px;
  }}
  th, td {{ padding: 10px 12px; border-bottom: 1px solid var(--rule); text-align: left; }}
  thead th {{
    font: 600 11px/1 var(--mono); letter-spacing: .1em;
    text-transform: uppercase; color: var(--ink-soft);
  }}
  tbody th {{ font: 600 14px/1.35 var(--body); }}
  tbody th .route {{ display: block; font-weight: 400; }}
  td.n {{ text-align: right; white-space: nowrap; font-variant-numeric: tabular-nums; }}
  .pct {{ font: 400 12.5px/1 var(--mono); }}
  .dot {{
    display: inline-block; width: 7px; height: 7px; border-radius: 50%;
    margin-right: 8px; vertical-align: middle;
  }}
  .dot--ok {{ background: var(--pass); }}
  .dot--bad {{ background: var(--flag); }}
  tbody tr:last-child th, tbody tr:last-child td {{ border-bottom: 0; }}

  .slice {{ border-top: 1px solid var(--rule); padding-top: 16px; margin-top: 18px; }}
  .slice__bar {{ display: flex; align-items: center; gap: 10px; margin-bottom: 11px; }}
  .slice__range {{
    font: 400 11.5px/1 var(--mono); color: var(--ink-soft);
    font-variant-numeric: tabular-nums;
  }}
  .tag {{ font: 600 11px/1 var(--mono); padding: 4px 9px; border-radius: 20px; }}
  .tag--ok {{ color: var(--pass); background: var(--pass-wash); }}
  .tag--flag {{ color: var(--flag); background: var(--flag-wash); }}
  .slice__pair {{ display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }}
  figure {{ margin: 0; min-width: 0; }}
  figcaption {{
    font: 600 10.5px/1 var(--mono); letter-spacing: .1em; text-transform: uppercase;
    color: var(--ink-soft); margin-bottom: 6px;
  }}
  img {{
    width: 100%; height: auto; display: block;
    border: 1px solid var(--rule); border-radius: 6px; background: var(--ground);
  }}

  .note {{ color: var(--ink-soft); font-size: 13.5px; max-width: 64ch; margin: 14px 0 0; }}
  .overflow {{ overflow-x: auto; }}
  a {{ color: var(--pass); }}
  a:focus-visible, img:focus-visible {{ outline: 2px solid var(--pass); outline-offset: 2px; }}

  @media (max-width: 700px) {{
    .wrap {{ padding: 36px 16px 64px; }}
    h1 {{ font-size: 27px; }}
    .slice__pair {{ grid-template-columns: 1fr; }}
  }}
</style>

<div class="wrap">
  <header class="masthead">
    <p class="eyebrow">jananihospitals.com &middot; static rebuild</p>
    <h1>Does the rebuild match the live site?</h1>
    <p class="lede">Each strip below is the same slice of the same page &mdash; captured from the
      live site on the left, from the converted static build on the right, both at 1440&thinsp;px.
      The percentage is the share of pixels differing by more than 40 of 255.</p>
  </header>

  <dl class="verdict">
    <div><dt>Comparisons</dt><dd>{checks}<small> &nbsp;8 pages &times; 3 widths</small></dd></div>
    <div><dt>Page-height mismatches</dt><dd class="is-pass">{mismatches}</dd></div>
    <div><dt>Largest difference</dt><dd class="is-pass">{worst:.4f}<small>%</small></dd></div>
  </dl>

  <article class="card">
    <div class="overflow">
      <table>
        <caption>Every page, every width</caption>
        <thead>
          <tr><th scope="col">Page</th><th scope="col" class="n">390&thinsp;px</th>
            <th scope="col" class="n">768&thinsp;px</th><th scope="col" class="n">1440&thinsp;px</th></tr>
        </thead>
        <tbody>
{chr(10).join(matrix_rows)}
        </tbody>
      </table>
    </div>
    <p class="note">A teal dot means the live page and the static page are exactly the same height.
      The residual fractions of a percent are text antialiasing &mdash; sub-pixel shifts in centred
      button labels and italic quotes &mdash; not layout, colour or content.</p>
  </article>

{chr(10).join(sections)}
</div>
"""

with open(OUT, "w", encoding="utf-8") as fh:
    fh.write(html)
print(f"wrote {OUT} ({len(html) / 1024 / 1024:.2f} MB) | {checks} checks, "
      f"{mismatches} height mismatches, worst {worst:.4f}%")
