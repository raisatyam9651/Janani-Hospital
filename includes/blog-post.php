<?php
/* ==========================================================================
   blog-post.php — the shell every article under /blog/ renders inside.

   A post file sets $slug, buffers its body markup into $post_body, then
   includes this file. Everything else — SEO tags, breadcrumb, hero, byline,
   related-department links, author card, appointment CTA, related posts and
   BlogPosting schema — is derived from the entry in includes/blog-posts.php,
   so a post file only ever contains the words of the article.
   ========================================================================== */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-posts.php';

if (!isset($slug) || !isset($BLOG_POSTS[$slug])) {
  // A post file with no registry entry is a bug, not a 404 for the visitor.
  header('Location: /blog/', true, 302);
  exit;
}

$post      = $BLOG_POSTS[$slug];
$post_url  = blog_url($slug);
$post_body = isset($post_body) ? $post_body : '';
$related   = blog_related($BLOG_POSTS, $slug, 3);

// 'title_tag' is the short form for long headlines; the H1 still uses 'title'.
$page_title       = (isset($post['title_tag']) ? $post['title_tag'] : $post['title'])
                  . ' | Janani Hospital Vijayapura';
$page_description = $post['description'];
$page_keywords    = $post['keywords'];
$page_css         = ['pages.css'];
$page_name        = 'blog';

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
            <a href="/blog/" class="breadcrumb__link"><span>Blog</span></a>
          </li>
          <li class="breadcrumb__item">
            <span class="breadcrumb__current"><span><?= htmlspecialchars($post['title']) ?></span></span>
          </li>
        </ol>
      </div>
    </nav>

    <div class="page__inner page__inner--narrow">
      <article class="post">

        <header class="post__head" data-reveal="up" data-reveal-on="mount">
          <a class="post__tag" href="/blog/?category=<?= urlencode($post['category']) ?>"><?= htmlspecialchars($post['category']) ?></a>
          <h1 class="post__title"><?= htmlspecialchars($post['title']) ?></h1>
          <div class="post__meta">
            <span><svg class="icon"><use href="#i-calendar"></use></svg> <?= htmlspecialchars($post['date_display']) ?></span>
            <span><svg class="icon"><use href="#i-users"></use></svg>
              <a href="<?= htmlspecialchars($post['author_url']) ?>"><?= htmlspecialchars($post['author']) ?></a>
            </span>
            <span><svg class="icon"><use href="#i-clock"></use></svg> <?= (int)$post['read_time'] ?> min read</span>
          </div>
        </header>

        <figure class="post__hero<?= blog_image_contain($post) ? ' post__hero--contain' : '' ?>"
          data-reveal="up" data-reveal-on="mount" data-reveal-delay="100">
          <img src="<?= htmlspecialchars($post['image']) ?>" alt="<?= htmlspecialchars($post['image_alt']) ?>" width="1200" height="675">
        </figure>

        <div class="post__body">
          <?= $post_body ?>
        </div>

        <?php if (!empty($post['links'])): ?>
        <div class="post__links">
          <h2 class="post__links-title">Related care at Janani Hospital</h2>
          <div class="post__chips">
            <?php foreach ($post['links'] as $link): ?>
            <a class="post__chip" href="<?= htmlspecialchars($link[1]) ?>">
              <?= htmlspecialchars($link[0]) ?>
              <svg class="icon"><use href="#i-arrow-right"></use></svg>
            </a>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>

        <div class="post__author">
          <span class="post__author-icon"><svg class="icon"><use href="#i-users"></use></svg></span>
          <div>
            <p class="post__author-label">Reviewed by</p>
            <p class="post__author-name">
              <a href="<?= htmlspecialchars($post['author_url']) ?>"><?= htmlspecialchars($post['author']) ?></a>
            </p>
            <p class="post__author-role"><?= htmlspecialchars($post['author_role']) ?>, Janani Multispeciality Hospital and Research Centre, Vijayapura</p>
          </div>
        </div>

        <p class="post__disclaimer">
          This article is general health information and does not replace a consultation. For advice on your own
          symptoms, please <a href="/pages/book-appointment.php">book an appointment</a> or call our 24/7 helpline on
          <a href="tel:+917090831208">+91 70908 31208</a>.
        </p>

        <aside class="post__cta">
          <div>
            <h2 class="post__cta-title">Talk to a specialist at Janani Hospital</h2>
            <p class="post__cta-text">
              OPD 8 AM &ndash; 8 PM, emergency care round the clock. Jalnagar Main Road, KK Colony, Vijayapura.
            </p>
          </div>
          <div class="post__cta-actions">
            <a href="/pages/book-appointment.php" class="post__cta-btn post__cta-btn--primary">
              <svg class="icon"><use href="#i-calendar"></use></svg> Book Appointment
            </a>
            <a href="tel:+917090831208" class="post__cta-btn post__cta-btn--ghost">
              <svg class="icon"><use href="#i-phone"></use></svg> +91 70908 31208
            </a>
          </div>
        </aside>
      </article>

      <?php if ($related): ?>
      <section class="post-related" aria-labelledby="post-related-title">
        <h2 class="post-related__title" id="post-related-title">Continue reading</h2>
        <div class="post-related__grid">
          <?php foreach ($related as $rel_slug => $rel): ?>
          <a class="post-related__card<?= blog_image_contain($rel) ? ' post-related__card--contain' : '' ?>"
            href="<?= htmlspecialchars(blog_url($rel_slug)) ?>">
            <img src="<?= htmlspecialchars($rel['image']) ?>" alt="<?= htmlspecialchars($rel['title']) ?>" loading="lazy" width="400" height="260">
            <div class="post-related__body">
              <span class="post-related__tag"><?= htmlspecialchars($rel['category']) ?></span>
              <h3 class="post-related__heading"><?= htmlspecialchars($rel['title']) ?></h3>
              <span class="post-related__more">Read article <svg class="icon"><use href="#i-arrow-right"></use></svg></span>
            </div>
          </a>
          <?php endforeach; ?>
        </div>
        <p class="post-related__all"><a href="/blog/">View all articles <svg class="icon"><use href="#i-arrow-right"></use></svg></a></p>
      </section>
      <?php endif; ?>
    </div>
  </main>

  <script type="application/ld+json">
  <?= json_encode([
    '@context'         => 'https://schema.org',
    '@type'            => 'BlogPosting',
    'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => $site_origin . $post_url],
    'headline'         => $post['title'],
    'description'      => $post['description'],
    'image'            => $site_origin . $post['image'],
    'datePublished'    => $post['date'],
    'dateModified'     => $post['date'],
    'articleSection'   => $post['category'],
    'inLanguage'       => 'en-IN',
    'author'    => ['@type' => 'Person', 'name' => $post['author'], 'url' => $site_origin . $post['author_url']],
    'publisher' => [
      '@type' => 'Organization',
      'name'  => $site_name,
      'url'   => $site_origin . '/',
      'logo'  => ['@type' => 'ImageObject', 'url' => $og_image],
    ],
  ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>
  </script>

  <script type="application/ld+json">
  <?= json_encode([
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => [
      ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $site_origin . '/'],
      ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => $site_origin . '/blog/'],
      ['@type' => 'ListItem', 'position' => 3, 'name' => $post['title'], 'item' => $site_origin . $post_url],
    ],
  ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>
  </script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
