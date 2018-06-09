<?php

namespace App\Http\Controllers;

use App\Post;
use Spatie\Sheets\Sheets;

class PostsController
{
    public function index(Sheets $sheets)
    {
        $posts = $sheets->collection('posts')->all()
            ->sortByDesc(function ($post) {
                return $post->date;
            });

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function ogImage(Post $post)
    {
        return view('ogImage.index', [
            'post' => $post,
        ]);
    }

    public function redirectOldPost(string $year, string $slug)
    {
        return redirect()->action('PostsController@show', $slug);
    }
}
