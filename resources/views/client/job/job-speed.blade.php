@extends('client.layout.app')
@section('title')
    {{ __('UB Work') }} | {{ __('Công việc đã ứng tuyển') }}
@endsection
@section('content')
    <section class="user-dashboard pt-5 mt-5">
        <div class="dashboard-outer">
            <div class="row pt-5">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Công việc đã tìm kiếm nhanh</h4>

                                <div class="chosen-outer">
                                    <!--Tabs Box-->
                                    <select class="chosen-select">
                                        <option>Last 6 Months</option>
                                        <option>Last 12 Months</option>
                                        <option>Last 16 Months</option>
                                        <option>Last 24 Months</option>
                                        <option>Last 5 year</option>
                                    </select>
                                </div>
                            </div>

                            <div class="widget-content">
                                <div class="table-outer">
                                    <table class="default-table manage-job-table">
                                        <thead>
                                            <tr>
                                                <th>Tiêu đề</th>
                                                <th>Ngày ứng tuyển</th>
                                                <th>Trạng thái</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>
                                                        <!-- Job Block -->
                                                        <div class="job-block">
                                                            <div class="inner-box">
                                                                <div class="content">
                                                                    <span class="company-logo"><img
                                                                            src="{{ asset('storage/' . $item->company->logo) }}"
                                                                            alt=""></span>
                                                                    <h4><a
                                                                            href="{{ route('job-detail', ['id' => $item->job_post_id]) }}">{{ $item->company->name }}</a>
                                                                    </h4>
                                                                    <ul class="job-info">
                                                                        <li><span class="icon flaticon-briefcase"></span>
                                                                            Segment</li>
                                                                        <li><span
                                                                                class="icon flaticon-map-locator"></span>{{ $item->company->address }}
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                                    <td class="status">Active</td>
                                                    <td>
                                                        <div class="option-box">
                                                            <ul class="option-list">
                                                                <li><a href=""><button
                                                                            data-text="Delete Aplication"><span
                                                                                class="la la-trash"></span></button></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection