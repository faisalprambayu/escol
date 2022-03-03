@include('components.head_up')

<body>

  @include('components.header')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
          <h2>Temukan Program Seru
            dari Esschool sekarang!</h2>
        {{-- <h2>Program</h2>
        <h4>Temukan Program Seru
            dari Esschool sekarang!</h4> --}}
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="row">

            <?php
            foreach ($data['program'] as  $datas) { ?>

            <div class="col-md-6 d-flex align-items-stretch">
                <div class="card">
                    <div class="card-img">
                    <img src="{{url('resource/program/'.$datas['Image'])}}" alt="...">
                    </div>
                    <div class="card-body">
                    <h5 class="card-title"><a href="https://wa.me/6281382673264/?text=Halo esschool.id!"><?= $datas['Name'] ?></a></h5>
                    {{-- <p class="fst-italic text-center">Sunday, September 26th at 7:00 pm</p> --}}
                    <p class="card-text"><?= $datas['Description'] ?></p>
                    </div>
                </div>
            </div>


            <?php } ?>

        </div>

      </div>
    </section><!-- End Events Section -->

  </main><!-- End #main -->

  @include('components.footer')

</body>

</html>
