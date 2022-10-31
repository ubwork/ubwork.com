@extends('admin.layout.app')
@section('title')
    {{ __($title) }}
@endsection
@section('style')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/admin-bower/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin-bower/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin-bower/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-header">
                <h3 class="card-title">{{ __($title) }}</h3>
                <p class="">
                </p>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('NAME') }}</th>
                            <th>{{ __('DISPLAY_NAME') }}</th>
                            <th>
                                <a href="{{route('admin.permission.create')}}"><i class="fa fa-plus"></i></a>
                                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formAdd">
                                    <i class="fa fa-plus"></i>
                                  </button> --}}
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->display_name }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.permission.edit', ['permission' => $permission->id]) }}"><i
                                            class="fa fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm delete-confirm" type="submit"
                                        value="{{ $permission->id }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
      <!-- Modal -->
      <div class="modal fade" id="formAdd" tabindex="-1" role="dialog" aria-labelledby="formAddLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="formAddLabel">{{__('Permission add')}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="Name">{{ __('NAME') }}</label>
                    <input type="text" class="form-control" name="name" id="nameInput"
                        placeholder="{{ __('Enter Name') }}">
                </div>
                <div class="form-group">
                    <label for="Name">{{ __('DISPLAY_NAME') }}</label>
                    <input type="text" class="form-control" name="name" id="nameInput"
                        placeholder="{{ __('Enter Name') }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">{{__('SAVE')}}</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('script')
    @parent
    <script src="{{ asset('js/remove-ajax.js') }}"></script>
@endsection
