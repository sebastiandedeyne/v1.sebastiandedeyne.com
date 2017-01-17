<?php

function carbon(): \Carbon\Carbon
{
    return new \Carbon\Carbon();
}

function locale(): string
{
    return app()->getLocale();
}

function markdown(string $markdown) : string
{
    return app(\League\CommonMark\CommonMarkConverter::class)->convertToHtml($markdown);
}

function svg($filename, $size = 20): string
{
    return "<span class=icon style=\"width: {$size}px; height: {$size}px\">".
        file_get_contents(resource_path("assets/svg/{$filename}.svg")).
    "</span>";
}