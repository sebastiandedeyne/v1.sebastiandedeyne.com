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

function svg($filename): HtmlString
{
    $contents = @file_get_contents(
        base_path("resources/assets/svg/{$filename}.svg")
    );

    return new HtmlString($contents);
}

function markdown(string $markdown): HtmlString
{
    return new HtmlString(
        (new CommonMarkConverter())->convertToHtml($markdown)
    );
}

function sanitize_indentation(string $string): string
{
    $lines = explode("\n", $string);

    $lastLine = last($lines);
    $sanitizedLastLine = ltrim($lastLine);
    $indentSize = strlen($lastLine) - strlen($sanitizedLastLine);

    return preg_replace('/\n\s{'.($indentSize + 1).'}/', "\n\n", $string);
}
