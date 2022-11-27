<div class="row">
    @foreach($listCV as $item)
    <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
      <div class="inner-box p-4">
        <div class="content">
          <figure class="image"><img src="{{asset('storage/'.  $item->seeker_profile->image)}}" alt=""></figure>
          <h4 class="name"><a href="#">{{$item->seeker_profile->name}}</a></h4>
          <ul class="candidate-info">
            <li class="designation">
              @foreach($major as $mj)
              {{  $item->seeker_profile->major_id == $mj->id ? $mj->name : ''}}
              @endforeach
            </li>
            <li><span class="icon flaticon-map-locator"></span> {{$item->seeker_profile->address}}</li>
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
  <div class="ls-pagination">{{ $listCV->links('company.layout.paginate'); }}</div>