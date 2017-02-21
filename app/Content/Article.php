<?php

namespace App\Content;

use Carbon\Carbon;
use Spatie\YamlFrontMatter\Document;

class Article
{
    public $title;
    public $contents;
    public $description;
    public $date;
    public $era;
    public $url;
    public $slug;
    public $commentable;

    private function __construct()
    {
    }

    public static function create(Document $document, string $slug): Article
    {
        $article = new self();

        $article->title = $document->matter('title', '');
        $article->contents = markdown($document->body());
        $article->description = $document->matter('description', '');

        $article->date = Carbon::createFromFormat('d/m/Y', $document->matter('date', '01/02/1992'));

        $article->era = $document->matter('era', '');

        $article->slug = $slug;
        $article->url = url($slug);

        return $article;
    }
}
