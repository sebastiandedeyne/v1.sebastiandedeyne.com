@component('layouts.app', [
  'isHomePage' => true,
])
  <div class="wrapper">
    <section class="mb-32 font-serif text-xl tracking-wide text-grey-dark">
      <p class="mb-4">
        <span class="bg-white">
          I'm a <strong class="text-red font-medium">web designer</strong> and <strong class="text-red font-medium">developer</strong> from Ghent,<br> employed at
          <strong class="text-red font-medium"><a href="https://spatie.be">Spatie</a></strong> in Antwerp, Belgium.
        </span>
      </p>
      <p class="mb-4">
        <span class="bg-white">
          I build <strong class="text-red font-medium">websites</strong> and <strong class="text-red font-medium">applications</strong> with <br> <strong class="text-red font-medium">JavaScript</strong>, <strong class="text-red font-medium">PHP</strong> and <strong class="text-red font-medium">CSS</strong>.
        </span>
      </p>
      <p>
        <span class="bg-white">
          I try to <strong class="text-red font-medium">tweet</strong>, <strong class="text-red font-medium">blog</strong> and do <strong class="text-red font-medium">talks</strong> every now and then too.
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
