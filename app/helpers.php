<?php

use Illuminate\Support\HtmlString;
use League\CommonMark\CommonMarkConverter;
use MatthiasMullie\Minify\CSS;

function css(array $paths): HtmlString
{
    $minifier = new CSS();

    foreach ($paths as $path) {
        $minifier->add(glob(resource_path("css/{$path}")));
    }

    return new HtmlString($minifier->minify());
}

function styles(): HtmlString
{
    return css([
        'global.css',
        'components/*.css',
        'utilities.css',
    ]);
}

function markdown(string $html): HtmlString
{
    return new HtmlString(
        app(CommonMarkConverter::class)->convertToHtml($html)
    );
}
