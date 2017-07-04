<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller;

class BlogController extends Controller
{
    public function index(ContentRepository $contentRepository)
    {
        $paginator = $contentRepository->posts()->simplePaginate(5);

        return view('blog.index', ['paginator' => $paginator]);
    }

    public function page($page, ContentRepository $contentRepository)
    {
        $paginator = $contentRepository->posts()->simplePaginate(5, 'page', $page);

        return view('blog.index', ['paginator' => $paginator]);
    }

    public function post(string $slug, ContentRepository $contentRepository)
    {
        $post = $contentRepository->post($slug);

        return view('blog.post', ['post' => $post]);
    }
}
