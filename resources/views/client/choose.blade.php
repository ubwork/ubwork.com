@extends('client.layout.app')
@section('title')
    {{ __('UB Work') }}
@endsection
@section('content')
<section class="call-to-action-two" style="background-image: url({{asset('assets/client-bower/images/background/1.jpg')}});margin-top: 100px;">
    <div class="auto-container">
      <div class="sec-title light text-center">
        <h2>Chào mừng bạn đã quay trở lại</h2>
        <div class="text">UBWORK</div>
      </div>

      <div class="btn-box">
        <a href="{{ route('candidate.login') }}" class="theme-btn btn-style-three">Bạn là ứng viên ?</a>
        <a href="{{ route('company.login') }}" class="theme-btn btn-style-two">Bạn là nhà tuyển dụng ?</a>
      </div>
    </div>
</section>
@endsection