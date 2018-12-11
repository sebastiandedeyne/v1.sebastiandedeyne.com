<?php

namespace App\Posts;

use Illuminate\Support\Collection;

class GetMainFeedItems
{
    /** @var \App\Posts\GetAllPosts */
    private $getAllPosts;

    public function __construct(GetAllPosts $getAllPosts)
    {
        $this->getAllPosts = $getAllPosts;
    }

    public function __invoke(): Collection
    {
        return ($this->getAllPosts)()->take(20);
    }
}
