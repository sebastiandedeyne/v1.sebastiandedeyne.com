<?php

return [

    'feeds' => [
        'main' => [
            'items' => 'App\Posts\PostRepository@getMainFeedItems',
            'url' => '/feed',
            'title' => 'Sebastian De Deyne',
            'description' => 'Full-stack developer working at Spatie in Antwerp, Belgium. I write about php, javascript, and programming in general.',
        ],
        'articles' => [
            'items' => 'App\Posts\PostRepository@getArticleFeedItems',
            'url' => '/feed/articles',
            'title' => 'Sebastian De Deyne',
            'description' => 'Full-stack developer working at Spatie in Antwerp, Belgium. I write about php, javascript, and programming in general.',
        ],
    ],

];
