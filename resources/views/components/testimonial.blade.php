@isset($testimonials)
    <section class="testimonials section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title align-center gray-bg">
                        <h2 class="wow fadeInUp"
                            data-wow-delay=".4s">{{ isset($testimonials_title)?$testimonials_title:'' }}</h2>
                        <p class="wow fadeInUp"
                           data-wow-delay=".6s">{{ isset($testimonials_details)?$testimonials_details:'' }}</p>
                    </div>
                </div>
            </div>
            <div class="row testimonial-slider">
                @foreach($testimonials as $item)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-testimonial">
                            <div class="quote-icon">
                                <i class="lni lni-quotation"></i>
                            </div>
                            <div class="product">
                                <img src="{{  $item->user->image_url }}" alt="#">
                                <h4 class="name">
                                    {{ $item->user->name}}
                                    <span class="deg">{{$item->created_at->diffForHumans()}}</span>
                                </h4>
                            </div>
                            <div class="text">
                                <p>{{ $item->body }}</p>
                            </div>
                        </div>

                    </div>

                @endforeach
            </div>
        </div>
    </section>
@endisset
