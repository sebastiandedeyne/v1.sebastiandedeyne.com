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

        @include('_partials.favicons')

        <style type="text/css">
            {!! file_get_contents(public_path(elixir('css/site.css'))) !!}
        </style>
        <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:400,700" rel="stylesheet">

        <script src="{{ elixir('js/app.js') }}" defer></script>
    </head>
    <body class="@yield('body_classes')">
        @yield('content')
        @if(app()->environment('production'))
            @include('_partials.analytics')
        @endif
    </body>
</html>
