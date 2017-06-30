<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    public function __invoke(string $slug, ContentRepository $contentRepository)
    {
        return view('post')
            ->withPost($contentRepository->post($slug));
    }
}
