@extends('_layouts.master')

@section('title', 'Open Source — Sebastian De Deyne')
@section('meta', '')

@section('content')
<main class="container">
    <section class="projects js-shadows-container">
        @foreach($projects as $project)
            <article class="projects__project js-shadows-item">
                <a
                    href="{{ $project->url }}"
                    target="project"
                    class="projects__project__link"
                >
                    @include('_partials.icons.github', ['size' => 20])
                    <span class="projects__project__link__text">
                        {{ $project->name }}
                    </span>
                </a>
                <p class="projects__project__description">
                    {{ $project->description }}
                </p>
                {{--<p class="projects__project__tags">
                    {{ implode(', ', $project->tags) }}
                </p>--}}
            </article>
        @endforeach
    </section>
</main>
@endsection