<admin-layout>
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="{{ route('control.room') }}" class="logo">
                    <span class="logo-light">
                        <img src="{{ asset('vendor/admin/images/logo/logo1.png')}}" alt="" height="70"></span>
                </a>
                <span class="logo-sm">
                             <img src="{{asset('vendor/admin/images/logo/logo1.png')}}" alt="" height="20"></a>
                        </span>
                </a>
            </div>

            <nav class="navbar-custom">
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
                                <img src="{{asset('vendor/admin/images/logo/logo2.png')}}" alt="user"
                                     class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#"><i
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

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Menu</li>
                        <li>
                            <a href="." class="waves-effect">
                                <i class="icon-accelerator"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="orders.html" class="waves-effect"><i class="fas fa-dolly-flatbed"></i><span>
                                    Orders</span></a>
                        </li>

                        <li>
                            <a href="stocks.html" class="waves-effect"><i class="fas fa-cube"></i><span>
                                    Stocks</span></a>

                        </li>


                        <li>
                            <a href="items-menu.html" class="waves-effect"><i class="fas fa-gifts"></i>
                                <span> Items Menu</span></a>
                        </li>

                        <li>
                            <a href="history.html" class="waves-effect">
                                <i class="fas fa-credit-card"></i>
                                <span> Transaction History </span></a>
                        </li>


                        <li>
                            <a href="calendar.html" class="waves-effect"><i
                                    class="icon-key"></i><span> LOGOUT </span></a>
                        </li>


                    </ul>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6 mb-3">
                                <h4 class="page-title">Dashboard</h4>
                            </div>


                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Maplandi</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->

                    <div class="row">

                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-cube-outline bg-dark text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">Total Items</h5>
                                    </div>
                                    <h3 class="mt-4">43,225</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">Total Revenue</h5>
                                    </div>
                                    <h3 class="mt-4">$73,265</h3>

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">Items In-Stock</h5>
                                    </div>
                                    <h3 class="mt-4">447</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-buffer bg-danger text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">Sold items</h5>
                                    </div>
                                    <h3 class="mt-4">8699</h3>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- START ROW -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-10 ">
                                            <b class="h5 mt-0  mb-5 text-small">Newly Posted Items</b>

                                        </div>

                                        <div class="col-md-2 mb-3" style="margin-top:20px">
                                            <a href="items-menu.html" class="btn btn-primary" href="">See all</a>

                                        </div>

                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col"> Price</th>
                                                <th scope="col">Condition</th>
                                                <th scope="col">Brand</th>
                                                <th scope="col">Model</th>
                                                <th scope="col" colspan="2">Images</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>HOT 10</td>
                                                <td>4,120,000</td>
                                                <td>New</td>
                                                <td>Infinix</td>
                                                <td>XEFEGE</td>

                                                <td>
                                                    <div>
                                                        <img src="../assets/images/item-1.jpg" alt=""
                                                             class="thumb-md rounded-circle mr-2">

                                                    </div>
                                                </td>


                                            </tr>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END ROW -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- content -->


            <footer class="footer">
                © Maplandi <span class="d-none d-sm-inline-block"> </span>.
            </footer>

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
</admin-layout>

