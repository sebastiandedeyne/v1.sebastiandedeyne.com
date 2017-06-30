@component('layouts.page', [
    'title' => 'Open Source'
])
    <div class="container">
        <div class="h-double-margin-bottom">
            <h1 class="h1">
                Open Source
            </h1>
            <div class="textblock">
                <p>
                    A selection of open source projects I've authored or actively contributed to.
                    There's a bigger list on my <a href="https://github.com/sebastiandedeyne">GitHub profile</a>.
                </p>
            </div>
        </div>
    </div>
    <div class="container -wide">
        <div class="row">
            @foreach($projects as $project)
                <div class="column -third h-margin-bottom">
                    <a href="{{ $project->url }}" target="sebdd" class="card">
                        <h2 class="card__title">
                            <span class="card__title__icon">
                                <span class="icon -{{ $project->type }}"></span>
                            </span>
                            {{ $project->name }}
                        </h2>
                        <p class="card__text">{{ $project->description }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        @include('partials.footer')
    </div>
@endcomponent
