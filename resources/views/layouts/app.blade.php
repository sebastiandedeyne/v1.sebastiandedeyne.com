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

    {{-- <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700" rel="stylesheet"> --}}

    <style>{{ inline_mix('css/app.css') }}</style>

    <link rel="prefetch" href="{{ mix('js/highlight.js') }}" as="script">
  </head>
  <body @if($isHomePage ?? false) class="is-home" @endif>
    @include('layouts.partials.header', [
      'breadcrumb' => $breadcrumb ?? null,
    ])

    @if($isHomePage ?? false)
      <div class="mb-16" style="margin-top: 19vw">
    @else
      <div class="mt-32 mb-16">
    @endif
      {{ $slot }}
    </div>

    @include('layouts.partials.footer')

    <script>{{ inline_mix('js/app.js') }}</script>
    @if(app()->environment('production'))
      @include('layouts.partials.analytics')
    @endif
  </body>
</html>
