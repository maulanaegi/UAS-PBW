@extends('layouts.main')

@section('container')
  <!-- Header Start -->
  <div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Profile</h1>
    </div>
  </div>
  <!-- Header End -->


  <div class="container mt-5">
    <div class="row">
        <!-- Profil User -->
        <div class="col-md-8">
					<div class="card">
							<div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: #0077b6;">
							</div>
							<div class="card-body">
									<div class="row">
											<div class="col-md-4 text-center">
													@if ($user->profile_picture)
														<div class="" style="max-height: 350px; overflow: hidden;">
															<img src="{{ asset('storage/'. $user->profile_picture) }}" class="img-fluid rounded-circle mb-3" width="150" height="150" alt="...">
														</div>
													@else
														<img src="https://via.placeholder.com/150" alt="Foto Profil" class="img-fluid rounded-circle mb-3">
													@endif
											</div>
											<div class="col-md-8">
													<h6>Nama: {{ $user->name }}</h6>
													<p>Username: {{ $user->username }}</p>
													<p>Alamat: {{ $user->location_city }}, {{ $user->location_state }}</p>
													<p>Status: {{ $user->status }}</p>
													<p>Nomor WhatsApp: {{ $user->whatsapp_number }}</p>
													<p><strong>Email:</strong> {{ $user->email }}</p>
													<p><strong>Deskripsi:</strong> {{ $user->profile_description }}</p>
											</div>
									</div>
							</div>
					</div>
				</div>

        <!-- Tombol Ubah Role -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" style="background-color: #0077b6;">
                    <h5 class="text-white">Ingin Menjadi Penyedia Jasa?</h5>
                </div>
                <div class="card-body text-center">
                    <p>Dengan mengubah peran, Anda dapat menawarkan jasa kepada orang lain.</p>
                    <form action="/change-role/{{ $user->id }}" method="post" id="change-role-form">
                      @csrf
                      <button type="submit" class="btn" style="background-color: #0077b6; color: white;" id="change-role-btn">Ubah ke Penyedia Jasa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Tambahan -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #0077b6;">
                    <h5 class="text-white">Menu Navigasi</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <!-- Menu Detail -->
                        <button type="button" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#editProfileModal">
													<i class="fas fa-user-edit"></i> Edit Profil
												</button>
                        {{-- <a href="/services/favorites" class="list-group-item list-group-item-action">
                            <i class="fas fa-heart"></i> Jasa Favorit
                        </a> --}}
                        <a href="{{ route('transactions.userHistory') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-history"></i> Riwayat Transaksi
                        </a>
                        <form action="/logout" method="post" id="logout-form">
                          @csrf
                          <button type="submit" class="list-group-item list-group-item-action text-danger" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

	<!-- Modal Update Profil -->
	<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
								<h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
								<form action="{{ route('user-profile.update', ['username' => $user->username]) }}" method="POST" enctype="multipart/form-data" id="editProfileForm">
										@csrf
										@method('PUT')

										<!-- Nama -->
										<div class="mb-3">
												<label for="name" class="form-label">Nama</label>
												<input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
										</div>

										<!-- Username -->
										<div class="mb-3">
												<label for="username" class="form-label">Username</label>
												<input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
										</div>

										<!-- Nomor WhatsApp -->
										<div class="mb-3">
												<label for="whatsapp_number" class="form-label">Nomor WhatsApp</label>
												<input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" value="{{ $user->whatsapp_number }}" maxlength="15">
										</div>

										<!-- Deskripsi -->
										<div class="mb-3">
												<label for="profile_description" class="form-label">Deskripsi</label>
												<textarea class="form-control" id="profile_description" name="profile_description">{{ $user->profile_description }}</textarea>
										</div>

										<!-- Foto Profil -->
										<div class="mb-3">
												<label for="profile_picture" class="form-label">Foto Profil</label>
												<input type="file" class="form-control" id="profile_picture" name="profile_picture">
										</div>

										<!-- Lokasi -->
										<div class="mb-3">
												<label for="location_input" class="form-label">Lokasi (Alamat Lengkap)</label>
												<input type="text" class="form-control" id="location_input" placeholder="Masukkan alamat lengkap" value="{{ $user->profile_description }}">
										</div>

										<!-- Kota -->
										<div class="mb-3">
												<label for="location_city" class="form-label">Kota</label>
												<input type="text" class="form-control" id="location_city" name="location_city" value="{{ $user->location_city }}">
										</div>

										<!-- Provinsi -->
										<div class="mb-3">
												<label for="location_state" class="form-label">Provinsi</label>
												<input type="text" class="form-control" id="location_state" name="location_state" value="{{ $user->location_state }}">
										</div>

										<!-- Latitude dan Longitude -->
										<input type="hidden" id="latitude" name="latitude" value="{{ $user->location_lat }}">
										<input type="hidden" id="longitude" name="longitude" value="{{ $user->location_lng }}">

										<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
								</form>
						</div>
				</div>
		</div>
	</div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      function confirmChangeRole(userId) {
          Swal.fire({
              title: 'Apakah Anda yakin?',
              text: "Role akan diubah!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, ubah!'
          }).then((result) => {
              if (result.isConfirmed) {
                  // Submit form
                  document.getElementById(`change-role-form-${userId}`).submit();
              }
          });
      }
  </script>
  
@endsection