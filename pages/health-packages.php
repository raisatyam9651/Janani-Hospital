<?php
$page_title = "Health Packages - Janani Hospital in Vijayapura";
$page_description = "Choose from our comprehensive health check-up packages. in Vijayapura.";
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
<main class="packages-page">
    <section class="packages">
      <div class="container">
        <div class="packages__head">
          <h1 class="packages__title">Our Health Packages</h1>
          <p class="packages__lede">Choose from our comprehensive health check-up packages.</p>
        </div>

        <div class="packages__grid">
          <div class="pkg" data-package="basic" data-name="Basic Health Check-up"
            style="--pkg-from: var(--teal-500); --pkg-to: var(--teal-600)">
            <div class="pkg__badge-wrap">
              <div class="pkg__badge">Most Popular</div>
            </div>
            <div class="pkg__head">
              <h3 class="pkg__name">Basic Health Check-up</h3>
              <div class="pkg__prices">
                <span class="pkg__price">₹1,299</span>
                <span class="pkg__was">₹1,999</span>
                <span class="pkg__off">35% OFF</span>
              </div>
            </div>
            <div class="pkg__body">
              <h4>Package Includes:</h4>
              <div class="pkg__list">
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Complete Blood Count</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Blood Sugar Fasting</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Liver Function Tests</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Kidney Function Tests</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Lipid Profile</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>ECG</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Chest X-Ray</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Doctor Consultation</span></div>
              </div>
            </div>
            <div class="pkg__foot">
              <button type="button" class="pkg__select" data-package-select>
                <svg class="icon"><use href="#i-calendar"></use></svg>
                <span data-package-label>Select Package</span>
              </button>
            </div>
          </div>
          <div class="pkg" data-package="comprehensive" data-name="Comprehensive Health Check-up"
            style="--pkg-from: var(--blue-500); --pkg-to: var(--blue-600)">
            <div class="pkg__badge-wrap">
              <div class="pkg__badge">Recommended</div>
            </div>
            <div class="pkg__head">
              <h3 class="pkg__name">Comprehensive Health Check-up</h3>
              <div class="pkg__prices">
                <span class="pkg__price">₹2,499</span>
                <span class="pkg__was">₹3,999</span>
                <span class="pkg__off">38% OFF</span>
              </div>
            </div>
            <div class="pkg__body">
              <h4>Package Includes:</h4>
              <div class="pkg__list">
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Everything in Basic</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Thyroid Function Tests</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Vitamin D3 &amp; B12</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>TSH Profile</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Urine Routine</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Stress Test</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Pap Smear Test</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>2D Echo</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Doctor Consultation</span></div>
              </div>
            </div>
            <div class="pkg__foot">
              <button type="button" class="pkg__select" data-package-select>
                <svg class="icon"><use href="#i-calendar"></use></svg>
                <span data-package-label>Select Package</span>
              </button>
            </div>
          </div>
          <div class="pkg" data-package="executive" data-name="Executive Health Check-up"
            style="--pkg-from: var(--purple-500); --pkg-to: var(--purple-600)">
            <div class="pkg__badge-wrap">
              <div class="pkg__badge">Premium</div>
            </div>
            <div class="pkg__head">
              <h3 class="pkg__name">Executive Health Check-up</h3>
              <div class="pkg__prices">
                <span class="pkg__price">₹4,999</span>
                <span class="pkg__was">₹7,999</span>
                <span class="pkg__off">38% OFF</span>
              </div>
            </div>
            <div class="pkg__body">
              <h4>Package Includes:</h4>
              <div class="pkg__list">
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Everything in Comprehensive</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Cardiac MRI</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>CT Scan</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Pulmonary Function Test</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Hormone Panel</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Tumor Markers</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Genetic Counseling</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Nutrition Consultation</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Senior Specialist Consultation</span></div>
              </div>
            </div>
            <div class="pkg__foot">
              <button type="button" class="pkg__select" data-package-select>
                <svg class="icon"><use href="#i-calendar"></use></svg>
                <span data-package-label>Select Package</span>
              </button>
            </div>
          </div>
          <div class="pkg" data-package="women" data-name="Women Health Package"
            style="--pkg-from: var(--pink-500); --pkg-to: var(--pink-600)">
            <div class="pkg__badge-wrap">
              <div class="pkg__badge">Popular</div>
            </div>
            <div class="pkg__head">
              <h3 class="pkg__name">Women Health Package</h3>
              <div class="pkg__prices">
                <span class="pkg__price">₹1,999</span>
                <span class="pkg__was">₹2,999</span>
                <span class="pkg__off">33% OFF</span>
              </div>
            </div>
            <div class="pkg__body">
              <h4>Package Includes:</h4>
              <div class="pkg__list">
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>CBC with ESR</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Blood Sugar (Fasting &amp; PP)</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>HbA1c</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>TSH Profile</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Urine Routine &amp; Culture</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Pap Smear Test</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>USG Abdomen</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Mammography</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Bone Density Test</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Gynecological Consultation</span></div>
              </div>
            </div>
            <div class="pkg__foot">
              <button type="button" class="pkg__select" data-package-select>
                <svg class="icon"><use href="#i-calendar"></use></svg>
                <span data-package-label>Select Package</span>
              </button>
            </div>
          </div>
          <div class="pkg" data-package="senior" data-name="Senior Citizen Package"
            style="--pkg-from: var(--orange-500); --pkg-to: var(--orange-600)">
            <div class="pkg__badge-wrap">
              <div class="pkg__badge">Recommended</div>
            </div>
            <div class="pkg__head">
              <h3 class="pkg__name">Senior Citizen Package</h3>
              <div class="pkg__prices">
                <span class="pkg__price">₹3,999</span>
                <span class="pkg__was">₹5,999</span>
                <span class="pkg__off">33% OFF</span>
              </div>
            </div>
            <div class="pkg__body">
              <h4>Package Includes:</h4>
              <div class="pkg__list">
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Complete Blood Count</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Kidney &amp; Liver Function</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Blood Sugar</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Thyroid Function</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Vitamin D3, B12</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Bone Density Test</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>ECG &amp; 2D Echo</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Chest X-Ray</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Urine Routine</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Senior Specialist Consultation</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Medication Review</span></div>
              </div>
            </div>
            <div class="pkg__foot">
              <button type="button" class="pkg__select" data-package-select>
                <svg class="icon"><use href="#i-calendar"></use></svg>
                <span data-package-label>Select Package</span>
              </button>
            </div>
          </div>
          <div class="pkg" data-package="corporate" data-name="Corporate Health Package"
            style="--pkg-from: var(--green-500); --pkg-to: var(--green-600)">
            <div class="pkg__badge-wrap">
              <div class="pkg__badge">Corporate</div>
            </div>
            <div class="pkg__head">
              <h3 class="pkg__name">Corporate Health Package</h3>
              <div class="pkg__prices">
                <span class="pkg__price">₹2,999</span>
                <span class="pkg__was">₹4,999</span>
                <span class="pkg__off">40% OFF</span>
              </div>
            </div>
            <div class="pkg__body">
              <h4>Package Includes:</h4>
              <div class="pkg__list">
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Complete Blood Count</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Basic Metabolic Panel</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Liver Function Tests</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Kidney Function Tests</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>ECG</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Chest X-Ray</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Doctor Consultation</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Health Report Summary</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Corporate Wellness Counseling</span></div>
              </div>
            </div>
            <div class="pkg__foot">
              <button type="button" class="pkg__select" data-package-select>
                <svg class="icon"><use href="#i-calendar"></use></svg>
                <span data-package-label>Select Package</span>
              </button>
            </div>
          </div>
          <div class="pkg" data-package="dental" data-name="Dental Check-up"
            style="--pkg-from: var(--cyan-500); --pkg-to: var(--teal-600)">
            <div class="pkg__head">
              <h3 class="pkg__name">Dental Check-up</h3>
              <div class="pkg__prices">
                <span class="pkg__price">₹799</span>
                <span class="pkg__was">₹999</span>
                <span class="pkg__off">20% OFF</span>
              </div>
            </div>
            <div class="pkg__body">
              <h4>Package Includes:</h4>
              <div class="pkg__list">
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Oral Examination</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Oral Health Screening</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Dental X-Ray</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Scaling &amp; Polishing</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Fluoride Treatment</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Dental Consultation</span></div>
              </div>
            </div>
            <div class="pkg__foot">
              <button type="button" class="pkg__select" data-package-select>
                <svg class="icon"><use href="#i-calendar"></use></svg>
                <span data-package-label>Select Package</span>
              </button>
            </div>
          </div>
          <div class="pkg" data-package="eye" data-name="Eye Check-up"
            style="--pkg-from: var(--violet-500); --pkg-to: var(--indigo-600)">
            <div class="pkg__head">
              <h3 class="pkg__name">Eye Check-up</h3>
              <div class="pkg__prices">
                <span class="pkg__price">₹1,299</span>
                <span class="pkg__was">₹1599</span>
                <span class="pkg__off">19% OFF</span>
              </div>
            </div>
            <div class="pkg__body">
              <h4>Package Includes:</h4>
              <div class="pkg__list">
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Vision Testing</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Intraocular Pressure</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Refraction Test</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Slit Lamp Examination</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Color Vision Test</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Eye Examination</span></div>
                <div class="pkg__item"><svg class="icon"><use href="#i-check-circle"></use></svg><span>Ophthalmologist Consultation</span></div>
              </div>
            </div>
            <div class="pkg__foot">
              <button type="button" class="pkg__select" data-package-select>
                <svg class="icon"><use href="#i-calendar"></use></svg>
                <span data-package-label>Select Package</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <template data-package-booking-template>
      <section class="pkg-booking is-visible" data-package-booking>
      <div class="container">
        <div class="pkg-booking__inner">
          <div class="pkg-booking__card">
            <h3 class="pkg-booking__title">Book: <span data-package-booking-name></span></h3>
            <p class="pkg-booking__lede">Fill in your details to schedule your appointment.</p>
          </div>
          <form class="pkg-booking__form" data-package-form>
            <button type="submit" class="pkg-booking__submit" data-package-submit>Book Appointment</button>
            </form>
          </div>
        </div>
      </section>
    </template>
  </main>

  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
