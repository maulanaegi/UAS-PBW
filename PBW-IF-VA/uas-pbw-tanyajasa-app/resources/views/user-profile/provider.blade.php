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
		<!-- Notifikasi -->
		@if (session('alert'))
				<div class="alert alert-{{ session('alert.icon') }} alert-dismissible fade show" role="alert">
						<strong>{{ session('alert.title') }}</strong> {{ session('alert.text') }}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
		@endif

		{{-- <!-- Jika menggunakan notifikasi berbasis database -->
		@if(auth()->user()->unreadNotifications->isNotEmpty())
				<div class="alert alert-info" id="notification-alert">
						<h5>Notifikasi Baru:</h5>
						<ul>
								@foreach (auth()->user()->unreadNotifications as $notification)
										<li>
												{{ $notification->data['message'] }}
												<!-- Tautan untuk melihat transaksi -->
												<a href="{{ route('transactions.history') }}" class="view-notification" data-notification-id="{{ $notification->id }}">Lihat</a>
										</li>
								@endforeach
						</ul>
				</div>
		@endif --}}
		
    <div class="row">
        <!-- Profil Penyedia Jasa -->
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

				@if($isOwner)
        <!-- Navigasi Tambahan -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-white" style="background-color: #0077b6;">
                    <h5 style="color: white">Menu Navigasi</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
														<button type="button" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#editProfileModal">
															<i class="fas fa-user-edit"></i> Edit Profil
														</button>
                            <a href="{{ route('services.manage') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-briefcase"></i> Kelola Jasa
                            </a>
                            <a href="{{ route('transactions.history') }}" class="list-group-item list-group-item-action">
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
				@endif
    </div>

    <!-- Jasa yang Ditawarkan -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white" style="background-color: #0077b6;">
                    <h5 style="color: white">Jasa yang Ditawarkan</h5>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($services as $service)
                            <li><a href="/services/{{ $service->slug }}" style="color: #0077b6;">{{ $service->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
								<div class="p-2">
									{{ $services->links('pagination::custom') }}
								</div>
								
            </div>
        </div>
    </div>

    <!-- Portofolio -->
		<div class="row mt-4">
			<div class="col-md-12">
					<div class="card">
							<div class="card-header text-white" style="background-color: #0077b6;">
									<h5 style="color: white">Portofolio</h5>
							</div>
							<div class="card-body">
								@if($isOwner)
										<button class="btn mb-3" style="background-color: #0077b6; color: white;" data-bs-toggle="modal" data-bs-target="#addPortofolioModal">Tambah Portofolio</button>
								@endif
								<div class="row">
									@foreach ($portofolios as $portofolio)
											<div class="col-md-6 col-lg-4 mb-4">
													<div class="card shadow-sm h-100">
															@if ($portofolio->image_url)
																	<img src="{{ asset('storage/' . $portofolio->image_url) }}" class="card-img-top" alt="{{ $portofolio->title }}">
															@else
																	<img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Gambar tidak tersedia">
															@endif
															<div class="card-body">
																	<h5 class="card-title">{{ $portofolio->title }}</h5>
																	<p class="card-text"><small class="text-muted">Layanan: {{ $portofolio->service->name }}</small></p>
																	<p class="card-text">{{ $portofolio->description }}</p>
															</div>
															@if ($isOwner)
																	<div class="card-footer d-flex justify-content-between">
																			<button 
																					class="btn btn-warning btn-sm" 
																					data-bs-toggle="modal" 
																					data-bs-target="#editPortofolioModal"
																					data-id="{{ $portofolio->id }}"
																					data-title="{{ $portofolio->title }}"
																					data-description="{{ $portofolio->description }}"
																					data-service="{{ $portofolio->service_id }}"
																					data-image="{{ asset('storage/' . $portofolio->image_url) }}">
																					Edit
																			</button>
																			<form action="{{ route('portofolios.destroy', $portofolio) }}" method="POST" class="d-inline">
																					@csrf
																					@method('DELETE')
																					<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
																			</form>
																	</div>
															@endif
													</div>
											</div>
									@endforeach
								</div>
							</div>
							<div class="p-2">
								{{ $portofolios->links('pagination::custom') }}
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


	<!-- Modal Tambah Portofolio -->
	<div class="modal fade" id="addPortofolioModal" tabindex="-1" aria-labelledby="addPortofolioModalLabel" aria-hidden="true">
		<div class="modal-dialog">
				<div class="modal-content">
						<form action="{{ route('portofolios.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="modal-header">
										<h5 class="modal-title" id="addPortofolioModalLabel">Tambah Portofolio</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
										<div class="mb-3">
												<label for="title" class="form-label">Judul Portofolio</label>
												<input type="text" class="form-control" id="title" name="title" required>
										</div>
										<div class="mb-3">
												<label for="description" class="form-label">Deskripsi</label>
												<textarea class="form-control" id="description" name="description" required></textarea>
										</div>
										<div class="mb-3">
												<label for="service_id" class="form-label">Layanan</label>
												<select class="form-control" id="service_id" name="service_id" required>
														@foreach ($user->services as $service)
																<option value="{{ $service->id }}">{{ $service->name }}</option>
														@endforeach
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

	<!-- Modal Edit Portofolio -->
	<div class="modal fade" id="editPortofolioModal" tabindex="-1" aria-labelledby="editPortofolioModalLabel" aria-hidden="true">
		<div class="modal-dialog">
				<div class="modal-content">
						<form action="{{ route('portofolios.update', ':id') }}" method="POST" enctype="multipart/form-data" id="editPortofolioForm">
								@csrf
								@method('PUT')
								<div class="modal-header">
										<h5 class="modal-title" id="editPortofolioModalLabel">Edit Portofolio</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
										<div class="mb-3">
												<label for="editTitle" class="form-label">Judul Portofolio</label>
												<input type="text" class="form-control" id="editTitle" name="title" required>
										</div>
										<div class="mb-3">
												<label for="editDescription" class="form-label">Deskripsi</label>
												<textarea class="form-control" id="editDescription" name="description" required></textarea>
										</div>
										<div class="mb-3">
												<label for="editService" class="form-label">Layanan</label>
												<select class="form-control" id="editService" name="service_id" required>
														@foreach ($user->services as $service)
																<option value="{{ $service->id }}">{{ $service->name }}</option>
														@endforeach
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
        // **1. Edit Profil**
        const editProfileForm = document.getElementById('editProfileForm');
        if (editProfileForm) {
            editProfileForm.addEventListener('submit', function (event) {
                event.preventDefault(); // Mencegah form dikirim langsung

                Swal.fire({
                    title: 'Yakin ingin menyimpan perubahan?',
                    text: 'Profil Anda akan diperbarui!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Simpan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        editProfileForm.submit(); // Kirim form hanya setelah konfirmasi
                    }
                });
            });
        }

        // **2. Edit Portofolio**
        const editButtons = document.querySelectorAll('[data-bs-toggle="modal"][data-bs-target="#editPortofolioModal"]');
        const editPortofolioForm = document.getElementById('editPortofolioForm');
        const editPortofolioModal = new bootstrap.Modal(document.getElementById('editPortofolioModal'));

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Ambil data portofolio dari tombol
                const portofolioId = this.getAttribute('data-id');
                const portofolioTitle = this.getAttribute('data-title');
                const portofolioDescription = this.getAttribute('data-description');
                const portofolioService = this.getAttribute('data-service');

                // Set data ke modal
                document.getElementById('editTitle').value = portofolioTitle;
                document.getElementById('editDescription').value = portofolioDescription;
                document.getElementById('editService').value = portofolioService;

                // Reset input file
                document.getElementById('editImage').value = '';

                // Ganti action form untuk submit
                editPortofolioForm.action = '/portofolios/' + portofolioId;

                // Tampilkan modal
                editPortofolioModal.show();
            });
        });

        // Reset modal saat ditutup
        document.getElementById('editPortofolioModal').addEventListener('hidden.bs.modal', function () {
            editPortofolioForm.reset();
            editPortofolioForm.action = ''; // Reset action form
        });

        // **3. Konfirmasi Hapus Portofolio**
			const deleteForms = document.querySelectorAll('form[action*="portofolios"]');
			deleteForms.forEach(form => {
					form.addEventListener('submit', function (event) {
							const methodInput = form.querySelector('input[name="_method"]');
							if (methodInput && methodInput.value === "DELETE") {
									event.preventDefault(); // Mencegah form langsung dikirim

									Swal.fire({
											title: 'Yakin ingin menghapus?',
											text: 'Portofolio ini akan dihapus secara permanen!',
											icon: 'warning',
											showCancelButton: true,
											confirmButtonText: 'Ya, Hapus!',
											cancelButtonText: 'Batal'
									}).then((result) => {
											if (result.isConfirmed) {
													form.submit(); // Kirim form hanya jika konfirmasi diterima
											}
									});
							}
					});
			});

    });
	</script>

<script>
	document.addEventListener('DOMContentLoaded', function () {
			// Mendapatkan elemen alert utama
			const notificationAlert = document.getElementById('notification-alert');

			// 1. Menyembunyikan notifikasi saat klik "Lihat"
			const notificationLinks = document.querySelectorAll('.view-notification');

			notificationLinks.forEach(link => {
					link.addEventListener('click', function (e) {
							e.preventDefault(); // Mencegah aksi default (misalnya navigasi)

							// Mendapatkan elemen item notifikasi
							const notificationItem = this.closest('li');

							if (notificationItem) {
									// Sembunyikan item notifikasi
									notificationItem.style.display = 'none';

									// Simpan ID notifikasi yang disembunyikan ke sessionStorage
									let hiddenNotifications = JSON.parse(sessionStorage.getItem('hiddenNotifications')) || [];
									const hiddenNotificationId = this.getAttribute('data-notification-id');
									if (!hiddenNotifications.includes(hiddenNotificationId)) {
											hiddenNotifications.push(hiddenNotificationId);
											sessionStorage.setItem('hiddenNotifications', JSON.stringify(hiddenNotifications));
									}
							}

							// Periksa apakah semua notifikasi telah disembunyikan
							const remainingNotifications = notificationAlert.querySelectorAll('li:not([style="display: none;"])');
							if (remainingNotifications.length === 0 && notificationAlert) {
									notificationAlert.style.display = 'none'; // Sembunyikan alert utama
									sessionStorage.setItem('notificationAlertHidden', 'true');
							}

							// Navigasi ke halaman transaksi
							window.location.href = this.getAttribute('href');
					});
			});

			// 2. Memeriksa dan menyembunyikan notifikasi yang sudah disembunyikan pada refresh halaman
			const hiddenNotifications = JSON.parse(sessionStorage.getItem('hiddenNotifications')) || [];
			notificationLinks.forEach(link => {
					const notificationId = link.getAttribute('data-notification-id');
					if (hiddenNotifications.includes(notificationId)) {
							const notificationItem = link.closest('li');
							if (notificationItem) {
									notificationItem.style.display = 'none'; // Sembunyikan item notifikasi
							}
					}
			});

			// 3. Memastikan alert utama tetap tampil jika ada notifikasi baru
			if (notificationAlert) {
					const remainingNotifications = notificationAlert.querySelectorAll('li:not([style="display: none;"])');
					if (remainingNotifications.length === 0) {
							notificationAlert.style.display = 'none'; // Sembunyikan alert jika tidak ada notifikasi
					} else {
							sessionStorage.removeItem('notificationAlertHidden'); // Bersihkan status jika ada notifikasi baru
					}
			}
	});
</script>





	

@endsection
