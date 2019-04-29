@extends('layouts.app', ['title' => $post->title])

@section('main')
    <div class="pb-16 wrap">
        @component('components.post', ['post' => $post])
            {{ $post->contents }}
        @endcomponent
    </div>
    @if($relatedPosts->count())
        <section class="post-related">
            <div class="wrap">
                <p class="post-related-label">
                    More about {{ $tagsMatchingRelatedPosts->join(', ', ' and ') }}:
                </p>
                <ul class="post-related-list">
                    @foreach($relatedPosts as $post)
                        <li>
                            <a href="{{ $post->url }}" class="post-related-title">
                                {{ $post->title }}
                            </a>
                            <br>
                            <a href="{{ $post->url }}" class="post-related-date">
                                <time datetime="{{ $post->date->format('Y-m-d') }}">
                                    {{ $post->date->format('F jS, Y') }}
                                </time>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif
@endsection
