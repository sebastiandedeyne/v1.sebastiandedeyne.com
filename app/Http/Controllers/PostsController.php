<?php

namespace App\Http\Controllers;

use App\Actions\GetAllPosts;
use App\Actions\GetEqualTags;
use App\Actions\GetRelatedPosts;
use App\Post;
use Spatie\Sheets\Sheets;

class PostsController
{
    public function index(GetAllPosts $getAllPosts)
    {
        return view('posts.index', [
            'posts' => $getAllPosts(),
        ]);
    }

    public function show(
        Post $post,
        GetRelatedPosts $getRelatedPosts,
        GetEqualTags $getEqualTags
    ) {
        $relatedPosts = $getRelatedPosts($post);
        $tagsMatchingRelatedPosts = $getEqualTags($post, $relatedPosts)
            ->map(function (string $tag) {
                return trans("tags.{$tag}");
            });

        return view('posts.show', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
            'tagsMatchingRelatedPosts' => $tagsMatchingRelatedPosts,
        ]);
    }

    public function redirectOldPostsIndex(Sheets $sheets)
    {
        return redirect()->action([HomeController::class, 'index']);
    }

    public function redirectOldPost(string $year, string $slug)
    {
        return redirect()->action([self::class, 'show'], $slug);
    }
}
