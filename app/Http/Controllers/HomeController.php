<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index(ContentRepository $contentRepository)
    {
        return view('home')
            ->withPosts($contentRepository->posts());
    }
}
