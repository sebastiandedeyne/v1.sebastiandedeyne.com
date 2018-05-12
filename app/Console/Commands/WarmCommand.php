<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Crawler\Crawler;
use Spatie\Crawler\CrawlInternalUrls;

class WarmCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'warm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl the application and check for broken pages';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = config('app.url');

        Crawler::create()
            ->setCrawlProfile(new CrawlInternalUrls($url))
            ->setCrawlObservers([])
            ->startCrawling($url);
    }
}
