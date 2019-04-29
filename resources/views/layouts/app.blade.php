<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
        <meta name="description" content="{{ $description ?? 'Web designer & developer' }}">
        <meta name="author" content="Sebastian De Deyne">

        <meta property="og:title" content="{{ $title ?? 'Sebastian De Deyne' }}">
        @isset($image)
            <meta property="og:image" content="{{ $image }}">
            <meta property="og:image:width" content="1200">
            <meta property="og:image:height" content="630">
        @endisset
        <meta property="og:description" content="{{ $description ?? 'Web designer & developer' }}">
        <meta property="og:site_name" content="Sebastian De Deyne">

        <title>{{ isset($title) ? ($title . ' — Sebastian De Deyne') : 'Sebastian De Deyne' }}</title>

        <link rel="alternate" type="application/rss+xml" href="{{ url('feed') }}" title="Sebastian De Deyne">

        @include('layouts.partials.favicons')

        <style>{{ styles() }}</style>
    </head>
    <body>
        <div class="container">
            <nav class="nav wrap">
                <header>
                    <a href="{{ url('') }}">Sebastian De Deyne</a>
                </header>
                <ul>
                    <li><a href="{{ url('about') }}">About</a></li>
                    <li><a href="https://twitter.com/sebdedeyne">Twitter</a></li>
                    <li><a href="{{ url('feed') }}">RSS</a></li>
                </ul>
            </nav>
            <main {!! ($wrap ?? false) ? 'class="wrap"' : null !!}>
                @yield('main')
            </main>
        </div>

        {{ app(App\Schema\WebPage::class) }}

        @if(app()->environment('production'))
            @include('layouts.partials.analytics')
        @endif
    </body>
</html>
