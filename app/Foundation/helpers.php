<?php

function content_path(string $path = '') : string
{
    return base_path("content/{$path}");
}

function now()
{
    return \Carbon\Carbon::now();
}

function locale()
{
    return app()->getLocale();
}

function markdown(string $markdown) : string
{
    return app(\League\CommonMark\CommonMarkConverter::class)->convertToHtml($markdown);
}
