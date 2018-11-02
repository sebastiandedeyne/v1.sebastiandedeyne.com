<?php

namespace App\Http\Controllers;

use Spatie\Sheets\Sheets;

class HomeController
{
    public function index(Sheets $sheets)
    {
        $posts = $sheets
            ->collection('posts')
            ->all()
            ->sortByDesc(function ($post) {
                return $post->date;
            });

        return view('home.index', [
            'posts' => $posts,
        ]);
    }
}
