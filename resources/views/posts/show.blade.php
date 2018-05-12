@component('layouts.app', [
  'title' => $post->title,
  'description' => $post->summary,
])
  @slot('head')
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono" rel="stylesheet">
  @endslot

  <article>
    <header class="mt-10 mb-12 md:mb-20 text-center md:text-left">
      <h1 class="md:w-2/3 leading-tighter text-xl md:text-2xl px-4 sm:px-8 md:px-0">
        {{ $post->title }}
      </h1>
      <aside class="mt-1 md:mt-3 text-grey text-sm md:text-xs">
        Published
        <time datetime="{{ $post->date->format('Y-m-d') }}">
          {{ $post->date->format('F jS, Y') }}
        </time>
        @if($post->subtitle)
          — {{ $post->subtitle }}
        @endif
      </aside>
    </header>
    <section class="markup {{-- has-sponsor --}} | font-system md:font-serif md:w-4/5">
      {{ $post->contents }}
    </section>
  </article>
@endcomponent
