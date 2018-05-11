<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Spatie\Menu\Laravel\Menu;

class HeaderViewComposer
{
    /** @var array */
    private $menuItems;

    public function __construct()
    {
        $this->menuItems = [
            route('home') => 'Home',
            route('posts') => 'Posts',
            route('talks') => 'Talks',
            route('openSource') => 'Open Source',
            route('about') => 'About',
        ];
    }

    public function compose(View $view)
    {
        $menu = Menu::build($this->menuItems, function (Menu $menu, string $text, string $url) {
            return $menu->url($url, $text);
        });

        $menu
            ->addClass('flex items-end')
            ->addItemParentClass('ml-6')
            ->setActiveClass('text-black')
            ->setActiveFromRequest();

        $view->with('menu', $menu);
    }
}
