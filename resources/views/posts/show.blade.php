<layout :title="$post->title" wrap>
    <div class="post-single-wrapper">
        <post
            :url="$post->url"
            :title="$post->title"
            :date="$post->date"
            class="single"
        >
            {!! $post->contents !!}
        </post>
    </div>
</layout>
