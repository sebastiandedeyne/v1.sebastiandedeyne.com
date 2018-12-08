<layout :title="$post->title" wrap>
    <post
        :url="$post->url"
        :title="$post->title"
        :date="$post->date"
        class="single"
    >
        {!! $post->contents !!}
    </post>
    @if($relatedPosts->count())
        <p>More about {{ $tagsMatchingRelatedPosts->enumerate(', ', ' and ') }}:</p>
        @foreach($relatedPosts as $post)
            <post
                :url="$post->url"
                :title="$post->title"
                :date="$post->date"
            ></post>
        @endforeach
    @endif
</layout>
