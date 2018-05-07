<?php

namespace App\ViewComponents;

interface Render
{
    public function __invoke(string $tag, array $attributes, $children = null);
}
