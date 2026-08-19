<?php
$page_title = "Careers - Janani Hospital in Vijayapura";
$page_description = "Join our exceptional team. Explore current openings at Janani Hospital. in Vijayapura.";
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

    <div class="careers-hero">
      <div class="careers-hero__bg">
        <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&amp;fit=crop&amp;q=80&amp;w=2000"
          alt="Hospital Team">
      </div>
      <div class="careers-hero__content">
        <h1 class="careers-hero__title" data-reveal="up-lg" data-reveal-on="mount">
          Join Our <span>Exceptional Team</span>
        </h1>
        <p class="careers-hero__lede" data-reveal="up-lg" data-reveal-on="mount" data-reveal-delay="100">
          Empowering healthcare professionals to deliver world-class patient care. Your journey to excellence starts
          here.
        </p>
      </div>
    </div>

    <div class="page__inner" style="margin-top:0">
      <div class="careers-layout">
        <div class="careers-layout__main">
          <h2 class="careers__heading">Current Openings</h2>
          <div class="job" data-reveal="left" data-reveal-delay="0">
            <div class="job__row">
              <div>
                <span class="job__dept">OBG &amp; Fertility</span>
                <h3 class="job__title">Senior Gynaecologist</h3>
                <div class="job__meta">
                  <span><svg class="icon"><use href="#i-map-pin"></use></svg> Janani Hospital, Main Branch</span>
                  <span><svg class="icon"><use href="#i-clock"></use></svg> Full-Time</span>
                  <span><svg class="icon"><use href="#i-briefcase"></use></svg> 8+ Years exp</span>
                </div>
              </div>
              <button type="button" class="job__apply">Apply Now</button>
            </div>
          </div>
          <div class="job" data-reveal="left" data-reveal-delay="100">
            <div class="job__row">
              <div>
                <span class="job__dept">Critical Care (ICU)</span>
                <h3 class="job__title">Registered Staff Nurse</h3>
                <div class="job__meta">
                  <span><svg class="icon"><use href="#i-map-pin"></use></svg> Janani Hospital, Main Branch</span>
                  <span><svg class="icon"><use href="#i-clock"></use></svg> Full-Time</span>
                  <span><svg class="icon"><use href="#i-briefcase"></use></svg> 2-4 Years exp</span>
                </div>
              </div>
              <button type="button" class="job__apply">Apply Now</button>
            </div>
          </div>
          <div class="job" data-reveal="left" data-reveal-delay="200">
            <div class="job__row">
              <div>
                <span class="job__dept">Administration</span>
                <h3 class="job__title">Patient Relationship Manager</h3>
                <div class="job__meta">
                  <span><svg class="icon"><use href="#i-map-pin"></use></svg> Janani Hospital, Main Branch</span>
                  <span><svg class="icon"><use href="#i-clock"></use></svg> Full-Time</span>
                  <span><svg class="icon"><use href="#i-briefcase"></use></svg> 3+ Years exp</span>
                </div>
              </div>
              <button type="button" class="job__apply">Apply Now</button>
            </div>
          </div>
          <div class="job" data-reveal="left" data-reveal-delay="300">
            <div class="job__row">
              <div>
                <span class="job__dept">Diagnostics</span>
                <h3 class="job__title">Lab Technician</h3>
                <div class="job__meta">
                  <span><svg class="icon"><use href="#i-map-pin"></use></svg> Janani Hospital, Main Branch</span>
                  <span><svg class="icon"><use href="#i-clock"></use></svg> Full-Time</span>
                  <span><svg class="icon"><use href="#i-briefcase"></use></svg> 1-3 Years exp</span>
                </div>
              </div>
              <button type="button" class="job__apply">Apply Now</button>
            </div>
          </div>
        </div>

        <div class="careers-aside">
          <div class="careers-cv">
            <h3 class="careers-cv__title">Didn't find a role?</h3>
            <p class="careers-cv__text">
              We are always looking for talented individuals to join our team. Send us your CV for future
              opportunities.
            </p>
            <div>
              <div class="careers-cv__row">
                <div class="careers-cv__icon"><svg class="icon"><use href="#i-send"></use></svg></div>
                <div>
                  <p class="careers-cv__label">Email your CV</p>
                  <p class="careers-cv__value">careers@jananihospital.com</p>
                </div>
              </div>
            </div>
          </div>

          <div class="careers-why">
            <div class="careers-why__inner">
              <h3 class="careers-why__title">Why Janani?</h3>
              <ul class="careers-why__list">
                <li><span class="careers-why__tick">✓</span>Modern medical infrastructure</li>
                <li><span class="careers-why__tick">✓</span>Continuous learning &amp; growth</li>
                <li><span class="careers-why__tick">✓</span>Supportive work environment</li>
              </ul>
            </div>
            <div class="careers-why__glow"></div>
          </div>
        </div>
      </div>
    </div>
  </main>

  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
