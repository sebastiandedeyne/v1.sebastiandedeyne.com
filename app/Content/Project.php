<?php

namespace App\Content;

class Project
{
    public $name;
    public $url;
    public $description;
    public $tags;

    private function __construct()
    {
    }

    public static function create(array $data): Project
    {
        $project = new self();

        $project->name = $data['name'];
        $project->url = $data['url'];
        $project->description = $data['description'];
        $project->tags = $data['tags'];

        return $project;
    }
}
