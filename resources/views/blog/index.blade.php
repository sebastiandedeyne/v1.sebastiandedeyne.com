@component('layouts.page', [
    'title' => 'Blog',
])
    <div class="container">
        <header class="blog__header">
            <section class="blog__header__h1">
                <h1 class="h1">
                    Blog
                </h1>
            </section>
            <ul class="blog__header__nav">
                <li class="blog__header__nav__item">
                    <a href="{{ url('blogroll') }}">
                        <span class="icon -star -s" title="Blogroll"></span>
                    </a>
                </li>
                <li class="blog__header__nav__item">
                    <a href="{{ url('feed') }}" data-turbolinks="false">
                        <span class="icon -rss -s" title="RSS"></span>
                    </a>
                </li>
            </ul>
        </header>
    </div>
    <div class="container -pull-out">
        @foreach($paginator as $post)
            <article class="blog__excerpt">
                <a href="{{ $post->url }}" class="blog__excerpt__date">
                    <time datetime="{{ $post->date->format('Y-m-d') }}">
                        {{ $post->date->format('F jS, Y') }}
                    </time>
                </a>
                <h2 class="blog__excerpt__title">
                    <a 
                        href="{{ $post->external_url ?: $post->url }}" 
                        @if($post->external_url) target="sebdd" @endif
                        class="blog__excerpt__title__link">
                        {{ $post->title }}
                    </a>
                </h2>
                @if($post->type === 'article')
                    <section class="post-contents">
                        <p>{{ $post->description }}</p>
                    </section>
                    <a href="{{ $post->url }}" class="blog__excerpt__readmore">
                        Read more
                    </a>
                @else
                    <section class="post-contents">
                        {!! $post->contents !!}
                    </section>
                    <a href="{{ $post->external_url }}" target="sebdd" class="blog__excerpt__readmore">
                        Read the full story {{ $post->external_location }}
                    </a>
                @endif
            </article>
        @endforeach
    </div>
    <div class="container">
        @include('blog.partials.paginator')
        @include('partials.footer')
    </div>
@endcomponent
