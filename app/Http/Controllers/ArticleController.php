<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;
use App\Foundation\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function page(string $slug)
    {
        return $this->renderArticle(
            app(ContentRepository::class)->page($slug)
        );
    }

    public function post(string $slug)
    {
        return $this->renderArticle(
            app(ContentRepository::class)->post($slug)
        );
    }

    private function renderArticle($article)
    {
        if (! $article) {
            abort(404);
        }

        return view('article', compact('article'));
    }
}
