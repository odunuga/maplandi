<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($site_settings)?$site_settings->site_name:config('app.name', 'Maplandi') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    @include('partials.links')
    @livewireStyles
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<livewire:navbar key="{{ now() }}"/>
<div class="modal modal-dialog-scrollable fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <livewire:cart-modal key="{{ now() }}"/>
    </div>
</div>
{{ $slot }}
@include('partials.footer')

@livewireScripts
@include('partials.scripts')
@stack('scripts')
</body>
</html>
