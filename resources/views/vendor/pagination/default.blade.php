@if ($paginator->hasPages())
    <!--begin::Pagination-->
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <div class="d-flex flex-wrap py-2 mr-3">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="btn btn-icon btn-sm btn-light mr-2 my-1 disabled" style="margin-right: 5px;">
                    <i class="fa fa-arrow-left icon-xs"></i>
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-icon btn-sm btn-light mr-2 my-1"
                   style="margin-right: 5px;">
                    <i class="fa fa-arrow-left icon-xs"></i>
                </a>
            @endif


            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1 disabled">{{ $element }}</a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="btn btn-icon btn-sm border-0 btn-light btn-hover-primary active mr-2 my-1"
                               style="margin-right: 5px;">
                                {{ $page }}
                            </a>
                        @else
                            <a href="{{ $url }}" class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1"
                               style="margin-right: 5px;">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-icon btn-sm btn-light mr-2 my-1">
                    <i class="fa fa-arrow-right icon-xs"></i>
                </a>
            @else
                <a class="btn btn-icon btn-sm btn-light mr-2 my-1 disabled">
                    <i class="fa fa-arrow-right icon-xs"></i>
                </a>
            @endif
        </div>
        <div class="d-flex align-items-center py-3">
            <span
                class="text-muted">Displaying {{ $paginator->currentPage() !== $paginator->lastPage() ? $paginator->lastItem() : $paginator->total() }} of {{ $paginator->total() }} records</span>
        </div>
    </div>
    <!--end:: Pagination-->
    <nav>
        <ul class="pagination">

        </ul>
    </nav>
@endif
