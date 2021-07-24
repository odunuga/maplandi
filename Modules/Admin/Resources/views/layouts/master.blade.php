<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Maplandi') }} Admin</title>

    @auth('admin')
        <link href="{{ asset('vendor/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/admin/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/admin/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/admin/css/style.css') }}" rel="stylesheet" type="text/css">
        <!--FAVICONS-->
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('vendor/admin/favicon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('vendor/admin/favicon/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('vendor/admin/favicon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('vendor/admin/favicon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('vendor/admin/favicon/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('vendor/admin/favicon/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('vendor/admin/favicon/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('vendor/admin/favicon/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('vendor/admin/favicon/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('vendor/admin/favicon/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('vendor/admin/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('vendor/admin/favicon/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendor/admin/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('vendor/admin/favicon/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="./{{ asset('vendor/admin/favicon/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">
    @else
        <link href="{{ asset('vendor/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/admin/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/admin/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/admin/css/style.css') }}" rel="stylesheet" type="text/css">

    @endauth

</head>
<body class="{{ isset($body_class)?$body_class:'' }}">

{{$slot}}

<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@auth('admin')
    <!-- jQuery  -->
    <script src="{{ asset('vendor/admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('vendor/admin/js/waves.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ asset('vendor/admin/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/plugins/raphael/raphael.min.js') }}"></script>

    <script src="{{ asset('vendor/admin/pages/dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('vendor/admin/js/app.js') }}"></script>
@else
    <script src="{{asset('vendor/admin/js/metismenu.min.js')}}"></script>
    <script src="{{asset('vendor/admin/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('vendor/admin/js/waves.min.js')}}"></script>
@endauth
</body>
</html>
