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
            I'm a full-stack developer from Ghent, working at Spatie in Antwerp, where I mainly build stuff with Laravel and Vue. In my spare time I work on some (open source) side projects, and improve my cooking skills.
        </p>
    </section>
</div>
<footer class="footer">
    <div class="container">
        © {{ carbon()->format('Y') }} Sebastian De Deyne
    </div>
</footer>
@endsection