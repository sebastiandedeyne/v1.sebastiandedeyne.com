@extends('_layouts.master')

@section('title', "Open Source — Sebastian De Deyne")
@section('meta', '')

@section('content')
<main class="container">
    <section class="projects">
        @foreach($projects as $project)
            <article class="projects__project">
                <a
                    href="{{ $project->url }}"
                    target="project"
                    class="projects__project__link"
                >
                    {{ $project->name }}
                </a>
                <p class="projects__project__description">
                    {{ $project->description }}
                </p>
                <p class="projects__project__tags">
                    {{ implode(', ', $project->tags) }}
                </p>
            </article>
        @endforeach
    </section>
</main>
@endsection