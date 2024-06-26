<html lang="{{ App::currentLocale() }}">
<head>
    <title>Інтернет магазин - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
{{--@php--}}
{{--    dump(Route::currentRouteName());--}}
{{--@endphp--}}
<div id="app">
{{--<div>--}}
    <header>
        @include('header')
    </header>
    <main>

        @yield('content')
    </main>
    <footer>
        @include('footer')
    </footer>
    <preloader></preloader>
</div>
</body>
</html>
