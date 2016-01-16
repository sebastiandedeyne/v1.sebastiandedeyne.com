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

    public function article(string $slug)
    {
        $rawFile = $this->getRawFile("$slug.md");

        if (! $rawFile) {
            return null;
        }

        $article = $this->frontMatterParser->parse($rawFile);

        if (! $article) {
            return null;
        }

        return Article::create($article);
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
