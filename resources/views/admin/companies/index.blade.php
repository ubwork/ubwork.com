@extends('admin.layout.app')
@section('title')
    {{ __('Danh sách Công ty') }}
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <form action="" method="get" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="keyword" value="" class="form-control mr-2" placeholder="Tìm kiếm...">
                    </div>
                    <input class="btn btn-sm btn-outline-dark" type="submit" value="Tìm kiếm">
                </form>
            </div>
            <div class="card-body">
                <table class="table tabl-stripped">
                    <thead>
                        <th>STT</th>
                        <th>Name</th>
                        <th>logo</th>
                        <th>company_name</th>
                        <th>zipcode</th>
                        <th>phone</th>
                        <th>email</th>
                        <th>tax_code</th>
                        <th>is_active</th>
                        <th>status</th>
                        <th>created_at</th>
                        <th>update_at</th>
                        <th>
                            <a href="">Tạo mới</a>
                        </th>
                    </thead>
                    <tbody>
                    </tbody>
                        <tbody>
                        <?php foreach ($lists_company as $index => $item) : ?>
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->logo}}</td>
                                <td>{{$item->company_name}}</td>
                                <td>{{$item->zipcode}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->tax_code}}</td>
                                <td>{{$item->is_active}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>     
                                <td>
                                    <a href="" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection