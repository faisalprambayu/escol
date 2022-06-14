@include('components.head_up')

<body>

  @include('components.header')

  <main id="main">

    {{-- <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
          <h2>Sahabat Esschool.id</h2>
      </div>
    </div>
    <!-- End Breadcrumbs --> --}}

    <!-- ======= Hero Section ======= -->
    <?php
    foreach ($data['banner'] as $datas) { ?>
    <section id="hero" class="d-flex justify-content-center align-items-center" style=" width: 100%;
    height: 80vh; background: url('../resource/banner/<?= $datas['Background'] ?>') top center; background-color: var(--es-danger);
    background-size: cover;
    position: relative;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 d-flex flex-column justify-content-center">
                    <div class="position-relative" data-aos="zoom-in" data-aos-delay="100">
                        <h1><?= $datas['Name'] ?></h1>
                        <h2><?= $datas['Description'] ?></h2>
                    <a href="" class="btn-get-started" data-bs-toggle="modal" data-bs-target="#createModal">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-5 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{url('resource/banner/'.$datas['Image'])}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->
    <?php } ?>

    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-article" class="article">
        <div class="container" data-aos="fade-up">

          {{-- <div class="section-title">
            <h2>Artikel</h2>
            <p>Artikel Terbaru</p>
          </div> --}}

          <div class="row" data-aos="zoom-in" data-aos-delay="100">

            <?php
            foreach ($data['friend'] as  $datas) { ?>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="article-item">
                  <div class="post-img">
                      <img src="{{url('resource/friend/'.$datas['Image'])}}" class="img-fluid" alt="...">
                  </div>
                <div class="article-content">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="date"><?= date('l, j F Y', strtotime( $datas['Date'])) ?></p>
                  </div>

                  <h3><a href="/sahabat/{{$datas['id']}}" class="stretched-link mt-auto"><?= $datas['Name'] ?></a></h3>
                  <p><?= $datas['Description'] ?></p>

                </div>
              </div>
            </div> <!-- End Course Item-->

            <?php } ?>

          </div>

        </div>
      </section><!-- End Popular Courses Section -->

  </main><!-- End #main -->

  @include('components.footer')

</body>

</html>
