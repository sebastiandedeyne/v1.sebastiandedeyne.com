<?php

namespace App\ViewComponents\Components;

use App\ViewComponents\Component;
use App\ViewComponents\Render;
use Illuminate\Support\Collection;

class PostListItem extends Component
{
    /** @var string */
    private $title;

    /** @var \Carbon\Carbon */
    private $date;

    /** @var string */
    private $url;

    public function __construct(object $post)
    {
        $this->title = $post->title;
        $this->date = $post->date;
        $this->url = route('posts.show', $post->slug);
    }

    public function render(Render $render)
    {
        return $render('li', ['class' => 'mt-6'], [
            $render('a', ['href' => $this->url], [
                $render('strong', ['class' => 'block font-normal text-lg'], $this->title),
                $render('p', ['class' => 'text-xs text-grey leading-none mt-1'], [
                    $render('time', ['datetime' => $this->date->format('Y-m-d')], $this->date->format('F jS, Y')),
                ]),
            ]),
        ]);
    }
}
