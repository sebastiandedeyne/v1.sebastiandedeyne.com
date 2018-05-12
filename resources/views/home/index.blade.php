@component('layouts.app')
  <section class="introduction">
    <p class="mb-4">
      I'm a <strong>web designer</strong> and <strong>developer</strong> from Ghent,<br> employed at
      <strong><a href="https://spatie.be">Spatie</a></strong> in Antwerp, Belgium.
    </p>
    <p class="mb-4">
      I build <strong>websites</strong> and <strong>applications</strong> with <br> <strong>JavaScript</strong>, <strong>PHP</strong>, <strong>HTML</strong> and <strong>CSS</strong>.
    </p>
    <p>
      I try to <strong><a href="https://twitter.com/sebdedeyne">tweet</a></strong>,
      <strong><a href="{{ route('posts') }}">blog</a></strong>,
      curate a <strong><a href="{{ route('newsletter') }}">newsletter</a></strong>,
      and do <strong>talks</strong>
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
