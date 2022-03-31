@include('components.head_up')

<body>

  @include('components.header')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
          <h2>Beasiswa Esschool.id</h2>
      </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-article" class="article">
        <div class="container" data-aos="fade-up">

          {{-- <div class="section-title">
            <h2>Artikel</h2>
            <p>Artikel Terbaru</p>
          </div> --}}

          <div class="row" data-aos="zoom-in" data-aos-delay="100">

            <?php
            foreach ($data['scholarship'] as  $datas) { ?>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="article-item">
                  <div class="post-img">
                      <img src="{{url('resource/scholarship/'.$datas['Image'])}}" class="img-fluid" alt="...">
                  </div>
                <div class="article-content">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="date"><?= date('l, j F Y', strtotime( $datas['Date'])) ?></p>
                  </div>

                  <h3><a href="/beasiswa/{{$datas['id']}}" class="stretched-link mt-auto"><?= $datas['Name'] ?></a></h3>
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
