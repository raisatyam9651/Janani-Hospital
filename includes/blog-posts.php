<?php
/* ==========================================================================
   blog-posts.php — the single source of truth for /blog/.

   Every post that exists as a file under /blog/ has one entry here. The
   listing page (/blog/index.php) builds its cards, its category list and its
   category counts from this array, and each post file pulls its own metadata
   (title, byline, hero image, schema fields) from it too — so a post is
   described in exactly one place.

   Adding a post:
     1. Add an entry below (newest first — the listing renders in array order).
     2. Create /blog/<slug>.php: set $slug, buffer the body markup into
        $post_body, then include includes/blog-post.php. Copy an existing post.

   Text here is stored RAW (plain apostrophes and ampersands); every value is
   escaped at the point it is printed. Set 'image_fit' => 'contain' when the
   image is a document (certificate, newspaper page) that a cover-crop would
   destroy; photographs omit it and crop to fill.

   Image paths are the one exception — spaces are %20-encoded to match the
   rest of the site.
   ========================================================================== */

/* Sidebar order. Counts are computed from the posts, never hard-coded. */
$BLOG_CATEGORIES = [
  "Women's Health",
  'Fertility',
  'Pediatrics',
  'Surgery',
  'General Medicine',
  'Wellness',
  'Awards & Recognition',
];

$BLOG_POSTS = [

  /* ---------------------------------------------------------------- Women's */
  'womens-health-essential-checkups' => [
    'title'        => "Understanding Women's Health: Essential Checkups at Every Age",
    'category'     => "Women's Health",
    'date'         => '2026-08-12',
    'date_display' => 'August 12, 2026',
    'author'       => 'Dr. Ramesh Kumar',
    'author_role'  => 'Senior Gynecologist',
    'author_url'   => '/pages/doctor-2.php',
    'image'        => '/assets/images/obg/Women%20Health%20Screening.jpg',
    'image_alt'    => "Gynecologist reviewing a women's health screening report at Janani Hospital, Vijayapura",
    'read_time'    => 8,
    'excerpt'      => 'A decade-by-decade guide to the screenings every woman should book — from a first gynecology visit in her twenties to bone density and cancer screening after fifty.',
    'description'  => "Which health checkups women need in their 20s, 30s, 40s and after 50 - Pap smear, HPV, thyroid, anaemia, mammogram and bone density - explained by the gynecology team at Janani Hospital, Vijayapura.",
    'keywords'     => "women's health checkup Vijayapura, Pap smear Vijayapura, gynecologist Vijayapura, mammogram Vijayapura, well woman screening Karnataka",
    'links'        => [
      ['Obstetrics & Gynecology', '/department/obg.php'],
      ['Health Checkup Packages', '/pages/health-packages.php'],
      ['Book a Lab Test', '/pages/book-lab-test.php'],
    ],
  ],

  /* -------------------------------------------------------------- Fertility */
  'modern-advances-in-ivf-technology' => [
    'title'        => 'Modern Advances in IVF Technology: What Has Actually Changed',
    'category'     => 'Fertility',
    'date'         => '2026-08-04',
    'date_display' => 'August 04, 2026',
    'author'       => 'Dr. Janani Ramesh',
    'author_role'  => 'IVF & Infertility Specialist',
    'author_url'   => '/pages/doctor-1.php',
    'image'        => '/assets/images/IVF-&-Fertility-Center/IVF-(In-Vitro-Fertilization).png',
    'image_alt'    => 'Embryologist at work in the IVF laboratory of Janani Hospital, Vijayapura',
    'read_time'    => 9,
    'excerpt'      => 'Blastocyst culture, vitrification, ICSI and time-lapse monitoring have quietly reshaped IVF success rates. Here is what each advance actually means for a couple starting treatment.',
    'description'  => 'How blastocyst transfer, vitrification, ICSI, frozen embryo transfer and genetic testing have improved IVF success rates - explained by the IVF team at Janani Hospital, Vijayapura.',
    'keywords'     => 'IVF Vijayapura, IVF success rate, ICSI Vijayapura, frozen embryo transfer, best IVF centre Vijayapura, infertility treatment Karnataka',
    'links'        => [
      ['IVF & Fertility Centre', '/department/ivf.php'],
      ['Infertility Treatment', '/department/infertility.php'],
      ['Meet Dr. Janani Ramesh', '/pages/doctor-1.php'],
    ],
  ],

  /* ------------------------------------------------------------- Pediatrics */
  'common-childhood-illnesses-guide' => [
    'title'        => 'Common Childhood Illnesses: What to Treat at Home and When to See a Doctor',
    'category'     => 'Pediatrics',
    'date'         => '2026-07-26',
    'date_display' => 'July 26, 2026',
    'author'       => 'Dr. Priya Dharshini',
    'author_role'  => 'Pediatrician',
    'author_url'   => '/pages/doctor-3.php',
    'image'        => '/assets/images/Paediatrics-Department/General-Paediatrics.png',
    'image_alt'    => 'Pediatrician examining a young child at Janani Hospital, Vijayapura',
    'read_time'    => 8,
    'excerpt'      => 'Fever, cough, loose motions, ear pain - a practical guide for parents on what settles with home care, and the warning signs that mean a child needs to be seen the same day.',
    'description'  => "A parent's guide to fever, cough and cold, diarrhoea, ear infection and rashes in children - home care, red-flag symptoms and when to visit the pediatric emergency at Janani Hospital, Vijayapura.",
    'keywords'     => 'child fever treatment Vijayapura, pediatrician Vijayapura, childhood illness, diarrhoea in children, pediatric emergency Vijayapura',
    'links'        => [
      ['Pediatrics Department', '/department/pediatrics.php'],
      ['Neonatology & NICU', '/department/neonatology.php'],
      ['Meet Dr. Priya Dharshini', '/pages/doctor-3.php'],
    ],
  ],

  /* ---------------------------------------------------------------- Women's */
  'antenatal-care-month-by-month' => [
    'title'        => 'Your Antenatal Care Timeline: A Month-by-Month Pregnancy Guide',
    'category'     => "Women's Health",
    'date'         => '2026-07-18',
    'date_display' => 'July 18, 2026',
    'author'       => 'Dr. Ramesh Kumar',
    'author_role'  => 'Senior Gynecologist',
    'author_url'   => '/pages/doctor-2.php',
    'image'        => '/assets/images/anc/Routine%20Antenatal%20Checkups.jpg',
    'image_alt'    => 'Expectant mother during a routine antenatal checkup at Janani Hospital, Vijayapura',
    'read_time'    => 10,
    'excerpt'      => 'Which scan happens in which month, which blood tests matter, when the TT doses and iron tablets start - the full antenatal schedule set out trimester by trimester.',
    'description'  => 'A month-by-month antenatal care schedule for pregnancy - scans, blood tests, TT vaccination, iron and calcium, weight gain and danger signs - from the obstetrics team at Janani Hospital, Vijayapura.',
    'keywords'     => 'antenatal care Vijayapura, pregnancy checkup schedule, NT scan, anomaly scan Vijayapura, high risk pregnancy Karnataka, delivery hospital Vijayapura',
    'links'        => [
      ['Antenatal Care', '/department/anc.php'],
      ['Obstetrics & Gynecology', '/department/obg.php'],
      ['Book an Appointment', '/pages/book-appointment.php'],
    ],
  ],

  /* ---------------------------------------------------------------- Surgery */
  'laparoscopic-surgery-what-to-expect' => [
    'title'        => 'Laparoscopic Surgery: What to Expect Before, During and After',
    'category'     => 'Surgery',
    'date'         => '2026-07-09',
    'date_display' => 'July 09, 2026',
    'author'       => 'Janani Hospital Surgical Team',
    'author_role'  => 'General & Laparoscopic Surgery',
    'author_url'   => '/department/laparoscopy.php',
    'image'        => '/assets/images/Laparoscopy-Department/General-Laparoscopy.png',
    'image_alt'    => 'Laparoscopic surgery in the modular operation theatre at Janani Hospital, Vijayapura',
    'read_time'    => 8,
    'excerpt'      => 'Keyhole surgery means smaller cuts, less pain and a faster return to work - but preparation and recovery still matter. A step-by-step walkthrough of the whole journey.',
    'description'  => 'Preparing for laparoscopic (keyhole) surgery - fasting, anaesthesia, what happens in theatre, the recovery timeline, wound care and warning signs - from the surgical team at Janani Hospital, Vijayapura.',
    'keywords'     => 'laparoscopic surgery Vijayapura, keyhole surgery Karnataka, gallbladder surgery Vijayapura, hernia surgery, laparoscopy recovery time',
    'links'        => [
      ['Laparoscopy Department', '/department/laparoscopy.php'],
      ['General Surgery', '/department/surgery.php'],
      ['Hysteroscopy', '/department/hysteroscopy.php'],
    ],
  ],

  /* ------------------------------------------------------- General Medicine */
  'managing-diabetes-and-blood-pressure' => [
    'title'        => 'Living Well with Diabetes and High Blood Pressure: A Practical Guide',
    'category'     => 'General Medicine',
    'date'         => '2026-06-27',
    'date_display' => 'June 27, 2026',
    'author'       => 'Janani Hospital Medical Team',
    'author_role'  => 'Department of General Medicine',
    'author_url'   => '/department/medicine.php',
    'image'        => '/assets/images/General-Medicine/Primary-Care.png',
    'image_alt'    => 'Physician checking a patient blood pressure reading at Janani Hospital, Vijayapura',
    'read_time'    => 9,
    'excerpt'      => 'Two conditions, one routine. The numbers to aim for, the tests to repeat every three months, and the diet and medication habits that keep complications away.',
    'description'  => 'Target HbA1c and blood pressure numbers, the tests to repeat quarterly, diet changes that suit South Indian meals, and the complications to screen for - from the general medicine team at Janani Hospital, Vijayapura.',
    'keywords'     => 'diabetes treatment Vijayapura, HbA1c target, blood pressure control, general physician Vijayapura, diabetic foot care Karnataka',
    'links'        => [
      ['General Medicine', '/department/medicine.php'],
      ['Health Checkup Packages', '/pages/health-packages.php'],
      ['Book a Lab Test', '/pages/book-lab-test.php'],
    ],
  ],

  /* --------------------------------------------------------------- Wellness */
  'why-preventive-health-checkups-matter' => [
    'title'        => 'Why Preventive Health Checkups Matter More Than You Think',
    'category'     => 'Wellness',
    'date'         => '2026-06-15',
    'date_display' => 'June 15, 2026',
    'author'       => 'Janani Hospital Medical Team',
    'author_role'  => 'Preventive Health Services',
    'author_url'   => '/pages/health-packages.php',
    'image'        => '/assets/images/General-Medicine/Health-Checkups.png',
    'image_alt'    => 'Preventive health checkup being carried out at Janani Hospital, Vijayapura',
    'read_time'    => 7,
    'excerpt'      => 'Most heart attacks, kidney failures and cancers in India are caught late. An annual checkup is the cheapest, dullest and most effective piece of medicine you will ever buy.',
    'description'  => 'What an annual preventive health checkup includes, which tests matter at which age, how to prepare for fasting bloodwork, and how to read your report - Janani Hospital, Vijayapura.',
    'keywords'     => 'preventive health checkup Vijayapura, full body checkup Karnataka, master health checkup, annual health screening, health package Vijayapura',
    'links'        => [
      ['Health Checkup Packages', '/pages/health-packages.php'],
      ['General Medicine', '/department/medicine.php'],
      ['Patient Information', '/pages/patient-information.php'],
    ],
  ],

  /* --------------------------------------------------- Awards & Recognition */
  'excellence-womens-healthcare' => [
    'title'        => "Excellence in Women's Healthcare",
    'category'     => 'Awards & Recognition',
    'date'         => '2026-05-10',
    'date_display' => 'May 10, 2026',
    'author'       => 'Janani Hospital',
    'author_role'  => 'Hospital News',
    'author_url'   => '/pages/about.php',
    'image'        => '/assets/images/homepage/awards.jpeg',
    'image_fit'    => 'contain',
    'image_alt'    => "Janani Hospital team with the Excellence in Women's Healthcare award",
    'read_time'    => 4,
    'excerpt'      => 'Recognition for our obstetrics, gynecology and fertility teams - and what the award reflects about maternity care in Vijayapura today.',
    'description'  => "Janani Multispeciality Hospital and Research Centre is recognised for Excellence in Women's Healthcare, covering antenatal care, safe delivery, gynecological surgery and IVF in Vijayapura.",
    'keywords'     => "best maternity hospital Vijayapura, women's healthcare award, gynecology hospital Karnataka, Janani Hospital awards",
    'links'        => [
      ['Obstetrics & Gynecology', '/department/obg.php'],
      ['Antenatal Care', '/department/anc.php'],
      ['IVF & Fertility Centre', '/department/ivf.php'],
    ],
  ],

  'healthcare-excellence-awards' => [
    'title'        => 'Healthcare Excellence Awards',
    'category'     => 'Awards & Recognition',
    'date'         => '2026-05-05',
    'date_display' => 'May 05, 2026',
    'author'       => 'Janani Hospital',
    'author_role'  => 'Hospital News',
    'author_url'   => '/pages/about.php',
    'image'        => '/assets/images/homepage/awards3.jpeg',
    'image_fit'    => 'contain',
    'image_alt'    => 'Janani Hospital honoured at the Healthcare Excellence Awards',
    'read_time'    => 4,
    'excerpt'      => 'Janani Multispeciality Hospital and Research Centre is honoured for clinical quality and patient outcomes across North Karnataka.',
    'description'  => 'Janani Multispeciality Hospital and Research Centre receives a Healthcare Excellence Award for clinical quality, infection control and patient outcomes in Vijayapura, Karnataka.',
    'keywords'     => 'healthcare excellence award, best multispeciality hospital Vijayapura, hospital quality Karnataka, Janani Hospital recognition',
    'links'        => [
      ['About Janani Hospital', '/pages/about.php'],
      ['Our Doctors', '/pages/doctors.php'],
      ['Critical Care', '/department/critical-care.php'],
    ],
  ],

  'outstanding-patient-care' => [
    'title'        => 'Outstanding Patient Care Recognition - Medical Board India',
    'category'     => 'Awards & Recognition',
    'date'         => '2026-04-28',
    'date_display' => 'April 28, 2026',
    'author'       => 'Janani Hospital',
    'author_role'  => 'Hospital News',
    'author_url'   => '/pages/about.php',
    'image'        => '/assets/images/homepage/awards1.jpeg',
    'image_fit'    => 'contain',
    'image_alt'    => 'Outstanding Patient Care Recognition presented to Janani Hospital by the Medical Board of India',
    'read_time'    => 4,
    'excerpt'      => 'The Medical Board of India recognises our 24/7 emergency, critical care and nursing teams for outstanding patient care.',
    'description'  => 'The Medical Board of India recognises Janani Hospital, Vijayapura for outstanding patient care across emergency response, critical care, nursing and patient communication.',
    'keywords'     => 'outstanding patient care award, Medical Board India recognition, emergency hospital Vijayapura, ICU Vijayapura, nursing care Karnataka',
    'links'        => [
      ['Critical Care & ICU', '/department/critical-care.php'],
      ['Patient Information', '/pages/patient-information.php'],
      ['Contact Us', '/pages/contact.php'],
    ],
  ],

];

/**
 * Public URL for a post slug. Kept in one place so the day the blog moves to
 * extension-less URLs, only this function changes.
 */
function blog_url($slug) {
  return '/blog/' . $slug . '.php';
}

/**
 * True when a post's image is a document (certificate, newspaper page) that a
 * cover-crop would destroy, so it is letterboxed on a neutral ground instead.
 */
function blog_image_contain(array $post) {
  return isset($post['image_fit']) && $post['image_fit'] === 'contain';
}

/**
 * Category name => number of posts, in sidebar order. Categories with no posts
 * are dropped, so the sidebar can never advertise an empty filter.
 */
function blog_category_counts(array $posts, array $order) {
  $counts = [];
  foreach ($posts as $post) {
    $cat = $post['category'];
    $counts[$cat] = isset($counts[$cat]) ? $counts[$cat] + 1 : 1;
  }
  $sorted = [];
  foreach ($order as $cat) {
    if (isset($counts[$cat])) $sorted[$cat] = $counts[$cat];
  }
  // A category used by a post but missing from $order still shows, at the end.
  foreach ($counts as $cat => $n) {
    if (!isset($sorted[$cat])) $sorted[$cat] = $n;
  }
  return $sorted;
}

/**
 * Up to $limit other posts to show under an article: same category first, then
 * the most recent of whatever is left.
 */
function blog_related(array $posts, $slug, $limit = 3) {
  if (!isset($posts[$slug])) return array_slice($posts, 0, $limit, true);
  $category = $posts[$slug]['category'];
  $same = [];
  $rest = [];
  foreach ($posts as $key => $post) {
    if ($key === $slug) continue;
    if ($post['category'] === $category) $same[$key] = $post;
    else $rest[$key] = $post;
  }
  return array_slice($same + $rest, 0, $limit, true);
}
