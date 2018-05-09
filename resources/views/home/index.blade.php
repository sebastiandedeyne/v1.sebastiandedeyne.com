@component('layouts.app')
  <div class="wrapper">
    <section class="w-4/5 text-lg mb-24 font-mono">
      <p class="mb-4">
        I'm a web designer / developer from Ghent, <br> employed at
        <a href="https://spatie.be">Spatie</a> in Antwerp, Belgium.
      </p>
      <p class="mb-4">
        I build websites and -apps with <br> JavaScript, PHP and CSS.
      </p>
      <p>
        I try to blog and do talks every now and then too.
      </p>
    </section>

    @include('partials.postList', [
      'title' => 'Latest posts',
      'posts' => $posts,
    ])

    <p class="markup | mt-8 text-xs">
      <a href="{{ route('posts') }}">
        All posts
      </a>
    </p>
  </div>
@endcomponent
