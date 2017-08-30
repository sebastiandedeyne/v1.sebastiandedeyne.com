<?php

namespace App\Http\Controllers;

use App\Content\Posts;
use Illuminate\Routing\Controller;

class HomeController
{
    public function index(Posts $posts)
    {
        $posts = $posts->all()->groupBy(function ($post) {
            return $post->date->format('Y');
        });

        return view('home.index', [
            'posts' => $posts,
        ]);
    }
}
