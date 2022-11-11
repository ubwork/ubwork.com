@extends('client.layout.app')
@section('title')
    {{ __('Upload CV') }}
@endsection
@section('content')
    <section class="ls-section">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- CV Manager Widget -->
                    <div class="cv-manager-widget ls-widget">
                        <div class="widget-title">
                            <h4>Cv Manager</h4>
                        </div>
                        <div class="widget-content">
                            <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="uploading-resume">
                                    <div class="uploadButton">
                                        <input class="uploadButton-input" type="file" name="path_cv" id="upload"
                                            multiple />
                                        <label class="cv-uploadButton" for="upload">
                                            <span class="title">Drop files here to upload</span>
                                            <span class="text">To upload file size is (Max 5Mb) and allowed file types are
                                                (.doc, .docx, .pdf)</span>
                                            <span class="theme-btn btn-style-one">Upload CV</span>
                                        </label>
                                        <span class="uploadButton-file-name"></span>
                                        <center><button type="submit" class="btn btn-danger">submit</button></center>
                                    </div>
                                </div>

                            </form>
                            <div class="files-outer">
                                @foreach ($data as $item)
                                    <div class="file-edit-box">
                                        <span class="title"><a
                                                href="upload/cv/{{ $item->path_cv }}">{{ $item->path_cv }}</a></span>
                                        <div class="edit-btns">
                                            {{-- <button><span class="la la-pencil"></span></button> --}}
                                            <a href="{{route('delete_seeker', ['id' => $item->id])}}">
                                                <button class="btn-delete-seeker"
                                                    type="button"><span class="la la-trash"></span>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
