<?php

namespace App\Http\Controllers;

use App\Content\ContentRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller;

class BlogController extends Controller
{
    public function index(ContentRepository $contentRepository)
    {
        $paginator = $this->paginate($contentRepository->posts(), 1);

        return view('blog.index', ['paginator' => $paginator]);
    }

    public function page($page, ContentRepository $contentRepository)
    {
        $paginator = $this->paginate($contentRepository->posts(), $page);

        return view('blog.index', ['paginator' => $paginator]);
    }

    public function post(string $slug, ContentRepository $contentRepository)
    {
        $post = $contentRepository->post($slug);

        return view('blog.post', ['post' => $post]);
    }

    private function paginate($posts, $page)
    {
        $perPage = 20;
        $offset = $page * $perPage - $perPage;

        return new LengthAwarePaginator(
            $posts->slice($offset, $perPage), 
            $posts->count(), 
            $perPage, 
            $page, 
            ['path' => url('posts')]
        );
    }
}
