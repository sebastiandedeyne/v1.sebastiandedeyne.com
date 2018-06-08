@component('layouts.app')
  <section class="markup | font-serif mb-12 sm:mb-20 md:mb-32 sm:pt-20">
    <div class="sm:text-lg sm:tracking-wide mb-8">
      <p>
        I'm a <em>web designer</em> and <em>developer</em> from Ghent,<br class="hidden md:inline"> employed at
        <a href="https://spatie.be">Spatie</a> in Antwerp, Belgium.
      </p>
      <p>
        I build <em>websites</em> and <em>applications</em> with <br class="hidden md:inline">
        JavaScript, PHP, HTML and CSS.
      </p>
    </div>
    <p>
      I also <a href="https://twitter.com/sebdedeyne">tweet</a>,
      <a href="{{ route('posts') }}">blog</a>,
      and publish a <a href="{{ route('newsletter') }}">newsletter</a>.
    </p>
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
