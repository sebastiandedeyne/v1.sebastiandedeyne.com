<?php

namespace App\Content;

use Illuminate\Support\Collection;
use League\Flysystem\FileNotFoundException;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;
use Spatie\YamlFrontMatter\Parser;

final class ContentRepository
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
        return $this->article($slug);
    }

    public function post(string $slug)
    {
        return $this->article("posts/{$slug}");
    }

    public function posts() : Collection
    {
        return collect($this->filesystem->listContents('posts'))
            ->filter(function (array $item) {
                return $item['type'] === 'dir';
            })
            ->flatMap(function (array $item) {
                return $this->filesystem->listContents($item['path']);
            })
            ->map(function(array $item) {
                $contents = $this->getFile($item['path']);

                return $contents ?
                    Article::create(
                        $this->frontMatterParser->parse($contents),
                        url("{$item['dirname']}/{$item['filename']}")
                    ) :
                    null;
            })
            ->filter(function ($item) {
                return $item !== null;
            })
            ->sort(function (Article $articleA, Article $articleB) {
                return $articleA->date->getTimeStamp() < $articleB->date->getTimeStamp();
            });
    }

    public function raw(string $file)
    {
        return $this->getFile($file);
    }

    private function article(string $slug)
    {
        $rawFile = $this->getFile("$slug.md");

        if ($rawFile === null) {
            return null;
        }

        return Article::create(
            $this->frontMatterParser->parse($rawFile),
            url($slug)
        );
    }

    private function getFile($path)
    {
        try {
            return $this->filesystem->read($path);
        } catch (FileNotFoundException $e) {
            return null;
        }
    }
}
