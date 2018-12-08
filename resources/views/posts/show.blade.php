<layout :title="$post->title">
    <div class="pb-12 wrap">
        <post :post="$post">
            {{ $post->contents }}
        </post>
    </div>
    @if($relatedPosts->count())
        <section class="post-related">
            <div class="wrap markup">
                <p class="mb-2">
                    <em>More about {{ $tagsMatchingRelatedPosts->enumerate(', ', ' and ') }}:</em>
                </p>
                <ul>
                    @foreach($relatedPosts as $post)
                        <li><a href="{{ $post->url }}">{{ $post->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif
</layout>
