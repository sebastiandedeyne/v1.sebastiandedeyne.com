<?php

namespace App\Content;

use Carbon\Carbon;
use Spatie\YamlFrontMatter\YamlFrontMatterObject;

class Article
{
    public $title;
    public $contents;
    public $date = null;

    public static function create(YamlFrontMatterObject $data) : Article
    {
        $article = new static();

        $article->title = $data->matter('title');
        $article->contents = markdown($data->body());

        if ($data->matter('date'))
            $article->date = Carbon::createFromFormat('d/m/Y', $data->matter('date'));

        return $article;
    }
}
