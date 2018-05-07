<?php

namespace App\ViewComponents;

use Illuminate\Contracts\Support\Responsable;

abstract class Component implements Responsable
{
    public function toResponse($request)
    {
        $renderFunction = new HtmlRender();

        $result = $this->render($renderFunction);

        while ($result instanceof self) {
            $result = $result->render($renderFunction);
        }

        return response($result);
    }
}
