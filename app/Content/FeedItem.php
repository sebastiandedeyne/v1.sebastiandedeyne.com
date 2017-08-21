<?php

namespace App\Content;

use Carbon\Carbon;

class FeedItem implements \Spatie\Feed\FeedItem
{
    private $id, $title, $updated, $summary, $url;

    public static function fromPost($post)
    {
        $item = new self();

        $item->id = $post->url;
        $item->title = $post->title;
        $item->updated = $post->date;
        $item->summary = $post->contents;
        $item->url = $post->url;

        return $item;
    }

    public function getFeedItemId(): string
    {
        return $this->id;
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
