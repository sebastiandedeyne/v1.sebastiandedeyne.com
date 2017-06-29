<?php

namespace App\Content;

class Project
{
    public $name, $url, $description, $type;

    public static function create(array $data): self
    {
        $project = new self();

        $project->name = $data['name'];
        $project->url = $data['url'];
        $project->description = $data['description'];
        $project->type = $data['type'];

        return $project;
    }
}
