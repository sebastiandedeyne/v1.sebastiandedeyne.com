@extends('layouts.master')

@section('title', "{$article->title} — Sebastian De Deyne")

@section('content')
<main class=container>
    <header class="fw:xbold fs:20 col:red mb:1 mt:1/2">
        <a href="{{ url('/') }}" class=logotype>Sebastian De Deyne</a>
    </header>
    <article class=v-article>
        <header class="mb:1">
            <h1 class="fs:33 fw:xbold mb:1/8">
                {{ $article->title }}
            </h1>
            @if($article->date)
            <aside class="fs:14 col:text--lighter mb:1">
                Published {{ $article->date->format('j F Y') }}
            </aside>
            @endif
        </header>
        <section class=v-article__body>
            {!! $article->contents !!}
        </section>
        <section class="v-article__footer fs:14 lh:1.5 mt:2">
            <p class="mb:1/2">© {{ now()->format('Y') }} <a href="{{ url('/') }}">Sebastian De Deyne</a></p>
            <p class="mb:1">
                I'm a full-stack developer working at <a href="https://spatie.be" target="_blank">Spatie</a> in Antwerp, Belgium.
                If you've got any comments or feedback I'm always up for a talk on <a href="https://twitter.com/sebdedeyne" target="_blank">Twitter</a> or via <a href="mailto:sebastiandedeyne@gmail.com">email</a>.
            </p>
        </section>
    </article>
</main>
@endsection
