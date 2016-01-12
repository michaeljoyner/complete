<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Complete Admin</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    @yield('head')
</head>
<body>
@if(Auth::check())
    @include('admin.partials.navbar')
@endif
    @yield('content')
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="/js/materialize.min.js"></script>
    <script src="{{ elixir('js/main.js') }}"></script>
{{--    <script src="{{ elixir('js/main.js') }}"></script>--}}
    @yield('bodyscripts')
</body>
</html>