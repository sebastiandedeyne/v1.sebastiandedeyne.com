@component('layouts.app', [
  'title' => 'Posts',
  'breadcrumb' => [
    'href' => url('/posts'),
    'text' => 'Posts',
  ],
])
  <div class="wrapper">
    @include('partials.postList', [
      'title' => 'All posts',
      'posts' => $posts,
    ])
  </div>
@endcomponent
