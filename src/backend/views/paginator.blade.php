{{-- 
	@if ($paginator->hasPages())
		<pre>{{print_r($elements, true)}}</pre>
	@endif
 --}}
@if ($paginator->hasPages())
    <nav class="paginator">
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled"><</li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">{{ $element }}</li>
                @endif
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page">{{ $page }}</li>
                        @else
                            <li><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">></a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">></li>
            @endif
        </ul>
    </nav>
@endif
