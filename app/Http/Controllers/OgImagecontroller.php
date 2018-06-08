<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class OgImagecontroller
{
    public function show(Post $post)
    {
        return view('ogImage.index', [
            'post' => $post,
        ]);
    }
}
