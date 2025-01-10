@extends('admin.layouts.main')

@section('container')
  <div class="container">
    <div class="page-inner">
      <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
          <h3 class="fw-bold mb-3">Manajemen Pengguna</h3>
        </div>
      </div>

      <!-- Filter -->
      <div class="row mb-4">
        <form method="GET" action="{{ route('admin.users.index') }}" class="d-flex">
          <div class="col-md-3">
            <select class="form-select" name="role">
              <option value="">Pilih Peran</option>
              <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
              <option value="provider" {{ request('role') == 'provider' ? 'selected' : '' }}>Provider</option>
              <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
            </select>
          </div>
          <div class="col-md-3 mx-3">
            <select class="form-select" name="status">
              <option value="">Pilih Status</option>
              <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
              <option value="suspended" {{ request('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
              <option value="deleted" {{ request('status') == 'deleted' ? 'selected' : '' }}>Deleted</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Filter</button>
        </form>
      </div>

      <!-- Tabel Pengguna -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <h4 class="card-title">Daftar Pengguna</h4>
                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addUserModal">
                  <i class="fa fa-plus"></i>
                  Tambah Pengguna
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Peran</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($users as $user)
                      <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                          <span class="badge bg-{{ $user->role === 'admin' ? 'primary' : ($user->role === 'provider' ? 'info' : 'secondary') }}">
                            {{ ucfirst($user->role) }}
                          </span>
                        </td>
                        <td>
                          <span class="badge bg-{{ $user->status === 'active' ? 'success' : ($user->status === 'suspended' ? 'warning' : 'danger') }}">
                            {{ ucfirst($user->status) }}
                          </span>
                        </td>
                        <td>
                          <div class="form-button-action">
                            <button 
                              class="btn btn-link btn-warning btn-lg" 
                              data-bs-toggle="modal" 
                              data-bs-target="#editUserModal" 
                              data-id="{{ $user->id }}" 
                              data-name="{{ $user->name }}" 
                              data-username="{{ $user->username }}" 
                              data-email="{{ $user->email }}" 
                              data-role="{{ $user->role }}" 
                              data-status="{{ $user->status }}">
                              <i class="fa fa-edit"></i>
                            </button>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
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
                        <td colspan="6" class="text-center">Tidak ada data pengguna.</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- Pagination -->
              <div class="mt-3">
                {{ $users->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Pengguna -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('admin.users.store') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="addUserModalLabel">Tambah Pengguna</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
              <label for="role" class="form-label">Peran</label>
              <select class="form-select" id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="provider">Provider</option>
                <option value="user">User</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" id="status" name="status" required>
                <option value="active">Aktif</option>
                <option value="suspended">Suspended</option>
                <option value="deleted">Deleted</option>
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

  <!-- Modal Edit Pengguna -->
  <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="editUserForm" method="POST" >
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h5 class="modal-title" id="editUserModalLabel">Edit Pengguna</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="edit-name" class="form-label">Nama</label>
              <input type="text" class="form-control" id="edit-name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="edit-username" class="form-label">Username</label>
              <input type="text" class="form-control" id="edit-username" name="username" required>
            </div>
            <div class="mb-3">
              <label for="edit-email" class="form-label">Email</label>
              <input type="email" class="form-control" id="edit-email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="edit-role" class="form-label">Peran</label>
              <select class="form-select" id="edit-role" name="role" required>
                <option value="admin">Admin</option>
                <option value="provider">Provider</option>
                <option value="user">User</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="edit-status" class="form-label">Status</label>
              <select class="form-select" id="edit-status" name="status" required>
                <option value="active">Aktif</option>
                <option value="suspended">Suspended</option>
                <option value="deleted">Deleted</option>
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
      const editUserModal = document.getElementById('editUserModal');
      const editForm = document.getElementById('editUserForm');

      editUserModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const username = button.getAttribute('data-username');
        const email = button.getAttribute('data-email');
        const role = button.getAttribute('data-role');
        const status = button.getAttribute('data-status');

        editForm.action = `/admin/users/${id}`;
        document.getElementById('edit-name').value = name;
        document.getElementById('edit-username').value = username;
        document.getElementById('edit-email').value = email;
        document.getElementById('edit-role').value = role;
        document.getElementById('edit-status').value = status;
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
