<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;

class HomeController extends Controller
{
    /** @var \App\Content\ContentRepository */
    private $contentRepository;

    public function __construct(ContentRepository $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }

    public function home()
    {
        $posts = $this->contentRepository->posts();

        return
            view('home')->withPosts($posts);
    }
}
