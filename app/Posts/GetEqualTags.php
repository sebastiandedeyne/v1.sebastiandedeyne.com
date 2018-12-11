<?php

namespace App\Posts;

use App\Posts\Post;
use Illuminate\Support\Collection;

class GetEqualTags
{
    public function __invoke(Post $post, Collection $posts): Collection
    {
        if ($posts->isEmpty()) {
            return $post->tags;
        }

        return $posts
            ->pluck('tags')
            ->flatten()
            ->unique()
            ->intersect($post->tags);
    }
}
