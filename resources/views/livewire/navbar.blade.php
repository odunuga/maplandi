@auth()
    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="{{ $user->image }}" style="width:45px; height:47px;" alt="Logo">

                            </a>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">

                                    <li class="nav-item active "><a href="../">Home</a></li>
                                    </li>

                                    <li class="nav-item">
                                        <a href="." aria-label="Toggle navigation">Shop</a>
                                    </li>


                                    <li class="nav-item d-lg-none">
                                        <a class="active dd-menu collapsed" href="login" data-bs-toggle="collapse"
                                           data-bs-target="#submenu-1-1" aria-controls="navbarSupportedContent"
                                           aria-expanded="false" aria-label="Toggle navigation">Login to Buy</a>
                                        <ul class="sub-menu collapse" id="submenu-1-1">
                                            <li class="nav-item active"><a href="../login">Login</a></li>
                                            <li class="nav-item active"><a href="../register">Or Register</a></li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>


                            <div class="login-button">
                                <ul>
                                    <li>
                                    <li>
                                        <a href="../login"><i class="lni lni-enter"></i> Login</a>
                                    </li>
                                    <li>
                                        <a href="../register"><i class="lni lni-user"></i> Register</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="flex-shrink-0 dropdown">
                                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                                   id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32"
                                         class="d-none d-lg- rounded-circle">
                                    <span> <b>Hi, Daniel </b> </span>
                                </a>
                                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="">
                                    <li><a class="dropdown-item" href="../myaccount">
                                            <span class> <b><i class="lni lni-user" style="margin-right:10px"></i> </b> </span>
                                            Account
                                        </a>
                                    </li>


                                    <li><a class="dropdown-item" href="../myaccount/orders.html">
                                            <span class> <b><i class="lni lni-cart" style="margin-right:10px"></i> </b> </span>
                                            Orders
                                        </a>
                                    </li>


                                    <li><a class="dropdown-item" href="../myaccount/saved-items.html">
                                            <span class> <b><i class="lni lni-heart" style="margin-right:10px"></i> </b> </span>
                                            Saved Items

                                        </a>

                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">LOGOUT</a></li>
                                </ul>
                            </div>

                            <button type="button" class="btn btn-transparent position-relative btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <B style="font-weight:100;"> Cart
                                    <i class="lni lni-cart-full" style="color:red;"></i>

                                </B>
                                <span class="position-absolute top-0 start-100 translate-middle badge bg-danger">
         2
  </span>
                            </button>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>


                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
@else
    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="../">
                                <img src="{{ asset('vendor/images/logo/logo2.png') }}" style="width:45px; height:47px;"
                                     alt="Logo">
                            </a>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">

                                    <li class="nav-item active "><a href="../">Home</a></li>
                                    </li>

                                    <li class="nav-item">
                                        <a href="../shop" aria-label="Toggle navigation">Shop</a>
                                    </li>


                                </ul>
                            </div>

                            <div class="button header-button">
                                <a href="{{ route('login') }}" class="btn">Sign In</a>
                            </div>

                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endauth
