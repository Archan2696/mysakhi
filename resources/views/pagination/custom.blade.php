@if ($paginator->hasPages())
<div class="lh-pagination">
    @php
    $total = $paginator->total();
$currentPage = $paginator->currentPage();
$perPage = $paginator->perPage();

$from = ($currentPage - 1) * $perPage + 1;
$to = min($currentPage * $perPage, $total);

//echo "Showing {$from} to {$to} of {$total} entries";
    @endphp
    <h5>Showing : {{$from}}-{{$to}} out of {{$total}}</h5>   
    <nav aria-label="Page navigation example">
        <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="javascript:;" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        @else
        <li class="page-item">
            <a class="page-link clickable" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
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
                        <li class="page-item active my-active"><a class="page-link" href="javascript:;">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link clickable" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link clickable" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        @else
        <li class="page-item">
            <a class="page-link disabled" href="javascript:;" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        @endif
    </ul>
    </nav>
</div>
@endif 