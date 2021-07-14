<div class="modal modal-dialog-scrollable fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">
                    <i class="lni lni-cart-full" style="color:red; font-size:25px;"></i>
                    Your Cart</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ol class="list-group list-group-numbered">

                    @if($items && $items->count() > 0)
                        @foreach($items as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="text-dark"><b>{{ $item->name }} </b></div>
                                    Category
                                    : {{ $item->attributes->has('category')?$item->attributes->get('category'):'' }}
                                </div>
                                <div class="text-dark">
                                    <b>{{ currency_with_price($item->price,$item->attributes->has('symbol')?$item->attributes->get('symbol'):'') }} </b>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item text-center">No Item(s) in Cart</li>
                    @endif

                </ol>
            </div>
            <div class="modal-footer">
                @if($items && $items->count() > 0)
                    <a href="{{ route('cart') }}" class="btn btn-dark btn-sm ">
                        View Cart</a>
                @endif
            </div>
        </div>
    </div>
</div>
