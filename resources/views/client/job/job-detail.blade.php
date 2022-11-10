@extends('client.layout.app')
@section('title')
    {{__('UB Work')}} | {{$data_job->title}}
@endsection
@section('content')
    <section class="job-detail-section">
      <!-- Upper Box -->
      <div class="upper-box" style="background-image: url({{asset('storage/images/bg-4.png')}}) ">
        <div class="auto-container">
          <!-- Job Block -->
          <div class="job-block-seven">
            <div class="inner-box">
              <div class="content">
                <span class="company-logo"><img src="{{asset('storage/'.$data_job->company->logo)}}"></span>
                <h4><a href="{{route('job-detail', ['id' => $data_job->id])}}">{{$data_job->title}}</a></h4>
                <ul class="job-info">
                  <li><span class="icon flaticon-briefcase"></span> Segment</li>
                  <li><span class="icon flaticon-map-locator"></span>{{$data_job->company->address}}</li>
                  <li><span class="icon flaticon-clock-3"></span>{{$data_job->company->working_time}}</li>
                  <li><span class="icon flaticon-money"></span> {{number_format($data_job->min_salary)}} - {{number_format($data_job->max_salary)}}</li>
                </ul>
                <ul class="job-other-info">
                    <li class="time">
                        @if($data_job->full_time == 1)
                            Full Time
                        @endif
                    </li>
                    <li class="privacy">
                        @if($data_job->part_time == 1)
                            Part Time
                        @endif
                    </li>
                    <li class="required">
                        @if($data_job->full_time == 1 && $data_job->part_time == 1 )
                           Full Time / Part Time
                        @endif
                    </li>
                </ul>
              </div>

              <div class="btn-box">
                @if (auth('candidate')->check())  
                    @if (!empty($idJobApplied[$data_job->id]) )
                      @if($idJobApplied[$data_job->id]->job_post_id == $data_job->id)
                      <button class="theme-btn btn-style-one" >Đã APPLY</button>
                      @endif
                    @else
                      <a  href="{{route('applied', ['id' => $data_job->id])}}" class="theme-btn btn-style-one">Apply For Job</a>
                    @endif
                @else
                    <button class="theme-btn btn-style-one">Apply For Job</button>
                @endif
                
                @if (auth('candidate')->check()) 
                  @if (!empty($idJobShort[$data_job->id]) )
                    @if($idJobShort[$data_job->id]->job_post_id == $data_job->id)
                      <a href="{{route('delete_shortlisted', ['id' => $idJobShort[$data_job->id]->id])}}"><button class="bookmark-btn"><span class="flaticon-bookmark" style="color: yellow"></span></button></a>
                    @endif
                  @else
                    <a href="{{route('shortlisted', ['id' => $data_job->id])}}"><button class="bookmark-btn"><span class="flaticon-bookmark"></span></button></a>
                  @endif
                @else
                    <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="job-detail-outer">
        <div class="auto-container">
          <div class="row">
            <div class="content-column col-lg-8 col-md-12 col-sm-12">
              <div class="job-detail">
                <h4>Job Description</h4>
                <p>{{ $data_job->description}}</p>
                <h4>Key Responsibilities</h4>
                <ul class="list-style-three">
                  {{ $data_job->requirement}}
                </ul>
                <h4>Skill & Experience</h4>
                <ul class="list-style-three">
                  <li>{{ $data_job->experience}}
                </ul>
              </div>

              <!-- Other Options -->
              <div class="other-options">
                <div class="social-share">
                  <h5>Share this job</h5>
                  <a href="#" class="facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
                  <a href="#" class="twitter"><i class="fab fa-twitter"></i> Twitter</a>
                  <a href="#" class="google"><i class="fab fa-google"></i> Google+</a>
                </div>
              </div>

              <!-- Related Jobs -->
              <div class="related-jobs">
                <div class="title-box">
                  <h3>Related Jobs</h3>
                  <div class="text">2020 jobs live - 293 added today.</div>
                </div>

                <!-- Job Block -->
                @foreach ($data_job_relate as $item)
                    <div class="job-block">
                        <div class="inner-box">
                            <div class="content">
                            <span class="company-logo"><img src="{{asset('storage/'.$item->company->logo)}}" alt=""></span>
                            <h4><a href="{{route('job-detail', ['id' => $item->id])}}">{{$item->title}}</a></h4>
                            <ul class="job-info">
                                <li><span class="icon flaticon-briefcase"></span>{{$item->major->name}}</li>
                                <li><span class="icon flaticon-map-locator"></span>{{$item->company->address}}</li>
                                <li><span class="icon flaticon-clock-3"></span>{{$item->company->working_time}} giờ/ngày</li>
                                <li><span class="icon flaticon-money"></span>{{number_format($item->min_salary)}} - {{number_format($data_job->max_salary)}}</li>
                            </ul>
                            <ul class="job-other-info">
                                @if($item->full_time == 1)
                                  <li class="time">
                                    Full Time
                                  </li>
                                @endif
                                @if($item->part_time == 1)
                                  <li class="privacy">
                                      Part Time
                                  </li>
                                @endif
                                @if($item->full_time == 1 && $item->part_time == 1 )
                                  <li class="required">
                                  Full Time / Part Time
                                  </li>
                                @endif
                            </ul>
                            @if (auth('candidate')->check()) 
                                <a href="{{route('shortlisted', ['id' => $item->id])}}"><button class="bookmark-btn"><span class="flaticon-bookmark"></span></button></a>
                            @else
                                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                            @endif
                            </div>
                        </div>
                    </div>
                @endforeach
              </div>
            </div>

            <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
              <aside class="sidebar">
                <div class="sidebar-widget">
                  <!-- Job Overview -->
                  <h4 class="widget-title">Job Overview</h4>
                  <div class="widget-content">
                    <ul class="job-overview">
                      <li>
                        <i class="icon icon-calendar"></i>
                        <h5>Date Posted:</h5>
                        <span>{{$data_job->start_date}}</span>
                      </li>
                      <li>
                        <i class="icon icon-expiry"></i>
                        <h5>Expiration date:</h5>
                        <span>{{$data_job->end_date}}</span>
                      </li>
                      <li>
                        <i class="icon icon-location"></i>
                        <h5>Location:</h5>
                        <span>{{$data_job->company->address}}</span>
                      </li>
                      <li>
                        <i class="icon icon-user-2"></i>
                        <h5>Job Title:</h5>
                        <span>{{$data_job->title}}</span>
                      </li>
                      <li>
                        <i class="icon icon-clock"></i>
                        <h5>Hours:</h5>
                        <span>{{$data_job->company->working_time}} giờ/ngày</span>
                      </li>
                      <li>
                        <i class="icon icon-rate"></i>
                        <h5>Rate:</h5>
                        <span>{{number_format($data_job->min_salary/8/27)}} - {{number_format($data_job->max_salary/8/27)}} đ / giờ</span>
                      </li>
                      <li>
                        <i class="icon icon-salary"></i>
                        <h5>Salary:</h5>
                        <span>{{number_format($data_job->min_salary)}} - {{number_format($data_job->max_salary)}} đ</span>
                      </li>
                    </ul>
                  </div>

                  <!-- Map Widget -->
                  <h4 class="widget-title">Job Location</h4>
                  <div class="widget-content">
                    <div class="map-outer">
                      <div class="map-canvas">
                        <iframe class="map-canvas" width="100%" src="{{$data_job->company->map}}" frameborder="0"></iframe>
                      </div>
                    </div>
                  </div>

                  <!-- Job Skills -->
                  <h4 class="widget-title">Job Skills</h4>
                  <div class="widget-content">
                    <ul class="job-skills">
                      {{-- @foreach($job_skills as $item)
                      <li><a href="#">{{$item->name}}</a></li>
                      @endforeach --}}
                    </ul>
                  </div>
                </div>

                <div class="sidebar-widget company-widget">
                  <div class="widget-content">
                    <div class="company-title">
                      <div class="company-logo"><img src="{{asset('storage/'.$data_job->company->logo)}}" alt=""></div>
                      <h5 class="company-name">{{$data_job->company->company_name}}</h5>
                      <a href="{{route('company-detail', ['id' => $data_job->id])}}" class="profile-link">View company profile</a>
                    </div>

                    <ul class="company-info">
                      <li>Primary industry: <span>{{$data_job->company->company_model}}</span></li>
                      <li>Company size: <span>{{$data_job->company->company_size}}</span></li>
                      <li>Founded in: <span>{{$data_job->company->founded_in}}</span></li>
                      <li>Phone: <span>{{$data_job->company->phone}}</span></li>
                      <li>Email: <span>{{$data_job->company->email}}</span></li>
                      <li>Location: <span>{{$data_job->company->address}}</span></li>
                      <li>Social media:
                        <div class="social-links">
                          <a href="#"><i class="fab fa-facebook-f"></i></a>
                          <a href="#"><i class="fab fa-twitter"></i></a>
                          <a href="#"><i class="fab fa-instagram"></i></a>
                          <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                      </li>
                    </ul>

                    <div class="btn-box"><a href="#" class="theme-btn btn-style-three">{{$data_job->company->link_web}}</a></div>
                  </div>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
