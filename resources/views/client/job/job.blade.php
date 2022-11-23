@extends('client.layout.app')
@section('title')
    {{ __('UB Work') }} | {{ __('Danh sách công việc') }}
@endsection
@section('content')
<style>
    .page-link{
        border-radius:50%;
        padding: 0px;
    }
    .page-item:last-child .page-link{
        border-top-right-radius: 50%;
        border-bottom-right-radius: 50%;
    }
    .page-item:first-child .page-link{
        border-top-left-radius: 50%;
        border-bottom-left-radius: 50%;
    }
</style>
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Danh sách công việc </h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Trang chủ</a></li>
                    <li>Công việc</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="ls-section">
        <div class="auto-container">
            <div class="filters-backdrop"></div>
            <div class="row">
                <div class="job-search-form">
                    <form method="get" action="job-search">
                        <div class="row">
                            <!-- Form Group -->
                            <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                <span class="icon flaticon-search-1"></span>
                                <input type="text" class="form-control search-input" name="search" placeholder="Mời Nhập Từ Khóa">
                            </div>
                            <div class="form-group col-lg-3 col-md-12 col-sm-12">
                                <span class="icon fa fa-history"></span>
                                <select name="type" id="" class="chosen-select">
                                    <option value="">Mời Chọn</option>
                                    <option value="1">Intern</option>
                                    <option value="2">Part Time</option>
                                    <option value="3">Full Time</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3 col-md-12 col-sm-12">
                                <span class="icon flaticon-briefcase"></span>
                                <select name="major" class="chosen-select">
                                    <option value="">Chuyên Ngành</option>
                                    @foreach ($maJor as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Form Group -->
                            <div class="form-group col-lg-2 col-md-12 col-sm-12 text-right">
                                <button type="submit" class="theme-btn btn-style-one">Tìm Kiếm</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="content-column col-lg-12">
                    <div class="ls-outer">
                        <div class="row">
                            <!-- Job Block -->
                            @foreach ($data as $item)
                                @php
                                    $end_time = strtotime($item->end_date); // thời gian kết thúc
                                    $total = $end_time - $today;
                                    $day = floor($total / 60 / 60 / 24);
                                    $start_time = strtotime($item->start_date);
                                    $days = floor(($today - $start_time) / 60 / 60 / 24);
                                @endphp
                                @if (!empty($jobspeed))
                                    @if ($days > 5 || $day <= 0)
                                        <div class="job-block col-lg-6 col-md-12 col-sm-12" hidden>

                                            <div class="inner-box">
                                                <div class="content">
                                                    <span class="company-logo"><img
                                                            src="{{ asset('storage/' . $item->company->logo) }}"
                                                            alt=""></span>
                                                    <h4><a
                                                            href="{{ route('job-detail', ['id' => $item->id]) }}">{{ $item->title }}</a>
                                                    </h4>
                                                    <ul class="job-info">
                                                        <li><span
                                                                class="icon flaticon-briefcase"></span>{{ $item->major->name }}
                                                        </li>
                                                        <li><span
                                                                class="icon flaticon-map-locator"></span>{{ $item->company->address }}
                                                        </li>
                                                        <li><span
                                                                class="icon flaticon-clock-3"></span>{{ $item->company->working_time }}
                                                        </li>
                                                        <li><span class="icon flaticon-money"></span>
                                                            {{ $item->min_salary }} -
                                                            {{ $item->max_salary }}</li>

                                                        <li><i class="icon flaticon-clock-3"></i><span>
                                                                @if ($day < 0)
                                                                    <b>Hết hạn.</b>
                                                                @else
                                                                    <b>Còn lại {{ $day }} ngày.</b>
                                                                @endif
                                                            </span>

                                                        </li>
                                                    </ul>
                                                    <ul class="job-other-info">
                                                        <li class="time">
                                                            @if ($item->full_time == 1)
                                                                Full Time
                                                            @endif
                                                        </li>
                                                        <li class="privacy">
                                                            @if ($item->part_time == 1)
                                                                Part Time
                                                            @endif
                                                        </li>
                                                        {{-- <li class="required">Urgent</li> --}}
                                                    </ul>
                                                    @if (auth('candidate')->check())
                                                        <a href="{{ route('shortlisted', ['id' => $item->id]) }}"><button
                                                                class="bookmark-btn"><span
                                                                    class="flaticon-bookmark"></span></button></a>
                                                    @else
                                                        <button class="bookmark-btn"><span
                                                                class="flaticon-bookmark"></span></button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                            <div class="inner-box">
                                                <div class="content">
                                                    <span class="company-logo"><img
                                                            src="{{ asset('storage/' . $item->company->logo) }}"
                                                            alt=""></span>
                                                    <h4><a
                                                            href="{{ route('job-detail', ['id' => $item->id]) }}">{{ $item->title }}</a>
                                                    </h4>
                                                    <ul class="job-info">
                                                        <li><span
                                                                class="icon flaticon-briefcase"></span>{{ $item->major->name }}
                                                        </li>
                                                        <li><span
                                                                class="icon flaticon-map-locator"></span>{{ $item->company->address }}
                                                        </li>
                                                        <li><span
                                                                class="icon flaticon-clock-3"></span>{{ $item->company->working_time }}
                                                        </li>
                                                        <li><span class="icon flaticon-money"></span>
                                                            {{ $item->min_salary }} -
                                                            {{ $item->max_salary }}</li>

                                                        <li><i class="icon flaticon-clock-3"></i><span>
                                                                @if ($day < 0)
                                                                    <b>Hết hạn.</b>
                                                                @else
                                                                    <b>Còn lại {{ $day }} ngày.</b>
                                                                @endif
                                                            </span>

                                                        </li>
                                                    </ul>
                                                    <ul class="job-other-info">
                                                        <li class="time">
                                                            @if ($item->full_time == 1)
                                                                Full Time
                                                            @endif
                                                        </li>
                                                        <li class="privacy">
                                                            @if ($item->part_time == 1)
                                                                Part Time
                                                            @endif
                                                        </li>
                                                        {{-- <li class="required">Urgent</li> --}}
                                                    </ul>
                                                    @if (auth('candidate')->check())
                                                        <a href="{{ route('shortlisted', ['id' => $item->id]) }}"><button
                                                                class="bookmark-btn"><span
                                                                    class="flaticon-bookmark"></span></button></a>
                                                    @else
                                                        <button class="bookmark-btn"><span
                                                                class="flaticon-bookmark"></span></button>
                                                    @endif
                                                </li>
                                                {{-- <li class="required">Urgent</li> --}}
                                            </ul>
                                            @if (auth('candidate')->check())
                                                <a href="{{ route('shortlisted', ['id' => $item->id]) }}"><button
                                                        class="bookmark-btn"><span
                                                            class="flaticon-bookmark"></span></button></a>
                                            @else
                                                <button class="bookmark-btn"><span
                                                        class="flaticon-bookmark"></span></button>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <nav class="ls-pagination mb-5">
                            {{-- <ul>
                                <li class="prev"><a href="#"><i class="fa fa-arrow-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#" class="current-page">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#"><i class="fa fa-arrow-right"></i></a></li>
                            </ul> --}}
                            {{ $data->links() }}
                        </nav>

                        <!-- Call To Action -->
                        <div class="call-to-action-four style-two">
                            <h5>Recruiting?</h5>
                            <p>Advertise your jobs to millions of monthly users and search 15.8 million <br>CVs in our
                                database.</p>
                            <a href="#" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Start
                                    Recruiting Now</span></a>
                            <div class="image" style="background-image: url(images/resource/ads-bg-4.png);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
