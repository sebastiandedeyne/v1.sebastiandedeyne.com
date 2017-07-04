@push('head')
<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
@endpush

@component('layouts.page', [
    'title' => $post->title,
    'meta_description' => $post->description,
    'canonical_url' => $post->canonical_url,
])
    <article class="post">
        <header class="post__header">
            <div class="container">
                <div class="post__header__logotype">
                    <a href="{{ url('/') }}" class="logotype"></a>
                </div>
                <h1 class="post__header__title">
                    {{ $post->title }}
                </h1>
                @if($post->date)
                    <aside class="post__header__meta">
                        @if($post->canonical_source && $post->canonical_url)
                            Originally published on <time datetime="{{ $post->date->format('Y-m-d') }}">{{ $post->date->format('F jS, Y') }}</time> by Sebastian De Deyne
                            on <a href="{{ $post->canonical_url }}" class="post__header__meta__link">{{ $post->canonical_source }}</a>
                        @else
                            Published on <time datetime="{{ $post->date->format('Y-m-d') }}">{{ $post->date->format('F jS, Y') }}</time> by Sebastian De Deyne
                        @endif
                        @if($post->era)
                            — Written for {{ $post->era }}
                        @endif
                    </aside>
                @endif
            </div>
        </header>
        <section class="post__body">
            <div class="container">
                <div class="post-contents">
                    {!! $post->contents !!}
                </div>
                @if($post->external_url)
                    <a href="{{ $post->external_url }}" target="sebdd" class="post__body__readmore">
                        Read the full story {{ $post->external_location }}
                    </a>
                @endif
            </div>
        </section>
        <footer class="post__footer">
            <div class="container container--narrow">
                <p class="post__footer__p">
                    © {{ carbon()->format('Y') }}
                    <a class="post__footer__link -subtle" href="{{ url('about') }}">Sebastian De Deyne</a>
                </p>
                <p class="post__footer__p">
                    If you've got any comments, feedback or just want to chat you can get in touch on <a class="post__footer__link" href="https://twitter.com/sebdedeyne" target="sebdd">Twitter</a> or via <a class="post__footer__link" href="mailto:sebastiandedeyne@gmail.com">e-mail</a>. If you catch a mistake or notice something that could be improved, feel free to <a class="post__footer__link" target="sebdd" href="https://github.com/sebastiandedeyne/sebastiandedeyne.com/{{ config('app.branch') }}/content/{{ $post->slug }}.md">edit this post on GitHub</a>.
                </p>
            </div>
        </footer>
    </article>
@endcomponent
