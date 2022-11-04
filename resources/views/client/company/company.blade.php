@extends('client.layout.app')
@section('title')
    {{ __('Company') }}
@endsection
@section('content')
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Companies</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Companies</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Listing Section -->
    <section class="ls-section">
        <div class="auto-container">
            <div class="filters-backdrop"></div>

            <div class="row">

                <!-- Filters Column -->
                <div class="filters-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column pd-right">
                        <div class="filters-outer">
                            <button type="button" class="theme-btn close-filters">X</button>

                            <!-- Filter Block -->
                            <div class="filter-block">
                                <h4>Search by Keywords</h4>
                                <div class="form-group">
                                    <input type="text" name="listing-search"
                                        placeholder="Job title, keywords, or company">
                                    <span class="icon flaticon-search-3"></span>
                                </div>
                            </div>

                            <!-- Filter Block -->
                            <div class="filter-block">
                                <h4>Location</h4>
                                <div class="form-group">
                                    <input type="text" name="listing-search" placeholder="City or postcode">
                                    <span class="icon flaticon-map-locator"></span>
                                </div>
                                {{-- <p>Radius around selected destination</p>
                <div class="range-slider-one">
                  <div class="area-range-slider"></div>
                  <div class="input-outer">
                    <div class="amount-outer"><span class="area-amount"></span>km</div>
                  </div>
                </div> --}}
                            </div>

                            <!-- Filter Block -->
                            <div class="filter-block">
                                <h4>Category</h4>
                                <div class="form-group">
                                    <select class="chosen-select">
                                        <option>Choose a category</option>
                                        <option>Residential</option>
                                        <option>Commercial</option>
                                        <option>Industrial</option>
                                        <option>Apartments</option>
                                    </select>
                                    <span class="icon flaticon-briefcase"></span>
                                </div>
                            </div>

                            <!-- Filter Block -->
                            <div class="filter-block">
                                <h4>Company Size</h4>
                                <div class="form-group">
                                    <select class="chosen-select">
                                        <option>1-100 Members</option>
                                        <option>100-200 Members</option>
                                        <option>200-500 Members</option>
                                        <option>500-1000 Members</option>
                                        <option>1000-10000 Members</option>
                                    </select>
                                    <span class="icon flaticon-briefcase"></span>
                                </div>
                            </div>

                            <!-- Filter Block -->
                            {{-- <div class="filter-block">
                <h4>Founded Date</h4>
                <div class="range-slider-one">
                  <div class="range-slider"></div>
                  <div class="input-outer">
                    <div class="amount-outer"><span class="count"></span></div>
                  </div>
                </div>
              </div> --}}

                        </div>

                        <!-- Call To Action -->
                        <div class="call-to-action-four">
                            <h5>Recruiting?</h5>
                            <p>Advertise your jobs to millions of monthly users and search 15.8 million CVs in our database.
                            </p>
                            <a href="#" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Start
                                    Recruiting Now</span></a>
                            <div class="image" style="background-image: url(images/resource/ads-bg-4.png);"></div>
                        </div>
                        <!-- End Call To Action -->
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="ls-outer">
                        <button type="button" class="theme-btn btn-style-two toggle-filters">Show Filters</button>

                        <!-- ls Switcher -->
                        <div class="ls-switcher">
                            <div class="showing-result">
                                <div class="text">Showing <strong>41-60</strong> of <strong>944</strong> employer</div>
                            </div>
                            <div class="sort-by">
                                <select class="chosen-select">
                                    <option>Most Recent</option>
                                    <option>Freelance</option>
                                    <option>Full Time</option>
                                    <option>Internship</option>
                                    <option>Part Time</option>
                                    <option>Temporary</option>
                                </select>

                                <select class="chosen-select">
                                    <option>Show 10</option>
                                    <option>Show 20</option>
                                    <option>Show 30</option>
                                    <option>Show 40</option>
                                    <option>Show 50</option>
                                    <option>Show 60</option>
                                </select>
                            </div>
                        </div>


                        <!-- Block Block -->
                        @foreach ($data as $item)
                            <div class="company-block-three">
                                <div class="inner-box">
                                    <div class="content">
                                        <div class="content-inner">
                                            <span class="company-logo"><img src="{{asset($item->logo)}}"
                                                    alt=""></span>
                                            <h4><a href="{{route('company-detail', ['id' => $item->id])}}">{{$item->company_name}}</a></h4>
                                            <ul class="job-info">
                                                <li><span class="icon flaticon-map-locator"></span>{{$item->address}}</li>
                                                <li><span class="icon flaticon-briefcase"></span> Accounting / Finance</li>
                                            </ul>
                                        </div>

                                        <ul class="job-other-info">
                                            <li class="privacy">Featured</li>
                                            <li class="time">Open Jobs – {{count($job)}}</li>
                                        </ul>
                                    </div>
                                    {{-- @dd($job) --}}
                                    <div class="text">Mô Tả Chưa Có</div>
                                    <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                </div>
                            </div>
                        @endforeach
                        <!-- Listing Show More -->
                        <div class="ls-show-more">
                            <p>Showing 36 of 497 Jobs</p>
                            <div class="bar"><span class="bar-inner" style="width: 40%"></span></div>
                            <button class="show-more">Show More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
