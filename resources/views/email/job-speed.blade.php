@extends('client.layout.app')
@section('title')
    {{ __('UB Work') }}
@endsection
@section('content')
<div class="login" style="width:500px;margin:auto; margin-top:200px;margin-bottom:200px">
    <div class="outer-box">
      <div class="login-form default-form">
        <div class="form-inner">
          <h3>Tìm Kiếm Công Việc Nhanh</h3>
          <h5>Cách sử dụng:</h5>
          <div class="sec-title text-center">
            <div class="text">Mỗi ngày chỉ được sử dụng tìm kiếm nhanh một lần, và mỗi lần sử dũng ứng viên sẽ phải trả 30 coin.
                Nếu ứng viên đã sử dụng tìm kiếm nhanh sẽ được kích hoạt chế độ lọc các job có công việc đang có nhu cầu tìm việc gấp có thời gian đăng nhỏ hơn 5 ngày <a href="{{route('job')}}">tại đây!</a>
            </div>
        </div>
            <div class="form-group">
              <button class="theme-btn btn-style-one" type="submit" name="log-in"><a href="{{route('send')}}" style="color: #fff">Tìm Kiếm</a></button>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
