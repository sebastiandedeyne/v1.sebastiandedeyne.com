<?php

namespace App\Content;

use Carbon\Carbon;
use Spatie\YamlFrontMatter\YamlFrontMatterObject;

class Post
{
    public $title;
    public $date;
    public $contents;

    public static function create(YamlFrontMatterObject $data)
    {
        $post = new static();

        $post->title = $data->matter('title');
        $post->date = Carbon::createFromFormat('d/m/Y', $data->matter('date'));
        $post->contents = markdown($data->body());

        return $post;
    }
}
