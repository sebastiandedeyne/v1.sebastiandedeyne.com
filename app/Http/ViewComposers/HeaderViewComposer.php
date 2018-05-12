<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Spatie\Menu\Laravel\Link;
use Spatie\Menu\Laravel\Menu;

class HeaderViewComposer
{
    public function compose(View $view)
    {
        $menu = Menu::new()
            ->url(route('home'), 'Home')
            ->url(route('posts'), 'Posts')
            ->url(route('talks'), 'Talks')
            ->url(route('about'), 'About')
            ->addClass('header-menu')
            ->setActiveFromRequest();

        $view->with('menu', $menu);
    }
}
