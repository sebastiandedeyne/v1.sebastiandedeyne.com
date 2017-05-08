@component('layouts.page', [
    'title' => 'Open Source'
])
    <div class="container">
        <div class="row">
            <div class="column">
                <section class="intro">
                    <a href="{{ url('/') }}" class="intro__logotype logotype"></a>
                    <h1 class="intro__title">
                        Open Source
                    </h1>
                    <p class="intro__text">
                        A selection of my favorite open source projects I've authored or actively contributed to.
                    </p>
                    <section class="intro__nav">
                        <nav class="nav">
                            <ul>
                                <li class="nav__item">
                                    <a
                                        href="https://github.com/sebastiandedeyne"
                                        target="sebdd"
                                        class="nav__item__contents"
                                    >More on GitHub</a>
                                </li>
                            </ul>
                        </nav>
                    </section>
                </section>
            </div>
        </div>
        <div class="row">
            @foreach($projects as $project)
                <div class="column -half">
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
        @include('partials.footer')
    </div>
@endcomponent
