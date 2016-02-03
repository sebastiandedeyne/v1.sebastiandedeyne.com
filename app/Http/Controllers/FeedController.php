<?php

namespace App\Http\Controllers;

use App\Content\Article;
use App\Content\ContentRepository;
use App\Foundation\Http\Controllers\Controller;
use Carbon\Carbon;
use Roumen\Feed\Feed;

final class FeedController extends Controller
{
    public function rss()
    {
        return $this->feed()->render('rss');
    }

    public function atom()
    {
        return $this->feed()->render('atom');
    }

    private function feed() : Feed
    {
        $feed = app('feed')->make();

        $feed->setCache(60);

        if (! $feed->isCached()) {
            $this->fillFeed($feed);
        }

        return $feed;
    }

    private function fillFeed(Feed $feed)
    {
        $posts = app(ContentRepository::class)->posts();

        $feed->title = 'Sebastian De Deyne';
        $feed->description = 'Full-stack developer working at Spatie in Antwerp, Belgium';
        $feed->link = request()->url();
        $feed->setDateFormat('datetime');
        $feed->pubdate = $posts->first() ? $posts->first()->date : Carbon::now();
        $feed->lang = 'en';
        $feed->setShortening(false);

        $posts->each(function (Article $post) use ($feed) {
            $feed->add(
                $post->title,
                'Sebastian De Deyne',
                $post->url,
                $post->date,
                string($post->contents)->tease(140),
                $post->contents
            );
        });
    }
}
