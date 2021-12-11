@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="mr-3 disabled" aria-disabled="true">
                    <span class="font-weight-bolder text-white d-block text-center rounded-circle bg-dark" style="width: 25px; height: 25px; line-height: 25px;">
                        <small><i class="icofont-arrow-left"></i></small>
                    </span>
                </li>
            @else
                <li class="mr-3">
                    <a class="text-decoration-none font-weight-bolder text-white d-block text-center rounded-circle bg-main-dark" style="width: 25px; height: 25px; line-height: 25px;" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <small><i class="icofont-arrow-left"></i></small>
                    </a>
                </li>
            @endif
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="">
                    <a class="text-decoration-none font-weight-bolder text-white d-block text-center rounded-circle bg-main-dark" style="width: 25px; height: 25px; line-height: 25px;" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <small><i class="icofont-arrow-right"></i></small>
                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true">
                    <span class="font-weight-bolder text-white d-block text-center rounded-circle bg-dark" style="width: 25px; height: 25px; line-height: 25px;">
                        <small><i class="icofont-arrow-right"></i></small>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
