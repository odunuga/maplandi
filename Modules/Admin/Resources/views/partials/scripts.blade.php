<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{--<script src="{{ asset('vendor/admin/js/jquery.min.js') }}"></script>--}}

@guest()
    <script src="{{asset('vendor/admin/js/metismenu.min.js')}}"></script>
    <script src="{{asset('vendor/admin/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('vendor/admin/js/waves.min.js')}}"></script>
@else
    <!-- jQuery  -->
    @livewireScripts
    <script src="{{ asset('vendor/admin/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                @auth()
                'Authorization': 'Bearer {{auth()->user()->createToken('accessToken')->plainTextToken }}',
                @endauth
                'X-CSRF-TOKEN': '{{csrf_token() }}'
            }
        });
    </script>
    <script src="{{ asset('vendor/admin/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('vendor/admin/js/waves.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ asset('vendor/admin/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/pages/dashboard.init.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/dt/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/r-2.2.9/sl-1.3.3/datatables.min.js"></script>
@endguest

<script src="{{ asset('vendor/js/toastr.min.js') }}"></script>
<script>

    window.livewire.on('alert', data => {
        console.log(data);
        const type = data[0];
        const message = data[1];
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
        toastr[type](message);
    });
    $(document).ready(function () {
        @if($errors->any())
            @foreach($errs = $errors->all() as $err)
            toastr['error']('{{ $err }}');
        @endforeach
        @endif
    });
</script>
<script src="{{ asset('vendor/admin/js/app.js') }}"></script>
