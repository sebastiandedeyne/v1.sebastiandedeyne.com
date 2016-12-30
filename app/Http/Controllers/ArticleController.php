<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;

class ArticleController extends Controller
{
    /** @var \App\Content\ContentRepository */
    private $contentRepository;

    public function __construct(ContentRepository $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }

    public function page(string $slug)
    {
        return $this->renderArticle(
            $this->contentRepository->page($slug)
        );
    }

    public function post(string $slug)
    {
        return $this->renderArticle(
            $this->contentRepository->post($slug)
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
