<section class="items-tab section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Latest Products</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Shop from varieties of our newly stocked products</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @if($latest_products)
                            <button class="nav-link active" id="nav-latest-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-latest" type="button" role="tab" aria-controls="nav-latest"
                                    aria-selected="true">Latest Products
                            </button>
                        @endif
                        @if($popular_products)

                            <button class="nav-link" id="nav-popular-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-popular" type="button" role="tab" aria-controls="nav-popular"
                                    aria-selected="false">Popular Products
                            </button>
                        @endif
                        @if($random_products)
                            <button class="nav-link" id="nav-random-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-random" type="button" role="tab" aria-controls="nav-random"
                                    aria-selected="false">Random Products
                            </button>
                        @endif
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @if($latest_products)
                        <div class="tab-pane fade show active" id="nav-latest" role="tabpanel"
                             aria-labelledby="nav-latest-tab">
                            <div class="row">
                                @foreach($latest_products as $product)

                                    <div class="col-lg-3 col-md-4 col-12">

                                        <div class="single-item-grid">
                                            <div class="image">
                                                <a href="{{ url('shop/'.$product->sku) }}"><img
                                                        src="{{ asset($product->image?$product->image->url:"") }}"
                                                        alt="#"></a>
                                                @if($product->featured)
                                                    <i class=" cross-badge lni lni-bolt"></i>
                                                @endif
                                                @if($product->product_type=='sell')
                                                    <span class="flat-badge sale">Sale</span>
                                                @endif
                                                @if($product->product_type=='new')
                                                    <span class="flat-badge rent">
                                                        Rent
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="content">
                                                <a href="javascript:void(0)"
                                                   class="tag">{{ $product->category->title }}</a>
                                                <h3 class="title">
                                                    <a href="{{ url('shop/'.$product->sku) }}">{{ $product->title }}</a>
                                                </h3>
                                                <ul class="info">
                                                    <li class="price">
                                                        @if(isset($product->currency) && $product->currency->code!=get_user_currency()['code'])
                                                            {{ convert_to_user_currency($product->price,$product->currency->code) }}
                                                        @else
                                                            {{ currency_with_price($product->price,$product->currency->code) }}
                                                        @endif
                                                    </li>
                                                    <li class="like">
                                                        <livewire:add-to-cart :product="$product->id" :key="$product->sku"
                                                                              :class="'like'"/>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if($popular_products)
                        <div class="tab-pane fade" id="nav-popular" role="tabpanel"
                             aria-labelledby="nav-popular-tab">
                            <div class="row">
                                @foreach($popular_products as $product)
                                    <div class="col-lg-3 col-md-4 col-12">

                                        <div class="single-item-grid">
                                            <div class="image">
                                                <a href="{{ url('shop/'.$product->sku) }}"><img
                                                        src="{{ asset($product->image?$product->image->url:"") }}"
                                                        alt="#"></a>
                                                @if($product->featured)
                                                    <i class=" cross-badge lni lni-bolt"></i>
                                                @endif
                                                @if($product->product_type=='sell')
                                                    <span class="flat-badge sale">Sale</span>
                                                @endif
                                                @if($product->product_type=='new')
                                                    <span class="flat-badge rent">
                                                        Rent
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="content">
                                                <a href="javascript:void(0)"
                                                   class="tag">{{ $product->category->title }}</a>
                                                <h3 class="title">
                                                    <a href="{{ url('shop/'.$product->sku) }}">{{ $product->title }}</a>
                                                </h3>
                                                <ul class="info">
                                                    <li class="price">
                                                        @if(isset($product->currency) && $product->currency->code!=get_user_currency()['code'])
                                                            {{ convert_to_user_currency($product->price,$product->currency->code) }}
                                                        @else
                                                            {{ currency_with_price($product->price,$product->currency->code) }}
                                                        @endif
                                                    </li>
                                                    <li class="like">
                                                        <livewire:add-to-cart :product="$product->id" :key="$product->sku"
                                                                              :class="'like'"/>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if($random_products)
                        <div class="tab-pane fade" id="nav-random" role="tabpanel" aria-labelledby="nav-random-tab">
                            <div class="row">
                                @foreach($random_products as $product)
                                    <div class="col-lg-3 col-md-4 col-12">

                                        <div class="single-item-grid">
                                            <div class="image">
                                                <a href="{{ url('shop/'.$product->sku) }}"><img
                                                        src="{{ asset($product->image?$product->image->url:"") }}"
                                                        alt="#"></a>
                                                @if($product->featured)
                                                    <i class=" cross-badge lni lni-bolt"></i>
                                                @endif
                                                @if($product->product_type=='sell')
                                                    <span class="flat-badge sale">Sale</span>
                                                @endif
                                                @if($product->product_type=='new')
                                                    <span class="flat-badge rent">
                                                        Rent
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="content">
                                                <a href="javascript:void(0)"
                                                   class="tag">{{ $product->category->title }}</a>
                                                <h3 class="title">
                                                    <a href="{{ url('shop/'.$product->sku) }}">{{ $product->title }}</a>
                                                </h3>
                                                <ul class="info">
                                                    <li class="price">
                                                        @if(isset($product->currency) && $product->currency->code!=get_user_currency()['code'])
                                                            {{ convert_to_user_currency($product->price,$product->currency->code) }}
                                                        @else
                                                            {{ currency_with_price($product->price,$product->currency->code) }}
                                                        @endif
                                                    </li>
                                                    <li class="like">
                                                        <livewire:add-to-cart :product="$product->id" :key="$product->sku"
                                                                              :class="'like'"/>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
