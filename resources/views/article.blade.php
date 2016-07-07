@extends('layouts.master')

@section('title', "{$article->title} — Sebastian De Deyne")
@section('meta', $article->description)

@section('content')
<main class=grid>
    <div class=grid__row>
        <header class="fw:xbold fs:20 col:red mb:1 mt:1/2">
            <a href="{{ url('/') }}" class=logotype>Sebastian De Deyne</a>
        </header>
    </div>
    <div class=grid__row>
        <article class=v-article>
            <header class="mb:1">
                <h1 class="fs:33 fw:xbold mb:1/8">
                    {{ $article->title }}
                </h1>
                @if($article->date)
                <aside class="fs:14 col:text--lighter mb:1">
                    Published {{ $article->date->format('j F Y') }}
                    @if($article->era)
                        — <em>{{ $article->era }}</em>
                    @endif
                </aside>
                @endif
            </header>
            <section class=v-article__body>
                {!! $article->contents !!}
            </section>
            @if($article->commentable)
            <section class="v-article__comments mt:2">
                @include('partials.disqus')
            </section>
            @endif
            <section class="v-article__footer fs:14 lh:150 mt:2">
                <p class="mb:1/2">© {{ now()->format('Y') }} <a href="{{ url('/about') }}">Sebastian De Deyne</a> <span class="col:text--lighter fs:12">【ツ】</span></p>
                <p class="mb:1">
                    I'm a full-stack developer working at <a href="https://spatie.be" target="sebastiandedeyne.com">Spatie</a> in Antwerp, Belgium.
                    If you've got any comments, feedback or just want to chat you can get in touch via <a href="https://twitter.com/sebdedeyne" target="sebastiandedeyne.com">Twitter</a> or <a href="mailto:sebastiandedeyne@gmail.com">email</a>.
                </p>
            </section>
        </article>
    </div>
</main>
@endsection
