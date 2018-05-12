<?php

return [
    'collections' => [
        'posts' => [
            'sheet_class' => App\Post::class,
            'path_parser' => Spatie\Sheets\PathParsers\SlugWithDateParser::class,
        ],
    ],
];
