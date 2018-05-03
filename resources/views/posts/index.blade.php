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
        @foreach($posts as $post)
            <article>
                <a href="{{ route('posts.show', $post->slug) }}">
                    <h1>{{ $post->title }}</h1>
                    <time datetime="{{ $post->date->format('Y-m-d') }}">
                        {{ $post->date->format('F jS, Y') }}
                    </time>
                </a>
            </article>
        @endforeach
    </div>
    <div class="container">
        @include('partials.footer')
    </div>
@endcomponent
