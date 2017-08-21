<?php

namespace App\Content;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Yaml\Yaml;

class OpenSource
{
    public function projects()
    {
        return Cache::rememberForever('content:openSource.projects', function () {
            $projects = Yaml::parse(
                Storage::disk('content')->get('open-source.yaml')
            );

            return collect($projects)
                ->map(function ($project) {
                    return (object) $project;
                })
                ->sortBy('name');
        });
    }
}
