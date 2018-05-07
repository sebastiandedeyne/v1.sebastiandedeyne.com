<?php

namespace App\ViewComponents\Pages;

use App\ViewComponents\Component;
use App\ViewComponents\Components\PostList;
use App\ViewComponents\Layouts\App;
use App\ViewComponents\Render;
use Illuminate\Support\Collection;

class Home extends Component
{
    /** @var \Illuminate\Support\Collection */
    private $posts;

    public function __construct(Collection $posts)
    {
        $this->posts = $posts;
    }

    public function render(Render $render)
    {
        return new App(null, [
            $render('div', ['class' => 'wrapper'], [
                $render('section', ['class' => 'markup | w-2/3 mx-auto mb-32 font-mono text-center'], [
                    $render('p', [], [
                        'I\'m a web designer & developer from Ghent, working at ',
                        $render('a', ['href' => 'https://spatie.be'], 'Spatie'),
                        ', Antwerp',
                    ]),
                    $render('p', ['class' => 'mt-2'], [
                        'I build websites, apps & other things with JavaScript, PHP, and CSS.',
                    ]),
                ]),
                new PostList('All posts', $this->posts),
                $render('p', ['class' => 'markup | mt-8 text-xs'], [
                    $render('a', ['href' => url('/posts')], 'All posts'),
                ]),
            ]),
        ]);
    }
}
