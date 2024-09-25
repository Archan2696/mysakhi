@if ($paginator->hasPages())
@php
    $total = $paginator->total();
    $currentPage = $paginator->currentPage();
    $perPage = $paginator->perPage();

    $from = ($currentPage - 1) * $perPage + 1;
    $to = min($currentPage * $perPage, $total);

    @endphp
    
    <style type="text/css">
    .page-link.active {
    background-color: #f28f89;
        border-color: #f28f89;
    }
    
    .page-link {
    color: #212529;
    }
    .page-link:hover {
        color: #fff;
        background-color: var(--bg-secondary-color);
        border-color: var(--bg-secondary-color);
    }
    .page-link:focus{
        box-shadow:unset;
    }
    </style>


    <div class="product-filter product-filter1">
        <div class="row row1">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="showing">
                    <p style="margin-top: 10px;font-size:17px;">Showing {{$from}} to {{$to}} of {{$total}}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
            <ul class="pagination">
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link" href="javascript:;" aria-label="Previous">
                            <i class="fa-solid fa-angle-left"></i>
                        </a>
                    </li>
                @else
                <li class="page-item">
                    <a class="page-link clickable" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">
                        <i class="fa-solid fa-angle-left"></i>
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
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </li>
                @else
                <li class="page-item">
                    <a class="page-link disabled" href="javascript:;" aria-label="Next">
                        <i class="fa-solid fa-angle-right"></i>
                    </a>
                </li>
                @endif
            </ul>
            </div>
        </div>
    </div>
@endif 