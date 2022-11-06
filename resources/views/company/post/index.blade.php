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
                  <tr>
                    <td>
                      <h6>Senior Full Stack Engineer, Creator Success</h6>
                    </td>
                    <td class="applied"><a href="#">3+ Applied</a></td>
                    <td>October 27, 2017 <br>April 25, 2011</td>
                    <td class="status">Active</td>
                    <td>
                      <div class="option-box">
                        <ul class="option-list d-block text-center">
                          <li class="mb-2"><button data-text="Chi tiết"><span class="la la-eye"></span></button></li>
                          <li><button data-text="Chỉnh sửa tin"><span class="la la-pencil"></span></button></li>
                          {{-- <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li> --}}
                        </ul>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Info Section -->
@endsection
