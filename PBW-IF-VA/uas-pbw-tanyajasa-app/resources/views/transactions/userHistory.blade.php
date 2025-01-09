@extends('layouts.main')

@section('container')
<!-- Header Start -->
<div class="container py-5 bg-dark page-header mb-5">
	<div class="container my-5 pt-5 pb-4">
			<h1 class="display-3 text-white mb-3 animated slideInDown">{{ $title }}</h1>
	</div>
</div>
<!-- Header End -->

<div class="container py-5">
    <div class="card">
        <div class="card-header"  style="background-color: #0077b6;">
            <h5 class="text-white">Daftar Transaksi</h5>
        </div>
        <div class="card-body">
            <table id="transactions-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Layanan</th>
                        <th>Penyedia Jasa</th>
                        <th>Status</th>
                        <th>Status Pembayaran</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaction->service->name }}</td>
                            <td>{{ $transaction->provider->name }}</td>
                            <td>
															@php
																	// Mapping status dari bahasa Inggris ke bahasa Indonesia
																	$statusMapping = [
																			'completed' => 'Selesai',
																			'pending' => 'Menunggu',
																			'in_progress' => 'Diproses',
																			'canceled' => 'Dibatalkan',
																	];
													
																	// Default status jika tidak ada di mapping
																	$statusIndo = $statusMapping[$transaction->status] ?? ucfirst($transaction->status);
															@endphp
															<span class="badge bg-{{ 
																					$transaction->status === 'completed' ? 'success' : 
																					($transaction->status === 'pending' ? 'warning' : 
																					($transaction->status === 'canceled' ? 'danger' : 
																					($transaction->status === 'in_progress' ? 'secondary' : 'secondary'))) }}">
																	{{ $statusIndo }}
															</span>
														</td>
                            <td>
                              @if ($transaction->payment_status === 'pending')
																	<span class="badge bg-warning">Menunggu Pembayaran</span>
															@elseif ($transaction->payment_status === 'paid')
																	<span class="badge bg-success">Dibayar</span>
															@else
																	<span class="badge bg-danger">Dibatalkan</span>
															@endif
                            </td>
                            <td>
															Rp {{ number_format($transaction->total_price, 2, ',', '.') }}
														</td>
                            <td>
															{{ $transaction->created_at->format('d M Y') }}
														</td>
                            <td>
															@if ($transaction->status === 'in_progress') 
																	<button 
																			class="btn btn-warning btn-sm"
																			data-bs-toggle="modal" 
																			data-bs-target="#changeStatusModal"
																			data-id="{{ $transaction->id }}"
																			data-status="completed">
																			Ubah Status
																	</button>
															@endif
													
															@if ($transaction->status === 'pending')
																	<form action="{{ route('transactions.cancel', $transaction) }}" method="POST" class="d-inline">
																			@csrf
																			<button type="submit" class="btn btn-warning btn-sm">Batalkan</button>
																	</form>
															@endif
													
															@if ($transaction->status === 'in_progress' && $transaction->payment_status === 'pending')
																	<a href="{{ route('transactions.pay', $transaction) }}" class="btn btn-success btn-sm">Bayar</a>
															@endif
													
															<button 
																	class="btn btn-info btn-sm" 
																	data-bs-toggle="modal" 
																	data-bs-target="#transactionDetailModal"
																	data-user="{{ $transaction->user->name }}"
																	data-service="{{ $transaction->service->name }}"
																	data-provider="{{ $transaction->provider->name }}"
																	data-status="{{ ucfirst($transaction->status) }}"
																	data-details="{{ $transaction->custom_details }}"
																	data-wa="{{ $transaction->whatsapp_number }}"
																	data-email="{{ $transaction->email }}"
																	data-location="{{ $transaction->location ?? '-' }}"
																	data-budget="Rp {{ number_format($transaction->budget ?? $transaction->total_price, 2, ',', '.') }}"
																	data-start_date="{{ $transaction->start_date ? $transaction->start_date->format('d M Y') : '-' }}"
																	data-deadline="{{ $transaction->deadline ? $transaction->deadline->format('d M Y') : '-' }}"
																	data-price="Rp {{ number_format($transaction->total_price, 2, ',', '.') }}"
																	data-date="{{ $transaction->created_at->format('d M Y') }}">
																	Lihat Detail
															</button>
													
															@if ($transaction->status === 'completed')
																	<a href="{{ route('export.transaction', $transaction->id) }}" target="_blank" class="btn btn-primary btn-sm">
																			<i class="fas fa-file-pdf"></i> Export PDF
																	</a>
															@endif
														</td>																								
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Ganti Status -->
<div class="modal fade" id="changeStatusModal" tabindex="-1" aria-labelledby="changeStatusModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="changeStatusModalLabel">Ganti Status</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="changeStatusForm">
					@csrf
					<input type="hidden" id="transactionId">
					<div class="mb-3">
						<label for="statusSelect" class="form-label">Pilih Status</label>
						<select id="statusSelect" class="form-select">
							<option value="completed">Selesai</option>
							<option value="canceled">Batal</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary w-100">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>


<!-- Modal Detail Transaksi -->
<div class="modal fade" id="transactionDetailModal" tabindex="-1" aria-labelledby="transactionDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transactionDetailModalLabel">Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <strong>Pembeli:</strong> <span id="modal-user-name"></span>
                </div>
                <div class="mb-3">
                    <strong>Penyedia Jasa:</strong> <span id="modal-provider-name"></span>
                </div>
                <div class="mb-3">
                    <strong>Layanan:</strong> <span id="modal-service-name"></span>
                </div>
                <div class="mb-3">
                    <strong>Status:</strong> <span id="modal-status" class="badge"></span>
                </div>
                <div class="mb-3">
                    <strong>Detail Pesanan:</strong>
                    <p id="modal-details" class="border p-3 rounded bg-light"></p>
                </div>
                <div id="direct-details" class="mb-3" style="display: none;">
                    <strong>Lokasi:</strong> <span id="modal-location"></span><br>
                    <strong>Tanggal Mulai:</strong> <span id="modal-start-date"></span><br>
                </div>
                <div id="remote-details" class="mb-3" style="display: none;">
                    <strong>Tenggat Waktu:</strong> <span id="modal-deadline"></span><br>
                </div>
                <div class="mb-3">
                    <strong>Budget:</strong> <span id="modal-budget"></span>
                </div>
                <div class="mb-3">
                    <strong>Total Harga:</strong> <span id="modal-price"></span>
                </div>
                <div class="mb-3">
                  <strong>Whatsapp:</strong> <span id="modal-wa"></span>
              </div>
              <div class="mb-3">
                  <strong>Email:</strong> <span id="modal-email"></span>
              </div>
                <div class="mb-3">
                    <strong>Tanggal:</strong> <span id="modal-date"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const table = new DataTable('#transactions-table');

        const transactionModal = document.getElementById('transactionDetailModal');
        transactionModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            document.getElementById('modal-user-name').textContent = button.getAttribute('data-user');
            document.getElementById('modal-provider-name').textContent = button.getAttribute('data-provider');
            document.getElementById('modal-service-name').textContent = button.getAttribute('data-service');
            document.getElementById('modal-details').textContent = button.getAttribute('data-details');
            document.getElementById('modal-wa').textContent = button.getAttribute('data-wa');
            document.getElementById('modal-email').textContent = button.getAttribute('data-email');
            document.getElementById('modal-location').textContent = button.getAttribute('data-location');
            document.getElementById('modal-start-date').textContent = button.getAttribute('data-start_date');
            document.getElementById('modal-deadline').textContent = button.getAttribute('data-deadline');
            document.getElementById('modal-budget').textContent = button.getAttribute('data-budget');
            document.getElementById('modal-price').textContent = button.getAttribute('data-price');
            document.getElementById('modal-date').textContent = button.getAttribute('data-date');

            const statusElement = document.getElementById('modal-status');
            const status = button.getAttribute('data-status');
            statusElement.textContent = status;
            statusElement.className = 'badge';

            if (status === 'Pending') {
                statusElement.classList.add('bg-warning');
            } else if (status === 'Completed') {
                statusElement.classList.add('bg-success');
            } else {
                statusElement.classList.add('bg-secondary');
            }

            // Tampilkan atau sembunyikan detail berdasarkan tipe layanan
            const isDirect = button.getAttribute('data-location') !== '-';
            document.getElementById('direct-details').style.display = isDirect ? 'block' : 'none';
            document.getElementById('remote-details').style.display = isDirect ? 'none' : 'block';
        });

				// Handle change status modal
        const changeStatusModal = document.getElementById('changeStatusModal');
        changeStatusModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const transactionId = button.getAttribute('data-id');
            const status = button.getAttribute('data-status');
            
            document.getElementById('transactionId').value = transactionId;
            document.getElementById('statusSelect').value = status;
        });

				// Handle status change form submission
        document.getElementById('changeStatusForm').addEventListener('submit', function (event) {
            event.preventDefault();
            const status = document.getElementById('statusSelect').value;
            const transactionId = document.getElementById('transactionId').value;

            fetch(`/transactions/${transactionId}/update-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire('Berhasil!', 'Status transaksi berhasil diubah.', 'success');
                    location.reload(); // Reload the page to reflect changes
                } else {
                    Swal.fire('Gagal!', 'Terjadi kesalahan saat mengubah status.', 'error');
                }
            })
            .catch(() => {
                Swal.fire('Error!', 'Terjadi kesalahan saat mengubah status.', 'error');
            });
        });
    });
</script>
@endsection
