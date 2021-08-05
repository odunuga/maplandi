<div class="container">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    @if(isset($items)&&count($items)>0)
                        <div class="ibox-title mp-5">
                            <!--ITEM COUNTER-->
                            <span
                                class="pull-right">(<strong>{{ isset($items)&&count($items)>0?count($items):0 }}</strong>) items</span>
                            <h5>Items in your cart</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <p wire:loading> <<<<<<<<<<<<<<<<<<<<<<<< Loading >>>>>>>>>>>>>>>>>>>>>> </p>
                                <table class="table shoping-cart-table">
                                    <tbody>
                                    @if($items && count($items) > 0)
                                        @foreach($items as $item)
                                            @livewire('cart-item',['item'=>$item],key($item->id))
                                        @endforeach

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <label>Sub Total: </label>
                                            </td>
                                            <td>
                                                {{ currency_with_price($sub_total,get_user_currency()['code']) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <label>Tax: </label>
                                            </td>
                                            <td>
                                                {{ currency_with_price($tax_added,get_user_currency()['code']) }} @if($tax>0)
                                                    ({{ $tax }}%) @endif
                                            </td>
                                        </tr>
                                        <tr aria-colspan="2">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <label>Total: </label>
                                                @if($promos) <span class="text-sm">Discount @foreach($promos as $promo)
                                                        <label>{{ $promo->getName() }}, </label> @endforeach</span> @endif
                                            </td>
                                            <td class="text-md-center">
                                                @if($there_is_coupon)
                                                    {{--                                                    <strike--}}
                                                    {{--                                                        class="text-danger text-sm">{{ currency_with_price($total,get_user_currency()['code']) }}  </strike>--}}
                                                    <span
                                                        class="text-danger">{{ currency_with_price($total,get_user_currency()['code']) }} </span>
                                                @else
                                                    <span
                                                        class="text-danger">{{ currency_with_price($total,get_user_currency()['code']) }}</span>
                                                @endif

                                            </td>
                                        </tr>

                                    @else
                                        <tr>
                                            <td class="text-center" rowspan="4">Cart Empty</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                                <div class="ibox-content">
                                    @if($items && count($items) > 0)
                                        <a href="javascript:void(0)" class="btn btn-dark pull-right mb-4"
                                           wire:click="gotoCheckout"><i
                                                class="fa fa fa-shopping-cart"></i> Checkout <i
                                                class="lni lni-spinner lni-is-spinning" wire:loading></i> </a> @endif
                                    <a href="{{ route('shop') }}" class="btn btn-white"><i
                                            class="fa fa-arrow-left"></i> Continue shopping</a>

                                </div>
                            </div>

                        </div>
                    @else
                        <div class="ibox-titel my-5 text-center">
                            {!! __('cart.empty_cart') !!}
                        </div>
                    @endif
                </div>

            </div>


        </div>
    </div>
</div>


