<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="<?= url('assets/vendor/apexcharts/apexcharts.min.js');?>"></script>
  <script src="<?= url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
  <script src="<?= url('assets/vendor/chart.js/chart.min.js');?>"></script>
  <script src="<?= url('assets/vendor/echarts/echarts.min.js');?>"></script>
  <script src="<?= url('assets/vendor/quill/quill.min.js');?>"></script>
  <script src="<?= url('assets/vendor/simple-datatables/simple-datatables.js');?>"></script>
  <script src="<?= url('assets/vendor/tinymce/tinymce.min.js');?>"></script>
  <script src="<?= url('assets/vendor/php-email-form/validate.js');?>"></script>
  <script src="<?= url('assets/vendor/swiper/swiper-bundle.min.js');?>"></script>
  <script src="<?= url('assets/vendor/aos/aos.js');?>"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
      let button = document.querySelector('#button-toggle');
      button.addEventListener('click',function () {
      document.querySelector('body').classList.toggle("toggle-sidebar");
    })
  </script>
