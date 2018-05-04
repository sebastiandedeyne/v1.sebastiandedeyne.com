@component('layouts.app')
  <div class="wrapper">
    <section class="has-links | w-2/3 mt-4 mx-auto mb-16 font-mono text-center">
      <p>
        I'm a web designer & developer from Ghent, working at
        <a href="https://spatie.be">Spatie</a>, Antwerp.
      </p>
      <p class="mt-2">
        I build websites, apps & other things with JavaScript, PHP, and CSS.
      </p>
    </section>
    @include('partials.postList', [
      'title' => 'Recent posts',
      'posts' => $posts,
    ])
  </div>
@endcomponent
