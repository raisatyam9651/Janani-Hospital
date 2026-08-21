<footer class="site-footer">
    <div class="container site-footer__main">
      <div class="site-footer__grid">

        <div class="site-footer__brand">
          <div class="site-footer__brand-head">
            <img src="https://quest-media-storage-bucket.s3.us-east-2.amazonaws.com/1759402892809-logo.jpg"
              alt="Janani Hospital">
            <div>
              <h3 class="site-footer__brand-name">Janani Hospital</h3>
            </div>
          </div>
          <p class="site-footer__tagline">
            Providing exceptional healthcare services with compassion and cutting-edge technology. Your health and
            wellbeing is our priority.
          </p>
        </div>

        <div>
          <h4 class="site-footer__heading">Quick Links</h4>
          <ul class="site-footer__list site-footer__list--links">
            <li><a href="/department/ivf.php" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>IVF &amp; Fertility</span></a></li>
            <li><a href="/department/pediatrics.php" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>Pediatrics</span></a></li>
            <li><a href="/department/obg.php" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>OBG</span></a></li>
            <li><a href="/department/medicine.php" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>General Medicine</span></a></li>
            <li><a href="/department/surgery.php" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>Surgery</span></a></li>
            <li><a href="/blog/index.php" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>Blog</span></a></li>
            <li><a href="/department/ortho.php" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>Orthopedics</span></a></li>
            <li><a href="/department/urology.php" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>Urology</span></a></li>
          </ul>
        </div>

        <div>
          <h4 class="site-footer__heading">Departments</h4>
          <ul class="site-footer__list site-footer__list--depts">
            <li><a href="/department/laparoscopy.php" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>Laparoscopy</span></a></li>
            <li><a href="/department/neonatology.php" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>Neonatology</span></a></li>
            <li><a href="/department/critical-care.php" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>Critical Care</span></a></li>
            <li><a href="/department/anc.php" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>Antenatal Care</span></a></li>
            <li><a href="/department/pain-clinic.php" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>Pain Clinic</span></a></li>
            <li><a href="/department/infertility.php" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>Infertility</span></a></li>
            <li><a href="/department/endoscopy.php" class="footer-link"><svg class="icon"><use href="#i-arrow-right"></use></svg><span>Endoscopy</span></a></li>
          </ul>
        </div>

        <div>
          <h4 class="site-footer__heading">Contact Us</h4>
          <div class="site-footer__contact">
            <div class="footer-contact">
              <svg class="icon"><use href="#i-phone"></use></svg>
              <div>
                <p class="footer-contact__primary">+91 70908 31208</p>
                <p class="footer-contact__secondary">24/7 Emergency</p>
              </div>
            </div>
            <div class="footer-contact">
              <svg class="icon"><use href="#i-mail"></use></svg>
              <div>
                <p class="footer-contact__primary">Jananihospital2018@gmail.com</p>
                <p class="footer-contact__secondary">General Inquiries</p>
              </div>
            </div>
            <div class="footer-contact">
              <svg class="icon"><use href="#i-clock"></use></svg>
              <div>
                <p class="footer-contact__primary">24/7 Emergency</p>
                <p class="footer-contact__secondary">OPD: 8 AM - 8 PM</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="site-footer__bottom">
      <div class="container site-footer__bottom-inner">
        <p class="site-footer__legal">© 2026 Janani Hospital. All rights reserved.</p>
        <p class="site-footer__made">Made with ❤️ by <a href="https://brandingpioneers.com/">Branding Pioneers</a></p>
      </div>
    </div>
  </footer>

  <div id="appointmentModal" class="modal-overlay" style="display: none;">
    <div class="modal-content">
      <button class="modal-close" onclick="closeAppointmentModal()">&times;</button>
      <h3 class="modal-title">Book Appointment</h3>
      <form class="contact-form" action="https://app.formester.com/forms/ZU90MDpYm/submissions" method="POST">
        <input type="hidden" name="form_type" value="appointment_popup">
        <div style="margin-bottom: 1rem;">
          <label for="modal-name" class="form-label" style="display:block; margin-bottom: 0.5rem; font-weight: 500;">Full Name *</label>
          <input type="text" id="modal-name" name="name" required class="form-control" placeholder="Enter your full name">
        </div>
        <div style="margin-bottom: 1rem;">
          <label for="modal-phone" class="form-label" style="display:block; margin-bottom: 0.5rem; font-weight: 500;">Phone Number *</label>
          <input type="tel" id="modal-phone" name="phone" required class="form-control" placeholder="Enter your phone number">
        </div>
        <div style="margin-bottom: 1.5rem;">
          <label for="modal-message" class="form-label" style="display:block; margin-bottom: 0.5rem; font-weight: 500;">Message</label>
          <textarea id="modal-message" name="message" rows="3" class="form-control" placeholder="Any specific details?"></textarea>
        </div>
        <button type="submit" class="form-submit" style="width: 100%;">
          <span>Submit Request</span>
        </button>
      </form>
    </div>
  </div>

  <style>
    .modal-overlay {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0,0,0,0.6);
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .modal-content {
      background: #fff;
      padding: 2.5rem;
      border-radius: var(--radius-lg, 12px);
      width: 90%;
      max-width: 450px;
      position: relative;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    .modal-close {
      position: absolute;
      top: 1rem; right: 1rem;
      background: none; border: none;
      font-size: 1.8rem; cursor: pointer;
      color: #666;
    }
    .modal-close:hover {
      color: #000;
    }
    .modal-title {
      margin-top: 0;
      margin-bottom: 1.5rem;
      font-size: 1.75rem;
      font-weight: 700;
      color: var(--teal-700, #0f766e);
    }
  </style>

  <script>
    function openAppointmentModal(e) {
      if(e) e.preventDefault();
      document.getElementById('appointmentModal').style.display = 'flex';
    }
    function closeAppointmentModal() {
      document.getElementById('appointmentModal').style.display = 'none';
    }
    // Close when clicking outside
    window.addEventListener('click', function(e) {
      const modal = document.getElementById('appointmentModal');
      if (e.target === modal) {
        closeAppointmentModal();
      }
    });
  </script>

  <script src="/js/icons.js"></script>
  <script src="/js/layout.js"></script>
  <script src="/js/reveal.js"></script>
  <?php 
    if (!isset($page_name) || $page_name === 'home' || $page_name === '') {
        echo '<script src="/js/home.js"></script>';
    }
    if (isset($page_js)) {
        foreach ((array)$page_js as $_js) {
            echo '<script src="/js/' . htmlspecialchars($_js) . '"></script>';
        }
    }
  ?>
</body>

</html>







