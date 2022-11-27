@extends('company.layout.app')
@section('title')
    {{-- {{ __('Sửa Công ty') }} --}}
@endsection
@section('content')
<style>
    .ls-pagination li a {
        border-radius: unset !important;
    }
</style>

<section class="user-dashboard">
  <div class="">

    <div class="row">
      <div class="col-lg-12">
        <!-- Ls widget -->
        <div class="ls-widget">
          <div class="tabs-box">
            <div class="widget-title">
              <h4>Hồ sơ ứng viên</h4>
  
              <div class="chosen-outer">
                <!--Tabs Box-->
                <select id="selectView" class="chosen-select">
                  <option value="-1">Trạng thái</option>
                  <option value="0">Chưa xem</option>
                  <option value="1">Đã xem</option>
                </select>

                <select class="chosen-select">
                  <option value="-1">Tất cả hồ sơ</option>
                  <option value="0">CV từ bài đăng</option>
                  <option value="1">CV từ tìm việc nhanh</option>
                  <option value="2">CV mở khóa</option>
                </select>
  
                
              </div>
            </div>
  
            <div class="widget-content">
  
              <div class="tabs-box">
                <div class="aplicants-upper-bar">
                  <h6>Danh sách ứng viên</h6>
                  <ul class="aplicantion-status tab-buttons clearfix">
                    <li class="tab-btn totals active-btn" data-tab="#totals">Tổng: {{count($listCV)}}</li>
                    <li class="tab-btn approved" data-tab="#approved">Đã phê duyệt: 0</li>
                    <li class="tab-btn rejected" data-tab="#rejected">Đã từ chối: 0</li>
                  </ul>
                </div>
  
                <div class="tabs-content">
                  <!--Tab-->
                  <div class="tab active-tab animated fadeIn" id="totals" style="display: block;">
                    <div class="rowView">
                      @include('company.manage-cv.selectView')
                    </div>
                  </div>
                </div>
                <div class="text-center">{{ $listCV->links(); }}</div>
              </div>
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
  <script src="{{asset('js/paginate.js')}}"></script>
  <script>
      $( document ).ready(function() {
        $('#selectView').change(function() {
          var id = $(this).val();
          var data = {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "id": id,
                }
            $.ajax({
              url: "manage-cv/selectView",
              type: "post",
              data: data,
              success: function(data)
              {
                $(".rowView").html(data);
              },
              error: function(){
                alert("Lỗi !!!");
              }
            });
        });
      });
  </script>
@endsection