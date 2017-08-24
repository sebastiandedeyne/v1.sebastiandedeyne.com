<?php

return [

    'feeds' => [
        'main' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * 'App\Repositories\NewsItemRepository@getAllOnline'
             */
            'items' => 'App\Content\Posts@feed',

            /*
             * The feed will be available on this url.
             */
            'url' => '/feed',

            'title' => 'Sebastian De Deyne',

            'description' => 'Full-stack developer working at Spatie in Antwerp, Belgium. I write about php, javascript, and programming in general.',
        ],
    ],

];
