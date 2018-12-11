<?php

namespace App\Posts;

use App\Posts\Post;
use Illuminate\Support\Collection;

class GetArticleFeedItems
{
    /** @var \App\Posts\GetAllPosts */
    private $getAllPosts;

    public function __construct(GetAllPosts $getAllPosts)
    {
        $this->getAllPosts = $getAllPosts;
    }

    public function __invoke(): Collection
    {
        return ($this->getAllPosts)()
            ->reject(function (Post $post) {
                return $post->link;
            })
            ->take(20);
    }
}
