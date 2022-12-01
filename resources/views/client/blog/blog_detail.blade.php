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
            <li><span class="thumb"><img src="{{ asset('storage/' .$author->avatar) }}" alt=""></span>{{$author->name}}</li>
            <li>{{date("d-m-Y", strtotime($data->created_at))}}</li>
          </ul>
        </div>
      </div>
      <figure class="main-image"><img src="{{ asset('storage/' .$data->banner) }}" alt=""></figure>
      <div class="auto-container">
        <h4>Course Description</h4>
        <p>{{$data->description}}</p>
        <p>{{$data->content}}</p>
        <blockquote class="blockquote-style-one mb-5 mt-5">
          <p>{{$author->name}}</p>
          <cite>{{$author->slogan}}</cite>
        </blockquote>
        <figure class="image"><img src="{{ asset('storage/' .$data->image) }}" alt=""></figure>

        <!-- Other Options -->
        <div class="other-options">
          <div class="social-share">
            <h5>Share this post</h5>
            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="#" class="twitter"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="#" class="google"><i class="fab fa-google"></i> Google+</a>
          </div>

        </div>
      </div>
    </section>
@endsection