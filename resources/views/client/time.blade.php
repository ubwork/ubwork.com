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
    </div>
</section>
@endsection