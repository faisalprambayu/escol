<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Esschool.id</span></strong>. All Rights Reserved
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
  <script src="<?= url('assets/js/main.js');?>"></script>
  <script>
      let button = document.querySelector('#button-toggle');
      button.addEventListener('click',function () {
      document.querySelector('body').classList.toggle("toggle-sidebar");
    })
  </script>
