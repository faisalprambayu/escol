<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="admin"){echo "collapsed";} ?>" href="/admin">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#master-data" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i>
          <span>Master Data</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="master-data" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/ref_package">
              <i class="bi bi-circle "></i><span>Package</span>
            </a>
          </li>
          <li>
            <a href="/ref_class">
              <i class="bi bi-circle"></i><span>Class</span>
            </a>
          </li>
          <li>
            <a href="/ref_major">
              <i class="bi bi-circle"></i><span>Major</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#page" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i>
          <span>Page</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="page" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/admin">
              <i class="bi bi-circle "></i><span>Main</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Product 1</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Product 2</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->


      <li class="nav-heading">Pages</li>


      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="article"){echo "collapsed";} ?>" href="/article">
            <i class="bi bi-newspaper"></i>
          <span>Article</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="banner"){echo "collapsed";} ?>" href="/banner">
            <i class="bi bi-card-heading"></i>
          <span>Banner</span>
        </a>
      </li><!-- End Profile Page Nav -->


      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="career"){echo "collapsed";} ?>" href="/career">
        <i class="bi bi-activity"></i>
          <span>Career</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="event"){echo "collapsed";} ?>" href="/event">
          <i class="bi bi-calendar-event"></i>
          <span>Event</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="faq"){echo "collapsed";} ?>" href="/faq">
          <i class="bi bi-question-circle"></i>
          <span>Faq</span>
        </a>
      </li><!-- End Profile Page Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="footer"){echo "collapsed";} ?>" href="/footer">
          <i class="bi bi-align-bottom"></i>
          <span>Footer</span>
        </a>
      </li><!-- End Profile Page Nav --> --}}

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="friend"){echo "collapsed";} ?>" href="/friend">
            <i class="bi bi-person-plus-fill"></i>
          <span>Friend</span>
        </a>
      </li><!-- End Profile Page Nav -->


      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="package"){echo "collapsed";} ?>" href="/package">
          <i class="bi bi-box"></i>
          <span>Package</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="programs"){echo "collapsed";} ?>" href="/programs">
            <i class="bi bi-person-lines-fill"></i>
          <span>Program</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="registration"){echo "collapsed";} ?>" href="/registration">
          <i class="bi bi-card-list"></i>
          <span>Registration</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="service"){echo "collapsed";} ?>" href="/service">
          <i class="bi bi-award"></i>
          <span>Service</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="team"){echo "collapsed";} ?>" href="/team">
          <i class="bi bi-people-fill"></i>
          <span>Team</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="testimonial"){echo "collapsed";} ?>" href="/testimonial">
          <i class="bi bi-chat"></i>
          <span>Testimonial</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="video"){echo "collapsed";} ?>" href="/video">
          <i class="bi bi-camera-video"></i>
          <span>Video</span>
        </a>
      </li><!-- End Profile Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
