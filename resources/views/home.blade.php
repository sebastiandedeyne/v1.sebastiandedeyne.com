@extends('_layouts.master')

@section('content')
<div class="container">
    <section class="welcome">
        <h1 class="welcome__name">
            Sebastian De Deyne
        </h1>
        <p class="welcome__text">
            I'm a full-stack developer from Ghent <br>
            working at Spatie in Antwerp, Belgium.
        </p>
        <nav class="nav">
            <ul>
                <li class="nav__item">
                    <a class="nav__item__contents" href="{{ route('about') }}">about</a>
                </li>
                <li class="nav__item">
                    <a class="nav__item__contents" href="{{ route('open-source') )}">open source projects</a>
                </li>
            </ul>
        </nav>
    </section>
    <div class="row">
        <a href="#" class="card column column--half">
            <h2 class="card__title">lightbulb</h2>
            <p class="card__text">Project natural shadows under elements</p>
        </a href="#">
        <a href="#" class="card column column--half">
            <h2 class="card__title">menu</h2>
            <p class="card__text">A fluent html menu generator for PHP applications</p>
        </a href="#">                
    </div>
</div>
@endsection
