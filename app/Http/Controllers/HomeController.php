<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function __invoke(ContentRepository $contentRepository)
    {
        $posts = $contentRepository->posts()->groupBy(function ($post) {
            return $post->date->format('Y');
        });

        return view('home')->withPosts($posts);
    }
}
