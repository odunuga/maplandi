<header class="header navbar-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="nav-inner">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset($site_settings->site_logo) }}" style="width:45px; height:47px;"
                                 alt="Logo">

                        </a>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">

                                <li class="nav-item @if(Route::is('welcome')) active @endif"><a
                                        href="{{ url('/') }}">{{__('navbar.home')}}</a>
                                </li>

                                <li class="nav-item @if(Route::is('shop')) active @endif">
                                    <a href="{{ route("shop") }}"
                                       aria-label="Toggle navigation">{{__('navbar.shop')}}</a>
                                </li>


                                @guest
                                    <li class="nav-item d-lg-none">
                                        <a class="active dd-menu collapsed" href="{{ route('login') }}"
                                           data-bs-toggle="collapse"
                                           data-bs-target="#submenu-1-1" aria-controls="navbarSupportedContent"
                                           aria-expanded="false"
                                           aria-label="Toggle navigation">{{__('navbar.login_to_buy')}}</a>
                                        <ul class="sub-menu collapse" id="submenu-1-1">
                                            <li class="nav-item active"><a
                                                    href="{{route('login')}}">{{__('navbar.login')}}</a></li>
                                            <li class="nav-item active"><a
                                                    href="{{ route('register') }}">{{__('navbar.register') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item d-lg-none">
                                        <a href="{{route('profile.show')}}"><i
                                                class="lni lni-user"></i> {{__('navbar.profile')}}</a>
                                    </li>

                                    <li class="nav-item d-lg-none">

                                        <a class="dropdown-item" href="{{ route('orders') }}">
                                            <span class> <b><i class="lni lni-cart" style="margin-right:10px"></i> </b> </span>
                                            {{__('navbar.orders')}}
                                        </a>
                                    </li>
                                    <li class="nav-item d-lg-none">
                                        <form action="{{ route('logout') }}" method="POST">@csrf
                                            <button class="dropdown-item pl-2" type="submit"><i
                                                    class="lni lni-unlink"></i>{{__('navbar.logout')}}
                                            </button>
                                        </form>
                                    </li>
                                @endguest
                            </ul>
                        </div>


                        @guest
                            <div class="login-button">
                                <ul>
                                    <li>
                                        <a href="{{ route('login') }}"><i
                                                class="lni lni-enter"></i> {{__('navbar.login')}}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}"><i
                                                class="lni lni-user"></i>{{__('navbar.register')}}</a>
                                    </li>
                                </ul>
                            </div>

                        @else
                            <div class="flex-shrink-0 dropdown">
                                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                                   id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32"
                                         class="d-none d-lg- rounded-circle">
                                    <span> <b>Hi, {{ auth() ->user()->name }} </b> </span>
                                </a>
                                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="">
                                    <li><a class="dropdown-item" href="{{ route('profile.show') }}">
                                            <span class> <b><i class="lni lni-user" style="margin-right:10px"></i> </b> </span>
                                            {{__('navbar.account')}}
                                        </a>
                                    </li>


                                    <li><a class="dropdown-item" href="{{ route('orders') }}">
                                            <span class> <b><i class="lni lni-cart" style="margin-right:10px"></i> </b> </span>
                                            {{__('navbar.orders')}}
                                        </a>
                                    </li>

                                    <li><a class="dropdown-item" href="{{ route('saved') }}">
                                            <span class> <b><i class="lni lni-heart" style="margin-right:10px"></i> </b> </span>
                                            {{ __('navbar.saved_items') }}
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">@csrf
                                            <button class="dropdown-item pl-2" type="submit"><i
                                                    class="lni lni-unlink"></i> {{__('navbar.logout')}}
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endguest
                        <button type="button" class="btn btn-transparent position-relative"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <strong style="font-weight:100;"> {{__('navbar.cart')}}
                                <i class="lni lni-cart-full" style="color:red;"></i>

                            </strong>
                            <livewire:cart-counter key="{{now()}}"/>
                        </button>
                        <select class="form-select-sm text-dark" wire:model="currency_id"
                                onchange="livewire.emit('set_new_currency',{{url()->current()}})">

                            @foreach($currencies as $currency)
                                <option value="{{ $currency['id'] }}">
                                    {{ $currency['symbol'] }}
                                </option>
                            @endforeach
                        </select>
                        <span class="mx-2 my-1">
                            <i wire:offline.class.remove="bg-success" wire:offline.class="bg-danger"
                               class="lni lni-bg-circle animate-ping  bg-success"> </i>
                        </span>

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

