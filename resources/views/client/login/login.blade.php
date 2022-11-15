@extends('client.login.layout.app')
@section('content')
 <!-- Info Section -->
 <div class="login-section">
    <div class="image-layer" style="background-image: url({{asset('/assets/client-bower/images/background/12.jpg')}});"></div>
    <div class="outer-box">
      <!-- Login Form -->
      <div class="login-form default-form">
        <div class="form-inner">
          <h3>Đăng nhập vào UbWork</h3>
          <!--Login Form-->
          <form method="post" action="{{ route('candidate.login') }}">
            @csrf
            <div class="form-group">
              <label>Email</label>
              <input value="{{old('email')}}" type="text" name="email" placeholder="Nhập vào email..">
            </div>

            <div class="form-group">
              <label>Mật khẩu</label>
              <input value="{{old('password')}}" id="password-field" type="password" name="password" placeholder="Nhập vào mật khẩu..">
            </div>

            <div class="form-group">
              <div class="field-outer">
                <div class="input-group checkboxes square">
                  <input type="checkbox" name="remember-me" value="" id="remember">
                </div>
              </div>
            </div>

            <div class="form-group">
              <button class="theme-btn btn-style-one" type="submit" name="log-in">Đăng nhập</button>
            </div>
            
          </form>

          <div class="bottom-box">
            <div class="text">Bạn chưa có tài khoản? <a href="{{route('candidate.register')}}">Đăng ký</a></div>
          </div>
        </div>
      </div>
      <!--End Login Form -->
    </div>
  </div>
  <!-- End Info Section -->
@endsection