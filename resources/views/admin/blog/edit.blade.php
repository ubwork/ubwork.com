@extends('admin.layout.app')
@section('title')
    {{ __('Bài viết') }} | {{$obj->title}}
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
                  <form action="{{ route('admin.blog.update', ['id' => $obj->id])}}" method="post" enctype="multipart/form-data">  
                    @csrf
                    <div class="row">
                      <div class="col-lg-12">
                          <!-- text input -->
                          <div class="form-group">
                              <label for="inputName">{{__('Tiêu đề')}} <span class="text-danger">*</span></label>
                              <input type="text" id="inputName" name="title" class="form-control" value="{{$obj->title}}">
                              @error('title')
                              <small class="text-danger">{{$message}}</small>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group col-lg-12 col-md-12">
                          <label>Mô tả</label>
                          <textarea class="description form-control" rows="4"  name="description" placeholder="">{{$obj->description}}</textarea>
                          @error('description')
                          <div class="text-danger pl-4">
                              {{ $message }}
                          </div>
                      @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-lg-12 col-md-12">
                          <label>Nội dung</label>
                          <textarea class="content form-control" rows="4" name="content" placeholder="">{{$obj->content}}</textarea>
                          @error('content')
                          <div class="text-danger pl-4">
                              {{ $message }}
                          </div>
                      @enderror
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label class="form-label w-100">{{__('IMAGE')}}</label>
                              @if(!empty($obj->banner))
                                <img id="image" src="{{ asset('storage/' .$obj->image) }}" alt="your image"
                                  style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                              @else
                                <img id="image" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                                  style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                              @endif
                              <input name="image" type="file" id="img">
                              <small class="form-text text-muted">{{__('Choose an image smaller than 5mb')}}</small>
                              @error('image')
                              <small class="text-danger">{{$message}}</small>
                              @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label class="form-label w-100">{{__('BANNER')}}</label>
                              @if(!empty($obj->banner))
                                <img id="banner" src="{{ asset('storage/' .$obj->banner) }}" alt="your image"
                                  style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                              @else
                                <img id="banner" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                                  style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                              @endif
                              <input name="banner" type="file" id="img_banner">
                              <small class="form-text text-muted">{{__('Choose an image smaller than 5mb')}}</small>
                              @error('banner')
                              <small class="text-danger">{{$message}}</small>
                              @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">        
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
                      <div class="col-sm-6">
                        <label class="form-label w-100">{{__('Tác Giả')}}</label>
                        <div class="d-flex">
                          <select class="form-select" id="author_id" name="author_id">
                            @foreach($author as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="mt-3">
                        
                        <button type="submit" class="btn btn-primary float-left mr-3">{{__('SAVE')}}</button>
                        <a href="{{route('admin.blog.index')}}" class="btn btn-secondary">{{__('Hủy')}}</a>
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