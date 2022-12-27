@extends('client.layout.app')
@section('title')
    {{ __('UB Work') }}
@endsection
@section('content')
<section class="call-to-action-two" style="background-image: url({{asset('assets/client-bower/images/background/1.jpg')}});margin-top: 100px;">
    <div class="auto-container">
      <div class="sec-title light text-center">
        <h2>Thời gian còn lại</h2>
      </div>

      <p>
        <iframe id="online-alarm-kur-iframe" src="https://embed-countdown.onlinealarmkur.com/vi/#2022-12-26T08:00:00@Asia%2FHo_Chi_Minh" width="480" height="80" style="display: block; margin: 0px auto; border: 0px;"></iframe>
      </p>
      <form action="{{route('upVideo')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="video" >
        <button type="submit">up</button>
      </form>
    </div>
    <video width="320" height="480" controls autoplay  loop>
      <source src="{{asset('storage/video/IMG_7720.mp4')}}" type="video/mp4">
        {{-- <source src="movie.ogg" type="video/ogg"> --}}
          {{-- Your browser does not support the video tag. --}}
        </video>
        {{-- <video width="320" height="240" src="{{asset('storage/video/video.MOV')}}"></video> --}}

        <img src="{{asset('storage/video/56557.png')}}" width="100px" height="100px" alt="" type="">

      </section>
@endsection