@extends('admin.layout.app')
@section('title')
    {{ __('Thêm Công ty') }}
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="">
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
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['name']){{ $request['name'] }}@endisset">
                                @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Company name</label>
                                <input type="text" name="company_name" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['company_name']){{ $request['company_name'] }}@endisset">
                            @error('company_name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['address']){{ $request['address'] }}@endisset">
                                @error('address')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">District</label>
                                <input type="text" name="district" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['district']){{ $request['district'] }}@endisset">
                                @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Company Model</label>
                                <input type="text" name="company_model" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['company_model']){{ $request['company_model'] }}@endisset">
                                @error('conpany_model')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Working Time</label>
                                <input type="text" name="working_time" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['working_time']){{ $request['working_time'] }}@endisset">
                                 @error('working_time')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">City</label>
                                <input type="text" name="city" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['city']){{ $request['city'] }}@endisset">
                                @error('city')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Country</label>
                                <input type="text" name="country" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['country']){{ $request['country'] }}@endisset">
                                @error('country')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Zipcode</label>
                                <input type="text" name="zipcode" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['zipcode']){{ $request['zipcode'] }}@endisset">
                                @error('zip_code')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['phone']){{ $request['phone'] }}@endisset">
                                @error('phone')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['email']){{ $request['email'] }}@endisset">
                                @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['password']){{ $request['password'] }}@endisset">
                                @error('password')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Link Web</label>
                                <input type="text" name="link_web" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['link_web']){{ $request['link_web'] }}@endisset">
                                @error('phone')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Coin</label>
                                <input type="text" name="coin" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['coin']){{ $request['coin'] }}@endisset">
                                @error('coin')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tax code</label>
                                <input type="text" name="tax_code" class="form-control" placeholder="" aria-describedby="helpId"value="@isset($request['tax_code']){{ $request['tax_code'] }}@endisset">
                                @error('tax_code')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>           
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
                        {{-- @if ($errors->any())
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
                        @endif --}}
                        <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group">
                                <label class="form-label w-100">Logo</label>
                                <img id="image" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                                    style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                                <input name="image" type="file" id="img">
                                <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
                              </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" id="is_active" name="is_active" value="1" type="checkbox">
                                <label class="form-check-label" for="is_active">Is_active</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" id="status" name="status" value="1" type="checkbox">
                                <label class="form-check-label" for="status">Status</label>
                            </div>
                        </div>
                        </div>
                      </div>
                        <br>
                        <div class="mt-3">
                            <input type="submit" value="Thêm" class="btn btn-success float-left mr-3">
                            <a href="{{route('admin.company.index')}}" class="btn btn-secondary">Cancel</a>
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
<script src="{{asset('js/admin/company.js')}}"></script>
@endsection