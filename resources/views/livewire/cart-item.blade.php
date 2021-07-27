<tr>
    <td width="90">
        <div class="card" style="width:8rem;">
            <img src="{{ $item['attributes']?asset($item['attributes']['image']):'' }}" class="card-img-top"
                 alt="image thumbnail">
        </div>
    </td>
    <td class="desc">
        <h3>
            <a href="{{ url('shop/'.$item['id']) }}" class="text-danger text-capitalize">
                {{ $item['attributes']?$item['attributes']['description']:'' }}
            </a>
        </h3>

        <dl class="small m-b-none">
            <dt>Category: {{ $item['attributes']?$item['attributes']['category']:'' }}</dt>
        </dl>

        <div class="m-t-sm flex flex-inline">
           <a href="javascript:void(0)" class="text-muted text-sm mx-3" wire:click="save_item('{{$item['id']}}')"><i class="lni lni-save" ></i> Save </a>
        @if($confirm_delete == $item['id'])
                <i class="fa fa-trash"></i>
                Are you sure? <a href="javascript:void(0)" wire:click="removeItem()"><i
                        class="lni lni-checkmark text-danger"></i></a>  <a href="javascript:void(0)"
                                                                           wire:click="cancelDelete()"><i
                        class="lni lni-close text-success"></i></a>
            @else
                <a href="javascript:void(0)"
                   wire:click="confirmDelete()"
                   class="text-muted text-sm"><i
                        class="lni lni-trash"></i> Remove item
                </a>
            @endif
        </div>
    </td>
    <td>
        <button class="btn btn-sm" wire:click="decrement">-</button>
        <label class="label text-black">{{ $item['quantity'] }}</label>
        <button class="btn btn-sm" wire:click="increment">+</button>
    </td>
    <td>
        <h5>
            {{ currency_with_price($item['price']*$item['quantity'], $item['attributes'] ?$item['attributes']['symbol']:'') }}

        </h5>
    </td>
    <td>
        <h4>
            {{ currency_with_price($new_amount,get_user_currency()['code']) }}
        </h4>
    </td>
</tr>
