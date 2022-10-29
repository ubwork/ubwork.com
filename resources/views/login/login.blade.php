@extends('login.layout.app')
@section('content')
 <!-- Info Section -->
 <div class="login-section">
    <div class="image-layer" style="background-image: url({{asset('/assets/client-bower/images/background/12.jpg')}});"></div>
    <div class="outer-box">
      <!-- Login Form -->
      <div class="login-form default-form">
        <div class="form-inner">
          <h3>Login to UbWork</h3>
          <!--Login Form-->
          <form method="post" action="{{ url('/login') }}">
            @csrf
            <div class="form-group">
              <label>Email</label>
              <input value="{{old('email')}}" type="text" name="email" placeholder="Email">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input value="{{old('password')}}" id="password-field" type="password" name="password" placeholder="Password">
            </div>

            <div class="form-group">
              <div class="field-outer">
                <div class="input-group checkboxes square">
                  <input type="checkbox" name="remember-me" value="" id="remember">
                  <label for="remember" class="remember"><span class="custom-checkbox"></span> Remember me</label>
                </div>
                <a href="#" class="pwd">Forgot password?</a>
              </div>
            </div>

            <div class="form-group">
              <button class="theme-btn btn-style-one" type="submit" name="log-in">Log In</button>
            </div>
            {{-- //Hiển thị thông báo thành công --}}
            <br>
            @if ( Session::has('success') )
                <div class="alert alert-success alert-outline alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-icon">
                        <i class="far fa-fw fa-bell"></i>
                    </div>
                    <div class="alert-message">
                        <strong>{{ Session::get('success') }}</strong>
                    </div>
                </div>
            @endif
            <?php //Hiển thị thông báo lỗi?>
            @if ( Session::has('error') )
                <div class="alert alert-danger alert-outline alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-icon">
                        <i class="far fa-fw fa-bell"></i>
                    </div>
                    <div class="alert-message">
                        <strong>{{ Session::get('error') }}</strong>
                    </div>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-outline alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-icon">
                        <i class="far fa-fw fa-bell"></i>
                    </div>
                    <div class="alert-message">
                        <strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </strong>
                    </div>
                </div>
            @endif
            {{-- hiển thị --}}
          </form>

          <div class="bottom-box">
            <div class="text">Don't have an account? <a href="">Signup</a></div>
            <div class="divider"><span>or</span></div>
            <div class="btn-box row">
              <div class="col-lg-6 col-md-12">
                <a href="#" class="theme-btn social-btn-two facebook-btn"><i class="fab fa-facebook-f"></i> Log in Facebook</a>
              </div>
              <div class="col-lg-6 col-md-12">
                <a href="#" class="theme-btn social-btn-two google-btn"><i class="fab fa-google"></i> Log in Gmail</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End Login Form -->
    </div>
  </div>
  <!-- End Info Section -->
@endsection