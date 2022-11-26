@extends('admin.layout.app')
@section('title')
    {{ __('Công ty') }}
@endsection
@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{$title}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped dataTable dtr-inline">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên</th>
                  <th>Tên công ty</th>
                  <th>Ảnh</th>
                  <th>Email</th>
                  <th>Trạng thái</th>
                  <th>Số Feedback nhận được</th>
                  <th><a href="{{route('admin.company.create')}}"><i class="fa fa-plus"></i></a></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($list as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->company_name}}</td>
                        <td class="text-center"><img width="100px" src="{{asset('storage/'. $item->logo)}}" alt=""></td>
                        <td>{{$item->email}}</td>
                        <td>
                            <form action="{{route('admin.company.status', ['id' => $item->id])}}" method="post">
                              @csrf
                              @method('post')
                              <select class="stu form-select" name="status" data-id="{{$item->id}}">
                                <option @if($item->status == 0) selected @endif value="0">Chưa kích hoạt</option>
                                <option @if($item->status == 1) selected @endif value="1">Đã kích hoạt</option>
                                <option @if($item->status == 2) selected @endif value="2">Chặn</option>
                              </select>
                            </form>
                        </td>
                        <td>{{}}</td>
                        <td class="project-actions xoa text-right d-flex align-items-center">
                          <a class="btn btn-info mr-3" href="{{route('admin.company.edit', ['id' => $item->id])}}">
                            <i class="fa fa-edit"></i>
                          </a>

                          <button data-id="{{$item->id}}" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
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
@endsection
@section('script')
@parent
<script src="{{asset('js/admin/candidate.js')}}"></script>
@endsection