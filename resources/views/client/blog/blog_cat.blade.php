@extends('client.layout.app')
@section('title')
    {{__('UB Work')}} | Bài viết
@endsection
@section('content')
        <section class="page-title">
      <div class="auto-container">
        <div class="title-outer">
          <h1>Blog</h1>
          <ul class="page-breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li>Blog</li>
          </ul>
        </div>
      </div>
    </section>
    <!--End Page Title-->

    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
      <div class="auto-container">
        <div class="row">
          <!--Content Side-->
          <div class="content-side col-lg-8 col-md-12 col-sm-12">
            <div class="blog-grid">
              <div class="row">
                <!-- News Block -->
                @foreach ($data as $item)
                   <div class="news-block col-lg-6 col-md-6 col-sm-12">
                  <div class="inner-box">
                    <div class="image-box">
                      <figure class="image"><img src="{{ asset('storage/' .$item->image) }}" alt="" /></figure>
                    </div>
                    <div class="lower-content">
                      <ul class="post-meta">
                        <li><a href="#">{{date("d-m-Y", strtotime($item->created_at))}}</a></li>
                      </ul>
                      <h3><a href="blog-single.html">{{$item->title}}</a></h3>
                      <p class="text">{{$item->description}}</p>
                      <a href="{{ route('blog_detail', ['id' => $item->id]) }}" class="read-more">Xem thêm<i class="fa fa-angle-right"></i></a>
                    </div>
                  </div>
                </div> 
                @endforeach
              </div>

              <!-- Pagination -->
              <nav class="ls-pagination">
                <ul>
                  <li class="prev"><a href="#"><i class="fa fa-arrow-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#" class="current-page">2</a></li>
                  <li><a href="#">3</a></li>
                  <li class="next"><a href="#"><i class="fa fa-arrow-right"></i></a></li>
                </ul>
              </nav>
            </div>
          </div>

          <!--Sidebar Side-->
          <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
            <aside class="sidebar blog-sidebar">

              <!-- Recent Post -->
              <div class="sidebar-widget search-widget">
                <div class="sidebar-title">
                  <h4>Search by Keywords</h4>
                </div>

                <!--search box-->
                <div class="search-box">
                  <form method="post" action="https://creativelayers.net/themes/superio/blog.html">
                    <div class="form-group">
                      <span class="icon flaticon-search-1"></span>
                      <input type="search" name="search-field" value="" placeholder="keywords" required="">
                    </div>
                  </form>
                </div>
              </div>
              <!-- Recent Post -->
              <div class="sidebar-widget recent-post">
                <div class="sidebar-title">
                  <h4>Recent Posts</h4>
                </div>

                <div class="widget-content">
                  <article class="post">
                    <div class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-1.png" alt=""></a></div>
                    <h6><a href="blog-single.html">Attract Sales And Profits</a></h6>
                    <div class="post-info">August 9, 2021</div>
                  </article>

                  <article class="post">
                    <div class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-2.png" alt=""></a></div>
                    <h6><a href="blog-single.html">5 Tips For Your Job Interviews</a></h6>
                    <div class="post-info">August 9, 2021</div>
                  </article>

                  <article class="post">
                    <div class="post-thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-3.png" alt=""></a></div>
                    <h6><a href="blog-single.html">The Best Account Providers</a></h6>
                    <div class="post-info">August 9, 2021</div>
                  </article>
                </div>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </div>
@endsection

