<?php

use Illuminate\Support\HtmlString;
use League\CommonMark\CommonMarkConverter;

function css(string $path): HtmlString
{
    $contents = file_get_contents(
        resource_path("css/{$path}")
    );

    return new HtmlString($contents);
}

function markdown(string $html): HtmlString
{
    return new HtmlString(
        app(CommonMarkConverter::class)->convertToHtml($html)
    );
}
