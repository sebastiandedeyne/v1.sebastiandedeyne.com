<?php

use Illuminate\Support\HtmlString;

function svg($filename): HtmlString
{
    $contents = @file_get_contents(
        base_path("resources/assets/svg/{$filename}.svg")
    );

    return new HtmlString($contents);
}
