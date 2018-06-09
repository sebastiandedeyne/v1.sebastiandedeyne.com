<?php

namespace App\Console\Commands;

use App\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Spatie\Browsershot\Browsershot;
use Spatie\Sheets\Sheets;
use Illuminate\Support\Collection;

class GenerateOgCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'og:generate {--regenerate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate OG images';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Sheets $sheets)
    {
        $images = $sheets->collection('posts')->all()->map(function (Post $post) {
            return [
                'url' => url("{$post->slug}/og-image"),
                'path' => public_path("og/{$post->slug}.png"),
            ];
        });

        if (!$this->option('regenerate')) {
            $images = $images->reject(function (array $image) {
                return file_exists($image['path']);
            });
        }

        $images->each(function (array $image) {
            Browsershot::url($image['url'])
                ->setChromePath(env('CHROME_PATH', 'google-chrome'))
                ->deviceScaleFactor(2)
                ->windowSize(1200, 630)
                ->save($image['path']);

            $this->info("Generated {$image['path']}");
        });
    }
}
