<?php

namespace App\Http\Controllers;

use App\Content\Blogroll;

class BlogrollController
{
    public function index(Blogroll $blogroll)
    {
        return view('blogroll.index', [
            'items' => $blogroll->items()->groupBy('category'),
        ]);
    }
}
