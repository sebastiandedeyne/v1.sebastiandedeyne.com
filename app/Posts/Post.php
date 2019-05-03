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

    public function getCarbonizedContentsAttribute(): HtmlString
    {
        $blockTags = 'aside|figure|p|pre|ul';

        $iteration = 0;

        $carbonizedContents = preg_replace_callback(
            "/<\/({$blockTags})>$/m",
            function (array $matches) use (&$iteration) {
                [$closingTag, $tagName] = $matches;

                $iteration++;

                return $iteration === 2
                    ? "</{$tagName}></section><div class=\"carbon\"></div><section class=\"markup\">"
                    : $closingTag;
            },
            $this->attributes['contents'],
            2
        );

        return new HtmlString($carbonizedContents);
    }

    public function getHasSummaryAttribute(): bool
    {
        return count(preg_split('/^<!--\s*more\s*-->\s*$/im', $this->contents, 2)) > 1;
    }

    public function getSummaryAttribute(): HtmlString
    {
        [$summary] = preg_split('/^<!--\s*more\s*-->\s*$/im', $this->contents, 2);

        return markdown($summary);
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
