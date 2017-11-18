<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="A Contact Management Demo">
    <meta name="author" content="DarkPain">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Hack Cyprus Demo') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
@include('partials.navbar')
@include('partials.errors')
@yield('content')

<div class="footer">
    @include('partials.footer')
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
@include('partials.scripts')
@stack('scripts')
</body>
</html>
