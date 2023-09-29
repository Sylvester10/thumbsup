  
    
  <!--Donate Modal -->

    <div class="modal fade" id="donate" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content modal-form-sm">
                <div class="modal-header">
                    <div class="pull-right">
                        <button class="btn btn-danger btn-sm modal_close_btn" data-dismiss="modal" class="close" title="Close"> &times;</button>
                    </div>
                     <h2 class="modal-title" style="display: block; width: 100%; text-align: center; font-weight: 700;">Donate</h2>
                </div><!--/.modal-header-->
                <div class="modal-body">
                   <div><b>Account Number:</b> 0463453482</div>
                   <div><b>Acount Name:</b> Thumbs Up Youth Leadership Development Initiative</div>
                   <div><b>Bank Name:</b> Guaranty Trust Bank (GTB) </div>

                </div>
            </div>
        </div>
    </div>

  <!-- Footer Area -->

    <footer class="footer-area">
      <div class="container">
        <div class="footer-up">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="logo">
                <a class="navbar-brand" href="#"><img src="<?php echo base_url('assets/img/thumbs_up_white.svg'); ?>" alt=""></a>
              </div>
              <p><?php echo sub_tagline; ?></p>
              <a href="#" class="main-btn">Donate</a>
            </div>
            <div class="col-lg-3 col-md-6 com-sm-12">
              <h5>Useful Links</h5>
              <ul>
                <li>
                  <a href="<?php echo base_url('about'); ?>">About Us</a>
                  <a href="<?php echo base_url('board'); ?>">Board</a>
                  <a href="<?php echo base_url('events'); ?>">Events</a>
                  <a href="<?php echo base_url('contact'); ?>">Contact</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="subscribe-form">
                <h5>Our Arms</h5>
                <ul>
                  <li>
                    <a href="#">Institute</a>
                    <a href="#">Outreach</a>
                    <a href="#">Extra-Curricular</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <h5>Contact Us</h5>
              <ul>
                <li>
                  <a href="#"><?php echo business_address; ?></a>
                  <a href="#"><?php echo business_phone_number; ?></a>
                  <a href="mailto:<?php echo business_contact_email; ?>"><?php echo business_contact_email; ?></a>
                  <div class="row d-flex justify-content-between social-icon">
                        <div class="">
                          <a href="https://web.facebook.com/Thumbsupngo" target="_blank"><i class="la la-facebook"></i></a>
                        </div>
                        <div class="">
                          <a href="https://twitter.com/thumbsupngo" target="_blank"><i class="la la-twitter"></i></a>
                        </div>
                        <div class="">
                          <a href="https://www.instagram.com/thumbsupngo/" target="_blank"><i class="la la-instagram"></i></a>
                        </div>
                        <div class="">
                          <a href="https://www.youtube.com/channel/UCzzwlxS3srNQXtfGn8ztVgA" target="_blank"><i class="la la-youtube"></i></a>
                        </div>
                    </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <p class="copyright-line">&copy; copyright 2021 | <?php echo business_name; ?> </p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <p class="privacy">Privacy Policy | Terms &amp; Conditions</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Scroll Top Area -->

    <a href="#top" class="go-top" style="display: block;"><i class="fa fa-angle-up"></i></a>


    <!-- Popper JS -->
    <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <!-- Wow JS -->
    <script src="<?php echo base_url('assets/js/wow.min.js'); ?>"></script>
    <!-- Way Points JS -->
    <script src="<?php echo base_url('assets/js/jquery.waypoints.min.js'); ?>"></script>
    <!-- Counter Up JS -->
    <script src="<?php echo base_url('assets/js/jquery.counterup.min.js'); ?>"></script>
    <!-- Owl Carousel JS -->
    <script src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>
    <!-- Isotope JS -->
    <script src="<?php echo base_url('assets/js/isotope-3.0.6-min.js'); ?>"></script>
    <!-- Magnific Popup JS -->
    <script src="<?php echo base_url('assets/js/magnific-popup.min.js'); ?>"></script>
    <!-- Sticky JS -->
    <script src="<?php echo base_url('assets/js/jquery.sticky.js'); ?>"></script>
    <!-- Progress Bar JS -->
    <script src="<?php echo base_url('assets/js/jquery.barfiller.js'); ?>"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <!-- Telephone JS -->
    <script src="<?php echo base_url('assets/tel-input/build/js/intlTelInput.js'); ?>"></script>
    <!-- Custom JS -->
    <script src="<?php echo base_url('assets/js/custom_script.js'); ?>"></script>
    <!-- Custom JS -->
    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>

    <!-- Initialize the plugin: 
    <script type="text/javascript">
        $(document).ready(function() {
            $('#multiselect').multiselect({
              buttonWidth: '100%',
              numberDisplayed: 10,
              includeSelectAllOption: true

            });
        });
    </script>-->

    <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        } 
      });
    }
    </script>

    <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
      });
    </script>

    <script type="text/javascript">
        //pass base_url to js
        var base_url = "<?php echo base_url(); ?>";
    </script>

  </body>

</html>
