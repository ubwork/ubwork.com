
    <form action="{{route('saveExperience')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="d-flex justify-content-between border-bot">
                <div class="font-weight-bold h4" >Kinh nghiệm làm việc</div>
                <div id="block-kn" style="cursor: pointer;"><i class="fa fa-plus" aria-hidden="true"></i></div>
            </div>
            <div id="experiences" class="mt-3 border-bot form" style="display: none">
                @if(!empty($seeker)) <input type="hidden" name="seeker_id" value="{{$seeker->id}}"> @endif
                <div class="form-group">
                    <label for="">Tên công ty</label>
                    <input type="text" name="company_name" class="form-control">
                    @error('company_name')
                        <small class="text-danger pl-4">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="">Vị trí</label>
                    <input type="text" name="position" class="form-control">
                    @error('position')
                        <small class="text-danger pl-4">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="">Bắt đầu</label>
                    <input type="date" name="start_date" class="form-control" >
                    @error('start_date')
                        <small class="text-danger pl-4">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="">Kết thúc</label>
                    <input type="date" name="end_date" class="form-control">
                    <small class="text-red"><i>Ghi chú: Nếu không nhập kết thúc sẽ là hiện tại đang làm việc ở đây</i></small>
                </div>
               <div class="form-group mt-3">
                    <label for="">Mô tả</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                    @error('description')
                        <small class="text-danger pl-4">
                            {{ $message }}
                            <br>
                        </small>
                    @enderror
                    <small class="text-red"><i>Gợi ý: Mô tả công việc cụ thể, những kết quả và thành tựu đạt được có số liệu dẫn chứng</i></small>
               </div>
                <div class="d-flex mt-3 flex-row-reverse">
                    <div class="hide-button-kn btn btn-warning">Hủy</div>
                    <button type="submit" class="btn btn-primary" style="margin-right: 5px;">Lưu</button>
                </div>
            </div>
        </div>
    </form>

    @if(!empty($experiences))
        
        <div class="list-experiences mt-3">
            @foreach($experiences as $exp)
            <form id="form-border{{$exp->id}}" class="d-flex mt-3 border-dotted-bot" action="{{route('deleteExperience', ['id' => $exp->id])}}" method="get">
                <div style="width: 90%;" class="mb-3" id="EditHide{{$exp->id}}">
                    <div class="h5">
                        Tên công ty: <span>{{$exp->company_name}}</span>
                    </div>
                    <div class="d-flex">
                        Bắt đầu / Kết thúc: {{date("m-Y", strtotime($exp->start_date))}} / @if($exp->end_date == null) Hiện tại @else {{date("m-Y", strtotime($exp->end_date))}} @endif
                    </div>
                    <div>
                        Vị trí: {{$exp->position}}
                    </div>
                    <div>
                        Mô tả: {{$exp->description}}
                    </div>
                </div>
                <div id="btnForm{{$exp->id}}" style="width: 10%;">
                    <button type="submit" onclick="return Del({{$exp->id}})" style="float: right;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    <div onclick="EditFormId({{$exp->id}})" style="float: right;margin-right: 5px; cursor: pointer;"><i class="fas fa-edit"></i></div>
                    <div style="clear: both;"></div>
                </div>
            </form>

            <form action="{{route('updateExperience', ['id' => $exp->id])}}" method="post">
                @csrf
                <div id="EditForm{{$exp->id}}" class="mt-3 mb-3 border-dotted-bot form" style="display: none;">
                    @if(!empty($seeker)) <input type="hidden" name="seeker_id" value="{{$seeker->id}}"> @endif
                    <div class="form-group">
                        <label for="">Tên công ty</label>
                        <input type="text" value="{{$exp->company_name}}" name="company_name" class="form-control">
                        @error('company_name')
                            <small class="text-danger pl-4">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Vị trí</label>
                        <input type="text" value="{{$exp->position}}" name="position" class="form-control">
                        @error('position')
                            <small class="text-danger pl-4">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Bắt đầu</label>
                        <input type="date" name="start_date" value="{{date("Y-m-d", strtotime($exp->start_date))}}" class="form-control" >
                        @error('start_date')
                            <small class="text-danger pl-4">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Kết thúc</label>
                        <input type="date" @if(!empty($exp->end_date)) value="{{date("Y-m-d", strtotime($exp->end_date))}}" @endif name="end_date" class="form-control">
                        <small class="text-red"><i>Ghi chú: Nếu không nhập kết thúc sẽ là hiện tại đang làm việc ở đây</i></small>
                    </div>
                   <div class="form-group mt-3">
                        <label for="">Mô tả</label>
                        <textarea name="description" class="form-control" rows="3">{{$exp->description}}</textarea>
                        @error('description')
                            <small class="text-danger pl-4">
                                {{ $message }}
                                <br>
                            </small>
                        @enderror
                        <small class="text-red"><i>Gợi ý: Mô tả công việc cụ thể, những kết quả và thành tựu đạt được có số liệu dẫn chứng</i></small>
                   </div>
                    <div class="d-flex mt-3 flex-row-reverse">
                        <div class="hide-button-exp{{$exp->id}} btn btn-warning">Hủy</div>
                        <button type="submit" class="btn btn-primary" style="margin-right: 5px;">Lưu</button>
                    </div>
                </div>
            </form>

            @endforeach
        </div>
    @endif
