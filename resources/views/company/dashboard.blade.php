@extends('company.layout.app')
@section('content')
    <div class="row">
        <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item">
                <div class="left">
                    <i class="icon flaticon-briefcase"></i>
                </div>
                <div class="right">
                    <h4>{{$JobPost->count()}}</h4>
                    <p>Tin tuyển dụng</p>
                </div>
            </div>
        </div>
        <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item ui-red">
                <div class="left">
                    <i class="icon la la-file-invoice"></i>
                </div>
                <div class="right">
                    <h4>{{$Applied}}</h4>
                    <p>Ứng tuyển</p>
                </div>
            </div>
        </div>
        {{-- <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item ui-yellow">
                <div class="left">
                    <i class="icon la la-comment-o"></i>
                </div>
                <div class="right">
                    <h4>74</h4>
                    <p>Messages</p>
                </div>
            </div>
        </div>
        <div class="ui-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="ui-item ui-green">
                <div class="left">
                    <i class="icon la la-bookmark-o"></i>
                </div>
                <div class="right">
                    <h4>32</h4>
                    <p>Shortlist</p>
                </div>
            </div>
        </div> --}}
    </div>
    {{-- <div class="row">
        <div class="col-lg-12">
            <!-- applicants Widget -->
            <div class="applicants-widget ls-widget">
                <div class="widget-title">
                    <h4>Recent Applicants</h4>
                </div>
                <div class="widget-content">
                    <div class="row">
                        <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-box">
                                <div class="content">
                                    <figure class="image"><img src="images/resource/candidate-1.png" alt="">
                                    </figure>
                                    <h4 class="name"><a href="#">Darlene Robertson</a></h4>
                                    <ul class="candidate-info">
                                        <li class="designation">UI Designer</li>
                                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                        <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                    </ul>
                                    <ul class="post-tags">
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Digital</a></li>
                                    </ul>
                                </div>
                                <div class="option-box">
                                    <ul class="option-list">
                                        <li><button data-text="View Aplication"><span class="la la-eye"></span></button>
                                        </li>
                                        <li><button data-text="Approve Aplication"><span
                                                    class="la la-check"></span></button></li>
                                        <li><button data-text="Reject Aplication"><span
                                                    class="la la-times-circle"></span></button></li>
                                        <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-box">
                                <div class="content">
                                    <figure class="image"><img src="images/resource/candidate-2.png" alt="">
                                    </figure>
                                    <h4 class="name"><a href="#">Wade Warren</a></h4>
                                    <ul class="candidate-info">
                                        <li class="designation">UI Designer</li>
                                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                        <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                    </ul>
                                    <ul class="post-tags">
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Digital</a></li>
                                    </ul>
                                </div>
                                <div class="option-box">
                                    <ul class="option-list">
                                        <li><button data-text="View Aplication"><span class="la la-eye"></span></button>
                                        </li>
                                        <li><button data-text="Approve Aplication"><span
                                                    class="la la-check"></span></button></li>
                                        <li><button data-text="Reject Aplication"><span
                                                    class="la la-times-circle"></span></button></li>
                                        <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="image-layer" style="background-image: url({{ asset('/assets/client-bower/images/background/12.jpg') }});">
    </div>
    </div>
    <!-- End Info Section -->
@endsection
