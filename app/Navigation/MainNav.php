<?php

namespace App\Navigation;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Spatie\Menu\Laravel\Link;
use Spatie\Menu\Laravel\Menu;

class MainNav implements Htmlable
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

    public function toHtml()
    {
        return Menu::new()
            ->route('home', 'Home')
            ->route('posts', 'Posts')
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
    }
}
