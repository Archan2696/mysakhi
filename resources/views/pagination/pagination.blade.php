@if ($paginator->hasPages())
@php
    $total = $paginator->total();
    $currentPage = $paginator->currentPage();
    $perPage = $paginator->perPage();

    $from = ($currentPage - 1) * $perPage + 1;
    $to = min($currentPage * $perPage, $total);

    @endphp
    
            <ul class="pagination">
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link" href="javascript:;" aria-label="Previous">
                            <i class="fa-solid fa-angles-left"></i>
                        </a>
                    </li>
                @else
                <li class="page-item">
                    <a class="page-link clickable" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">
                        <i class="fa-solid fa-angles-left"></i>
                    </a>
                </li>
                @endif
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled"><a class="page-link" href="javascript:;">{{ $element }}</a></li>
                    @endif
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item my-active"><a class="page-link active" href="javascript:;">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link clickable" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link clickable" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                            <i class="fa-solid fa-angles-right"></i>
                        </a>
                    </li>
                @else
                <li class="page-item">
                    <a class="page-link disabled" href="javascript:;" aria-label="Next">
                        <i class="fa-solid fa-angles-right"></i>
                    </a>
                </li>
                @endif
            </ul>
            
@endif 