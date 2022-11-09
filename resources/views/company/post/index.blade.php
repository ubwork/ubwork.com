@extends('company.layout.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
      <!-- Ls widget -->
      <div class="ls-widget">
        <div class="tabs-box">
          <div class="widget-title">
            <h4>{{$title}}</h4>

            {{-- <div class="chosen-outer">
              <!--Tabs Box-->
              <select class="chosen-select">
                <option>Last 6 Months</option>
                <option>Last 12 Months</option>
                <option>Last 16 Months</option>
                <option>Last 24 Months</option>
                <option>Last 5 year</option>
              </select>
            </div> --}}
          </div>

          <div class="widget-content">
            <div class="table-outer">
              <table class="default-table manage-job-table">
                <thead>
                  <tr>
                    <th>Tin tuyển dụng</th>
                    <th>Ứng tuyển</th>
                    <th>Bắt đầu & kết thúc</th>
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
                    </td>
                    <td class="applied"><a href="{{route('company.post.profileApply',$item->id)}}">{{$item->activities->count()}} CV</a></td>
                    <td>{{date_format(new DateTime($item->start_date),"d/m/Y")}} <br>{{date_format(new DateTime($item->end_date),"d/m/Y")}}</td>
                    <td class="status">{{$item->status}}</td>
                    <td>
                      <div class="option-box">
                        <ul class="option-list d-block text-center">
                          <li class="mb-2"><button data-text="Chi tiết"><span class="la la-eye"></span></button></li>
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
