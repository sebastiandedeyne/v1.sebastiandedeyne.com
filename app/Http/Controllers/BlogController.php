<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;
use Illuminate\Routing\Controller;

class BlogController extends Controller
{
    public function index(ContentRepository $contentRepository)
    {
        $posts = $contentRepository->posts();

        return view('blog.index', ['posts' => $posts]);
    }

    public function post(string $slug, ContentRepository $contentRepository)
    {
        $post = $contentRepository->post($slug);

        return view('blog.post', ['post' => $post]);
    }
}
