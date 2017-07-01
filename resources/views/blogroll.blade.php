@component('layouts.page', [
    'title' => 'Blogroll',
])
    <div class="container">
        <h1 class="h1 h-margin-bottom">
            Blogroll
        </h1>
        <section class="textblock h-double-margin-bottom">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, iste cupiditate non vel commodi nulla incidunt, deleniti ea expedita ullam! Perspiciatis placeat natus officiis vero aut provident, accusamus impedit dolor!
            </p>
        </section>
    </div>
    <div class="container -wide">
        <section class="blogroll">
            <div class="row">
                @foreach($blogs as $category => $items)
                    <div class="column -third">
                        <section class="blogroll__category">
                            <h2 class="blogroll__title">{{ $category }}</h2>
                            <ul>
                                @foreach($items as $item)
                                    <li class="blogroll__item">
                                        <a href="{{ $item->url }}" target="sebdd">{{ $item->name }}</a>
                                        <span class="blogroll__item__description">{{ $item->description }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
    <div class="container">
        @include('partials.footer')
    </div>
@endcomponent
