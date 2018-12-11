<?php

namespace App\Posts;

use App\Posts\Post;
use Spatie\Sheets\Sheets;
use Illuminate\Support\Collection;

class GetRelatedPosts
{
    /** @var \Illuminate\Support\Collection */
    private $posts;

    /** @var \App\Posts\GetEqualTags */
    private $getEqualTags;

    public function __construct(Sheets $sheets, GetEqualTags $getEqualTags)
    {
        $this->posts = $sheets
            ->collection('posts')
            ->all();

        $this->getEqualTags = $getEqualTags;
    }

    public function __invoke(Post $post): Collection
    {
        if ($post->tags->isEmpty()) {
            return collect();
        }

        return $this->posts
            ->where('slug', '!==', $post->slug)
            ->map(function (Post $relatedPost) use ($post) {
                return data_set(
                    $relatedPost,
                    'equal_tags_count',
                    ($this->getEqualTags)($post, collect([$relatedPost]))
                        ->count()
                );
            })
            ->where('equal_tags_count', '>', 0)
            ->sortByDesc('date')
            ->sortByDesc('equal_tags_count')
            ->take(3)
            ->values();
    }
}
