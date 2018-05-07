<?php

namespace App\ViewComponents\Layouts\Components;

use App\ViewComponents\Component;
use App\ViewComponents\Render;

class Header extends Component
{
    public function render(Render $render)
    {
        return $render('header', ['class' => 'wrapper | flex items-end justify-between pt-6 mb-24'], [
            $render('strong', ['class' => 'caps | font-mono font-bold'], [
                $render('a', ['href' => url('/'), 'class' => 'text-red'], [
                    'Sebastian De Deyne'
                ]),
            ]),
            $render('nav', ['class' => 'text-grey text-xs'], [
                $render('ul', ['class' => 'flex items-end'], [
                    $render('li', ['class' => 'ml-6'], [
                        $render('a', ['href' => url('/')], 'Home'),
                    ]),
                    $render('li', ['class' => 'ml-6'], [
                        $render('a', ['href' => url('/posts')], 'Posts'),
                    ]),
                    $render('li', ['class' => 'ml-6'], [
                        $render('a', ['href' => url('/about')], 'About'),
                    ]),
                ]),
            ]),
        ]);
    }
}
