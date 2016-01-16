@extends('layouts.master')

@section('content')
<main class="v-post">
    <header>
        <a href="{{ url('/') }}">SDD</a>
    </header>
    <article>
        <header>
            <h1>
                {{ $post->title }}
            </h1>
            <aside>
                Published {{ $post->date->format('j F Y') }}
            </aside>
        </header>
        <section>
            {!! $post->contents !!}
        </section>
        <section>
            <p>© {{ now()->format('Y') }} <a href="{{ url('/') }}">Sebastian De Deyne</a></p>
            <p>
                I'm a full-stack developer working at <a href="https://spatie.be" target="_blank">Spatie</a> in Antwerp, Belgium.
                If you've got any comments or feedback I'm always up for a talk on <a href="https://twitter.com/sebdedeyne" target="_blank">Twitter</a> or via <a href="mailto:sebastiandedeyne@gmail.com">email</a>.
            </p>
        </section>
    </article>
</main>
@endsection
