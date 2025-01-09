@extends('layouts.main')

@section('container')

  <!-- Header Start -->
  <div class="container py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Kelola Jasa</h1>
    </div>
  </div>
  <!-- Header End -->

  <div class="container mt-5">
      <a href="#" class="btn mb-3" style="background-color: #0077b6; color: white;" data-bs-toggle="modal" data-bs-target="#addServiceModal">Tambah Jasa</a>

      <div class="row">
          @forelse ($services as $service)
            <div class="col-md-4">
              <div class="card kelola-jasa-card mb-4">
                  @if ($service->image_url)
                      <img src="{{ asset('storage/' . $service->image_url) }}" class="card-img-top service-img" alt="{{ $service->name }}">
                  @else
                      <img src="https://via.placeholder.com/150" alt="Foto Profil" class="service-img img-fluid mb-3">
                  @endif
                  <div class="card-body">
                      <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editServiceModal" data-id="{{ $service->id }}" data-name="{{ $service->name }}" data-description="{{ $service->description }}" data-price="{{ $service->price }}" data-category="{{ $service->category->id }}" data-image="{{ asset('storage/' . $service->image_url) }}" data-service-type="{{ $service->service_type }}">Edit</a>
                      <form action="{{ route('services.destroy', $service) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                      </form>
          
                      <h5 class="card-title mt-3">Nama: {{ $service->name }}</h5>
                      <p class="card-title mt-3"><strong>Harga:</strong> >= Rp.{{ $service->price }}</p>
                      <p class="card-title mt-3"><strong>Kategori:</strong> {{ $service->category->name }}</p>
                      <p class="card-text"><strong>Deskripsi: <br></strong>{{ $service->description }}</p>
                      <p class="card-text"><strong>Tipe Layanan:</strong> {{ ucfirst($service->service_type) }}</p>
                  </div>
              </div>
            </div>      
          @empty
              <p>Belum ada jasa yang ditambahkan.</p>
          @endforelse
      </div>
      <div>
        {{ $services->links('pagination::custom') }}
      </div>
  </div>

  <!-- Modal Tambah Jasa -->
  <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-header">
                      <h5 class="modal-title" id="addServiceModalLabel">Tambah Jasa</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="mb-3">
                          <label for="name" class="form-label">Nama Jasa</label>
                          <input type="text" class="form-control" id="name" name="name" required>
                      </div>
                      <div class="mb-3">
                          <label for="description" class="form-label">Deskripsi</label>
                          <textarea class="form-control" id="description" name="description" required></textarea>
                      </div>
                      <div class="mb-3">
                          <label for="price" class="form-label">Harga</label>
                          <input type="number" class="form-control" id="price" name="price" required>
                      </div>
                      <div class="mb-3">
                          <label for="category_id" class="form-label">Kategori</label>
                          <select class="form-control" id="category_id" name="category_id" required>
                              @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="service_type" class="form-label">Tipe Layanan</label>
                          <select class="form-control" id="service_type" name="service_type" required>
                              <option value="direct">Layanan Langsung</option>
                              <option value="remote">Layanan Remote</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="image_url" class="form-label">Gambar</label>
                          <input type="file" class="form-control" id="image_url" name="image_url">
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

  <!-- Modal Edit Jasa -->
  <div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('services.update', ['service' => ':id']) }}" method="POST" enctype="multipart/form-data" id="editServiceForm">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editServiceModalLabel">Edit Jasa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Nama Jasa</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="editDescription" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editPrice" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="editPrice" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="editCategory" class="form-label">Kategori</label>
                        <select class="form-control" id="editCategory" name="category_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editServiceType" class="form-label">Tipe Layanan</label>
                        <select class="form-control" id="editServiceType" name="service_type" required>
                            <option value="direct">Layanan Langsung</option>
                            <option value="remote">Layanan Remote</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editImage" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="editImage" name="image_url">
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
        // Ambil modal dan form edit
        var editModal = new bootstrap.Modal(document.getElementById('editServiceModal'));
        var editForm = document.getElementById('editServiceForm');

        // Event listener untuk tombol edit
        const editButtons = document.querySelectorAll('[data-bs-toggle="modal"][data-bs-target="#editServiceModal"]');
        
        editButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                // Ambil data dari tombol yang diklik
                var serviceId = this.getAttribute('data-id');
                var serviceName = this.getAttribute('data-name');
                var serviceDescription = this.getAttribute('data-description');
                var servicePrice = this.getAttribute('data-price');
                var serviceCategory = this.getAttribute('data-category');
                var serviceType = this.getAttribute('data-service-type');
                var serviceImage = this.getAttribute('data-image');

                // Set data ke dalam modal
                document.getElementById('editName').value = serviceName;
                document.getElementById('editDescription').value = serviceDescription;
                document.getElementById('editPrice').value = servicePrice;
                document.getElementById('editCategory').value = serviceCategory;
                document.getElementById('editServiceType').value = serviceType;
                document.getElementById('editImage').value = '';

                // Ganti action form untuk submit
                editForm.action = '/services/' + serviceId;
                
                // Tampilkan modal
                editModal.show();
            });
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
