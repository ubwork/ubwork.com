@extends('admin.layout.app')
@section('title')
    {{ __('Customer - edit') }}
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="">

            <div id="msg-box">
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


            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">Tên <span class="text-danger">*</span></label>
                            <input type="text" id="inputName" name="name" value="{{$obj->name}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Số điện thoại <span class="text-danger">*</span></label>
                            <input type="text" value="{{$obj->phone}}" class="form-control" name="phone">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Email <span class="text-danger">*</span></label>
                          <input type="email" class="form-control" name="email" value="{{$obj->email}}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>password <span class="text-danger">*</span></label>
                          <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Thành phố</label>
                          <input type="text" class="form-control" name="city" value="{{$obj->city}}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Vị trí</label>
                          <input type="text" class="form-control" name="position" value="{{$obj->position}}">
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label class="form-label w-100">Ảnh</label>
                              <img id="image" src="{{$obj->avatar?''.Storage::url($obj->avatar):'http://placehold.it/100x100'}}" alt="your image"
                                  style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                              <input name="image" type="file" id="img">
                              <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="{{$obj->address}}">
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <label class="form-label w-100">Giới tính</label>
                        <div class="d-flex">
                          <div class="form-check mr-3">
                            <input type="radio" class="form-check-input" id="radio1" name="gender" value="1" checked>Nam
                            <label class="form-check-label" for="radio1"></label>
                          </div>
                          <div class="form-check mr-3">
                            <input type="radio" class="form-check-input" id="radio2" name="gender" value="2">Nữ
                            <label class="form-check-label" for="radio2"></label>
                          </div>
                          <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio3" name="gender" value="3">Khác
                            <label class="form-check-label" for="radio3"></label>
                          </div>
                        </div>
                      </div>

                      
                      <div class="col-sm-6">
                        <label class="form-label w-100">Trạng thái</label>
                        <div class="d-flex">
                          <div class="form-check mr-3">
                            <input type="radio" class="form-check-input" id="status" name="status" value="1" checked>Hoạt động
                            <label class="form-check-label" for="status"></label>
                          </div>
                          <div class="form-check">
                            <input type="radio" class="form-check-input" id="status2" name="status" value="0">Không hoạt động
                            <label class="form-check-label" for="status2"></label>
                          </div>
                        </div>
                      </div>
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


                    <div class="mt-3">
                        <input type="submit" value="Thêm" class="btn btn-success float-left mr-3">
                        <a href="{{route('admin.customer.list')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                  </form>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
    </div>
</section>
@endsection
@section('script')
@parent
<script src="{{asset('js/admin/customer.js')}}"></script>
@endsection