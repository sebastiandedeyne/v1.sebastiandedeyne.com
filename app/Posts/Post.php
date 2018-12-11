<?php

namespace App\Posts;

use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Spatie\Feed\FeedItem;
use Spatie\Feed\Feedable;
use Spatie\Sheets\Sheet;

class Post extends Sheet implements Feedable
{
    public function getContentsAttribute(string $contents): HtmlString
    {
        return new HtmlString($contents);
    }

    public function getHasSummaryAttribute(): bool
    {
        return ! empty($this->attributes['summary']);
    }

    public function getSummaryAttribute(): HtmlString
    {
        if (! $this->has_summary) {
            return $this->contents;
        }

        $summary = markdown($this->attributes['summary']);

        return new HtmlString($summary);
    }

    public function getUrlAttribute(): string
    {
        return route('posts.show', $this->slug);
    }

    public function getTagsAttribute(): Collection
    {
        return collect($this->attributes['tags'] ?? []);
    }

    public function toFeedItem(): FeedItem
    {
        return new FeedItem([
            'id' => $this->url,
            'title' => $this->title,
            'updated' => $this->date,
            'summary' => $this->contents,
            'link' => $this->url,
            'author' => 'Sebastian De Deyne',
        ]);
    }
}
