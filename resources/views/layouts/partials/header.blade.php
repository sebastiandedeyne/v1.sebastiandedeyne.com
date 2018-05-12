<header class="header">
  <nav class="header-nav">
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
    {{ $menu }}
  </nav>
</header>
