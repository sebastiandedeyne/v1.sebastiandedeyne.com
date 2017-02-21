@component('layouts.page', [
    'title' => 'About',
])
    <div class="container">
        <div class="row">
            <div class="column">
                <section class="intro">
                    <a href="{{ url('/') }}" class="intro__logotype logotype"></a>
                    <h1 class="intro__title">
                        About
                    </h1>
                    <p class="intro__text -small">
                        I'm a full-stack developer from Ghent, working at Spatie in Antwerp, where
                        I mainly build stuff with Laravel and Vue.js. In my spare time I work on
                        some open source side projects, and improve my cooking skills.
                    </p>
                    <section class="intro__buttons">
                        @include('partials.social')
                    </section>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <section class="textblock">
                    <h2 class="textblock__subtitle">Experience</h2>
                    <ul>
                        <li>Developer at Spatie, Antwerp (2015- <span class="shruggie">¯\_(ツ)_/¯</span>)</li>
                        <li>Freelance design & dev as 1/3 of Made By Monkey, Ghent (2012-2015)</li>
                        <li>Internship at SumoCoders, Ghent (2014)</li>
                        <li>Bachelor's degree in graphical and digital media<br> (Arteveldehogeschool 2015)</li>
                    </ul>
                    <h2 class="textblock__subtitle">Colophon</h2>
                    <p>This website is powered by <a href="https://laravel.com/" target="sebdd">Laravel</a> and served from <a href="https://www.digitalocean.com/" target="sebdd">Digital Ocean</a>. The source code is hosted on <a href="https://github.com/sebastiandedeyne/sebastiandedeyne.com" target="sebdd">Github</a>.</p>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="column">
                @include('partials.footer')
            </div>
        </div>
    </div>
@endcomponent
