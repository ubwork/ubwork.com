<header class="main-header">

    <!-- Main box -->
    <div class="main-box">
        <!--Nav Outer -->
        <div class="nav-outer">
            <div class="logo-box">
                <div class="logo"><a href=""><img src="{{ asset('images/logo_ubwork.png') }}"
                            alt="" title=""></a></div>
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
            <!-- Add Listing -->
            <a href="candidate-dashboard-cv-manager.html" class="upload-cv"> Upload your CV</a>
            <!-- Login/Register -->
            <div class="btn-box">
                <a href="" class="theme-btn btn-style-three call-modal">Login / Register</a>
                <a href="" class="theme-btn btn-style-one">Job Post</a>
            </div>
        </div>
    </div>

    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="logo"><a href=""><img src="{{ asset('images/logo_ubwork.png') }}"
                    alt="" title=""></a>
        </div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

            <div class="outer-box">
                <!-- Login/Register -->
                <div class="login-box">
                    <a href="login-popup.html" class="call-modal"><span class="icon-user"></span></a>
                </div>

                <a href="#nav-mobile" class="mobile-nav-toggler"><span class="flaticon-menu-1"></span></a>
            </div>
        </div>
    </div>

    <!-- Mobile Nav -->
    <div id="nav-mobile"></div>
</header>
