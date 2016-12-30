<?php

namespace App\Content;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class ArticleNotFound extends ModelNotFoundException
{
    public static function withSlug(string $slug): self
    {
        return new self("Article `{$slug}` not found");
    }
}
