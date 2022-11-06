@extends('admin.layout.app')
@section('title')
    {{ __('Candidate') }}
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{$title}}</h3>
              <a href="{{route('admin.candidate.create')}}" class="btn btn-primary float-right">Tạo mới</a>
              <form action="" class="form-inline float-right mr-3">
                <div class="form-group">
                    <input class="form-control" name="key" id="key" placeholder="Nhập tên ứng viên....">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
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
                        <td>
                        @if($item->status == 0)
                        Đóng
                        @elseif($item->status == 1)
                        Hoạt động
                        @elseif($item->status == 2)
                        Chặn
                        @endif
                      </td>
                        
                        <td class="project-actions xoa text-right d-flex align-items-center">
                            <a class="btn btn-info btn-sm mr-3" href="{{route('admin.candidate.edit', ['id' => $item->id])}}">
                              <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{route('admin.candidate.destroy', ['id' => $item->id])}}" method="post">
                              @csrf
                              <button onclick="return Del()" class="btn btn-danger btn-sm" type="submit"
                                        value="{{ $item->id }}"><i class="fa fa-trash"></i></button>
                            </form>
                            
                            {{-- <a onclick="" class="btn btn-danger btn-sm" href="{{route('admin.candidate.destroy', ['id' => $item->id])}}">
                              <i class="fas fa-trash"></i>
                            </a> --}}
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
<script>
  function Del() {
    return confirm('Bạn có chắc chắn muốn xóa');
  }
</script>
<script src="{{ asset('js/remove-ajax.js') }}"></script>
<script src="{{asset('js/admin/Candidate.js')}}"></script>
@endsection