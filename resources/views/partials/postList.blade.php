<section>
  <h2 class="caps">
    {{ $title }}
  </h2>
  <ul>
    @foreach($posts as $post)
      <li class="mt-6">
        <a href="{{ $post->url }}">
          <strong class="block font-normal text-lg">
            {{ $post->title }}
          </strong>
          <p class="text-xs text-grey leading-none mt-1">
            <time datetime="{{ $post->date->format('Y-m-d') }}">
              {{ $post->date->format('F jS, Y') }}
            </time>
          </p>
        </a>
      </li>
    @endforeach
  </ul>
</section>
