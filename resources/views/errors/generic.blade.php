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
        @unless(Request::path() === '/')
            <a href="{{ url('/') }}" class="button">
                Go home
            </a>
        @endunless
    </section>
@endcomponent
