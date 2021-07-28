<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Maplandi') }} Admin</title>
    @include('admin::partials.links')
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
        <footer class="footer">
            © Maplandi <span class="d-none d-sm-inline-block"></span>.
        </footer>
    @endauth

</div>
@include('admin::partials.scripts')
@stack('scripts')
{{ isset($scripts)?$scripts:"" }}
</body>
</html>
