<footer class="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">

                    <div class="single-footer mobile-app">
                        <h3>We Accept</h3>
                        <div class="app-button">
                            <a href="javascript:void(0)" class="btn">
                                <i class="lni lni-visa"></i>
                                <span class="text">
Visa</span>
                            </a>
                            <a href="javascript:void(0)" class="btn">
                                <i class="lni lni-mastercard"></i>
                                <span class="text">
Mastercard</span>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6 col-12">

                    <div class="single-footer f-link">
                        <h3>Locations</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <ul>
                                    <li><a href="javascript:void(0)">Lagos</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6 col-12">

                    <div class="single-footer f-link">
                        <h3>Quick Links</h3>
                        <ul>
                            <li><a href="javascript:void(0)">About Us</a></li>
                            <li><a href="javascript:void(0)">How It's Works</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Signup</a></li>
                            <li><a href="javascript:void(0)">Help & Support</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6 col-12">

                    <div class="single-footer  f-contact">
                        <h3>Contact</h3>
                        <ul>
                            <li>{!! isset($site_settings)?$site_settings->site_address:'' !!}</li>
                            <li>Tel.{{ isset($site_settings)?$site_settings->contact_number:'' }}<br> Mail. <a
                                    href="mailto:{{ isset($site_settings)?$site_settings->site_email:'' }}">{{ isset($site_settings)?$site_settings->site_email:'' }}</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="footer-bottom">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-12">
                        <div class="content">
                            <ul class="footer-bottom-links">
                                <li><a href="{{ route('terms.show') }}">Terms of use</a></li>
                                <li><a href="{{ route('policy.show') }}"> Privacy Policy</a></li>

                            </ul>
                            <ul>
                                <li class="flex-row">

                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a rel="alternate" hreflang="{{ $localeCode }}"
                                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a> |
                                    @endforeach


                                </li>

                            </ul>
                            <ul class="footer-social">
                                <li><a href="{{ isset($site_settings)?$site_settings->facebook_handle:'' }}"><i
                                            class="lni lni-facebook-filled"></i></a>
                                </li>
                                <li><a href="{{isset($site_settings)?$site_settings->twitter_handle:''}}:''"><i
                                            class="lni lni-twitter-original"></i></a>
                                </li>
                                <li><a href="{{ isset($site_settings)?$site_settings->instagram_handle:'' }}"><i
                                            class="lni lni-instagram"></i></a></li>
                                <li><a href="{{  isset($site_settings)?$site_settings->linkedin_handle:''  }}"><i
                                            class="lni lni-linkedin-original"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
