@component('layouts.page', [
    'title' => 'Blog',
])
    <div class="container">
        <h1 class="h1">
            Blog
        </h1>
        @foreach($posts as $post)
            <article class="post-excerpt">
                <time datetime="{{ $post->date->format('Y-m-d') }}" class="post-excerpt__date">
                    {{ $post->date->format('F jS, Y') }}
                </time>
                <h2 class="post-excerpt__title">
                    <a href="{{ $post->url }}" class="post-excerpt__title__link">
                        {{ $post->title }}
                    </a>
                </h2>
                @if($post->type === 'article')
                    <section class="post-contents">
                        <p>{{ $post->description }}</p>
                    </section>
                    <a href="{{ $post->url }}" class="post-excerpt__readmore">
                        Read more
                    </a>
                @else
                    <section class="post-contents">
                        {!! $post->contents !!}
                    </section>
                    <a href="{{ $post->external_url }}" target="sebdd" class="post-excerpt__readmore">
                        Read the full story {{ $post->external_location }}
                    </a>
                @endif
            </article>
        @endforeach
        @include('partials.footer')
    </div>
@endcomponent
