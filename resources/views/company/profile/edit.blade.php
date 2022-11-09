@extends('company.layout.app')
@section('title')
    {{ __('Sửa Công ty') }}
@endsection
@section('content')
<section class="user-dashboard">
    <div class="dashboard-outer">
      <div class="upper-title-box">
        <h3>Company Profile!</h3>
        <div class="text">Ready to jump back in?</div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <!-- Ls widget -->
          <div class="ls-widget">
            <div class="tabs-box">
              <div class="widget-title">
                <h4>My Profile</h4>
              </div>
              <div class="widget-content">
                <form class="default-form" action="{{route('company.profile.update')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="uploading-outer">
                    <div class="uploadButton">
                      <input class="uploadButton-input" type="file" name="logo" accept="image/*, application/pdf" id="upload" multiple />
                      <label class="uploadButton-button ripple-effect" for="upload">Logo</label>
                      <span class="uploadButton-file-name"></span>
                    </div>
                    <div class="text">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</div>
                  </div>
                {{-- @dd($data);  --}}
                <input type="hidden" name="logo_old" value="{{$data->logo}}">
                <div class="form-group col-lg-6 col-md-12">
                      <label>Logo</label> 
                      <img width="130px" src="{{asset('storage/images/company/'. $data->logo)}}" alt="">
                </div>
                  
                <td class="text-center"></td>
                  <div class="row">
                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Name</label>
                      
                      <input type="text" name="name" value="{!!$data->name !!}">
                      @error('name')
                        <small class="text-danger">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Company Name</label>
                      
                      <input type="text" name="company_name" value="{!!$data->company_name !!}">
                      @error('company_name')
                        <small class="text-danger">{{$message}}</small>
                      @enderror
                    </div>

                    <div class="form-group col-lg-6 col-md-12">
                      <label>Email address</label>
                      <input type="text" name="email" value="{!!$data->email !!}">
                      @error('email')
                        <small class="text-danger">{{$message}}</small>
                      @enderror
                    </div>
<!-- Input -->
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Phone</label>
                      <input type="text" name="phone" value="{!!$data->phone !!}">
                      @error('phone')
                        <small class="text-danger">{{$message}}</small>
                      @enderror
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Website</label>
                      <input type="text" name="website" value="{!!$data->link_web !!}">
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Thành Lập</label>
                      <input type="text" name="year" placeholder="06.04.2020">
                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Lĩnh vực</label>
                      <input type="text" name="coin" disabled>
                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Address</label>
                      <input type="text" name="address" value="{!!$data->address !!}">
                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Loại hình doanh nghiệp</label>
                      <input type="text" name="company_model" value="{!!$data->company_model !!}">
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Team Size</label>
                      <select class="chosen-select">
                        @foreach ($team as $k => $v)
                        <option value="{{$k}}" @if (isset($data->team) && $data->team == $k ) selected @endif>
                        {{ $v }}</option>
                        @endforeach
                      </select>
                    </div>           
                    <div class="form-group col-lg-12 col-md-12">
                      <label>About Company</label>
                      <textarea type="text" name="about">{!!$data->about !!}</textarea>
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12">
                      <button class="theme-btn btn-style-one">Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
@endsection