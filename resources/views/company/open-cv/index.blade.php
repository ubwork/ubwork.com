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
            
            <div class="row">
              @if (count($data) > 0)
                @foreach ($data as $item)

                <div class="candidate-block-four col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                      {{-- <span class="thumb"><img src="{{asset('storage/'. $com_short[$item->seeker_id]->image)}}" alt=""></span> --}}
                      <h3 class="name"><a href="#">{{$com_short[$item->seeker_id]->name ?? ''}}</a></h3>
                      {{-- <span class="cat" style="min-height: 22px">{{isset($item['major']['name']) ? $item['major']['name'] : ''}}</span> --}}
                      <ul class="job-info">
                        
                      </li>
                        
                      </ul>
                      <ul class="post-tags">
                        
                      </ul>
                      <div class="">
                        <a style="" target="_blank" href="{{route('company.viewProfile', ['id' => $item->seeker_id])}}" class="theme-btn btn-style-three">Xem Chi Tiết</a>
                      </div>
                    </div>
                  </div>
                @endforeach
                @endif
              <!-- Candidate block Four -->
            </div>

            <!-- Pagination -->
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection