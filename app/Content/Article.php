<?php

namespace App\Content;

use Carbon\Carbon;
use Spatie\YamlFrontMatter\Document;

class Article
{
    public $title;
    public $contents;
    public $date = null;
    public $url;

    public static function create(Document $data, string $url) : Article
    {
        $article = new static();

        $article->title = $data->matter('title');
        $article->contents = markdown($data->body());

        if ($data->matter('date'))
            $article->date = Carbon::createFromFormat('d/m/Y', $data->matter('date'));

        $article->url = $url;

        return $article;
    }
}
