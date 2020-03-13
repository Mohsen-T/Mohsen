<div class="page-sidebar-wrapper">

    <div class="page-sidebar navbar-collapse collapse">

        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">

            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler"></div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>

            <li class="nav-item  @if(request()->path() == 'admin/home') active open @endif">
                <a href="{{url('admin/home')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item
            @if(request()->path() == 'admin/users') active open
                @elseif(request()->path() == 'admin/user/search') active open
                @elseif(request()->path() == 'admin/banned/users') active open
                @elseif(request()->path() == 'admin/user-translog') active open
                @elseif(request()->path() == 'admin/user-loan') active open
                @elseif(request()->path() == 'admin/broadcast') active open
                @elseif(request()->path() == 'admin/banned') active open
            @endif">
                <a href="#" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">User Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @if(request()->path() == 'admin/users') active open
                    @elseif(request()->path() == 'admin/user/search') active open
                    @endif">
                        <a href="{{route('users')}}" class="nav-link ">
                            <i class="fa fa-users"></i>
                            <span class="title">Users</span>
                        </a>
                    </li>

                    <li class="nav-item @if(request()->path() == 'admin/broadcast') active open @endif">
                        <a href="{{route('broadcast')}}" class="nav-link ">
                            <i class="icon-envelope"></i>
                            <span class="title">Broadcast Email</span>
                        </a>
                    </li>
                    <li class="nav-item @if(request()->path() == 'admin/banned') active open @endif">
                        <a href="{{route('user.ban')}}" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Banned Users</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item @if(request()->path() == 'admin/general') active open
            @elseif(request()->path() == 'admin/logo') active open
             @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Website Control</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @if(request()->path() == 'admin/general') active open @endif">
                        <a href="{{route('general')}}" class="nav-link ">
                            <i class="fa fa-cog"></i>
                            <span class="title">General Settings</span>
                        </a>
                    </li>
                    <li class="nav-item @if(request()->path() == 'admin/logo') active open @endif">
                        <a href="{{route('logo')}}" class="nav-link ">
                            <i class="fa fa-picture-o"></i>
                            <span class="title">Logo and Icon</span>
                        </a>
                    </li>
                </ul>
            </li>
            @if(Auth::guard('admin')->user()->role == 'super')
                <li class="nav-item">
                    <a href="{{route('stuff.home')}}" class="nav-link ">
                        <i class="fa fa-user"></i>
                        <span class="title">Stuff Management</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>