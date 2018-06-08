<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Spatie\Sheets\Sheets;

class HomeController
{
    public function index(Sheets $sheets)
    {
        $featuredPosts = $sheets->collection('posts')->all()
            ->where('featured', true)
            ->sortByDesc(function ($post) {
                return $post->date;
            });

        $latestPosts = $sheets->collection('posts')->all()
            ->where('featured', false)
            ->sortByDesc(function ($post) {
                return $post->date;
            })
            ->take(5);

        return view('home.index', [
            'featuredPosts' => $featuredPosts,
            'latestPosts' => $latestPosts,
        ]);
    }
}
