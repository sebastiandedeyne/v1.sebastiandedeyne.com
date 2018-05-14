@component('layouts.app', [
  'title' => 'About',
])
  <div class="md:flex mb-12">
    <aside class="mb-6 md:mb-0">
      <div class="md:p-4 md:bg-grey-lighter rounded-sm leading-loose text-grey text-sm md:text-xs">
        <div class="w-full mb-5 relative hidden md:block" style="padding-bottom: 100%">
          <img
            src="{{ url('images/me.jpg') }}"
            alt="Me"
            class="absolute rounded-full block w-full"
          >
        </div>
        <p class="markup | flex justify-between">
          <span>Twitter</span>
          <a href="https://twitter.com/sebdedeyne" title="Twitter">
            @sebdedeyne
          </a>
        </p>
        <p class="markup | md:mb-2 flex justify-between">
          <span>GitHub</span>
          <a href="https://github.com/sebdedeyne" title="GitHub">
            sebastiandedeyne
          </a>
        </p>
        <p class="markup | flex justify-between">
          <span class="md:hidden">E-mail</span>
          <a href="mailto:sebastiandedeyne@gmail.com" title="E-mail">
            sebastiandedeyne@gmail.com
          </a>
        </p>
      </div>
    </aside>
    <article class="flex-1 leading-normal md:pl-6 md:text-sm">
      <div class="markup | mb-4 md-mb-8">
        <p>
          I'm a web designer and developer from Ghent, employed at
          <a href="https://spatie.be">Spatie</a> in Antwerp, Belgium. I build
          websites and applications with JavaScript, PHP, HTML and CSS.
        </p>
        <p>
          I try to <a href="https://twitter.com/sebdedeyne">tweet</a>,
          <a href="{{ route('posts') }}">blog</a>,
          publish a <a href="{{ route('newsletter') }}">newsletter</a>,
          and do talks
          every now and then too.
        </p>
        <p>
          I enjoy learning other frameworks, libraries and languages to get a
          bird's eye view of what's happening in other ecosystems. Research and
          experimentation with foreign concepts serve as a great inspiration to
          solve problems in my familiar tech stack.
        </p>
        <p>
          I'm also a big open source proponent. Sharing code and knowledge is
          beneficial to all involved. A selection of open source projects I'm
          particularly happy with:
        </p>
      </div>
      <ul class="mb-8 md:mb-12 leading-tight">
        @foreach([
          ['https://github.com/spatie/laravel-mix-purgecss', 'laravel-mix-purgecss', 'Zero-config Purgecss for Laravel Mix'],
          ['https://github.com/spatie/laravel-html', 'laravel-html', 'An fluent interface HTML builder'],
          ['https://github.com/spatie/laravel-menu', 'laravel-menu', 'Html menu generator for Laravel'],
          ['https://github.com/spatie/phpunit-snapshot-assertions', 'phpunit-snapshot-assertions', 'Snapshot assertions for PHPUnit'],
          ['https://github.com/spatie/schema-org', 'schema-org', 'A fluent builder Schema.org types and ld+json generator'],
          ['https://github.com/spatie/server-side-rendering', 'server-side-rendering', 'Server side rendering JavaScript in a PHP application'],
          ['https://github.com/laravel/framework/pulls?utf8=%E2%9C%93&q=is%3Apr%20is%3Amerged%20author%3Asebastiandedeyne%20', 'laravel/framework', 'Various contributions to the Laravel framework'],
          ['https://github.com/sebastiandedeyne/hyper_ex', 'hyper_ex', 'A HyperScript clone written in Elixir'],
        ] as [$url, $title, $description])
          <li class="markup | mb-4">
            <a href="{{ $url }}" target="_blank">
              {{ $title }}
            </a>
            <br>
            {{ $description }}
          </li>
        @endforeach
      </ul>
      <h2 class="caps | mb-2">Colophon</h2>
      <div class="markup">
        <p>
          This website is powered by
          <a href="https://laravel.com">Laravel</a>. The source code is hosted
          and publically available on
          <a href="https://github.com/sebastiandedeyne/sebastiandedeyne.com">GitHub</a>.
        </p>
      </div>
    </article>
  </div>
@endcomponent
