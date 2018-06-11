@component('layouts.app', [
  'title' => 'About',
])
  <div class="md:w-2/3 mx-auto mb-12">
    <header class="flex items-stretch mb-4 sm:mb-10">
      <aside class="w-2/3 flex flex-col justify-between pb-3 border-b">
        <strong class="caps | block font-normal text-sm">
          Sebastian De Deyne
        </strong>
        <div class="leading-loose text-grey-dark text-sm md:text-xs">
          <p class="markup | flex justify-between">
            <span>Twitter</span>
            <a href="https://twitter.com/sebdedeyne">
              @sebdedeyne
            </a>
          </p>
          <p class="markup | flex justify-between">
            <span>GitHub</span>
            <a href="https://github.com/sebastiandedeyne">
              sebastiandedeyne
            </a>
          </p>
          <p class="markup | flex justify-between">
            <span>E-mail</span>
            <a href="mailto:sebastiandedeyne@gmail.com">
              sebastiandedeyne@gmail.com
            </a>
          </p>
        </div>
      </aside>
      <div class="flex-1 mx-auto hidden md:block md:ml-6">
        <img
          src="{{ url('images/me.jpg') }}"
          alt="Me"
          class="rounded-full block w-full"
        >
      </div>
    </header>
    <div class="markup | mb-4 md:mb-8">
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
          <div class="text-grey-dark text-xs">
            {{ $description }}
          </div>
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
  </div>
@endcomponent
