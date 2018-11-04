<?php

namespace App\Http\Controllers;

use App\Post;
use Spatie\Sheets\Sheets;

class PostsController
{
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
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
