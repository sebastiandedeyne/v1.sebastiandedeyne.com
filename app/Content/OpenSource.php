<?php

namespace App\Content;

use Symfony\Component\Yaml\Yaml;
use Illuminate\Support\Collection;

class OpenSource extends Provider
{
    public function projects(): Collection
    {
        return $this->cache('openSource.projects', function () {
            $projects = Yaml::parse($this->disk->get('open-source.yaml'));

            return collect($projects)->map(function ($project) {
                return (object) $project;
            });
        });
    }
}
