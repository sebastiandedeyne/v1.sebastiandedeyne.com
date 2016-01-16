<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;
use App\Foundation\Http\Controllers\Controller;

class PostController extends Controller
{
    public function post(string $year, string $slug)
    {
        $post = app(ContentRepository::class)->getPost($year, $slug);

        if (! $post) {
            abort(404);
        }

        return view('post', compact('post'));
    }
}
