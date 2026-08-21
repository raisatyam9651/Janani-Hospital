<?php
$page_title = "Book a Lab Test in Vijayapura | Janani Hospital Diagnostics";
$page_description = "Schedule blood tests, scans and diagnostic investigations at Janani Hospital, Vijayapura. Accurate reports, trained technicians and easy online booking.";
$page_css  = ['pages.css'];
$page_js   = ['lab-test.js'];
$page_name = 'book-lab-test';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
<main class="lab">
    <div class="container">
      <div class="lab__card">
        <div class="lab__head">
          <h1 class="lab__title">Book a Lab Test</h1>
          <p class="lab__lede">Schedule your diagnostic tests with ease.</p>
        </div>

        <form class="lab-form" data-lab-form accept-charset="UTF-8"
              action="https://app.formester.com/forms/ZU90MDpYm/submissions" method="POST">
          <input type="hidden" name="form_type" value="lab_test">
          <div>
            <label for="name" class="lab-label">Full Name</label>
            <div class="lab-control">
              <div class="lab-control__icon"><svg class="icon"><use href="#i-user"></use></svg></div>
              <input type="text" name="name" id="name" class="lab-input" placeholder="John Doe" required>
            </div>
          </div>
          <div>
            <label for="email" class="lab-label">Email</label>
            <div class="lab-control">
              <div class="lab-control__icon"><svg class="icon"><use href="#i-mail"></use></svg></div>
              <input type="email" name="email" id="email" class="lab-input" placeholder="you@example.com" required>
            </div>
          </div>
          <div>
            <label for="phone" class="lab-label">Phone</label>
            <div class="lab-control">
              <div class="lab-control__icon"><svg class="icon"><use href="#i-phone"></use></svg></div>
              <input type="tel" name="phone" id="phone" class="lab-input" placeholder="123-456-7890">
            </div>
          </div>

          <div>
            <label for="test" class="lab-label">Select Test</label>
            <select id="test" name="test" class="lab-select">
              <option value="blood_test">Blood Test</option>
              <option value="urine_test">Urine Test</option>
              <option value="x_ray">X-Ray</option>
              <option value="mri">MRI Scan</option>
            </select>
          </div>

          <div>
            <button type="submit" class="lab-submit">
              <svg class="icon"><use href="#i-send"></use></svg>
              Book Now
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>

  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
