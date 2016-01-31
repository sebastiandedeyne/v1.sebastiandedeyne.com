<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;
use App\Foundation\Http\Controllers\Controller;
use Symfony\Component\Yaml\Yaml;

class HomeController extends Controller
{
    public function home()
    {
        $index = (new Yaml())->parse(
            app(ContentRepository::class)->raw('index.yml')
        );

        return view('home', compact('index'));
    }
}
