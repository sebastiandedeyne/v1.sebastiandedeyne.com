@component('layouts.app', [
    'title' => 'About',
])
    <div class="container">
        <h1 class="h1 h-margin-bottom">
            About
        </h1>
        <section class="textblock h-margin-bottom">
            <p>
                I'm a web developer from Ghent, working at <a href="https://spatie.be" target="sebdd" class="h-link-invisible">Spatie</a> in Antwerp.
            </p>
            <p>
                I build things with PHP, JavaScript and CSS. Specifically, Laravel, Vue.js and some occasional React. I enjoy learning other frameworks, libraries and languages. Even if I don't plan on using something in the near future, research and experimentation with a foreign concept can serve as a great inspiration to solve problems in my familiar tech stack.
            </p>
            <p>
                I'm also a big open source proponent. Even if something isn't meant to be consumed by others, sharing code and knowledge is beneficial to all involved.
            </p>
        </section>
        <section class="h-double-margin-bottom">
            @include('partials.social')
        </section>
        <section class="textblock h-double-margin-bottom">
            <h2 class="textblock__subtitle">Background</h2>
            <ul>
                <li>Developer at Spatie, Antwerp since 2015</li>
                <li>Freelance design & dev, Ghent (2012-2015)</li>
                <li>Internship at SumoCoders, Ghent (2014)</li>
                <li>Bachelor's degree in graphical and digital media<br> (Artevelde University College Ghent 2015)</li>
            </ul>
            <h2 class="textblock__subtitle">Colophon</h2>
            <p>This website is powered by <a href="https://laravel.com/" target="sebdd">Laravel</a> and served from <a href="https://www.digitalocean.com/" target="sebdd">Digital Ocean</a>. The source code is hosted on <a href="https://github.com/sebastiandedeyne/sebastiandedeyne.com" target="sebdd">GitHub</a>.</p>
        </section>
        @include('partials.footer')
    </div>
@endcomponent
