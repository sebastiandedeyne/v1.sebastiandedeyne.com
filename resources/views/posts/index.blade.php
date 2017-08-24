@component('layouts.app', [
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
                        <span class="icon -s" title="Blogroll">
                            {{ svg('star') }}
                        </span>
                    </a>
                </li>
                <li class="blog__header__nav__item">
                    <a href="{{ url('feed') }}" data-turbolinks="false">
                        <span class="icon -s" title="RSS">
                            {{ svg('rss') }}
                        </span>
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
                    <a href="{{ $post->url }}" class="blog__excerpt__title__link">
                        {{ $post->title }}
                    </a>
                </h2>
                <section class="post-contents">
                    {!! $post->summary !!}
                </section>
                <a href="{{ $post->read_more_url }}" target="sebdd" class="blog__excerpt__readmore">
                    {{ $post->read_more_text ?? 'Read more' }}
                </a>
            </article>
        @endforeach
    </div>
    <div class="container">
        @include('posts.partials.paginator')
        @include('partials.footer')
    </div>
@endcomponent
