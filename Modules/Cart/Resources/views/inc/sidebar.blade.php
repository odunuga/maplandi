<div class="col-lg-3 col-md-12 col-12">
    <div class="dashboard-sidebar">
        <div class="user-image">
            <img src="{{ asset(auth()->user()->image)}}" alt="#">
            <h3>Hi, {{ auth()->user()->name }}</h3>
        </div>
        <div class="dashboard-menu">
            <ul>
                <li><a class="{{ Route::is('dashboard')?'active':'' }}" href="{{route('dashboard')}}"><i
                            class="lni lni-dashboard"></i> Dashboard</a></li>

                <li><a class="{{ Route::is('profile.show')?'active':'' }}" href="{{ route('profile.show') }}"><i
                            class="lni lni-cart"></i> Account</a></li>
                <li><a class="{{ Route::is('orders')?'active':'' }}" href="{{ route('orders') }}"><i
                            class="lni lni-cart"></i> Orders</a></li>
                <li><a class="{{ Route::is('saved')?'active':'' }}" href="{{ route('saved') }}"><i
                            class="lni lni-heart"></i> Saved Items</a></li>
            </ul>
            <div class="button">
                <a class="btn" onclick="document.getElementById('logou').submit()" href="javascript:void(0)">Logout</a>
            </div>
        </div>
    </div>
</div>
