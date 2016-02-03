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
    public $commentable;

    public static function create(Document $data, string $url) : Article
    {
        $article = new static();

        $article->title = $data->matter('title');
        $article->contents = markdown($data->body());
        $article->description = $data->matter('description');

        $article->date = $data->matter('date') ?
            Carbon::createFromFormat('d/m/Y', $data->matter('date')) :
            null;

        $article->era = $data->matter('era', null);
        $article->commentable = $data->matter('comments', true);

        $article->url = $url;

        return $article;
    }
}
