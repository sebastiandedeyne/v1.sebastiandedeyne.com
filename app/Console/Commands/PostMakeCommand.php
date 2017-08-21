<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class PostMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:post {title}';

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
        $slug = strtolower(str_slug($title));
        $date = Carbon::now();

        $contents = file_get_contents(__DIR__.'/stubs/post.stub');
        $contents = str_replace('$title', $title, $contents);

        $path = 'posts/'.$date->format('Y-m-d').'.'.$slug.'.md';

        Storage::disk('content')->put($path, $contents);

        $this->info("Post created successfully.");
    }
}
