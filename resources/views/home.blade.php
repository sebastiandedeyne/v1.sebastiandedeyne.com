@extends('_layouts.master')

@section('body_classes', 'bg:red')

@section('content')
<main class="v-home container">
    <section class="v-home__header">
        <header class="v-home__header__title">
            <h1>Sebastian De Deyne</h1>
        </header>
        <section class="v-home__header__intro">
            <p>I'm a full-stack developer working at <a href="https://spatie.be" target="_blank">Spatie</a> in Antwerp, Belgium.</p>
        </section>
    </section>
    <section class="v-home__toc">
        <ul class="v-home__toc__list">
            @foreach($posts as $post)
                <li class="v-home__toc__list__item">
                    <aside class="v-home__toc__list__item__aside">
                        {{ $post->date->format('d/m/Y') }}
                    </aside>
                    <a href="{{ $post->url }}">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>
        <ul class="v-home__toc__list">
            <li class="v-home__toc__list__item">
                <aside class="v-home__toc__list__item__aside">Meta</aside>
                <a href="{{ url('about') }}">About me</a>
            </li>
        </ul>
    </section>
    <footer class="v-home__footer">
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
