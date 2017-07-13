<div class="container">
    <header class="header">
        <a href="{{ url('/') }}" class="header__logotype">
            {{ svg('logotype') }}
        </a>
        <nav class="header__nav">
            <ul class="header__nav__list">
                <li class="header__nav__item @if(request()->url() === url('/')) -active @endif">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="header__nav__item @if(starts_with(request()->url(), url('posts'))) -active @endif">
                    <a href="{{ url('posts') }}">Blog</a>
                </li>
                <li class="header__nav__item @if(starts_with(request()->url(), url('open-source'))) -active @endif">
                    <a href="{{ url('open-source') }}">Open Source</a>
                </li>
                <li class="header__nav__item @if(starts_with(request()->url(), url('about'))) -active @endif">
                    <a href="{{ url('about') }}">About</a>
                </li>
            </ul>
        </nav>
    </header>
</div>
