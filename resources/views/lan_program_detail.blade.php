@include('components.head_up')

<body>
    @include('components.header')

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Detail Program Esschool.id</h2>
            </div>
        </div>
        <!-- End Breadcrumbs -->

        <!-- ======= Cource Details Section ======= -->
        <section id="course-details" class="course-details">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-8">
                    <img style="border-radius: 10px;" src="{{url('resource/program/'.$data['program']['Image'])}}" class="img-fluid" alt="">
                    <h3><?= $data['program']['Name'] ?></h3>
                    <p>
                        <?= $data['program']['Text'] ?>
                    </p>
                    </div>
                    <div class="col-lg-4">

                        <div class="sidebar">

                          <h3 class="sidebar-title">Postingan program Lainnya</h3>
                          <div class="sidebar-item recent-posts">


                            <?php
                            foreach ($data['list'] as  $datas) { ?>

                            <div class="post-item clearfix">
                              <img src="{{url('resource/program/'.$datas['Image'])}}" alt="">
                              <h4><a href="/program/{{$datas['id']}}"><?= $datas['Name'] ?></a></h4>
                            </div>

                            <?php } ?>

                          </div><!-- End sidebar recent posts-->

                        </div><!-- End sidebar -->

                      </div><!-- End blog sidebar -->
                </div>

            </div>
        </section><!-- End Cource Details Section -->
    </main>

    @include('components.footer')
</body>


