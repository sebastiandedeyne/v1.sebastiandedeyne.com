@extends('_layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="column column--two-thirds">
            <section class="intro">
                <a href="{{ url('/') }}" class="intro__logotype logotype"></a>
                <h1 class="intro__title">
                    Sebastian De Deyne
                </h1>
                <p class="intro__text">
                    I'm a full-stack developer from Ghent working at Spatie in Antwerp, Belgium.
                </p>
                <nav class="nav">
                    <ul>
                        <li class="nav__item">
                            <a class="nav__item__contents" href="{{ url('about') }}">about</a>
                        </li>
                        <li class="nav__item">
                            <a class="nav__item__contents" href="{{ url('open-source') }}">open source projects</a>
                        </li>
                    </ul>
                </nav>
            </section>
        </div>
    </div>
    <section class="article-list">
        <h2 class="article-list__title">articles</h2>
        @foreach($posts as $month => $posts)
            <section class="list-group">
                <h2 class="list-group__title">
                    {{ $month }}
                </h2>
                @foreach($posts as $post)
                    <article class="list-group__item">
                        <a class="list-group__item__text" href="{{ $post->url }}">
                            {{ $post->title }}
                        </a>
                    </article>
                @endforeach
            </section>
        @endforeach
    </section>
</div>
<footer class="footer">
    <div class="container">
        © {{ carbon()->format('Y') }} Sebastian De Deyne
    </div>
</footer>
@endsection
