<?php

namespace App\ViewComponents\Components;

use App\ViewComponents\Component;
use App\ViewComponents\Render;
use Illuminate\Support\Collection;

class PostList extends Component
{
    /** @var string */
    private $title;

    /** @var \Illuminate\Support\Collection */
    private $posts;

    public function __construct(string $title, Collection $posts)
    {
        $this->title = $title;
        $this->posts = $posts;
    }

    public function render(Render $render)
    {
        return $render('section', [], [
            $render('h2', ['class' => 'caps'], $this->title),
            $render('ul', [], $this->posts->map(function ($post) {
                return new PostListItem($post);
            })->toArray()),
        ]);
    }
}
