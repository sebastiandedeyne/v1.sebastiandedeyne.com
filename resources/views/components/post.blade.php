<article class="post">
    <header class="post-header">
        <h1>
            <a href="{{ $url }}">
                {{ $title }}
            </a>
        </h1>
        <aside>
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
