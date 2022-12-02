@php
use App\Models\Config;

$config = [];
$config = [];
$configList = Config::where('status', 1)->get();
foreach ($configList as $item) {
    $config[$item->name] = Config::where('name', $item->name)->first();
}
@endphp

<footer class="main-footer">
    <div class="auto-container">
        <!--Widgets Section-->
        <div class="widgets-section wow fadeInUp">
            <div class="row">
                <div class="big-column col-xl-4 col-lg-3 col-md-12">
                    <div class="footer-column about-widget">
                        <div class="logo"><a href="#"><img src="{{ asset('images/logo_ubwork.png') }}"
                                    alt="" style="max-height: 40px;"></a>
                        </div>
                        <p class="phone-num"><span>Call us </span><a href="">0395167635</a></p>
                        <p class="address">Trịnh Văn Bô
                            <br><a href="" class="email">datmv202@gmail.com</a>
                        </p>
                    </div>
                </div>

                <div class="big-column col-xl-8 col-lg-9 col-md-12">
                    <div class="row">
                        <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4 class="widget-title">Về Chúng Tôi</h4>
                                <div class="widget-content">
                                    <ul class="list">
                                        <li><a href="{{ route('index') }}">Trang chủ</a></li>
                                        <li><a href="{{ route('blog') }}">Bài viết</a></li>
                                        <li><a href="{{ route('contact') }}">Liên Hệ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4 class="widget-title">Ứng viên</h4>
                                <div class="widget-content">
                                    <ul class="list">
                                        <li><a href="{{ route('job')}}">Việc làm</a></li>
                                        <li><a href="{{ route('company-list')}}">Công ty</a></li>
                                        <li><a href="{{ route('jobspeed')}}">Tìm việc nhanh</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4 class="widget-title">Chính sách</h4>
                                <div class="widget-content">
                                    <ul class="list">
                                        <li><a href="{{ route('blog_detail', ['id' => 1]) }}">Chính sách bảo mật</a></li>
                                        <li><a href="{{ route('blog_detail', ['id' => 2]) }}">Quy chế hoạt dộng</a></li>
                                        <li><a href="{{ route('blog_detail', ['id' => 3]) }}">Chính sách khiếu nại</a></li>
                                        <li><a href="{{ route('blog_detail', ['id' => 4]) }}">Thỏa thuận sử dụng</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4 class="widget-title">Đối tác</h4>
                                <div class="widget-content">
                                    <ul class="list">
                                        <li><a href="{{$config['Facebook']->content}}">Shark Tank</a></li>
                                        <li><a href="#">Doanh nghiệp</a></li>
                                        <li><a href="#">Trường Đại Học</a></li>
                                        <li><a href="#">Các nhà hảo tâm</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Bottom-->
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="outer-box">
                <div class="copyright-text">© 2022 <a href="#">Datmv</a>. All Right Reserved.</div>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll To Top -->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
</footer>
