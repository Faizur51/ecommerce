<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" class="bg-theme bg-theme2" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{asset('backend/')}}/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
            <h5 class="logo-text">Bulona Admin</h5>
        </a>
    </div>
    <div class="user-details">
        <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
            <div class="avatar"><img class="mr-3 side-user-img" src="{{asset('backend/')}}/assets/images/avatars/avatar-13.png" alt="user avatar"></div>
            <div class="media-body">
                <h6 class="side-user-name">{{ Auth::user()->name }}</h6>
            </div>
        </div>
        <div id="user-dropdown" class="collapse">
            <ul class="user-setting-menu">
                <li><a href="javaScript:void();"><i class="icon-user"></i>  My Profile</a></li>
                <li><a href="javaScript:void();"><i class="icon-settings"></i> Setting</a></li>

                <li>
                    <a href="{{route('admin.logout')}}"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <i class="icon-power"></i> Logout
                    </a>

                    <form id="logout-form" method="POST" action="{{ route('admin.logout') }}">
                        @csrf

                    </form>

                </li>
            </ul>
        </div>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="{{request()->is('admin/dashboard') ? 'active':''}}">
            <a href="{{route('admin.dashboard')}}" class="waves-effect">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span><i class="fa fa-angle-left pull-right"></i>
            </a>

        </li>


        @if(auth()->user()->role_id==1)

        <li class="{{request()->is('admin/user*') ? 'active':''}}">
            <a href="javaScript:void();" class="waves-effect">
                <i class="fa fa-users"></i> <span>User</span><i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li class="{{request()->is('admin/user*') ? 'active':''}}"><a href="{{route('admin.user.index')}}"><i class="fa fa-apple"></i>Manage User</a></li>
                <li  class="{{request()->is('admin/userrole*') ? 'active':''}}"><a href="{{route('admin.userrole.index')}}"><i class="zmdi zmdi-long-arrow-right"></i> Manage User Rule</a></li>
            </ul>
        </li>

        @endif

        @if(auth()->user()->role_id==1 || auth()->user()->role_id==2)
        <li class="{{request()->is('admin/brand*') ? 'active':''}}">
            <a href="javaScript:void();" class="waves-effect">
                <i class="fa fa-list"></i> <span>Brand</span><i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li class="{{request()->is('admin/brand*') ? 'active':''}}"><a href="{{route('admin.user.index')}}"><i class="zmdi zmdi-long-arrow-right"></i>Manage Brand</a></li>
            </ul>
        </li>
        @endif


        <li class="sidebar-header">LABELS</li>
        <li><a href="javaScript:void();" class="waves-effect"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a></li>
        <li><a href="javaScript:void();" class="waves-effect"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a></li>
    </ul>

</div>
<!--End sidebar-wrapper-->
