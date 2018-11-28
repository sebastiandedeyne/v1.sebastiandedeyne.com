<?php

use Illuminate\Support\HtmlString;
use League\CommonMark\CommonMarkConverter;
use MatthiasMullie\Minify;

function css(string $path): HtmlString
{
    $minifier = new Minify\CSS(
        resource_path("css/{$path}")
    );

    return new HtmlString($minifier->minify());
}

function markdown(string $html): HtmlString
{
    return new HtmlString(
        app(CommonMarkConverter::class)->convertToHtml($html)
    );
}
