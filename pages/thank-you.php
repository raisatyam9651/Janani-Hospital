<?php
$page_title = "Thank You | Janani Hospital, Vijayapura";
$page_description = "Your message has been sent. The Janani Hospital team in Vijayapura will get back to you shortly.";
$page_robots = "noindex, follow";
$page_css  = ['pages.css'];
$page_name = 'thank-you';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
<main class="thanks">
    <div class="thanks__blob thanks__blob--a"></div>
    <div class="thanks__blob thanks__blob--b"></div>
    <div class="thanks__dots"></div>

    <div class="thanks__card" data-reveal="up" data-reveal-on="mount">
      <div class="thanks__mark">
        <span class="thanks__ping"></span>
        <svg class="icon"><use href="#i-check-circle"></use></svg>
      </div>

      <h1 class="thanks__title">Thank You!</h1>

      <p class="thanks__text">
        Your message has been successfully sent. <br>
        We'll get back to you as soon as possible.
      </p>

      <div class="thanks__actions">
        <a href="/" class="thanks__btn thanks__btn--primary">
          <svg class="icon"><use href="#i-home"></use></svg>
          <span>Back Home</span>
        </a>
        <a href="/pages/about.php" class="thanks__btn thanks__btn--ghost">
          <span>About Us</span>
          <svg class="icon"><use href="#i-arrow-right"></use></svg>
        </a>
      </div>
    </div>
  </main>

  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
