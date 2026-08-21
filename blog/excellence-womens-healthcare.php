<?php
/* Body only — metadata, hero, byline, CTA and schema come from
   includes/blog-posts.php via includes/blog-post.php. */
$slug = 'excellence-womens-healthcare';
ob_start();
?>
<p class="post__lede">
  Janani Multispeciality Hospital and Research Centre has been recognised for Excellence in Women&rsquo;s Healthcare
  &mdash; an award that belongs to the obstetricians, gynecologists, embryologists, nurses and neonatal team who look
  after women and newborns in Vijayapura every day of the year.
</p>

<p>
  Awards are pleasant. What they are useful for is describing, in one place, what a hospital has actually built. So
  rather than simply thanking everyone, here is what the recognition reflects about women&rsquo;s healthcare at Janani
  today.
</p>

<h2>Antenatal care that follows a schedule, not a symptom</h2>

<p>
  Our <a href="/department/anc.php">antenatal care unit</a> runs a structured schedule of visits, scans and blood tests
  from the booking visit through to delivery &mdash; dating scan, NT scan, anomaly scan, glucose tolerance test, growth
  scans and weekly reviews in the final month. Scans, laboratory work and consultations happen under one roof, which
  matters a great deal to families travelling in from surrounding districts.
</p>

<p>
  High-risk pregnancies &mdash; gestational diabetes, hypertension, twins, previous caesarean, recurrent loss &mdash;
  are managed jointly with the <a href="/department/medicine.php">general medicine</a> team, and reviewed more often
  than the standard schedule requires.
</p>

<h2>Safe delivery, with intensive care on site</h2>

<p>
  Labour rooms, modular operation theatres and an anaesthesia team are available around the clock, so an emergency
  caesarean can be started without waiting for staff to be called in. Behind that sits a Level III
  <a href="/department/neonatology.php">neonatal intensive care unit</a> for premature and unwell babies, with
  ventilator support, phototherapy and specialist nursing. A mother in obstructed labour and a baby needing
  respiratory support do not have to be in two different hospitals.
</p>

<h2>Gynecological surgery, mostly through keyholes</h2>

<p>
  Fibroids, ovarian cysts, endometriosis, ectopic pregnancy and hysterectomy are now handled laparoscopically wherever
  it is appropriate &mdash; smaller incisions, less pain, one or two days in hospital instead of a week. Abnormal
  bleeding is investigated with <a href="/department/hysteroscopy.php">hysteroscopy</a>, often as a day procedure,
  rather than by treating symptoms blindly. The <a href="/department/laparoscopy.php">laparoscopy department</a> covers
  gynecological, general and urological work in the same theatres.
</p>

<h2>Fertility care in North Karnataka</h2>

<p>
  Our <a href="/department/ivf.php">IVF and Fertility Centre</a> provides ovulation induction, IUI, IVF and ICSI,
  blastocyst culture, vitrification and frozen embryo transfer, alongside male-factor assessment and fertility
  preservation. The emphasis is diagnosis first: many couples seen at the
  <a href="/department/infertility.php">infertility clinic</a> conceive without ever needing IVF, once a thyroid
  disorder, PCOS, tubal factor or male-factor problem has been correctly identified and treated.
</p>

<h2>Screening, which is the quiet half of the work</h2>

<p>
  Cervical screening, breast examination and mammography, thyroid and anaemia testing, and bone density assessment
  after menopause make up a large share of what the department does &mdash; and prevent far more suffering than any
  operation. Our guide to <a href="/blog/womens-health-essential-checkups.php">essential checkups at every age</a> sets
  out what to book and when.
</p>

<h2>Thank you</h2>

<p>
  This recognition belongs to the nurses on night duty, the technicians who process an urgent haemoglobin at 3 AM, the
  housekeeping staff who keep a labour room safe, and the families who trusted us with the most important days of
  their lives. We are grateful, and we intend to keep earning it.
</p>

<p>
  To meet the team, see our <a href="/pages/doctors.php">doctors</a> or read more
  <a href="/pages/about.php">about Janani Hospital</a>. To consult us,
  <a href="/pages/book-appointment.php">book an appointment</a> or call
  <a href="tel:+917090831208">+91 70908 31208</a>.
</p>
<?php
$post_body = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-post.php';
