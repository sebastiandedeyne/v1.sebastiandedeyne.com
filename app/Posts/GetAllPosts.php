<?php

namespace App\Posts;

use App\Posts\Post;
use Spatie\Sheets\Sheets;
use Illuminate\Support\Collection;

class GetAllPosts
{
    /** @var \Spatie\Sheets\Sheets */
    private $sheets;

    public function __construct(Sheets $sheets)
    {
        $this->sheets = $sheets;
    }

    public function __invoke(): Collection
    {
        return $this->sheets
            ->collection('posts')
            ->all()
            ->sortByDesc('date');
    }
}
