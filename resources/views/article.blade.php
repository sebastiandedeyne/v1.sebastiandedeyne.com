@extends('_layouts.master')

@section('title', "{$article->title} — Sebastian De Deyne")
@section('meta', $article->description)

@section('content')
<main class="container">
    <article class="v-article">
        <section class="v-article__site-header">
            <a href="{{ url('/') }}" class="v-article__site-header__logotype">
                Sebastian De Deyne
            </a>
        </section>
        <header class="v-article__header">
            <h1 class="v-article__header__title">
                {{ $article->title }}
            </h1>
            @if($article->date)
            <aside class="v-article__header__meta">
                Published {{ $article->date->format('j F Y') }}
                @if($article->era)
                    — <em>{{ $article->era }}</em>
                @endif
            </aside>
            @endif
        </header>
        <section class="v-article__body">
            {!! $article->contents !!}
        </section>
        <section class="v-article__footer">
            <p class="v-article__footer__credits">© {{ carbon()->format('Y') }} <a href="{{ url('about') }}">Sebastian De Deyne</a> <span class="col:text--lighter fs:12">【ツ】</span></p>
            <p class="v-article__footer__about">
                I'm a full-stack developer working at <a href="https://spatie.be" target="sebastiandedeyne.com">Spatie</a> in Antwerp, Belgium.
                If you've got any comments, feedback or just want to chat you can get in touch via <a href="https://twitter.com/sebdedeyne" target="sebastiandedeyne.com">Twitter</a> or <a href="mailto:sebastiandedeyne@gmail.com">email</a>.
            </p>
        </section>
    </article>
</main>
@endsection
