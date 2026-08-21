<?php
/* Body only — metadata, hero, byline, CTA and schema come from
   includes/blog-posts.php via includes/blog-post.php. */
$slug = 'healthcare-excellence-awards';
ob_start();
?>
<p class="post__lede">
  Janani Multispeciality Hospital and Research Centre has received a Healthcare Excellence Award recognising clinical
  quality and patient outcomes across its departments &mdash; a result of unglamorous, repeated, everyday work rather
  than any single achievement.
</p>

<p>
  Hospital quality is mostly invisible to patients. You notice a clean room and a doctor who explains things; you do
  not see the infection-control audit, the drug-error checklist or the theatre sterilisation log that decide whether
  your operation goes well. This is a short account of what sits behind the award.
</p>

<h2>Multispeciality care in one building</h2>

<p>
  Janani brings together <a href="/department/obg.php">obstetrics and gynecology</a>,
  <a href="/department/ivf.php">IVF and fertility</a>, <a href="/department/pediatrics.php">pediatrics</a> and
  <a href="/department/neonatology.php">neonatology</a>, <a href="/department/surgery.php">general surgery</a>,
  <a href="/department/laparoscopy.php">laparoscopy</a>, <a href="/department/ortho.php">orthopedics</a>,
  <a href="/department/urology.php">urology</a>, <a href="/department/medicine.php">general medicine</a>,
  <a href="/department/endoscopy.php">endoscopy</a>, <a href="/department/pain-clinic.php">pain management</a> and
  24/7 <a href="/department/critical-care.php">critical care</a> on a single site.
</p>

<p>
  The practical value of that is speed. A pregnant patient with uncontrolled sugars, a road-accident case needing both
  orthopedic and general surgical input, a newborn needing intensive care while the mother is still in theatre &mdash;
  all are handled by teams who can be in the same room within minutes, without transfer, without repeating
  investigations, and without a family having to negotiate two hospitals in a crisis.
</p>

<h2>Emergency and critical care, round the clock</h2>

<p>
  Emergency services, operation theatres, laboratory, imaging and pharmacy run 24 hours. Our intensive care units cover
  medical, surgical, cardiac, respiratory, neurological and trauma needs, with ventilator support, invasive monitoring
  and a dedicated intensivist-led team. For emergencies, no appointment is needed &mdash; call
  <a href="tel:+917090831208">+91 70908 31208</a> or come directly.
</p>

<h2>Quality, measured rather than assumed</h2>

<ul>
  <li><strong>Infection control:</strong> hand-hygiene audits, sterilisation monitoring, antibiotic stewardship, and surveillance of surgical-site and device-associated infections.</li>
  <li><strong>Safe surgery:</strong> pre-operative checklists, site marking, and structured anaesthesia assessment before every procedure.</li>
  <li><strong>Medication safety:</strong> double-checking of high-risk drugs, allergy verification and pharmacist review.</li>
  <li><strong>Maternal and newborn outcomes:</strong> reviewed continuously, with a Level III <a href="/department/neonatology.php">NICU</a> supporting the labour rooms.</li>
  <li><strong>Emergency response times:</strong> tracked, because in stroke, trauma and obstetric haemorrhage, minutes decide outcomes.</li>
</ul>

<h2>Investment in equipment and training</h2>

<p>
  Modular operation theatres, high-definition laparoscopic systems, an in-house embryology laboratory, digital imaging
  and a fully equipped diagnostic laboratory allow most investigations and procedures to be completed here rather than
  referred to Bengaluru or Hubballi. Equally important is continuing training &mdash; in neonatal resuscitation,
  advanced life support, and infection prevention &mdash; for doctors, nurses and technicians alike.
</p>

<h2>Care for the region, not only the city</h2>

<p>
  A large share of our patients travel in from across Vijayapura district, Bagalkot and the surrounding taluks. For
  those families, a consultation, scan, blood test and specialist opinion completed in one visit is not a convenience;
  it decides whether the treatment happens at all. Scheduling, laboratory timings and day-care procedures are all
  organised around that reality.
</p>

<h2>Thank you</h2>

<p>
  This award belongs to everyone in the building &mdash; the doctors, the nurses on night duty, the laboratory and
  radiology technicians, pharmacy, housekeeping and the front desk &mdash; and to the patients who chose us. We are
  grateful, and we treat the recognition as a standard to maintain rather than a milestone to celebrate.
</p>

<p>
  Read more <a href="/pages/about.php">about Janani Hospital</a>, meet our
  <a href="/pages/doctors.php">doctors</a>, or <a href="/pages/book-appointment.php">book an appointment</a>.
</p>
<?php
$post_body = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-post.php';
