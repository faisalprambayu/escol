@include('components.head_up')

<body>
    <style>
        blockquote {
            background: #f9f9f9;
            border-left: 10px solid #ccc;
            margin: 1.5em 10px;
            padding: 0.5em 10px;
            quotes: "\201C""\201D""\2018""\2019";
            }
        blockquote:before {
            color: #ccc;
            content: open-quote;
            font-size: 4em;
            line-height: 0.1em;
            margin-right: 0.25em;
            vertical-align: -0.4em;
            }
        blockquote p {
            display: inline;
            }
    </style>

  @include('components.header')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
          <h2>Syarat dan Ketentuan Esschool.id</h2>
      </div>
    </div>
    <!-- End Breadcrumbs -->

    {{-- Syarat dan Ketentuan --}}
    <section id="faq" class="faq">
        <div class="es-faq" id="faqs">
            <div class="container">
                <div class="d-flex flex-column">

                    <?= $data[0]['Text'] ?>
                    <?php
                        $urlall = strstr( $data[0]['Text'], 'http');
                        $url1 = str_replace('"></oembed></figure>', '', $urlall);
                        $url2 = str_replace('youtu.be', 'www.youtube.com', $url1);
                        $url = str_replace('m/', 'm/embed/', $url2);
                        // dd($url);
                    ?>
                    @if ($urlall)
                        <iframe width="560" height="315" src="<?= $url ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        {{-- {{$url }} --}}
                    @endif
                    {{-- <blockquote><p>quotes apa aja dah yang penting oke</p></blockquote><figure class="table"><table><tbody><tr><td>bisa</td><td>buat&nbsp;</td><td>table</td></tr><tr><td>juga</td><td>disini</td><td>ya</td></tr></tbody></table></figure><figure class="media"><iframe  src="https://youtu.be/MfZbKtcjF3s"></iframe ></figure> --}}


                </div>
            </div>
        </div>
    </section>
    {{-- End Syarat dan Ketentuan --}}

  </main><!-- End #main -->

  @include('components.footer')

</body>

</html>
