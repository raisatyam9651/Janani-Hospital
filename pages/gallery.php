<?php
$page_title = "Gallery - Janani Hospital in Vijayapura";
$page_description = "Explore our state-of-the-art facilities and glimpse into the care we provide at Janani Hospitals. in Vijayapura.";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
<main class="page">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <div class="breadcrumb__inner">
        <ol class="breadcrumb__list">
          <li class="breadcrumb__item">
            <span class="breadcrumb__current"><svg class="icon"><use href="#i-home"></use></svg><span>Home</span></span>
          </li>
        </ol>
      </div>
    </nav>

    <div class="page__inner">
      <div class="page__head">
        <h1 class="page__title" data-reveal="up" data-reveal-on="mount">
          Visual <span class="accent-emerald">Showcase</span>
        </h1>
        <p class="page__lede" data-reveal="up" data-reveal-on="mount" data-reveal-delay="100">
          Explore our state-of-the-art facilities and glimpse into the care we provide at Janani Hospitals.
        </p>
      </div>

      <div class="gallery-filters">
        <button type="button" class="gallery-filter is-active" data-gallery-filter="All">All</button>
        <button type="button" class="gallery-filter" data-gallery-filter="Infrastructure">Infrastructure</button>
        <button type="button" class="gallery-filter" data-gallery-filter="Facilities">Facilities</button>
        <button type="button" class="gallery-filter" data-gallery-filter="Team">Team</button>
        <button type="button" class="gallery-filter" data-gallery-filter="Events">Events</button>
      </div>

      <div class="gallery-grid">
        <div class="gallery-item" data-gallery-item data-category="Facilities" data-type="image"
          data-src="/assets/images/gallery/WhatsApp%20Image%202026-04-25%20at%203.00.53%20PM.jpeg" data-title="Hospital Entrance" data-reveal="scale" data-reveal-on="mount"
          data-reveal-delay="0">
          <div class="gallery-item__frame">
            <img src="/assets/images/gallery/WhatsApp%20Image%202026-04-25%20at%203.00.53%20PM.jpeg" alt="Hospital Entrance">
          </div>
          <div class="gallery-item__overlay">
            <span class="gallery-item__cat">Facilities</span>
            <h3 class="gallery-item__title">
              Hospital Entrance
              <svg class="icon"><use href="#i-maximize-2"></use></svg>
            </h3>
          </div>
        </div>
        <div class="gallery-item" data-gallery-item data-category="Infrastructure" data-type="image"
          data-src="/assets/images/gallery/WhatsApp%20Image%202026-04-25%20at%203.01.07%20PM.jpeg" data-title="Reception Area" data-reveal="scale" data-reveal-on="mount"
          data-reveal-delay="100">
          <div class="gallery-item__frame">
            <img src="/assets/images/gallery/WhatsApp%20Image%202026-04-25%20at%203.01.07%20PM.jpeg" alt="Reception Area">
          </div>
          <div class="gallery-item__overlay">
            <span class="gallery-item__cat">Infrastructure</span>
            <h3 class="gallery-item__title">
              Reception Area
              <svg class="icon"><use href="#i-maximize-2"></use></svg>
            </h3>
          </div>
        </div>
        <div class="gallery-item" data-gallery-item data-category="Facilities" data-type="image"
          data-src="/assets/images/gallery/WhatsApp%20Image%202026-04-25%20at%203.01.16%20PM.jpeg" data-title="Consultation Room" data-reveal="scale" data-reveal-on="mount"
          data-reveal-delay="200">
          <div class="gallery-item__frame">
            <img src="/assets/images/gallery/WhatsApp%20Image%202026-04-25%20at%203.01.16%20PM.jpeg" alt="Consultation Room">
          </div>
          <div class="gallery-item__overlay">
            <span class="gallery-item__cat">Facilities</span>
            <h3 class="gallery-item__title">
              Consultation Room
              <svg class="icon"><use href="#i-maximize-2"></use></svg>
            </h3>
          </div>
        </div>
        <div class="gallery-item" data-gallery-item data-category="Infrastructure" data-type="image"
          data-src="/assets/images/gallery/WhatsApp%20Image%202026-04-25%20at%203.01.17%20PM.jpeg" data-title="Waiting Lounge" data-reveal="scale" data-reveal-on="mount"
          data-reveal-delay="300">
          <div class="gallery-item__frame">
            <img src="/assets/images/gallery/WhatsApp%20Image%202026-04-25%20at%203.01.17%20PM.jpeg" alt="Waiting Lounge">
          </div>
          <div class="gallery-item__overlay">
            <span class="gallery-item__cat">Infrastructure</span>
            <h3 class="gallery-item__title">
              Waiting Lounge
              <svg class="icon"><use href="#i-maximize-2"></use></svg>
            </h3>
          </div>
        </div>
        <div class="gallery-item" data-gallery-item data-category="Facilities" data-type="image"
          data-src="/assets/images/gallery/WhatsApp%20Image%202026-04-25%20at%203.01.18%20PM.jpeg" data-title="Modern Equipment" data-reveal="scale" data-reveal-on="mount"
          data-reveal-delay="400">
          <div class="gallery-item__frame">
            <img src="/assets/images/gallery/WhatsApp%20Image%202026-04-25%20at%203.01.18%20PM.jpeg" alt="Modern Equipment">
          </div>
          <div class="gallery-item__overlay">
            <span class="gallery-item__cat">Facilities</span>
            <h3 class="gallery-item__title">
              Modern Equipment
              <svg class="icon"><use href="#i-maximize-2"></use></svg>
            </h3>
          </div>
        </div>
        <div class="gallery-item" data-gallery-item data-category="Infrastructure" data-type="video"
          data-src="/assets/images/gallery/WhatsApp%20Video%202026-04-25%20at%203.10.10%20PM.mp4" data-title="Hospital Tour" data-reveal="scale" data-reveal-on="mount"
          data-reveal-delay="500">
          <div class="gallery-item__frame">
            <img src="/assets/images/gallery/WhatsApp%20Image%202026-04-25%20at%203.03.13%20PM.jpeg" alt="Hospital Tour">
          </div>
          <div class="gallery-item__overlay">
            <span class="gallery-item__cat">Infrastructure</span>
            <h3 class="gallery-item__title">
              Hospital Tour
              <svg class="icon icon--play"><use href="#i-play"></use></svg>
            </h3>
          </div>
          <div class="gallery-item__play"><svg class="icon"><use href="#i-play"></use></svg></div>
        </div>
        <div class="gallery-item" data-gallery-item data-category="Team" data-type="image"
          data-src="/assets/images/gallery/WhatsApp%20Image%202026-04-25%20at%203.03.14%20PM.jpeg" data-title="Our Medical Team" data-reveal="scale" data-reveal-on="mount"
          data-reveal-delay="600">
          <div class="gallery-item__frame">
            <img src="/assets/images/gallery/WhatsApp%20Image%202026-04-25%20at%203.03.14%20PM.jpeg" alt="Our Medical Team">
          </div>
          <div class="gallery-item__overlay">
            <span class="gallery-item__cat">Team</span>
            <h3 class="gallery-item__title">
              Our Medical Team
              <svg class="icon"><use href="#i-maximize-2"></use></svg>
            </h3>
          </div>
        </div>
        <div class="gallery-item" data-gallery-item data-category="Events" data-type="image"
          data-src="/assets/images/gallery/WhatsApp%20Image%202026-04-25%20at%203.03.14%20PM%20(1).jpeg" data-title="Health Awareness Camp" data-reveal="scale" data-reveal-on="mount"
          data-reveal-delay="700">
          <div class="gallery-item__frame">
            <img src="/assets/images/gallery/WhatsApp%20Image%202026-04-25%20at%203.03.14%20PM%20(1).jpeg" alt="Health Awareness Camp">
          </div>
          <div class="gallery-item__overlay">
            <span class="gallery-item__cat">Events</span>
            <h3 class="gallery-item__title">
              Health Awareness Camp
              <svg class="icon"><use href="#i-maximize-2"></use></svg>
            </h3>
          </div>
        </div>
      </div>

      <div class="lightbox" data-lightbox>
        <button type="button" class="lightbox__close" data-lightbox-close aria-label="Close"><svg class="icon"><use href="#i-x"></use></svg></button>
        <div class="lightbox__stage" data-lightbox-panel>
          <div data-lightbox-stage style="width:100%;height:100%"></div>
          <div class="lightbox__caption">
            <h2 data-lightbox-title></h2>
            <p data-lightbox-category></p>
          </div>
        </div>
      </div>
    </div>
  </main>

  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
