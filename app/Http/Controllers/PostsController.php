<?php

namespace App\Http\Controllers;

use App\Posts\GetAllPosts;
use App\Posts\GetEqualTags;
use App\Posts\GetRelatedPosts;
use App\Posts\Post;
use Spatie\Sheets\Sheets;

class PostsController
{
    public function index(GetAllPosts $getAllPosts)
    {
        return view('posts.index', [
            'posts' => $getAllPosts()->paginate(),
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
                $formattedTag = trans("tags.{$tag}");

                if ($formattedTag === "tags.{$tag}") {
                    return $tag;
                }

                return $formattedTag;
            });

        return view('posts.show', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
            'tagsMatchingRelatedPosts' => $tagsMatchingRelatedPosts,
        ]);
    }

    public function redirectOldPostsIndex(Sheets $sheets)
    {
        return redirect()->action([self::class, 'index']);
    }

    public function redirectOldPost(string $year, string $slug)
    {
        return redirect()->action([self::class, 'show'], $slug);
    }
}
