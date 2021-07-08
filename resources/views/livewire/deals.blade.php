@if(count($hot_deals)>0)
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
                                    <a href="{{ route('shop',['id'=>$deal->id]) }}" class="thumbnail"><img
                                            src="{{ asset($deal->image) }}" alt="#"></a>
                                    <div class="product">
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="top-content">
                                        <a href="javascript:void(0)" class="tag">Mobile Phones</a>
                                        <h3 class="title">
                                            <a href="shop/product-details.html">Apple Iphone X</a>
                                        </h3>
                                        <ul class="rating">
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><a href="javascript:void(0)">(35)</a></li>
                                        </ul>

                                    </div>
                                    <div class="bottom-content">
                                        <p class="price">Price: <span>{{ number_format($deal->price) }}</span></p>
                                        <a href="javascript:void(0)" class="like"><i class="lni lni-cart"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
