@extends('client.layout.app')
@section('title')
    {{__('Upload CV')}}
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
                                <h3>Tạo CV trên hệ thống, tăng cơ hội nhận được việc làm !</h3>
                                <p class="mt-3">
                                    Tạo CV tại hệ thống chúng tôi sẽ tăng <strong>99%</strong> tìm được việc,<br>
                                    hãy tạo ngay cv cho mình nhé.
                                </p>
                            </div>

                            <div class="create-cv">
                                <div class="info mb-3">
                                    <form @if(!empty($seeker)) action="{{route('updateInfo')}}" @else action="{{route('saveInfo')}}" @endif method="post">
                                        @csrf
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="font-weight-bold" >Thông tin cá nhân</h5>
                                                <div id="block-p" style="cursor: pointer;"><i class="fas fa-edit"></i></div>
                                            </div>
                                            <div id="desc" class="mt-3" style="display: none">
                                                @if(!empty($seeker)) <input type="hidden" name="id" value="{{$seeker->id}}"> @endif
                                                <input type="hidden" name="candidate_id" value="{{auth('candidate')->user()->id}}" >
                                                <div class="form-group">
                                                    <label for="">Tên *</label>
                                                    <input type="text" name="name" class="form-control" @if(!empty($seeker)) value="{{$seeker->name}}" @endif>
                                                    @error('name')
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
                                                    <label for="">Giới thiệu chung *</label>
                                                    <textarea name="description" class="form-control" rows="3">@if(!empty($seeker)) {{$seeker->description}} @endif </textarea>
                                                    @error('description')
                                                        <small class="text-danger pl-4">
                                                            {{ $message }}
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
                                    <form action="{{route('saveExperience')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="font-weight-bold" >Kinh nghiệm làm việc</h5>
                                                <div id="block-kn" style="cursor: pointer;"><i class="fas fa-edit"></i></div>
                                            </div>
                                            <div id="experiences" class="mt-3" style="display: none">
                                                @if(!empty($seeker)) <input type="hidden" name="seeker_id" value="{{$seeker->id}}"> @endif
                                                <div class="form-group">
                                                    <label for="">Tên công ty</label>
                                                    <input type="text" name="company_name" class="form-control">
                                                    @error('company_name')
                                                        <small class="text-danger pl-4">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="">Vị trí</label>
                                                    <input type="text" name="position" class="form-control">
                                                    @error('position')
                                                        <small class="text-danger pl-4">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="">Bắt đầu</label>
                                                    <input type="date" name="start_date" class="form-control" >
                                                    @error('start_date')
                                                        <small class="text-danger pl-4">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="">Kết thúc</label>
                                                    <input type="date" name="end_date" class="form-control">
                                                    @error('end_date')
                                                        <small class="text-danger pl-4">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                               <div class="form-group mt-3">
                                                    <label for="">Mô tả</label>
                                                    <textarea name="description" class="form-control" rows="3"></textarea>
                                                    @error('description')
                                                        <small class="text-danger pl-4">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                               </div>
                                                <div class="d-flex mt-3 flex-row-reverse">
                                                    <div class="hide-button-kn btn btn-warning">Hủy</div>
                                                    <button type="submit" class="btn btn-primary" style="margin-right: 5px;">Lưu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    @if(!empty($experiences))
                                        <br>
                                        <div class="list-experiences">
                                            @foreach($list_experiences as $exp)
                                            <form action="{{route('deleteExperience', ['id' => $exp->id])}}" method="get">
                                                <button type="submit" class="btn btn-primary">Xóa</button>
                                            </form>
                                            <div class="mb-3">
                                                Tên công ty: <span>{{$exp->company_name}}</span>
                                                <div class="d-flex">
                                                    Ngày bắt đầu/kết thúc: {{date("Y-m-d", strtotime($exp->start_date))}} / {{date("Y-m-d", strtotime($exp->end_date))}}
                                                </div>
                                                <div>
                                                    Vị trí: {{$exp->position}}
                                                </div>
                                                <div>
                                                    Mô tả: {{$exp->description}}
                                                </div>
                                                -------------------------------------------
                                            </div>

                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <div class="skills mb-3">
                                    <form action="{{route('saveSkills')}}" method="post" enctype="multipart/form-data">
                                        @if(!empty($seeker)) <input type="hidden" name="seeker_id" value="{{$seeker->id}}"> @endif
                                        @csrf
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="font-weight-bold" >Kỹ năng</h5>
                                                <div id="block-sk" style="cursor: pointer;"><i class="fas fa-edit"></i></div>
                                            </div>
                                            <div id="skills" class="mt-3" style="display: none">
                                                <div class="form-group col-lg-12 col-md-12">
                                                    <select data-placeholder="Chọn ... " class="chosen-select" name="skill_id[]" multiple>
                                                        @foreach($skills as $sk)
                                                            <option value="{{$sk->id}}">{{$sk->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="d-flex mt-3 flex-row-reverse">
                                                    <div class="hide-button-sk btn btn-warning">Hủy</div>
                                                    <button type="submit" class="btn btn-primary" style="margin-right: 5px;">Lưu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="educations mb-3">
                                    <form action="{{route('saveEducation')}}" method="post">
                                        @if(!empty($seeker)) <input type="hidden" name="seeker_id" value="{{$seeker->id}}"> @endif
                                        @csrf
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="font-weight-bold" >Học vấn</h5>
                                                <div id="block-edu" style="cursor: pointer;"><i class="fas fa-edit"></i></div>
                                            </div>
                                            <div id="educations" class="mt-3" style="display: none">
                                                <div class="form-group">
                                                    <label for="">Tên trường</label>
                                                    <input type="text" name="name_education" class="form-control">
                                                    @error('name_education')
                                                        <small class="text-danger pl-4">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="">Ngành học</label>
                                                    <input type="text" name="majors" class="form-control">
                                                    @error('majors')
                                                        <small class="text-danger pl-4">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="">Bắt đầu</label>
                                                    <input type="date" name="start_date" class="form-control">
                                                    @error('start_date')
                                                        <small class="text-danger pl-4">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="">Kết thúc</label>
                                                    <input type="date" name="end_date" class="form-control">
                                                    @error('end_date')
                                                        <small class="text-danger pl-4">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                               <div class="form-group mt-3">
                                                    <label for="">Mô tả học vấn</label>
                                                    <textarea name="description" class="form-control" rows="3"></textarea>
                                                    @error('description')
                                                        <small class="text-danger pl-4">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                               </div>
                                                <div class="d-flex mt-3 flex-row-reverse">
                                                    <div class="hide-button-edu btn btn-warning">Hủy</div>
                                                    <button type="submit" class="btn btn-primary" style="margin-right: 5px;">Lưu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    @if(!empty($educations))
                                        <br>
                                        <div class="list-experiences">
                                            @foreach($list_educations as $edu)
                                            <form action="{{route('deleteEducation', ['id' => $edu->id])}}" method="get">
                                                <button type="submit" class="btn btn-primary">Xóa</button>
                                            </form>
                                            <div class="mb-3">
                                                Tên trường: <span>{{$edu->name_education}}</span>
                                                <div class="d-flex">
                                                    Ngày bắt đầu/kết thúc: {{date("Y-m-d", strtotime($edu->start_date))}} / {{date("Y-m-d", strtotime($exp->end_date))}}
                                                </div>
                                                <div>
                                                    Ngành học: {{$edu->majors}}
                                                </div>
                                                <div>
                                                    Mô tả: {{$edu->description}}
                                                </div>
                                                -------------------------------------------
                                            </div>

                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                @else
                                <small><i>*Tạo thông tin cá nhân trước !</i></small>
                                
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    @parent
    <script>
        $(document).ready(function(){
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

            // kỹ năng
            $("#block-edu").click(function(){
                $("#educations").toggle(300);
            });
            $(".hide-button-edu").click(function(){
                $("#educations").hide(300);
            })
        });
    </script>
@endsection