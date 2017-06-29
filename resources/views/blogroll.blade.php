@component('layouts.page', [
    'title' => 'Blogroll',
])
    <div class="container">
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
    <div class="container -wide">
        <section class="blogroll">
            @foreach($blogs as $category => $items)
                <section 
                    class="blogroll__category"
                    style="grid-area: {{ str_slug($category, '_') }}">
                    <h2 class="blogroll__title">{{ $category }}</h2>
                    <ul>
                        @foreach($items as $item)
                            <li class="blogroll__item">
                                <a href="{{ $item->url }}" class="slider-link">{{ $item->name }}</a>
                                <span class="blogroll__item__description">{{ $item->description }}</span>
                            </li>
                        @endforeach
                    </ul>
                </section>
            @endforeach
        </section>
    </div>
    <div class="container">
        @include('partials.footer')
    </div>
@endcomponent
