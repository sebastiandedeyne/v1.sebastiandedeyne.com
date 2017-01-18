<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;
use Illuminate\Routing\Controller;

class OpenSourceController extends Controller
{
    public function index(ContentRepository $contentRepository)
    {
        return view('openSource')
            ->withProjects($contentRepository->projects());
    }
}
