 @include('components.head_up')

<body>

    <!-- ======= Header ======= -->
    @include('components/header')


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

   @include('components.lan_modal')
</div>
<!-- ======= End Modal Registration ======= -->
  <main id="main">
    {{-- <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section --> --}}

    {{-- <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Students</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
            <p>Courses</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
            <p>Events</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>Trainers</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section --> --}}

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3> {{$data['why'][0]['Name']}} </h3>
              <p>
                {{$data['why'][0]['Description']}}
              </p>
              <div class="text-center">
                <a href="about.html" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <?php foreach ($data['icon'] as $icons) { if($data['why'][1]['Icon'] == $icons['id']) {?>
                        <div style="margin-bottom: 30px;">
                            <?= $icons['Icon'] ?>
                        </div>
                    <?php }} ?>
                    <h4>
                        {{$data['why'][1]['Name']}}
                    </h4>
                    <p>
                        {{$data['why'][1]['Description']}}
                    </p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <?php foreach ($data['icon'] as $icons) { if($data['why'][2]['Icon'] == $icons['id']) {?>
                        <div style="margin-bottom: 30px;">
                            <?= $icons['Icon'] ?>
                        </div>
                    <?php }} ?>
                    <h4>
                        {{$data['why'][2]['Name']}}
                    </h4>
                    <p>
                        {{$data['why'][2]['Description']}}
                    </p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <?php foreach ($data['icon'] as $icons) { if($data['why'][3]['Icon'] == $icons['id']) {?>
                        <div style="margin-bottom: 30px;">
                            <?= $icons['Icon'] ?>
                        </div>
                    <?php }} ?>
                    <h4>
                        {{$data['why'][3]['Name']}}
                    </h4>
                    <p>
                        {{$data['why'][3]['Description']}}
                    </p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->


    {{-- event --}}

    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Event</h2>
            <p>Event Seru Esschool.id</p>
          </div>

          <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

                <?php
                $no = 0;
                foreach ($data['event'] as $datas) { ?>
              <div class="swiper-slide">
                {{-- <div class="col-md-3" style="float:left"> --}}
                    <div class="card" style="border-radius: 20px" >
                        <img class="card-img-top"  src="{{url('resource/event/'.$datas['Image'])}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $datas['Name'] ?></h5>
                            <p class="card-text"><?= $datas['Description'] ?></p>
                            <div style="font-weight: 600; margin-bottom: 10px">
                                <i class="bi-calendar-check" style="font-size: 1.5rem; color: cornflowerblue; margin-right: 10px"></i>
                                <?= $datas['EventDate'] ?>
                            </div>
                            <div style="font-weight: 600; margin-bottom: 20px">
                                <i class="bi-link" style="font-size: 1.5rem; color: cornflowerblue; margin-right: 10px"></i>
                                <?= $datas['Link'] ?>
                            </div>
                            <a href="https://wa.me/6281382673264/?text=Halo esschool.id! Saya ingin tahu tentang Event <?= $datas['Name'] ?> yang dilaksanakan pada <?= $datas['EventDate'] ?>" class="btn btn-outline-primary" style="border-radius: 30px; width: 100%;">Lihat Detail</a>
                        </div>

                    </div>
                {{-- </div> --}}
              </div><!-- End testimonial item -->
              <?php }?>
            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>
    </section><!-- End Testimonials Section -->
    {{-- end event --}}


    <!-- ======= Features Section ======= -->
    {{-- <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box">
              <i class="ri-store-line" style="color: #ffbb2c;"></i>
              <h3><a href="">Lorem Ipsum</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
              <h3><a href="">Dolor Sitema</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
              <h3><a href="">Sed perspiciatis</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
              <h3><a href="">Magni Dolores</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-database-2-line" style="color: #47aeff;"></i>
              <h3><a href="">Nemo Enim</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
              <h3><a href="">Eiusmod Tempor</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
              <h3><a href="">Midela Teren</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
              <h3><a href="">Pira Neve</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-anchor-line" style="color: #b2904f;"></i>
              <h3><a href="">Dirada Pack</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-disc-line" style="color: #b20969;"></i>
              <h3><a href="">Moton Ideal</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-base-station-line" style="color: #ff5828;"></i>
              <h3><a href="">Verdo Park</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
              <h3><a href="">Flavor Nivelanda</a></h3>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section --> --}}

    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kursus</h2>
          <p>Kursus Populer</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

            <?php function Rupiah($angka){
                $hasil = "Rp " . number_format($angka,2,',','.');
                return $hasil;
            }
            foreach ($data['package'] as  $datas) { ?>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                    <div class="course-item">
                        <img src="{{url('resource/package/'.$datas['Image'])}}" class="img-fluid" alt="...">
                        <div class="course-content">
                        <div class="d-flex justify-content-between align-items-right mb-3">
                            {{-- <h4>Web Development</h4> --}}
                            <h4>Harga Paket</h4>
                            <p class="price">{{ str_replace(' ','.',Rupiah($datas['Price'])) }}</p>
                        </div>

                        <h3><a href="course-details.html">{{$datas["Name"]}}</a></h3>
                        <div style="height:120px;width:100%;border:0px solid #ccc;overflow:auto;">
                            {{$datas["Deskripsi"]}}
                        </div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-outline-primary" style="border-radius: 30px; width: 100%; margin: 30px 0px 30px 0px;">Pilih Paket</a>
                        {{-- <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p> --}}
                        {{-- <div class="trainer d-flex justify-content-between align-items-center">
                            <div class="trainer-profile d-flex align-items-center">
                            <img src="assets/img/trainers/GracePrimayanti.jpeg" class="img-fluid" alt="">
                            <span>Grace</span>
                            </div>
                            <div class="trainer-rank d-flex align-items-center">
                            <i class="bx bx-user"></i>&nbsp;50
                            &nbsp;&nbsp;
                            <i class="bx bx-heart"></i>&nbsp;65
                            </div>
                        </div> --}}
                        </div>
                    </div>
                </div> <!-- End Course Item-->
                <?php }?>



        </div>

      </div>
    </section><!-- End Popular Courses Section -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
        <div class="container" data-aos="fade-up">

            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <div class="my-swiper swiper " data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                    <?php
                    foreach ($data['team'] as  $datas) { ?>
                        <div class="swiper-slide">
                            {{-- <div class="col-lg-4 col-md-6 d-flex justify-content-center"> --}}
                                <div class="member">
                                    <img src="{{url('resource/team/'.$datas['Image'])}}" class="img-fluid" alt="">
                                    <div class="member-content">
                                        <h4><?= $datas['Name'] ?></h4>
                                        <span><?= $datas['Title'] ?></span>
                                        <p>
                                            <?= $datas['Description'] ?>
                                        </p>
                                        {{-- <div class="social">
                                        <a href=""><i class="bi bi-twitter"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""><i class="bi bi-linkedin"></i></a>
                                        </div> --}}
                                    </div>
                                </div>
                            {{-- </div> --}}
                        </div>
                    <?php }?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </div>
    </section><!-- End Trainers Section -->

    <!-- ======= Video Section ======= -->
    <section id="trainers" class="trainers">
        <div class="container">

          <div class="row">
            <div class="col-lg-12 col-md-6 d-flex justify-content-center align-items-center">
                <!-- Button trigger modal -->
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button> --}}
                {{-- <div class="card">
                    <div class="card-body"  style="margin: auto; padding: 10px;">
                        <?= $data['video'][0]['Text1'] ?>
                    </div>
                </div> --}}
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="d-flex justify-content-center align-items-center">
                    <img  style="width: 60%;" loading="lazy" src="{{url('resource/video/'.$data['video'][0]['Image'])}}" alt="{{str_replace('public/files/', '', $data['video'][0]['Image'])}}" class="video_p" alt="Kejar cita-citamu bersama ruangguru">
                </a>
                {{-- <div class="card" >
                    <div class="card-body" style="margin: auto; padding: 10px;">
                        <?= $data['video'][0]['Text2'] ?>
                    </div>
                </div> --}}


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content d-flex justify-content-center align-items-center">
                            {{-- <div class="modal-header"> --}}
                            {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                            {{-- </div> --}}
                            {{-- <div class="modal-body  d-flex justify-content-center align-items-center"> --}}
                                <?php
                                    $urlall = strstr( $data['video'][0]['Link'], 'http');
                                    $url1 = str_replace('"></oembed></figure>', '', $urlall);
                                    $url2 = str_replace('youtu.be', 'www.youtube.com', $url1);
                                    $url = str_replace('m/', 'm/embed/', $url2);
                                    // dd($url);
                                ?>
                                @if ($urlall)
                                    <iframe class="lan-video"  src="<?= $url ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                    </iframe>
                                @endif
                            {{-- </div> --}}
                            {{-- <div class="modal-footer"> --}}
                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>

            </div>
          </div>

        </div>
    </section><!-- End Trainers Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimoni</h2>
          <p>APA YANG MEREKA KATAKAN</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <?php
            foreach ($data['testimonial'] as  $datas) { ?>

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{url('resource/testimonial/'.$datas['Image'])}}" class="testimonial-img" alt="">
                  <h3><?= $datas['Name'] ?></h3>
                  <h4><?= $datas['Title'] ?></h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        <?= $datas['Testimonial'] ?>
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <?php } ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <div class="modal" tabindex="-1" id="myModal" data-aos="zoom-in" data-aos-delay="100">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $data['modal'][0]['Title'] ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              {{-- <p>Modal body text goes here.</p> --}}
              <img src="{{url('resource/modal/'.$data['modal'][0]['Image'])}}" class="img-fluid" alt="">
              {{-- <img src="{{url('resource/testimonial/'.$data['testimonial'][0]['Image'])}}" > --}}
            </div>
            {{-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
          </div>
        </div>
    </div>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('components.footer')

  <!-- End Footer -->
    {{-- <script>
        const swiper = new Swiper( '.my-swiper', {
            slidesPerView: 4,
            slidesPerGroup: 1,
            centeredSlides: false,
            loop: true,
            slideToClickedSlide: true,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        } );
    </script> --}}

    {{-- <script>
        const swiper = new Swiper('.my-swiper', {
            speed: 400,
            spaceBetween: 10,
            slidesPerView: 4,
            loop: true,
        });
    </script> --}}
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#myModal').modal('show');
        });
    </script>

</body>

</html>
