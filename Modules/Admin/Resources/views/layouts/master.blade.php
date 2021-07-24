<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Module Admin</title>

    @auth('admin')
    @else
        <link href="{{ asset('vendor/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/admin/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/admin/assets/css/style.css') }}" rel="stylesheet" type="text/css">


    @endauth

</head>
<body>

{{$slot}}

{{-- Laravel Mix - JS File --}}
{{-- <script src="{{ mix('js/admin.js') }}"></script> --}}
@auth('admin')
@else

    <script src="{{asset('vendor/admin/js/metismenu.min.js')}}"></script>
    <script src="{{asset('vendor/admin/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('vendor/admin/js/waves.min.js')}}"></script>
@endauth
</body>
</html>
