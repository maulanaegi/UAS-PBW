@extends('admin.layouts.main')

@section('container')
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Manajemen Transaksi</h3>
            </div>
        </div>

        <!-- Filter -->
        <div class="row mb-4">
            <form method="GET" action="{{ route('admin.transactions.index') }}" class="d-flex">
                <div class="col-md-3">
                    <select class="form-select" name="status">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary ms-3">Filter</button>
            </form>
        </div>

        <!-- Tabel Transaksi -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Pengguna</th>
                                        <th>Penyedia</th>
                                        <th>Layanan</th>
                                        <th>Status</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->id }}</td>
                                            <td>{{ $transaction->user->name }}</td>
                                            <td>{{ $transaction->provider->name }}</td>
                                            <td>{{ $transaction->service->name }}</td>
                                            <td>
                                                <span class="badge bg-{{ $transaction->status === 'completed' ? 'success' : ($transaction->status === 'canceled' ? 'danger' : 'warning') }}">
                                                    {{ ucfirst($transaction->status) }}
                                                </span>
                                            </td>
                                            <td>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#transactionDetailModal"
                                                        data-id="{{ $transaction->id }}">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button
                                                        class="btn btn-link btn-warning btn-lg"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#resolveTransactionModal"
                                                        data-id="{{ $transaction->id }}"
                                                        data-status="{{ $transaction->status }}">
                                                        <i class="fa fa-cogs"></i>
                                                    </button>
																										<a href="{{ route('export.transaction', $transaction->id) }}" target="_blank" class="btn btn-link btn-danger btn-lg" title="Export PDF">
																											<i class="fas fa-file-pdf"></i>
																										</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada transaksi.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Transaksi -->
<div class="modal fade" id="transactionDetailModal" tabindex="-1" aria-labelledby="transactionDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transactionDetailModalLabel">Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="transactionDetailContent">Memuat...</div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Resolusi Masalah -->
<div class="modal fade" id="resolveTransactionModal" tabindex="-1" aria-labelledby="resolveTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="resolveTransactionForm" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="resolveTransactionModalLabel">Resolusi Masalah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                            <option value="canceled">Canceled</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="resolution_note" class="form-label">Catatan Resolusi</label>
                        <textarea class="form-control" id="resolution_note" name="resolution_note" rows="3"></textarea>
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
        // Load transaction details into modal
        const detailModal = document.getElementById('transactionDetailModal');
        detailModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const transactionId = button.getAttribute('data-id');
            fetch(`/admin/transactions/${transactionId}`)
                .then(response => response.json())
                .then(data => {
                    const content = `
                        <p><strong>ID Transaksi:</strong> ${data.id}</p>
                        <p><strong>Pengguna:</strong> ${data.user.name}</p>
                        <p><strong>Penyedia:</strong> ${data.provider.name}</p>
                        <p><strong>Layanan:</strong> ${data.service.name}</p>
                        <p><strong>Total Harga:</strong> Rp ${new Intl.NumberFormat().format(data.total_price)}</p>
                        <p><strong>Status:</strong> ${data.status}</p>
                        <p><strong>Catatan Resolusi:</strong> ${data.resolution_note || 'Tidak ada'}</p>
                    `;
                    document.getElementById('transactionDetailContent').innerHTML = content;
                });
        });

        // Set resolve form action
        const resolveModal = document.getElementById('resolveTransactionModal');
        resolveModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const transactionId = button.getAttribute('data-id');
            const status = button.getAttribute('data-status');
            const form = document.getElementById('resolveTransactionForm');

            form.action = `/admin/transactions/${transactionId}/resolve`;
            document.getElementById('status').value = status;
        });
    });
</script>
@endsection
