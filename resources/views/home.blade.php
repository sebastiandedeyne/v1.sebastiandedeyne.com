@extends('layouts.master')

@section('body_classes', 'bg:red')

@section('content')
<main class="v-home grid">
    <div class="grid__row">
        <div class="grid__col--3/4">
            <header class="v-home__title">
                <h1>Sebastian De Deyne</h1>
            </header>
            <section class="v-home__intro">
                <p>I'm a full-stack developer working at <a href="https://spatie.be" target="_blank">Spatie</a> in Antwerp, Belgium.</p>
            </section>
        </div>
    </div>
    <div class="grid__row">
        <section class="v-home__toc">
            <h2 class="v-home__toc__title">Blog</h2>
            <ul class="v-home__toc__list">
                @foreach($posts as $post)
                    <li>
                        <a href="{{ $post->url }}">{{ $post->title }}</a>
                        <aside class="v-home__toc__list__aside">{{ $post->date->format('m/Y') }}</aside>
                    </li>
                @endforeach
            </ul>
            <h2 class="v-home__toc__title">More</h2>
            <ul class="v-home__toc__list">
                @foreach($more as $item)
                    <li>
                        @if(isset($item[1]))
                            <a href="{{ $item[1] }}">{{ $item[0] }}</a>
                        @else
                            {{ $item[0] }}
                        @endif
                        @if(isset($item[2]))
                            <aside class="v-home__toc__list__aside">{{ $item[2] }}</aside>
                        @endif
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
    <div class="grid__row">
        <footer class="v-home__footer">
            <a href="https://twitter.com/sebdedeyne" class=btn target="_blank" title="Twitter">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="https://github.com/sebastiandedeyne" class=btn target="_blank" title="Github">
                <i class="fa fa-github"></i>
            </a>
            <a href="mailto:sebastiandedeyne@gmail.com" class=btn title="E-mail">
                <i class="fa fa-at"></i>
            </a>
        </footer>
    </div>
</main>
@endsection
