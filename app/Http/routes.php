<?php

use App\Content\ContentRepository;

Route::feeds();

Route::get('/', function (ContentRepository $contentRepository) {
    return view('home')
        ->withPosts($contentRepository->posts());
});

Route::get('/open-source', function (ContentRepository $contentRepository) {
    return view('openSource')
        ->withProjects($contentRepository->projects());
});

Route::get('/{slug}', function (string $slug, ContentRepository $contentRepository) {
    return view('article')
        ->withArticle($contentRepository->article($slug));
})->where('slug', '(.*)');
