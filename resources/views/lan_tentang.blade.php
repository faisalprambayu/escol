@include('components.head_up')

<body>

  @include('components.header')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
          <h2>Tentang Esschool.id</h2>
      </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100" style="margin: auto;
            width: 50%;
            /* border: 3px solid green; */
            padding: 10px;">
              <img src="<?= url('img/esschool.png'); ?>" class="img-fluid" alt="" >
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
              <h3>Esschool.id</h3>
              <p class="fst-italic">
                Merupakan platform belajar bagi seluruh jenjang
              </p>
              <p>Visi</p>
              <ul>
                <li><i class="bi bi-check-circle"></i> Menjadi salah satu penyedia layanan pendidikan berbasis psikologi dan teknologi yang sesuai untuk setiap individu di seluruh dunia.</li>
              </ul>
              <p>Value</p>
              <ul>
                <li><i class="bi bi-check-circle"></i> Kami percaya pada bentuk pendidikan yang berbeda untuk setiap individu dalam memenuhi kebutuhan belajar, memungkinkan pelajar  untuk terlibat secara holistik dan menjadi pelajar yang mengetahui kemampuan dan pengembangan diri.</li>
              </ul>
              <p>
                Misi
              </p>
              <ul>
                <li><i class="bi bi-check-circle"></i> Membuat sistem pendidikan yang sesuai untuk setiap individu di seluruh dunia.</li>
                <li><i class="bi bi-check-circle"></i> Membuat revolusi teknologi dalam pendidikan yang mudah digunakan pelajar seluruh dunia.</li>
                <li><i class="bi bi-check-circle"></i> Membuat  akses pendidikan yang mudah dan terjangkau bagi pelajar di seluruh dunia.</li>
                <li><i class="bi bi-check-circle"></i> Membuat tenaga pendidikan menjadi bentuk karir yang paling diminati di seluruh dunia.</li>
              </ul>

            </div>
          </div>

        </div>
      </section><!-- End About Section -->

  </main><!-- End #main -->

  @include('components.footer')

</body>

</html>
