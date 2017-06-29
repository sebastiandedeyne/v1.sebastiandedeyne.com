<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;
use Illuminate\Routing\Controller;

class OpenSourceController extends Controller
{
    public function __invoke(ContentRepository $contentRepository)
    {
        return view('open-source')
            ->withProjects($contentRepository->openSource());
    }
}
