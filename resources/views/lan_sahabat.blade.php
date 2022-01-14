@include('components.head_up')

<body>

  @include('components.header')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
          <h2>Sahabat Esschool.id</h2>
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

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="article-item">
                  <div class="post-img">
                      <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
                  </div>
                <div class="article-content">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="date">Jumat, 5 Januari 2022</p>
                  </div>

                  <h3><a href="article-details.html" class="stretched-link mt-auto">Sahabat Title</a></h3>
                  <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>

                </div>
              </div>
            </div> <!-- End Course Item-->

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="article-item">
                  <div class="post-img">
                      <img src="assets/img/course-2.jpg" class="img-fluid" alt="...">
                  </div>
                <div class="article-content">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="date">Jumat, 5 Januari 2022</p>
                  </div>

                  <h3><a href="article-details.html" class="stretched-link mt-auto">Sahabat Title</a></h3>
                  <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>

                </div>
              </div>
            </div> <!-- End Course Item-->

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="article-item">
                  <div class="post-img">
                      <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
                  </div>
                <div class="article-content">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="date">Jumat, 5 Januari 2022</p>
                  </div>

                  <h3><a href="article-details.html" class="stretched-link mt-auto">Sahabat Title</a></h3>
                  <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>

                </div>
              </div>
            </div> <!-- End Course Item-->

          </div>

        </div>
      </section><!-- End Popular Courses Section -->

  </main><!-- End #main -->

  @include('components.footer')

</body>

</html>
