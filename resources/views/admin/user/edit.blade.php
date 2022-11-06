@extends('admin.layout.app')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-12 col-lg-9 col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.user.update',$user['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        value="{{ $user['email'] }}" placeholder="{{ __('Enter email') }}">
                                </div>
                                @error('email')
                                    <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                                        <button type="button" class="close p-1" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="name">{{ __('NAME') }}</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $user['name'] }}" placeholder="{{ __('Enter Name') }}">
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
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="Phone">{{ __('PHONE') }}</label>
                            <input type="text" class="form-control" name="phone" id="Phone"
                                value="{{ $user['phone'] }}" placeholder="{{ __('Enter phone') }}">
                        </div>
                        @error('phone')
                            <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                                <button type="button" class="close p-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">{{ __('PASSWORD') }}</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="{{ __('Enter password') }}">
                                </div>
                                @error('password')
                                    <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                                        <button type="button" class="close p-1" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">{{ __('Confirm Password') }}</label>
                                    <input type="password" class="form-control" name="re-password" id="password"
                                        placeholder="{{ __('Enter password') }}">
                                </div>
                                @error('re-password')
                                    <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                                        <button type="button" class="close p-1" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12"><label for="">{{__('ROLE')}}</label></div>
                            @foreach ($roles as $role)
                                <div class="col-lg-3 col-md-4">
                                    <div class="custom-control custom-checkbox">
                                        <input
                                            class="custom-control-input custom-control-input-secondary custom-control-input-outline checkbox-edit"
                                            type="checkbox" id="roleChecked{{ $role }}" name="roles[]" value="{{ $role }}" {{in_array($role,$user->getRoleNames()->toArray()) ? 'checked' : ''}}>
                                        <label for="roleChecked{{ $role }}" class="custom-control-label">{{ $role }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('roles')
                            <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                                <button type="button" class="close p-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-group">
                            <label class="col-md-3 col-sm-4 control-label">{{ __('IMAGE') }}</label>
                            <div class="col-md-9 col-sm-8">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <img id="image_preview"
                                            src="{{ asset('bower_components/template-admin/dist/img/avatar.png') }}"
                                            alt="your image" style="max-width: 200px; height:100px; margin-bottom: 10px;"
                                            class="img-fluid" />
                                        <input type="file" name="image" accept="image/*"
                                            class="form-control-file @error('image') is-invalid @enderror" id="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('image')
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
                        <a href="{{route('admin.user.index')}}" class="btn btn-secondary">{{__('BACK')}}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @parent
    <script>
        $(function() {
            function readURL(input, selector) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function(e) {
                        $(selector).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#image").change(function() {
                readURL(this, '#image_preview');
            });

        });
    </script>
@endsection
