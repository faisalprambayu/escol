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
                <li><i class="bi bi-check-circle"></i> Mencerdaskan anak bangsa.</li>
                <li><i class="bi bi-check-circle"></i> Mendidik anak bangsa.</li>
                <li><i class="bi bi-check-circle"></i> Menyediakan platform yang terjangkau untuk belajar.</li>
              </ul>
              <p>
                Misi
              </p>
              <ul>
                <li><i class="bi bi-check-circle"></i> Meningkatkan kualitas layanan.</li>
                <li><i class="bi bi-check-circle"></i> Meningkatkan kualitas tenaga didik.</li>
                <li><i class="bi bi-check-circle"></i> Menerima saran dan kritik.</li>
              </ul>

            </div>
          </div>

        </div>
      </section><!-- End About Section -->

  </main><!-- End #main -->

  @include('components.footer')

</body>

</html>
