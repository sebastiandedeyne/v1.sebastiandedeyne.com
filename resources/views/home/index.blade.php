<layout>
    @foreach($posts as $post)
        <div class="post-wrapper">
            <post
                :url="$post->link ?? $post->url"
                :title="$post->title"
                :date="$post->date"
                class="wrap"
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
        </div>
    @endforeach
</layout>
