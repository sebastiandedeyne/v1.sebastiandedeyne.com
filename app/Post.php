<?php

namespace App;

use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Spatie\Sheets\Sheet;
use Spatie\Sheets\Sheets;

class Post extends Sheet
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

    public static function feed(Sheets $sheets): Collection
    {
        return $sheets->collection('posts')->all()
            ->sortByDesc(function ($post) {
                return $post->date;
            })
            ->take(20)
            ->map(function (self $post) {
                return [
                    'id' => $post->url,
                    'title' => $post->title,
                    'updated' => $post->date,
                    'summary' => $post->contents,
                    'link' => $post->url,
                    'author' => 'Sebastian De Deyne',
                ];
            });
    }
}
