@extends('admin.layout.app')
@section('title')
    {{ __('Skill - add') }}
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="">

            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{__($title)}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="{{ route('admin.skill.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="inputName">{{__('NAME')}} <span class="text-danger">*</span></label>
                            <input type="text" id="inputName" name="name" class="form-control" value="{{old('name')}}">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>{{__('DESCRIPTION')}} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="description" value="{{old('description')}}">
                            @error('description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary float-left mr-3">{{__('SAVE')}}</button>
                        <a href="{{route('admin.skill.index')}}" class="btn btn-secondary">{{__('Cancel')}}</a>
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