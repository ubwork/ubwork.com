@extends('client.layout.app')
@section('title')
    {{ __('UB Work') }}
@endsection
@section('content')
    <section class="banner-section">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInUp" data-wow-delay="1000ms">
                        <div class="title-box">
                            <h3>Có<span class="colored">{{ count($data) }}</span> Bài đăng ở đây<br>dành cho bạn</h3>
                            <div class="text">Tìm việc làm, Cơ hội việc làm & Nghề nghiệp</div>
                        </div>
                        <!-- Job Search Form -->
                        <div class="job-search-form">
                            <form method="get">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-5 col-md-12 col-sm-12">
                                        <span class="icon flaticon-search-1"></span>
                                        <input type="text" name="search"
                                            placeholder="Job title, keywords, or company">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-12 col-sm-12 btn-box">
                                        <button type="submit" class="theme-btn btn-style-one"><span class="btn-title">Find
                                                Jobs</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Job Search Form -->

                        <!-- Popular Search -->
                        <div class="popular-searches">
                            <span class="title">Popular Searches : </span>
                            <a href="#">Designer</a>,
                            <a href="#">Developer</a>,
                            <a href="#">Web</a>,
                            <a href="#">IOS</a>,
                            <a href="#">PHP</a>,
                            <a href="#">Senior</a>,
                            <a href="#">Engineer</a>,
                        </div>
                        <!-- End Popular Search -->
                    </div>
                </div>
                <div class="image-column col-lg-5 col-md-12">
                    <div class="image-box">
                        <figure class="main-image wow fadeIn animated" data-wow-delay="500ms"
                            style="visibility: visible; animation-delay: 500ms; animation-name: fadeIn;"><img
                                src="{{ asset('/assets/client-bower/images/resource/banner-img-1.png') }}" alt=""></figure>

                        <!-- Info BLock One -->
                        <div class="info_block anm wow fadeIn animated" data-wow-delay="1000ms" data-speed-x="2"
                            data-speed-y="2"
                            style="transform: translate3d(-4px, -7.36px, 0px) scale(1) rotate(0deg); opacity: 1; visibility: visible; animation-delay: 1000ms; animation-name: fadeIn;">
                            <span class="icon flaticon-email-3"></span>
                            <p>Work Inquiry From <br>Ali Tufan</p>
                        </div>

                        <!-- Info BLock Two -->
                        <div class="info_block_two anm wow fadeIn animated" data-wow-delay="2000ms" data-speed-x="1"
                            data-speed-y="1"
                            style="transform: translate3d(-2px, -3.68px, 0px) scale(1) rotate(0deg); opacity: 1; visibility: visible; animation-delay: 2000ms; animation-name: fadeIn;">
                            <p>10k+ Candidates</p>
                            <div class="image"><img src="{{ asset('/assets/client-bower/images/resource/multi-peoples.png') }}"
                                    alt=""></div>
                        </div>

                        <!-- Info BLock Three -->
                        <div class="info_block_three anm wow fadeIn animated" data-wow-delay="1500ms" data-speed-x="4"
                            data-speed-y="4"
                            style="transform: translate3d(-8px, -14.72px, 0px) scale(1) rotate(0deg); opacity: 1; visibility: visible; animation-delay: 1500ms; animation-name: fadeIn;">
                            <span class="icon flaticon-briefcase"></span>
                            <p>Creative Agency</p>
                            <span class="sub-text">Startup</span>
                            <span class="right_icon fa fa-check"></span>
                        </div>

                        <!-- Info BLock Four -->
                        <div class="info_block_four anm wow fadeIn animated" data-wow-delay="2500ms" data-speed-x="3"
                            data-speed-y="3"
                            style="transform: translate3d(-6px, -11.04px, 0px) scale(1) rotate(0deg); opacity: 1; visibility: visible; animation-delay: 2500ms; animation-name: fadeIn;">
                            <span class="icon flaticon-file"></span>
                            <div class="inner">
                                <p>Upload Your CV</p>
                                <span class="sub-text">It only takes a few seconds</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Section-->

    <!-- Job Categories -->
    <section class="job-categories">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Các chuyên ngành công việc phổ biến</h2>
                <div class="text">{{ $data != "" ? count($data) : 0 }} việc làm được đăng tải</div>
            </div>

            <div class="row wow fadeInUp">
                @foreach ($data_job_type as $item_job)
                    <!-- Category Block -->
                    <div class="category-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="content">
                                <span class="{{ $item_job->icon }}"></span>
                                <h4><a href="{{ route('job-cat', ['id' => $item_job->id]) }}">{{ $item_job->name }}</a></h4>
                                <p>( {{ $count[$item_job->id] }} bài đăng)</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Job Categories -->

    <!-- Job Section -->
    <section class="job-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Việc làm nổi bật</h2>
                <div class="text">Biết giá trị của bạn và tìm công việc phù hợp với cuộc sống của bạn
                </div>
                <div class="row wow fadeInUp">
                    <!-- Job Block -->
                    @foreach ($data as $item)
                        <div class="job-block col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-box">
                                <div class="content">
                                    <span class="company-logo"><img src="{{ asset('storage/' . $item->company->logo) }}" alt=""></span>
                                    <h4 style="text-align: left;"><a href="{{ route('job-detail', ['id' => $item->id]) }}">{{ $item->title }}</a>
                                    </h4>
                                    <ul class="job-info">
                                        <li><span class="icon flaticon-briefcase"></span>{{$item->major->name}}</li>
                                        <li><span class="icon flaticon-map-locator"></span>{{ $item->company->address }}
                                        </li>
                                        <li><span class="icon flaticon-clock-3"></span>{{ $item->company->working_time }}
                                            giờ</li>
                                        <li><span class="icon flaticon-money"></span> {{ $item->min_salary }} -
                                            {{ $item->max_salary }} đ</li>
                                    </ul>
                                    <ul class="job-other-info">
                                        @if($item->type_work == 1)
                                            <li class="time">
                                                Full Time
                                            </li>
                                        @endif
                                        @if($item->type_work == 2)
                                            <li class="privacy">
                                                Part Time
                                            </li>
                                        @endif
                                        @if($item->type_work == 0 )
                                            <li class="required">
                                                Intern
                                            </li>
                                        @endif
                                    </ul>
                                    @if (auth('candidate')->check()) 
                                        @if (!empty($job_short[$item->id]) )
                                            @if($job_short[$item->id]->job_post_id == $item->id)
                                            <a href="{{route('delete_shortlisted', ['id' => $job_short[$item->id]->id])}}" class="bookmark-btn" style="background-color: #f7941d;"><span class="flaticon-bookmark" style="color: white" ></span></a>
                                            @endif
                                        @else
                                            <a href="{{route('shortlisted', ['id' => $item->id])}}" class="bookmark-btn"><span class="flaticon-bookmark" style="color: white"></span></a>
                                        @endif
                                    @else
                                        <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="btn-box">
                    <a href="{{ route('job') }}" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Xem
                            thêm</span></a>
                </div>
            </div>
            @if (auth('candidate')->check()) 
                <div class="sec-title text-center">
                    <h2>Việc làm có thể phù hợp với bạn</h2>
                    <div class="text">Biết giá trị của bạn và tìm công việc phù hợp với cuộc sống của bạn
                    </div>

                    <div class="row wow fadeInUp">
                        <!-- Job Block -->
                        @foreach ($dataYour as $item)
                            <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-box">
                                    <div class="content">
                                        <span class="company-logo"><img src="{{ asset('storage/' . $item->company->logo) }}" alt=""></span>
                                        <h4 style="text-align: left;"><a href="{{ route('job-detail', ['id' => $item->id]) }}">{{ $item->title }}</a>
                                        </h4>
                                        <ul class="job-info">
                                            <li><span class="icon flaticon-briefcase"></span>{{$item->major->name}}</li>
                                            <li><span class="icon flaticon-map-locator"></span>{{ $item->company->address }}
                                            </li>
                                            <li><span class="icon flaticon-clock-3"></span>{{ $item->company->working_time }}
                                                giờ</li>
                                            <li><span class="icon flaticon-money"></span> {{ $item->min_salary }} -
                                                {{ $item->max_salary }} đ</li>
                                        </ul>
                                        <ul class="job-other-info">
                                            @if($item->company->type_work == 1)
                                                <li class="time">
                                                    Full Time
                                                </li>
                                            @endif
                                            @if($item->company->type_work == 2)
                                                <li class="privacy">
                                                    Part Time
                                                </li>
                                            @endif
                                            @if($item->company->type_work == 0 )
                                                <li class="required">
                                                    Intern
                                                </li>
                                            @endif
                                        </ul>
                                        @if (auth('candidate')->check()) 
                                        @if (!empty($job_short[$item->id]) )
                                            @if($job_short[$item->id]->job_post_id == $item->id)
                                            <a href="{{route('delete_shortlisted', ['id' => $job_short[$item->id]->id])}}" class="bookmark-btn" style="background-color: #f7941d;"><span class="flaticon-bookmark"style="color: white" ></span></a>
                                            @endif
                                        @else
                                            <a href="{{route('shortlisted', ['id' => $item->id])}}" class="bookmark-btn"><span class="flaticon-bookmark" ></span></a>
                                        @endif
                                    @else
                                        <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="btn-box">
                        <a href="{{ route('job') }}" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Xem
                                thêm</span></a>
                    </div>
                </div>
            @endif
    </section>
    <!-- End Job Section -->

@endsection
