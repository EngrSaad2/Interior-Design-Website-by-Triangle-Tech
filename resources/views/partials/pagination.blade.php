@if ($paginator->hasPages())
    <style>
        .custom-pagination-nav {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            margin: 2.5rem 0 1rem !important;
            width: 100% !important;
        }
        .custom-pagination {
            display: inline-flex !important;
            flex-direction: row !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 8px !important;
            list-style: none !important;
            padding: 0 !important;
            margin: 0 !important;
            flex-wrap: wrap !important;
        }
        .custom-pagination .page-item {
            display: inline-block !important;
            list-style: none !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        .custom-pagination .page-link {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            min-width: 44px !important;
            height: 44px !important;
            padding: 0 14px !important;
            border-radius: 8px !important;
            background: #ffffff !important;
            border: 1px solid #e2e8f0 !important;
            color: #1f242e !important;
            font-size: 15px !important;
            font-weight: 600 !important;
            font-family: inherit !important;
            text-decoration: none !important;
            transition: all 0.2s ease !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05) !important;
            user-select: none !important;
        }
        .custom-pagination .page-link:hover {
            background: #eb2449 !important;
            border-color: #eb2449 !important;
            color: #ffffff !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 16px rgba(235, 36, 73, 0.25) !important;
        }
        .custom-pagination .page-item.active .page-link {
            background: #eb2449 !important;
            border-color: #eb2449 !important;
            color: #ffffff !important;
            box-shadow: 0 6px 16px rgba(235, 36, 73, 0.35) !important;
            cursor: default !important;
            transform: none !important;
        }
        .custom-pagination .page-item.disabled .page-link {
            background: #f8fafc !important;
            border-color: #e2e8f0 !important;
            color: #94a3b8 !important;
            cursor: not-allowed !important;
            opacity: 0.6 !important;
            transform: none !important;
            box-shadow: none !important;
        }
    </style>
    <nav class="custom-pagination-nav" role="navigation" aria-label="Pagination Navigation">
        <ul class="custom-pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="Previous">
                    <span class="page-link" aria-hidden="true">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="Next">
                    <span class="page-link" aria-hidden="true">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
