@extends('admin.layout.app')
@section('title')
    {{ __('Danh sách liên hệ') }}
@endsection
@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{'Danh sách liên hệ'}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped dataTable dtr-inline">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên</th>
                  <th>Email</th>
                  <th>Số điện thoại</th>
                  <th>Tiêu đề</th>
                  <th>Nội dung</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($contact as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->content}}</td>
                        <td class="project-actions xoa text-right d-flex align-items-center">
                          <button data-id="{{$item->id}}" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="text-center mt-3">
                {{-- {{$list->links()}}  --}}
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
@endsection
@section('script')
@parent
<script src="{{asset('js/admin/candidate.js')}}"></script>
@endsection