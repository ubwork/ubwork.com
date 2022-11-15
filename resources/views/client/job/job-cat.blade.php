@extends('client.layout.app')
@section('title')
    {{__('UB Work')}} | {{$job_cat->name}}
@endsection
@section('content')
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>{{$job_cat->name}}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="/">Trang chủ</a></li>
                    <li>Công việc</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="ls-section">
        <div class="auto-container">
            <div class="filters-backdrop"></div>
            <div class="row">
                {{-- <div class="filters-column hide-left">
                    <div class="inner-column">
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
                            <div class="switchbox-outer">
                                <h4>Job type</h4>
                                <ul class="switchbox">
                                    <li>
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                            <span class="title">Freelance</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                            <span class="title">Full Time</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                            <span class="title">Internship</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                            <span class="title">Part Time</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                            <span class="title">Temporary</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="checkbox-outer">
                                <h4>Date Posted</h4>
                                <ul class="checkboxes">
                                    <li>
                                        <input id="check-f" type="checkbox" name="check">
                                        <label for="check-f">All</label>
                                    </li>
                                    <li>
                                        <input id="check-a" type="checkbox" name="check">
                                        <label for="check-a">Last Hour</label>
                                    </li>
                                    <li>
                                        <input id="check-b" type="checkbox" name="check">
                                        <label for="check-b">Last 24 Hours</label>
                                    </li>
                                    <li>
                                        <input id="check-c" type="checkbox" name="check">
                                        <label for="check-c">Last 7 Days</label>
                                    </li>
                                    <li>
                                        <input id="check-d" type="checkbox" name="check">
                                        <label for="check-d">Last 14 Days</label>
                                    </li>
                                    <li>
                                        <input id="check-e" type="checkbox" name="check">
                                        <label for="check-e">Last 30 Days</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="checkbox-outer">
                                <h4>Experience Level</h4>
                                <ul class="checkboxes square">
                                    <li>
                                        <input id="check-ba" type="checkbox" name="check">
                                        <label for="check-ba">All</label>
                                    </li>
                                    <li>
                                        <input id="check-bb" type="checkbox" name="check">
                                        <label for="check-bb">Internship</label>
                                    </li>
                                    <li>
                                        <input id="check-bc" type="checkbox" name="check">
                                        <label for="check-bc">Entry level</label>
                                    </li>
                                    <li>
                                        <input id="check-bd" type="checkbox" name="check">
                                        <label for="check-bd">Associate</label>
                                    </li>
                                    <li>
                                        <input id="check-be" type="checkbox" name="check">
                                        <label for="check-be">Mid-Senior level4</label>
                                    </li>
                                    <li>
                                        <button class="view-more"><span class="icon flaticon-plus"></span> View
                                            More</button>
                                    </li>
                                </ul>
                            </div>
                            <!-- Filter Block -->
                            <div class="filter-block">
                                <h4>Tags</h4>
                                <ul class="tags-style-one">
                                    <li><a href="#">app</a></li>
                                    <li><a href="#">administrative</a></li>
                                    <li><a href="#">android</a></li>
                                    <li><a href="#">wordpress</a></li>
                                    <li><a href="#">design</a></li>
                                    <li><a href="#">react</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="content-column col-lg-12">
                    <div class="ls-outer">
                        <!-- ls Switcher -->
                        {{-- <div class="ls-switcher">
                            <div class="showing-result show-filters">
                                <button type="button" class="theme-btn toggle-filters"><span
                                        class="icon icon-filter"></span> Filter</button>
                                <div class="text">Showing <strong>41-60</strong> of <strong>944</strong> jobs</div>
                            </div>
                            <div class="sort-by">
                                <select class="chosen-select">
                                    <option>New Jobs</option>
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

                        <div class="row">
                            <!-- Job Block -->
                            @foreach ($data as $item)
                            <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-box">
                                    <div class="content">
                                        <span class="company-logo"><img src="{{asset('storage/'.$item->company->logo)}}"
                                                alt=""></span>
                                        <h4><a href="{{route('job-detail', ['id' => $item->id])}}">{{$item->title}}</a></h4>
                                        <ul class="job-info">
                                            <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                            <li><span class="icon flaticon-map-locator"></span>{{$item->company->address}}</li>
                                            <li><span class="icon flaticon-clock-3"></span>{{$item->company->working_time}}</li>
                                            <li><span class="icon flaticon-money"></span> {{$item->min_salary}} - {{$item->max_salary}}</li>
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
                                                @endif</li>
                                            {{-- <li class="required">Urgent</li> --}}
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

                        <!-- Pagination -->
                        <nav class="ls-pagination mb-5">
                            {{-- <ul>
                                <li class="prev"><a href="#"><i class="fa fa-arrow-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#" class="current-page">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#"><i class="fa fa-arrow-right"></i></a></li>
                            </ul> --}}
                            {{$data->links()}}
                        </nav>

                        <!-- Call To Action -->
                        <!-- End Call To Action -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection