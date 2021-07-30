<x-guest-layout>
    <!--PRODUCT CATEGORIES -->
    <x-search-component/>
    <!--BEST DEAILS-->
    @livewire('deals', ['hot_deals' => $hot_deals])

    <!--LATEST PRODUCTS-->
    @livewire('latest', ['latest_products' => $latest_products, 'random_products' => $random_products,
    'popular_products' => $popular_products])

    <section class="how-works section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ __('texts.shop_with_ease_title') }} </h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">{{ __('texts.shop_with_ease') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">

                    <div class="single-work wow fadeInUp" data-wow-delay=".2s">
                        <span class="serial" style="	border: 6px solid #dc3545;">01</span>
                        <h3>{{__('texts.create_account')}}</h3>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-12">

                    <div class="single-work wow fadeInUp" data-wow-delay=".4s">
                        <span class="serial" style="	border: 6px solid #dc3545;">02</span>
                        <h3>{{__('texts.select_your_items')}}</h3>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-12">

                    <div class="single-work wow fadeInUp" data-wow-delay=".6s">
                        <span class="serial" style="	border: 6px solid #dc3545;">03</span>
                        <h3>{{__('texts.checkout')}}</h3>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <x-why-choose-us-component/>

    <x-testimonial-component/>

    <x-features-component/>

    <x-contact-us-component/>

    <x-map/>

    <x-newsletter/>
</x-guest-layout>
