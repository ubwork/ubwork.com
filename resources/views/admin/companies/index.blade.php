@extends('admin.layout.app')
@section('title')
    {{ __('Danh sách Công ty') }}
@endsection
@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{$title}}</h3>
              <a href="{{route('admin.company.add')}}" class="btn btn-primary float-right">Tạo mới</a>
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
                    @foreach($lists_company as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td class="text-center"><img width="100px" src="{{asset('storage/'. $item->logo)}}" alt=""></td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td class="text-center">
                          <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes" checked>
                        </td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td class="project-actions xoa text-right d-flex align-items-center">
                            <a class="btn btn-info btn-sm mr-3" href="{{route('admin.company.detail', ['id' => $item->id])}}">
                              <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{route('admin.company.delete', ['id' => $item->id])}}">
                              <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="text-center mt-3">
                {{$lists_company->links()}} 
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
@endsection