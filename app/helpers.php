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
