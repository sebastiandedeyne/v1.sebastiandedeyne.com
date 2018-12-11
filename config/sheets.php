<?php

return [
    'collections' => [
        'posts' => [
            'sheet_class' => App\Posts\Post::class,
            'path_parser' => Spatie\Sheets\PathParsers\SlugWithDateParser::class,
        ],
    ],
];
