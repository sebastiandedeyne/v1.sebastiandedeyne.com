<?php

namespace App\Http\Controllers;

use App\Content\Posts;
use Spatie\Sheets\Sheets;

class PostsController
{
    public function index(Sheets $sheets)
    {
        $posts = $sheets->collection('posts')->all();

        return view('posts.index', [
            'paginator' => $posts->paginate(20),
        ]);
    }

    public function page($page, Sheets $sheets)
    {
        $posts = $sheets->collection('posts')->all();

        return view('posts.index', [
            'paginator' => $posts->paginate(20, 'page', $page),
        ]);
    }

    public function show($year, $slug, Sheets $sheets)
    {
        $posts = $sheets->collection('posts');

        return view('posts.show', [
            'post' => $posts->find($year, $slug),
        ]);
    }
}
