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
    <section class=" section mb-5" style="margin-top:40px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center mb-5">Checkout
                        <i class="lni lni-credit-cards"></i><i class="lni lni-credit-cards"></i>

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
                                            <form method="post" action="#">
                                                <div class="row">
                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group mb-3">
                                                            <input class="form-control" name="first-name" type="text"
                                                                   placeholder="first-name">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group mb-3">
                                                            <input class="form-control" name="last-name" type="text"
                                                                   placeholder="Last name">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group mb-3">
                                                            <input name="number" type="text" class="form-control"
                                                                   placeholder="Mobile Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="form-group mb-3">
                                                            <input class="form-control" name="email" type="email"
                                                                   placeholder="username@gmail.com">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group mb-3 message">
                                                            <textarea class="form-control" name="message"
                                                                      placeholder="Shipping Address"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group button  mb-0">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="ibox-title">
                                                    <h5>Payment Method</h5>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" onclick="cardpayment()" type="radio"
                                                           name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="inlineCheckbox1">Pay With Card
                                                        <i class="lni lni-credit-cards"></i>
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" onclick="deliver()" type="radio"
                                                           name="flexRadioDefault" id="flexRadioDefault2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Payment on
                                                        Delivery
                                                        <i class="lni lni-delivery"></i> </label>
                                                </div>


                                            </form>
                                        </div>

                                        <div class="ibox-content">
                                            <a href="../cart" class="btn btn-white"><i class="fa fa-arrow-left"></i> Go
                                                Back</A>

                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-3">
                                    <div class="ibox hidden" id="cardpay">
                                        <div class="ibox-title">
                                            <h5>Cart Summary</h5>
                                        </div>
                                        <div class="ibox-content mb-3">
                    <span>
                        Total
                    </span>
                                            <h2 class="font-bold">
                                                $390,00
                                            </h2>

                                            <hr>
                                            <span class="text-muted  mb-3">
                        Iphone Xs Max
                    </span>
                                            <div class="m-t-sm">
                                                <div class="btn-group">


                                                    <!--PAY WITH CARD BTN-->
                                                    <a href="#" id="cardpay-btn" class="btn btn-primary btn-lg"><i
                                                            class="lni lni-credit-cards"></i>
                                                        Pay Now</a>


                                                    <!--PAY ON DELIVERY BTN-->
                                                    <a href="order-confirmation.html" id="pod-btn"
                                                       class="btn btn-primary btn-lg">
                                                        <i class="lni lni-delivery"></i>
                                                        Pay on Delivery</a>


                                                </div>
                                            </div>
                                        </div>


                                        <div class="ibox-content text-center">
                                            <h3><i class="fa fa-envelope"></i> support@maplandi.com</h3>
                                            <span class="small">
                        Please contact with us if you have any questions. We are avalible 24h.


                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <script>
        function cardpayment() {
            document.getElementById("cardpay").style.display = "block";
            document.getElementById("cardpay-btn").style.display = "block";
            document.getElementById("pod-btn").style.display = "none";


        };

        function deliver() {
            document.getElementById("cardpay-btn").style.display = "none";
            document.getElementById("pod-btn").style.display = "block";
            document.getElementById("cardpay").style.display = "block";


        };


    </script>
</x-app-layout>
