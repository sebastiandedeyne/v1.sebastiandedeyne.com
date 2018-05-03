@component('layouts.app')
    <div class="container">
        <h1 class="h1 h-margin-bottom">
            Sebastian De Deyne
        </h1>
        <section class="textblock h-margin-bottom">
            <p>
                I'm a web developer from Ghent, working at <a href="https://spatie.be" target="_blank" class="h-link-invisible">Spatie</a> in Antwerp. <br>
                I build things with PHP, JavaScript, and CSS.
            </p>
        </section>
        <section class="h-double-margin-bottom">
            @include('partials.social')
        </section>
        <section class="post-list">
            <h2 class="post-list__title">Posts</h2>
            <ul>
                @foreach($posts as $post)
                    <li class="list-group__item">
                        <a class="list-group__link" href="{{ $post->url }}">
                            {{ $post->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>
        @include('partials.footer')
    </div>
@endcomponent
