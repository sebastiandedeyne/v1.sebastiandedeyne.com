<?php

namespace App\Content;

use Carbon\Carbon;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Posts extends Provider
{
    public function all()
    {
        return $this->cache('posts.all', function () {
            return $this->gather();
        });
    }

    public function paginate($perPage = 15, $pageName = 'page', $page = null)
    {
        return $this->cache('posts.paginate.'.request('page', 1), function () use ($perPage, $pageName, $page) {
            return $this->all()->simplePaginate($perPage, $pageName, $page);
        });
    }

    public function find($year, $slug)
    {
        return $this->all()->first(function ($post) use ($year, $slug) {
            return $post->date->year == $year && $post->slug == $slug;
        }, function () {
            abort(404);
        });
    }

    public function feed()
    {
        return $this->cache('posts.feed', function () {
            return $this->all()->map(function ($post) {
                return [
                    'id' => $post->url,
                    'title' => $post->title,
                    'updated' => $post->date,
                    'summary' => $post->contents,
                    'link' => $post->url,
                    'author' => 'Sebastian De Deyne',
                ];
            });
        });
    }

    private function gather()
    {
        return collect($this->disk->files('posts'))
            ->filter(function ($path) {
                return ends_with($path, '.md');
            })
            ->map(function ($path) {
                $filename = str_after($path, 'posts/');

                [$date, $slug, $extension] = explode('.', $filename, 3);

                $date = Carbon::createFromFormat('Y-m-d', $date);

                $document = YamlFrontMatter::parse($this->disk->get($path));

                return (object) [
                    'path' => $path,
                    'date' => $date,
                    'slug' => $slug,
                    'url' => route('posts.show', [$date->format('Y'), $slug]),
                    'title' => $document->title,
                    'subtitle' => $document->subtitle,
                    'original_publication_name' => $document->original_publication_name,
                    'original_publication_url' => $document->original_publication_url,
                    'read_more_text' => $document->read_more_text,
                    'read_more_url' => $document->read_more_url,
                    'contents' => markdown($document->body()),
                    'summary' => markdown($document->summary ?? $document->body()),
                ];
            })
            ->sortByDesc('date');
    }
}
