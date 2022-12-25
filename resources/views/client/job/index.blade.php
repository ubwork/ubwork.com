@extends('client.layout.app')
@section('title')
    {{ __('UB Work') }} | {{ __('Danh sách công việc') }}
@endsection
@section('style')
    @parent
    <style>
        .chosen-choices {
            padding-left: 5px !important;
        }
    </style>
@endsection
@section('content')
    <section class="page-title " style="margin-top: 90px">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Danh sách công việc </h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('index') }}">Trang chủ</a></li>
                    <li>Công việc</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="ls-section">
        <div class="auto-container">
            <div class="filters-backdrop"></div>
            <div class="row">
                <form class="job-search-form" action=""
                    style="display:flex;justify-content:space-around;align-items:center">
                    <div class="form-group" style="width: calc(100% - 150px);">
                        <div class="row">
                            <div class="form-group col-lg-3 col-md-12 col-sm-12">
                                <span class="icon flaticon-search-1"></span>
                                <input type="text" class="form-control search-input" id="search-text" name="search"
                                    placeholder="Mời Nhập Từ Khóa">
                            </div>
                            <div class="form-group col-lg-3 col-md-12 col-sm-12 border-right">
                                <span class="icon fa fa-history"></span>
                                <select name="type" id="search-type" name="type" class="chosen-select">
                                    <option value="">Mời Chọn</option>
                                    @foreach (config('custom.type_work') as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-3 col-md-12 col-sm-12">
                                <span class="icon flaticon-briefcase"></span>
                                <select name="major" id="search-major" class="chosen-select">
                                    <option value="">Chuyên Ngành</option>
                                    @foreach ($maJor as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-3 col-md-12 col-sm-12">
                                <span class="icon flaticon-pencil"></span>
                                <select name="level" id="search-level" class="chosen-select">
                                    <option value="">Cấp bậc</option>
                                    @foreach (config('custom.level') as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row border-top">
                            {{-- <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                <select data-placeholder="Chọn ngôn ngữ... " name="major" id="search-major"
                                    class="chosen-select" multiple>
                                    @foreach ($maJor as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group col-lg-5 col-md-12 col-sm-12">
                                <select data-placeholder="Chọn kỹ năng... " id="search-skill" class="chosen-select"
                                    name="skill[]" multiple>
                                    @foreach ($Skill as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                <span class="icon fa fa-history"></span>
                                <select name="experience" id="search-experience" name="experience" class="chosen-select">
                                    <option value="">Yêu cầu kinh nghiệm</option>
                                    @foreach (config('custom.experience') as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-3 col-md-12 col-sm-12">
                                <span class="icon flaticon-map-locator"></span>
                                <select name="area" id="search-area" class="chosen-select">
                                    <option value="">Khu vực</option>
                                    @foreach (config('custom.area') as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-1 col-md-12 col-sm-12 p-0">
                        <button type="submit" href="{{ url('job') }}" id="button_search"
                            class="theme-btn btn-style-one btn-search rounded-right">Tìm Kiếm</button>
                    </div>
                </form>
                <div class="content-column col-lg-12 view-table">
                    @include('client.job.table-job')
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    @parent
    <script type="text/javascript" src="{{ asset('js/client/shortlist.js') }}"></script>
    <script>
        updateShortList();

        function isUndefined(value) {
            return value === undefined || value === null
        }
        $(document).on("click", ".pagination li a,#button_search", function(e) {
            e.preventDefault();
            var area = $("#search-area").val();
            // var skill = $("#search-skill").val();
            var major = $("#search-major").val();
            var text = $("#search-text").val();
            var type = $("#search-type").val();
            var level = $("#search-level").val();
            var skills = $("#search-skill").val();
            var experience = $("#search-experience").val();

            var elementArray = $('#search-skill').serializeArray();
            var modifiedArray = [];
            var counts = {};
            var multipleValues = {};
            $.each(elementArray, function(index, value) {
            if (counts[value.name]){ counts[value.name] += 1; } else { counts[value.name] = 1; }
            });
            $.each(elementArray, function(index, value) {
            if (multipleValues[value.name] || counts[value.name] > 1){ 
                if (!multipleValues[value.name]) { multipleValues[value.name] = 0; } else { multipleValues[value.name] += 1; }
                modifiedArray.push({name: value.name + "_" + multipleValues[value.name], value: value.value});
            } else {
                modifiedArray.push({name: value.name, value: value.value});
            }
            });
            var result = $.param(modifiedArray);
            var urlSkill = "&textSkill="+result;
            var url = $(this).attr("href");
            var append = url.indexOf("?") == -1 ? "?" : "&";
            var finalURL = url + append;
            if (area.length > 0) {
                finalURL += "&" + $("#search-area").serialize();
            }
            if (major.length > 0) {
                finalURL += "&" + $("#search-major").serialize();
            }
            if (text.length > 0) {
                finalURL += "&" + $("#search-text").serialize();
            }
            if (type.length > 0) {
                finalURL += "&" + $("#search-type").serialize();
            }
            if (level.length > 0) {
                finalURL += "&" + $("#search-level").serialize();
            }
            if (experience.length > 0) {
                finalURL += "&" + $("#search-experience").serialize();
            }
            if (result.length > 0) {
                finalURL += "&" + result;
            }
            window.history.pushState({}, null, finalURL);
            $.get(finalURL, function(data) {
                $(".view-table").html(data);
                updateShortList();
            });
            return false;
        })
    </script>
@endsection
