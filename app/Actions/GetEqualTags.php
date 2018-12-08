<?php

namespace App\Actions;

use App\Post;
use Illuminate\Support\Collection;

class GetEqualTags
{
    public function __invoke(Collection $posts): Collection
    {
        if ($posts->isEmpty()) {
            return collect();
        }

        return $posts->reduce(function (Collection $equalTags, Post $post) {
            return $equalTags->intersect($post->tags);
        }, $posts->first()->tags);
    }
}
