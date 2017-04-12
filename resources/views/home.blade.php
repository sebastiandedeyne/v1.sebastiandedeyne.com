@component('layouts.page')
    <div class="container">
        <div class="row">
            <div class="column -two-thirds">
                <section class="intro">
                    <a href="{{ url('/') }}" class="intro__logotype logotype"></a>
                    <h1 class="intro__title">
                        Sebastian De Deyne
                    </h1>
                    <p class="intro__text">
                        I'm a full-stack developer from Ghent working at Spatie in Antwerp, Belgium.
                    </p>
                    <section class="intro__nav">
                        <nav class="nav">
                            <ul>
                                <li class="nav__item">
                                    <a class="nav__item__contents" href="{{ url('about') }}">about</a>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__item__contents" href="{{ url('open-source') }}">open source</a>
                                </li>
                            </ul>
                        </nav>
                    </section>
                    <section class="intro__buttons">
                        @include('partials.social')
                    </section>
                </section>
            </div>
        </div>
        <section class="article-list">
            <h2 class="article-list__title">articles</h2>
            @foreach($posts as $year => $posts)
                <section class="list-group">
                    <h2 class="list-group__title">
                        {{ $year }}
                    </h2>
                    <ul>
                        @foreach($posts as $post)
                            <li class="list-group__item">
                                <a href="{{ $post->url }}">
                                    {{ $post->title }}
                                </a>
                                <span class="list-group__item__meta">
                                    {{ $post->date->format('d/m') }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </section>
            @endforeach
        </section>
        @include('partials.footer')
    </div>
@endcomponent
