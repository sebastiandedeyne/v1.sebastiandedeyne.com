<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Spatie\Menu\Laravel\Link;
use Spatie\Menu\Laravel\Menu;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;

class HeaderViewComposer
{
    /** @var Illuminate\Routing\Router */
    private $router;

    /** @var Illuminate\Http\Request */
    private $request;

    public function __construct(Router $router, Request $request)
    {
        $this->router = $router;
        $this->request = $request;
    }

    public function compose(View $view)
    {
        $menu = Menu::new()
            ->route('home', 'Home')
            ->route('posts', 'Posts')
            // ->route('newsletter', 'Newsletter')
            ->route('about', 'About')
            ->addClass('header-menu')
            ->setActiveClass('is-active')
            ->setActive(function (Link $link) {
                // Post permalinks aren't prefixed by `/post/`, so we need to
                // add an exception for the `posts.show` route.
                if ($this->router->is('posts.show')) {
                    return $link->text() === 'Posts';
                }

                // Fall back to the default behaviour
                return $link->determineActiveForUrl($this->request->url());
            });

        $view->with('menu', $menu);
    }
}
