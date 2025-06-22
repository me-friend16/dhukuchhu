<nav class="navbar navbar-top  navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>

        <!-- Brand Logo (Small Screen) -->
        <a class="navbar-brand pt-0 d-md-none" href="index-2.html">
            <img src="{{ asset('backend') }}/assets/img/brand/logo-light.png" class="navbar-brand-img" alt="...">
        </a>

        <!-- User -->
        <ul class="navbar-nav align-items-center ">
            <li class="nav-item d-none d-md-flex">
                <div class="dropdown d-none d-md-flex mt-2 ">
                    <a class="nav-link full-screen-link pl-0 pr-0"><i class="fe fe-maximize-2 floating " id="fullscreen-button"></i></a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0" data-toggle="dropdown" href="#" role="button">
                <div class="media align-items-center">
                    <div class="media-body ml-2 d-none d-lg-block">
                        <span class="mb-0 ">{{ Auth::user()->name }}</span>
                    </div>
                </div></a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <a class="dropdown-item" href="user-profile.html"><i class="ni ni-single-02"></i> <span>My profile</span></a>
                    <a class="dropdown-item" href="#"><i class="ni ni-settings-gear-65"></i> <span>Change Password</span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ni ni-user-run"></i> <span>Logout</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>