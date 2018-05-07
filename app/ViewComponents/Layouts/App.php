<?php

namespace App\ViewComponents\Layouts;

use App\ViewComponents\Component;
use App\ViewComponents\Layouts\Components\Footer;
use App\ViewComponents\Layouts\Components\Header;
use App\ViewComponents\Render;

class App extends Component
{
    /** @var array */
    private $contents;

    /**
     * @param string $title
     * @param null|string|array|Component $contents
     */
    public function __construct(?string $title, $contents)
    {
        $this->title = $title;
        $this->contents = array_wrap($contents);
    }

    public function render(Render $render)
    {
        return $render('html', ['lang' => 'en'], [
            $render('head', [], [
                $render('meta', ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover'], []),
                $render('title', [], $this->title ?? 'Sebastian De Deyne'),
                $render('link', ['rel' => 'stylesheet', 'type' => 'text/css', 'href' => mix('css/app.css')]),
            ]),
            $render('body', [], array_merge([new Header()], $this->contents, [new Footer()])),
        ]);
    }
}
