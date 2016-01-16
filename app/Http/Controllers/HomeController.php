<?php

namespace App\Http\Controllers;

use App\Foundation\Http\Controllers\Controller;
use Symfony\Component\Yaml\Yaml;

class HomeController extends Controller
{
    public function home()
    {
        $index = (new Yaml())->parse(
            file_get_contents(content_path('index.yml'))
        );

        return view('home', compact('index'));
    }
}
