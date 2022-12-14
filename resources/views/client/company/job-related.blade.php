@foreach ($company_job as $item)
    <div class="job-block">
        <div class="inner-box">
            <div class="content">
            <span class="company-logo"><img src="{{asset('storage/images/company/' . $company_detail->logo)}}" alt=""></span>
            <h4><a href="{{route('job-detail', ['id' => $item->id])}}">{{$item->title}}</a></h4>
            <ul class="job-info">
                <li><span class="icon flaticon-map-locator"></span>{{$item->company->address}}</li>
                @foreach($workingTime as $wor => $w)
                    @if(isset($item->company->working_time) && $item->company->working_time == $wor)
                    <li><span class="icon flaticon-clock-3"></span> {{$w}}</li>
                    @endif
                @endforeach
            </ul>
            <ul class="job-other-info">
                    @foreach (config('custom.type_work') as $value)
                    @if($value['id'] == $item->type_work)
                        <li class="time">
                            {{$value['name']}}
                        </li>
                    @endif
                @endforeach
            </ul>
            @if (auth('candidate')->check())
                @if (!empty($job_short[$item->id]) )
                    @if($job_short[$item->id]->job_post_id == $item->id)
                    <a href="{{route('delete_shortlisted', ['id' => $job_short[$item->id]->id])}}" class="bookmark-btn" style="background-color: #f7941d;"><span class="flaticon-bookmark" style="color: white"></span></a>
                    @endif
                @else
                    <a href="{{route('shortlisted', ['id' => $item->id])}}"><button class="bookmark-btn"  ><span class="flaticon-bookmark" ></span></button></a>
                @endif
            @else
                    <a class="bookmark-btn" href="{{route('candidate.login')}}"><span class="flaticon-bookmark"></span></a>
            @endif
            </div>
        </div>
    </div>
@endforeach
<div class="ls-pagination">{{ $company_job->links('company.layout.paginate'); }}</div>
