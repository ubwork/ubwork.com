@extends('admin.layout.app')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">{{__('NAME')}}</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ old('name') }}" placeholder="{{__('Enter Name')}}">
                        </div>
                        @error('name')
                            <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                                <button type="button" class="close p-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-group">
                            <label for="displayname">{{__('DISPLAY_NAME')}}</label>
                            <input type="text" class="form-control" name="display_name" id="name"
                                value="{{ old('display_name') }}" placeholder="{{__('Enter display name')}}">
                        </div>
                        @error('display_name')
                            <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                                <button type="button" class="close p-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{__('SAVE')}}</button>
                        <a href="{{route('admin.permission.index')}}" class="btn btn-secondary">{{__('BACK')}}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
