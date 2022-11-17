@extends('company.layout.app')
@section('title')
    {{-- {{ __('Sửa Công ty') }} --}}
@endsection
@section('content')
<style>
    .ls-pagination li a {
        border-radius: unset !important;
    }
</style>

@if ($company->status == 1)
<section class="page-title style-two">
    <div class="auto-container">
      <!-- Job Search Form -->
      <div class="job-search-form">
        <form method="get" action="{{ route('company.filter') }}">
          <div class="row">

            <!-- Form Group -->
            <div class="form-group col-lg-10 col-md-12 col-sm-12 location">
              <span class="icon flaticon-briefcase"></span>
              <input name="name" type="text" placeholder="Tìm Kiếm...">
            </div>
            <!-- Form Group -->
            <div class="form-group col-lg-2 col-md-12 col-sm-12 text-right">
              <button type="submit" class="theme-btn btn-style-one">Tìm kiếm</button>
            </div>
          </div>
      </div>
      <!-- Job Search Form -->
    </div>
  </section>
  <!--End Page Title-->

  <!-- Listing Section -->
  <section class="ls-section">
    <div class="auto-container">
      <div class="filters-backdrop"></div>

      <div class="row">
        <!-- Content Column -->
        <div class="content-column col-lg-12">
          <div class="ls-outer">
            <!-- ls Switcher -->
            <div class="ls-switcher">
              <div class="showing-result">
                <div class="top-filters">
                  <div class="form-group">
                    {{-- @dd(app('request')->input('major')) --}}
                    <select name="major" class="select2">
                      <option value="-1" selected>Chọn chuyên ngành</option>
                      @if (count($major) > 0)
                      @foreach ($major as $item)
                      <option @if (app('request')->input('major') == $item['id'])
                          selected 
                      @endif value="{{$item['id']}}"> {{$item['name']}} </option>
                      @endforeach
                      @endif
                    </select>
                </div>

                  <div class="form-group">
                    <select name="experience" class="select2">
                        <option value="-1" selected>Chọn vị trí từng đảm nhiệm</option>
                        @if(count($exp) > 0)
                        @foreach ($exp as $item)
                        <option @if (app('request')->input('experience') == $item['id'])
                            selected 
                        @endif value="{{$item['id']}}"> {{$item['position']}} </option>
                        @endforeach
                        @endif
                      </select>
                  </div>

                  <div class="form-group">
                    <select name="skill" class="select2">
                        <option value="-1" selected>Chọn kỹ năng</option>
                        @foreach ($skill as $item)
                        <option 
                        @if (app('request')->input('skill') == $item['id'])
                          selected 
                      @endif value="{{$item['id']}}"> {{$item['name']}} </option>
                        @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </form>
              <div class="sort-by">

                <select class="chosen-select" name="page_num">
                  <option value="10">10 mục</option>
                  <option value="20">20 mục</option>
                  <option value="30">30 mục</option>
                  <option value="40">40 mục</option>
                  <option value="50">50 mục</option>
                  <option value="60">60 mục</option>
                </select>
              </div>
            </div>
            
            <div class="row">
              @if (count($data) > 0)
                @foreach ($data as $item)

                {{-- @dd($item['candidate']['name']); --}}

                <div class="candidate-block-four col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                      <span class="thumb"><img src="{{asset('storage/'. $item['candidate']['avatar'])}}" alt=""></span>
                      <h3 class="name"><a href="#">
                        @php
                        $nameAt = $item['candidate']['name'];
                        $count = mb_substr($nameAt, 0, 4,'UTF-8');
                        echo $count."**********";
                        @endphp
                      </a></h3>
                      <span class="cat" style="min-height: 22px">{{isset($item['major']['name']) ? $item['major']['name'] : ''}}</span>
                      <ul class="job-info">
                        <li style="min-height: 22px">
                        @if ($item['candidate']['address'])
                        <span class="icon flaticon-map-locator"></span> {{$item['candidate']['address']}}
                        @endif
                      </li>
                      <li style="min-height: 22px">
                        @if ($item['candidate']['coin'])
                        <span class="icon flaticon-money"></span> {{$item['candidate']['coin']}}
                        @endif
                      </li>
                        
                      </ul>
                      <ul class="post-tags">
                        {{-- @foreach ( as )
                        <li><a href="#">App</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Digital</a></li>
                        @endforeach --}}
                        
                      </ul>
                      <div class="d-flex justify-content-between">
                        <a style="width: 49%;" class="theme-btn btn-style-three" href="{{route('company.SaveOpenCv', ['id' => $item->id])}}">Mở khóa</a>
                        <a style="width: 49%;" target="_blank" href="{{route('company.viewProfileHidden', ['id' => $item->id])}}" class="theme-btn btn-style-three">Xem Chi Tiết</a>
                      </div>
                    </div>
                  </div>
                @endforeach
                @endif
              <!-- Candidate block Four -->
            </div>

            <!-- Pagination -->
            <nav class="ls-pagination">
              <ul>
                {{$data->render()}}
               
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  @elseif ($company->status == 2)
  <span class="text-warning" style="font-weight: 900">Bạn đã bị khóa tài khoản, Vui lòng liên hệ admin</span>
  @else
  <span class="text-warning" style="font-weight: 900">Bạn cần chờ xét duyệt</span>

  @endif
@endsection