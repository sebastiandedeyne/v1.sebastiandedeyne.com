<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;
use Illuminate\Routing\Controller;

class ArticleController extends Controller
{
    public function __invoke(string $slug, ContentRepository $contentRepository)
    {
        return view('article')
            ->withArticle($contentRepository->article($slug));
    }
}
