@component('layouts.app', ['title' => 'About', 'wrap' => true])
    <div class="markup">
        <p>
            I'm a web designer and developer from Ghent, employed at
            <a href="https://spatie.be">Spatie</a> in Antwerp, Belgium. I build
            websites and applications with JavaScript, PHP, HTML and CSS.
        </p>
        <p>
            I try to <a href="https://twitter.com/sebdedeyne">tweet</a>,
            <a href="{{ url('') }}">blog</a>,
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
            <p>
                <a href="{{ $url }}" target="_blank">
                    {{ $title }}
                </a>
                <br>
                {{ $description }}
            </p>
        @endforeach
        <h2>Colophon</h2>
        <p>
            This website is powered by
            <a href="https://laravel.com">Laravel</a>. The source code is hosted
            and publicly available on
            <a href="https://github.com/sebastiandedeyne/sebastiandedeyne.com">GitHub</a>.
        </p>
    </div>
@endcomponent
