@component('layouts.app', [
  'title' => 'Posts',
])
  @include('partials.postList', [
    'title' => 'All posts',
    'posts' => $posts,
  ])
@endcomponent
