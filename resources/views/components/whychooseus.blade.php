<section class="why-choose section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Why Choose Us</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">At Maplandi we are commited to delivering
                        everything you could possibly need for life and living at the best prices than anywhere
                        else.

                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="choose-content">
                    <div class="row">
                        @isset($why_choose_us)
                            @foreach($why_choose_us as $item)
                                <div class="col-lg-4 col-md-6 col-12">

                                    <div class="single-list wow fadeInUp" data-wow-delay=".2s">
                                        <i class="{{ $item->icon }}"></i>
                                        <h4>{{ $item->title }}</h4>
                                        <p>{{ $item->description }}</p>
                                    </div>

                                </div>
                            @endforeach
                        @else
                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="single-list wow fadeInUp" data-wow-delay=".2s">
                                    <i class="lni lni-book"></i>
                                    <h4>Trustworthy</h4>
                                    <p>You can place your orders with a soothing relief and be rest assured to get the best
                                        from us.</p>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="single-list wow fadeInUp" data-wow-delay=".4s">
                                    <i class="lni lni-money-protection"></i>
                                    <h4>
                                        Affordable</h4>
                                    <p>We give the best prices better than anyone else</p>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="single-list wow fadeInUp" data-wow-delay=".6s">
                                    <i class="lni lni-cog"></i>
                                    <h4>Efficient</h4>
                                    <p>All our processes are well organized from account creation to order processing expect
                                        the best no less.</p>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="single-list wow fadeInUp" data-wow-delay=".2s">
                                    <i class="lni lni-pointer-up"></i>
                                    <h4>Quality</h4>
                                    <p>Our products are so quality that you can make your order with your eyes closed and
                                        still get the best</p>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="single-list wow fadeInUp" data-wow-delay=".4s">
                                    <i class="lni lni-layout"></i>
                                    <h4>Support</h4>
                                    <p>Our support teams are availaible 24/7 to attend to all your queries</p>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="single-list wow fadeInUp" data-wow-delay=".6s">
                                    <i class="lni lni-delivery"></i>
                                    <h4>Nationwide Delivery</h4>
                                    <p>We deliver to all states in Nigeria</p>
                                </div>

                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
