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
                <div class="logo"><a href="{{route('register')}}"><img src="{{ asset('assets/client-bower/images/logo-2.svg')}}" alt="" title=""></a></div>            </div>
          </div>

          <div class="outer-box">
            <!-- Login/Register -->
            <div class="btn-box">
              {{-- <a href="{{route('login')}}" class="btn-style-three">Login / Register</a> --}}
              <a href="dashboard-post-job.html" class="theme-btn btn-style-one"><span class="btn-title">Job Post</span></a>
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
            <h3>Create a Free Account</h3>
            {{-- <h3>ĐĂNG NHẬP</h3> --}}

            <!--Login Form-->
           
              <div class="form-group">
                <div class="btn-box row">
                  {{-- <div class="">
                    <a href="javascript:void(0)" class="theme-btn btn-style-seven btn-candidate"><i class="la la-user"></i> Đăng ký ứng viên </a>
                  </div> --}}
                </div>
              </div>
              <form method="post" action="{{ route('candidate.register') }}" class="candidate">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Ho Ten" value="{{old('name')}}">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
                @error('email')
                  <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
              

              <div class="form-group">
                <label>Password</label>
                <input id="password-field" type="password" name="password" value="" placeholder="Mat khau">
                @error('password')
                  <small class="text-danger">{{$message}}</small>
                @enderror
              </div>

              <div class="form-group">
                <label>Phone Number</label>
                <input id="phone-number" type="number" name="phone" value="" placeholder="So dien thoai">
                @error('phone')
                  <small class="text-danger">{{$message}}</small>
                @enderror
              </div>

              <div class="form-group">
                <label>Gender</label> <br>
                <input type="radio" checked id="html" name="gender" value="1">
                <label for="html">Man</label>
                <input type="radio" id="css" name="gender" value="2">
                <label for="css">Woman</label>
              </div>

              <div class="form-group">
                <button class="theme-btn btn-style-one " type="submit" name="">Register</button>
              </div>
            </form> 

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

  <script>
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
  </script>
</body>


<!-- Mirrored from creativelayers.net/themes/superio/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Aug 2022 09:27:55 GMT -->
</html>