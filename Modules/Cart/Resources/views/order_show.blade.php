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

    <section class=" section mb-5" style="margin-top:40px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center mb-5">{{ __('orders.single_order.title') }}{{ $order->reference }}
                    </h4>
                    <div class="container">
                        <div class="wrapper wrapper-content animated fadeInRight">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="ibox">
                                        <div class="ibox-title">
                                            <h5>Payment Information</h5>
                                        </div>
                                        <div class="ibox-content">
                                            <div class="card-group">
                                                Reference: {{ $order->payment_type }}
                                            </div>
                                            <div class="card-group">
                                                Transaction ID: {{ $order->transaction_id }}
                                            </div>
                                            <div class="card-group">
                                                Payment Type: {{ ucfirst($order->payment_type) }}
                                            </div>
                                            <div class="card-group">
                                                Channel: {{ $order->channel }}
                                            </div>
                                            <div class="card-group">
                                                Amount: {{ currency_with_price($order->amount,$order->currency) }}
                                            </div>
                                            <div class="card-group">
                                                Payment Message: {{ $order->payment_message }}
                                            </div>
                                            <div class="card-group">
                                                Transaction status: {{ $order->transaction_confirmed===true||$order->transaction_confirmed==='true'?'Yes':'No' }}
                                            </div>
                                            <div class="card-group">
                                                <a href="{{ route('orders') }}" class="btn btn-outline-info"> {{__('buttons.back')}}</a>
                                            </div>
                                            <div class="card-group"></div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </section>

</x-app-layout>
