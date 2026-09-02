<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/png" href="/assets/images/logo.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <?php
    /* ----------------------------------------------------------------------
       Shared SEO values. A page sets $page_title / $page_description before
       including this file; everything below is derived from them so no page
       has to repeat the NAP, canonical or social tags.
       ---------------------------------------------------------------------- */
    $site_name   = 'Janani Multispeciality Hospital and Research Centre';
    $site_origin = 'https://jananihospitals.com';
    $og_image    = $site_origin . '/assets/images/logo.png';

    /* Built from SCRIPT_NAME, not REQUEST_URI: .htaccess serves every page at
       both /pages/about and /pages/about.php, and SCRIPT_NAME resolves to the
       same file either way - so one page can never emit two canonicals. */
    $canonical = $site_origin . $_SERVER['SCRIPT_NAME'];
    $canonical = preg_replace('#/index\.php$#', '/', $canonical);

    $meta_title = isset($page_title) ? $page_title : $site_name . ' - Vijayapura';
    $meta_desc  = isset($page_description) ? $page_description : '';
    $meta_keys  = isset($page_keywords) ? $page_keywords
      : 'hospital in Vijayapura, multispeciality hospital Vijayapura, Janani Hospital Vijayapura, IVF centre Vijayapura, gynecologist Vijayapura, emergency hospital Vijayapura Karnataka';
  ?>

  <title><?= htmlspecialchars($meta_title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($meta_desc) ?>">
  <meta name="keywords" content="<?= htmlspecialchars($meta_keys) ?>">
  <meta name="author" content="<?= htmlspecialchars($site_name) ?>">
  <meta name="robots" content="<?= htmlspecialchars(isset($page_robots) ? $page_robots : 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1') ?>">
  <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

  <!-- Local / geo targeting: Vijayapura, Karnataka -->
  <meta name="geo.region" content="IN-KA">
  <meta name="geo.placename" content="Vijayapura, Karnataka">
  <meta name="geo.position" content="16.8082822;75.7248957">
  <meta name="ICBM" content="16.8082822, 75.7248957">
  <meta name="language" content="en-IN">

  <meta property="og:site_name" content="<?= htmlspecialchars($site_name) ?>">
  <meta property="og:locale" content="en_IN">
  <meta property="og:title" content="<?= htmlspecialchars($meta_title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($meta_desc) ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
  <meta property="og:image" content="<?= htmlspecialchars($og_image) ?>">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($meta_title) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($meta_desc) ?>">
  <meta name="twitter:image" content="<?= htmlspecialchars($og_image) ?>">

  <!-- ------------------------------------------------------------------
       LocalBusiness / Hospital structured data. Same NAP as the contact
       page and the Google Business Profile - keep the three in sync.
       ------------------------------------------------------------------ -->
  <script type="application/ld+json">
  <?= json_encode([
    '@context'    => 'https://schema.org',
    '@type'       => 'Hospital',
    '@id'         => $site_origin . '/#hospital',
    'name'        => $site_name,
    'alternateName' => 'Janani Hospital Vijayapura',
    'url'         => $site_origin . '/',
    'logo'        => $og_image,
    'image'       => $og_image,
    'description' => 'Janani Multispeciality Hospital and Research Centre is a leading multispeciality hospital in Vijayapura, Karnataka, offering IVF and fertility care, obstetrics and gynecology, paediatrics, neonatology, general surgery, orthopedics, urology and 24/7 emergency and critical care.',
    'telephone'   => '+91-70908-31208',
    'email'       => 'Jananihospital2018@gmail.com',
    'priceRange'  => 'INR',
    'address'     => [
      '@type'           => 'PostalAddress',
      'streetAddress'   => 'Beside Karnataka Bank, Near BDA Cross, Jalnagar Main Road, KK Colony',
      'addressLocality' => 'Vijayapura',
      'addressRegion'   => 'Karnataka',
      'postalCode'      => '586109',
      'addressCountry'  => 'IN',
    ],
    'geo' => [
      '@type'     => 'GeoCoordinates',
      'latitude'  => 16.8082822,
      'longitude' => 75.7248957,
    ],
    'hasMap' => 'https://maps.google.com/?cid=12670297163372150220',
    'areaServed' => [
      ['@type' => 'City',           'name' => 'Vijayapura'],
      ['@type' => 'AdministrativeArea', 'name' => 'Vijayapura District'],
      ['@type' => 'AdministrativeArea', 'name' => 'Bagalkot'],
      ['@type' => 'AdministrativeArea', 'name' => 'Karnataka'],
    ],
    'openingHoursSpecification' => [
      [
        '@type'     => 'OpeningHoursSpecification',
        'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'],
        'opens'     => '00:00',
        'closes'    => '23:59',
        'description' => '24/7 Emergency. OPD 8:00 AM - 8:00 PM.',
      ],
    ],
    'availableService' => array_map(
      function ($s) { return ['@type' => 'MedicalProcedure', 'name' => $s]; },
      [
        'IVF and Fertility Treatment', 'Obstetrics and Gynecology', 'Antenatal Care',
        'Paediatrics', 'Neonatology (NICU)', 'General Medicine', 'General Surgery',
        'Laparoscopic Surgery', 'Orthopedics', 'Urology', 'Endoscopy', 'Hysteroscopy',
        'Pain Management', 'Critical Care (ICU)',
      ]
    ),
  ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
  </script>

  <!-- ------------------------------------------------------------------
       Entrance animations are hidden by CSS only while this class is on
       <html>. If js/reveal.js never loads the class is dropped, so a
       failed script can no longer leave a page blank.
       ------------------------------------------------------------------ -->
  <script>
    (function () {
      var d = document.documentElement;
      d.className = (d.className + ' js-anim').replace(/^\s+/, '');
      window.setTimeout(function () {
        if (!window.__revealReady) {
          d.className = d.className.replace(/\bjs-anim\b/, '').replace(/\s+/g, ' ').trim();
        }
      }, 2000);
    })();
  </script>

  <link rel="stylesheet" href="/css/base.css">
  <link rel="stylesheet" href="/css/layout.css">
  <?php if (isset($page_css)): ?>
    <?php foreach ((array)$page_css as $_css): ?>
      <link rel="stylesheet" href="/css/<?= htmlspecialchars($_css) ?>">
    <?php endforeach; ?>
  <?php else: ?>
    <link rel="stylesheet" href="/css/home.css">
  <?php endif; ?>
</head>

<body data-page="<?= isset($page_name) ? htmlspecialchars($page_name) : (isset($page_css) ? 'page' : 'home') ?>" data-root="">

  <!-- ==========================================================================
       Feather icon sprite. Inlined (rather than referenced from an external
       file) so icons also render when the page is opened straight off disk.
       ========================================================================== -->
  <svg xmlns="http://www.w3.org/2000/svg" style="position:absolute;width:0;height:0;overflow:hidden"
    aria-hidden="true" focusable="false">
    <defs>
      <symbol id="i-activity" viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></symbol>
      <symbol id="i-alert-triangle" viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></symbol>
      <symbol id="i-arrow-right" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></symbol>
      <symbol id="i-award" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></symbol>
      <symbol id="i-baby" viewBox="0 0 24 24"><path d="M9 12h.01"/><path d="M15 12h.01"/><path d="M10 16c.5.3 1.2.5 2 .5s1.5-.2 2-.5"/><path d="M19 6.3a9 9 0 0 1 1.8 3.9 2 2 0 0 1 0 3.6 9 9 0 0 1-17.6 0 2 2 0 0 1 0-3.6A9 9 0 0 1 12 3c2 0 3.5 1.1 3.5 2.5S14.5 8 13 8"/></symbol>
      <symbol id="i-calendar" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></symbol>
      <symbol id="i-check-circle" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></symbol>
      <symbol id="i-chevron-down" viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></symbol>
      <symbol id="i-chevron-left" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></symbol>
      <symbol id="i-chevron-right" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></symbol>
      <symbol id="i-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></symbol>
      <symbol id="i-droplet" viewBox="0 0 24 24"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/></symbol>
      <symbol id="i-eye" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></symbol>
      <symbol id="i-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></symbol>
      <symbol id="i-heart" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></symbol>
      <symbol id="i-home" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></symbol>
      <symbol id="i-mail" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></symbol>
      <symbol id="i-map-pin" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></symbol>
      <symbol id="i-menu" viewBox="0 0 24 24"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></symbol>
      <symbol id="i-message-square" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></symbol>
      <symbol id="i-monitor" viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></symbol>
      <symbol id="i-phone" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></symbol>
      <symbol id="i-scissors" viewBox="0 0 24 24"><circle cx="6" cy="6" r="3"/><circle cx="6" cy="18" r="3"/><line x1="20" y1="4" x2="8.12" y2="15.88"/><line x1="14.47" y1="14.48" x2="20" y2="20"/><line x1="8.12" y1="8.12" x2="12" y2="12"/></symbol>
      <symbol id="i-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></symbol>
      <symbol id="i-send" viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></symbol>
      <symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></symbol>
      <symbol id="i-star" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></symbol>
      <symbol id="i-target" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></symbol>
      <symbol id="i-users" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></symbol>
      <symbol id="i-arrow-left" viewBox="0 0 24 24"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></symbol>
      <symbol id="i-book-open" viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></symbol>
      <symbol id="i-briefcase" viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></symbol>
      <symbol id="i-file-text" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></symbol>
      <symbol id="i-filter" viewBox="0 0 24 24"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></symbol>
      <symbol id="i-info" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></symbol>
      <symbol id="i-maximize-2" viewBox="0 0 24 24"><polyline points="15 3 21 3 21 9"/><polyline points="9 21 3 21 3 15"/><line x1="21" y1="3" x2="14" y2="10"/><line x1="3" y1="21" x2="10" y2="14"/></symbol>
      <symbol id="i-minus" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/></symbol>
      <symbol id="i-play" viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></symbol>
      <symbol id="i-plus" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></symbol>
      <symbol id="i-tool" viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></symbol>
      <symbol id="i-trending-up" viewBox="0 0 24 24"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></symbol>
      <symbol id="i-user" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></symbol>
      <symbol id="i-zap" viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></symbol>
      <symbol id="i-x" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></symbol>
      <symbol id="i-whatsapp" viewBox="0 0 24 24"><path fill="currentColor" d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.461c-1.852 0-3.667-.497-5.253-1.442l-.377-.225-3.905 1.024 1.042-3.805-.247-.393a9.897 9.897 0 0 1-1.515-5.267c0-5.454 4.437-9.892 9.896-9.892 2.64 0 5.122 1.03 6.987 2.897a9.832 9.832 0 0 1 2.89 6.991c0 5.456-4.437 9.896-9.896 9.896m0-18.175a11.728 11.728 0 0 0-8.305 3.44 11.728 11.728 0 0 0-3.441 8.305c0 2.072.54 4.095 1.564 5.87L0 24l6.326-1.659A11.77 11.77 0 0 0 12.051 24c6.48 0 11.756-5.276 11.756-11.756 0-3.14-1.222-6.094-3.442-8.314a11.73 11.73 0 0 0-8.314-3.441"/></symbol>
      <symbol id="i-google" viewBox="0 0 24 24"><path fill="currentColor" d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 15.907 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"/></symbol>
      <symbol id="i-instagram" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></symbol>
      <symbol id="i-facebook" viewBox="0 0 24 24"><path fill="currentColor" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></symbol>
      <symbol id="i-threads" viewBox="0 0 24 24"><path fill="currentColor" d="M12.186 24.004c-3.16 0-5.832-1.042-7.727-3.013C2.564 19.019 1.5 16.037 1.5 12.115c0-3.966 1.08-6.969 3.044-8.927C6.51 1.22 9.176.19 12.235.19c3.084 0 5.7.994 7.568 2.875 1.764 1.777 2.697 4.343 2.697 7.42 0 3.238-1.037 5.867-2.919 7.603-1.637 1.51-3.834 2.276-6.353 2.276-1.748 0-3.235-.417-4.42-1.238-1.055-.732-1.802-1.767-2.158-3.001h2.247c.29.742.795 1.34 1.46 1.733.722.427 1.679.645 2.846.645 1.83 0 3.414-.543 4.582-1.614 1.31-1.202 2.036-3.13 2.036-5.431 0-2.348-.682-4.267-1.974-5.551-1.353-1.343-3.322-2.05-5.702-2.05-2.27 0-4.187.728-5.545 2.106-1.373 1.393-2.127 3.568-2.127 6.126 0 2.68.742 4.793 2.146 6.11 1.312 1.232 3.228 1.879 5.54 1.879 1.488 0 2.766-.277 3.8-.823.95-.503 1.632-1.213 2.03-2.112h2.285c-.477 1.573-1.442 2.836-2.792 3.655-1.5 0.91-3.385 1.385-5.46 1.385z"/></symbol>
      <symbol id="i-youtube" viewBox="0 0 24 24"><path fill="currentColor" d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></symbol>
    </defs>
  </svg>

  <!-- ==========================================================================
       NAVBAR
       ========================================================================== -->
  <nav class="site-nav" data-site-nav>
    <div class="shell">
      <div class="site-nav__bar">

        <a href="/" class="site-nav__logo" aria-label="Janani Hospital � home">
          <img src="https://res.cloudinary.com/damfndmrm/image/upload/v1767163208/logo_eqtacj.png"
            alt="Janani Hospital">
          <span class="site-nav__logo-text"></span>
        </a>

        <div class="site-nav__menu">
        <a href="/pages/about.php" class="nav-link" data-nav="about">About</a>

          <div class="nav-dropdown" data-dropdown>
            <button type="button" class="nav-dropdown__trigger" data-dropdown-trigger aria-expanded="false"
              aria-haspopup="true">
              <span>Departments</span>
              <svg class="icon nav-dropdown__chevron"><use href="#i-chevron-down"></use></svg>
            </button>

            <div class="nav-dropdown__panel">
              <div class="nav-dropdown__head">
                <div>
                  <h4 class="nav-dropdown__title">Medical Departments</h4>
                  <p class="nav-dropdown__subtitle">All specialties in one place</p>
                </div>
                <a href="/pages/book-appointment.php" class="nav-dropdown__cta">
                  <svg class="icon"><use href="#i-calendar"></use></svg>
                  <span>Book Now</span>
                </a>
              </div>

              <div class="nav-dropdown__grid">
          <a href="/department/ivf.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-heart"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">IVF &amp; Fertility</span>
                <span class="dept-tile__dot"></span>
              </span>
              <span class="dept-tile__desc">Advanced reproductive treatments</span>
            </span>
          </a>
          <a href="/department/pediatrics.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-baby"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Pediatrics</span>
                <span class="dept-tile__dot"></span>
              </span>
              <span class="dept-tile__desc">Child healthcare services</span>
            </span>
          </a>
          <a href="/department/obg.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-users"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">OBG</span>
                <span class="dept-tile__dot"></span>
              </span>
              <span class="dept-tile__desc">Women's healthcare</span>
            </span>
          </a>
          <a href="/department/medicine.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-activity"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">General Medicine</span>
                <span class="dept-tile__dot"></span>
              </span>
              <span class="dept-tile__desc">Primary care services</span>
            </span>
          </a>
          <a href="/department/surgery.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-scissors"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Surgery</span>
                <span class="dept-tile__dot"></span>
              </span>
              <span class="dept-tile__desc">Surgical procedures</span>
            </span>
          </a>
          <a href="/department/ortho.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-activity"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Orthopedics</span>
                <span class="dept-tile__dot"></span>
              </span>
              <span class="dept-tile__desc">Bone &amp; joint care</span>
            </span>
          </a>
          <a href="/department/urology.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-droplet"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Urology</span>
                <span class="dept-tile__dot"></span>
              </span>
              <span class="dept-tile__desc">Urinary system care</span>
            </span>
          </a>
          <a href="/department/laparoscopy.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-monitor"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Laparoscopy</span>
                <span class="dept-tile__dot"></span>
              </span>
              <span class="dept-tile__desc">Minimally invasive surgery</span>
            </span>
          </a>
          <a href="/department/neonatology.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-baby"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Neonatology</span>
              </span>
              <span class="dept-tile__desc">Newborn intensive care</span>
            </span>
          </a>
          <a href="/department/critical-care.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-heart"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Critical Care</span>
              </span>
              <span class="dept-tile__desc">ICU services</span>
            </span>
          </a>
          <a href="/department/anc.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-users"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Antenatal Care</span>
              </span>
              <span class="dept-tile__desc">Pregnancy care</span>
            </span>
          </a>
          <a href="/department/pain-clinic.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-activity"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Pain Clinic</span>
              </span>
              <span class="dept-tile__desc">Pain management</span>
            </span>
          </a>
          <a href="/department/infertility.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-heart"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Infertility</span>
              </span>
              <span class="dept-tile__desc">Fertility treatments</span>
            </span>
          </a>
          <a href="/department/endoscopy.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-eye"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Endoscopy</span>
              </span>
              <span class="dept-tile__desc">Diagnostic procedures</span>
            </span>
          </a>
          <a href="/department/hysteroscopy.php" class="dept-tile">
            <span class="dept-tile__icon"><svg class="icon"><use href="#i-eye"></use></svg></span>
            <span class="dept-tile__body">
              <span class="dept-tile__head">
                <span class="dept-tile__name">Hysteroscopy</span>
              </span>
              <span class="dept-tile__desc">Uterine examination</span>
            </span>
          </a>
              </div>
            </div>
          </div>

        <a href="/blog/" class="nav-link" data-nav="blog">Blog</a>
        <a href="/pages/book-appointment.php" class="nav-link" data-nav="book-appointment">Book Appointment</a>
        </div>

        <div class="site-nav__cta">
          <a href="tel:+917090831208" class="btn-emergency" title="Emergency Call: +91 70908 31208">
            <span class="btn-emergency__pulse"></span>
            <svg class="icon"><use href="#i-phone"></use></svg>
            <span>24/7 Emergency</span>
          </a>

          <a href="https://wa.me/917090831208" target="_blank" rel="noopener" class="btn-whatsapp" title="Chat on WhatsApp">
            <svg class="icon"><use href="#i-whatsapp"></use></svg>
            <span>WhatsApp</span>
          </a>

          <a href="/pages/book-appointment.php" class="btn-book">
            <svg class="icon btn-book__icon"><use href="#i-calendar"></use></svg>
            <span>Book Appointment</span>
          </a>
        </div>

        <button type="button" class="nav-toggle" data-menu-toggle aria-expanded="false" aria-label="Open menu"
          aria-controls="mobile-menu">
          <svg class="icon nav-toggle__open"><use href="#i-menu"></use></svg>
          <svg class="icon nav-toggle__close"><use href="#i-x"></use></svg>
        </button>
      </div>

      <div class="mobile-menu" id="mobile-menu" data-mobile-menu>
        <div class="mobile-menu__list">
          <a href="/" class="mobile-link" data-nav="home">
            <span class="mobile-link__icon mobile-link__icon--emerald"><svg class="icon"><use href="#i-heart"></use></svg></span>
            <span>Home</span>
          </a>
          <a href="/pages/about.php" class="mobile-link" data-nav="about">
            <span class="mobile-link__icon mobile-link__icon--teal"><svg class="icon"><use href="#i-users"></use></svg></span>
            <span>About</span>
          </a>

          <div class="mobile-accordion" data-mobile-accordion>
            <button type="button" class="mobile-accordion__trigger" data-mobile-accordion-trigger
              aria-expanded="false">
              <span class="mobile-accordion__label">
                <span class="mobile-link__icon mobile-link__icon--emerald"><svg class="icon"><use href="#i-monitor"></use></svg></span>
                <span>Departments</span>
              </span>
              <svg class="icon mobile-accordion__chevron"><use href="#i-chevron-down"></use></svg>
            </button>
            <div class="mobile-accordion__panel">
            <a href="/department/ivf.php" class="mobile-dept"><svg class="icon"><use href="#i-heart"></use></svg><span class="mobile-dept__name">IVF &amp; Fertility</span><span class="mobile-dept__dot"></span></a>
            <a href="/department/pediatrics.php" class="mobile-dept"><svg class="icon"><use href="#i-baby"></use></svg><span class="mobile-dept__name">Pediatrics</span><span class="mobile-dept__dot"></span></a>
            <a href="/department/obg.php" class="mobile-dept"><svg class="icon"><use href="#i-users"></use></svg><span class="mobile-dept__name">OBG</span><span class="mobile-dept__dot"></span></a>
            <a href="/department/medicine.php" class="mobile-dept"><svg class="icon"><use href="#i-activity"></use></svg><span class="mobile-dept__name">General Medicine</span><span class="mobile-dept__dot"></span></a>
            <a href="/department/surgery.php" class="mobile-dept"><svg class="icon"><use href="#i-scissors"></use></svg><span class="mobile-dept__name">Surgery</span><span class="mobile-dept__dot"></span></a>
            <a href="/department/ortho.php" class="mobile-dept"><svg class="icon"><use href="#i-activity"></use></svg><span class="mobile-dept__name">Orthopedics</span><span class="mobile-dept__dot"></span></a>
            <a href="/department/urology.php" class="mobile-dept"><svg class="icon"><use href="#i-droplet"></use></svg><span class="mobile-dept__name">Urology</span><span class="mobile-dept__dot"></span></a>
            <a href="/department/laparoscopy.php" class="mobile-dept"><svg class="icon"><use href="#i-monitor"></use></svg><span class="mobile-dept__name">Laparoscopy</span><span class="mobile-dept__dot"></span></a>
            <a href="/department/neonatology.php" class="mobile-dept"><svg class="icon"><use href="#i-baby"></use></svg><span class="mobile-dept__name">Neonatology</span></a>
            <a href="/department/critical-care.php" class="mobile-dept"><svg class="icon"><use href="#i-heart"></use></svg><span class="mobile-dept__name">Critical Care</span></a>
            <a href="/department/anc.php" class="mobile-dept"><svg class="icon"><use href="#i-users"></use></svg><span class="mobile-dept__name">Antenatal Care</span></a>
            <a href="/department/pain-clinic.php" class="mobile-dept"><svg class="icon"><use href="#i-activity"></use></svg><span class="mobile-dept__name">Pain Clinic</span></a>
            <a href="/department/infertility.php" class="mobile-dept"><svg class="icon"><use href="#i-heart"></use></svg><span class="mobile-dept__name">Infertility</span></a>
            <a href="/department/endoscopy.php" class="mobile-dept"><svg class="icon"><use href="#i-eye"></use></svg><span class="mobile-dept__name">Endoscopy</span></a>
            <a href="/department/hysteroscopy.php" class="mobile-dept"><svg class="icon"><use href="#i-eye"></use></svg><span class="mobile-dept__name">Hysteroscopy</span></a>
            </div>
          </div>

          <a href="/blog/" class="mobile-link" data-nav="blog">
            <span class="mobile-link__icon mobile-link__icon--emerald"><svg class="icon"><use href="#i-activity"></use></svg></span>
            <span>Blog</span>
          </a>
          <a href="/pages/book-appointment.php" class="mobile-link" data-nav="book-appointment">
            <span class="mobile-link__icon mobile-link__icon--purple"><svg class="icon"><use href="#i-calendar"></use></svg></span>
            <span>Book Appointment</span>
          </a>

          <a href="tel:+917090831208" class="mobile-link mobile-link--emergency">
            <span class="mobile-link__icon mobile-link__icon--red"><svg class="icon"><use href="#i-phone"></use></svg></span>
            <span>Emergency: +91 70908 31208</span>
          </a>

          <a href="https://wa.me/917090831208" target="_blank" rel="noopener" class="mobile-link mobile-link--whatsapp">
            <span class="mobile-link__icon mobile-link__icon--green"><svg class="icon"><use href="#i-whatsapp"></use></svg></span>
            <span>Chat on WhatsApp</span>
          </a>

          <a href="/pages/book-appointment.php" class="mobile-menu__cta">
            <svg class="icon"><use href="#i-calendar"></use></svg>
            <span>Book Appointment</span>
          </a>
        </div>
      </div>
    </div>
  </nav>

  
