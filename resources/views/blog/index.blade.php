@component('layouts.page', [
    'title' => 'Blog',
])
    <div class="container">
        <h1 class="h1">
            Blog
        </h1>
        @foreach($posts as $post)
            <article class="post-excerpt">
                <aside class="post-excerpt__date">
                    {{ $post->date->format('d/m/Y') }}
                </aside>
                <h2 class="post-excerpt__title">
                    <a href="{{ $post->url }}">{{ $post->title }}</a>
                </h2>
                <section class="post-contents">
                    @if($post->type === 'article')
                        <p>{{ $post->description }}</p>
                    @else
                        <p>Lorem ipsum</p>
                    @endif
                </section>
                @if($post->type === 'article')
                    <a href="{{ $post->url }}" class="post-excerpt__readmore">
                        Read full article...
                    </a>
                @endif
            </article>
        @endforeach
        @include('partials.footer')
    </div>
@endcomponent
