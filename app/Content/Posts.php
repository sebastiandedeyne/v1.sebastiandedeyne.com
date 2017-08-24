<?php

namespace App\Content;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Posts
{
    public function all()
    {
        return Cache::rememberForever('content:posts.all', function () {
            return $this->gather();
        });
    }

    public function paginate($perPage = 15, $pageName = 'page', $page = null)
    {
        return Cache::rememberForever('content:posts.paginate.'.request('page', 1), function () use ($perPage, $pageName, $page) {
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
        return Cache::rememberForever('content:posts.feed', function () {
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
        $disk = Storage::disk('content');

        return collect($disk->files('posts'))
            ->filter(function ($path) {
                return ends_with($path, '.md');
            })
            ->map(function ($path) use ($disk) {
                $filename = str_replace_first('posts/', '', $path);
                [$date, $slug, $extension] = explode('.', $filename, 3);

                $date = Carbon::createFromFormat('Y-m-d', $date);
                $document = YamlFrontMatter::parse($disk->get($path));

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
