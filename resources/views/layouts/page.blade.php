<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="{{ $meta_description ?? 'I\'m a web developer working at Spatie in Antwerp, Belgium.' }}">
        <meta name="author" content="Sebastian De Deyne">
        @if(isset($canonical_url) && $canonical_url)
            <link rel="canonical" href="{{ $canonical_url }}">
        @endif

        <title>{{ isset($title) ? ($title . ' — Sebastian De Deyne') : 'Sebastian De Deyne' }}</title>

        @include('laravel-feed::feed-links')

        @include('layouts.partials.favicons')

        <link href="https://fonts.googleapis.com/css?family=Alegreya|Fira+Sans:400,400i,500,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href=" {{ mix('css/site.css') }}">

        <script src="{{ mix('js/site.js') }}" defer></script>

        @stack('head')
    </head>
    <body>
        @include('layouts.partials.header')

        {{ $slot }}

        @if(app()->environment('production'))
            @include('layouts.partials.analytics')
        @endif
    </body>
</html>
