@extends('company.layout.app')
@section('style')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/admin-bower/plugins/summernote/summernote-bs5.min.css') }}">
    <style>
        .card {
            height: auto;
        }

        textarea .description ul {
            list-style: disc !important;
            list-style-position: inside !important;
        }

        textarea .description ol {
            list-style: decimal !important;
            list-style-position: inside !important;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>{{ $title }}</h4>
                    </div>

                    <div class="widget-content">
                        <form class="default-form">
                            <div class="row">
                                <div class="column col-12">
                                    <!--Accordian Box-->
                                    <ul class="accordion-box" style="border-radius: 0px">
                                        <!--Block-->
                                        <li class="accordion block active-block">
                                            <div class="acc-btn active">Thông tin chung <span
                                                    class="icon flaticon-add"></span></div>
                                            <div class="acc-content current">
                                                <div class="content row">
                                                    <div class="form-group col-lg-12 col-md-12">
                                                        <label>Tiêu đề tin tuyển dụng</label>
                                                        <input type="text" name="title" value="" placeholder="Tiêu đề">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-12">
                                                        <label>Chuyên nghành</label>
                                                        <select data-placeholder="Chọn ... " class="chosen-select">
                                                            <option value="IT ">IT việc </option>
                                                            <option value="PHP">PHP</option>
                                                            <option value="PHP">PHP</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-12">
                                                        <label>Kinh nghiệm</label>
                                                        <select class="chosen-select">
                                                            <option>Chưa có kinh nghiệm</option>
                                                            <option selected>Dưới 1 năm kinh nghiệm</option>
                                                            <option>1 năm kinh nghiệm</option>
                                                            <option>2 năm kinh nghiệm</option>
                                                            <option>3 năm kinh nghiệm</option>
                                                            <option>4 năm kinh nghiệm</option>
                                                            <option>5 năm kinh nghiệm</option>
                                                            <option>Trên 5 năm kinh nghiệm</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-3 col-md-12">
                                                        <label>Số lượng</label>
                                                        <input type="number">
                                                    </div>
                                                    <div class="form-group col-lg-3 col-md-12">
                                                        <label>Loại công việc</label>
                                                        <select class="chosen-select">
                                                            <option>Toàn thời gian</option>
                                                            <option>Bán thời gian</option>
                                                            <option>Thực tập</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-3 col-md-12">
                                                        <label>Giới tính</label>
                                                        <select class="chosen-select">
                                                            <option>--Chọn--</option>
                                                            <option>Nam</option>
                                                            <option>Nữ</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-3 col-md-12">
                                                        <label>Cấp bậc</label>
                                                        <select class="chosen-select">
                                                            <option>Thực tập sinh</option>
                                                            <option>Nhân viên</option>
                                                            <option>Trưởng nhóm</option>
                                                            <option>Trưởng/phó phòng</option>
                                                            <option>Trưởng chi nhánh</option>
                                                            <option>Phó giám đốc</option>
                                                            <option>Giám đốc</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-4 col-md-12">
                                                        <label>Kiểu lương</label>
                                                        <select class="chosen-select">
                                                            <option>Trong khoảng</option>
                                                            <option>Từ</option>
                                                            <option>Đến</option>
                                                            <option>Thoản thuận</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-4 col-md-12">
                                                        <label>Từ</label>
                                                        <input type="number">
                                                    </div>
                                                    <div class="form-group col-lg-4 col-md-12">
                                                        <label>Đến</label>
                                                        <input type="number">
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12">
                                                        <label>Địa chỉ</label>
                                                        <input type="text" name="name"
                                                            placeholder="329 Queensberry Street, North Melbourne VIC 3051, Australia.">
                                                    </div>
                    
                                                </div>
                                            </div>
                                        </li>

                                        <!--Block-->
                                        <li class="accordion block">
                                            <div class="acc-btn"> Nội dung tuyển dụng chi tiết <span
                                                    class="icon flaticon-add"></span></div>
                                            <div class="acc-content">
                                                <div class="content row">
                                                    <div class="form-group col-lg-12 col-md-12">
                                                        <label>Mô tả công việc</label>
                                                        <textarea class="description" placeholder=""></textarea>
                                                    </div>
                    
                                                    <div class="form-group col-lg-12 col-md-12">
                                                        <label>Yêu cầu công việc</label>
                                                        <textarea class="description" placeholder=""></textarea>
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12">
                                                        <label>Kĩ năng liên quan</label>
                                                        <select data-placeholder="Chọn ... " class="chosen-select" multiple>
                                                            <option value="IT ">IT việc </option>
                                                            <option value="PHP">PHP</option>
                                                            <option value="PHP">PHP</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12">
                                                        <label>Quyền lợi</label>
                                                        <textarea class="description" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <!-- Input -->
                              
                                <!-- About Company -->
                              
                                <!-- Input -->
                                <div class="form-group col-lg-12 col-md-12 text-right">
                                    <button class="theme-btn btn-style-one">Next</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @parent
    <script src="{{ asset('assets/admin-bower/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.description').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', [13]],
                    ['para', ['ul', 'ol']],
                ],
                height: 150,
            });
        });
    </script>
@endsection
