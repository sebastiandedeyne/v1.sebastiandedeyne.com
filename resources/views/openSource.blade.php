@extends('_layouts.master')

@section('title', 'Open Source — Sebastian De Deyne')
@section('meta', '')

@section('content')
<div class="container">
    <div class="row">
        <section class="intro column column--two-thirds">
            <a href="{{ url('/') }}" class="intro__logotype logotype"></a>
            <h1 class="intro__title">
                Open Source
            </h1>
            <p class="intro__text">
                A selection of open source projects I've authored or actively contributed to.
            </p>
            <nav class="nav">
                <ul>
                    <li class="nav__item">
                        <a
                            href="https://github.com/sebastiandedeyne"
                            target="sebdd"
                            class="nav__item__contents"
                        >more on github</a>
                    </li>
                </ul>
            </nav>
        </section>
    </div>
    <div class="row">
        @foreach($projects as $project)
            <a
                href="{{ $project->url }}"
                target="sebdd"
                class="card column column--half"
            >
                <h2 class="card__title">
                    <span class="card__title__icon icon icon--{{ $project->type }}"></span>
                    {{ $project->name }}
                </h2>
                <p class="card__text">{{ $project->description }}</p>
            </a>
        @endforeach
    </div>
</div>
<footer class="footer">
    <div class="container">
        © {{ carbon()->format('Y') }} Sebastian De Deyne
    </div>
</footer>
@endsection