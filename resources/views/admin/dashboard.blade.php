@extends('admin.layout.app')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('content')
    <div class="row">
        @php
        $admin = \Illuminate\Support\Facades\Auth::User();
        // if($objUser){
        //         echo "Bạn không có quyền truy cập vào chức năng này";
        //         return false;
        //     }
        // echo $admin->email;
        @endphp
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{count($countCandidate)}}</h3>

                <p>Ứng viên có trong hệ thống</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('admin.candidate.index')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{count($contCompany)}}</h3>

                <p>Công ty có trong hệ thống</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('admin.company.index')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
