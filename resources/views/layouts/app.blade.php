<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
        <meta name="description" content="{{ $description ?? 'I\'m a web developer working at Spatie in Antwerp, Belgium.' }}">
        <meta name="author" content="Sebastian De Deyne">

        <meta property="og:title" content="{{ $title ?? 'Sebastian De Deyne' }}">
        <meta property="og:description" content="{{ $description ?? 'I\'m a web developer working at Spatie in Antwerp, Belgium.' }}">

        <title>{{ isset($title) ? ($title . ' — Sebastian De Deyne') : 'Sebastian De Deyne' }}</title>

        @include('feed::links')

        @include('layouts.partials.favicons')

        <link rel="preconnect" href="https://fonts.gstatic.com/">

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">

        <script defer src="{{ mix('js/app.js') }}"></script>

        @stack('head')
    </head>
    <body>
        @if($header ?? true)
            @include('layouts.partials.header')
        @endif

        {{ $slot }}

        @if(app()->environment('production'))
            @include('layouts.partials.analytics')
        @endif
    </body>
</html>
