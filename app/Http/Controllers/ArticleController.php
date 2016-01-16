<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;
use App\Foundation\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function article(string $slug)
    {
        $article = app(ContentRepository::class)->article($slug);

        if (! $article) {
            abort(404);
        }

        return view('article', compact('article'));
    }
}
