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

    public function getSummaryAttribute(): string
    {
        $contents = $this->attributes['contents'];
        $contents = strip_tags($contents);
        $contents = str_replace("\n", ' ', $contents);

        if (strlen($contents) <= 300) {
            return $contents;
        }

        return str_limit($contents, 300) . '…';
    }

    public function getUrlAttribute(): string
    {
        return route('posts.show', $this->slug);
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
