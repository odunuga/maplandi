<div class="col-lg-12 col-md-12 col-12">
    <div class="single-item-grid">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-7 col-12">
                <div class="image">
                    <a href="{{ url('shop/'.$item->sku) }}"><img
                            src="{{ asset($item->image->url) }}" alt="#"></a>
                    @if($item->featured)
                        <i class=" cross-badge lni lni-bolt"></i>
                    @endif
                    @if($item->product_type=='sell')
                        <span class="flat-badge sale">Sale</span>
                    @endif
                    @if($item->product_type=='new')
                        <span class="flat-badge rent"> Rent </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-7 col-md-5 col-12">
                <div class="content">
                    <a href="javascript:void(0)" class="tag">Others</a>
                    <h3 class="title">
                        <a href="{{ url('shop/'.$item->sku) }}">{{ $item->title }}</a>
                    </h3>

                    <ul class="info">
                        <li class="price">  @if(isset($item->currency) && $item->currency->code!=get_user_currency()['code'])
                                {{ convert_to_user_currency($item->price,$item->currency->code) }}
                            @else
                                {{ currency_with_price($item->price,$item->currency->code) }}
                            @endif
                        </li>
                        <li class="like">
                            <livewire:like :product="$item->id"/>
                        </li>
                        <li class="like">
                            <livewire:add-to-cart :product="$item->id" :key="$item->sku"/>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
