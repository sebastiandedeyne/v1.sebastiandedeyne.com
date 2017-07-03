@component('layouts.page')
    <div class="container">
        <h1 class="h1 h-margin-bottom">
            Sebastian De Deyne
        </h1>
        <section class="textblock h-margin-bottom">
            <p>
                I'm a web developer from Ghent, working at <a href="https://spatie.be" target="sebdd" class="h-link-invisible">Spatie</a> in Antwerp. <br>
                I build things with PHP, JavaScript, and CSS.
            </p>
        </section>
        <section class="h-double-margin-bottom">
            @include('partials.social')
        </section>
        <section class="article-list">
            <h2 class="article-list__title">Articles</h2>
            @foreach($articles as $year => $articles)
                <section class="list-group">
                    <h2 class="list-group__title">
                        {{ $year }}
                    </h2>
                    <ul>
                        @foreach($articles as $article)
                            <li class="list-group__item">
                                <a class="list-group__link" href="{{ $article->url }}">
                                    {{ $article->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </section>
            @endforeach
            <a href="{{ url('posts') }}" class="article-list__more">
                Psst! There's more on the blog!
            </a>
        </section>
        @include('partials.footer')
    </div>
@endcomponent
