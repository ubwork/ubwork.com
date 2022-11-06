@extends('client.candidate.layout.app')
@section('title')
    {{ __('Home') }}
@endsection
@section('content')
    <section class="user-dashboard">
      <div class="dashboard-outer">
        <div class="upper-title-box">
          <h3>My Profile</h3>
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

                  <div class="uploading-outer">
                    <div class="uploadButton">
                      <input class="uploadButton-input" type="file" name="attachments[]" accept="image/*, application/pdf" id="upload" multiple />
                      <label class="uploadButton-button ripple-effect" for="upload">Browse Logo</label>
                      <span class="uploadButton-file-name"></span>
                    </div>
                    <div class="text">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</div>
                  </div>

                  <form class="default-form" action="{{route("update",['id'=>request()->route('id')])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Full Name</label>
                        <input type="text" name="name" placeholder="fullname" value="{{$detail->name}}">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Job Title</label>
                        <input type="text" name="" placeholder="UI Designer" value="">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Phone</label>
                        <input type="text" name="phone" placeholder="phone" value="{{$detail->phone}}">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Email address</label>
                        <input type="text" name="email" placeholder="Email" value="{{$detail->email}}">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Website</label>
                        <input type="text" name="link_git" placeholder="www.jerome.com" value="{{$detail->link_git}}">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-3 col-md-12">
                        <label>Current Salary($)</label>
                        <select class="chosen-select">
                          <option>40-70 K</option>
                          <option>50-80 K</option>
                          <option>60-90 K</option>
                          <option>70-100 K</option>
                          <option>100-150 K</option>
                        </select>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-3 col-md-12">
                        <label>Expected Salary($)</label>
                        <select class="chosen-select">
                          <option>120-350 K</option>
                          <option>40-70 K</option>
                          <option>50-80 K</option>
                          <option>60-90 K</option>
                          <option>70-100 K</option>
                          <option>100-150 K</option>
                        </select>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Experience</label>
                        <input type="text" name="" placeholder="5-10 Years">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Age</label>
                        <select class="chosen-select">
                          <option>23 - 27 Years</option>
                          <option>24 - 28 Years</option>
                          <option>25 - 29 Years</option>
                          <option>26 - 30 Years</option>
                        </select>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Education Levels</label>
                        <input type="text" name="education_levels" placeholder="Education Levels" value="{{$detail->education_levels}}">
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Languages</label>
                        <input type="text" name="languages" placeholder="English, Turkish" value="{{$detail->languages}}">
                      </div>

                      <!-- Search Select -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Categories </label>
                        <select data-placeholder="Categories" class="chosen-select multiple" multiple tabindex="4">
                          <option value="Banking">Banking</option>
                          <option value="Digital&Creative">Digital & Creative</option>
                          <option value="Retail">Retail</option>
                          <option value="Human Resources">Human Resources</option>
                          <option value="Management">Management</option>
                        </select>
                      </div>

                      <!-- Input -->
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Allow In Search & Listing</label>
                        <select class="chosen-select">
                          <option>Yes</option>
                          <option>No</option>
                        </select>
                      </div>

                      <!-- About Company -->
                      <div class="form-group col-lg-12 col-md-12">
                        <label>Description</label>
                        <textarea name="description" placeholder="description">{{$detail->description}}</textarea>
                      </div>

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