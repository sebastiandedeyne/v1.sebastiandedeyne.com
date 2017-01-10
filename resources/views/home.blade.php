@extends('_layouts.master')

@section('body_classes', 'bg:red')

@section('content')
<main class="home container">
    <section class="home__header">
        <header class="home__header__title">
            <h1>Sebastian De Deyne</h1>
        </header>
        <section class="home__header__intro">
            <p>I'm a full-stack developer working at <a href="https://spatie.be" target="_blank">Spatie</a> in Antwerp, Belgium.</p>
        </section>
    </section>
    <section class="home__toc">
        <ul class="home__toc__list">
            @foreach($posts as $post)
                <li class="home__toc__list__item">
                    <aside class="home__toc__list__item__aside">
                        {{ $post->date->format('d/m/Y') }}
                    </aside>
                    <a class="home__toc__list__item__link" href="{{ $post->url }}">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>
        <ul class="home__toc__list">
            <li class="home__toc__list__item">
                <aside class="home__toc__list__item__aside">More</aside>
                <a class="home__toc__list__item__link" href="{{ url('about') }}">About me</a>
                <a class="home__toc__list__item__link" href="{{ url('open-source') }}">Open Source Work</a>
            </li>
        </ul>
    </section>
    <footer class="home__footer">
        <a href="https://twitter.com/sebdedeyne" class="btn btn--icon" target="_blank" title="Twitter">
            @include('_partials.icons.twitter', ['size' => 20])
        </a>
        <a href="https://github.com/sebastiandedeyne" class="btn btn--icon" target="_blank" title="Github">
            @include('_partials.icons.github', ['size' => 20])
        </a>
        <a href="mailto:sebastiandedeyne@gmail.com" class="btn btn--icon" title="E-mail">
            @include('_partials.icons.email', ['size' => 20])
        </a>
    </footer>
</main>
@endsection
