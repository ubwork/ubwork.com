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
                      <option disabled selected>Chọn chuyên ngành</option>
                      @foreach ($major as $item)
                      <option @if (app('request')->input('major') == $item['id'])
                          selected 
                      @endif value="{{$item['id']}}"> {{$item['name']}} </option>
                      @endforeach
                    </select>
                </div>

                  <div class="form-group">
                    <select name="experience" class="select2">
                        <option disabled selected>Chọn kinh nghiệm</option>
                        @foreach ($exp as $item)
                        <option @if (app('request')->input('experience') == $item['id'])
                            selected 
                        @endif value="{{$item['id']}}"> {{$item['position']}} </option>
                        @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                    <select name="skill" class="select2">
                        <option disabled selected>Chọn kỹ năng</option>
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
                @foreach ($data as $item)
                {{-- @dd($item['candidate']['name']); --}}
                <div class="candidate-block-four col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                      <span class="thumb"><img src="{{asset('storage/images/company/'. $item['candidate']['avatar'])}}" alt=""></span>
                      <h3 class="name"><a href="#">{{$item['candidate']['name']}}</a></h3>
                      <span class="cat">{{$item['major']['name']}}</span>
                      <ul class="job-info">
                        <li><span class="icon flaticon-map-locator"></span> {{$item['candidate']['address']}}</li>
                        <li><span class="icon flaticon-money"></span> {{$item['candidate']['coin']}}</li>
                      </ul>
                      <ul class="post-tags">
                        <li><a href="#">App</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Digital</a></li>
                      </ul>
                      <a href="#" class="theme-btn btn-style-three">Xem Chi Tiết</a>
                    </div>
                  </div>
                @endforeach
              <!-- Candidate block Four -->
            </div>

            <!-- Pagination -->
            <nav class="ls-pagination">
              <ul>
                {{$data->render()}}
                {{-- <li class="prev"><a href="#"><i class="fa fa-arrow-left"></i></a></li> --}}
                {{-- <li><a href="#"></a></li> --}}
                {{-- <li><a href="#" class="current-page">2</a></li> --}}
                {{-- <li><a href="#">3</a></li> --}}
                {{-- <li class="next"><a href="#"><i class="fa fa-arrow-right"></i></a></li> --}}
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection