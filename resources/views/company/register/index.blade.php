<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Aug 2022 09:27:55 GMT -->
<head>
  <meta charset="utf-8">
  <title>Register</title>

  <!-- Stylesheets -->
  <link href="{{ asset('assets/client-bower/css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/client-bower/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/client-bower/css/responsive.css')}}" rel="stylesheet">

  <link rel="shortcut icon" href="{{ asset('assets/client-bower/images/favicon.png')}}" type="image/x-icon">
  <link rel="icon" href="{{ asset('assets/client-bower/images/favicon.png')}}" type="image/x-icon">

  <!-- Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
  <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
  
</head>
<style>
    .employer{
        display: none;

    }
</style>
<body>

  <div class="page-wrapper">

    <!-- Preloader -->


    <!-- Main Header-->
    <header class="main-header">
      <div class="container-fluid">
        <!-- Main box -->
        <div class="main-box">
          <!--Nav Outer -->
          <div class="nav-outer">
            <div class="logo-box">
                <div class="logo"><a href="{{route('register')}}"><img src="" alt="" title=""></a></div></div>
          </div>

          <div class="outer-box">
            <!-- Login/Register -->
            <div class="btn-box">
              <a href="" class="btn-style-three">Đăng nhập</a>
              {{-- <a href="dashboard-post-job.html" class="theme-btn btn-style-one"><span class="btn-title">Job Post</span></a> --}}
            </div>
          </div>
        </div>
      </div>

      <!-- Mobile Header -->
      <div class="mobile-header">
        <div class="logo"><a href="index.html"><img src="{{ asset('assets/client-bower/images/logo.svg')}}" alt="" title=""></a></div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">
          <div class="outer-box">
            <!-- Login/Register -->
            <div class="login-box">
              <a href="login-popup.html" class="call-modal"><span class="icon-user"></span></a>
            </div>
            <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="flaticon-menu-1"></span></a>
          </div>
        </div>
      </div>

      <!-- Mobile Nav -->
      <div id="nav-mobile"></div>
    </header>
    <!--End Main Header -->

    <!-- Info Section -->
    <div class="login-section">
        <div class="image-layer" style="background-image: url({{ asset('assets/client-bower/images/background/12.jpg')}});"></div>
      <div class="outer-box">
        <!-- Login Form -->
        <div class="login-form default-form">
          <div class="form-inner">
            <h3>Tạo tài khoản Công Ty</h3>

            <!--Login Form-->
           
              <div class="form-group">
                {{-- <div class="btn-box row"> --}}
                  {{-- <div class="col-lg-6 col-md-12">
                    <a href="javascript:void(0)" class="theme-btn btn-style-seven btn-candidate"><i class="la la-user"></i> Ứng viên </a>
                  </div> --}}
                  {{-- <div class="col-lg-6 col-md-12">
                    <a class="theme-btn btn-style-four btn-employer"><i class="la la-briefcase"></i> Nhà tuyển dụng </a>
                  </div> --}}
                {{-- </div> --}}
              </div>
              <form method="post" action="{{ route('register.store') }}" class="candidate">
                @csrf
                <div class="form-group">
                  <label>Tên Công Ty</label>
                  <input type="text" name="name" placeholder="Tên Công ty..." value="{{old('name')}}">
                </div>
                  @error('name')
                    <small class="text-danger">{{$message}}</small>
                  @enderror
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
              </div>
              @error('email')
                    <small class="text-danger">{{$message}}</small>
                  @enderror
              <div class="form-group">
                <label>Số điện thoại</label>
                <input type="number" name="phone" placeholder="Phone" value="{{old('phone')}}">
              </div>
              @error('phone')
                    <small class="text-danger">{{$message}}</small>
                  @enderror
              <div class="form-group">
                <label>Mật khẩu</label>
                <input id="password-field" type="password" name="password" value="" placeholder="Password">
              </div>
              @error('password')
                    <small class="text-danger">{{$message}}</small>
                  @enderror
              <div class="form-group">
                <button class="theme-btn btn-style-one " type="submit" name="Register">Đăng ký</button>
              </div>
            </form>

              {{-- <form method="post" action="{{ url('/register') }}" class="employer">
              <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="Email" required>
              </div>
              <div class="form-group">
                <label>Email Address</label>
                <input type="text" name="address" placeholder="address" required>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input id="password-field" type="password" name="password" value="" placeholder="Password">
              </div>

              <div class="form-group">
                <button class="theme-btn btn-style-one " type="submit" name="Register">Register</button>
              </div>
            </form> --}}
            <?php //Hiển thị thông báo thành công?>
        @if ( Session::has('success') )
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif
        <?php //Hiển thị thông báo lỗi?>
        @if ( Session::has('error') )
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif
          </div>
        </div>
        <!--End Login Form -->
      </div>
    </div>
    <!-- End Info Section -->

  </div><!-- End Page Wrapper -->

  <script src="{{ asset('assets/client-bower/js/jquery.js')}}"></script>
  <script src="{{ asset('assets/client-bower/js/popper.min.js')}}"></script>
  <script src="{{ asset('assets/client-bower/js/chosen.min.js')}}"></script>
  <script src="{{ asset('assets/client-bower/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('assets/client-bower/js/jquery-ui.min.js')}}"></script>
  <script src="{{ asset('assets/client-bower/js/jquery.fancybox.js')}}"></script>
  <script src="{{ asset('assets/client-bower/js/jquery.modal.min.js')}}"></script>
  <script src="{{ asset('assets/client-bower/js/mmenu.polyfills.js')}}"></script>
  <script src="{{ asset('assets/client-bower/js/mmenu.js')}}"></script>
  <script src="{{ asset('assets/client-bower/js/appear.js')}}"></script>
  <script src="{{ asset('assets/client-bower/js/ScrollMagic.min.js')}}"></script>
  <script src="{{ asset('assets/client-bower/js/rellax.min.js')}}"></script>
  <script src="{{ asset('assets/client-bower/js/owl.js')}}"></script>
  <script src="{{ asset('assets/client-bower/js/wow.js')}}"></script>
  <script src="{{ asset('assets/client-bower/js/script.js')}}"></script>

  {{-- <script>
    $('.btn-employer').click( function() {
        $('.employer').css('display', 'block'),
        $('.btn-employer').css('background-color', '#34A853'),
        $('.btn-employer').css('color', '#fff'),
        $('.btn-candidate').css('background-color', '#E1F2E5')
        $('.candidate').css('display', 'none')
    })
    $('.btn-candidate').click( function() {
        $('.candidate').css('display', 'block'),
        $('.btn-candidate').css('background-color', '#34A853'),
        $('.btn-candidate').css('color', '#fff'),
        $('.btn-employer').css('background-color', '#E1F2E5')
        $('.employer').css('display', 'none')
    })
  </script> --}}
</body>


<!-- Mirrored from creativelayers.net/themes/superio/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Aug 2022 09:27:55 GMT -->
</html>