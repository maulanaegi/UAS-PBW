@if ($paginator->hasPages())
<nav>
  <ul class="pagination justify-content-end">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
          <li class="page-item disabled">
              <span class="page-link" style="background-color: #f8f9fa; color: #6c757d;">&laquo;</span>
          </li>
      @else
          <li class="page-item">
              <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link" 
                 style="background-color: #0077b6; color: #ffffff;">&laquo;</a>
          </li>
      @endif

      {{-- Pagination Elements --}}
      @foreach ($elements as $element)
          @if (is_string($element))
              <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
          @endif

          @if (is_array($element))
              @foreach ($element as $page => $url)
                  @if ($page == $paginator->currentPage())
                      <li class="page-item active">
                          <span class="page-link" style="background-color: #0077b6; color: #ffffff;">{{ $page }}</span>
                      </li>
                  @else
                      <li class="page-item">
                          <a href="{{ $url }}" class="page-link" style="background-color: #f8f9fa; color: #0077b6;">{{ $page }}</a>
                      </li>
                  @endif
              @endforeach
          @endif
      @endforeach

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
          <li class="page-item">
              <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link" 
                 style="background-color: #0077b6; color: #ffffff;">&raquo;</a>
          </li>
      @else
          <li class="page-item disabled">
              <span class="page-link" style="background-color: #f8f9fa; color: #6c757d;">&raquo;</span>
          </li>
      @endif
  </ul>
</nav>
@endif
