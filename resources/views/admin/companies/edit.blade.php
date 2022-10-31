@extends('admin.layout.app')
@section('title')
    {{ __('Sửa Công ty') }}
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="">
            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">{{$title}}</h3>
                </div>
            <div class="card-body">
                <form action="{{route('company.edit', ['id' => $item->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="" aria-describedby="helpId" value="{{$item->name}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="">Company name</label>
                            <input type="text" name="company_name" class="form-control" placeholder="" aria-describedby="helpId" value="{{$item->company_name}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="" aria-describedby="helpId" value="{{$item->address}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">District</label>
                                <input type="text" name="district" class="form-control" placeholder="" aria-describedby="helpId" value="{{$item->district}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Company Model</label>
                                <input type="text" name="company_model" class="form-control" placeholder="" aria-describedby="helpId" value="{{$item->company_model}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Working Time</label>
                                <input type="text" name="working_time" class="form-control" placeholder="" aria-describedby="helpId" value="{{$item->working_time}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="">City</label>
                            <input type="text" name="city" class="form-control" placeholder="" aria-describedby="helpId" value="{{$item->city}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Country</label>
                                <input type="text" name="country" class="form-control" placeholder="" aria-describedby="helpId" value="{{$item->country}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Zipcode</label>
                                <input type="text" name="zipcode" class="form-control" placeholder="" aria-describedby="helpId" value="{{$item->zipcode}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="" aria-describedby="helpId" value="{{$item->phone}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="" aria-describedby="helpId" value="{{$item->email}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control" placeholder="" aria-describedby="helpId" value="{{$item->password}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Link Web</label>
                                <input type="text" name="link_web" class="form-control" placeholder="" aria-describedby="helpId" value="{{$item->link_web}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Coin</label>
                                <input type="text" name="coin" class="form-control" placeholder="" aria-describedby="helpId" value="{{$item->coin}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tax code</label>
                                <input type="text" name="tax_code" class="form-control" placeholder="" aria-describedby="helpId" value="{{$item->tax_code}}">
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
                        <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group">
                                <label class="form-label w-100">Logo</label>
                                <img id="image" src="{{asset('storage/'. $item->logo)}}" alt="your image"
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
                            <input type="submit" value="Sửa" class="btn btn-success float-left mr-3">
                            <a href="{{route('company.index')}}" class="btn btn-secondary">Cancel</a>
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