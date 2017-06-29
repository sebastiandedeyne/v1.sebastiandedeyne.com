@component('layouts.page', [
    'title' => 'Blogroll',
])
    <div class="container">
        <div class="row">
            <div class="column">
                <section class="intro">
                    <a href="{{ url('/') }}" class="intro__logotype logotype"></a>
                    <h1 class="intro__title">
                        Blogroll
                    </h1>
                    <p class="intro__text -small">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, iste cupiditate non vel commodi nulla incidunt, deleniti ea expedita ullam! Perspiciatis placeat natus officiis vero aut provident, accusamus impedit dolor!
                    </p>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <section class="blogroll">
                    @foreach($blogs as $category => $links)
                        <section style="grid-area: {{ str_slug($category, '_') }}">
                            <h2 class="blogroll__title">{{ $category }}</h2>
                            <ul>
                                @foreach($links as $link)
                                    <li>
                                        <a href="{{ $link->url }}" class="blogroll__link">{{ $link->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                    @endforeach
                </section>
            </div>
        </div>
        @include('partials.footer')
    </div>
@endcomponent
