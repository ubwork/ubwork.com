@extends('client.layout.app')
@section('title')
{{__('UB Work')}} | {{$data->title}}
@endsection
@section('content')
    <section class="blog-single">
      <div class="auto-container">
        <div class="upper-box">
          <h3>{{$data->title}}</h3>
          <ul class="post-info">
            <li><span class="thumb"><img src="images/resource/thumb-1.png" alt=""></span>{{$data->author}}</li>
            <li>{{$data->created_at}}</li>
          </ul>
        </div>
      </div>
      <figure class="main-image"><img src="images/resource/blog-single.jpg" alt=""></figure>
      <div class="auto-container">
        <h4>Course Description</h4>
        <p>{{$data->description}}</p>
        <p>{{$data->content}}</p>
        <blockquote class="blockquote-style-one mb-5 mt-5">
          <p>Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. </p>
          <cite>Luis Pickford</cite>
        </blockquote>
        <figure class="image"><img src="images/resource/post-img.jpg" alt=""></figure>
        <h4>Requirements</h4>
        <ul class="list-style-three">
          <li>We do not require any previous experience or pre-defined skills to take this course. A great orientation would be enough to master UI/UX design.</li>
          <li>A computer with a good internet connection.</li>
          <li>Adobe Photoshop (OPTIONAL)</li>
        </ul>

        <!-- Other Options -->
        <div class="other-options">
          <div class="social-share">
            <h5>Share this post</h5>
            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="#" class="twitter"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="#" class="google"><i class="fab fa-google"></i> Google+</a>
          </div>

          <div class="tags">
            <a href="#">App</a>
            <a href="#">Design</a>
            <a href="#">Digital</a>
          </div>
        </div>

        <!-- Post Control -->
        <div class="post-control">
          <div class="prev-post">
            <span class="icon flaticon-back"></span>
            <span class="title">Previous Post</span>
            <h5><a href="#">Given Set was without from god divide rule Hath</a></h5>
          </div>
          <div class="next-post">
            <span class="icon flaticon-next"></span>
            <span class="title">Next Post</span>
            <h5><a href="#">Tree earth fowl given moveth deep lesser After</a></h5>
          </div>
        </div>
      </div>
    </section>
@endsection