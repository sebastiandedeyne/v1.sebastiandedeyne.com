@extends('layouts.master')

@section('body_classes', 'bg:red')

@section('content')
    <section class="v-home container">
        <div class="col-md-9">
            <header class="mb:1/4 fs:25 ls:06 tt:upper fw:bold">
                <h1>Sebastian De Deyne</h1>
            </header>
            <section class="v-home__intro mb:3/2 fs:27 lh:125 ls:03">
                <p>I'm a full-stack developer working at <a href="https://spatie.be" target="_blank">Spatie</a> in Antwerp, Belgium.</p>
            </section>
            <section class="v-home__toc mb:2 fs:17">
                <h2 class="tt:upper fw:bold">Blog</h2>
                <ul class="mb:1">
                    <li>Almost! <aside class="d:i fs:14 o:1/2">(for real)</aside></li>
                    {{--
                    @foreach($posts as $post)
                        <li>
                            <a href="{{ $post->url }}">{{ $post->title }}</a>
                            <aside class="d:i fs:14 o:1/2">{{ $post->date->format('m/Y') }}</aside>
                        </li>
                    @endforeach
                    --}}
                </ul>
                <h2 class="tt:upper fw:bold">More</h2>
                <ul class="mb:1">
                    @foreach($more as $item)
                        <li>
                            @if(isset($item[1]))
                                <a href="{{ $item[1] }}">{{ $item[0] }}</a>
                            @else
                                {{ $item[0] }}
                            @endif
                            @if(isset($item[2]))
                                <aside class="d:i fs:14 o:1/2">{{ $item[2] }}</aside>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </section>
            <footer class="v-home__footer fs:20">
                <a href="https://twitter.com/sebdedeyne" class=btn target="_blank" title="Twitter">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="https://github.com/sebastiandedeyne" class=btn target="_blank" title="Github">
                    <i class="fa fa-github"></i>
                </a>
                <a href="mailto:sebastiandedeyne@gmail.com" class=btn title="E-mail">
                    <i class="fa fa-at"></i>
                </a>
            </footer>
        </div>
    </section>
@endsection
