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
            <div class="form-group">
              <button class="theme-btn btn-style-one" type="submit" name="log-in"><a href="{{route('send')}}" style="color: #fff">Tìm Kiếm</a></button>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
