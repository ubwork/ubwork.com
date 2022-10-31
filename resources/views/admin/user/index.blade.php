@extends('admin.layout.app')
@section('title')
    {{ $title }}
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
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('PHONE') }}</th>
                            {{-- <th>{{ __('IMAGE') }}</th> --}}
                            {{-- <th>{{ __('ROLE') }}</th> --}}
                            <th>{{ __('STATUS') }}</th>
                            <th><a href="{{ route('admin.user.create') }}"><i class="fa fa-plus"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                </td>
                                {{-- <td>{{ $user->role->name }}</td> --}}
                                {{-- <td>
                                    <button
                                        class="btn  {{ $user->status == config('custom.user_status_text.active') ? 'btn-success' : 'btn-danger' }} btn-sm btn-update"
                                        data-id="{{ $user->id }}">{{ __($user->status) }}</button>
                                </td> --}}
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.user.edit', ['user' => $user->id]) }}"><i
                                            class="fa fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm delete-confirm" type="submit"
                                        value="{{ $user->id }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
@section('script')
    @parent
    {{-- <script src="{{ asset('assets/admin-bower/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin-bower/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin-bower/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin-bower/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin-bower/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin-bower/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin-bower/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin-bower/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin-bower/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/admin-bower/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin-bower/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin-bower/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    --}}
    <script>
        // console.log(1);
        // $("#table").DataTable({
        //     "responsive": true,
        //     "lengthChange": true,
        //     "autoWidth": true,
        //     "paging": true,
        //     "searching": true,
        //     "ordering": true,
        //     "info": true,
        //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    </script> 
    <script src="{{ asset('js/remove-ajax.js') }}"></script>
@endsection
