<?php

namespace App;

use Spatie\Sheets\Sheet;
use Illuminate\Support\HtmlString;

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
}
