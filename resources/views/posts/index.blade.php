<layout>
    <div class="wrap">
        @foreach($posts as $post)
            <post :post="$post">
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
    </div>
</layout>
