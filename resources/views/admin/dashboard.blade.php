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
        {{-- <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-solid fa-ban"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Tổng số Công Ty bị chặn</span>
                    <span class="info-box-number">
                      {{ count($countBlockImagePaper) }}
                    </span>
                </div>
            </div>
        </div> --}}

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title" id="btn-client">Doanh thu</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="position-relative mb-4">
                        <canvas id="sales-chart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('assets/admin-bower/plugins/chart.js/Chart.min.js') }}"></script>
    <script>
        $(function() {
            'use strict'
            var months = {!!json_encode($months)!!};
            var totalMoney = {!!json_encode($totalMoneyMonth)!!};
          
            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            }

            var mode = 'index'
            var intersect = true

            var $salesChart = $('#sales-chart')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                            backgroundColor: '#007bff',
                            borderColor: '#007bff',
                            data: totalMoney
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            // display: false,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,

                                // Include a dollar sign in the ticks
                                callback: function(value) {
                                    if (value >= 1000000) {
                                        value /= 1000000
                                        value += 'm'
                                    }else if(value >= 1000){
                                        value /= 1000
                                        value += 'k'
                                    }

                                    return   value
                                }
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })
        })
    </script>
@endsection
