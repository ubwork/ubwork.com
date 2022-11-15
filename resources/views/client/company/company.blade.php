@extends('client.layout.app')
@section('title')
    {{ __('UB Work') }} | {{ __('Danh sách Công ty') }}
@endsection
@section('content')
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Danh sách công ty</h1>
                <ul class="page-breadcrumb">
                    <li><a href="/">Trang chủ</a></li>
                    <li>Công ty</li>
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
                            <!-- Filter Block -->
                            <div class="filter-block">
                                <h4>Tìm Kiếm</h4>
                                <form action="" method="get">
                                    <div class="form-group">
                                        <input type="text" name="search"
                                            placeholder="Job title, keywords, or company">
                                        <span class="icon flaticon-search-3"></span>
                                    </div>
                                    <button style="margin:5px" type="submit" class="btn btn-danger">search</button>
                                </form>
                            </div>
                        </div>

                        <!-- Call To Action -->
                        <div class="call-to-action-four">
                            <h5>Tuyển dụng?</h5>
                            <p>Quảng cáo công việc của bạn cho hàng triệu người dùng hàng tháng và tìm kiếm 15,8 triệu CV
                                trong cơ sở dữ liệu của chúng tôi.
                            </p>
                            <a href="#" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Bắt đầu tuyển
                                    dụng.</span></a>
                            <div class="image" style="background-image: url(images/resource/ads-bg-4.png);"></div>
                        </div>
                            <form action="{{route('company-filter')}}" method="post">
                                @csrf
                                <div class="filter-block">
                                <h4>Tìm theo tên</h4>
                                <div class="form-group">
                                    <input type="text" name="keyword"
                                        placeholder="Tên công ty">
                                    <span class="icon flaticon-search-3"></span>
                                </div>
                            </div>

                            <!-- Filter Block -->
                            <div class="filter-block">
                                <h4>Tìm theo địa điểm</h4>
                                <div class="form-group">
                                    <input type="text" name="address" placeholder="Thành phố">
                                    <span class="icon flaticon-map-locator"></span>
                                </div>
                            </div>
                            <div class="form-group col-lg-3 col-md-12 col-sm-12 btn-box">
                                <button type="submit" class="theme-btn btn-style-one"><span class="btn-title">Tìm
                                        công ty</span></button>
                            </div>
                            </form>
                        </div>

                        <!-- End Call To Action -->
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="ls-outer">
                        <button type="button" class="theme-btn btn-style-two toggle-filters">Show Filters</button>

                        <!-- ls Switcher -->
                        {{-- <div class="ls-switcher">
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
                        </div> --}}


                        <!-- Block Block -->
                        @foreach ($data as $item)
                            <div class="company-block-three">
                                <div class="inner-box">
                                    <div class="content">
                                        <div class="content-inner">
                                            <span class="company-logo"><img src="{{ asset('storage/' . $item->logo) }}"
                                                    alt=""></span>
                                            <h4><a
                                                    href="{{ route('company-detail', ['id' => $item->id]) }}">{{ $item->company_name }}</a>
                                            </h4>
                                            <ul class="job-info">
                                                <li><span class="icon flaticon-map-locator"></span>{{ $item->address }}</li>
                                                <li><span class="icon flaticon-briefcase"></span> Accounting / Finance</li>
                                            </ul>
                                        </div>

                                        <ul class="job-other-info">
                                            <li class="privacy">Featured</li>
                                            <li class="time">Open Jobs – {{ count($job) }}</li>
                                            {{-- <li class="time">Open Jobs – {{count($job)}}</li> --}}
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
                            {{-- <p>Showing 36 of 497 Jobs</p>
                            <div class="bar"><span class="bar-inner" style="width: 40%"></span></div>
                            <button class="show-more">Xem thêm</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection