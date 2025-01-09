@extends('layouts.main')

@section('container')
  <!-- Header Start -->
  <div class="container py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Service Detail</h1>
    </div>
  </div>
  <!-- Header End -->


  <!-- Job Detail Start -->
  <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gy-5 gx-4">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-5">
										<i class="fa fa-3x fa-code" style="color: #0077b6; margin-bottom: 1.5rem;"></i>
                    <div class="text-start ps-4">
                        <h3 class="mb-3">{{ $service->name }}</h3>
                        <span class="text-truncate me-3"><i class="far fa-user me-2" style="color: #0077b6;"></i><a href="{{ route('user-profile', ['username' => $service->user->username]) }}" style="color: #0077b6;">
													{{ $service->user->name }}
													</a></span>
                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt me-2" style="color: #0077b6;"></i>{{ $service->user->location_city }}, {{ $service->user->location_state }}</span>
												<a href="{{ route('services.category', $service->category->slug) }}" style="color: #0077b6;">
													<span class="text-truncate me-3"><i class="fa fa-tags me-2" style="color: #0077b6;"></i>{{ $service->category->name }}</span>
												</a>
                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt me-2" style="color: #0077b6;"></i>>= Rp.{{ $service->price }}</span>
                    </div>
                </div>

                <div class="mb-5">
                    <h4 class="mb-3">Service description</h4>
                    <p>{{ $service->description }}</p>
                </div>

								{{-- Review --}}
								<div class="card my-4">
									<div class="card-header" style="background-color: #0077b6;">
											<h5 class="mb-0 text-white">Rating & Ulasan</h5>
									</div>
									<div class="card-body">
											<div class="d-flex align-items-center mb-3">
													<h4 class="text-warning mb-0 me-2">
															<i class="fa fa-star"></i> {{ $averageRating }}/5
													</h4>
													<span class="text-muted">({{ $reviews->total() }} ulasan)</span>
											</div>
							
											<h6>Ulasan Terbaru:</h6>
											<ul class="list-group list-group-flush">
													@forelse($reviews as $review)
															<li class="list-group-item">
																	<strong>{{ $review->user->name }}:</strong>
																	<p class="mb-0 text-muted">"{{ $review->comment }}"</p>
																	<small class="text-warning">
																			{!! str_repeat('<i class="fa fa-star"></i>', $review->rating) !!}
																			{!! str_repeat('<i class="fa fa-star text-muted"></i>', 5 - $review->rating) !!}
																	</small>
																	@if(auth()->check() && auth()->id() === $review->user_id)
																			<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editReviewModal" 
																							data-id="{{ $review->id }}" data-rating="{{ $review->rating }}" data-comment="{{ $review->comment }}">
																							Edit
																			</button>
																			<form action="{{ route('reviews.destroy', $review) }}" method="POST" class="d-inline">
																					@csrf
																					@method('DELETE')
																					<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
																			</form>
																	@endif
															</li>
													@empty
															<li class="list-group-item text-center text-muted">Belum ada ulasan.</li>
													@endforelse
											</ul>
											<!-- Pagination -->
											<div class="mt-3">
													{{ $reviews->links('pagination::custom') }}
											</div>
									</div>
									<div class="card-footer text-center">
											<button class="btn text-white" style="background-color: #0077b6;" data-bs-toggle="modal" data-bs-target="#addReviewModal">Tulis Ulasan</button>
									</div>
								</div>			

								{{-- Potofolio --}}
								<div class="row mt-4">
									<div class="col-md-12">
											<div class="card">
												<div class="card-header" style="background-color: #0077b6;">
															<h5 class="text-white">Portofolio Terkait</h5>
													</div>
													<div class="card-body">
															<div class="row">
																	@forelse ($portfolios as $portfolio)
																			<div class="col-md-4">
																					@if ($portfolio->image_url)
																							<img src="{{ asset('storage/' . $portfolio->image_url) }}" class="img-fluid mb-3" alt="Portofolio Image">
																					@else
																							<img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Gambar tidak tersedia">
																					@endif
																					<h6 class="mt-3">{{ $portfolio->title }}</h6>
																					<p>{{ $portfolio->description }}</p>
																			</div>
																	@empty
																			<p class="text-muted">Belum ada portofolio terkait.</p>
																	@endforelse
															</div>
															<!-- Pagination -->
															<div class="mt-3">
																	{{ $portfolios->links('pagination::custom') }}
															</div>
													</div>
											</div>
									</div>
								</div>
							
            </div>

            <div class="col-lg-4">
                <div class="rounded wow slideInUp" data-wow-delay="0.1s">
									<div>						

                    <div class="card my-4">
											<div class="card-header" style="background-color: #0077b6;">
													<h5 class="mb-0 text-white">Transaksi</h5>
											</div>
											<div class="card-body text-center">
													<button class="btn text-white" style="background-color: #0077b6;" data-bs-toggle="modal" data-bs-target="#transactionModal">Pesan Layanan</button>
									
													<!-- Penjelasan Proses Transaksi -->
													<div class="mt-4">
															<h6>Proses Transaksi:</h6>
															<ul class="list-unstyled">
																	<li><i class="fa fa-check-circle me-2" style="color: #0077b6;"></i>Pilih layanan yang sesuai dengan kebutuhan Anda.</li>
																	<li><i class="fa fa-check-circle me-2" style="color: #0077b6;"></i>Isi detail transaksi, termasuk tanggal, lokasi, dan informasi lainnya.</li>
																	<li><i class="fa fa-check-circle me-2" style="color: #0077b6;"></i>Konfirmasi dan kirimkan pesanan Anda kepada penyedia jasa.</li>
																	<li><i class="fa fa-check-circle me-2" style="color: #0077b6;"></i>Penyedia jasa akan mengonfirmasi dan melanjutkan transaksi sesuai dengan detail yang Anda berikan.</li>
																	<li><i class="fa fa-check-circle me-2" style="color: #0077b6;"></i>Mulai bekerja sama dengan penyedia jasa untuk menyelesaikan proyek Anda!</li>
															</ul>
													</div>
											</div>
										</div>									
									
									</div>
                </div>
            </div>
        </div>
    </div>
  </div>

	{{-- Modal tambah ulasan --}}
	<div class="modal fade" id="addReviewModal" tabindex="-1" aria-labelledby="addReviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addReviewModalLabel">Tambah Ulasan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select name="rating" id="rating" class="form-control" required>
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Komentar</label>
                        <textarea name="comment" id="comment" class="form-control"></textarea>
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

	{{-- Modal edit ulasan --}}
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
                        <label for="editRating" class="form-label">Rating</label>
                        <select name="rating" id="editRating" class="form-control" required>
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editComment" class="form-label">Komentar</label>
                        <textarea name="comment" id="editComment" class="form-control"></textarea>
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

  {{-- Transaksi Modal --}}
	<div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
		<div class="modal-dialog">
				<div class="modal-content">
						<form action="{{ route('transactions.store') }}" method="POST">
								@csrf
								<input type="hidden" name="service_id" value="{{ $service->id }}">

								<div class="modal-header">
										<h5 class="modal-title" id="transactionModalLabel">Pesan Jasa: {{ $service->name }}</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>

								<div class="modal-body">
										<div class="mb-3">
												<label for="custom_details" class="form-label">Detail Kebutuhan</label>
												<textarea name="custom_details" id="custom_details" class="form-control" rows="4" required 
														placeholder="Jelaskan kebutuhan Anda secara detail..."></textarea>
										</div>

													<div class="mb-3">
														<label for="whatsapp_number" class="form-label">Nomor WhatsApp</label>
														<input type="text" name="whatsapp_number" id="whatsapp_number" class="form-control" placeholder="Masukkan Nomor WhatsApp Anda" required>
												</div>

													<div class="mb-3">
														<label for="email" class="form-label">Email</label>
														<input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email Anda" required>
												</div>

										@if ($service->service_type === 'direct')
												<div class="mb-3">
														<label for="location" class="form-label">Lokasi</label>
														<input type="text" name="location" id="location" class="form-control" required
																placeholder="Masukkan lokasi pengerjaan">
												</div>
												<div class="mb-3">
														<label for="start_date" class="form-label">Tanggal Mulai</label>
														<input type="date" name="start_date" id="start_date" class="form-control" required>
												</div>
										@else
												<div class="mb-3">
														<label for="deadline" class="form-label">Tenggat Waktu</label>
														<input type="date" name="deadline" id="deadline" class="form-control" required>
												</div>
										@endif
												<div class="mb-3">
													<label for="budget" class="form-label">Budget</label>
													<input type="number" name="budget" id="budget" class="form-control" step="0.01" 
															placeholder="Masukkan budget Anda (opsional)">
												</div>
							</div>

								<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
										<button type="submit" class="btn btn-primary">Pesan</button>
								</div>
						</form>
				</div>
		</div>
	</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle modal for editing review
        const editButtons = document.querySelectorAll('[data-bs-toggle="modal"][data-bs-target="#editReviewModal"]');
        const editForm = document.getElementById('editReviewForm');

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const reviewId = this.getAttribute('data-id');
                const rating = this.getAttribute('data-rating');
                const comment = this.getAttribute('data-comment');

                document.getElementById('editRating').value = rating;
                document.getElementById('editComment').value = comment;
                editForm.action = `/reviews/${reviewId}`;
            });
        });

        // SweetAlert for delete confirmation
        const deleteForms = document.querySelectorAll('form[action*="reviews"]');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                const methodInput = form.querySelector('input[name="_method"]');

                // Pastikan hanya form dengan method DELETE yang memunculkan SweetAlert
                if (methodInput && methodInput.value === "DELETE") {
                    event.preventDefault();

                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: 'Ulasan ini akan dihapus secara permanen!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                }
            });
        });
    });
</script>




  <!-- Job Detail End -->
@endsection