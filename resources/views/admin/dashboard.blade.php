@extends('admin.layout.app')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ count($countCandidate) }}</h3>

                    <p>Ứng viên có trong hệ thống</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('admin.candidate.index') }}" class="small-box-footer">Xem chi tiết <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ count($countCompany) }}</h3>

                    <p>Công ty có trong hệ thống</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('admin.company.index') }}" class="small-box-footer">Xem chi tiết <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ count($countCV) }}</h3>

                    <p> CV có trong hệ thống</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('admin.seekerProfile.index') }}" class="small-box-footer">Xem chi tiết <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>



    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Tổng số kĩ năng</span>
                    <span class="info-box-number">
                        {{ count($countSkill) }}
                    </span>
                </div>

            </div>

        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Tổng số chuyên ngành</span>
                    <span class="info-box-number">
                      {{ count($countMajor) }}
                    </span>
                </div>

            </div>

        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-toggle-on"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Tổng số Công Ty chờ xét duyệt</span>
                    <span class="info-box-number">
                      {{ count($countPendingImagePaper) }}
                    </span>
                </div>
            </div>

        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fa fa-check"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Tổng số Công Ty đã xét duyệt</span>
                    <span class="info-box-number">
                      {{ count($countActiveImagePaper) }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-solid fa-ban"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Tổng số Công Ty bị chặn</span>
                    <span class="info-box-number">
                      {{ count($countBlockImagePaper) }}
                    </span>
                </div>
            </div>
        </div>

    </div>
@endsection
