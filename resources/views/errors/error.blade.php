@php
  $showHomeLink = $showHomeLink ?? request()->path() !== '/';

  $title = $title ?? array_random([
    '¯\_(ツ)_/¯', 'Awkward.', 'Bantha fodder.', 'Hmmm...', 'Oh no!',
    'Peculiar.', 'Uh oh.', 'Whoops!',
  ]);
@endphp

@component('layouts.app', [
  'title' => $title,
  'header' => false,
])
  <div class="markup">
    <h1 class="text-lg md:text-xl">
      {{ $title }}
    </h1>
    <p>
      {{ $message }}
    </p>
    @if($showHomeLink)
      <a href="{{ route('home') }}">
        Go home
      </a>
    @endunless
  </div>
@endcomponent
