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
                  <h4>Thông tin của bạn</h4>
                </div>

                <div class="widget-content">
                  <form class="default-form" action="{{route("update")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="uploading-outer">
                        <div class="uploadButton">
                          <input class="uploadButton-input" type="file" name="avatar" accept="image/*, application/pdf" id="upload" multiple />
                          <label class="uploadButton-button ripple-effect" for="upload"><img id="image" src="{{asset('storage/'. $detail->avatar)}}" alt="Ảnh của bạn"
                                    style="max-width: 150px; height:100px; margin-bottom: 10px;" class="img-fluid"/></label>
                          <span class="uploadButton-file-name"></span>
                        </div>
                        <div class="text">Kích thước tệp tối đa là 1MB, Kích thước tối thiểu: 330x300 Và các tệp phù hợp là .jpg & .png</div>
                      </div>
                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Họ và tên</label>
                        <input type="text" name="name" placeholder="Họ và tên..." value="{{$detail->name}}">
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="Email..." value="{{$detail->email}}">
                        @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Số điện thoại</label>
                        <input type="text" name="phone" placeholder="Số điện thoại..." value="{{$detail->phone}}">
                        @error('phone')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Địa chỉ</label>
                        <input type="text" name="address" placeholder="Địa chỉ..." value="{{$detail->address}}">
                        @error('address')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>
                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Ngày sinh</label>
                        <input type="date" name="birthday" placeholder="Ngày sinh..." value="{{$detail->birthday}}">
                        @error('birthday')
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
                        <button type="submit" class="theme-btn btn-style-one">Save</button>
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