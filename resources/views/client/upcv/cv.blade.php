@extends('client.layout.app')
@section('style')
<style>
    .border-bot {
        border-bottom: 1px solid #f7941d;
        padding-bottom: 10px;
        width: 100%;
    }

    .border-dotted-bot {
        border-bottom: 1px dotted #f7941d;
        padding-bottom: 10px;
        width: 100%;
    }
    .form {
        border: 1px dotted #f7941d;
        padding: 10px;
    }
    .form:hover {
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }
    i {
        color: #f7941d;
    }
    .col-lg-12 {
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    }
    .border-none {
        border: none;
    }
</style>
@parent
@endsection
@section('title')
    {{ __('UB Work') }} | {{__('Tạo CV')}}
@endsection
@section('content')
    <section class="ls-section mt-5">
        <div class="container-fluid" style="max-width: 670px">
            <div class="row">

                <div class="col-lg-12">
                    <!-- CV Manager Widget -->
                    <div class="cv-manager-widget ls-widget">
                        <div class="widget-title">
                            <h4>Tạo CV</h4>
                        </div>
                        <div class="widget-content">
                            <div class="title">
                                <h1>Tạo CV trên hệ thống, tăng cơ hội nhận được việc làm !</h1>
                                <p class="mt-3">
                                    Tạo CV tại hệ thống chúng tôi sẽ tăng <strong>99%</strong> tìm được việc,<br>
                                    hãy tạo ngay cv cho mình nhé.
                                </p>
                            </div>

                            <div class="create-cv">
                                <div class="info mb-3">
                                    <form @if(!empty($seeker)) action="{{route('updateInfo')}}" @else action="{{route('saveInfo')}}" @endif method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <div class="font-weight-bold h4" >Thông tin cá nhân</div>
                                                <div id="block-p" style="cursor: pointer;"><i class="fas fa-edit"></i></div>
                                            </div>
                                            <div id="desc" class="mt-3 form" style="display: none">
                                                @if(!empty($seeker)) <input type="hidden" name="id" value="{{$seeker->id}}"> @endif
                                                <input type="hidden" name="candidate_id" value="{{auth('candidate')->user()->id}}" >
                                                <div class="form-group">
                                                    <label for="">Họ và tên *</label>
                                                    <input type="text" name="name" class="form-control" @if(!empty($seeker)) value="{{$seeker->name}}" @endif>
                                                    @error('name')
                                                        <small class="text-danger pl-4">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label class="form-label w-100">Ảnh</label>
                                                    <img id="image" @if(!empty($seeker)) src="{{ $seeker->image?''.Storage::url($seeker->image):'http://placehold.it/100x100' }}" @else src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" @endif alt="your image"
                                                        style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                                                    <input name="image" type="file" id="img">
                                                    <small class="form-text text-muted">Chọn ảnh kích thước nhỏ hơn 5mb</small>
                                                    @error('image')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                  </div>
                                                  <div class="form-group mt-3">
                                                    <label for="">Địa chỉ *</label>
                                                    <input type="text" name="address" class="form-control" @if(!empty($seeker)) value="{{$seeker->address}}" @endif>
                                                    @error('address')
                                                        <small class="text-danger pl-4">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="">Số điện thoại *</label>
                                                    <input type="number" name="phone" class="form-control" @if(!empty($seeker)) value="{{$seeker->phone}}" @endif>
                                                    @error('phone')
                                                        <small class="text-danger pl-4">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="">Email *</label>
                                                    <input type="email" name="email" class="form-control" @if(!empty($seeker)) value="{{$seeker->email}}" @endif>
                                                    @error('email')
                                                        <small class="text-danger pl-4">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="">Chuyên ngành *</label>
                                                    <select name="major_id" class="form-select">
                                                        @foreach($major as $mj)
                                                            <option @if(!empty($seeker)) @if($seeker->major_id == $mj->id) selected @endif @endif value="{{$mj->id}}">{{$mj->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('major_id')
                                                        <small class="text-danger pl-4">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                               <div class="form-group mt-3">
                                                    <label for="">Giới thiệu chung *</label>
                                                    <textarea name="description" class="form-control" rows="3">@if(!empty($seeker)) {{$seeker->description}} @endif </textarea>
                                                    @error('description')
                                                        <small class="text-danger pl-4">
                                                            {{ $message }}
                                                            <br>
                                                        </small>
                                                    @enderror
                                                    <small class="text-red"><i>Gợi ý: Giới thiệu số năm kinh nghiệm làm việc và mục tiêu của bản thân</i></small>
                                               </div>
                                                <div class="d-flex mt-3 flex-row-reverse">
                                                    <div class="hide-button btn btn-warning">Hủy</div>
                                                    <button type="submit" class="btn btn-primary" style="margin-right: 5px;">Lưu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                @if(!empty($seeker))
                                <div class="experiences mb-3">
                                    @include('client.upcv.experiences')
                                </div>

                                <div class="skills mb-3">
                                    @include('client.upcv.skills')
                                </div>

                                <div class="educations mb-3">
                                    @include('client.upcv.educations')
                                </div>

                                <div class="certificates mb-3">
                                    @include('client.upcv.certificates')
                                </div>
                                @else
                                <small><i>*Vui lòng tạo thông tin cá nhân trước !</i></small>
                                @endif
                            </div>
                            @if(!empty($seeker))
                            <div class="mt-5 text-center">
                                <a href="{{route('getPdf')}}" class="btn btn-primary">Cập nhật CV</a>
                                
                            </div>
                            @endif
                        </div>
                    </div>
                    <small class="text-red"><i>Ghi chú: Các trường có * là bắt buộc nhập</i></small>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    @parent
    <script>
        $(document).ready(function(){

            $('#formSkill').submit(function(e){
                e.preventDefault();
                var url = $('#formSkill').attr('action');
                var seeker_id = $('input[name=seeker_id]').val();
                var skill_id = [];
                $("#skills option:selected").each(function() {
                    skill_id.push($(this).val());
                });
                var data = {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "skill_id": skill_id,
                    "seeker_id": seeker_id
                }
                $.ajax({
                type: "POST",
                url: url,
                data: data,
                    success: function(response) {
                        toastr.success(response.success)
                    },
                    error: function(response) {
                        toastr.error("Cập nhật thất bại")
                    }
                });
            });

            $("#block-p").click(function(){
                $("#desc").toggle(300);
            });
            $(".hide-button").click(function(){
                $("#desc").hide(300);
            });

            // kinh nghiệm làm việc
            $("#block-kn").click(function(){
                $("#experiences").toggle(300);
            });
            $(".hide-button-kn").click(function(){
                $("#experiences").hide(300);
            })

            // kỹ năng
            $("#block-sk").click(function(){
                $("#skills").toggle(300);
            });
            $(".hide-button-sk").click(function(){
                $("#skills").hide(300);
            })

            // trường học
            $("#block-edu").click(function(){
                $("#educations").toggle(300);
            });
            $(".hide-button-edu").click(function(){
                $("#educations").hide(300);
            })

            // chứng chỉ
            $("#block-cer").click(function(){
                $("#certificates").toggle(300);
            });
            $(".hide-button-cer").click(function(){
                $("#certificates").hide(300);
            })
        });

        $(function(){
            function readURL(input, selector) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        $(selector).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#img").change(function () {
                readURL(this, '#image');
            });

        });

        function Del(id) {
            if(!confirm('Bạn có muốn xóa?')){
                return false;
            }
        }

        function EditFormId(id) {
            $('#EditHide'+id).hide(300);
            $("#EditForm"+id).toggle(300);
            $('#form-border'+id).addClass('border-none');
            $('#btnForm'+id).hide();

            $('.hide-button-exp'+id).click(function () {
                $("#EditForm"+id).hide(300);
                $('#EditHide'+id).show();
                $('#btnForm'+id).show();
                $('#form-border'+id).removeClass('border-none');
            })
        }

        function EditFormEduEduId(id) {
            $('#EditHideEdu'+id).hide(300);
            $("#EditFormEdu"+id).toggle(300);
            $('#form-border-edu'+id).addClass('border-none');
            $('#btnFormEdu'+id).hide();

            $('.hide-button-exp'+id).click(function () {
                $("#EditFormEdu"+id).hide(300);
                $('#EditHideEdu'+id).show();
                $('#btnFormEdu'+id).show();
                $('#form-border-edu'+id).removeClass('border-none');
            })
        }

        function EditFormCerId(id) {
            $('#EditHideCer'+id).hide(300);
            $("#EditFormCer"+id).toggle(300);
            $('#form-border-cer'+id).addClass('border-none');
            $('#btnFormCer'+id).hide();

            $('.hide-button-cer'+id).click(function () {
                $("#EditFormCer"+id).hide(300);
                $('#EditHideCer'+id).show();
                $('#btnFormCer'+id).show();
                $('#form-border-cer'+id).removeClass('border-none');
            })
        }
    </script>
@endsection
