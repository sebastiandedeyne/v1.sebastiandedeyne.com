<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;
use Symfony\Component\Yaml\Yaml;

class HomeController extends Controller
{
    public function home()
    {
        $posts = app(ContentRepository::class)->posts()->toArray();

        $more = (new Yaml())->parse(
            app(ContentRepository::class)->raw('index.yml')
        );

        return view('home', compact('posts', 'more'));
    }
}
