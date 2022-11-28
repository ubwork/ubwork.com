@extends('client.layout.app')
@section('title')
    {{ __('Lịch sử giao dịch') }}
@endsection
@section('content')
    <section class="pricing-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Lịch sử giao dịch</h2>
            </div>
            <div class="pricing-tabs tabs-box">
                <!--Tabs Container-->
                <div class="tabs-content view-invoice ">
                    <!--Tab / Active Tab-->
                    <div class="content">
                        <!-- Ls widget -->
                        <div class="ls-widget">
                            <div class="tabs-box">
                                <div class="row resume-outer theme-blue p-5 mt-4">
                                    <!-- Pricing Table -->
                                    @foreach ($history as $item)
                                        <div class="resume-block">
                                            <div class="inner">
                                                <span class="name"
                                                    style="">{{ $item['type_coin'] != 0 ? '+' : '-' }}</span>
                                                <div class="title-box">
                                                    <div class="info-box">
                                                    </div>
                                                    <div class="edit-box">
                                                        <span
                                                            class="year">{{ date_format($item['created_at'], 'd-m-Y') }}</span>
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    {{ $item['note'] }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
