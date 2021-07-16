<x-app-layout>
    <style>

        body{margin-top:20px;
            background:#eee;
        }

        .hidden{
            display:none;
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
    <section class="login section" style="margin-top:30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h4 class="title ">Thank you for your Order!</h4>
                        <h1 class="display-4 text-center text-success animate  animate__heartBeat "
                            style="font-size:100px">
                            <i class="lni lni-checkmark-circle mb-3"></i></h1>
                        <p class="text-center ">Order Completed! Your order has been received and processed.</p>

                    </div>


                </div>
            </div>
        </div>
        </div>
    </section>
</x-app-layout>
