<?php

namespace App\Content;

use Carbon\Carbon;

class FeedItem implements \Spatie\Feed\FeedItem
{
    private $title, $updated, $summary, $url;

    public static function fromPost(Post $post)
    {
        $item = new self();

        $item->title = $post->title;
        $item->updated = $post->date;
        $item->summary = $post->contents;
        $item->url = $post->url;

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
