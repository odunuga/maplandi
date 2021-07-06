<section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="contact-head wow fadeInUp" data-wow-delay=".4s">
            <div class="row">
                <div class="col-lg-5 col-12">
                    <div class="single-head">
                        <div class="contant-inner-title">
                            <h2>Our Contacts & Location</h2>
                        </div>
                        <div class="single-info">
                            <h3>Opening hours</h3>
                            <ul>
                                @isset($site_settings)
                                    @foreach($site_settings->opening_hours as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>
                        <div class="single-info">
                            <h3>Contact info</h3>
                            <ul>
                                @isset($site_settings)
                                    <li>{{ $site_settings->site_address }}</li>
                                    <li>
                                        <a href="mailto:{{ $site_settings->site_email }}"><span
                                            >{{ $site_settings->site_email }}</span></a>
                                    </li>
                                    <li>
                                        <a href="tel:{{ filter_phone($site_settings->contact_number) }}">{{ $site_settings->contact_number }}</a>
                                    </li>
                                @endisset

                            </ul>
                        </div>
                        <div class="single-info contact-social">
                            <h3>Social contact</h3>
                            <ul>
                                @isset($site_settings->facebook_handler)
                                    <li><a href="{{$site_settings->facebook_handler}}"><i
                                                class="lni lni-facebook-original"></i></a></li>
                                @endif
                                @isset($site_settings->twitter_handler)
                                    <li><a href="{{ $site_settings->twitter_handler }}"><i
                                                class="lni lni-twitter-original"></i></a></li>
                                @endif
                                @isset($site_settings->linkedin_handler)
                                    <li><a href="{{ $site_settings->linkedin_handler }}"><i
                                                class="lni lni-linkedin-original"></i></a></li>
                                @endif
                                @isset($site_settings->instagram_handler)
                                    <li><a href="{{ $site_settings->instagram_handler }}"><i
                                                class="lni lni-instagram"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="form-main">
                        <div class="form-title">
                            <h2>Get in Touch</h2>
                            <p>Want to make a custom order, partnerships or other enquiries leave us a message</p>
                        </div>
                            <livewire:contact-us />

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
