<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu d-print-none">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>
                <li class="active">
                    <a href="{{ route('control.room') }}" class="waves-effect">
                        <i class="icon-accelerator"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('control.orders') }}" class="waves-effect"><i
                            class="fas fa-dolly-flatbed"></i><span>
                                    Orders</span></a>
                </li>
                <li>
                    <a href="{{ route('control.stocks') }}" class="waves-effect"><i class="fas fa-cube"></i><span>
                                    Stocks</span></a>
                </li>
                <li>
                    <a href="{{ route('control.items') }}" class="waves-effect"><i class="fas fa-gifts"></i>
                        <span> Items Menu</span></a>
                </li>

                <li>
                    <a href="{{ route('control.transactions') }}" class="waves-effect">
                        <i class="fas fa-credit-card"></i>
                        <span> Transaction History </span></a>
                </li>
                <li>
                    <a href="{{ route('control.tags') }}" class="waves-effect">
                        <i class="fas fa-tags"></i>
                        <span> Product Tags </span></a>
                </li>
                <li>
                    <a href="{{ route('control.comments') }}" class="waves-effect">
                        <i class="fas fa-comment-alt"></i>
                        <span> Comments </span></a>
                </li>

                <li>
                    <a href="{{ route('control.comment.report') }}" class="waves-effect">
                        <i class="fas fa-comment"></i><i class="fas fa-phone"></i>
                        <span> Comment Report </span></a>
                </li>
                <li>
                    <a href="{{ route('control.product.report') }}" class="waves-effect">
                        <i class="fas fa-shopping-cart"></i><i class="fas fa-phone"></i>
                        <span> Product Report </span></a>
                </li>
                <li>
                    <a href="{{ route('control.users') }}" class="waves-effect">
                        <i class="fas fa-users"></i>
                        <span> Users</span></a>
                </li>
                <li>
                    <a href="{{ route('control.promotions') }}" class="waves-effect">
                        <i class="fas fa-bullhorn"></i>
                        <span> Promotions </span></a>
                </li>
                <li>
                    <a href="{{ route('control.testimonies') }}" class="waves-effect">
                        <i class="fas fa-bullseye"></i>
                        <span> Testimonies </span></a>
                </li>


                <li>

                    <a href="javascript:void(0)" class="waves-effect"
                       onclick="document.getElementById('logout').submit()">
                        <i class="icon-key"></i><span> LOGOUT </span>
                    </a>
                    <form id="logout" action="{{ route('logout') }}" method="POST">@csrf
                        {{--                        <button class="waves-effect" type="submit"><i--}}
                        {{--                                class="icon-key"></i>{{__('navbar.logout')}}--}}
                        {{--                        </button>--}}
                    </form>
                </li>


            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
