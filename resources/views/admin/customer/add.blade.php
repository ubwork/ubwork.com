@extends('admin.layout.app')
@section('title')
    {{ __('Customer - add') }}
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
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">Tên</label>
                            <input type="text" id="inputName" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>password</label>
                          <input type="password" class="form-control" name="email">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="form-label w-100">Ảnh</label>
                            <img id="image" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                                style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                            <input name="image" type="file" id="img">
                            <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
                        </div>
                    </div>
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