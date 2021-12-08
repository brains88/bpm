@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="mr-3 disabled" aria-disabled="true">
                    <span class="font-weight-bolder text-white d-block text-center rounded-circle bg-dark" style="width: 35px; height: 35px; line-height: 35px;">
                        <i class="icofont-arrow-left"></i>
                    </span>
                </li>
            @else
                <li class="mr-3">
                    <a class="text-decoration-none font-weight-bolder text-white d-block text-center rounded-circle bg-main-dark" style="width: 35px; height: 35px; line-height: 35px;" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <i class="icofont-arrow-left"></i>
                    </a>
                </li>
            @endif
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="">
                    <a class="text-decoration-none font-weight-bolder text-white d-block text-center rounded-circle bg-main-dark" style="width: 35px; height: 35px; line-height: 35px;" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <i class="icofont-arrow-right"></i>
                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true">
                    <span class="font-weight-bolder text-white d-block text-center rounded-circle bg-dark" style="width: 35px; height: 35px; line-height: 35px;">
                        <i class="icofont-arrow-right"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
