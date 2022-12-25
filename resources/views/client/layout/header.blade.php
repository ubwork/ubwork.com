<header class="main-header">

    <!-- Main box -->
    <div class="main-box">
        <!--Nav Outer -->
        <div class="nav-outer">
            <div class="logo-box">
                <div class="logo"><a href="/"><img src="{{ asset('images/logo_ubwork.png') }}" alt=""
                            title="" style="max-height: 40px;"></a></div>
            </div>

            <nav class="nav main-menu">
                <ul class="navigation" id="navbar">
                    <li class=" dropdown">
                        {{-- <span>Home</span> --}}
                        <a href="/">Trang chủ</a>
                    </li>

                    <li class="dropdown">
                        <a href="{{ route('job') }}">Việc làm</a>
                        {{-- <ul>
                            <li class="dropdown">
                                <span>Chuyên ngành</span>
                                <ul>
                                    @foreach ($maJor as $item)
                                        <li><a
                                                href="{{ route('job-cat', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul> --}}
                    </li>

                    <li class="dropdown">
                        <a href="{{ route('company-list') }}">Công ty</a>
                    </li>
                    <li class="dropdown">
                        <a href="{{ route('jobspeed') }}">Tìm Việc Nhanh</a>
                    </li>

                    <!-- Only for Mobile View -->
                    <li class="mm-add-listing">
                        @if (auth('candidate')->check())
                            <span class="name"
                                style="display:block;padding:20px;text-align:center;">{{ auth('candidate')->user()->name }}</span>
                            <a style="display:block;padding:20px;"
                                href="{{ route('detail', ['id' => auth('candidate')->user()->id]) }}"><i
                                    class="la la-user-tie"></i>Thông tin</a>
                            <a style="display:block;padding:20px;"
                                href="{{ route('detail', ['id' => auth('candidate')->user()->id]) }}"><i
                                    class="la la-user-tie"></i>Thông tin</a>
                            <a style="display:block;padding:20px;" href="{{ route('jobApply') }}"><i
                                    class="la la-briefcase"></i> Công việc đã ứng
                                tuyển</a>
                            <a style="display:block;padding:20px;" href="{{ route('shortlisted_job') }}"><i
                                    class="la la-bookmark-o"></i>Công việc
                                đã
                                lưu</a>
                            <a style="display:block;padding:20px;" href="{{ route('speedapply') }}"><i
                                    class="la la-briefcase"></i> Công việc đã tìm
                                kiếm
                                nhanh</a>
                            <a style="display:block;padding:20px;" href="{{ route('shortlisted_list_company') }}"><i
                                    class="icon fas fa-building"></i>Công
                                ty đã lưu</a>
                            <a style="display:block;padding:20px;" href="{{ route('createNew') }}"><i
                                    class="la la-file-invoice"></i> Tạo CV</a>
                            <a style="display:block;padding:20px;" href="{{ route('seeker') }}"><i
                                    class="la la-file-invoice"></i> Quản lí CV</a>
                            <a style="display:block;padding:20px;" href="{{ route('listPackage') }}"><i
                                    class="fa fa-cube"></i>Gói cước</a>
                            <a style="display:block;padding:20px;" href="{{ route('historyPayment') }}"><i
                                    class="la la-history"></i>Lịch sử giao
                                dịch</a>
                            <a style="display:block;padding:20px;" href="{{ route('change_password') }}"><i
                                    class="la la-lock"></i>Đổi mật khẩu</a>
                            <a style="display:block;padding:20px;margin-bottom:100px;" class="theme-btn btn-style-one"
                                href="{{ route('logout') }}">Đăng xuất</a>
                        @else
                            <a href="{{ route('choose') }}" class="theme-btn btn-style-one">Đăng nhập</a>
                        @endif
                    </li>
                </ul>
            </nav>
            <!-- Main Menu End-->
        </div>

        @if (auth('candidate')->check())
            <div class="outer-box">

                <div class="dropdown dashboard-option">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                        @if (!is_null(auth('candidate')->user()->avatar) && Storage::exists(auth('candidate')->user()->avatar))
                            <img style="object-fit: cover;"
                                src="{{ asset('storage/' . auth('candidate')->user()->avatar) }}" alt="avatar"
                                class="thumb">
                        @elseif(!empty(auth('candidate')->user()->avatar))
                            <img style="object-fit: cover;"
                                src="{{ asset('storage/' . auth('candidate')->user()->avatar) }}" alt="avatar"
                                class="thumb">
                        @else
                            <img style="object-fit: cover;" src="{{ asset('assets/admin-bower/dist/img/avatar.png') }}"
                                alt="avatar" class="thumb">
                        @endif
                        <span class="name">{{ auth('candidate')->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu" style="min-width: 330px;">
                        <li><a href="{{ route('detail', ['id' => auth('candidate')->user()->id]) }}"><i
                                    class="la la-user-tie"></i>Thông tin</a></li>
                        <li><a href="{{ route('jobApply') }}"><i class="la la-briefcase"></i> Công việc đã ứng
                                tuyển</a>
                        </li>
                        <li><a href="{{ route('shortlisted_job') }}"><i class="la la-bookmark-o"></i>Công việc đã
                                lưu</a></li>
                        <li><a href="{{ route('speedapply') }}"><i class="la la-briefcase"></i> Công việc đã tìm kiếm
                                nhanh</a></li>
                        <li><a href="{{ route('shortlisted_list_company') }}"><i class="icon fas fa-building"></i>Công
                                ty đã lưu</a></li>
                        <li><a href="{{ route('createNew') }}"><i class="la la-file-invoice"></i> Tạo CV</a></li>
                        <li><a href="{{ route('seeker') }}"><i class="la la-file-invoice"></i> Quản lí CV</a></li>
                        <li><a href="{{ route('listPackage') }}"><i class="fa fa-cube"></i>Gói cước</a></li>
                        <li><a href="{{ route('historyPayment') }}"><i class="la la-history"></i>Lịch sử giao
                                dịch</a>
                        </li>
                        <li><a href="{{ route('change_password') }}"><i class="la la-lock"></i>Đổi mật khẩu</a></li>
                        <li><a href="{{ route('logout') }}"><i class="la la-sign-out"></i>Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        @else
            <div class="outer-box">
                <!-- Add Listing -->
                {{-- <a href="candidate-dashboard-cv-manager.html" class="upload-cv"> Upload your CV</a> --}}
                <!-- Login/Register -->
                <div class="btn-box">
                    <a href="{{ route('choose') }}" class="theme-btn btn-style-three">Đăng nhập</a>
                </div>
            </div>
        @endif
    </div>
    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="logo"><a href="/"><img src="{{ asset('images/logo_ubwork.png') }}" alt=""
                    title=""></a>
        </div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

            <div class="outer-box">
                @if (!auth('candidate')->check())
                    <div class="login-box">
                        <a href="{{ route('choose') }}"><span class="icon-user"></span></a>
                    </div>
                    {{-- <div class="btn-box">
                    <a href="{{ route('choose') }}" class="theme-btn btn-style-three">Đăng nhập</a>
                </div> --}}
                @endif
                <a href="#nav-mobile" class="mobile-nav-toggler"><span class="flaticon-menu-1"></span></a>
            </div>
        </div>
    </div>

    <!-- Mobile Nav -->
    <div id="nav-mobile"></div>
</header>
