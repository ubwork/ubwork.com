@extends('company.layout.app')
@section('title')
    {{ __('Lịch sử giao dịch') }}
@endsection
@section('content')
    <div class="row view-invoice">
        <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>Lịch sử giao dịch</h4>
                    </div>
                    <div class="widget-content">
                        <div class="tab active-tab" id="monthly">
                            <div class="content">
                                <div class="row">
                                    <!-- Pricing Table -->
                                    <div class="resume-block">
                                        <div class="inner">
                                          <span class="name"></span>
                                          <div class="title-box">
                                            <div class="info-box">
                                              <h3>Bachlors in Fine Arts</h3>
                                              <span>Modern College</span>
                                            </div>
                                            <div class="edit-box">
                                              <span class="year">2012 - 2014</span>
                                            </div>
                                          </div>
                                          <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

