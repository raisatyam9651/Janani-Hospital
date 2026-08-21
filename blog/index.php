<?php
$page_title = "Health Tips & Latest Updates - Janani Hospital in Vijayapura";
$page_description = "Health guides and hospital news from Janani Multispeciality Hospital and Research Centre, Vijayapura - women's health, fertility, pediatrics, surgery and preventive care.";
$page_css  = ['pages.css'];
$page_js   = ['blog.js'];
$page_name = 'blog';

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-posts.php';
$categories = blog_category_counts($BLOG_POSTS, $BLOG_CATEGORIES);

/* A category may arrive in the query string (from a post's tag link). The
   filtering itself is done client-side by js/blog.js; this only decides which
   button starts out active. */
$active_category = isset($_GET['category']) ? $_GET['category'] : '';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
<main class="page">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <div class="breadcrumb__inner">
        <ol class="breadcrumb__list">
          <li class="breadcrumb__item">
            <a href="/" class="breadcrumb__link"><svg class="icon"><use href="#i-home"></use></svg><span>Home</span></a>
          </li>
          <li class="breadcrumb__item">
            <span class="breadcrumb__current"><span>Blog</span></span>
          </li>
        </ol>
      </div>
    </nav>

    <div class="page__inner">
      <div class="page__head">
        <h1 class="page__title" data-reveal="up" data-reveal-on="mount">
          Health Tips &amp; <span class="accent-emerald">Latest Updates</span>
        </h1>
        <p class="page__lede" data-reveal="up" data-reveal-on="mount" data-reveal-delay="100">
          Practical health guides written by our doctors, and news from Janani Multispeciality Hospital and Research
          Centre, Vijayapura.
        </p>
      </div>

      <div class="blog-layout">
        <div class="blog-layout__main" data-blog-list>
          <?php $delay = 0; ?>
          <?php foreach ($BLOG_POSTS as $slug => $post): $url = blog_url($slug); ?>
          <article class="blog-card"
            data-blog-card
            data-category="<?= htmlspecialchars($post['category']) ?>"
            data-search="<?= htmlspecialchars(strtolower($post['title'] . ' ' . $post['excerpt'] . ' ' . $post['category'] . ' ' . $post['author'])) ?>"
            data-reveal="up-lg" data-reveal-delay="<?= $delay ?>">
            <div class="blog-card__row">
              <a class="blog-card__media<?= blog_image_contain($post) ? ' blog-card__media--contain' : '' ?>"
                href="<?= $url ?>" aria-hidden="true" tabindex="-1">
                <img src="<?= htmlspecialchars($post['image']) ?>" alt="<?= htmlspecialchars($post['image_alt']) ?>" loading="lazy" width="800" height="600">
                <span class="blog-card__tag"><?= htmlspecialchars($post['category']) ?></span>
              </a>
              <div class="blog-card__body">
                <div>
                  <div class="blog-card__meta">
                    <span><svg class="icon"><use href="#i-calendar"></use></svg> <?= htmlspecialchars($post['date_display']) ?></span>
                    <span><svg class="icon"><use href="#i-users"></use></svg> <?= htmlspecialchars($post['author']) ?></span>
                    <span><svg class="icon"><use href="#i-clock"></use></svg> <?= (int)$post['read_time'] ?> min</span>
                  </div>
                  <h2 class="blog-card__title">
                    <a href="<?= $url ?>"><?= htmlspecialchars($post['title']) ?></a>
                  </h2>
                  <p class="blog-card__excerpt"><?= htmlspecialchars($post['excerpt']) ?></p>
                </div>
                <a href="<?= $url ?>" class="blog-card__more">Read More <svg class="icon"><use href="#i-arrow-right"></use></svg></a>
              </div>
            </div>
          </article>
          <?php $delay = $delay >= 200 ? 0 : $delay + 100; endforeach; ?>

          <div class="blog-empty" data-blog-empty hidden>
            <p class="blog-empty__title">No articles match that search.</p>
            <p>Try a different word or category.</p>
            <p><button type="button" class="blog-empty__reset" data-blog-reset>Show all articles</button></p>
          </div>
        </div>

        <aside class="sidebar">
          <div class="side-card">
            <h3 class="side-card__title">Search</h3>
            <div class="side-search">
              <input type="search" id="blog-search" aria-label="Search articles"
                placeholder="Search articles..." autocomplete="off">
              <svg class="icon"><use href="#i-search"></use></svg>
            </div>
          </div>

          <div class="side-card">
            <h3 class="side-card__title">Categories</h3>
            <ul class="side-list">
              <?php foreach ($categories as $category => $count): ?>
              <li>
                <button type="button" data-blog-category="<?= htmlspecialchars($category) ?>"
                  class="<?= $active_category === $category ? 'is-active' : '' ?>"
                  aria-pressed="<?= $active_category === $category ? 'true' : 'false' ?>">
                  <span><?= htmlspecialchars($category) ?></span>
                  <span class="side-list__count"><?= (int)$count ?></span>
                </button>
              </li>
              <?php endforeach; ?>
              <li class="side-list__clear">
                <button type="button" data-blog-reset>
                  <span>Show all articles</span>
                  <span class="side-list__count"><?= count($BLOG_POSTS) ?></span>
                </button>
              </li>
            </ul>
          </div>

          <div class="side-card">
            <h3 class="side-card__title">Need to see a doctor?</h3>
            <ul class="side-list">
              <li><a href="/pages/book-appointment.php" class="blog-card__more">Book an appointment <svg class="icon"><use href="#i-arrow-right"></use></svg></a></li>
              <li><a href="/pages/health-packages.php" class="blog-card__more">Health checkup packages <svg class="icon"><use href="#i-arrow-right"></use></svg></a></li>
              <li><a href="/pages/doctors.php" class="blog-card__more">Meet our doctors <svg class="icon"><use href="#i-arrow-right"></use></svg></a></li>
              <li><a href="tel:+917090831208" class="blog-card__more">24/7 helpline: +91 70908 31208 <svg class="icon"><use href="#i-phone"></use></svg></a></li>
            </ul>
          </div>

          <div class="newsletter">
            <h3 class="newsletter__title">Stay Healthy!</h3>
            <p class="newsletter__text">
              Subscribe to our newsletter for weekly health tips and hospital updates.
            </p>
            <form class="newsletter__form" action="https://app.formester.com/forms/ZU90MDpYm/submissions" method="POST">
              <input type="hidden" name="form_type" value="newsletter">
              <input type="email" id="newsletter-email" name="email" required aria-label="Your email address"
                placeholder="Your email address">
              <button type="submit">Subscribe Now</button>
            </form>
          </div>
        </aside>
      </div>
    </div>
  </main>

  <script type="application/ld+json">
  <?php
    $blog_items = [];
    $position = 1;
    foreach ($BLOG_POSTS as $slug => $post) {
      $blog_items[] = [
        '@type'    => 'ListItem',
        'position' => $position++,
        'url'      => $site_origin . blog_url($slug),
        'name'     => $post['title'],
      ];
    }
    echo json_encode([
      '@context'        => 'https://schema.org',
      '@type'           => 'Blog',
      '@id'             => $site_origin . '/blog/#blog',
      'name'            => 'Janani Hospital Health Blog',
      'description'     => $page_description,
      'url'             => $site_origin . '/blog/',
      'inLanguage'      => 'en-IN',
      'publisher'       => ['@type' => 'Organization', 'name' => $site_name, 'url' => $site_origin . '/'],
      'mainEntity'      => ['@type' => 'ItemList', 'itemListElement' => $blog_items],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
  ?>
  </script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
