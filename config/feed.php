<?php

return [

    'feeds' => [
        'main' => [
            'items' => 'App\Posts\GetMainFeedItems@__invoke',
            'url' => '/feed/index.xml',
            'title' => 'Sebastian De Deyne',
            'description' => 'Full-stack developer working at Spatie in Antwerp, Belgium. I write about php, javascript, and programming in general.',
        ],
        'articles' => [
            'items' => 'App\Posts\GetArticleFeedItems@__invoke',
            'url' => '/feed/articles.xml',
            'title' => 'Sebastian De Deyne',
            'description' => 'Full-stack developer working at Spatie in Antwerp, Belgium. I write about php, javascript, and programming in general.',
        ],
    ],

];
