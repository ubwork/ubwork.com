@extends('client.layout.app')
@section('title')
    {{ __('UB Work') }}
@endsection
@section('content')
    <section class="page-title style-three">
        <h1>Tìm Kiếm Nhanh</h1>
        <form action="send" method="GET">
            <div class="auto-container">
                <div class="top-filters" style="margin-top: 100px ">
                    <div class="form-group">
                        <select class="chosen-select" name="major">
                            <option value="">Mời Chọn Chuyên Ngành</option>
                            @foreach ($maJor as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="width:181px">
                        <select class="chosen-select" name="skill">
                            <option value="">Mời Chọn Kỹ Năng</option>
                            @foreach ($skill as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="theme-btn btn-style-one" style="margin-top: 50px " type="submit">Tìm Kiếm</button>
            </div>
        </form>
    </section>
@endsection
