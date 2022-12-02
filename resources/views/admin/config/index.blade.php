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
              <form action="" class="form-inline float-right mr-3">
                <div class="form-group">
                    <input class="form-control" name="key" id="key" placeholder="Nhập cấu hình....">
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
                  <th>{{__('Tên')}}</th>
                  <th>{{__('Nội dung')}}</th>
                  <th>{{__('Trạng thái')}}</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($list as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->content}}</td>
                        <td>
                          <form action="{{route('admin.config.status', ['id' => $item->id])}}" method="post">
                            @csrf
                            @method('post')
                            <select class="stu form-select" name="status" data-id="{{$item->id}}">
                              <option @if($item->status == 0) selected @endif value="0">Chưa kích hoạt</option>
                              <option @if($item->status == 1) selected @endif value="1">Đã kích hoạt</option>
                            </select>
                          </form>
                      </td>
                        <td class="project-actions xoa text-right d-flex align-items-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                              <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form action="{{ route('admin.config.update', ['id' => $item->id])}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">{{$item->name}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <label for="inputName">{{__('Nội dung')}} <span class="text-danger">*</span></label>
                                  <input type="text" id="inputName" name="content" class="form-control" value="{{$item->content}}">
                                  @error('content')
                                  <small class="text-danger">{{$message}}</small>
                                  @enderror
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                  <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                              </div>
                            </div>
                        </form>
                    </div>
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
<script>
  $('.button-edit').click(function(){
	  var id = $(this).attr('data-id');
    console.log(id);
    $('.box_'+id).show();
});
</script>
@endsection