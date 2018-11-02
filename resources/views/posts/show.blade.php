<layout :title="$post->title">
    <post
        :url="$post->url"
        :title="$post->title"
        :date="$post->date"
    >
        {!! $post->contents !!}
    </post>
</layout>
