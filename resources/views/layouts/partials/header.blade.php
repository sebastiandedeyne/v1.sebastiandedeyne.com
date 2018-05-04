<header class="wrapper | flex items-end justify-between py-4">
  <strong class="caps | font-bold">
    <a class="text-red">
      Sebastian De Deyne
    </a>
    @isset($breadcrumb)
      <span class="text-grey font-normal">
        <span class="inline-block mx-3">/</span>
        <a href="{{ $breadcrumb['href'] }}">
          {{ $breadcrumb['text'] }}
        </a>
      </span>
    @endisset
  </strong>
  <nav class="text-grey text-xs">
    <ul class="flex items-end">
      <li class="ml-3">
        <a href="{{ url('/') }}">
          Home
        </a>
      </li>
      <li class="ml-3">
        <a href="{{ url('/posts') }}">
          Posts
        </a>
      </li>
      <li class="ml-3">
        <a href="{{ url('/about') }}">
          About
        </a>
      </li>
    </ul>
  </nav>
</header>
