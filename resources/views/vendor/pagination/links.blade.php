@if ($paginator->hasPages())
    <nav class="alert-info alert mb-4">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="mr-3 disabled" aria-disabled="true">
                    <span class="font-weight-bolder d-block text-center">
                        <i class="icofont-long-arrow-left"></i>
                    </span>
                </li>
            @else
                <li class="mr-3">
                    <a class="text-decoration-none font-weight-bolder d-block text-center" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <i class="icofont-long-arrow-left"></i>
                    </a>
                </li>
            @endif
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="">
                    <a class="text-decoration-none font-weight-bolder d-block text-center" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <i class="icofont-long-arrow-right"></i>
                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true">
                    <span class="font-weight-bolder d-block text-center">
                        <i class="icofont-long-arrow-right"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
