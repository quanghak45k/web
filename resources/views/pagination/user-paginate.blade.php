

@if ($paginator->hasPages())
    <div class="clearfix">
        <div class="hint-text">Showing <b>{{$paginator->count()}}</b> out of <b>{{$paginator->total()}}</b> Users</div>
    <!-- Pagination -->

        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled page-item">
                    <span><i class="fa fa-angle-double-left"></i></span>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <span><i class="fa fa-angle-double-left"></i></span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active page-item"><a class="page-link">{{ $page }}</a></li>
                        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                            <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                        @elseif ($page == $paginator->lastPage() - 1)
                            <li class="disabled page-item"><a class="page-link"><i class="fa fa-ellipsis-h"></i></a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link">
                        <i class="fa fa-angle-double-right"></i>
                    </a>
                </li>
            @else
                <li class="disabled page-item">
                    <span><i class="fa fa-angle-double-right"></i></span>
                </li>
            @endif
        </ul>

    </div>
@endif
