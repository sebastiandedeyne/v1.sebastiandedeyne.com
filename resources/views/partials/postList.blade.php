<section>
  <h2 class="caps">
    {{ $title }}
  </h2>
  <ul>
    @foreach($posts as $post)
      <li class="mt-2">
        <a href="{{ route('posts.show', $post->slug) }}">
          <strong class="block font-normal text-lg">
            {{ $post->title }}
          </strong>
          <time class="text-xs text-grey" datetime="{{ $post->date->format('Y-m-d') }}">
            {{ $post->date->format('F jS, Y') }}
          </time>
        </a>
      </li>
    @endforeach
  </ul>
</section>
