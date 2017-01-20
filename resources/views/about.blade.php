@extends('_layouts.master')

@section('title', 'About — Sebastian De Deyne')

@section('content')
<div class="container">
    <section class="intro">
        <a href="{{ url('/') }}" class="intro__logotype logotype"></a>
        <h1 class="intro__title">
            About
        </h1>
        <p class="intro__text intro__text--small">
            I'm a full-stack developer from Ghent, working at Spatie in Antwerp, where I mainly build stuff with Laravel and Vue.js.
        <p class="intro__text intro__text--small">
            In my spare time I work on some open source side projects, and improve my cooking skills.
        </p>
        <p>
            <a class="button" href="https://twitter.com/sebastiandedeyne" target="sebdd">
                <span class="icon icon--faded icon--small icon--twitter"></span>
                Twitter
            </a>
            <a class="button" href="https://github.com/sebastiandedeyne" target="sebdd">
                <span class="icon icon--faded icon--small icon--github"></span>
                GitHub
            </a>
            <a class="button" href="mailto:sebastiandedeyne@gmail.com">
                <span class="icon icon--faded icon--small icon--email"></span>
                E-mail
            </a>
        </p>
    </section>
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
<footer class="footer">
    <div class="container">
        © {{ carbon()->format('Y') }} Sebastian De Deyne
    </div>
</footer>
@endsection