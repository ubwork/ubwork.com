@extends('client.layout.app')
@section('title')
    {{ __('UB Work') }} | {{$detail->name}}
@endsection
@section('content')
    <section class="user-dashboard pt-5 mt-5">
      <div class="dashboard-outer">
        <div class="row">
          <div class="col-lg-10 m-auto">
            <!-- Ls widget -->
            <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>Đổi mật khẩu</h4>
                </div>

                <div class="widget-content">
                  <form class="default-form" action="{{route("update_pass")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                        <label>Mật khẩu cũ</label>
                        <input type="text" name="password_old" placeholder="Mật khẩu cũ" value="">
                      </div>
                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Mật khẩu mới</label>
                        <input type="text" name="password" placeholder="Mật khẩu mới" value="">
                        @error('password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Nhập lại mật khẩu</label>
                        <input type="text" name="re_password" placeholder="Nhập lại mật khẩu" value="">
                        @error('password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>
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
                      <div class="w-100"></div>
                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <button type="submit" class="theme-btn btn-style-one">Cập nhật</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </section>
@endsection