<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <?php if ((Request::segment(1))!="essclusive" && (Request::segment(1))!="esspecial" && (Request::segment(1))!="esstream"){ ?>

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="admin"){echo "collapsed";} ?>" href="/admin">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="ref_class" && (Request::segment(1))!="ref_major" && (Request::segment(1))!="ref_icon"){echo "collapsed";} ?>" data-bs-target="#master-data" data-bs-toggle="<?php if ((Request::segment(1))!="ref_class" && (Request::segment(1))!="ref_major" && (Request::segment(1))!="ref_icon"){echo "collapse";} ?>" href="#">
          <i class="bi bi-layout-text-window-reverse"></i>
          <span>Master Data</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="master-data" class="nav-content <?php if ((Request::segment(1))!="ref_class" && (Request::segment(1))!="ref_major" && (Request::segment(1))!="ref_icon"){echo "collapse";} ?> " data-bs-parent="#sidebar-nav">
          {{-- <li>
            <a href="/ref_package">
              <i class="bi bi-circle "></i><span>Package</span>
            </a>
          </li> --}}
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
          <li>
            <a href="/ref_icon">
              <i class="bi bi-circle"></i><span>Icons</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <?php } ?>

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
            <a href="/essclusive/banner">
              <i class="bi bi-circle"></i><span>Essclusive</span>
            </a>
          </li>
          <li>
            <a href="/esspecial/banner">
              <i class="bi bi-circle"></i><span>Esspecial</span>
            </a>
          </li>
          <li>
            <a href="/esstream/banner">
              <i class="bi bi-circle"></i><span>Esstream</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->


      <li class="nav-heading">Pages</li>

        <?php if ((Request::segment(1))!="essclusive" && (Request::segment(1))!="esspecial" && (Request::segment(1))!="esstream"){ ?>


      <li class="nav-item">
        <a class="nav-link
        <?php if ((Request::segment(1))!="article"){echo "collapsed";} ?>"
            href="/article">
            <i class="bi bi-newspaper"></i>
          <span>Article</span>
        </a>
      </li><!-- End Profile Page Nav -->

        <?php } ?>

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="banner" && (Request::route()->uri()) != "essclusive/banner" && (Request::route()->uri()) != "esspecial/banner"  && (Request::route()->uri()) != "esstream/banner"){echo "collapsed";} ?>"
            <?php if ((Request::segment(1))=="essclusive") { ?>
                href="/essclusive/banner"
            <?php }else if ((Request::segment(1))=="esspecial"){?>
                href="/esspecial/banner"
            <?php }else if ((Request::segment(1))=="esstream"){?>
                    href="/esstream/banner"
            <?php }else { ?>
                href="/banner"
            <?php } ?>
            >
            <i class="bi bi-card-heading"></i>
          <span>Banner</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <?php if ((Request::segment(1))!="essclusive" && (Request::segment(1))!="esspecial" && (Request::segment(1))!="esstream"){ ?>

        <li class="nav-item">
            <a class="nav-link <?php if ((Request::segment(1))!="career"){echo "collapsed";} ?>" data-bs-target="#career" data-bs-toggle="<?php if ((Request::segment(1))!="career"){echo "collapse";} ?>" href="#">
              <i class="bi bi-activity"></i>
              <span>Career</span>
              <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="career" class="nav-content <?php if ((Request::segment(1))!="career"){echo "collapse";} ?> " data-bs-parent="#sidebar-nav">

              <li>
                <a href="/career">
                  <i class="bi bi-circle"></i><span>Career</span>
                </a>
              </li>

              <li>
                <a href="/career/banner">
                  <i class="bi bi-circle"></i><span>Career Banner</span>
                </a>
              </li>
            </ul>
          </li><!-- End Tables Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="career"){echo "collapsed";} ?>" href="/career">
        <i class="bi bi-activity"></i>
          <span>Career</span>
        </a>
      </li><!-- End Profile Page Nav --> --}}

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
        <a class="nav-link <?php if ((Request::segment(1))!="friend"){echo "collapsed";} ?>" data-bs-target="#friend" data-bs-toggle="<?php if ((Request::segment(1))!="friend"){echo "collapse";} ?>" href="#">
          <i class="bi bi-person-plus-fill"></i>
          <span>Friend</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="friend" class="nav-content <?php if ((Request::segment(1))!="friend"){echo "collapse";} ?> " data-bs-parent="#sidebar-nav">

          <li>
            <a href="/friend">
              <i class="bi bi-circle"></i><span>Friend</span>
            </a>
          </li>

          <li>
            <a href="/friend/banner">
              <i class="bi bi-circle"></i><span>Friend Banner</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="friend"){echo "collapsed";} ?>" href="/friend">
            <i class="bi bi-person-plus-fill"></i>
          <span>Friend</span>
        </a>
      </li> --}}
      <!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="modal"){echo "collapsed";} ?>" href="/modal">
            <i class="bi bi-info-square"></i>
          <span>Modal</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <?php } ?>


      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="package" && (Request::route()->uri()) != "essclusive/package" && (Request::route()->uri()) != "esspecial/package"  && (Request::route()->uri()) != "esstream/package"){echo "collapsed";} ?>"
            <?php if ((Request::segment(1))=="essclusive") { ?>
                href="/essclusive/package"
            <?php }else if ((Request::segment(1))=="esspecial"){?>
                href="/esspecial/package"
            <?php }else if ((Request::segment(1))=="esstream"){?>
                    href="/esstream/package"
            <?php }else { ?>
                href="/package"
            <?php } ?>
            >
          <i class="bi bi-box"></i>
          <span>Package</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <?php if ((Request::segment(1))!="essclusive" && (Request::segment(1))!="esspecial" && (Request::segment(1))!="esstream"){ ?>

        <li class="nav-item">
            <a class="nav-link <?php if ((Request::segment(1))!="privacy"){echo "collapsed";} ?>" href="/privacy">
                <i class="bi bi-lock"></i>
                <span>Privacy Policy</span>
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
      <?php } ?>

      <?php if ((Request::segment(1))=="essclusive" || (Request::segment(1))=="esspecial" || (Request::segment(1))=="esstream"){ ?>
      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="service" && (Request::route()->uri()) != "essclusive/service" && (Request::route()->uri()) != "esspecial/service"  && (Request::route()->uri()) != "esstream/service"){echo "collapsed";} ?>"
            <?php if ((Request::segment(1))=="essclusive") { ?>
                href="/essclusive/service"
            <?php }else if ((Request::segment(1))=="esspecial"){?>
                href="/esspecial/service"
            <?php }else if ((Request::segment(1))=="esstream"){?>
                    href="/esstream/service"
            <?php }else { ?>
                href="/service"
            <?php } ?>
            >
          <i class="bi bi-award"></i>
          <span>Service</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <?php } ?>

      <?php if ((Request::segment(1))!="essclusive" && (Request::segment(1))!="esspecial" && (Request::segment(1))!="esstream"){ ?>

        <li class="nav-item">
            <a class="nav-link <?php if ((Request::segment(1))!="scholarship"){echo "collapsed";} ?>" href="/scholarship">
                <i class="bi bi-mortarboard"></i>
              <span>Scholarship</span>
            </a>
        </li><!-- End Profile Page Nav -->


      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="team"){echo "collapsed";} ?>" href="/team">
          <i class="bi bi-people-fill"></i>
          <span>Team</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="text"){echo "collapsed";} ?>" href="/text">
            <i class="bi bi-envelope-exclamation"></i>
            <span>Terms and Conditions</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="testimonial"){echo "collapsed";} ?>" href="/testimonial">
          <i class="bi bi-chat"></i>
          <span>Testimonial</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="user"){echo "collapsed";} ?>" href="/user">
            <i class="bi bi-person-circle"></i>
            <span>User</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="video"){echo "collapsed";} ?>" href="/video">
          <i class="bi bi-camera-video"></i>
          <span>Video</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <?php } ?>

      <li class="nav-item">
        <a class="nav-link <?php if ((Request::segment(1))!="why" && (Request::route()->uri()) != "essclusive/why" && (Request::route()->uri()) != "esspecial/why"  && (Request::route()->uri()) != "esstream/why"){echo "collapsed";} ?>"
            <?php if ((Request::segment(1))=="essclusive") { ?>
                href="/essclusive/why"
            <?php }else if ((Request::segment(1))=="esspecial"){?>
                href="/esspecial/why"
            <?php }else if ((Request::segment(1))=="esstream"){?>
                    href="/esstream/why"
            <?php }else { ?>
                href="/why"
            <?php } ?>
            >
            <i class="bi bi-card-heading"></i>
          <span>Why Choose Us</span>
        </a>
      </li><!-- End Profile Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
