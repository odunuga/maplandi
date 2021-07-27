<x-app-layout>
    <style>

        body {
            margin-top: 20px;
            background: #eee;
        }

        .hidden {
            display: none;
        }

        h3 {
            font-size: 16px;
        }

        .text-navy {
            color: #1ab394;
        }

        .cart-product-imitation {
            text-align: center;
            padding-top: 30px;
            height: 80px;
            width: 80px;
            background-color: #f8f8f9;
        }

        .product-imitation.xl {
            padding: 120px 0;
        }

        .product-desc {
            padding: 20px;
            position: relative;
        }

        .ecommerce .tag-list {
            padding: 0;
        }

        .ecommerce .fa-star {
            color: #d1dade;
        }

        .ecommerce .fa-star.active {
            color: #f8ac59;
        }

        .ecommerce .note-editor {
            border: 1px solid #e7eaec;
        }

        table.shoping-cart-table {
            margin-bottom: 0;
        }

        table.shoping-cart-table tr td {
            border: none;
            text-align: right;
        }

        table.shoping-cart-table tr td.desc,
        table.shoping-cart-table tr td:first-child {
            text-align: left;
        }

        table.shoping-cart-table tr td:last-child {
            width: 80px;
        }

        .ibox {
            clear: both;
            margin-bottom: 25px;
            margin-top: 0;
            padding: 0;
        }

        .ibox.collapsed .ibox-content {
            display: none;
        }

        .ibox:after,
        .ibox:before {
            display: table;
        }

        .ibox-title {
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            background-color: #ffffff;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 3px 0 0;
            color: inherit;
            margin-bottom: 0;
            padding: 14px 15px 7px;
            min-height: 48px;
        }

        .ibox-content {
            background-color: #ffffff;
            color: inherit;
            padding: 15px 20px 20px 20px;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 1px 0;
        }

        .ibox-footer {
            color: inherit;
            border-top: 1px solid #e7eaec;
            font-size: 90%;
            background: #ffffff;
            padding: 10px 15px;
        }

    </style>
    <section class="dashboard section" style="margin-top:30px">
        <div class="container">
            <div class="row">
                @include('cart::inc.sidebar')
                <div class="col-lg-9 col-md-12 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">Order History</h3>


                            <div class="my-items">
                                <div class="item-list-title">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <p class="d-none d-lg-block">Product</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p class="d-none d-lg-block">Category</p>
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-12 align-right">
                                            <p class="d-none d-lg-block"> Current Price</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12 align-right">
                                            <p class="d-none d-lg-block"> Actions</p>
                                        </div>

                                    </div>
                                </div>

                                @if(isset($items) && count($items)>0)
                                    @foreach($items as $item)
                                        @livewire('single-saved-item',['product'=>$item->product])
                                    @endforeach
                                    {{ $items->links() }}
                                @else
                                    <div class="single-item-list">
                                        <strong> No Items Yet</strong>
                                    </div>
                                @endif

                                {{--                                <div class="pagination left">--}}
                                {{--                                    <ul class="pagination-list">--}}
                                {{--                                        <li><a href="javascript:void(0)">1</a></li>--}}
                                {{--                                        <li class="active"><a href="javascript:void(0)">2</a></li>--}}
                                {{--                                        <li><a href="javascript:void(0)">3</a></li>--}}
                                {{--                                        <li><a href="javascript:void(0)">4</a></li>--}}
                                {{--                                        <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a></li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </div>--}}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>


