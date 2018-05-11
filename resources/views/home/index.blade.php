@component('layouts.app', [
  'isHomePage' => true,
])
  <div class="wrapper">
    <section class="introduction | mb-32 font-serif text-xl tracking-wide text-grey-dark">
      <p class="mb-4">
        <span class="bg-white">
          I'm a <strong>web designer</strong> and <strong>developer</strong> from Ghent,<br> employed at
          <strong><a href="https://spatie.be">Spatie</a></strong> in Antwerp, Belgium.
        </span>
      </p>
      <p class="mb-4">
        <span class="bg-white">
          I build <strong>websites</strong> and <strong>applications</strong> with <br> <strong>JavaScript</strong>, <strong>PHP</strong>, <strong>HTML</strong> and <strong>CSS</strong>.
        </span>
      </p>
      <p>
        <span class="bg-white">
          I try to <strong><a href="https://twitter.com/sebdedeyne">tweet</a></strong>,
          <strong><a href="{{ route('posts') }}">blog</a></strong>
          and do <strong><a href="{{ route('talks') }}">talks</a></strong>
          every now and then too.
        </span>
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
