<?php

use Illuminate\Support\HtmlString;
use League\CommonMark\CommonMarkConverter;
use MatthiasMullie\Minify\CSS;

function styles(): HtmlString
{
    $paths = array_map(function (string $path) {
        return glob(resource_path("css/{$path}"));
    }, [
        'fonts.css',
        'global.css',
        'components/*.css',
        'utilities.css',
    ]);

    return new HtmlString(
        (new CSS())->add($paths)->minify()
    );
}

function markdown(string $html): HtmlString
{
    return new HtmlString(
        app(CommonMarkConverter::class)->convertToHtml($html)
    );
}
