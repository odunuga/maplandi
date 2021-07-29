@if($text===true)
    <button wire:click="toggle_item"
            class="btn btn-danger btn-block  @if($in_cart) bg-danger text-white hover:bg-danger-600 @endif">
        <i class="lni lni-cart-full" style="font-size:25px;"></i>
        @if($in_cart==false) Add to Cart @else Remove to Cart @endif
    </button>
@else
    <a href="javascript:void(0)" wire:click="toggle_item"
       class="{{ $class }} @if($in_cart) bg-danger text-white hover:bg-danger-600 @endif"><i class="lni lni-cart "></i></a>
@endif
