<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

class PostMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:post {title} {--article}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new blog post';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $title = $this->input->getArgument('title');
        $slug = strtolower(str_replace(' ', '-', $title));
        $date = Carbon::now();
        $type = $this->input->getOption('external') ? 'external' : 'article';

        $contents = file_get_contents(__DIR__.'/stubs/post.stub');
        $contents = str_replace('$title', $title, $contents);
        $contents = str_replace('$type', $type, $contents);
        $contents = str_replace('$date', $date->format('Y-m-d'), $contents);

        $directory = base_path("content/posts/{$date->year}");

        @mkdir($directory);
        file_put_contents($directory.'/'.$slug.'.md', $contents);

        $this->info("Post created successfully.");
    }
}
