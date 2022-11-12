@extends('client.layout.app')
@section('title')
    {{__('Candi')}}
@endsection
@section('content')
    <section class="user-dashboard pt-5 mt-5">
      <div class="dashboard-outer ">
        <!-- Ls widget -->
        <div class="ls-widget">
          <div class="widget-content">
            <form class="default-form">
              <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="widget-title">
                        <h4>Change Password</h4>
                    </div>
                    <div class="widget-contenn">
                        <form class="default-form" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- Input -->
                            <div class="form-group col-lg-6 col-md-12">
                                <label>Full Name</label>
                                <input type="text" name="name" placeholder="fullname" value="">
                                @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            </div>
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
                            <div class="w-100"></div>
                            <!-- Input -->
                            <div class="form-group col-lg-6 col-md-12">
                                <button type="submit" class="theme-btn btn-style-one">Save</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection