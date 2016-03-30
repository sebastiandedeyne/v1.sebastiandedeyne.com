<?php

namespace App\Content;

use Carbon\Carbon;
use Spatie\Feed\FeedItem;
use Spatie\YamlFrontMatter\Document;

class Article implements FeedItem
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

        $article->title = $data->matter('title', '');
        $article->contents = markdown($data->body());
        $article->description = $data->matter('description', '');

        $article->date = Carbon::createFromFormat('d/m/Y', $data->matter('date', '01/02/1992'));

        $article->era = $data->matter('era', '');
        $article->commentable = $data->matter('comments', true);

        $article->url = $url;

        return $article;
    }

    public function getFeedItemId()
    {
        return $this->url;
    }

    public function getFeedItemTitle() : string
    {
        return $this->title;
    }

    public function getFeedItemUpdated() : Carbon
    {
        return $this->date;
    }

    public function getFeedItemSummary() : string
    {
        return $this->contents ?? '';
    }

    public function getFeedItemLink() : string
    {
        return url("posts/{$this->url}");
    }

    public function getFeedItemAuthor() : string
    {
        return 'Sebastian De Deyne';
    }
}
