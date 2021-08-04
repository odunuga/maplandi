<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{ route('control.room') }}" class="logo d-print-none">
                    <span class="logo-light">
                        <img src="{{ asset('vendor/admin/images/logo1.png')}}" alt="" height="70"></span>
        </a>
        <span class="logo-sm">
                    <a>
                             <img src="{{asset('vendor/admin/images/logo1.png')}}" alt="" height="20"></a>
                        </span>

    </div>

    <nav class="navbar-custom d-print-none">
        <ul class="navbar-right list-inline float-right mb-0">
            <!-- full screen -->
            <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                    <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                </a>
            </li>


            <li class="dropdown notification-list list-inline-item">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown"
                       href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{asset('vendor/admin/images/logo2.png')}}" alt="user"
                             class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item text-danger"
                           onclick="document.getElementById('logout').submit()"><i
                                class="mdi mdi-power text-danger"></i> Logout</a>
                    </div>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>

        </ul>

    </nav>

</div>
<!-- Top Bar End -->
