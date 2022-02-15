 @include('components.head_up')

<body>

    <!-- ======= Header ======= -->
    @include('components/header')


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 d-flex flex-column justify-content-center">
                <div class="position-relative" data-aos="zoom-in" data-aos-delay="100">
                    <h1>Belajar Bareng <span style="font-weight: bold">esschool.id</span></h1>
                    <h2>Partner belajar serumu yang menyesuaikan gaya belajar dan karaktermu.</h2>
                  <a class="btn-get-started" data-bs-toggle="modal" data-bs-target="#createModal">Get Started</a>
                </div>
            </div>
            <div class="col-lg-5 hero-img" data-aos="zoom-out" data-aos-delay="200">
             <img src="assets/img/output-onlinepngtools.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>

  </section><!-- End Hero -->

  <!-- ======= Modal Registration ======= -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        {{-- <h5 class="modal-title" id="exampleModalLabel">Create Event</h5> --}}
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="col-lg-12">

                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">General Form Elements</h5>

                    <!-- General Form Elements -->
                    <form name="add-registration" id="add-registration" method="post" action="{{url('api/registration')}}">
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="Name">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="Email">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Handphone</label>
                        <div class="col-sm-10">
                          <input type="number" min="0" class="form-control" name="Handphone">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Asal Sekolah</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="School_Origin">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Class</label>
                        <div class="col-sm-10">
                          <select class="form-select" aria-label="Default select example" name="Class">
                            <option selected>-Pilih-</option>
                            <?php foreach ($data['class'] as $class) {?> <option value="{{ $class['id'] }}">{{ $class['Name'] }}</option> <?php } ?>
                            {{-- <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option> --}}
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Major</label>
                        <div class="col-sm-10">
                          <select class="form-select" aria-label="Default select example" name="Major">
                            <option selected>-Pilih-</option>
                            <?php foreach ($data['major'] as $major) {?> <option value="{{ $major['id'] }}">{{ $major['Name'] }}</option> <?php } ?>
                            {{-- <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option> --}}
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Package</label>
                        <div class="col-sm-10">
                          <select class="form-select" aria-label="Default select example" name="Package">
                            <option selected>-Pilih-</option>
                            <?php foreach ($data['package'] as $package) {?> <option value="{{ $package['id'] }}">{{ $package['Name'] }}</option> <?php } ?>
                            {{-- <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option> --}}
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form><!-- End General Form Elements -->
                    </div>


                  </div>
                </div>

            </div>
        </div>

    {{-- </form> --}}
    </div>
    </div>
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
              <h3>Kenapa memilih esschool.id?</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
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
                    <i class="bx bx-receipt"></i>
                    <h4>
                        Gaya Belajar Sesuai Karaktermu
                    </h4>
                    <p>
                        Esscarrior, kamu bisa mendapatkan layanan dengan gaya belajar yang sesuai dengan kepribadianmu. Karena pengajar kami akan berinteraksi dengan kamu secara individual. Kamu juga bisa mengetahui karaktermu melalui tes dan konsultasi kepribadian.
                    </p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>
                        Merdeka Belajar Sesuai Keinginanmu
                    </h4>
                    <p>
                        Esscarrior, kamu bisa bebas memilih kapan dan di mana kamu mau belajar. Selain itu kamu juga bebas menentukan apa yang ingin kamu pelajari. Memahami konsep, mengaplikasikan materi, serta menguji pemahaman kamu dengan ribuan soal dan
                        pembahasan.
                    </p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>
                        Pendamping Belajar Sesuai Kebutuhanmu
                    </h4>
                    <p>
                        Esscarrior, kamu akan belajar bersama pengajar profesional lulusan dari perguruan tinggi ternama dan memiliki pengalaman mengajar sesuai bidangnya. Kamu juga bisa memberitahu kepada kami, pengajar seperti apa yang kamu inginkan.
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
                    <div class="card" >
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
                            <a href="#" class="btn btn-outline-primary" style="border-radius: 30px; width: 100%;">Lihat Detail</a>
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
                        <a href="#" class="btn btn-outline-primary" style="border-radius: 30px; width: 100%; margin: 30px 0px 30px 0px;">Pilih Paket</a>
                        {{-- <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p> --}}
                        <div class="trainer d-flex justify-content-between align-items-center">
                            <div class="trainer-profile d-flex align-items-center">
                            <img src="assets/img/trainers/GracePrimayanti.jpeg" class="img-fluid" alt="">
                            <span>Grace</span>
                            </div>
                            <div class="trainer-rank d-flex align-items-center">
                            <i class="bx bx-user"></i>&nbsp;50
                            &nbsp;&nbsp;
                            {{-- <i class="bx bx-heart"></i>&nbsp;65 --}}
                            </div>
                        </div>
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
            <?php
            foreach ($data['team'] as  $datas) { ?>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
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
                </div>
            <?php }?>
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

                <img data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 60%;" loading="lazy" src="https://www.ruangguru.com/hubfs/00%20-%20Homepage%20Ruangguru%202022/Section%20Kejar%20Cita-cita%20mu%20Testimoni%20Pengguna/video_banner_thumbnail.jpg" class="video_p" alt="Kejar cita-citamu bersama ruangguru">

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content d-flex justify-content-center align-items-center">
                            {{-- <div class="modal-header"> --}}
                            {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                            {{-- </div> --}}
                            {{-- <div class="modal-body  d-flex justify-content-center align-items-center"> --}}
                                <iframe style="width: 630px; height: 355px; "  src="https://www.youtube.com/embed/6Ge_ezzlo6g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                </iframe>
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

    <div class="es-faq" id="faq">
        <div class="container">
            <div class="section-title">
                <h2>FAQ</h2>
                <p>Paling sering ditanya</p>
              </div>
            {{-- <h1 class="es-text-danger pb-5">Paling sering ditanya</h1> --}}

            <div class="d-flex flex-column" style="height:490px;width:100%;border:0px solid #ccc;overflow:auto;">
                <?php
                foreach ($data['faq'] as  $datas) { ?>

                <a data-bs-toggle="collapse" href="#faq<?= $datas['id'] ?>" role="button" aria-expanded="false" aria-controls="faq<?= $datas['id'] ?>" class="es-collapse collapsed">
                    <div class="card border-0 es-card">
                        <div class="card-body">
                            <div class="container" style="margin-top: 10px; ">
                                <p>
                                    <?= $datas['Question'] ?>
                                </p>

                                <div class="collapse" id="faq<?= $datas['id'] ?>">
                                    <p>
                                        <?= $datas['Answer'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <?php } ?>
            </div>
        </div>
    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('components.footer')

  <!-- End Footer -->
</body>

</html>
