@component('layouts.app', [
  'title' => 'Posts',
  'breadcrumb' => [
    'href' => route('posts'),
    'text' => 'Posts',
  ],
])
  @include('partials.postList', [
    'title' => 'All posts',
    'posts' => $posts,
  ])
@endcomponent
