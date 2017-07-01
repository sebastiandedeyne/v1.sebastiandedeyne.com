@if ($paginator->hasPages())
    <section class="blog__paginator">
        @if(! $paginator->onFirstPage())
            @php
                $nextPageUrl = $paginator->currentPage() === 2 ? 
                    url('posts') : 
                    url('posts/page/'.($paginator->currentPage() - 1));
            @endphp
            <a href="{{ $nextPageUrl }}" rel="prev" class="blog__paginator__newer">
                Newer
            </a>
        @endif
        @if ($paginator->hasMorePages())
            @php($previousPageUrl = url('posts/page/'.($paginator->currentPage() + 1)))
            <a href="{{ $previousPageUrl }}" rel="next" class="blog__paginator__older">
                Older
            </a>
        @endif
    </section>
@endif
