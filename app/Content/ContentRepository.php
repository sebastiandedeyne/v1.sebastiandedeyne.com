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

    public function article(string $slug): Article
    {
        $rawFile = $this->readFile($slug.'.md');

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
        return $this->posts()->map(function (Article $article) {
            return FeedItem::fromArticle($article);
        });
    }

    /**
     * @param string $path
     *
     * @return string|null
     */
    private function readFile(string $path)
    {
        try {
            return $this->filesystem->read($path);
        } catch (FileNotFoundException $e) {
            return null;
        }
    }
}
