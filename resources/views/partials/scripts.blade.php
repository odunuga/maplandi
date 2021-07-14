<a href="#" class="scroll-top btn-hover">
    <i class="lni lni-chevron-up"></i>
</a>


{{--<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
<script src="{{ asset('vendor/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/js/wow.min.js') }}"></script>
<script src="{{ asset('vendor/js/tiny-slider.js') }}"></script>
<script src="{{ asset('vendor/js/glightbox.min.js') }}"></script>
<script src="{{ asset('vendor/js/jquery.rateit.min.js') }}"></script>
<script src="{{ asset('vendor/js/main.js') }}"></script>
<script src="{{ asset('vendor/js/toastr.min.js') }}"></script>
<script src="{{ asset('vendor/pace-master/pace.js') }}"></script>
<script type="text/javascript">
    //========= Category Slider
    let cat = document.getElementsByClassName('category-slider');

    if (cat.length > 0)
        tns({
            container: '.category-slider',
            items: 3,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 2,
                },
                768: {
                    items: 4,
                },
                992: {
                    items: 5,
                },
                1170: {
                    items: 6,
                }
            }
        });

    //========= testimonialComponent
    let test = document.getElementsByClassName('testimonial-slider');
    if (test.length > 0)
        tns({
            container: '.testimonial-slider',
            items: 3,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: true,
            controls: false,
            controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 2,
                },
                1170: {
                    items: 2,
                }
            }
        });

    paceOptions = {
        catchupTime: 100,
        initialRate: .03,
        minTime: 250,
        ghostTime: 100,
        maxProgressPerFrame: 20,
        easeFactor: 1.25,
        startOnPageLoad:true,
        restartOnPushState:true,
        restartOnRequestAfter: 500,
        target:'body',
        elements: {
            checkInterval: 100,
            selectors: ['body']
        },
        eventLag: {
            minSamples: 10,
            sampleCount: 3,
            lagThreshold: 3
        },
        ajax: {
            trackMethods: ['GET'],
            trackWebSockets:true,
            ignoreURLs: []
        }

    }

    window.livewire.on('alert', data => {
        const type = data[0];
        const message = data[1];

        toastr[type](message);
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "500",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    });
</script>
