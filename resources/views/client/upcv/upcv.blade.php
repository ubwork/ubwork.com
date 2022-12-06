@extends('client.layout.app')
@section('title')
{{ __('UB Work') }} | {{'Quản lý CV'}}
@endsection
@section('content')
    <section class="ls-section mt-5">
        <div class="container-fluid" style="max-width: 720px">
            <div class="row">

                <div class="col-lg-12">
                    <!-- CV Manager Widget -->
                    <div class="cv-manager-widget ls-widget">
                        <div class="widget-title">
                            <h4>Quản lý CV</h4>
                        </div>
                        <center>
                            
                            @if ($errors->any())
                                <div class="h4 text-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </center>
                        <div class="widget-content">
                            <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="uploading-resume">
                                    <div class="uploadButton">
                                        <input class="uploadButton-input" type="file" name="path_cv" id="upload"
                                            multiple />
                                        <label class="cv-uploadButton" for="upload">
                                            <span class="title">Click vào đây để upload</span>
                                            <span class="text">Kích thước tệp tải lên là (Tối đa 2Mb) và các loại tệp được phép là .pdf</span>
                                            <span class="theme-btn btn-style-one">Upload CV</span>
                                        </label>
                                        <span class="uploadButton-file-name"></span>
                                        <center><button type="submit" class="btn btn-danger">Gửi</button></center>
                                    </div>
                                </div>
                            </form>
                            <div class="files-outer mt-3">
                                @foreach ($data as $item)
                                    <div class="file-edit-box">
                                        <span class="title"><a target="_blank"
                                                href="upload/cv/{{ $item->path_cv }}">{{ $item->path_cv }}</a></span>
                                        <div class="edit-btns">
                                            <a href="{{ route('CreateCV', ['idsee' => $item->id]) }}"><span class="la la-pencil"></span></a>
                                            <a href="{{ route('delete_seeker', ['id' => $item->id]) }}">
                                                <button class="btn-delete-seeker" type="button"><span
                                                        class="la la-trash"></span>
                                                </button>
                                            </a>
                                        </div>
                                        <small>CV-{{$item->name}}</small>
                                        @if($item->is_active == 0)
                                        <a class="btn btn-primary" href="{{route('activeCV', ['idsee' => $item->id])}}">
                                            Bật
                                        </a>
                                        @else
                                        <a class="btn btn-primary" href="{{route('unActiveCV', ['idsee' => $item->id])}}">
                                            Tắt
                                        </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
