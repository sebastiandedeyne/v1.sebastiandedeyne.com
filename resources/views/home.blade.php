@component('layouts.page')
    <div class="container">
        <section class="intro">
            <a href="{{ url('/') }}" class="intro__logotype logotype"></a>
            <h1 class="intro__title">
                Sebastian De Deyne
            </h1>
            <p class="intro__text h-width-two-thirds">
                I'm a web developer from Ghent working at <a href="https://spatie.be" target="sebdd" class="intro__text__link">Spatie</a> in Antwerp, Belgium.
            </p>
            <section class="intro__nav">
                <nav class="nav">
                    <ul>
                        <li class="nav__item">
                            <a class="nav__item__contents" href="{{ url('about') }}">About</a>
                        </li>
                        <li class="nav__item">
                            <a class="nav__item__contents" href="{{ url('open-source') }}">Open Source</a>
                        </li>
                        <li class="nav__item">
                            <a class="nav__item__contents" href="{{ url('blogroll') }}">Blogroll</a>
                        </li>
                    </ul>
                </nav>
            </section>
            <section class="intro__buttons">
                @include('partials.social')
            </section>
        </section>
        <section class="article-list">
            <h2 class="article-list__title">Articles</h2>
            @foreach($posts as $year => $posts)
                <section class="list-group">
                    <h2 class="list-group__title">
                        {{ $year }}
                    </h2>
                    <ul>
                        @foreach($posts as $post)
                            <li class="list-group__item">
                                <a class="list-group__link" href="{{ $post->url }}">
                                    {{ $post->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </section>
            @endforeach
        </section>
        @include('partials.footer')
    </div>
@endcomponent
