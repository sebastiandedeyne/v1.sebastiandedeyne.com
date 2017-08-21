<?php

namespace App\Content;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Yaml\Yaml;

class Blogroll
{
    public function items()
    {
        return Cache::rememberForever('content:blogroll.items', function () {
            $items = Yaml::parse(
                Storage::disk('content')->get('blogroll.yaml')
            );

            return collect($items)
                ->map(function ($item) {
                    return (object) $item;
                })
                ->sortBy('name');
        });
    }
}
