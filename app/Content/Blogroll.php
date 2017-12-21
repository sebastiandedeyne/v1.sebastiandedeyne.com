<?php

namespace App\Content;

use Symfony\Component\Yaml\Yaml;
use Illuminate\Support\Collection;

class Blogroll extends Provider
{
    public function items(): Collection
    {
        return $this->cache('blogroll.items', function () {
            $items = Yaml::parse($this->disk->get('blogroll.yaml'));

            return collect($items)
                ->map(function ($item) {
                    return (object) $item;
                })
                ->sortBy('name');
        });
    }
}
