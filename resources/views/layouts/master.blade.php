<!DOCTYPE html>
<html lang="{{ locale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>@yield('title', 'Sebastian De Deyne')</title>

        <meta charset="utf-8">
        <meta name="description" content="content">

        @include('partials.favicons')

        <link rel="stylesheet" href="{{ elixir('style.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <script src="https://use.typekit.net/eoj6wle.js"></script>
        <script>try{Typekit.load({ async: false });}catch(e){}</script>

        <script src="{{ elixir('app.js') }}" defer></script>
    </head>
    <body class="@yield('body_classes')">
        @yield('content')
    </body>
</html>
