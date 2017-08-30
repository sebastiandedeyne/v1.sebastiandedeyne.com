@component('layouts.app', [
    'title' => 'Blogroll',
])
    <div class="container">
        <h1 class="h1 h-margin-bottom">
            Blogroll
        </h1>
        <section class="textblock h-double-margin-bottom">
            <p>
                I remember spending hours browsing music blogs back in the heyday of Hypem. Every blog had a sidebar back then, and in that sidebar there was often a blogroll.
            </p>
            <p>
                This is an ode to the blogroll, where I tend to keep a list of the blogs and publications of which I never miss a post.
            </p>
        </section>
    </div>
    <div class="container -wide">
        <section class="blogroll">
            <div class="row">
                @foreach($items as $category => $items)
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
