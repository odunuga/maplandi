<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Maplandi') }} Admin</title>
    @include('admin::partials.links')
    @if(Route::is('control.invoice'))
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    @else
        <meta name="viewport" content="width=device-width, initial-scale=1">
    @endif
    @livewireStyles
</head>
<body class="{{ isset($body_class)?$body_class:'' }}">
<div id="wrapper">
    @auth()
        @include('admin::partials.topbar')
        @include('admin::partials.sidebar')
        <div class="content-page">
            {{$slot}}
            <footer class="footer">
                © Maplandi <span class="d-none d-sm-inline-block"> </span>.
            </footer>
        </div>
    @else
        {{$slot}}
        <footer class="footer d-print-none ">
            © Maplandi <span class="d-none d-sm-inline-block"></span>.
        </footer>
    @endauth

</div>
@include('admin::partials.scripts')
@stack('scripts')
{{ isset($scripts)?$scripts:"" }}
<script src="{{ asset('vendor/admin/js/app.js') }}"></script>
</body>
</html>
