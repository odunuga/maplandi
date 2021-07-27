<div class="single-item-list" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-4 col-12">
            <div class="item-image">
                <img src="{{ asset($product->image->url) }}"
                     alt="thumbnail">
                <div class="content">
                    <h3 class="title"><a href="javascript:void(0)">
                            {{ $product->title }}
                        </a></h3>

                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-12">
            <p>{{ $product->category->title}}</p>
        </div>


        <div class="col-lg-2 col-md-2 col-12 align-right">
            @if(isset($product->currency) && $product->currency->code!==get_user_currency()['code'])
                {{ convert_to_user_currency($product->price,$product->currency->code) }}
            @else
                {{ currency_with_price($product->price,$product->currency->code) }}
            @endif
        </div>
        <div class="col-lg-2 col-md-2 col-12 align-right flex flex-inline">
            <button class="btn btn-outline-info" wire:click="add_to_cart('{{$product->sku}}')"><i
                    class="lni lni-cart"></i>
            </button> &nbsp;
            @if($check_delete==false)
                <button class="btn btn-outline-danger" wire:click="confirm_delete('{{$product->sku}}')"><i
                        class="lni lni-close"></i>
                </button>
            @else
                <button class="btn btn-outline-danger" wire:click="remove_item('{{$product->sku}}')">Delete?
                </button>
            @endif
        </div>
    </div>
</div>
