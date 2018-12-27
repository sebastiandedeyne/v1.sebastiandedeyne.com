@php
    $showHomeLink = $showHomeLink ?? request()->path() !== '/';

    $title = $title ?? array_random([
      '¯\_(ツ)_/¯', 'Awkward.', 'Bantha fodder.', 'Hmmm...', 'Oh no!',
      'Peculiar.', 'Uh oh.', 'Whoops!',
    ]);
@endphp

<layout :title="$title">
    <div class="wrap">
        <h1 class="font-mono">
            {{ $title }}
        </h1>
        <p class="mb-12">
            {{ $message }}
        </p>
        @if($showHomeLink)
            <p class="markup">
                <a href="{{ route('home') }}">
                    Go home
                </a>
            </p>
        @endunless
    </div>
</layout>
