<div class="little-seperator"></div>
<footer class="footer">
    <div>
        © {{ carbon()->format('Y') }}
        <a href="{{ url('about') }}">Sebastian De Deyne</a>
    </div>
    <a href="{{ url('feed') }}" data-turbolinks="false" class="footer__rss">
        <span class="icon -rss -xs" title="RSS"></span>
    </a>
</footer>
