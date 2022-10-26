@extends('admin.layout.app')
@section('title')
    {{ __('Customer') }}
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
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
                        <td>{{$item->status==1 ? "Hoạt động" : "Không hoạt động" }}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td class="project-actions text-right d-flex align-items-center">
                            <a class="btn btn-info btn-sm mr-3" href="#">
                              <i class="fas fa-edit"></i>
                            </a>
                            <a id="delete" class="btn btn-danger btn-sm" href="#">
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