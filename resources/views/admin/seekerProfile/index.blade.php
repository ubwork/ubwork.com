@extends('admin.layout.app')
@section('title')
    {{ __('SeekerProfile') }}
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
                    <input class="form-control" name="key" id="key" placeholder="Nhập tên ứng viên ....">
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
                  <th>{{__('Tên Ứng viên')}}</th>
                  <th>{{__('Email')}}</th>
                  <th>{{__('SĐT')}}</th>
                  <th>{{__('Giá trị Cv')}}</th>
                  <th>{{__('Cv ứng viên')}}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($can as $kcan)
                        @foreach ($kcan as $item )
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                                @foreach ( $data as $u )
                                    @if ($item->id == $u->candidate_id)
                                    <td>{{$u->coin}}</td>
                                    <td>
                                       <a target="_blank" href="../upload/cv/{{ $u->path_cv }}">Xem CV</a>
                                    </td>
                                    @endif
                                @endforeach
                            <td class="project-actions xoa text-right d-flex align-items-center">
                                
                                @foreach ( $data as $u )
                                    @if ($item->id == $u->candidate_id)
                                    <a class="btn btn-info mr-3" href="{{route('admin.seekerProfile.edit', ['id' => $u->id])}}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                        <button data-id="{{$u->id}}" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
              </table>
              <div class="text-center mt-3">
              
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