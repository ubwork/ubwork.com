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
                            <h3>Có<span class="colored">{{ count($total) }}</span> Bài đăng ở đây<br>dành cho bạn</h3>
                            <div class="text">Tìm việc làm, Cơ hội việc làm & Nghề nghiệp</div>
                        </div>
                        <!-- Job Search Form -->
                        <div class="job-search-form">
                            <form method="post" action="https://creativelayers.net/themes/superio/job-list-v10.html">
                                <div class="row">
                                    <div class="form-group col-lg-5 col-md-12 col-sm-12">
                                        <span class="icon flaticon-search-1"></span>
                                        <input type="text" name="field_name"
                                            placeholder="Job title, keywords, or company">
                                    </div>
                                    <!-- Form Group -->
                                    {{-- <div class="form-group col-lg-4 col-md-12 col-sm-12 location">
                                        <span class="icon flaticon-map-locator"></span>
                                        <input type="text" name="field_name" placeholder="City or postcode">
                                    </div> --}}
                                    <!-- Form Group -->
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
                                src="{{ asset('storage/' . 'images/banner-img-1.png') }}" alt=""></figure>

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
                            <div class="image"><img src="{{ asset('storage/' . 'images/1667320257_multi-logo.png') }}"
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
                <div class="text">Năm 2020 - {{ count($total) }} việc làm được đăng tải</div>
            </div>

            <div class="row wow fadeInUp">
                @foreach ($data_job_type as $item_job)
                    <!-- Category Block -->
                    <div class="category-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="content">
                                <span class="{{ $item_job->icon }}"></span>
                                <h4><a href="{{ route('job-cat', ['id' => $item_job->id]) }}">{{ $item_job->name }}</a></h4>
                                <p>( {{ $count[$item_job->id] }} bài đăng.)</p>
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
                <h2>Việc làm nổi bật.</h2>
                <div class="text">Biết giá trị của bạn và tìm công việc phù hợp với cuộc sống của bạn./div>
                </div>

                <div class="row wow fadeInUp">
                    <!-- Job Block -->
                    @foreach ($data as $item)
                        {{-- @dd($item); --}}
                        {{-- @dd($item->company->company_name); --}}
                        <div class="job-block col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-box">
                                <div class="content">
                                    <span class="company-logo"><img src="{{ asset('storage/' . $item->company->logo) }}"
                                            alt=""></span>
                                    <h4><a href="{{ route('job-detail', ['id' => $item->id]) }}">{{ $item->title }}</a>
                                    </h4>
                                    <ul class="job-info">
                                        <li><span class="icon flaticon-map-locator"></span>{{ $item->company->address }}
                                        </li>
                                        <li><span class="icon flaticon-clock-3"></span>{{ $item->company->working_time }}
                                            giờ</li>
                                        <li><span class="icon flaticon-money"></span> {{ $item->min_salary }} -
                                            {{ $item->max_salary }} đ</li>
                                    </ul>
                                    <ul class="job-other-info">
                                        @if ($item->full_time == 1)
                                            <li class="time">
                                                Full Time
                                            </li>
                                        @endif
                                        @if ($item->part_time == 1)
                                            <li class="privacy">
                                                Part Time </li>
                                        @endif
                                        {{-- <li class="required">Urgent</li> --}}
                                    </ul>
                                    @if (auth('candidate')->check())
                                        <a href="{{ route('shortlisted', ['id' => $item->id]) }}"><button
                                                class="bookmark-btn"><span class="flaticon-bookmark"></span></button></a>
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
    </section>
    <!-- End Job Section -->

    <!-- Testimonial Section -->
    {{-- <section class="testimonial-section">
        <div class="container-fluid">
            <!-- Sec Title -->
            <div class="sec-title text-center">
                <h2>Testimonials From Our Customers</h2>
                <div class="text">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor</div>
            </div>

            <div class="carousel-outer wow fadeInUp">

                <!-- Testimonial Carousel -->
                <div class="testimonial-carousel owl-carousel owl-theme">

                    <!--Testimonial Block -->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <h4 class="title">Good theme</h4>
                            <div class="text">Without JobHunt i’d be homeless, they found me a job and got me
                                sorted out quickly with everything! Can’t quite… The Mitech team works really hard
                                to ensure high level of quality</div>
                            <div class="info-box">
                                <div class="thumb"><img src="" alt="">
                                </div>
                                <h4 class="name">Nicole Wells</h4>
                                <span class="designation">Web Developer</span>
                            </div>
                        </div>
                    </div>

                    <!--Testimonial Block -->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <h4 class="title">Great quality!</h4>
                            <div class="text">Without JobHunt i’d be homeless, they found me a job and got me
                                sorted out quickly with everything! Can’t quite… The Mitech team works really hard
                                to ensure high level of quality</div>
                            <div class="info-box">
                                <div class="thumb"><img src="" alt="">
                                </div>
                                <h4 class="name">Gabriel Nolan</h4>
                                <span class="designation">Consultant</span>
                            </div>
                        </div>
                    </div>

                    <!--Testimonial Block -->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <h4 class="title">Awesome Design </h4>
                            <div class="text">Without JobHunt i’d be homeless, they found me a job and got me
                                sorted out quickly with everything! Can’t quite… The Mitech team works really hard
                                to ensure high level of quality</div>
                            <div class="info-box">
                                <div class="thumb"><img src="" alt="">
                                </div>
                                <h4 class="name">Ashley Jenkins</h4>
                                <span class="designation">Designer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End Testimonial Section -->

    <!--Clients Section-->
    {{-- <section class="clients-section">
        <div class="sponsors-outer wow fadeInUp">
            <!--Sponsors Carousel-->
            <ul class="sponsors-carousel owl-carousel owl-theme">
                <li class="slide-item">
                    <figure class="image-box"><a href="#"><img src="" alt=""></a>
                    </figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box"><a href="#"><img src="" alt=""></a>
                    </figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box"><a href="#"><img src="" alt=""></a>
                    </figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box"><a href="#"><img src="" alt=""></a>
                    </figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box"><a href="#"><img src="" alt=""></a>
                    </figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box"><a href="#"><img src="" alt=""></a>
                    </figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box"><a href="#"><img src="" alt=""></a>
                    </figure>
                </li>
            </ul>
        </div>
    </section> --}}
    <!-- End Clients Section-->

    <!-- About Section -->
    {{-- <section class="about-section">
        <div class="auto-container">
            <div class="row">
                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                    <div class="inner-column wow fadeInUp">
                        <div class="sec-title">
                            <h2>Millions of Jobs. Find the one that suits you.</h2>
                            <div class="text">Search all the open positions on the web. Get your own personalized
                                salary estimate. Read reviews on over 600,000 companies worldwide.</div>
                        </div>
                        <ul class="list-style-one">
                            <li>Bring to the table win-win survival</li>
                            <li>Capitalize on low hanging fruit to identify</li>
                            <li>But I must explain to you how all this</li>
                        </ul>
                        <a href="#" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Get
                                Started</span></a>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <figure class="image wow fadeInLeft">
                        <img src="{{asset('storage/'.'images/1667319992_image-2.jpg')}}" alt="">
                    </figure>

                    <div class="count-employers wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="check-box"><span class="flaticon-tick"></span></div>
                    <span class="title">300k+ Employers</span>
                    <figure class="image"><img src="{{asset('storage/'.'images/1667320257_multi-logo.png')}}" alt=""></figure>
            </div>
                </div>
            </div>


            <!-- Fun Fact Section -->
            <div class="fun-fact-section">
                <div class="row">
                    <!--Column-->
                    <div class="counter-column col-lg-4 col-md-4 col-sm-12 wow fadeInUp">
                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="4">0</span>M</div>
                        <h4 class="counter-title">4 million daily active users</h4>
                    </div>

                    <!--Column-->
                    <div class="counter-column col-lg-4 col-md-4 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="12">0</span>k</div>
                        <h4 class="counter-title">Over 12k open job positions</h4>
                    </div>

                    <!--Column-->
                    <div class="counter-column col-lg-4 col-md-4 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="20">0</span>M</div>
                        <h4 class="counter-title">Over 20 million stories shared</h4>
                    </div>
                </div>
            </div>
            <!-- Fun Fact Section -->
        </div>
    </section> --}}
    <!-- End About Section -->

    <!-- News Section -->
    {{-- <section class="news-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Recent News Articles</h2>
                <div class="text">Fresh job related news content posted each day.</div>
            </div>

            <div class="row wow fadeInUp">
                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="" alt="" />
                            </figure>
                        </div>
                        <div class="lower-content">
                            <ul class="post-meta">
                                <li><a href="#">August 31, 2021</a></li>
                                <li><a href="#">12 Comment</a></li>
                            </ul>
                            <h3><a href="blog-single.html">Attract Sales And Profits</a></h3>
                            <p class="text">A job ravenously while Far much that one rank beheld after
                                outside....</p>
                            <a href="#" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="" alt="" />
                            </figure>
                        </div>
                        <div class="lower-content">
                            <ul class="post-meta">
                                <li><a href="#">August 31, 2021</a></li>
                                <li><a href="#">12 Comment</a></li>
                            </ul>
                            <h3><a href="blog-single.html">5 Tips For Your Job Interviews</a></h3>
                            <p class="text">A job ravenously while Far much that one rank beheld after
                                outside....</p>
                            <a href="#" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="" alt="" />
                            </figure>
                        </div>
                        <div class="lower-content">
                            <ul class="post-meta">
                                <li><a href="#">August 31, 2021</a></li>
                                <li><a href="#">12 Comment</a></li>
                            </ul>
                            <h3><a href="blog-single.html">An Overworked Newspaper Editor</a></h3>
                            <p class="text">A job ravenously while Far much that one rank beheld after
                                outside....</p>
                            <a href="#" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End News Section -->

    <!-- App Section -->
    {{-- <section class="app-section">
        <div class="auto-container">
            <div class="row">
                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="bg-shape"></div>
                    <figure class="image wow fadeInLeft"><img src="" alt="">
                    </figure>
                </div>

                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInRight">
                        <div class="sec-title">
                            <span class="sub-title">DOWNLOAD & ENJOY</span>
                            <h2>Get the Superio Job<br> Search App</h2>
                            <div class="text">Search through millions of jobs and find the right fit. Simply<br>
                                swipe right to apply.</div>
                        </div>
                        <div class="download-btn">
                            <a href="#"><img src="" alt=""></a>
                            <a href="#"><img src="" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End App Section -->

    <!-- Call To Action -->
    <section class="call-to-action">
        <div class="auto-container">
            <div class="outer-box wow fadeInUp">
                <div class="content-column">
                    <div class="sec-title">
                        <h2>Recruiting?</h2>
                        <div class="text">Advertise your jobs to millions of monthly users and search 15.8
                            million<br> CVs in our database.</div>
                        <a href="#" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Start
                                Recruiting Now</span></a>
                    </div>
                </div>

                <div class="image-column" style="">
                    <figure class="image"><img src="" alt=""></figure>
                </div>
            </div>
        </div>
    </section>
@endsection
