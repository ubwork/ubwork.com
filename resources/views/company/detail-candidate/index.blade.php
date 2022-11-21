@extends('client.layout.app')
@section('title')
{{__('UB Work')}} | {{$title}}
@endsection
@section('content')
<section class="candidate-detail-section style-three">
    <!-- Upper Box -->
    <div class="upper-box">
      <div class="auto-container">
        <!-- Candidate block Six -->
        <div class="candidate-block-six">
          <div class="inner-box">
            <figure class="image"><img src="{{!empty($data->avatar) ? asset('storage/'. $data->avatar) : '' }}" alt=""></figure>
            <h4 class="name"><a href="#">{{$data->name ?? ''}}</a></h4>

            <span class="designation">{{$data['major']->name ?? ''}}</span>
            <div class="content">
              <ul class="post-tags">
                @if (!empty($data['skill']))
                  @forelse ($data['skill'] as $item)
                  <li><a href="#">{{$item->name}}</a></li>
                  @empty
                  <li><a href="#">Không có kĩ năng nào</a></li>
                  @endforelse
                @endif
              </ul>

              <ul class="candidate-info">
                @if ($data->address ?? '')
                <li><span class="icon flaticon-map-locator"></span>{{$data->address ?? ''}}</li>
                @endif
                @if ($data->coin ?? '')
                <li><span class="icon flaticon-money"></span>{{$data->coin ?? ''}}</li>
                @endif
                @if ($data->birthday ?? '')
                <li><span class="icon flaticon-clock"></span>{{$data->birthday ?? ''}}</li>
                @endif
              </ul>

              <div class="btn-box">
                {{-- <a href="#" class="theme-btn btn-style-one">Download CV</a> --}}
                {{-- @dd($data); --}}
                <a style="width: 49%;" target="_blank" href="{{route('company.viewProfileHidden', $data->candidate_id)}}" class="theme-btn btn-style-one">Xem CV</a>
                <button class="bookmark-btn"><i class="flaticon-bookmark"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="candidate-detail-outer">
      <div class="auto-container">
        <div class="row">
          <div class="content-column col-lg-8 col-md-12 col-sm-12 order-2">
            <div class="job-detail">
              <h4>Giới Thiệu</h4>
              
              <p>{{$data->description ?? ''}}</p>
              {{-- @dd($candidate); --}}
              <div class="resume-outer">
                <div class="upper-title">
                  <h4>Học vấn</h4>
                </div>
                <!-- Resume BLock -->
                @foreach ($education as $item)
                <div class="resume-block">
                  <div class="inner">
                    <span class="name">M</span>
                    <div class="title-box">
                      <div class="info-box">
                        
                        <h3>{{$item['name_education'] ?? ''}}</h3>
                        {{-- @dd($education) --}}
                        <span>{{$item['type_degree']}}</span>
                        
                        
                      </div>
                      
                      <div class="edit-box">
                        <span class="year">{{$item['start_date']}} - {{$item['end_date']}}</span>
                        <div class="edit-btns">
                        </div>
                      </div>
                    </div>
                    <div class="text">{{$item['description']}}</div>
                  </div>
                </div>
                @endforeach

                <!-- Resume BLock -->
                {{-- <div class="resume-block">
                  <div class="inner">
                    <span class="name">H</span>
                    <div class="title-box">
                      <div class="info-box">
                        <h3>Computer Science</h3>
                        <span>Harvard University</span>
                      </div>
                      <div class="edit-box">
                        <span class="year">2008 - 2012</span>
                      </div>
                    </div>
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>
                  </div>
                </div> --}}
              </div>

              <!-- Resume / Work & Experience -->
              <div class="resume-outer theme-blue">
                <div class="upper-title">
                  <h4>Kinh nghiệm làm việc</h4>
                </div>
                <!-- Resume BLock -->
                @foreach ($exp as $item)
                <div class="resume-block">
                  <div class="inner">
                    <span class="name">S</span>
                    <div class="title-box">
                      <div class="info-box">
                        <h3>{{$item['company_name']}}</h3>
                        <span>{{$item['position']}}</span>
                      </div>
                      <div class="edit-box">
                        <span class="year">{{$item['start_date']}} - {{$item['start_date']}}</span>
                      </div>
                    </div>
                    <div class="text">{{$item['description']}}</div>
                  </div>
                </div>
                @endforeach

                <!-- Resume BLock -->
              </div>
              <!-- Resume / Awards -->
              <!-- Video Box -->
            </div>
          </div>

          <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
            <aside class="sidebar">
              <div class="sidebar-widget">
                <div class="widget-content">
                  <ul class="job-overview">
                    <li>
                      <i class="icon icon-calendar"></i>
                      <h5>Kinh nghiệm:</h5>
                      <span>0-2 năm</span>
                    </li>

                    <li>
                      <i class="icon icon-expiry"></i>
                      <h5>Tuổi:</h5>
                      <span>28-33 năm</span>
                    </li>

                    <li>
                      <i class="icon icon-rate"></i>
                      <h5>Mức Lương:</h5>
                      <span>11K - 15K</span>
                    </li>
                    @isset($data['candidate']->gender)
                    <li>
                      <i class="icon icon-user-2"></i>
                      <h5>Giới Tính:</h5>
                      @if ($data['candidate']->gender == 1 )
                      <span>Nam</span>
                      @else 
                      <span>Nữ</span>
                      @endif
                    </li>
                    @endisset
                  </ul>
                </div>

              </div>
              <div class="sidebar-widget contact-widget">
                <h4 class="widget-title">Contact Us</h4>
                <div class="widget-content">
                  <!-- Comment Form -->
                  <div class="default-form">
                    <!--Comment Form-->
                    <form>
                      <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                          <input type="text" name="username" placeholder="Your Name" required>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                          <input type="email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                          <textarea class="darma" name="message" placeholder="Message"></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                          <button class="theme-btn btn-style-one" type="submit" name="submit-form">Send Message</button>
                        </div>
                      </div>
                    </form>
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