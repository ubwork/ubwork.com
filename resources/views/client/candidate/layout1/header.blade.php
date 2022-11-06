
    <!-- Main Header-->
    <header class="main-header header-shaddow">
      <div class="container-fluid">
        <!-- Main box -->
        <div class="main-box">
          <!--Nav Outer -->
          <div class="nav-outer">
            <div class="logo-box">
              <div class="logo"><a href="index.html"><img src="{{ asset('assets/client-bower/images/logo.svg') }}" alt="" title=""></a></div>
            </div>

            <nav class="nav main-menu">
                <ul class="navigation" id="navbar">
                    <li class="current dropdown">
                        {{-- <span>Home</span> --}}
                        <a href="/">Home</a>
                    </li>

                    <li class="dropdown has-mega-menu" id="has-mega-menu">
                        {{-- <span>Find Jobs</span> --}}
                        <a href="/job">Find Jobs</a>
                    </li>

                    <li class="dropdown">
                        {{-- <span>Employers</span> --}}
                        <a href="/company">Company</a>
                    </li>

                    <li class="dropdown">
                        {{-- <span>Candidates</span> --}}
                        <a href="/candi">Candidates</a>
                    </li>



                    <!-- Only for Mobile View -->
                    <li class="mm-add-listing">
                        <a href="add-listing.html" class="theme-btn btn-style-one">Job Post</a>
                        <span>
                            <span class="contact-info">
                                <span class="phone-num"><span>Call us</span><a
                                        href="tel:1234567890">0395167635</a></span>
                                <span class="address">Trịnh Văn Bô <br>3051,
                                    Australia.</span>
                                <a href="" class="email">datmv202@gmail.com</a>
                            </span>
                            <span class="social-links">
                                <a href="#"><span class="fab fa-facebook-f"></span></a>
                                <a href="#"><span class="fab fa-twitter"></span></a>
                                <a href="#"><span class="fab fa-instagram"></span></a>
                                <a href="#"><span class="fab fa-linkedin-in"></span></a>
                            </span>
                        </span>
                    </li>
                </ul>
            </nav>
            <!-- Main Menu End-->
          </div>

          <div class="outer-box">

            <button class="menu-btn">
              <span class="count">1</span>
              <span class="icon la la-heart-o"></span>
            </button>

            <button class="menu-btn">
              <span class="icon la la-bell"></span>
            </button>

            <!-- Dashboard Option -->
            <div class="dropdown dashboard-option">
              <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('assets/client-bower/images/resource/company-6.png')}}" alt="avatar" class="thumb">
                <span class="name">My Account</span>
              </a>
              <ul class="dropdown-menu">
                <li class="active"><a href="candidate-dashboard.html"> <i class="la la-home"></i> Dashboard</a></li>
                <li><a href="candidate-dashboard-profile.html"><i class="la la-user-tie"></i>My Profile</a></li>
                <li><a href="candidate-dashboard-resume.html"><i class="la la-file-invoice"></i>My Resume</a></li>
                <li><a href="candidate-dashboard-applied-job.html"><i class="la la-briefcase"></i> Applied Jobs </a></li>
                <li><a href="candidate-dashboard-job-alerts.html"><i class="la la-bell"></i>Job Alerts</a></li>
                <li><a href="candidate-dashboard-shortlisted-resume.html"><i class="la la-bookmark-o"></i>Shortlisted Jobs</a></li>
                <li><a href="candidate-dashboard-cv-manager.html"><i class="la la-file-invoice"></i> CV manager</a></li>
                <li><a href="dashboard-packages.html"><i class="la la-box"></i>Packages</a></li>
                <li><a href="dashboard-messages.html"><i class="la la-comment-o"></i>Messages</a></li>
                <li><a href="dashboard-change-password.html"><i class="la la-lock"></i>Change Password</a></li>
                <li><a href="dashboard-profile.html"><i class="la la-user-alt"></i>View Profile</a></li>
                <li><a href="index.html"><i class="la la-sign-out"></i>Logout</a></li>
                <li><a href="dashboard-delete.html"><i class="la la-trash"></i>Delete Profile</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Mobile Header -->
      <div class="mobile-header">
        <div class="logo"><a href="index.html"><img src="images/logo.svg" alt="" title=""></a></div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

          <div class="outer-box">
            <!-- Login/Register -->
            <div class="login-box">
              <a href="login-popup.html" class="call-modal"><span class="icon-user"></span></a>
            </div>

            <button id="toggle-user-sidebar"><img src="images/resource/company-6.png" alt="avatar" class="thumb"></button>
            <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="flaticon-menu-1"></span></a>
          </div>
        </div>

      </div>

      <!-- Mobile Nav -->
      <div id="nav-mobile"></div>
    </header>
    <!--End Main Header -->