<!DOCTYPE html>
<html lang="{{ locale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>{{ isset($title) ? ($title . ' — Sebastian De Deyne') : 'Sebastian De Deyne' }}</title>

        <meta charset="utf-8">
        <meta name="description" content="{{ $meta_description ?? 'I\'m a web developer working at Spatie in Antwerp, Belgium.' }}">
        @if(isset($canonical_url) && $canonical_url)
            <link rel="canonical" href="{{ $canonical_url }}">
        @endif

        @include('laravel-feed::feed-links')

        @include('layouts.partials.favicons')

        <link href="https://fonts.googleapis.com/css?family=Alegreya|Source+Sans+Pro:600"   rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/site.css">

        <script src="/js/site.js" defer></script>

        @stack('head')
    </head>
    <body>
        {{ $slot }}

        @if(app()->environment('production'))
            @include('layouts.partials.analytics')
        @endif
    </body>
</html>
