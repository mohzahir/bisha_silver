<ul class="pagination pagination-rounded mb-sm-0">
    @if ($paginator->onFirstPage())
    <li class="page-item disabled">
        <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
    </li>
    @else
    <li class="page-item">
        <a href="{{ $paginator->nextPageUrl() }}" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
    </li>
    @endif


    @foreach ($elements as $element)
        @if (is_string($element))
            <!-- <li class="disabled"><span>{{ $element }}</span></li> -->
            <li class="page-item disabled">
                <a href="#" class="page-link">{{ $element }}</a>
            </li>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <!-- <li class="active"><span>{{ $page }}</span></li> -->
                    <li class="page-item active">
                        <a href="#" class="page-link">{{ $page }}</a>
                    </li>
                @else
                    <!-- <li><a href="{{ $url }}">{{ $page }}</a></li> -->
                    <li class="page-item">
                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach


    @if ($paginator->onFirstPage())
    <li class="page-item">
        <a href="{{ $paginator->nextPageUrl() }}" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
    </li>
    @else
    <li class="page-item disabled">
        <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
    </li>
    @endif


    <!-- <li class="page-item">
        <a href="#" class="page-link">1</a>
    </li>
    <li class="page-item active">
        <a href="#" class="page-link">2</a>
    </li>
    <li class="page-item">
        <a href="#" class="page-link">3</a>
    </li>
    <li class="page-item">
        <a href="#" class="page-link">4</a>
    </li>
    <li class="page-item">
        <a href="#" class="page-link">5</a>
    </li>
    <li class="page-item">
        <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
    </li> -->
</ul>