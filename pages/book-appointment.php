<?php
$page_title = "Book Doctor Appointment Online | Janani Hospital Vijayapura";
$page_description = "Book an appointment with a specialist doctor at Janani Hospital, Vijayapura in under a minute. Instant confirmation, OPD 8 AM to 8 PM, 24/7 emergency care.";
$page_css  = ['forms.css', 'pages.css'];
$page_js   = ['appointment.js'];
$page_name = 'book-appointment';
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
            <span class="breadcrumb__current">Book Appointment</span>
          </li>
        </ol>
      </div>
    </nav>

    <div class="page__inner page__inner--md">
      <div class="appt">
        <div class="appt__grid">

          <!-- Left Info & Trust Column -->
          <div class="appt__aside">
            <div class="appt__aside-inner">
              <div class="appt__badge">
                <svg class="icon icon--16"><use href="#i-award"></use></svg>
                <span>Janani Multispeciality Hospital</span>
              </div>
              <h1 class="appt__title">Schedule Your Consultation</h1>
              <p class="appt__lede">
                Book your appointment online with our expert specialists in less than a minute. Receive instant confirmation &amp; seamless hospital care.
              </p>

              <div class="appt__points">
                <div class="appt__point">
                  <div class="appt__point-icon"><svg class="icon"><use href="#i-check-circle"></use></svg></div>
                  <div>
                    <p class="appt__point-title">Instant Confirmation</p>
                    <p class="appt__point-sub">Automated notification to patient &amp; doctor</p>
                  </div>
                </div>
                <div class="appt__point">
                  <div class="appt__point-icon"><svg class="icon"><use href="#i-clock"></use></svg></div>
                  <div>
                    <p class="appt__point-title">OPD Timings</p>
                    <p class="appt__point-sub">Monday – Sunday: 8:00 AM – 8:00 PM</p>
                  </div>
                </div>
                <div class="appt__point">
                  <div class="appt__point-icon"><svg class="icon"><use href="#i-users"></use></svg></div>
                  <div>
                    <p class="appt__point-title">15+ Specialist Doctors</p>
                    <p class="appt__point-sub">IVF, OBG, Pediatrics, Ortho &amp; General Surgery</p>
                  </div>
                </div>
              </div>

              <div class="appt__trust-card">
                <div class="appt__trust-stars" aria-hidden="true">★★★★★</div>
                <p class="appt__trust-text">"Compassionate doctors, modern facilities, and instant booking."</p>
                <p class="appt__trust-sub">Trusted by 50,000+ families in Vijayapura</p>
              </div>
            </div>

            <div class="appt__hotline">
              <p class="appt__hotline-label">24/7 Emergency &amp; Trauma Care</p>
              <a href="tel:+917090831208" class="appt__hotline-number">
                <svg class="icon"><use href="#i-phone"></use></svg>
                <span>+91 70908 31208</span>
              </a>
            </div>

            <div class="appt__orb appt__orb--a"></div>
            <div class="appt__orb appt__orb--b"></div>
          </div>

          <!-- Right Form Column -->
          <div class="appt__form-col">
            <form class="appt-form" data-appointment-form accept-charset="UTF-8"
              action="https://app.formester.com/forms/ZU90MDpYm/submissions" method="POST">
              <input type="hidden" name="form_type" value="appointment_page">

              <!-- Step 1: Department & Specialist -->
              <div class="appt-section-head">
                <span class="appt-section-step">Step 1</span>
                <h2 class="appt-section-title">Department &amp; Specialist</h2>
              </div>

              <div class="appt-form__row">
                <div class="appt-field">
                  <label for="service" class="appt-field__label">
                    <svg class="icon"><use href="#i-activity"></use></svg> Select Department / Service (Optional)
                  </label>
                  <div class="appt-select-wrap">
                    <select id="service" name="service" class="appt-input" data-service-select>
                        <option value="">Choose Service (Optional)</option>
                        <option value="IVF &amp; Fertility">IVF &amp; Fertility</option>
                        <option value="OBG">Obstetrics &amp; Gynecology (OBG)</option>
                        <option value="Pediatrics">Pediatrics &amp; Child Health</option>
                        <option value="General Medicine">General Medicine</option>
                        <option value="Surgery">General &amp; Laparoscopic Surgery</option>
                        <option value="Orthopedics">Orthopedics &amp; Joint Care</option>
                        <option value="Urology">Urology</option>
                    </select>
                    <svg class="icon appt-select-arrow"><use href="#i-chevron-down"></use></svg>
                  </div>
                </div>

                <div class="appt-field">
                  <label for="doctor" class="appt-field__label">
                    <svg class="icon"><use href="#i-user"></use></svg> Select Doctor <span class="required">*</span>
                  </label>
                  <div class="appt-select-wrap">
                    <select id="doctor" name="doctor" required class="appt-input" data-doctor-select>
                        <option value="">Choose Doctor</option>
                        <option value="Dr. Janani Ramesh" data-dept="IVF &amp; Fertility,OBG">Dr. Janani Ramesh (IVF &amp; Infertility Specialist)</option>
                        <option value="Dr. Ramesh Kumar" data-dept="OBG,Surgery">Dr. Ramesh Kumar (Senior Gynecologist &amp; Surgeon)</option>
                        <option value="Dr. Priya Dharshini" data-dept="Pediatrics">Dr. Priya Dharshini (Pediatrician)</option>
                        <option value="Dr. Suresh Babu" data-dept="Orthopedics">Dr. Suresh Babu (Orthopedic Surgeon)</option>
                        <option value="Any Available Specialist" data-dept="all">Any Available Senior Specialist</option>
                    </select>
                    <svg class="icon appt-select-arrow"><use href="#i-chevron-down"></use></svg>
                  </div>
                </div>
              </div>

              <!-- Step 2: Date & Slot Selection -->
              <div class="appt-section-head">
                <span class="appt-section-step">Step 2</span>
                <h2 class="appt-section-title">Preferred Date &amp; Time Slot</h2>
              </div>

              <div class="appt-form__row">
                <div class="appt-field">
                  <label for="date" class="appt-field__label">
                    <svg class="icon"><use href="#i-calendar"></use></svg> Appointment Date <span class="required">*</span>
                  </label>
                  <input type="date" id="date" name="date" required class="appt-input" data-appointment-date>
                </div>

                <div class="appt-field">
                  <label for="time" class="appt-field__label">
                    <svg class="icon"><use href="#i-clock"></use></svg> Preferred Time Slot <span class="required">*</span>
                  </label>
                  <div class="appt-select-wrap">
                    <select id="time" name="time" required class="appt-input" data-time-select>
                        <option value="">Choose Time Slot</option>
                        <optgroup label="Morning Session (09:00 AM - 11:30 AM)">
                          <option value="09:00 AM">09:00 AM</option>
                          <option value="09:30 AM">09:30 AM</option>
                          <option value="10:00 AM">10:00 AM</option>
                          <option value="10:30 AM">10:30 AM</option>
                          <option value="11:00 AM">11:00 AM</option>
                          <option value="11:30 AM">11:30 AM</option>
                        </optgroup>
                        <optgroup label="Evening Session (04:00 PM - 06:30 PM)">
                          <option value="04:00 PM">04:00 PM</option>
                          <option value="04:30 PM">04:30 PM</option>
                          <option value="05:00 PM">05:00 PM</option>
                          <option value="05:30 PM">05:30 PM</option>
                          <option value="06:00 PM">06:00 PM</option>
                          <option value="06:30 PM">06:30 PM</option>
                        </optgroup>
                    </select>
                    <svg class="icon appt-select-arrow"><use href="#i-chevron-down"></use></svg>
                  </div>
                </div>
              </div>

              <!-- Quick Time Chips -->
              <div class="appt-slots-container">
                <p class="appt-slots-label">Quick Slot Selection:</p>
                <div class="appt-slots-grid" data-slots-grid>
                  <button type="button" class="appt-slot-btn" data-slot="09:00 AM">09:00 AM</button>
                  <button type="button" class="appt-slot-btn" data-slot="10:30 AM">10:30 AM</button>
                  <button type="button" class="appt-slot-btn" data-slot="11:30 AM">11:30 AM</button>
                  <button type="button" class="appt-slot-btn" data-slot="04:30 PM">04:30 PM</button>
                  <button type="button" class="appt-slot-btn" data-slot="05:30 PM">05:30 PM</button>
                  <button type="button" class="appt-slot-btn" data-slot="06:30 PM">06:30 PM</button>
                </div>
              </div>

              <!-- Step 3: Patient Information -->
              <div class="appt-section-head">
                <span class="appt-section-step">Step 3</span>
                <h2 class="appt-section-title">Patient Contact Information</h2>
              </div>

              <div class="appt-field">
                <label for="name" class="appt-field__label">
                  <svg class="icon"><use href="#i-user"></use></svg> Full Name <span class="required">*</span>
                </label>
                <input type="text" id="name" name="name" required class="appt-input"
                  placeholder="Enter patient's full name">
              </div>

              <div class="appt-form__row">
                <div class="appt-field">
                  <label for="phone" class="appt-field__label">
                    <svg class="icon"><use href="#i-phone"></use></svg> Phone Number <span class="required">*</span>
                  </label>
                  <div class="appt-phone-input-wrap">
                    <span class="appt-phone-prefix">+91</span>
                    <input type="tel" id="phone" name="phone" required class="appt-input appt-input--phone"
                      placeholder="98765 43210" pattern="[0-9]{10}" title="Please enter a valid 10-digit mobile number">
                  </div>
                </div>
                <div class="appt-field">
                  <label for="email" class="appt-field__label">
                    <svg class="icon"><use href="#i-mail"></use></svg> Email Address (Optional)
                  </label>
                  <input type="email" id="email" name="email" class="appt-input"
                    placeholder="e.g. patient@example.com">
                </div>
              </div>

              <div class="appt-field">
                <label for="message" class="appt-field__label">
                  <svg class="icon"><use href="#i-message-square"></use></svg> Reason for Visit / Symptoms (Optional)
                </label>
                <textarea id="message" name="message" rows="3" class="appt-input"
                  placeholder="Briefly describe your symptoms or specific concerns..."></textarea>
              </div>

              <div class="appt-footer-box">
                <button type="submit" class="appt-submit" data-appointment-submit>
                  <span data-appointment-label>Confirm Appointment</span>
                  <svg class="icon"><use href="#i-check-circle"></use></svg>
                </button>

                <p class="appt-guarantee">
                  <svg class="icon"><use href="#i-shield"></use></svg>
                  <span>Your medical details are strictly confidential. Instant confirmation provided upon booking.</span>
                </p>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </main>

  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

