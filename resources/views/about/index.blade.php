@component('layouts.app', [
  'title' => 'About',
])
  <section class="flex">
    <aside class="font-mono leading-loose pr-4 text-grey text-xs">
      <div class="mb-6 w-full bg-grey-light" style="padding-bottom: 130%"></div>
      <p class="markup | mb-2">
        <span>Twitter&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <a href="https://twitter.com/sebdedeyne" title="Twitter">
          @sebdedeyne</a>
        <br />
        <span>GitHub&nbsp;&nbsp;&nbsp;</span>
        <a href="https://github.com/sebdedeyne" title="GitHub">
          sebastiandedeyne</a>
      </p>
      <p class="markup">
        <a href="mailto:sebastiandedeyne@gmail.com" title="E-mail">
          sebastiandedeyne@gmail.com
        </a>
      </p>
    </aside>
    <article class="flex-1 leading-normal pl-4 text-sm">
      <h1 class="caps | mb-1">About</h1>
      <div class="markup | mb-8">
        <p>
          I'm a web designer & developer from Ghent, working at
          <a href="https://spatie.be">Spatie</a>, Antwerp.
        </p>
        <p>
          I build websites, apps & other things with JavaScript, PHP, and CSS.
        </p>
        <p>
          I enjoy learning other frameworks, libraries and languages. Even if I
          don't plan on using something in the near future, research and
          experimentation with a foreign concept can serve as a great
          inspiration to solve problems in my familiar tech stack.
        </p>
        <p>
          I'm also a big open source proponent. Even if something isn't meant to
          be consumed by others, sharing code and knowledge is beneficial to all
          involved.
        </p>
      </div>
      <h2 class="caps">Colophon</h2>
      <div class="markup">
        <p>
          This website is powered by
          <a href="https://laravel.com">Laravel</a> and served from
          <a href="https://digitalocean.com">Digital Ocean</a>. The source code
          is hosted on <a href="https://github.com/sebastiandedeyne/sebastiandedeyne.com">GitHub</a>.
        </p>
      </div>
    </article>
  </section>
@endcomponent
