@php
    $showHomeLink = $showHomeLink ?? request()->path() !== '/';

    $message = $message ?? array_random([
        '¯\_(ツ)_/¯', 'Awkward.', 'Bantha fodder.', 'Hmmm...', 'Oh no!',
        'Peculiar.', 'Uh oh.', 'Whoops!',
    ]);
@endphp

@component('layouts.page', [
    'title' => $title,
])
    <section class="error">
        <h1 class="error__title">
            {{ $title }}
        </h1>
        <p class="error__message">
            {{ $message }}
        </p>
        @if($showHomeLink)
            <a href="{{ url('/') }}" class="button">
                Go home
            </a>
        @endunless
    </section>
@endcomponent
