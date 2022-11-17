@extends('company.layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
      <!-- Ls widget -->
      <div class="ls-widget">
        <div class="tabs-box">
          <div class="widget-title">
            <h4>{{$title}}</h4>

            <div class="chosen-outer ">
                <div class="form-group border-1">
                  <input type="text" name="title" value="{{ old('title')}}" placeholder="Tìm kiếm">
              </div>
            </div>
          </div>

          <div class="widget-content">
            <div class="table-outer">
              <table class="default-table manage-job-table">
                <thead>
                  <tr>
                    <th>Tin tuyển dụng</th>
                    <th>Chi tiết</th>
                    <th>Trạng thái</th>
                    <th >
                        <button class="add-info-btn text-center"><a href="{{route('company.post.create')}}"><span class="icon flaticon-plus"></span></a></button>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $item)
                  <tr>
                    <td>
                      <h6>{{$item->title}}</h6>
                      <span><a class="btn bg-light btn-sm" href="{{route('company.post.profileApply',$item->id)}}"> Xem CV</a></span>
                    </td>
                    <td>Lượt ứng tuyển: {{$item->activities->count()}} <br> Ngày hết hạn: {{date_format(new DateTime($item->end_date),"d/m/Y")}} </td>
                    <td class="status">{{$item->status}}</td>
                    <td>
                      <div class="option-box">
                        <ul class="option-list d-block text-center">
                          <li class="mb-2"><a href="{{route('job-detail',$item->id)}}"><button data-text="Chi tiết"><span class="la la-eye"></span></button></a></li>
                          <li><a href="{{route('company.post.edit',$item->id)}}"><button data-text="Chỉnh sửa tin"><span class="la la-pencil"></span></button></a></li>
                          {{-- <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li> --}}
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
    <!-- End Info Section -->
@endsection
