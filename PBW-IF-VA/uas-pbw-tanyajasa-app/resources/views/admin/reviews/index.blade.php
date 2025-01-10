@extends('admin.layouts.main')

@section('container')
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Manajemen Ulasan</h3>
            </div>
        </div>

        <!-- Filter -->
        <div class="row mb-4">
            <form method="GET" action="{{ route('admin.reviews.index') }}" class="d-flex">
                <div class="col-md-3">
                    <select class="form-select" name="service_id">
                        <option value="">Semua Layanan</option>
                        @foreach ($services as $service)
                        <option value="{{ $service->id }}" {{ request('service_id') == $service->id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mx-3">
                    <select class="form-select" name="rating">
                        <option value="">Semua Rating</option>
                        <option value="1" {{ request('rating') == '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ request('rating') == '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ request('rating') == '3' ? 'selected' : '' }}>3</option>
                        <option value="4" {{ request('rating') == '4' ? 'selected' : '' }}>4</option>
                        <option value="5" {{ request('rating') == '5' ? 'selected' : '' }}>5</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>

        <!-- Tabel Ulasan -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Ulasan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Layanan</th>
                                        <th>Rating</th>
                                        <th>Komentar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($reviews as $review)
                                    <tr>
                                        <td>{{ $review->user->name }}</td>
                                        <td>{{ $review->service->name }}</td>
                                        <td>{{ $review->rating }}</td>
                                        <td>{{ $review->comment ?? '-' }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button 
                                                    class="btn btn-link btn-warning btn-lg"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editReviewModal"
                                                    data-id="{{ $review->id }}"
                                                    data-rating="{{ $review->rating }}"
                                                    data-comment="{{ $review->comment }}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link btn-danger btn-lg">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada ulasan.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $reviews->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Ulasan -->
<div class="modal fade" id="editReviewModal" tabindex="-1" aria-labelledby="editReviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editReviewForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editReviewModalLabel">Edit Ulasan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-rating" class="form-label">Rating</label>
                        <select class="form-select" id="edit-rating" name="rating" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-comment" class="form-label">Komentar</label>
                        <textarea class="form-control" id="edit-comment" name="comment"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editReviewModal = document.getElementById('editReviewModal');
        const editForm = document.getElementById('editReviewForm');

        editReviewModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            // Ambil data dari tombol
            const id = button.getAttribute('data-id');
            const rating = button.getAttribute('data-rating');
            const comment = button.getAttribute('data-comment');

            // Isi form dengan data
            editForm.action = `/admin/reviews/${id}`;
            document.getElementById('edit-rating').value = rating;
            document.getElementById('edit-comment').value = comment;
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.btn-danger'); // Tombol Hapus

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault(); // Mencegah form untuk submit langsung

                const form = this.closest('form'); // Ambil form yang berisi tombol Hapus

                Swal.fire({
                    title: 'Yakin ingin menghapus ulasan ini?',
                    text: "Data ini tidak dapat dikembalikan setelah dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Kirim form jika konfirmasi
                    }
                });
            });
        });
    });
</script>
@endsection
