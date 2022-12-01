@extends('admin.layout.app')
@section('title')
    {{ __('Candidate - edit') }}
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="{{ route('admin.author.update', ['id' => $obj->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">{{__('Tên')}} <span class="text-danger">*</span></label>
                            <input type="text" id="inputName" name="name" class="form-control" value="{{$obj->name}}">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">{{__('Slogan')}} <span class="text-danger">*</span></label>
                            <input type="text" id="inputName" name="slogan" class="form-control" value="{{$obj->slogan}}">
                            @error('slogan')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label class="form-label w-100">{{__('avatar')}}</label>
                              <img id="image" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                                  style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                              <input name="image" type="file" id="img">
                              <small class="form-text text-muted">{{__('Choose an image smaller than 5mb')}}</small>
                              @error('avatar')
                              <small class="text-danger">{{$message}}</small>
                              @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <label class="form-label w-100">{{__('Giới tính')}}</label>
                        <div class="d-flex">
                          <div class="form-check mr-3">
                            <input type="radio" class="form-check-input" id="radio1" name="gender" value="1" checked>{{__('Male')}}
                            <label class="form-check-label" for="radio1"></label>
                          </div>
                          <div class="form-check mr-3">
                            <input type="radio" class="form-check-input" id="radio2" name="gender" value="2">{{__('Female')}}
                            <label class="form-check-label" for="radio2"></label>
                          </div>
                          <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio3" name="gender" value="3">{{__('Other')}}
                            <label class="form-check-label" for="radio3"></label>
                          </div>
                        </div>
                      </div>

                      
                      <div class="col-sm-6">
                        <label class="form-label w-100">{{__('STATUS')}}</label>
                        <div class="d-flex">
                          <div class="form-check mr-3">
                            <input type="radio" class="form-check-input" id="status" name="status" value="0" checked>{{__('Chưa kích hoạt')}}
                            <label class="form-check-label" for="status"></label>
                          </div>
                          <div class="form-check mr-3">
                            <input type="radio" class="form-check-input" id="status" name="status" value="1" checked>{{__('kích hoạt')}}
                            <label class="form-check-label" for="status"></label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="mt-3">
                        
                        <button type="submit" class="btn btn-primary float-left mr-3">{{__('SAVE')}}</button>
                        <a href="{{route('admin.author.index')}}" class="btn btn-secondary">{{__('Hủy')}}</a>
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
<script src="{{asset('js/admin/candidate.js')}}"></script>
@endsection