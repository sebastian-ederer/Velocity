@if ($paginator->hasPages())

    <ul class="pager">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled previous btn btn-lg"><span>@lang('pagination.previous')</span></li>
        @else
            <li class="previous btn btn-lg"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="next btn btn-lg"><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
        @else
            <li class="disabled next btn btn-lg"><span>@lang('pagination.next')</span></li>
        @endif
    </ul>
@endif
