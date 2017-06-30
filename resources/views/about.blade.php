@component('layouts.page', [
    'title' => 'About',
])
    <div class="container">
        <h1 class="h1">
            About
        </h1>
        <section class="textblock h-margin-bottom">
            <p>
                I'm a web developer from Ghent, working at <a href="https://spatie.be" target="sebdd">Spatie</a> in Antwerp, where I mainly build stuff with PHP (Laravel) JavaScript (Vue.js & React) and CSS.
            </p>
            <p>
                In my spare time I like to tinker on open source side projects, play around with other languages like Elixir and Go, and improve my cooking skills.
            </p>
        </section>
        <section class="h-double-margin-bottom">
            @include('partials.social')
        </section>
        <section class="textblock h-double-margin-bottom">
            <h2 class="textblock__subtitle">Experience</h2>
            <ul>
                <li>Developer at Spatie, Antwerp (2015- <span class="shruggie">¯\_(ツ)_/¯</span>)</li>
                <li>Freelance design & dev as 1/3 of Made By Monkey, Ghent (2012-2015)</li>
                <li>Internship at SumoCoders, Ghent (2014)</li>
                <li>Bachelor's degree in graphical and digital media<br> (Arteveldehogeschool 2015)</li>
            </ul>
            <h2 class="textblock__subtitle">Colophon</h2>
            <p>This website is powered by <a href="https://laravel.com/" target="sebdd">Laravel</a> and served from <a href="https://www.digitalocean.com/" target="sebdd">Digital Ocean</a>. The source code is hosted on <a href="https://github.com/sebastiandedeyne/sebastiandedeyne.com" target="sebdd">GitHub</a>.</p>
        </section>
        @include('partials.footer')
    </div>
@endcomponent
