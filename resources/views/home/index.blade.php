@component('layouts.app')
  <div class="wrapper">
    <section class="markup | w-2/3 mx-auto mb-32 font-mono text-center">
      <p>
        I'm a web designer & developer from Ghent, working at
        <a href="https://spatie.be">Spatie</a>, Antwerp.
      </p>
      <p class="mt-2">
        I build websites, apps & other things with JavaScript, PHP, and CSS.
      </p>
    </section>

    @include('partials.postList', [
      'title' => 'Latest posts',
      'posts' => $posts,
    ])

    <p class="markup | mt-8 text-xs">
      <a href="{{ url('/posts') }}">
        All posts
      </a>
    </p>
  </div>
@endcomponent
