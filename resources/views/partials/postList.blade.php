<section{!! isset($class) ? " class=\"{$class}\"" : '' !!}>
  <h2 class="caps">
    {{ $title }}
  </h2>
  <ul>
    @foreach($posts as $post)
      <li class="mt-4">
        <a href="{{ $post->url }}" class="block font-normal leading-tight">
          {{ $post->title }}
        </a>
        <a href="{{ $post->url }}" class="block text-xs text-grey leading-tight sm:mt-1">
          <time datetime="{{ $post->date->format('Y-m-d') }}">
            {{ $post->date->format('F jS, Y') }}
          </time>
        </a>
      </li>
    @endforeach
  </ul>
</section>
