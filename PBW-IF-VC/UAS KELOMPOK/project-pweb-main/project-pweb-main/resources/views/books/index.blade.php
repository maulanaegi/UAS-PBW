@extends('books.layouts.master')
@section('title', 'MyBooks')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title mb-0">Book Collection</h5>
                <div class="d-flex gap-3">
                    <div class="search-box">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search books...">
                    </div>
                    <a class="btn btn-success" href="{{route('books.create')}}" role="button">
                        <i class="fas fa-plus me-2"></i>Add New Book
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover" id="booksTable">
                    <thead>
                        <tr>
                            <th scope="col" class="sortable" data-sort="number">No</th>
                            <th scope="col" class="sortable" data-sort="title">Title</th>
                            <th scope="col" class="sortable" data-sort="writer">Author</th>
                            <th scope="col" class="sortable" data-sort="publisher">Publisher</th>
                            <th scope="col">Synopsis</th>
                            <th scope="col" class="sortable" data-sort="stock">Stock</th>
                            <th scope="col" class="sortable" data-sort="price">Price</th>
                            <th scope="col" class="sortable" data-sort="date">Last Updated</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $key => $book)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$book->title}}</td>
                                <td>{{$book->writer}}</td>
                                <td>{{$book->publisher}}</td>
                                <td>
                                    <button class="btn btn-link p-0 synopsis-btn" data-synopsis="{{$book->synopsis}}">
                                        View Synopsis
                                    </button>
                                </td>
                                <td>{{$book->stock}}</td>
                                <td>@currency($book->price)</td>
                                <td>{{$book->updated_at}}</td>
                                <td>
                                    <form action="/books/{{$book->id}}" method="POST" class="d-flex gap-2">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-primary btn-icon" href="{{route('books.edit', $book->id)}}" role="button" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-icon confirm-delete" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Synopsis Modal -->
    <div class="modal fade" id="synopsisModal" tabindex="-1" aria-labelledby="synopsisModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="synopsisModalLabel">Book Synopsis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="synopsisText"></p>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            // Search functionality
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#booksTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // Sorting functionality
            $(".sortable").click(function() {
                var table = $(this).parents('table').eq(0);
                var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()));
                this.asc = !this.asc;
                if (!this.asc) {
                    rows = rows.reverse();
                }
                for (var i = 0; i < rows.length; i++) {
                    table.append(rows[i]);
                }
            });

            function comparer(index) {
                return function(a, b) {
                    var valA = getCellValue(a, index), valB = getCellValue(b, index);
                    return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB);
                }
            }

            function getCellValue(row, index) {
                return $(row).children('td').eq(index).text();
            }

            // Synopsis modal
            $('.synopsis-btn').click(function() {
                var synopsis = $(this).data('synopsis');
                $('#synopsisText').text(synopsis);
                var modal = new bootstrap.Modal(document.getElementById('synopsisModal'));
                modal.show();
            });

            // Add hover effect to sortable columns
            $('.sortable').hover(
                function() {
                    $(this).css('cursor', 'pointer');
                    $(this).append(' <i class="fas fa-sort"></i>');
                },
                function() {
                    $(this).find('.fa-sort').remove();
                }
            );

            // Row hover effect
            $('#booksTable tbody tr').hover(
                function() {
                    $(this).addClass('table-hover-highlight');
                },
                function() {
                    $(this).removeClass('table-hover-highlight');
                }
            );
        });
    </script>
    @endpush
@endsection