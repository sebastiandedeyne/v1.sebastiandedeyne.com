<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class ErrorComposer
{
    public function compose(View $view)
    {
        [$title, $message] = $this->errorText($view->status);

        $view
            ->withTitle($title)
            ->withMessage($message);
    }

    private function errorText(int $status): array
    {
        $title = collect([
            '¯\_(ツ)_/¯',
            'Awkward.',
            'Bantha fodder.',
            'Hmmm...',
            'Oh no!',
            'Peculiar.',
            'Uh oh.',
            'Whoops!',
        ])->random();

        $message = $status === 404 ?
            'Looks like this page doesn\'t exist.' :
            'This page doesn\'t work.';

        return [$title, $message];
    }
}
