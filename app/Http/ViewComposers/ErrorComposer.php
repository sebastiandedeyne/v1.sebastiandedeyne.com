<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class ErrorComposer
{
    public function compose(View $view)
    {
        $view->with('title', collect([
            'Awkward.',
            'Hmmm...',
            'Oh no!',
            'Peculiar.',
            'Uh oh.',
            'Whoops!',
        ])->random());
    }
}
