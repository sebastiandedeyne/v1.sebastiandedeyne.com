@extends('layouts.app')

@section('main')
    <div class="wrap">
        @foreach($posts as $post)
            @component('components.post', ['post' => $post])
                {{ $post->summary }}
                @if($post->has_summary)
                    <p>
                        <a href="{{ $post->url }}">
                            Read more
                        </a>
                    </p>
                @endif
            @endcomponent
        @endforeach

        {{ $posts->links() }}
    </div>
@endsection
