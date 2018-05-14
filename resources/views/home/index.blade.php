@component('layouts.app')
  <section class="introduction markup">
    <p class="mb-4">
      I'm a <em>web designer</em> and <em>developer</em> from Ghent,<br> employed at
      <a href="https://spatie.be">Spatie</a> in Antwerp, Belgium.
    </p>
    <p class="mb-4">
      I build <em>websites</em> and <em>applications</em> with <br>
      JavaScript, PHP, HTML and CSS.
    </p>
    <p>
      I <a href="https://twitter.com/sebdedeyne">tweet</a>,
      <a href="{{ route('posts') }}">blog</a>,
      publish a <a href="{{ route('newsletter') }}">newsletter</a>,
      and do talks
      every now and then too.
    </p>
  </section>

  @include('partials.postList', [
    'title' => 'Latest posts',
    'posts' => $posts,
  ])

  <p class="markup | mt-8 text-sm md:text-xs">
    <a href="{{ route('posts') }}">
      All posts
    </a>
  </p>
@endcomponent
