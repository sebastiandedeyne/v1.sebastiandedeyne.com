<?php

use Illuminate\Support\HtmlString;

function inline_mix(string $path): HtmlString
{
    $contents = file_get_contents(
        public_path(mix($path))
    );

    return new HtmlString($contents);
}

function svg($filename): HtmlString
{
    $contents = @file_get_contents(
        base_path("resources/assets/svg/{$filename}.svg")
    );

    return new HtmlString($contents);
}
