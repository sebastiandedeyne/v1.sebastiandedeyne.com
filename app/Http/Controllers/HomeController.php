<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function __invoke(ContentRepository $contentRepository)
    {
        $articles = $contentRepository->articles()->groupBy(function ($article) {
            return $article->date->format('Y');
        });

        return view('home', ['articles' => $articles]);
    }
}
