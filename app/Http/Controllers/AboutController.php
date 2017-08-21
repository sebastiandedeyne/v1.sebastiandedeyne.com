<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;
use Illuminate\Routing\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('about.index');
    }
}
