@extends('company.layout.app')
@section('title')
    {{ __('Sửa Công ty') }}
@endsection
@section('content')
<section class="user-dashboard">
    <div class="dashboard-outer">
      <div class="upper-title-box">
        <h3>Giấy phép kinh doanh</h3>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <!-- Ls widget -->
          <div class="ls-widget">
            <div class="tabs-box">
              <div class="widget-title">
                <h4>Thông tin giấy phép kinh doanh</h4>
              </div>
              <div class="widget-content">
                {{-- @dd($data); --}}
                <form class="default-form" action="{{route('company.image-paper.update')}}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="form-group col-lg-6 col-md-12">
                      <label>Trạng thái :</label> 
                      @if ($data->status == 0)
                      <span class="text-warning" style="font-weight: 900">Chờ duyệt</span>
                      @endif
                </div>
                <div class="form-group col-lg-6 col-md-12">
                    <label>Giấy phép kinh doanh / Giấy ủy quyền / Thẻ nhân viên</label>    
                </div>
                  
                  <div class="uploading-outer">
                    <div class="uploadButton">
                      <input class="uploadButton-input" type="file" name="image_paper" accept="image/*, application/pdf" id="upload" multiple />
                      <label class="uploadButton-button ripple-effect fileupload-preview thumbnail" for="upload"><img id="image" src="{{asset('storage/images/image_paper/'. $data->image_paper)}}" alt="Ảnh của bạn"
                        style="width: 201px;max-height: 111px; margin-bottom: 28px;object-fit: cover;" class="img-fluid"/></label>
                      <span class="uploadButton-file-name"></span>
                    </div>
                    <div class="text">Dung lượng file không vượt quá 5MB</div>
                  </div>

                <input type="hidden" name="image_paper_old" value="{{$data->image_paper}}">
                    <div class="form-group col-lg-6 col-md-12">
                      <button class="theme-btn btn-style-one">Save</button>
                    </div>
                    {{-- <div class="form-group col-lg-6 col-md-12">
                      <label>Tài liệu hướng dẫn</label>    
                  </div> --}}
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
@endsection