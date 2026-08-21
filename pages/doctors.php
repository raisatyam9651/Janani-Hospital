<?php
$page_title = "Best Doctors in Vijayapura | Janani Hospital Specialists";
$page_description = "Meet the gynecologists, fertility specialists, paediatricians, surgeons and orthopedic doctors at Janani Hospital, Vijayapura. Book a consultation today.";
$page_css  = ['pages.css'];
$page_name = 'doctors';
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
          Meet Our <span class="accent-emerald">Expert Doctors</span>
        </h1>
        <p class="page__lede" data-reveal="up" data-reveal-on="mount" data-reveal-delay="100">
          Highly qualified and experienced medical professionals dedicated to your health and well-being.
        </p>
      </div>

      <div class="doctors-filters">
        <div class="doctors-search">
          <svg class="icon"><use href="#i-search"></use></svg>
          <input type="text" id="doctor-search" data-doctor-search
            aria-label="Search by name or specialty" placeholder="Search by name or specialty...">
        </div>

        <div class="doctors-depts">
          <svg class="icon"><use href="#i-filter"></use></svg>
          <div class="doctors-depts__list">
            <button type="button" class="doctors-dept is-active" data-doctor-dept="All">All</button>
            <button type="button" class="doctors-dept" data-doctor-dept="IVF &amp; Fertility">IVF &amp; Fertility</button>
            <button type="button" class="doctors-dept" data-doctor-dept="OBG">OBG</button>
            <button type="button" class="doctors-dept" data-doctor-dept="Pediatrics">Pediatrics</button>
            <button type="button" class="doctors-dept" data-doctor-dept="Orthopedics">Orthopedics</button>
          </div>
        </div>
      </div>

      <div class="doctors-grid">
        <div class="doctor-card" data-doctor data-name="Dr. Janani Ramesh" data-specialty="IVF &amp; Infertility Specialist"
          data-dept="IVF &amp; Fertility" data-reveal="scale" data-reveal-on="mount"
          data-reveal-delay="0">
          <div class="doctor-card__media">
            <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&amp;fit=crop&amp;q=80&amp;w=600" alt="Dr. Janani Ramesh">
            <div class="doctor-card__hover">
              <a href="/pages/doctor-1.php" class="doctor-card__view">
                <span>View Profile</span>
                <svg class="icon"><use href="#i-arrow-right"></use></svg>
              </a>
            </div>
          </div>
          <div class="doctor-card__body">
            <h3 class="doctor-card__name">Dr. Janani Ramesh</h3>
            <p class="doctor-card__specialty">IVF &amp; Infertility Specialist</p>
            <p class="doctor-card__desc">Expert in reproductive medicine and advanced IVF procedures with a high success rate.</p>
            <div class="doctor-card__foot">
              <span class="doctor-card__exp">15+ Years Exp</span>
              <a href="/pages/book-appointment.php" class="doctor-card__book" title="Book Appointment">
                <svg class="icon"><use href="#i-calendar"></use></svg>
              </a>
            </div>
          </div>
        </div>
        <div class="doctor-card" data-doctor data-name="Dr. Ramesh Kumar" data-specialty="Senior Gynecologist"
          data-dept="OBG" data-reveal="scale" data-reveal-on="mount"
          data-reveal-delay="50">
          <div class="doctor-card__media">
            <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&amp;fit=crop&amp;q=80&amp;w=600" alt="Dr. Ramesh Kumar">
            <div class="doctor-card__hover">
              <a href="/pages/doctor-2.php" class="doctor-card__view">
                <span>View Profile</span>
                <svg class="icon"><use href="#i-arrow-right"></use></svg>
              </a>
            </div>
          </div>
          <div class="doctor-card__body">
            <h3 class="doctor-card__name">Dr. Ramesh Kumar</h3>
            <p class="doctor-card__specialty">Senior Gynecologist</p>
            <p class="doctor-card__desc">Specialized in high-risk pregnancy management and laparoscopic surgeries.</p>
            <div class="doctor-card__foot">
              <span class="doctor-card__exp">20+ Years Exp</span>
              <a href="/pages/book-appointment.php" class="doctor-card__book" title="Book Appointment">
                <svg class="icon"><use href="#i-calendar"></use></svg>
              </a>
            </div>
          </div>
        </div>
        <div class="doctor-card" data-doctor data-name="Dr. Priya Dharshini" data-specialty="Pediatrician"
          data-dept="Pediatrics" data-reveal="scale" data-reveal-on="mount"
          data-reveal-delay="100">
          <div class="doctor-card__media">
            <img src="/assets/images/doctor-placeholder.svg" alt="Dr. Priya Dharshini">
            <div class="doctor-card__hover">
              <a href="/pages/doctor-3.php" class="doctor-card__view">
                <span>View Profile</span>
                <svg class="icon"><use href="#i-arrow-right"></use></svg>
              </a>
            </div>
          </div>
          <div class="doctor-card__body">
            <h3 class="doctor-card__name">Dr. Priya Dharshini</h3>
            <p class="doctor-card__specialty">Pediatrician</p>
            <p class="doctor-card__desc">Dedicated to providing compassionate and comprehensive care for infants and children.</p>
            <div class="doctor-card__foot">
              <span class="doctor-card__exp">10+ Years Exp</span>
              <a href="/pages/book-appointment.php" class="doctor-card__book" title="Book Appointment">
                <svg class="icon"><use href="#i-calendar"></use></svg>
              </a>
            </div>
          </div>
        </div>
        <div class="doctor-card" data-doctor data-name="Dr. Suresh Babu" data-specialty="Orthopedic Surgeon"
          data-dept="Orthopedics" data-reveal="scale" data-reveal-on="mount"
          data-reveal-delay="150">
          <div class="doctor-card__media">
            <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&amp;fit=crop&amp;q=80&amp;w=600" alt="Dr. Suresh Babu">
            <div class="doctor-card__hover">
              <a href="/pages/doctor-4.php" class="doctor-card__view">
                <span>View Profile</span>
                <svg class="icon"><use href="#i-arrow-right"></use></svg>
              </a>
            </div>
          </div>
          <div class="doctor-card__body">
            <h3 class="doctor-card__name">Dr. Suresh Babu</h3>
            <p class="doctor-card__specialty">Orthopedic Surgeon</p>
            <p class="doctor-card__desc">Specialist in joint replacement and sports medicine.</p>
            <div class="doctor-card__foot">
              <span class="doctor-card__exp">12+ Years Exp</span>
              <a href="/pages/book-appointment.php" class="doctor-card__book" title="Book Appointment">
                <svg class="icon"><use href="#i-calendar"></use></svg>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="doctors-empty" data-doctors-empty hidden>
        <p>No doctors found matching your criteria.</p>
      </div>
    </div>
  </main>

  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
