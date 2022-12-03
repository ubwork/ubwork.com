@extends('admin.layout.app')
@section('title')
    {{ __('Blog') }}
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{$title}}</h3>
              <form action="" class="form-inline float-right mr-3">
                <div class="form-group">
                    <input class="form-control" name="key" id="key" placeholder="Nhập tiêu đề bài viết....">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped dataTable dtr-inline">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>{{__('Tiêu đề')}}</th>
                  <th>{{__('Mô tả')}}</th>
                  <th>{{__('Tác giả')}}</th>
                  <th>{{__('Trạng thái')}}</th>
                  <th><a href="{{route('admin.blog.create')}}"><i class="fa fa-plus"></i></a></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($list as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->author->name}}</td>
                        <td>
                          <form action="{{route('admin.blog.status', ['id' => $item->id])}}" method="post">
                            @csrf
                            @method('post')
                            <select class="stu form-select" name="status" data-id="{{$item->id}}">
                              <option @if($item->status == 0) selected @endif value="0">Chưa kích hoạt</option>
                              <option @if($item->status == 1) selected @endif value="1">Đã kích hoạt</option>
                            </select>
                          </form>
                      </td>
                        
                        <td class="project-actions xoa text-right d-flex align-items-center">
                            <a class="btn btn-info mr-3" href="{{route('admin.blog.edit', ['id' => $item->id])}}">
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
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection
@section('script')
@parent
<script src="{{asset('js/admin/candidate.js')}}"></script>
@endsection