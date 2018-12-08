<layout>
    @foreach($posts as $post)
        <div class="pb-12{!! !$loop->last ? ' border-b mb-16' : null !!}">
            <post
                :post="$post"
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
