@extends('admin.layouts.main')

@section('container')
  <div class="container">
    <div class="page-inner">
      <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
          <h3 class="fw-bold mb-3">Manajemen Layanan</h3>
        </div>
      </div>

      <!-- Filter -->
      <div class="row mb-4">
        <form method="GET" action="{{ route('admin.services.index') }}" class="d-flex">
          <div class="col-md-3">
            <select class="form-select" name="category">
              <option value="">Semua Kategori</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                  {{ $category->name }}
                </option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary ms-3">Filter</button>
        </form>
      </div>

      <!-- Tabel Layanan -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <h4 class="card-title">Daftar Layanan</h4>
                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                  <i class="fa fa-plus"></i>
                  Tambah Layanan
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Kategori</th>
                      <th>Provider</th>
                      <th>Harga</th>
                      <th>Tipe</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($services as $service)
                      <tr>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->category->name }}</td>
                        <td>{{ $service->user->name }}</td>
                        <td>Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($service->service_type) }} </td>
                        <td>
                          <div class="form-button-action">
                            <button 
                              class="btn btn-link btn-warning btn-lg" 
                              data-bs-toggle="modal" 
                              data-bs-target="#editServiceModal" 
                              data-id="{{ $service->id }}" 
                              data-name="{{ $service->name }}" 
                              data-category="{{ $service->category_id }}" 
                              data-price="{{ $service->price }}" 
                              data-description="{{ $service->description }}" 
                              data-service_type="{{ $service->service_type }}" 
                              data-provider="{{ $service->provider_id }}">
                              <i class="fa fa-edit"></i>
                            </button>
                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline">
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
                        <td colspan="6" class="text-center">Tidak ada layanan.</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              {{ $services->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Layanan -->
  <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('admin.services.store') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="addServiceModalLabel">Tambah Layanan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Nama Layanan -->
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <!-- Kategori -->
            <div class="mb-3">
              <label for="category_id" class="form-label">Kategori</label>
              <select class="form-select" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
            
            <!-- Harga -->
            <div class="mb-3">
              <label for="price" class="form-label">Harga</label>
              <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>
            
            <!-- Deskripsi -->
            <div class="mb-3">
              <label for="description" class="form-label">Deskripsi</label>
              <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            
            <!-- Tipe Jasa -->
            <div class="mb-3">
              <label for="service_type" class="form-label">Tipe Jasa</label>
              <select class="form-select" id="service_type" name="service_type" required>
                <option value="direct">Direct</option>
                <option value="remote">Remote</option>
              </select>
            </div>
            
            <!-- Provider -->
            <div class="mb-3">
              <label for="provider_id" class="form-label">Penyedia Jasa (Provider)</label>
              <select class="form-select" id="provider_id" name="provider_id" required>
                @foreach($providers as $provider)
                  <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                @endforeach
              </select>
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
  
  <!-- Modal Edit Layanan -->
  <div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="editServiceForm" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h5 class="modal-title" id="editServiceModalLabel">Edit Layanan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Nama Layanan -->
            <div class="mb-3">
              <label for="edit-name" class="form-label">Nama</label>
              <input type="text" class="form-control" id="edit-name" name="name" required>
            </div>

            <!-- Kategori -->
            <div class="mb-3">
              <label for="edit-category_id" class="form-label">Kategori</label>
              <select class="form-select" id="edit-category_id" name="category_id" required>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>

            <!-- Harga -->
            <div class="mb-3">
              <label for="edit-price" class="form-label">Harga</label>
              <input type="number" class="form-control" id="edit-price" name="price" step="0.01" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
              <label for="edit-description" class="form-label">Deskripsi</label>
              <textarea class="form-control" id="edit-description" name="description"></textarea>
            </div>

            <!-- Tipe Jasa -->
            <div class="mb-3">
              <label for="edit-service_type" class="form-label">Tipe Jasa</label>
              <select class="form-select" id="edit-service_type" name="service_type" required>
                <option value="direct">Direct</option>
                <option value="remote">Remote</option>
              </select>
            </div>

            <!-- Provider -->
            <div class="mb-3">
              <label for="edit-provider_id" class="form-label">Penyedia Jasa (Provider)</label>
              <select class="form-select" id="edit-provider_id" name="provider_id" required>
                @foreach($providers as $provider)
                  <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                @endforeach
              </select>
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
      const editServiceModal = document.getElementById('editServiceModal');
      const editForm = document.getElementById('editServiceForm');

      editServiceModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        // Ambil data dari tombol
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const category = button.getAttribute('data-category');
        const price = button.getAttribute('data-price');
        const description = button.getAttribute('data-description');
        const serviceType = button.getAttribute('data-service_type'); // Tipe jasa sebelumnya
        const provider = button.getAttribute('data-provider'); // Provider sebelumnya

        // Isi form dengan data yang diambil
        editForm.action = `/admin/services/${id}`;
        document.getElementById('edit-name').value = name;
        document.getElementById('edit-category_id').value = category;
        document.getElementById('edit-price').value = price;
        document.getElementById('edit-description').value = description;
        document.getElementById('edit-service_type').value = serviceType; // Set tipe jasa sebelumnya
        document.getElementById('edit-provider_id').value = provider; // Set provider sebelumnya
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
