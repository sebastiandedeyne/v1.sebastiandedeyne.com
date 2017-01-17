@extends('_layouts.master')

@section('title', 'Open Source — Sebastian De Deyne')
@section('meta', '')

@section('content')
<section class="opening">
    <div class="container">
        <h1 class="opening__title">
            Open Source
        </h1>
        <section class="opening__text">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sit amet leo dictum, facilisis libero at, dignissim tortor. Sed efficitur faucibus ligula, ut pretium urna tincidunt sit amet. Sed vel ullamcorper nisi. Duis finibus lectus neque, a ullamcorper augue vestibulum at. Vestibulum egestas rutrum aliquam.
            </p>
        </section>
    </div>
</section>
<main class="container">
    <section class="projects js-shadows-container">
        <div class="flex-container">
            @foreach($projects as $project)
                <a
                    href="{{ $project->url }}"
                    target="project"
                    class="projects__project js-shadows-item"
                >
                    <h2 class="projects__project__name">
                        {!! svg($project->type, 25) !!}
                        <span class="projects__project__name__text">
                            {{ $project->name }}
                        </span>
                    </h2>
                    <p class="projects__project__description">
                        {{ $project->description }}
                    </p>
                </a>
            @endforeach
        </div>
    </section>
</main>
@endsection