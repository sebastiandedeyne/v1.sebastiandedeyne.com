<?php

namespace App\Content;

use Carbon\Carbon;
use Spatie\YamlFrontMatter\Document;

class Post
{
    public $title, $contents, $description, $date, $era, 
        $canonical_source, $canonical_url, $url, $slug;

    public static function create(Document $document, string $slug): self
    {
        $post = new self();

        $post->title = $document->matter('title', '');
        $post->contents = markdown($document->body());
        $post->description = $document->matter('description', '');

        $post->date = $document->matter('date') ?
            Carbon::createFromTimestamp($document->matter('date')) :
            Carbon::parse('1992-02-01');

        $post->era = $document->matter('era', '');
        $post->canonical_source = $document->matter('canonical_source', '');
        $post->canonical_url = $document->matter('canonical_url', '');

        $post->slug = $slug;
        $post->url = url($slug);

        return $post;
    }
}
