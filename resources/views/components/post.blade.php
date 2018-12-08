<article class="post{!! isset($class) ? " {$class}" : null !!}">
    <header class="post-header">
        <h1 class="post-title">
            <a href="{{ $url }}">
                {{ $title }}
            </a>
        </h1>
        <aside class="post-subtitle">
            <a href="{{ $url }}">
                <time datetime="{{ $date->format('Y-m-d') }}">
                    {{ $date->format('F jS, Y') }}
                </time>
            </a>
        </aside>
    </header>
    <section class="markup">
        {{ $slot }}
    </section>
</article>
