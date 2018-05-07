<?php

namespace App\ViewComponents\Layouts\Components;

use App\ViewComponents\Component;
use App\ViewComponents\Render;

class Footer extends Component
{
    public function render(Render $render)
    {
        return $render('footer', ['class' => 'mt-16 py-4 text-grey text-xs leading-loose'], [
            $render('div', ['class' => 'wrapper | text-center sm:flex justify-between'], [
                $render('p', ['class' => 'markup'], [
                    '© 2018 ',
                    $render('a', ['href' => url('/')], 'Sebastian De Deyne'),
                ]),
                $render('p', ['class' => 'markup'], [
                    $render('a', ['href' => 'https://twitter.com/sebdedeyne'], '@sebdedeyne'),
                    $render('a', ['href' => url('/feed')], 'RSS'),
                ]),
            ]),
        ]);
    }
}
