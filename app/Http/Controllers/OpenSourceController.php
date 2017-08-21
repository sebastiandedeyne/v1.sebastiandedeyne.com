<?php

namespace App\Http\Controllers;

use App\Content\OpenSource;

class OpenSourceController
{
    public function index(OpenSource $openSource)
    {
        return view('openSource.index', [
            'projects' => $openSource->projects(),
        ]);
    }
}
