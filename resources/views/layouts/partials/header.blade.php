<header class="header">
  <strong class="caps | font-mono font-bold">
    <a href="{{ route('home') }}" class="text-red">
      Sebastian De Deyne
    </a>
    @isset($breadcrumb)
      <span class="text-grey font-normal">
        /
        <a href="{{ $breadcrumb['href'] }}">
          {{ $breadcrumb['text'] }}
        </a>
      </span>
    @endisset
  </strong>
  <nav class="text-grey text-xs">
    {{ $menu }}
  </nav>
</header>
