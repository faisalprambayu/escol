<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      {{-- <h1 class="logo me-auto"><a href="index.html">Mentor</a></h1> --}}
      <a  href="/" class="navbar-brand es-logo">
        <img src="<?= url('img/esschool.png'); ?>" width="170px" height="auto">
      </a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
            <li class="dropdown"><a href="#"><span>Paket Belajar</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <a href="/essclusive"><img src="<?= url('img/logo_produk/essclusive.jpeg'); ?>" width="70" style="margin-right: 10px;">Essclusive</a>
                    <a href="/esspecial"><img src="<?= url('img/logo_produk/esspecial.jpeg'); ?>" width="70" style="margin-right: 10px;">Esspecial</a>
                    <a href="/esstream"><img src="<?= url('img/logo_produk/esstream.jpeg'); ?>" width="70" style="margin-right: 10px;">Esstream</a>
                </ul>
            </li>
            <li><a href="/program">Program</a></li>
            {{-- <li><a href="/fitur">Fitur</a></li> --}}
            {{-- <li><a href="/artikel">Artikel</a></li>
            <li><a href="/karir">Karir</a></li>
            <li><a href="/sahabat">Sahabat esschool.id</a></li> --}}

          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a href="contact.html">Contact</a></li> --}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="" data-bs-toggle="modal" data-bs-target="#createModal" class="get-started-btn">Get Started</a>

    </div>
  </header><!-- End Header -->
