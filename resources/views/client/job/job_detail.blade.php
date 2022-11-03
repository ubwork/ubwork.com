@extends('client.layout.app')
@section('title')
    {{__('Job Detail')}}
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
                <span class="company-logo"><img src="{{asset('storage/'.$job_detail->company->logo)}}"></span>
                <h4><a href="{{route('show', ['id' => $job_detail->id])}}">{{$job_detail->title}}</a></h4>
                <ul class="job-info">
                  <li><span class="icon flaticon-briefcase"></span> Segment</li>
                  <li><span class="icon flaticon-map-locator"></span>{{$job_detail->company->address}}</li>
                  <li><span class="icon flaticon-clock-3"></span>{{$job_detail->company->working_time}}</li>
                  <li><span class="icon flaticon-money"></span> {{number_format($job_detail->min_salary)}} - {{number_format($job_detail->max_salary)}}</li>
                </ul>
                <ul class="job-other-info">
                    <li class="time">
                        @if($job_detail->full_time == 1)
                            Full Time
                        @endif
                    </li>
                    <li class="privacy">
                        @if($job_detail->part_time == 1)
                            Part Time
                        @endif
                    </li>
                    <li class="required">
                        @if($job_detail->full_time == 1 && $job_detail->part_time == 1 )
                           Full Time / Part Time
                        @endif
                    </li>
                </ul>
              </div>

              <div class="btn-box">
                <a href="#" class="theme-btn btn-style-one">Apply For Job</a>
                <button class="bookmark-btn"><i class="flaticon-bookmark"></i></button>
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
                <p>{{ $job_detail->description}}</p>
                <h4>Key Responsibilities</h4>
                <ul class="list-style-three">
                  {{ $job_detail->requirement}}
                </ul>
                <h4>Skill & Experience</h4>
                <ul class="list-style-three">
                  <li>{{ $job_detail->experience}}
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
                @foreach ($job as $item)
                    <div class="job-block">
                        <div class="inner-box">
                            <div class="content">
                            <span class="company-logo"><img src="{{asset('storage/'.$item->company->logo)}}" alt=""></span>
                            <h4><a href="{{route('show', ['id' => $item->id])}}">{{$item->title}}</a></h4>
                            <ul class="job-info">
                                <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                <li><span class="icon flaticon-map-locator"></span>{{$item->company->address}}</li>
                                <li><span class="icon flaticon-clock-3"></span>{{$item->company->working_time}}</li>
                                <li><span class="icon flaticon-money"></span>{{number_format($item->min_salary)}} - {{number_format($job_detail->max_salary)}}</li>
                            </ul>
                            <ul class="job-other-info">
                                <li class="time">
                                    @if($item->full_time == 1)
                                        Full Time
                                    @endif
                                </li>
                                <li class="privacy">
                                    @if($item->part_time == 1)
                                        Part Time
                                    @endif
                                </li>
                                <li class="required">
                                    @if($item->full_time == 1 && $item->part_time == 1 )
                                    Full Time / Part Time
                                    @endif
                                </li>
                            </ul>
                            <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
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
                        <span>{{$job_detail->start_date}}</span>
                      </li>
                      <li>
                        <i class="icon icon-expiry"></i>
                        <h5>Expiration date:</h5>
                        <span>{{$job_detail->end_date}}</span>
                      </li>
                      <li>
                        <i class="icon icon-location"></i>
                        <h5>Location:</h5>
                        <span>{{$job_detail->company->address}}</span>
                      </li>
                      <li>
                        <i class="icon icon-user-2"></i>
                        <h5>Job Title:</h5>
                        <span>{{$job_detail->title}}</span>
                      </li>
                      <li>
                        <i class="icon icon-clock"></i>
                        <h5>Hours:</h5>
                        <span>{{$job_detail->company->working_time}}</span>
                      </li>
                      <li>
                        <i class="icon icon-rate"></i>
                        <h5>Rate:</h5>
                        <span>{{number_format($job_detail->min_salary/8/27)}} - {{number_format($job_detail->max_salary/8/27)}}$ / hour</span>
                      </li>
                      <li>
                        <i class="icon icon-salary"></i>
                        <h5>Salary:</h5>
                        <span>{{number_format($job_detail->min_salary)}} - {{number_format($job_detail->max_salary)}}$</span>
                      </li>
                    </ul>
                  </div>

                  <!-- Map Widget -->
                  <h4 class="widget-title">Job Location</h4>
                  <div class="widget-content">
                    <div class="map-outer">
                      <div class="map-canvas">
                        <iframe class="map-canvas" width="100%" src="{{$job_detail->company->map}}" frameborder="0"></iframe>
                      </div>
                    </div>
                  </div>

                  <!-- Job Skills -->
                  <h4 class="widget-title">Job Skills</h4>
                  <div class="widget-content">
                    <ul class="job-skills">
                      @foreach($job_skills as $item)
                      <li><a href="#">{{$item->name}}</a></li>
                      @endforeach
                    </ul>
                  </div>
                </div>

                <div class="sidebar-widget company-widget">
                  <div class="widget-content">
                    <div class="company-title">
                      <div class="company-logo"><img src="{{asset('storage/'.$job_detail->company->logo)}}" alt=""></div>
                      <h5 class="company-name">{{$job_detail->company->company_name}}</h5>
                      <a href="#" class="profile-link">View company profile</a>
                    </div>

                    <ul class="company-info">
                      <li>Primary industry: <span>{{$job_detail->company->company_model}}</span></li>
                      <li>Company size: <span>{{$job_detail->company->company_size}}</span></li>
                      <li>Founded in: <span>{{$job_detail->company->founded_in}}</span></li>
                      <li>Phone: <span>{{$job_detail->company->phone}}</span></li>
                      <li>Email: <span>{{$job_detail->company->email}}</span></li>
                      <li>Location: <span>{{$job_detail->company->address}}</span></li>
                      <li>Social media:
                        <div class="social-links">
                          <a href="#"><i class="fab fa-facebook-f"></i></a>
                          <a href="#"><i class="fab fa-twitter"></i></a>
                          <a href="#"><i class="fab fa-instagram"></i></a>
                          <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                      </li>
                    </ul>

                    <div class="btn-box"><a href="#" class="theme-btn btn-style-three">{{$job_detail->company->link_web}}</a></div>
                  </div>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
