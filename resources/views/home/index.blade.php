@component('layouts.app')
    <section class="markup | mb-12 sm:mb-20 md:mb-32 sm:pt-20">
        <div class="font-serif sm:text-lg sm:tracking-wide mb-8">
            <p>
                I'm a <em>web designer</em> and <em>developer</em> from Ghent,<br class="hidden md:inline"> employed at
                <a href="https://spatie.be" class="undercover">Spatie</a> in Antwerp, Belgium.
            </p>
            <p>
                I build <em>websites</em> and <em>applications</em> with <br class="hidden md:inline">
                JavaScript, PHP, HTML and CSS.
            </p>
        </div>
    </section>

    @include('partials.postList', [
        'title' => 'Featured posts',
        'posts' => $featuredPosts,
        'class' => 'mb-16',
    ])

    @include('partials.postList', [
        'title' => 'Latest posts',
        'posts' => $latestPosts,
        'class' => 'mb-8',
    ])

    <p class="markup | text-sm md:text-xs">
        <a href="{{ route('posts') }}">
            All posts
        </a>
    </p>
@endcomponent
