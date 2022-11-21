@extends('client.layout.app')
@section('title')
    {{ __('UB Work') }} | {{ __('Danh sách Công ty') }}
@endsection
@section('content')
<style>
    .page-link{
        border-radius: 50%;
        padding: 5px 15px;
        margin: 10px;
    }
    .page-link:hover{
            background-color: #C46F01;
        }
    .page-item:last-child .page-link{
        border-top-right-radius: 50%;
         padding: 5px 17px;
        border-bottom-right-radius: 50%;
    }
    .page-item:first-child .page-link{
        border-top-left-radius: 50%;
         padding: 5px 17px;
        border-bottom-left-radius: 50%;
    }
</style>
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
                        <form action="" method="get">
                            <div class="filter-block">
                                <h4>Tìm theo tên</h4>
                                <div class="form-group">
                                    <input type="text" name="search" placeholder="Tên công ty">
                                    <span class="icon flaticon-search-3"></span>
                                </div>
                            </div>
                            <div class="filter-block">
                                <h4>Quy mô công ty</h4>
                                <div class="form-group">
                                    <select name="size" class="chosen-select">
                                        <option value="">Mời Chọn</option>
                                        <option value="1">1-50 Nhân viên</option>
                                        <option value="2" >50-100 Nhân Viên</option>
                                        <option value="3" >100-200 Nhân Viên</option>
                                        <option value="4" >200-500 Nhân Viên</option>
                                        <option value="5" >500-1000 Nhân Viên</option>
                                    </select>
                                    <span class="icon flaticon-briefcase"></span>
                                </div>
                            </div>
                            <div class="filter-block">
                                <h4>Tìm theo địa điểm</h4>
                                <div class="form-group">
                                    <input type="text" name="address" placeholder="Địa điểm">
                                    <span class="icon flaticon-search-3"></span>
                                </div>
                            </div>
                            <div class="form-group col-lg-3 col-md-12 col-sm-12 btn-box">
                                <button type="submit" class="theme-btn btn-style-one"><span class="btn-title">Tìm
                                        công ty</span></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="ls-outer">
                        <button type="button" class="theme-btn btn-style-two toggle-filters">Show Filters</button>
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
                                                <li><span class="icon flaticon-briefcase"></span>{{ $item->company_model }}</li>
                                                <li><span class="icon flaticon-clock-3"></span>{{$item->working_time}}</li>
                                            </ul>
                                        </div>

                                        <ul class="job-other-info">
                                            <li class="time">Công việc – {{ count($job) }}</li>
                                            {{-- <li class="time">Open Jobs – {{count($job)}}</li> --}}
                                        </ul>
                                    </div>
                                    {{-- @dd($job) --}}
                                    <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                </div>
                            </div>
                        @endforeach
                        <!-- Listing Show More -->
                        <div class="ls-show-more">
                            {{-- <p>Showing 36 of 497 Jobs</p>
                            <div class="bar"><span class="bar-inner" style="width: 40%"></span></div>
                            <button class="show-more">Xem thêm</button> --}}
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
