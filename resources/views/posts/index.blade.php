@component('layouts.app', [
  'title' => 'Posts',
])
  @include('partials.postList', [
    'posts' => $posts,
  ])
@endcomponent
