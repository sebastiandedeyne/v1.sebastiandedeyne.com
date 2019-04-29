<?php

namespace App\Http\Controllers;

use App\Posts\Post;
use App\Posts\PostRepository;

class PostsController
{
    /** @var \App\Posts\PostRepository */
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        return view('posts.index', [
            'posts' => $this->postRepository
                ->getAllPosts()
                ->paginate(),
        ]);
    }

    public function show(Post $post) {
        $relatedPosts = $this->postRepository->getRelatedPosts($post);

        $tagsMatchingRelatedPosts = $this->postRepository
            ->intersectTags($post, ...$relatedPosts)
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

    public function redirectOldPostsIndex()
    {
        return redirect()->action([self::class, 'index']);
    }

    public function redirectOldPost(string $year, string $slug)
    {
        return redirect()->action([self::class, 'show'], $slug);
    }
}
