<div class="row">
    <div class="col-md-9">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Payment Information</h5>
            </div>
            <div class="ibox-content">
                <form method="post" wire:submit.prevent="payment_gateway">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-3">
                                <input class="form-control" wire:model="first_name" name="first_name" type="text"
                                       placeholder="first-name">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-3">
                                <input class="form-control" wire:model="last_name" name="last_name" type="text"
                                       placeholder="Last name">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-3">
                                <input name="phone" type="text" wire:model="phone" class="form-control"
                                       placeholder="Mobile Number">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group mb-3">
                                <input class="form-control" wire:model="email" name="email" type="email"
                                       placeholder="username@gmail.com">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mb-3 message">
                                <textarea class="form-control" wire:model="address" name="message"
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
                <a href="{{ route('cart') }}" class="btn btn-white"><i class="fa fa-arrow-left"></i> Go
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
                    {{ currency_with_price((double) $cart_details['total'],$cart_details['payment_symbol']) }}
                </h2>
                <hr>
                @if($cart_details)
                    @foreach($cart_details['cart'] as $item)
                        <span class="text-muted  mb-3">
                                    {{ $item['name'] }}
                                </span>
                    @endforeach
                @endif
                <form method="post" action="{{ route('pay') }}"accept-charset="UTF-8" class="form-horizontal" role="form">
                @csrf
                    <input type="hidden" name="email" value="otemuyiwa@gmail.com"> {{-- required --}}
                    <input type="hidden" name="orderID" value="345">
                    <input type="hidden" name="amount" value="800"> {{-- required in kobo --}}
                    <input type="hidden" name="quantity" value="3">
                    <input type="hidden" name="currency" value="NGN">
                    <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}

                    <input type="hidden" name="split_code" value="SPL_EgunGUnBeCareful"> {{-- to support transaction split. more details https://paystack.com/docs/payments/multi-split-payments/#using-transaction-splits-with-payments --}}
                    <input type="hidden" name="split" value="{{ json_encode($split) }}"> {{-- to support dynamic transaction split. More details https://paystack.com/docs/payments/multi-split-payments/#dynamic-splits --}}
                    {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                </form>
                <div class="m-t-sm">
                    <div class="btn-group">
                        <!--PAY WITH CARD BTN-->
                        <button id="cardpay-btn" class="btn btn-primary btn-lg"><i
                                class="lni lni-credit-cards"></i>
                            Pay Now</button>
                        <!--PAY ON DELIVERY BTN-->
                        <button href="order-confirmation.html" id="pod-btn"
                           class="btn btn-primary btn-lg">
                            <i class="lni lni-delivery"></i>
                            Pay on Delivery</button>
                    </div>
                </div>
            </div>

            <div class="ibox-content text-center">
                <h3><i class="fa fa-envelope"></i> support@maplandi.com</h3>
                <span class="small">
                        Please contact with us if you have any questions. We are avalible 24h.

                </span>
            </div>
        </div>
    </div>
</div>
