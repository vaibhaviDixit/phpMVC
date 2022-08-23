

  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand">

          <a href="<?php echo SITE_PATH;  ?>" class="logo">
            <img src="view/static/asset/logo/apple-touch-icon.png" alt="Tourly logo">
          </a>

          <p class="footer-text">
            Resort Park Avenue Building,<br>Umta Vaddo,<br>Opp McDoanld's Calangute Baga Road,<br> Calangute Goa 4035165
          </p>

        </div>

        <div class="footer-contact">

          <h4 class="contact-title">Contact Us</h4>

          <p class="contact-text">
            Feel free to contact and reach us !!
          </p>

          <ul>

            <li class="contact-item">
              <ion-icon name="call-outline"></ion-icon>

              <a href="tel:+91<?php echo $adminSocial['phone'];  ?>" class="contact-link">+91<?php echo $adminSocial['phone'];  ?></a>
            </li>

            <li class="contact-item">
              <ion-icon name="mail-outline"></ion-icon>

              <a href="mailto:<?php echo $adminSocial['email'];  ?>" class="contact-link"><?php echo $adminSocial['email'];  ?></a>
            </li>

            <li class="contact-item">
              <ion-icon name="location-outline"></ion-icon>

              <address><?php echo $adminSocial['address'];  ?></address>
            </li>

          </ul>

        </div>

        <div class="footer-form">

             <h4 class="contact-title">Join Our Newsletter</h4>

          <p class="form-text">
            Join our subscribers list to get the latest updates and special offer delivered directly to your inbox.
          </p>

          <form method="post" class="form-wrapper">
            <input type="email" name="subscribe" class="input-field" placeholder="Enter Your Email" required>

            <button type="submit" class="btn btn-secondary">Subscribe</button>
          </form>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy;
            <script>document.write(new Date().getFullYear());</script> <a href="<?php echo SITE_PATH; ?>" ><b>Imperious Tours</b></a>.
          All rights reserved | Developed By <a target="_blank" href="https://intelliseit.com/"><b> intelliseit </b></a>
        </p>

        <ul class="footer-bottom-list">

          <li>
            <a href="#" class="footer-bottom-link">Privacy Policy</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link">Term & Condition</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link">FAQ</a>
          </li>

        </ul>

      </div>
    </div>

  </footer>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up-outline"></ion-icon>
  </a>




<!-- jquery -->
   <script src="<?php echo SITE_PATH; ?>view/static/asset/js/jquery.min.js"></script>
  <!-- 
    - custom js link
  -->
  <script src="<?php echo SITE_PATH; ?>view/static/asset/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<script src="<?php echo SITE_PATH; ?>view/static/asset/js/autologout.js"></script>


</body>

</html>