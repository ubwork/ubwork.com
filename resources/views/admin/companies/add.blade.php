@extends('admin.layout.app')
@section('title')
    {{ __('Thêm Công ty') }}
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tạo mới công ty</h3>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['name']){{ $request['name'] }}@endisset">
                        </div>
                        <div class="form-group">
                            <label for="">Company name</label>
                            <input type="text" name="company_name" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['company_name']){{ $request['company_name'] }}@endisset">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['address']){{ $request['address'] }}@endisset">
                        </div>
                        <div class="form-group">
                            <label for="">District</label>
                            <input type="text" name="district" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['district']){{ $request['district'] }}@endisset">
                        </div>
                        <div class="form-group">
                            <label for="">Company Model</label>
                            <input type="text" name="company_model" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['company_model']){{ $request['company_model'] }}@endisset">
                        </div>
                        <div class="form-group">
                            <label for="">Working Time</label>
                            <input type="text" name="working_time" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['working_time']){{ $request['working_time'] }}@endisset">
                        </div>
                        <div class="form-group">
                            <label for="">City</label>
                            <input type="text" name="city" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['city']){{ $request['city'] }}@endisset">
                        </div>
                        <div class="form-group">
                            <label for="">Country</label>
                            <input type="text" name="country" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['country']){{ $request['country'] }}@endisset">
                        </div>
                        <div class="form-group">
                            <label for="">Zipcode</label>
                            <input type="text" name="zipcode" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['zipcode']){{ $request['zipcode'] }}@endisset">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['phone']){{ $request['phone'] }}@endisset">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['email']){{ $request['email'] }}@endisset">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['password']){{ $request['password'] }}@endisset">
                        </div>
                        <div class="form-group">
                            <label for="">Logo</label>
                            <input type="text" name="logo" class="form-control" placeholder="" aria-describedby="helpId " value="@isset($request['logo']){{ $request['logo'] }}@endisset">
                        </div>
                        <div class="form-group">
                            <label for="">Link Web</label>
                            <input type="text" name="link_web" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['link_web']){{ $request['link_web'] }}@endisset">
                        </div>
                        <div class="form-group">
                            <label for="">Coin</label>
                            <input type="text" name="coin" class="form-control" placeholder="" aria-describedby="helpId" value="@isset($request['coin']){{ $request['coin'] }}@endisset">
                        </div>
                        <div class="form-group">
                            <label for="">Tax code</label>
                            <input type="text" name="tax_code" class="form-control" placeholder="" aria-describedby="helpId"value="@isset($request['tax_code']){{ $request['tax_code'] }}@endisset">
                        </div>
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
                        <br>
                        <div class="">
                            <a href="" class="btn btn-sm btn-danger">Hủy</a>
                            &nbsp;
                            <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection