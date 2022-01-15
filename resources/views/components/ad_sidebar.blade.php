<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/admin">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i>
          <span>Master Data</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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


      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="package"){echo "event";} ?>" href="/event">
          <i class="bi bi-calendar-event"></i>
          <span>Event</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="package"){echo "collapsed";} ?>" href="/package">
          <i class="bi bi-box"></i>
          <span>Package</span>
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
        <a class="nav-link <?php if ((Request::segment(1))!="video"){echo "collapsed";} ?>" href="/video">
          <i class="bi bi-camera-video"></i>
          <span>Video</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="faq"){echo "collapsed";} ?>" href="/faq">
          <i class="bi bi-question-circle"></i>
          <span>Faq</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="footer"){echo "collapsed";} ?>" href="/footer">
          <i class="bi bi-align-bottom"></i>
          <span>Footer</span>
        </a>
      </li><!-- End Profile Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
