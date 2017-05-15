<?php

function carbon(): \Carbon\Carbon
{
    return new \Carbon\Carbon();
}

function markdown(string $markdown) : string
{
    return app(\League\CommonMark\CommonMarkConverter::class)->convertToHtml($markdown);
}

function is_staging(): bool
{
    return request()->getHost() === 'dev.sebastiandedeyne.com';
}
