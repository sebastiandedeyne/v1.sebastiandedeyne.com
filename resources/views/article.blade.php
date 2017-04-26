@push('head')
<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
@endpush

@component('layouts.page', [
    'title' => $article->title,
    'meta_description' => $article->description,
    'canonical_url' => $article->canonical_url,
])
    <article class="article">
        <header class="article__header">
            <div class="container">
                <div class="article__header__logotype">
                    <a href="{{ url('/') }}" class="logotype"></a>
                </div>
                <h1 class="article__header__title">
                    {{ $article->title }}
                </h1>
                @if($article->date)
                    <aside class="article__header__meta">
                        @if($article->canonical_source && $article->canonical_url)
                            Originally published on {{ $article->date->format('j F Y') }} by Sebastian De Deyne
                            on <a href="{{ $article->canonical_url }}" class="article__header__meta__link">{{ $article->canonical_source }}</a>
                        @else
                            Published on {{ $article->date->format('j F Y') }} by Sebastian De Deyne
                        @endif
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
                <p class="article__footer__p">© {{ carbon()->format('Y') }} <a class="article__footer__link" href="{{ url('about') }}">Sebastian De Deyne</a> 【ツ】</p>
                <p class="article__footer__p">
                    I'm a full-stack developer from Ghent working at <a class="article__footer__link" href="https://spatie.be" target="sebdd">Spatie</a> in Antwerp, Belgium.
                </p>
                <p class="article__footer__p">
                    If you've got any comments, feedback or just want to chat you can get in touch via <a class="article__footer__link" href="https://twitter.com/sebdedeyne" target="sebdd">Twitter</a> or <a class="article__footer__link" href="mailto:sebastiandedeyne@gmail.com">email</a>. If you catch a mistake or notice something that could be improved, feel free to <a class="article__footer__link" target="sebdd" href="https://github.com/sebastiandedeyne/sebastiandedeyne.com/edit/master/content/{{ $article->slug }}.md">send a PR on GitHub</a>.
                </p>
            </div>
        </footer>
    </article>
@endcomponent
