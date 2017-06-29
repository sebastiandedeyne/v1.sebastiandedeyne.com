<?php

namespace App\Content;

use Carbon\Carbon;

class FeedItem implements \Spatie\Feed\FeedItem
{
    private $title, $updated, $summary, $url;

    public static function fromArticle(Article $article)
    {
        $item = new self();

        $item->title = $article->title;
        $item->updated = $article->date;
        $item->summary = $article->contents;
        $item->url = $article->url;

        return $item;
    }

    public function getFeedItemId(): string
    {
        return $this->url;
    }

    public function getFeedItemTitle(): string
    {
        return $this->title;
    }

    public function getFeedItemUpdated(): Carbon
    {
        return $this->updated;
    }

    public function getFeedItemSummary(): string
    {
        return $this->summary;
    }

    public function getFeedItemLink() : string
    {
        return $this->url;
    }

    public function getFeedItemAuthor(): string
    {
        return 'Sebastian De Deyne';
    }
}
