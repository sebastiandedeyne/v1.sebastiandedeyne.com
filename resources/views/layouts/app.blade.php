<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
    <meta name="description" content="{{ $description ?? 'Web designer & developer' }}">
    <meta name="author" content="Sebastian De Deyne">

    <meta property="og:title" content="{{ $title ?? 'Sebastian De Deyne' }}">
    <meta property="og:description" content="{{ $description ?? 'Web designer & developer' }}">

    <title>{{ isset($title) ? ($title . ' — Sebastian De Deyne') : 'Sebastian De Deyne' }}</title>

    @include('feed::links')

    @include('layouts.partials.favicons')

    <style>{{ inline_mix('css/app.css') }}</style>
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono:400,700|IBM+Plex+Sans:400,400i,500,700,700i|IBM+Plex+Serif:400,400i,700" rel="stylesheet">

    <link rel="prefetch" href="{{ mix('js/highlight.js') }}" as="script">
  </head>
  <body>
    <div class="flex flex-col min-h-screen">
      @include('layouts.partials.header')
      <div class="wrapper | flex-1 mt-6 md:mt-32 mb-8 md:mb-16">
        {{ $slot }}
      </div>
      @include('layouts.partials.footer')
    </div>

    <script>{{ inline_mix('js/app.js') }}</script>
    @if(app()->environment('production'))
      @include('layouts.partials.analytics')
    @endif
  </body>
</html>
