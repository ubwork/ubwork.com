@extends('client.layout.app')
@section('title')
    {{__('UB work')}} | {{$company_detail->company_name}}
@endsection
@section('content')
    <section class="job-detail-section">
        <!-- Upper Box -->
        <div class="upper-box">
            <div class="auto-container">
                <!-- Job Block -->
                <div class="job-block-seven">
                    <div class="inner-box">
                        <div class="content">
                            <span class="company-logo"><img src="{{asset('storage/'.$company_detail->logo)}}" alt=""></span>
                            <h4><a href="#">{{$company_detail->company_name}}</a></h4>
                            <ul class="job-info">
                                <li><span class="icon flaticon-map-locator"></span> {{$company_detail->address}}</li>
                                <li><span class="icon flaticon-briefcase"></span> Accounting / Finance</li>
                                <li><span class="icon flaticon-telephone-1"></span>{{$company_detail->phone}}</li>
                                <li><span class="icon flaticon-mail"></span>{{$company_detail->email}}</li>
                            </ul>
                            <ul class="job-other-info">
                                <li class="time">Open Jobs – {{count($company_job)}}</li>
                            </ul>
                        </div>

                        <div class="btn-box">
                            @if (auth('candidate')->check()) 
                                <a href="{{route('feedback', ['id' => $company_detail->id])}}" class="theme-btn btn-style-one btn-fb">Feedback</a>
                                    <div class="modal">
                                        <div class="modal-content">
                                        <span class="close">&times;</span>
                                        <p>Modal Box</p>
                                        </div>
                                    </div>
                            @else
                                <button class="theme-btn btn-style-one">Feedback</button>
                            @endif

                            @if (auth('candidate')->check()) 
                                <button class="bookmark-btn"><i class="flaticon-bookmark"></i></button>
                            @else
                                <button class="bookmark-btn"><i class="flaticon-bookmark"></i></button>
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
                            <h4>About Company</h4>
                            <p>{{$company_detail->about}}
                            </p>
                            <div class="row images-outer">
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <figure class="image"><a href=""
                                            class="lightbox-image" data-fancybox="gallery"><img
                                                src="" alt=""></a></figure>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <figure class="image"><a href=""
                                            class="lightbox-image" data-fancybox="gallery"><img
                                                src="" alt=""></a></figure>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <figure class="image"><a href=""
                                            class="lightbox-image" data-fancybox="gallery"><img
                                                src="" alt=""></a></figure>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <figure class="image"><a href=""
                                            class="lightbox-image" data-fancybox="gallery"><img
                                                src="" alt=""></a></figure>
                                </div>
                            </div>
                            <p>Moody’s Corporation, often referred to as Moody’s, is an American business and financial
                                services company. It is the holding company for Moody’s Investors Service (MIS), an American
                                credit rating agency, and Moody’s Analytics (MA), an American provider of financial analysis
                                software and services.</p>
                            <p>Moody’s was founded by John Moody in 1909 to produce manuals of statistics related to stocks
                                and bonds and bond ratings. Moody’s was acquired by Dun & Bradstreet in 1962. In 2000, Dun &
                                Bradstreet spun off Moody’s Corporation as a separate company that was listed on the NYSE
                                under MCO. In 2007, Moody’s Corporation was split into two operating divisions, Moody’s
                                Investors Service, the rating agency, and Moody’s Analytics, with all of its other products.
                            </p>
                        </div>

                        <!-- Related Jobs -->
                        <div class="related-jobs">
                            <div class="title-box">
                                <h3>3 jobs at Invision</h3>
                                <div class="text">2020 jobs live - 293 added today.</div>
                            </div>

                            <!-- Job Block -->
                            @foreach ($company_job as $item)
                                <div class="job-block">
                                    <div class="inner-box">
                                        <div class="content">
                                        <span class="company-logo"><img src="{{asset('storage/'.$item->company->logo)}}" alt=""></span>
                                        <h4><a href="{{route('job-detail', ['id' => $item->id])}}">{{$item->title}}</a></h4>
                                        <ul class="job-info">
                                            <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                            <li><span class="icon flaticon-map-locator"></span>{{$item->company->address}}</li>
                                            <li><span class="icon flaticon-clock-3"></span>{{$item->company->working_time}}</li>
                                            <li><span class="icon flaticon-money"></span>{{number_format($item->min_salary)}} - {{number_format($item->max_salary)}}</li>
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
                                        <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar">
                            <div class="sidebar-widget company-widget">
                                <div class="widget-content">

                                    <ul class="company-info mt-0">
                                        <li class="rating-css">
                                            <label>Rating:</label>
                                            <div class="star-icon">
                                                <input type="radio" value="1" name="rate" checked id="rating1">
                                                <label for="rating1" class="fa fa-star"></label>
                                                <input type="radio" value="2" name="rate" id="rating2">
                                                <label for="rating2" class="fa fa-star"></label>
                                                <input type="radio" value="3" name="rate" id="rating3">
                                                <label for="rating3" class="fa fa-star"></label>
                                                <input type="radio" value="4" name="rate" id="rating4">
                                                <label for="rating4" class="fa fa-star"></label>
                                                <input type="radio" value="5" name="rate" id="rating5">
                                                <label for="rating5" class="fa fa-star"></label>
                                            </div>
                                        </li>
                                        @endif
                                        <li>Primary industry: <span>{{$company_detail->company_model}}</span></li>
                                        <li>Company size: <span>{{$company_detail->company_size}}</span></li>
                                        <li>Founded in: <span>{{$company_detail->founded_in}}</span></li>
                                        <li>Phone: <span>{{$company_detail->phone}}</span></li>
                                        <li>Email: <span>{{$company_detail->email}}</span></li>
                                        <li>Location: <span>{{$company_detail->address}}</span></li>
                                        <li>Social media:
                                            <div class="social-links">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </div>
                                        </li>
                                    </ul>

                                    <div class="btn-box"><a href="#"
                                            class="theme-btn btn-style-three">{{$company_detail->link_web}}</a></div>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <!-- Map Widget -->
                                <h4 class="widget-title">Job Location</h4>
                                <div class="widget-content">
                                    <div class="map-outer mb-0">
                                        <iframe class="map-canvas" width="100%" src="{{$company_detail->map}}" frameborder="0"></iframe>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@parent
<script src="{{asset('js/client/feedback.js')}}"></script>
@endsection