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
                <form class="default-form" action="{{route('company.profile.update', $data->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="uploading-outer">
                    <div class="uploadButton">
                      <input class="uploadButton-input" type="file" name="logo" accept="image/*, application/pdf" id="upload" multiple />
                      <label class="uploadButton-button ripple-effect" for="upload">Logo</label>
                      <span class="uploadButton-file-name"></span>
                    </div>
                    <div class="text">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</div>
                  </div>
                  {{-- <div class="col-sm-6">
                    <div class="form-group">
                      <label class="form-label w-100">Logo</label>
                      <img id="image" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                          style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                      <input name="image" type="file" id="img">
                      <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
                    </div>
                </div> --}}
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
                      <label>Thành Lâp</label>
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

                    <!-- Search Select -->
                    {{-- <div class="form-group col-lg-6 col-md-12">
                      <label>Multiple Select boxes </label>
                      <select data-placeholder="Categories" class="chosen-select multiple" multiple tabindex="4">
                        <option value="Banking">Banking</option>
                        <option value="Digital&Creative">Digital & Creative</option>
                        <option value="Retail">Retail</option>
                        <option value="Human Resources">Human Resources</option>
                        <option value="Management">Management</option>
                      </select>
                    </div> --}}

                    <!-- Input -->

                    <!-- About Company -->
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

          <!-- Ls widget -->
          {{-- <div class="ls-widget">
            <div class="tabs-box">
              <div class="widget-title">
                <h4>Social Network</h4>
              </div>

              <div class="widget-content">
                <form class="default-form">
                  <div class="row">
                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Facebook</label>
                      <input type="text" name="name" placeholder="www.facebook.com/Invision">
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Twitter</label>
                      <input type="text" name="name" placeholder="">
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Linkedin</label>
                      <input type="text" name="name" placeholder="">
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Google Plus</label>
                      <input type="text" name="name" placeholder="">
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

          <!-- Ls widget -->
          <div class="ls-widget">
            <div class="tabs-box">
              <div class="widget-title">
                <h4>Contact Information</h4>
              </div>

              <div class="widget-content">
                <form class="default-form">
                  <div class="row">
                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Country</label>
                      <select class="chosen-select">
                        <option>Australia</option>
                        <option>Pakistan</option>
                        <option>Chaina</option>
                        <option>Japan</option>
                        <option>India</option>
                      </select>
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12">
                      <label>City</label>
                      <select class="chosen-select">
                        <option>Melbourne</option>
                        <option>Pakistan</option>
                        <option>Chaina</option>
                        <option>Japan</option>
                        <option>India</option>
                      </select>
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-12 col-md-12">
                      <label>Complete Address</label>
                      <input type="text" name="name" placeholder="329 Queensberry Street, North Melbourne VIC 3051, Australia.">
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12">
                      <label>Find On Map</label>
                      <input type="text" name="name" placeholder="329 Queensberry Street, North Melbourne VIC 3051, Australia.">
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-3 col-md-12">
                      <label>Latitude</label>
                      <input type="text" name="name" placeholder="Melbourne">
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-3 col-md-12">
                      <label>Longitude</label>
                      <input type="text" name="name" placeholder="Melbourne">
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-12 col-md-12">
                      <button class="theme-btn btn-style-three">Search Location</button>
                    </div>


                    <div class="form-group col-lg-12 col-md-12">
                      <div class="map-outer">
                        <div class="map-canvas map-height" data-zoom="12" data-lat="-37.817085" data-lng="144.955631" data-type="roadmap" data-hue="#ffc400" data-title="Envato" data-icon-path="images/resource/map-marker.png" data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
                        </div>
                      </div>
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-12 col-md-12">
                      <button class="theme-btn btn-style-one">Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div> --}}


      </div>
    </div>
  </section>



@endsection
@section('script')
@parent
<script src="{{asset('js/admin/company.js')}}"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyDaaCBm4FEmgKs5cfVrh3JYue3Chj1kJMw&amp;ver=5.2.4"></script>
<script src="{{ asset('assets/client-bower/js/map-script.js')}}"></script>
@endsection