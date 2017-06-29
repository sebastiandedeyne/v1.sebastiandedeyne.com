<?php

namespace App\Content;

use Carbon\Carbon;
use Spatie\YamlFrontMatter\Document;

class Article
{
    public $title, $contents, $description, $date, $era, 
        $canonical_source, $canonical_url, $url, $slug;

    public static function create(Document $document, string $slug): self
    {
        $article = new self();

        $article->title = $document->matter('title', '');
        $article->contents = markdown($document->body());
        $article->description = $document->matter('description', '');

        $article->date = $document->matter('date') ?
            Carbon::createFromTimestamp($document->matter('date')) :
            Carbon::parse('1992-02-01');

        $article->era = $document->matter('era', '');
        $article->canonical_source = $document->matter('canonical_source', '');
        $article->canonical_url = $document->matter('canonical_url', '');

        $article->slug = $slug;
        $article->url = url($slug);

        return $article;
    }
}
