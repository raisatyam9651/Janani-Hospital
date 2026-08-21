<?php
$page_title = "Book Doctor Appointment Online | Janani Hospital Vijayapura";
$page_description = "Book an appointment with a specialist at Janani Hospital, Vijayapura in under a minute. Instant confirmation, OPD 8 AM to 8 PM, 24/7 emergency care.";
$page_css  = ['pages.css'];
$page_name = 'book-appointment';
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

    <div class="page__inner page__inner--md">
      <div class="appt">
        <div class="appt__grid">

          <div class="appt__aside">
            <div class="appt__aside-inner">
              <h1 class="appt__title">Schedule Your Visit</h1>
              <p class="appt__lede">
                Book your appointment online and receive instant confirmation via email. We're here to provide the
                best care for you and your family.
              </p>

              <div class="appt__points">
                <div class="appt__point">
                  <div class="appt__point-icon"><svg class="icon"><use href="#i-check-circle"></use></svg></div>
                  <div>
                    <p class="appt__point-title">Instant Confirmation</p>
                    <p class="appt__point-sub">Automated email to patient &amp; doctor</p>
                  </div>
                </div>
                <div class="appt__point">
                  <div class="appt__point-icon"><svg class="icon"><use href="#i-calendar"></use></svg></div>
                  <div>
                    <p class="appt__point-title">Flexible Timing</p>
                    <p class="appt__point-sub">Choose your preferred slot</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="appt__hotline">
              <p class="appt__hotline-label">Emergency Hotline</p>
              <p class="appt__hotline-number">+91 123 456 7890</p>
            </div>

            <div class="appt__orb appt__orb--a"></div>
            <div class="appt__orb appt__orb--b"></div>
          </div>

          <div class="appt__form-col">
            <form class="appt-form" data-appointment-form>
              <div class="appt-form__row">
                <div class="appt-field">
                  <label for="service" class="appt-field__label">
                    <svg class="icon"><use href="#i-activity"></use></svg> Select Service
                  </label>
                  <select id="service" name="service" required class="appt-input">
                      <option value="">Choose Service</option>
                      <option value="IVF &amp; Fertility">IVF &amp; Fertility</option>
                      <option value="Pediatrics">Pediatrics</option>
                      <option value="OBG">OBG</option>
                      <option value="General Medicine">General Medicine</option>
                      <option value="Surgery">Surgery</option>
                      <option value="Orthopedics">Orthopedics</option>
                      <option value="Urology">Urology</option>
                      <option value="Laparoscopy">Laparoscopy</option>
                  </select>
                </div>

                <div class="appt-field">
                  <label for="doctor" class="appt-field__label">
                    <svg class="icon"><use href="#i-user"></use></svg> Select Doctor
                  </label>
                  <select id="doctor" name="doctor" required class="appt-input">
                      <option value="">Choose Doctor</option>
                      <option value="Dr. Janani Ramesh">Dr. Janani Ramesh</option>
                      <option value="Dr. Ramesh Kumar">Dr. Ramesh Kumar</option>
                      <option value="Dr. Priya Dharshini">Dr. Priya Dharshini</option>
                      <option value="Dr. Suresh Babu">Dr. Suresh Babu</option>
                  </select>
                </div>
              </div>

              <div class="appt-form__row">
                <div class="appt-field">
                  <label for="date" class="appt-field__label">
                    <svg class="icon"><use href="#i-calendar"></use></svg> Appointment Date
                  </label>
                  <input type="date" id="date" name="date" required class="appt-input">
                </div>

                <div class="appt-field">
                  <label for="time" class="appt-field__label">
                    <svg class="icon"><use href="#i-clock"></use></svg> Preferred Time
                  </label>
                  <select id="time" name="time" required class="appt-input">
                      <option value="">Choose Time Slot</option>
                      <option value="09:00 AM">09:00 AM</option>
                      <option value="09:30 AM">09:30 AM</option>
                      <option value="10:00 AM">10:00 AM</option>
                      <option value="10:30 AM">10:30 AM</option>
                      <option value="11:00 AM">11:00 AM</option>
                      <option value="11:30 AM">11:30 AM</option>
                      <option value="04:00 PM">04:00 PM</option>
                      <option value="04:30 PM">04:30 PM</option>
                      <option value="05:00 PM">05:00 PM</option>
                      <option value="05:30 PM">05:30 PM</option>
                  </select>
                </div>
              </div>

              <div class="appt-field">
                <label for="name" class="appt-field__label">
                  <svg class="icon"><use href="#i-user"></use></svg> Full Name
                </label>
                <input type="text" id="name" name="name" required class="appt-input"
                  placeholder="Enter patient's full name">
              </div>

              <div class="appt-form__row">
                <div class="appt-field">
                  <label for="phone" class="appt-field__label">
                    <svg class="icon"><use href="#i-phone"></use></svg> Phone Number
                  </label>
                  <input type="tel" id="phone" name="phone" required class="appt-input"
                    placeholder="e.g. +91 98765 43210">
                </div>
                <div class="appt-field">
                  <label for="email" class="appt-field__label">
                    <svg class="icon"><use href="#i-mail"></use></svg> Email Address
                  </label>
                  <input type="email" id="email" name="email" required class="appt-input"
                    placeholder="e.g. patient@example.com">
                </div>
              </div>

              <div class="appt-field">
                <label for="message" class="appt-field__label">
                  <svg class="icon"><use href="#i-message-square"></use></svg> Reason for Visit (Optional)
                </label>
                <textarea id="message" name="message" rows="3" class="appt-input"
                  placeholder="Briefly describe your symptoms or concern..."></textarea>
              </div>

              <button type="submit" class="appt-submit" data-appointment-submit>
                <span data-appointment-label>Confirm Appointment</span>
                <svg class="icon"><use href="#i-check-circle"></use></svg>
              </button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </main>

  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
