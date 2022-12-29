@extends('client.layout.app')
@section('title')
    {{__('UB Work')}} | {{$data_job->title}}
@endsection
@section('content')
<style>
  iframe {
      width: 100% !important;
  }
</style>
    <section class="job-detail-section mt-5">
      <!-- Upper Box -->
      <div class="upper-box" style="background-image: url({{asset('storage/images/bg-4.png')}}) ">
        <div class="auto-container">
          <!-- Job Block -->
          <div class="job-block-seven">
            <div class="inner-box">
              <div class="content">
                <span class="company-logo"><img src="{{asset('storage/images/company/'.$data_job->company->logo)}}"></span>
                <h4><a href="{{route('job-detail', ['id' => $data_job->id])}}">{{$data_job->title}}</a></h4>
                <ul class="job-info">
                  {{-- <li><span class="icon flaticon-briefcase"></span> {{$data_job->major->name}}</li> --}}
<<<<<<< HEAD
                  @if(!empty($data_job->company->address))
                  <li><span class="icon flaticon-map-locator"></span>{{$data_job->company->address}}</li>
                  @endif

                  @if(!empty($data_job->company->working_time))
                  <li><span class="icon flaticon-clock-3"></span>{{$data_job->company->working_time}}h/ngày</li>
                  @endif

=======
                  <li><span class="icon flaticon-map-locator"></span>{{$data_job->company->address}}</li>
                  <li><span class="icon flaticon-clock-3"></span>{{$data_job->company->working_time}}h/ngày</li>
                  @if($data_job->min_salary > 0 && $data_job->max_salary > 0)
                  <li><span class="icon flaticon-money"></span> {{number_format($data_job->min_salary)}} - {{number_format($data_job->max_salary)}}</li>
                  @else
                  <li><span class="icon flaticon-money"></span>Thỏa thuận</li>
                  @endif
>>>>>>> 9e52d1e839eb39c430a46b87121290a274295b30
                </ul>
                <ul class="job-other-info">
                  @foreach (config('custom.type_work') as $value)
                      @if($value['id'] == $data_job->type_work)
                          <li class="time">
                              {{$value['name']}}
                          </li>
                      @endif
                  @endforeach
                </ul>
              </div>

              <div class="btn-box">
                @if (auth('candidate')->check())
<<<<<<< HEAD
                @if (!empty($idJobApplied[$data_job->id]) )
=======
                    @if (!empty($idJobApplied[$data_job->id]) )
>>>>>>> 9e52d1e839eb39c430a46b87121290a274295b30
                      @if($idJobApplied[$data_job->id]->job_post_id == $data_job->id )
                      <button class="theme-btn btn-style-one" >Đã ứng tuyển</button>
                      @endif
                    @else
                      @if(!empty($seeker->id))
                      <a href="{{route('modal_selectCV')}}" data-id-job="{{$data_job->id}}" class="theme-btn btn-style-one call-modal">Ứng tuyển ngay</a>
                      @else 
                      <a href="{{route('createNew')}}" class="theme-btn btn-style-one">Ứng tuyển ngay</a>
                      @endif
                    @endif
                @else
                  <a class="theme-btn btn-style-one" href="{{route('candidate.login',['job_id'=>$data_job->id])}}">Ứng tuyển ngay</a>
                @endif
                @if (auth('candidate')->check())
                    @if (!empty($idJobShort[$data_job->id]))
                        @if ($idJobShort[$data_job->id]->job_post_id == $data_job->id)
                            <a data-shortlistId="{{$idJobShort[$data_job->id]->id}}" data-id="{{$data_job->id}}"
                                class="bookmark-btn btn-shortlisted"><span class="flaticon-bookmark"
                                    style="color: #f7941d"></span></a>
                        @endif
                    @else
                        <a  data-id="{{$data_job->id}}" data-shortlistId=""
                            class="bookmark-btn btn-shortlisted"><span class="flaticon-bookmark"
                                style="color: black"></span></a>
                    @endif
                @else
                
                    <a href="{{route('candidate.login')}}" class="bookmark-btn"><span class="flaticon-bookmark"  style="color: black"></span></a>
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
                <h4>Mô tả công việc</h4>
                <p>{!! $data_job->description !!}</p>
                <h4>Yêu cầu công việc</h4>
                <ul class="list-style-three">
                  {!! $data_job->requirement !!}
                </ul>
                @if(!empty($data_job->benefits))
                <h4>Quyền lợi</h4>
                <ul class="list-style-three">
                  {!! $data_job->benefits !!}
                </ul>
                @endif
<<<<<<< HEAD
              </div>

              <div class="other-options">
                <div class="social-share">
                  <h5>Chia sẻ công việc</h5>
                  @php
                    $url_root = Request::url();
                  @endphp
                  <a target="_blank" href="https://www.facebook.com/sharer.php?u={{$url_root}}" class="facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
                </div>
=======
                <h4>Kinh nghiệm</h4>
                <ul class="list-style-three">
                  @foreach (config('custom.experience') as $value)
                  @if($data_job->experience == $value['id'])
                  <li>{{$value['name']}}</li>
                  @endif
                  @endforeach
                </ul>
>>>>>>> 9e52d1e839eb39c430a46b87121290a274295b30
              </div>


              <!-- Related Jobs -->
              <div class="related-jobs">
                <div class="title-box">
                  <h3>Công việc liên quan</h3>
                  <div class="text">{{count($data_job_relate)}} việc làm.</div>
                </div>

                <!-- Job Block -->
                @foreach ($data_job_relate as $item)
                    <div class="job-block">
                        <div class="inner-box">
                            <div class="content">
                            <span class="company-logo"><img src="{{asset('storage/images/company/'.$item->company->logo)}}" alt=""></span>
                            <h4><a href="{{route('job-detail', ['id' => $item->id])}}">{{$item->title}}</a></h4>
                            <ul class="job-info">
                                {{-- <li><span class="icon flaticon-briefcase"></span>{{$item->major->name}}</li> --}}
<<<<<<< HEAD
                                @if(!empty($item->company->address))
                                <li><span class="icon flaticon-map-locator"></span>{{$item->company->address}}</li>
                                @endif

                                @if(!empty($item->company->working_time))
                                <li><span class="icon flaticon-clock-3"></span>{{$item->company->working_time}} giờ/ngày</li>
                                @endif

                                @php
                                    $startLi = '<li><span class="icon flaticon-money"></span>';
                                    $endLi = '</li>';
                                    $vnd = ' đ';
                                    $min_luong = $item->min_salary;
                                    $max_luong = $item->max_salary;
                                        if($min_luong != "" && $min_luong > 0 && $max_luong != "" && $max_luong > 0  ){
                                            echo $startLi.number_format($item->min_salary, 0, ',', '.').$vnd.' - '.number_format($item->max_salary, 0, ',', '.').$vnd .$endLi;
                                        // thỏa thuận
                                        }elseif($min_luong == "" && $min_luong == 0 && $max_luong == "" && $max_luong == 0  ) {
                                            echo $startLi.'Thỏa thuận'.$endLi;
                                        }
                                        // Từ
                                        elseif ($max_luong == "" && $max_luong == 0) {
                                            echo $startLi.'Trên '.number_format($item->min_salary, 0, ',', '.').$vnd.$endLi;
                                        //Đến
                                        }elseif ($min_luong == "" && $min_luong == 0) {
                                            echo $startLi.number_format($item->max_salary, 0, ',', '.').$vnd.$endLi;
                                        }else {
                                            echo $startLi.'Thỏa thuận'.$endLi;
                                        }
                                @endphp

                                
=======
                                <li><span class="icon flaticon-map-locator"></span>{{$item->company->address}}</li>
                                <li><span class="icon flaticon-clock-3"></span>{{$item->company->working_time}} giờ/ngày</li>
                                @if($item->min_salary > 0 && $item->max_salary > 0)
                                <li><span class="icon flaticon-money"></span>{{number_format($item->min_salary)}} - {{number_format($item->max_salary)}}</li>
                                @else
                                <li><span class="icon flaticon-money"></span>Thỏa thuận</li>
                                @endif
>>>>>>> 9e52d1e839eb39c430a46b87121290a274295b30
                              </ul>
                            <ul class="job-other-info">
                                 @foreach (config('custom.type_work') as $value)
                                      @if($value['id'] == $item->type_work)
                                          <li class="time">
                                              {{$value['name']}}
                                          </li>
                                      @endif
                                  @endforeach
                            </ul>
                            @if (auth('candidate')->check())
                                @if (!empty($job_short[$item->id]))
                                    @if ($job_short[$item->id]->job_post_id == $item->id)
                                        <a data-shortlistId="{{$job_short[$item->id]->id}}" data-id="{{$item->id}}"
                                            class="bookmark-btn btn-shortlisted"><span class="flaticon-bookmark"
                                                style="color: #f7941d"></span></a>
                                    @endif
                                @else
                                    <a  data-id="{{$item->id}}" data-shortlistId=""
                                        class="bookmark-btn btn-shortlisted"><span class="flaticon-bookmark"
                                            style="color: black"></span></a>
                                @endif
                            @else
                                <button class="bookmark-btn"><span class="flaticon-bookmark"
                                        style="color: black"></span></button>
                                <a href="{{route('candidate.login')}}" class="bookmark-btn"><span class="flaticon-bookmark"  style="color: black"></span></a>
                            @endif
                            </div>
                        </div>
                    </div>
                @endforeach
              </div>
              <div class="related-jobs">
                <div class="title-box">
                  <h3>Giới thiệu về công ty</h3>
                </div>

                <!-- Job Block -->
                @if(!empty($data_job->company->about))
                    <div class="job-block">
                        <div class="inner-box">
                            <div class="content">
                              {!! $data_job->company->about !!}
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="job-block">
                      <div class="inner-box">
                          <div class="content">
                            Chưa có thông tin
                          </div>
                      </div>
                  </div>
                  @endif
              </div>
            </div>

            <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
              <aside class="sidebar">
                <div class="sidebar-widget">
                  <!-- Job Overview -->
                  <h4 class="widget-title">Tổng quan về công việc</h4>
                  <div class="widget-content">
                    <ul class="job-overview">
                      <li>
<<<<<<< HEAD
                        <i class="icon icon-expiry"></i>
                        <h5>Hạn nộp hồ sơ:</h5>
                        <span>{{date("d-m-Y", strtotime($data_job->end_date))}}</span>
                      </li>

                      @if(!empty($data_job->address))
                      <li>
                        <i class="icon icon-location"></i>
                        <h5>Địa điểm:</h5>
                        <span>{{$data_job->address}}</span>
                      </li>
                      @endif

                      @if(!empty($data_job->gender))
                      <li>
                        <i class="icon">
                          <svg fill="#1967d2" height="24px" width="24px" version="1.1" id="SVGRepoEditor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 247.582 247.582" xml:space="preserve" stroke="#1967d2" stroke-width="0"><g id="SVGRepo_bgCarrier" stroke-width="0"></g> <path d="M196.666,93.047V76.445h10v-21h-10v-15h-25v15h-11v21h11v16.424c-29,5.64-51.581,31.564-51.581,62.617 c0,35.162,28.69,63.769,63.852,63.769c35.163,0,63.645-28.606,63.645-63.769C247.582,124.769,225.666,99.059,196.666,93.047z M184.021,194.254c-21.377,0-38.769-17.392-38.769-38.769c0-21.378,17.392-38.77,38.769-38.77c21.378,0,38.77,17.392,38.77,38.77 C222.79,176.863,205.399,194.254,184.021,194.254z"></path> <path d="M127.581,91.404c0-35.162-28.523-63.769-63.686-63.769S0,56.242,0,91.404c0,31.068,22.666,57.003,51.666,62.625v27.99 l-8.184-7.057l-13.471,16.039l34.295,28.945l35.335-28.831l-13.437-16.268l-9.537,7.658v-28.674 C105.666,147.804,127.581,122.105,127.581,91.404z M25.208,91.404c0-21.377,17.392-38.769,38.77-38.769s38.77,17.392,38.77,38.769 c0,21.378-17.392,38.77-38.77,38.77S25.208,112.782,25.208,91.404z"></path> </svg>
                        </i>
                        <h5>Giới tính:</h5>
                        <span>{{$data_job->gender == 1 ? 'Nam' : 'Nữ' }}</span>
                      </li>
                      @endif

                      @if(!empty($data_job->level))
                        <li>
                          <i class="icon icon-user-2"></i>
                          <h5>Cấp bậc:</h5>
                          @foreach (config('custom.level') as $lv)
                            @if($lv['id'] == $data_job->level)
                                <span>{{ $lv['name']}}</span>
                            @endif
                          @endforeach
                        </li>
                      @endif

                      @if(!empty($data_job->amount))
                      <li>
                        <i class="icon">
                          <svg fill="#1967d2" version="1.1" id="SVGRepoEditor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 80.13 80.13" xml:space="preserve" stroke="#1967d2" stroke-width="0"><g id="SVGRepo_bgCarrier" stroke-width="0"></g> <path d="M48.355,17.922c3.705,2.323,6.303,6.254,6.776,10.817c1.511,0.706,3.188,1.112,4.966,1.112 c6.491,0,11.752-5.261,11.752-11.751c0-6.491-5.261-11.752-11.752-11.752C53.668,6.35,48.453,11.517,48.355,17.922z M40.656,41.984 c6.491,0,11.752-5.262,11.752-11.752s-5.262-11.751-11.752-11.751c-6.49,0-11.754,5.262-11.754,11.752S34.166,41.984,40.656,41.984 z M45.641,42.785h-9.972c-8.297,0-15.047,6.751-15.047,15.048v12.195l0.031,0.191l0.84,0.263 c7.918,2.474,14.797,3.299,20.459,3.299c11.059,0,17.469-3.153,17.864-3.354l0.785-0.397h0.084V57.833 C60.688,49.536,53.938,42.785,45.641,42.785z M65.084,30.653h-9.895c-0.107,3.959-1.797,7.524-4.47,10.088 c7.375,2.193,12.771,9.032,12.771,17.11v3.758c9.77-0.358,15.4-3.127,15.771-3.313l0.785-0.398h0.084V45.699 C80.13,37.403,73.38,30.653,65.084,30.653z M20.035,29.853c2.299,0,4.438-0.671,6.25-1.814c0.576-3.757,2.59-7.04,5.467-9.276 c0.012-0.22,0.033-0.438,0.033-0.66c0-6.491-5.262-11.752-11.75-11.752c-6.492,0-11.752,5.261-11.752,11.752 C8.283,24.591,13.543,29.853,20.035,29.853z M30.589,40.741c-2.66-2.551-4.344-6.097-4.467-10.032 c-0.367-0.027-0.73-0.056-1.104-0.056h-9.971C6.75,30.653,0,37.403,0,45.699v12.197l0.031,0.188l0.84,0.265 c6.352,1.983,12.021,2.897,16.945,3.185v-3.683C17.818,49.773,23.212,42.936,30.589,40.741z"></path> </svg>
                        </i>
                        <h5>Số lượng tuyển:</h5>
                        <span>{{$data_job->amount }}</span> người
                      </li>
                      @endif

                      @php
                        $startLi = '<li><i class="icon icon-salary"></i><h5>Mức lương:</h5>';
                        $endLi = '</li>';
                        $vnd = ' đ';
                        $min_luong = $data_job->min_salary;
                        $max_luong = $data_job->max_salary;
                            if($min_luong != "" && $min_luong > 0 && $max_luong != "" && $max_luong > 0  ){
                                echo $startLi.'<span>'.number_format($data_job->min_salary, 0, ',', '.').$vnd.' - '.number_format($data_job->max_salary, 0, ',', '.').$vnd.'</span>' .$endLi;
                            // thỏa thuận
                            }elseif($min_luong == "" && $min_luong == 0 && $max_luong == "" && $max_luong == 0  ) {
                                echo $startLi.'<span>'.'Thỏa thuận'.'</span>'.$endLi;
                            }
                            // Từ
                            elseif ($max_luong == "" && $max_luong == 0) {
                                echo $startLi.'Trên '.'<span>'.number_format($data_job->min_salary, 0, ',', '.').$vnd.'</span>'.$endLi;
                            //Đến
                            }elseif ($min_luong == "" && $min_luong == 0) {
                                echo $startLi.'<span>'.number_format($data_job->max_salary, 0, ',', '.').$vnd.'</span>'.$endLi;
                            }else {
                                echo $startLi.'Thỏa thuận'.$endLi;
                            }
                      @endphp

                      @if(!empty($data_job->amount))
                      <li>
                        <i class="icon icon-clock"></i>
                        <h5>Yêu cầu kinh nghiệm:</h5>
                        @foreach (config('custom.experience') as $expr)
                            @if($data_job->experience == $expr['id'])
                            <span>{{ $expr['name'] }}</span>
                            @endif
                        @endforeach
                      </li>
                      @endif

=======
                        <i class="icon icon-calendar"></i>
                        <h5>Ngày đăng:</h5>
                        <span>{{date("d-m-Y", strtotime($data_job->created_at))}}</span>
                      </li>
                      <li>
                        <i class="icon icon-expiry"></i>
                        <h5>Ngày hết hạn:</h5>
                        <span>{{date("d-m-Y", strtotime($data_job->end_date))}}</span>
                      </li>
                      <li>
                        <i class="icon icon-location"></i>
                        <h5>Địa điểm:</h5>
                        <span>{{$data_job->company->address}}</span>
                      </li>
                      <li>
                        <i class="icon icon-clock"></i>
                        <h5>Giờ làm việc:</h5>
                        <span>{{$data_job->company->working_time}} giờ/ngày</span>
                      </li>
                      <li>
                        <i class="icon icon-salary"></i>
                        <h5>Lương:</h5>
                        @if($data_job->min_salary > 0 && $data_job->max_salary > 0)
                         <span>{{number_format($data_job->min_salary, 0, ',', '.')}} - {{number_format($data_job->max_salary, 0, ',', '.')}} đ</span>
                         @else
                         <li>Thỏa thuận</li>
                         @endif
                        </li>
>>>>>>> 9e52d1e839eb39c430a46b87121290a274295b30
                    </ul>
                  </div>

                  <!-- Map Widget -->
                  {{-- <h4 class="widget-title">Đia điểm</h4>
                  <div class="widget-content">
                    <div class="map-outer">
                      <div class="map-canvas">
                        <iframe class="map-canvas" width="100%" src="{{$data_job->company->map}}" frameborder="0"></iframe>
                      </div>
                    </div>
                  </div> --}}

                  <!-- Job Skills -->
<<<<<<< HEAD
                  <h4 class="widget-title">Chuyên ngành</h4>
                  
                  <div class="widget-content">
                      {{$data_job->major->name}}
                  </div>
                  <br>
=======
>>>>>>> 9e52d1e839eb39c430a46b87121290a274295b30
                  <h4 class="widget-title">Kỹ năng</h4>
                  
                  <div class="widget-content">
                    <ul class="job-skills">
                      @foreach($skills as $item)
                      @if(in_array($item['id'],$skillActive))
                      <li><a href="javascript:void(0)">{{$item->name}}</a></li>
                      @endif
                      @endforeach
                    </ul>
                  </div>

                </div>

                <div class="sidebar-widget company-widget">
                  <div class="widget-content">
                    <div class="company-title">
                      <div class="company-logo"><img src="{{asset('storage/images/company/'.$data_job->company->logo)}}" alt=""></div>
                      <h5 class="company-name">{{$data_job->company->company_name}}</h5>
                      <a target="_blank" href="{{route('company-detail', ['id' => $data_job->company->id])}}" class="profile-link">Thông tin công ty</a>
                    </div>

                    <ul class="company-info">
                      <li>Loại hình doanh nghiệp: <span>{{$data_job->company->company_model}}</span></li>
                      {{-- <li>Quy mô: <span>{{$data_job->company->company_size}}</span></li> --}}
                      <li>Thành lập: <span>{{date('d-m-Y', strtotime($data_job->company->founded_in))}}</span></li>
<<<<<<< HEAD
                      @if(!empty($data_job->company->address))
                      <li>Địa điểm: <span>{{$data_job->company->address}}</span></li>
                      @endif
=======
                      <li>Địa điểm: <span>{{$data_job->company->address}}</span></li>
>>>>>>> 9e52d1e839eb39c430a46b87121290a274295b30
                      {{-- <li>Truyền thông xã hội:
                        <div class="social-links">
                          <a href="#"><i class="fab fa-facebook-f"></i></a>
                          <a href="#"><i class="fab fa-twitter"></i></a>
                          <a href="#"><i class="fab fa-instagram"></i></a>
                          <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                      </li> --}}
                    </ul>
                    @if(!empty($data_job->company->link_web))
                    <div class="btn-box"><a target="_blank" href="{{$data_job->company->link_web}}" class="theme-btn btn-style-three">Website công ty</a></div>
                  @endif
                  </div>
                </div>

                @if(!empty($data_job->company->map))
                    <div class="sidebar-widget">
                    <!-- Map Widget -->
                    <h4 class="widget-title">Địa điểm của {{$data_job->company->company_name}}</h4>
                    <div class="widget-content">
                        <div class="map-outer mb-0">
                            @php echo $data_job->company->map @endphp
                        </div>
                    </div>
                </div>
                @endif

                @if(!empty($data_job->company->iframe_ytb))
                    <div class="sidebar-widget">
                    <!-- Map Widget -->
                    <h4 class="widget-title">Video của {{$data_job->company->company_name}}</h4>
                    <div class="widget-content">
                        <div class="map-outer mb-0">
                            @php echo $data_job->company->iframe_ytb @endphp
                        </div>
                    </div>
                </div>
                @endif

              </aside>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
@section('script')
  @parent
  <script src="{{asset('assets/client-bower/js/jquery.modal.min.js')}}"></script>
  <script src="{{asset('js/client/shortlist.js')}}"></script>
  <script>
    updateShortList();
    // Open modal in AJAX callback
	$('.call-modal').on('click', function(event) {
	  event.preventDefault();
	  this.blur();
	  $.get(this.href, function(html) {
	    $(html).appendTo('body').modal({
	    	closeExisting: true,
			fadeDuration: 300,
			fadeDelay: 0.15
	    });
	  });
	});
    $('.call-modal2').on('click', function(event) {
	  event.preventDefault();
	  this.blur();
    var id = $(this).data('id-job');
    console.log(id);
	  $.get(this.href, function(html) {
          $(html).appendTo('body').modal({
            closeExisting: true,
          fadeDuration: 300,
          fadeDelay: 0.15
          });
        });
      });
  </script>
  <script>
    
  </script>
@endsection