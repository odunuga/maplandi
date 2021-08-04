<div class="row" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="col-md-9">
        <div class="ibox">
            <div class="ibox-title">
                <h5>{{ __('cart.checkout.title') }}</h5>
            </div>
            @if($cart_details && $cart_details!=[] && count($cart_details)>0)
                <div class="ibox-content">
                    <form method="post" wire:submit.prevent="payment_gateway">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group mb-3">
                                    <input class="form-control " wire.dirty.class="border-red-500"
                                           wire:model.lazy="first_name" name="first_name" type="text"
                                           placeholder="first Name" required>
                                    @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="form-group mb-3">
                                    <input class="form-control" wire.dirty.class="border-red-500"
                                           wire:model.lazy="last_name" name="last_name" type="text"
                                           placeholder="Last name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group mb-3">
                                    <input name="phone" type="text" wire.dirty.class="border-red-500"
                                           wire:model.lazy="phone" class="form-control"
                                           placeholder="Mobile Number" required>
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group mb-3">
                                    <input class="form-control" wire.dirty.class="border-red-500" name="email"
                                           type="email"
                                           wire:model.lazy="email"
                                           placeholder="example@email.com" required>
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-3 message">
                                <textarea class="form-control" wire.dirty.class="border-red-500"
                                          wire:model="address" name="address"
                                          placeholder="Shipping Address" required></textarea>
                                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
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
                    <a href="{{ route('cart') }}" class="btn btn-white"><i
                            class="fa fa-arrow-left"></i> {{ __('buttons.go-back') }}</A>
                </div>

            @else
                <div class="ibox-content text-center">
                    <h3>{{ __('cart.checkout.nothing') }}</h3>
                    <p class="mt-4">{!! __('cart.checkout.continue_shopping') !!}  </p>
                </div>
            @endif
        </div>
    </div>
    @if($cart_details && $cart_details!=[] && count($cart_details)>0)
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
                            @if(isset($item['conditions']) && count($item['conditions'])>0) @foreach($item['conditions'] as $con)
                                <span class="text-danger">{{ $con }}</span> @endforeach

                            @endif
                        @endforeach
                    @endif
                    <div class="m-t-sm">
                        <div class="btn-group">
                            <!--PAY WITH CARD BTN-->
                            <form method="post" action="{{ route('pay') }}" accept-charset="UTF-8"
                                  class="form-horizontal"
                                  role="form">
                                @csrf
                                <input type="hidden" name="email" value="{{ $email }}"> {{-- required --}}
                                <input type="hidden" name="order_id" value="{{ $cart_details['id'] }}">
                                <input hidden name="first_name" value="{{ $first_name }}"/>
                                <input hidden name="last_name" value="{{ $last_name }}"/>
                                <input hidden name="phone" value="{{ $phone }}"/>
                                <input hidden name="address" value="{{ $address }}"/>
                                <input type="hidden" name="amount" value="{{ $total_in_kobo }}">
                                <input type="hidden" name="currency" value="{{ get_user_currency()['code'] }}">
                                <input type="hidden" name="metadata"
                                       value="{{ json_encode(['cart'=>$cart_details['cart'],'sub_total'=>$cart_details['sub_total'],'tax_added'=>$cart_details['tax_added'],'conditions'=>$conditions,'address'=>['first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'phone'=>$phone,'address'=>$address]]) }}"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                                <button id="cardpay-btn" wire:loading.attr="disabled" type="submit"
                                        class="btn btn-danger btn-lg"><i
                                        class="lni lni-credit-cards"></i>
                                    Pay Now
                                </button>
                            </form>

                            <!--PAY ON DELIVERY BTN-->
                            <button wire:click="pay_on_delivery_order_confirmation" id="pod-btn"
                                    class="btn btn-danger btn-lg">
                                <i class="lni lni-delivery"></i>
                                Pay on Delivery <i class="lni lni-spinner lni-is-spinning" wire:loading></i>
                            </button>
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
    @endif
</div>
