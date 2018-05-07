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
        $posts = $this->posts->map(function ($post) use ($render) {
            return $render('li', ['class' => 'mt-6'], [
                $render('a', ['href' => route('posts.show', $post->slug)], [
                    $render('strong', ['class' => 'block font-normal text-lg'], $post->title),
                    $render('p', ['class' => 'text-xs text-grey leading-none mt-1'], [
                        $render('time', ['datetime' => $post->date->format('Y-m-d')], $post->date->format('F jS, Y')),
                    ]),
                ]),
            ]);
        })->toArray();

        return $render('section', [], [
            $render('h2', ['class' => 'caps'], $this->title),
            $render('ul', [], $posts),
        ]);
    }
}
