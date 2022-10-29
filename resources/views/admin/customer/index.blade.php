@extends('admin.layout.app')
@section('title')
    {{ __('Customer') }}
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">

      <div id="msg-box">
        <?php //Hiển thị thông báo thành công?>
        @if ( Session::has('success') )
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif
        <?php //Hiển thị thông báo lỗi?>
        @if ( Session::has('error') )
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif
    </div>


      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{$title}}</h3>
              <a href="{{route('admin.customer.add')}}" class="btn btn-primary float-right">Tạo mới</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-hover">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên</th>
                  <th>Ảnh</th>
                  <th>Email</th>
                  <th>Số điện thoại</th>
                  <th>Trạng thái</th>
                  <th>Thời gian tạo</th>
                  <th>Thời gian sửa</th>
                  <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($list as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td class="text-center"><img width="100px" src="{{asset('storage/'. $item->avatar)}}" alt=""></td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td class="text-center">
                          <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes" checked>
                        </td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td class="project-actions xoa text-right d-flex align-items-center">
                            <a class="btn btn-info btn-sm mr-3" href="{{route('admin.customer.edit', ['id' => $item->id])}}">
                              <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{route('admin.customer.delete', ['id' => $item->id])}}">
                              <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="text-center mt-3">
                {{$list->links()}} 
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection
@section('script')
@parent
<script src="{{asset('js/admin/customer.js')}}"></script>
@endsection