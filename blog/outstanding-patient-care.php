<?php
/* Body only — metadata, hero, byline, CTA and schema come from
   includes/blog-posts.php via includes/blog-post.php. */
$slug = 'outstanding-patient-care';
ob_start();
?>
<p class="post__lede">
  The Medical Board of India has recognised Janani Multispeciality Hospital and Research Centre for Outstanding Patient
  Care. It is a recognition of the parts of a hospital that rarely appear in a brochure: the nursing station at 3 AM,
  the porter who knows where the family is waiting, and the doctor who sits down before delivering bad news.
</p>

<p>
  Clinical skill decides whether a treatment works. Patient care decides whether the experience of receiving it is
  bearable. The two are not the same thing, and hospitals that are strong at the first are not automatically good at
  the second.
</p>

<h2>Emergency care without a queue for permission</h2>

<p>
  Our emergency department is open 24 hours, every day, and treatment begins before paperwork. Emergency services,
  operation theatres, blood bank access, laboratory and imaging all run through the night, so a road-traffic injury at
  2 AM gets the same assessment it would at 2 PM. For an emergency, call
  <a href="tel:+917090831208">+91 70908 31208</a> or come directly &mdash; no appointment is required.
</p>

<h2>Intensive care that keeps families informed</h2>

<p>
  Our <a href="/department/critical-care.php">critical care units</a> cover medical, surgical, cardiac, respiratory,
  neurological and trauma needs with continuous monitoring and intensivist-led rounds. Families are given a scheduled
  daily update rather than being left to catch a doctor in a corridor &mdash; a small change in practice that removes a
  large amount of avoidable distress.
</p>

<h2>Nursing, which is where care actually happens</h2>

<p>
  Patients spend a few minutes a day with a doctor and the rest of it with nurses. Our nursing teams handle
  observations, medication rounds, wound care, post-operative mobilisation, newborn feeding support and the constant
  low-level reassurance that keeps a frightened patient calm. Continuing training in neonatal resuscitation, advanced
  life support and infection prevention runs throughout the year.
</p>

<h2>Explaining things properly, in the patient&rsquo;s own language</h2>

<ul>
  <li>Consultations, consent and discharge instructions are given in Kannada, Hindi, Marathi or English as the family prefers.</li>
  <li>Costs are estimated before a planned procedure, including implants and consumables, so families are not surprised at discharge.</li>
  <li>Discharge summaries state clearly what was done, what medicines to take, what to watch for and when to return.</li>
  <li>Insurance, admission and visiting details are set out on our <a href="/pages/patient-information.php">patient information page</a>.</li>
</ul>

<h2>Access for families from outside Vijayapura</h2>

<p>
  Many of our patients travel in from across the district and from Bagalkot. Wherever possible, consultation, imaging,
  laboratory work and a specialist opinion are completed in a single visit, and day-care procedures are scheduled so
  that a family can return home the same evening. For those staying, attendant facilities and a canteen are available
  on site.
</p>

<h2>What we are still working on</h2>

<p>
  Waiting times in the outpatient department during peak hours, and the speed of discharge paperwork, are the two
  things patients tell us about most often. Both are being worked on with appointment scheduling and earlier
  preparation of discharge summaries. If your experience with us fell short, we would genuinely rather hear it &mdash;
  our <a href="/pages/book-appointment.php">appointment page</a> reaches the administration directly.
</p>

<h2>Thank you</h2>

<p>
  This recognition belongs to the nursing, emergency, critical care, housekeeping, laboratory, pharmacy and front-desk
  teams, and to the patients and families of Vijayapura who trusted us. We are grateful, and we will keep working to
  deserve it.
</p>

<p>
  Read more <a href="/pages/about.php">about the hospital</a>, meet our <a href="/pages/doctors.php">doctors</a>, or
  <a href="/pages/book-appointment.php">book an appointment</a>.
</p>
<?php
$post_body = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-post.php';
