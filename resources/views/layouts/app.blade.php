<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
        type="text/javascript"
    ></script>
    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    
    <title>@yield('title')</title>
    @stack('addon-style')
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app" class="d-flex mt-5">
        @yield('structure')
    </div>
</body>
</html>
