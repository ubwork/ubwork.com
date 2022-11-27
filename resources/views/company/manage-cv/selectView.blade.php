<div class="row">
    @foreach($listCV as $item)
    {{-- @if($item->row_no != 1)
    @continue
    @endif --}}
    <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
      <div class="inner-box">
        <div class="content">
          <figure class="image"><img src="{{asset('storage/'. $getSeeker[$item->seeker_id]->image)}}" alt=""></figure>
          <h4 class="name"><a href="#">{{$getSeeker[$item->seeker_id]->name}}</a></h4>
          <ul class="candidate-info">
            <li class="designation">
              @foreach($major as $mj)
              {{ $getSeeker[$item->seeker_id]->major_id == $mj->id ? $mj->name : ''}}
              @endforeach
            </li>
            <li><span class="icon flaticon-map-locator"></span> {{$getSeeker[$item->seeker_id]->address}}</li>
          </ul>
          <ul class="post-tags" style="">
            @foreach($list_skill[$item->seeker_id] as $sk)
            <li style="margin-bottom: 10px;"><a href="javascript:void(0)">{{$sk->getNameSkill->name}}</a></li>
            @endforeach
          </ul>
        </div>
        <div class="option-box">
          <ul class="option-list">
            <li><a target="_blank" href="{{route('company.viewProfile', ['id' => $item->seeker_id])}}" data-text="Chi tiết"><span class="la la-eye"></span></a></li>
            <li><a data-text="Phê duyệt"><span class="la la-check"></span></a></li>
            <li><a data-text="Từ chối"><span class="la la-times-circle"></span></a></li>
            <li><span>{{$item->is_see == 0 ? 'Chưa xem' : 'Đã xem'}}</span></li>
          </ul>
        </div>
      </div>
    </div>
    @endforeach
  </div>