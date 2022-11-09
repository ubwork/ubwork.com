<div class="user-sidebar">
    <div class="sidebar-inner">
      <ul class="navigation">
        <li class="active"><a href="dashboard.html"> <i class="la la-home"></i> Dashboard</a></li>
        <li><a href="{{route('company.profile', auth('company')->user()->id )}}"><i class="la la-user-tie"></i>Company Profile</a></li>

        <li><a href="dashboard-post-job.html"><i class="la la-paper-plane"></i>Post a New Job</a></li>
        @foreach (config('route.company.sidebar') as $key => $value )
            <li class="{{$key==$activeRoute ? 'active' : ''}}"><a href="{{route($value['route'])}}"> <i class="{{$value['icon']}}"></i>{{$value['title']}}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
  