@extends('client.layout.app')
@section('title')
    {{ __('UB Work') }} | {{$detail->name}}
@endsection
@section('content')
    <section class="user-dashboard pt-5 mt-5">
      <div class="dashboard-outer">
        <div class="row">
          <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>My Profile</h4>
                </div>

                <div class="widget-content">
                  <form class="default-form" action="{{route("update",['id'=>request()->route('id')])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="uploading-outer">
                        <div class="uploadButton">
                          <input class="uploadButton-input" type="file" name="avatar" accept="image/*, application/pdf" id="upload" multiple />
                          <label class="uploadButton-button ripple-effect" for="upload"><img id="image" src="{{asset('storage/'. $detail->avatar)}}" alt="your image"
                                    style="max-width: 150px; height:100px; margin-bottom: 10px;" class="img-fluid"/></label>
                          <span class="uploadButton-file-name"></span>
                        </div>
                        <div class="text">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</div>
                      </div>
                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Full Name</label>
                        <input type="text" name="name" placeholder="fullname" value="{{$detail->name}}">
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Phone</label>
                        <input type="text" name="phone" placeholder="phone" value="{{$detail->phone}}">
                        @error('phone')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Email address</label>
                        <input type="text" name="email" placeholder="Email" value="{{$detail->email}}">
                        @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>

                      <!-- Input -->


                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Country</label>
                        <input type="text" name="address" placeholder="Country" value="{{$detail->address}}">
                        @error('address')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Age</label>
                        <input type="number" name="age" placeholder="Age" value="{{$detail->age}}">
                        @error('age')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Website</label>
                        <input type="text" name="link_git" placeholder="www.jerome.com" value="{{$detail->link_git}}">
                        @error('link_git')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Education Levels</label>
                        <input type="text" name="education_levels" placeholder="Education Levels" value="{{$detail->education_levels}}">
                        @error('education_levels')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Experience</label>
                        <input type="text" name="experience" placeholder="Experience">
                        @error('experience')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>


                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Languages</label>
                        <input type="text" name="languages" placeholder="English, Turkish" value="{{$detail->languages}}">
                        @error('languages')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>


                      <!-- About Company -->
                      <div class="form-group col-lg-12 col-md-12">
                        <label>Description</label>
                        <textarea name="description" placeholder="description">{{$detail->description}}</textarea>
                        @error('description')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
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
                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <button type="submit" class="theme-btn btn-style-one">Save</button>
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
                  <h4>Social Network</h4>
                </div>

                <div class="widget-content">
                  <form class="default-form">
                    <div class="row">
                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Facebook</label>
                        <input type="text" name="name" placeholder="www.facebook.com/Invision" value="{{$detail->facebook}}">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Twitter</label>
                        <input type="text" name="name" placeholder="Twitter" value="{{$detail->twitter}}">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Zalo</label>
                        <input type="text" name="name" placeholder="Zalo" value="{{$detail->zalo}}">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Instagram</label>
                        <input type="text" name="name" placeholder="Instagram" value="{{$detail->instagram}}">
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
                        <input type="text" name="name" placeholder="Address" value="{{$detail->address}}">
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
                          <iframe src="{{$detail->map}}" width="100%" height="420px" frameborder="0"></iframe>
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

          </div>


        </div>
      </div>
    </section>
@endsection