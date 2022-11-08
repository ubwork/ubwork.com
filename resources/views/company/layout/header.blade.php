<header class="main-header header-shaddow">
    <div class="container-fluid">
        <!-- Main box -->
        <div class="main-box">
            <!--Nav Outer -->
            <div class="nav-outer">
                <div class="logo-box">
                    <div class="logo"><a href="index.html"><img src="{{ asset('assets/client-bower/images/logo.svg') }}"
                                alt="" title=""></a></div>
                </div>

                <nav class="nav main-menu">
                    <ul class="navigation" id="navbar">

                        <!-- Only for Mobile View -->
                        <li class="mm-add-listing">

                        </li>
                    </ul>
                </nav>
                <!-- Main Menu End-->
            </div>

            <div class="outer-box">
                <button class="menu-btn">
                    <span class="icon la la-bell"></span>
                </button>

                <!-- Dashboard Option -->
                <div class="dropdown dashboard-option">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('assets/client-bower/images/resource/company-6.png') }}" alt="avatar"
                            class="thumb">
                        <span class="name">{{ auth('company')->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="dashboard-company-profile.html"><i class="la la-user-alt"></i>View Profile</a></li>
                        <li>
                            <form action="{{ route('company.logOut') }}" method="post">
                                @csrf
                                <a><button type="submit">
                                        <i class="la la-sign-out"></i>Logout
                                </button></a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="logo"><a href="index.html"><img src="{{ asset('assets/client-bower/images/logo.svg') }}"
                    alt="" title=""></a></div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

            <div class="outer-box">
                <!-- Login/Register -->
                <div class="login-box">
                    <a href="login-popup.html" class="call-modal"><span class="icon-user"></span></a>
                </div>

                <button id="toggle-user-sidebar"><img
                        src="{{ asset('assets/client-bower/images/resource/company-6.png') }}" alt="avatar"
                        class="thumb"></button>
                <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span
                        class="flaticon-menu-1"></span></a>
            </div>
        </div>

    </div>

    <!-- Mobile Nav -->
    <div id="nav-mobile"></div>
</header>
