@component('layouts.app', [
  'title' => $post->title,
  'description' => $post->summary,
  'breadcrumb' => [
    'href' => route('posts'),
    'text' => 'Posts',
  ],
])
  <article class="wrapper">
    <header class="mb-20">
      <h1 class="w-2/3 leading-tighter text-2xl">
        {{ $post->title }}
      </h1>
      <aside class="mt-3 text-grey text-xs">
        Published
        <time datetime="{{ $post->date->format('Y-m-d') }}">
          {{ $post->date->format('F jS, Y') }}
        </time>
        @if($post->subtitle)
          — {{ $post->subtitle }}
        @endif
      </aside>
    </header>
    <section class="markup has-sponsor | font-serif w-4/5">
      {{ $post->contents }}
    </section>
  </article>
@endcomponent
