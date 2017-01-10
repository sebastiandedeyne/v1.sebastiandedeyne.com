<?php

namespace App\Content;

use Illuminate\Support\Collection;
use League\Flysystem\Adapter\Local;
use League\Flysystem\FileNotFoundException;
use League\Flysystem\Filesystem;
use Spatie\YamlFrontMatter\Parser;
use Symfony\Component\Yaml\Yaml;

class ContentRepository
{
    /** @var \League\Flysystem\Filesystem */
    private $filesystem;

    /** @var \Spatie\YamlFrontMatter\Parser */
    private $frontMatterParser;

    /** @var \Symfony\Component\Yaml\Yaml */
    private $yamlParser;

    public function __construct()
    {
        $this->filesystem = new Filesystem(
            new Local(base_path('content'))
        );

        $this->frontMatterParser = new Parser();
        $this->yamlParser = new Yaml();
    }

    public function article(string $slug): Article
    {
        $rawFile = $this->read($slug.'.md');

        if (! $rawFile) {
            throw ArticleNotFound::withSlug($slug);
        }

        return Article::create(
            $this->frontMatterParser->parse($rawFile),
            $slug
        );
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
                $slug = str_replace_last('.md', '', $path);

                return $this->article($slug);
            })
            ->sort(function (Article $articleA, Article $articleB) {
                return $articleA->date->getTimeStamp() < $articleB->date->getTimeStamp();
            });
    }

    public function feed(): Collection
    {
        return $this->posts()->map([FeedItem::class, 'fromArticle']);
    }

    public function projects(): Collection
    {
        return collect($this->yamlParser->parse(
            $this->read('open-source.yaml')
        ))->map([Project::class, 'create']);
    }

    private function read(string $path): ?string
    {
        try {
            return $this->filesystem->read($path);
        } catch (FileNotFoundException $e) {
            return null;
        }
    }
}
