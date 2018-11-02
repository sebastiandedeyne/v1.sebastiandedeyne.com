<layout>
    @foreach($posts as $post)
        <post
            :url="$post->url"
            :title="$post->title"
            :date="$post->date"
        >
            {{ $post->summary }}
            @if($post->has_summary)
                <p>
                    <a href="{{ $post->url }}">
                        Read more
                    </a>
                </p>
            @endif
        </post>
    @endforeach
</layout>
