@extends('admin.layouts.main')

@section('container')
<div class="container">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Manajemen Kategori</h3>
      </div>
    </div>

    <!-- Tabel Kategori -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Daftar Kategori</h4>
              <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="fa fa-plus"></i> Tambah Kategori
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="display table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Slug</th>
                    <th>Jumlah Layanan</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($categories as $category)
                  <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->services_count }}</td>
                    <td>
                      @if($category->image_url)
                      <img src="{{ asset('storage/' . $category->image_url) }}" alt="Gambar Kategori" width="50" height="50">
                      @else
                      <span class="text-muted">Tidak ada</span>
                      @endif
                    </td>
                    <td>
                      <div class="form-button-action">
                        <button class="btn btn-link btn-warning btn-lg" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editCategoryModal" 
                                data-id="{{ $category->id }}" 
                                data-name="{{ $category->name }}" 
                                data-image="{{ $category->image_url }}">
                          <i class="fa fa-edit"></i>
                        </button>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
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
                    <td colspan="5" class="text-center">Tidak ada kategori.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            {{ $categories->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="addCategoryModalLabel">Tambah Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="image_url" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*">
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

<!-- Modal Edit Kategori -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="editCategoryForm" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title" id="editCategoryModalLabel">Edit Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="edit-name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="edit-name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="edit-image_url" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="edit-image_url" name="image_url" accept="image/*">
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
    const editCategoryModal = document.getElementById('editCategoryModal');
    const editForm = document.getElementById('editCategoryForm');

    editCategoryModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;
      const id = button.getAttribute('data-id');
      const name = button.getAttribute('data-name');
      const image = button.getAttribute('data-image');

      editForm.action = `/admin/categories/${id}`;
      document.getElementById('edit-name').value = name;
      if (image) {
        document.getElementById('edit-image_url').value = image;
      }
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
                  title: 'Yakin ingin menghapus jasa ini?',
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
