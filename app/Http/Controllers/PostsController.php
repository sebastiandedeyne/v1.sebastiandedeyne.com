<?php

namespace App\Http\Controllers;

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

    public function show(string $slug, Sheets $sheets)
    {
        $post = $sheets->collection('posts')->all()
            ->where('slug', $slug)
            ->first();

        if (!$post) {
            abort(404);
        }

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function redirectOldPost(string $year, string $slug)
    {
        return redirect()->action('PostsController@show', $slug);
    }
}
