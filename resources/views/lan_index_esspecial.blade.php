@include('components.head_up')

<body>

    <!-- ======= Header ======= -->
    @include('components/header')


 <!-- ======= Hero Section ======= -->
 <?php
 foreach ($data['banner'] as $datas) { ?>
 <section id="hero" class="d-flex justify-content-center align-items-center" style=" background: url('../resource/banner/<?= $datas['Background'] ?>') top center;
 /* background-color: var(--es-danger); */
 background-size: cover;
 position: relative;">
     <div class="container">
         <div class="row">
             @if ($datas['Image'] != null)
             @endif
             <div class="col-lg-7 d-flex flex-column justify-content-center">
                 <div class="position-relative
                 " data-aos="zoom-in" data-aos-delay="100">
                     <h1><?= $datas['Name'] ?></h1>
                     <h2><?= $datas['Description'] ?></h2>
                 <a href="" class="btn-get-started" style="margin-bottom: 65px;" data-bs-toggle="modal" data-bs-target="#createModal">Get Started</a>
                 </div>
             </div>
             @if ($datas['Image'] != null)
                 <div class="col-lg-5 hero-img" data-aos="zoom-out" data-aos-delay="200">
                     <img src="{{url('resource/banner/'.$datas['Image'])}}" class="img-fluid" alt="">
                 </div>
             @endif
         </div>
     </div>

 </section><!-- End Hero -->
 <?php } ?>

   @include('components.lan_modal')
</div>
<!-- ======= End Modal Registration ======= -->
  <main id="main">


    <!-- ======= Why Us Section ======= -->
    {{-- <section id="why-us" class="why-us">
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
    </section><!-- End Why Us Section --> --}}

   <!-- ======= Features Section ======= -->
   <section id="features" class="features">
    <div class="container" data-aos="fade-up">

      <?php if ($data['service'] != null) { ?>

      <div class="section-title">
        <h2>Fitur</h2>
        <p>Fitur Populer</p>
      </div>

      <?php } ?>

      <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <?php
          foreach ($data['service'] as  $datas) { ?>

            <div class="col-lg-3 col-md-4">
                <div class="icon-box">
                    <div class="dalam">
                        <?php foreach ($data['icon'] as $icons) { if($datas['Icon'] == $icons['id']) {?>
                            <div style="color: <?= $icons['Color'] ?>;">
                                <?= $icons['Icon'] ?>
                            </div>
                        <?php }} ?>
                        <h3><?= $datas['Title'] ?></h3>
                    </div>
                    <div class="luar">
                        @if ($datas['Description'])
                            <p style="padding-top: 30px;"><?= $datas['Description'] ?></p>
                        @endif
                    </div>
                </div>
            </div>


          <?php } ?>
      </div>

    </div>
  </section><!-- End Features Section -->

    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <?php if ($data['package'] != null) { ?>


        <div class="section-title">
          <h2>Kursus</h2>
          <p>Kursus Populer</p>
        </div>

        <?php    } ?>

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

    <div class="container col-lg-10">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Registrasi Esspecial</h5>

                <!-- General Form Elements -->
                <form name="add-registration" id="add-registration" method="post" action="{{url('api/registration')}}">
                    @csrf
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
                        <label class="col-sm-2 col-form-label">Kelas</label>
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
                        <label class="col-sm-2 col-form-label">Jurusan</label>
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
                        <label class="col-sm-2 col-form-label">Paket</label>
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
                    <div class="row mb-3">
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                        <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
                    </div>
                </form><!-- End General Form Elements -->
            </div>
        </div>
    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('components.footer')

  <!-- End Footer -->
</body>

</html>
