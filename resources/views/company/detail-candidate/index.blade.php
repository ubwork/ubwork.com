@extends('company.layout.app')
@section('title')
{{__('UB Work')}} | {{$title}}
@endsection
@section('content')

<section class="candidate-detail-section style-three" style="background-image: url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?w=2000');">
    <div class="upper-box mb-0">
      <div class="auto-container">
        <div class="candidate-block-six" >
          <div class="inner-box">
            {{-- @dd($data['candidate']) --}}
            <figure class="image"><img src="{{!empty($data['candidate']->avatar) ? asset('storage/'. $data['candidate']->avatar) : 'https://quarantine.doh.gov.ph/wp-content/uploads/2016/12/no-image-icon-md.png' }}" alt=""></figure>
            <h4 class="name" style="bottom: 15px"><a href="#">{{$data->name ?? ''}}</a></h4>
            <span class="designation">{!!$data['major']->name ?? ''!!}</span>
            <div class="content">
              <ul class="post-tags">
                  @forelse ($seekerSkill as $item)
                  <li><a href="#">{!!$item->getNameSkill->name!!}</a></li>
                  @empty
                  <li><a href="#">Không có kĩ năng nào</a></li>
                  @endforelse
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
                <a style="width: 49%;" target="_blank" href="{{route('company.viewProfileHidden', $data->candidate_id)}}" class="theme-btn btn-style-one">Xem CV</a>
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
                        <span class="year">{{\Carbon\Carbon::parse($item['start_date'])->format('d/m/Y')}} - {{\Carbon\Carbon::parse($item['end_date'])->format('d/m/Y')}}</span>
                        <div class="edit-btns">
                        </div>
                      </div>
                    </div>
                    <div class="text">{{$item['description']}}</div>
                  </div>
                </div>
                @endforeach
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
                        <span class="year">{{\Carbon\Carbon::parse($item['start_date'])->format('d/m/Y')}} - {{\Carbon\Carbon::parse($item['end_date'])->format('d/m/Y')}}</span>
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

          <div class="sidebar-column col-lg-3 col-md-12 col-sm-12">
            <aside class="sidebar">
              <div class="sidebar-widget">
                <div class="widget-content">
                  <ul class="job-overview">
                    {{-- <li>
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
                    </li> --}}
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
              
            </aside>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection