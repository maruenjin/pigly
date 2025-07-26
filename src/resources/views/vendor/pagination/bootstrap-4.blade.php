@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">&lt;</span></li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt;</a>
            </li>
        @endif

        {{-- Always show first 3 pages --}}
        @for ($page = 1; $page <= min(3, $paginator->lastPage()); $page++)
            @if ($page == $paginator->currentPage())
                <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a></li>
            @endif
        @endfor

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&gt;</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">&gt;</span></li>
        @endif
    </ul>
@endif



