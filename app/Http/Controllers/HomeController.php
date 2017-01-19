<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index(ContentRepository $contentRepository)
    {
        $posts = $contentRepository->posts()->groupBy(function ($post) {
            return lcfirst($post->date->format('F Y'));
        });

        return view('home')->withPosts($posts);
    }
}
