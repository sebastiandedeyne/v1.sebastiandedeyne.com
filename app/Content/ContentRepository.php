<?php

namespace App\Content;

use ErrorException;
use Spatie\YamlFrontMatter\YamlFrontMatterParser;

class ContentRepository
{
    public function __construct()
    {
        $this->basePath = base_path('content');
        $this->frontMatterParser = new YamlFrontMatterParser();
    }

    public function getPost(string $year, string $slug)
    {
        $post = $this->get("posts/{$year}/{$slug}.md");

        if (! $post) {
            return null;
        }

        return Post::create($post);
    }

    protected function get($path)
    {
        $rawFile = $this->getRawFile($path);

        if (! $rawFile) {
            return null;
        }

        return $this->frontMatterParser->parse($rawFile);
    }

    protected function getRawFile($path)
    {
        try {
            return file_get_contents("{$this->basePath}/$path");
        } catch (ErrorException $e) {
            return null;
        }
    }
}
