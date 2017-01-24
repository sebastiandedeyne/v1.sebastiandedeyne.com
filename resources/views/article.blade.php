@push('head')
<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
@endpush

@component('layouts.page', [
    'title' => $article->title,
    'meta' => $article->description,
])
    <article class="article">
        <header class="article__header">
            <div class="container">
                <a href="{{ url('/') }}" class="article__header__logotype logotype"></a>
                <h1 class="article__header__title">
                    {{ $article->title }}
                </h1>
                @if($article->date)
                    <aside class="article__header__meta">
                        Published on {{ $article->date->format('j F Y') }} by Sebastian De Deyne
                        @if($article->era)
                            — <em>{{ $article->era }}</em>
                        @endif
                    </aside>
                @endif
            </div>
        </header>
        <section class="article__body">
            <div class="container container--narrow">
                {!! $article->contents !!}
            </div>
        </section>
        <footer class="article__footer">
            <div class="container container--narrow">
                <p class="article__footer__credits">© {{ carbon()->format('Y') }} <a href="{{ url('about') }}">Sebastian De Deyne</a> <span class="col:text--lighter fs:12">【ツ】</span></p>
                <div class="article__footer__about">
                    <p>
                        I'm a full-stack developer from Ghent working at <a href="https://spatie.be" target="sebdd">Spatie</a> in Antwerp, Belgium.
                    </p>
                    <p>
                        If you've got any comments, feedback or just want to chat you can get in touch via <a href="https://twitter.com/sebdedeyne" target="sebdd">Twitter</a> or <a href="mailto:sebastiandedeyne@gmail.com">email</a>. If you catch a mistake or notice something that could be improved, feel free to <a target="sebdd" href="https://github.com/sebastiandedeyne/sebastiandedeyne.com/edit/master/content/{{ $article->slug }}.md">send a PR on GitHub</a>.
                    </p>
                </div>
            </div>
        </footer>
    </article>
@endcomponent
