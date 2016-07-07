<!DOCTYPE html>
<html lang="{{ locale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>@yield('title', 'Sebastian De Deyne')</title>

        <meta charset="utf-8">
        <meta name="description" content="@yield('meta', 'I\'m a full-stack developer working at Spatie in Antwerp, Belgium.')">

        <link rel="alternate" type="application/rss+xml" title="Sebastian De Deyne — Posts" href="{{ url('feed') }}" />

        @include('partials.favicons')

        <link rel="stylesheet" href="{{ elixir('style.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <script src="{{ elixir('head.js') }}"></script>
        <script src="{{ elixir('app.js') }}" defer></script>
    </head>
    <body class="@yield('body_classes')">
        @if(app()->environment('production'))
            @include('partials.analytics')
        @endif
        @yield('content')
    </body>
</html>
