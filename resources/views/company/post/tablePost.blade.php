<table class="default-table manage-job-table">
    <thead>
        <tr>
            <th>Tin tuyển dụng</th>
            <th>Vị trí</th>
            <th>Chi tiết</th>
            <th>Trạng thái</th>
            <th>
                <button class="add-info-btn text-center"><a href="{{ route('company.post.create') }}"><span
                            class="icon flaticon-plus"></span></a></button>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $item)
            <tr>
                <td>
                    <h6>{{ $item->title }}</h6>
                    <span><button class="btn bg-light btn-sm btn_profileApplied"
                            href="{{ url("company/post/profileApply/$item->id") }}"> Xem CV</button></span>
                </td>
                <td>
                    {{config('custom.level')[$item->level]['name']}}
                </td>
                <td>Lượt ứng tuyển: {{ $item->activities->count() }} <br> Ngày hết hạn:
                    {{ date_format(new DateTime($item->end_date), 'd/m/Y') }} </td>
                <td class="status">{{ $item->status }}</td>
                <td>
                    <div class="option-box">
                        <ul class="option-list d-block text-center">
                            <li class="mb-2"><a target="_blank" href="{{ route('job-detail', $item->id) }}"><button
                                        data-text="Chi tiết"><span class="la la-eye"></span></button></a></li>
                            <li><a href="{{ route('company.post.edit', $item->id) }}"><button
                                        data-text="Chỉnh sửa tin"><span class="la la-pencil"></span></button></a></li>
                            {{-- <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li> --}}
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <!-- Pagination -->
        <tr>
            <td>
                <nav class="ls-pagination">
                    {{ $posts->links('company.layout.paginate') }}
                </nav>
            </td>
        </tr>
    </tfoot>
</table>
