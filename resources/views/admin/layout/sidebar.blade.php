<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('images/logo_ubwork.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- <img src="{{ Auth::user()->image ? Stogate::url(Auth::user()->image) : asset('assets/admin-bower/dist/img/avatar.png') }}" 
                class="img-circle elevation-2" alt="User Image">
                --}}
            </div>
            <div class="info">
                <a href="#" class="d-block">Hello, {{ Auth::User()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="{{ __('SEARCH') }}"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item ">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('Tổng quan') }}
                        </p>
                    </a>
                </li>
                @can('company-read')
                <li class="nav-item">
                    <a href="{{ route('admin.company.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p> Công ty </p>
                    </a>
                </li>
                @endcan
                @can('candidate-read')
                <li class="nav-item ">
                    <a href="{{ route('admin.candidate.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            {{ __('Ứng viên') }}
                        </p>
                    </a>
                </li>
                @endcan
                @can('skill-read')
                <li class="nav-item ">
                    <a href="{{ route('admin.skill.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            {{ __('Kỹ năng') }}
                        </p>
                    </a>
                </li>
                @endcan
                @can('major-read')
                <li class="nav-item ">
                    <a href="{{ route('admin.major.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            {{ __('Chuyên ngành') }}
                        </p>
                    </a>
                </li>
                @endcan
                @can('package-read')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            {{ __('Gói nạp') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.package.candidate.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Ứng viên') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.package.company.indexc') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Công ty') }}</p>
                            </a>
                        </li>
                    </ul>
                  </li>
                  @endcan
                  @can('user-read')
                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>
                        <p>{{ __('Người dùng') }}</p>
                    </a>
                </li>
                @endcan
                @can('role-read')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>
                            {{ __('Quản lý ACL') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.role.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Vai trò') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.permission.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Quyền') }}</p>
                            </a>
                        </li>
                    </ul>
                  </li>
                  @endcan
                  <li class="nav-item ">
                    <a href="{{route('admin.logout')}}" class="nav-link">
                        <i class="fa fa-sign-out-alt"></i>
                        <p>
                            {{ __('Đăng xuất') }}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
