<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;

class BlogrollController
{
    public function __invoke(ContentRepository $contentRepository)
    {
        $blogs = $contentRepository->blogroll()->groupBy('category');

        return view('blogroll', ['blogs' => $blogs]);
    }
}
