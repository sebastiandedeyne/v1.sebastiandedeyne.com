<article class="post{!! isset($class) ? " {$class}" : null !!}">
    <header class="post-header">
        <h1 class="post-title">
            <a href="{{ ($permalink ?? false) ? $post->url : ($post->link ?? $post->url) }}">
                {{ $post->title }}
            </a>
        </h1>
        <aside class="post-subtitle">
            <a href="{{ $post->url }}">
                <time datetime="{{ $post->date->format('Y-m-d') }}">
                    {{ $post->date->format('F jS, Y') }}
                </time>
            </a>
                @if($post->link)
                    —
                    <a href="{{ $post->link }}">
                        {{ $post->link_domain }}
                    </a>
                @endif
                @if($post->subtitle)
                    —
                    <a href="{{ $post->url }}">
                        {{ $post->subtitle }}
                    </a>
                @endif
            </a>
        </aside>
    </header>

    <section class="markup">
        {{ $slot }}
    </section>
</article>
