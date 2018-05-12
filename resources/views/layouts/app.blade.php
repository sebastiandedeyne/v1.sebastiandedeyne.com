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

    {{-- <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700" rel="stylesheet"> --}}

    <style>{{ inline_mix('css/app.css') }}</style>

    <link rel="prefetch" href="{{ mix('js/highlight.js') }}" as="script">
  </head>
  <body @isset($bodyClass) class="{{ $bodyClass }}"@endisset>
    @include('layouts.partials.header', [
      'breadcrumb' => $breadcrumb ?? null,
    ])

    @if($withSpacing ?? true)
      <div class="wrapper | mt-6 md:mt-32 mb-8 md:mb-16">
        {{ $slot }}
      </div>
    @else
      <div class="wrapper">
        {{ $slot }}
      </div>
    @endif

    @include('layouts.partials.footer')

    <script>{{ inline_mix('js/app.js') }}</script>
    @if(app()->environment('production'))
      @include('layouts.partials.analytics')
    @endif
  </body>
</html>
