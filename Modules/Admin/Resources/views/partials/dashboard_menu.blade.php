
<div class="row">
    @if(isset($menu))
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-cube-outline bg-dark text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Items</h5>
                    </div>
                    <h3 class="mt-4">{{ $menu['total_products'] }}</h3>
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
                    <h3 class="mt-4">{{ $menu['total_cost'] }}</h3>

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
                    <h3 class="mt-4">{{ $menu['in_stock'] }}</h3>
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
                    <h3 class="mt-4">{{ $menu['sold_items'] }}</h3>
                </div>
            </div>
        </div>
    @endif
</div>
