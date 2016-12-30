<?php

namespace App\Content;

use Illuminate\Support\Collection;
use League\Flysystem\FileNotFoundException;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;
use Spatie\YamlFrontMatter\Parser;

class ContentRepository
{
    /** @var \League\Flysystem\Filesystem */
    private $filesystem;

    /** @var \Spatie\YamlFrontMatter\Parser */
    private $frontMatterParser;

    public function __construct()
    {
        $this->filesystem = new Filesystem(
            new Local(base_path('content'))
        );

        $this->frontMatterParser = new Parser();
    }

    public function page(string $slug)
    {
        return $this->article("{$slug}.md");
    }

    public function post(string $slug)
    {
        return $this->article("posts/{$slug}.md");
    }

    public function posts(): Collection
    {
        return collect($this->filesystem->listContents('posts'))
            ->filter(function (array $item) {
                return $item['type'] === 'dir';
            })
            ->flatMap(function (array $item) {
                return $this->filesystem->listContents($item['path']);
            })
            ->pluck('path')
            ->map(function(string $path) {
                return $this->article($path);
            })
            ->filter()
            ->sort(function (Article $articleA, Article $articleB) {
                return $articleA->date->getTimeStamp() < $articleB->date->getTimeStamp();
            });
    }

    public function feed(): Collection
    {
        return $this->posts()->map(function (Article $article) {
            return FeedItem::fromArticle($article);
        });
    }

    private function article(string $path)
    {
        $rawFile = $this->readFile($path);

        if ($rawFile === null) {
            return null;
        }

        $slug = str_replace_last('.md', '', $path);

        return Article::create(
            $this->frontMatterParser->parse($rawFile),
            url($slug)
        );
    }

    private function readFile($path)
    {
        try {
            return $this->filesystem->read($path);
        } catch (FileNotFoundException $e) {
            return null;
        }
    }
}
