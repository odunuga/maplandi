@if(count($hot_deals) > 0)
    <section class="items-grid section custom-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Hottest Deals</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Shop for the best deals of the day on Maplandi</p>
                    </div>
                </div>
            </div>
            <div class="single-head">
                <div class="row">
                    @foreach($hot_deals as $deal)
                        <div class="col-lg-4 col-md-6 col-12">

                            <div class="single-grid wow fadeInUp" data-wow-delay=".2s">
                                <div class="image">
                                    <a href="{{url('shop/'.$deal->sku) }}" class="thumbnail"><img
                                            src="{{ asset($deal->image?$deal->image->url:"") }}" alt="#"></a>
                                    <div class="product">
                                        <div class="product-image">
                                        </div>
                                        @if($deal->product_type=='sell')
                                            <p class="sale">For Sale</p>

                                        @endif
                                        @if($deal->product_type=='new')
                                            <span class="rent"> Rent </span>
                                        @endif
                                    </div>
                                    @if($deal->featured)
                                        <p class="item-position"><i class="lni lni-bolt"></i> Featured</p>
                                    @endif

                                </div>
                                <div class="content">
                                    <div class="top-content">
                                        <a href="javascript:void(0)" class="tag">{{ $deal->category->title }}</a>
                                        <h3 class="title">
                                            <a href="{{ url('shop/'.$deal->sku) }}">{{ $deal->title }}</a>
                                        </h3>
                                        <livewire:rating :deal="$deal" :key="$deal->id"/>
                                    </div>
                                    <div class="bottom-content">
                                        <p class="price">Price:
                                            <span>{{ convert_to_user_currency($deal->price,$deal->currency->symbol) }}</span>
                                        </p>
                                        <livewire:add-to-cart :product="$deal" :key="'dealCart'.$deal->sku"
                                                              :class="'like'"/>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('.rateit').rateit();
                $('.rateit').on('rated', function (event, value) {
                    Livewire.emit('rated', {id: event.target.id, value: value})
                })
            });
        </script>
    @endpush
@endif
