@include('components.head_up')

<body>

  @include('components.header')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
          <h2>Faq Esschool.id</h2>
      </div>
    </div>
    <!-- End Breadcrumbs -->

    {{-- Faq --}}
    <section id="faq" class="faq">
        <div class="es-faq" id="faqs">
            <div class="container">
                <div class="section-title">
                    <h2>FAQ</h2>
                    <p>Paling sering ditanya</p>
                  </div>
                {{-- <h1 class="es-text-danger pb-5">Paling sering ditanya</h1> --}}

                <div class="d-flex flex-column" style="height:490px;width:100%;border:0px solid #ccc;overflow:auto;">
                    <?php
                    foreach ($data['faq'] as  $datas) { ?>

                    <a data-bs-toggle="collapse" href="#faqs<?= $datas['id'] ?>" role="button" aria-expanded="false" aria-controls="faqs<?= $datas['id'] ?>" class="es-collapse collapsed">
                        <div class="card border-0 es-card">
                            <div class="card-body">
                                <div class="container" style="margin-top: 10px; ">
                                    <p>
                                        <?= $datas['Question'] ?>
                                    </p>

                                    <div class="collapse" id="faqs<?= $datas['id'] ?>">
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
    </section>
    {{-- End Faq --}}

  </main><!-- End #main -->

  @include('components.footer')

</body>

</html>
