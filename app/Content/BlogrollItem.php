<?php

namespace App\Content;

class BlogrollItem
{
    public $name, $description, $url, $category;

    public static function create(array $data): self
    {
        $link = new self();

        $link->name = $data['name'];
        $link->description = $data['description'];
        $link->url = $data['url'];
        $link->category = $data['category'];

        return $link;
    }
}
