<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - {{ $transaction->order_id }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background-color: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .invoice-header {
            background-color: #2c3e50;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .invoice-header h1 {
            margin: 0;
            font-size: 28px;
        }
        .invoice-header p {
            margin: 5px 0;
        }
        .content {
            padding: 20px;
        }
        h3 {
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 8px;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .table th {
            background-color: #f8f9fa;
            color: #555;
        }
        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .badge {
            display: inline-block;
            padding: 5px 12px;
            color: #fff;
            border-radius: 5px;
            font-size: 14px;
        }
        .badge.bg-warning { background-color: #f39c12; }
        .badge.bg-success { background-color: #28a745; }
        .badge.bg-danger { background-color: #dc3545; }
        .badge.bg-info { background-color: #17a2b8; } /* Warna untuk status in_progress */
        .invoice-footer {
            background-color: #2c3e50;
            color: #fff;
            text-align: center;
            padding: 15px;
            font-size: 14px;
        }
        .invoice-footer p {
            margin: 5px 0;
        }
        .total-section {
            font-weight: bold;
            background-color: #2c3e50;
            color: #fff;
        }
        .highlight {
            color: #2c3e50;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="invoice-header">
            <h1><i class="fas fa-file-invoice"></i> Invoice Transaksi</h1>
            <p><strong>Nomor Invoice:</strong> {{ $transaction->order_id }}</p>
            <p><strong>Tanggal Transaksi:</strong> {{ $transaction->created_at->format('d M Y') }}</p>
        </div>

        <div class="content">
            <h3><i class="fas fa-info-circle"></i> Detail Transaksi</h3>
            <table class="table">
                <tr>
                    <th>Nama User</th>
                    <td>{{ $transaction->user->name }}</td>
                </tr>
                <tr>
                    <th>Nama Provider</th>
                    <td>{{ $transaction->provider->name }}</td>
                </tr>
                <tr>
                    <th>Layanan</th>
                    <td>{{ $transaction->service->name }}</td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td class="highlight">Rp {{ number_format($transaction->total_price, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Status Pembayaran</th>
                    <td>
                        <span class="badge 
                            {{ $transaction->payment_status === 'paid' ? 'bg-success' : 
                               ($transaction->status === 'in_progress' ? 'bg-info' : 'bg-warning') }}">
                            {{ ucfirst($transaction->payment_status) }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Status Transaksi</th>
                    <td>
                        <span class="badge 
                            {{ $transaction->status === 'completed' ? 'bg-success' : 
                               ($transaction->status === 'in_progress' ? 'bg-info' : 
                               ($transaction->status === 'canceled' ? 'bg-danger' : 'bg-warning')) }}">
                            {{ ucfirst(str_replace('_', ' ', $transaction->status)) }}
                        </span>
                    </td>
                </tr>
            </table>

            <h3><i class="fas fa-address-book"></i> Informasi Kontak</h3>
            <table class="table">
                <tr>
                    <th>Email User</th>
                    <td>{{ $transaction->user->email }}</td>
                </tr>
                <tr>
                    <th>Nomor WhatsApp User</th>
                    <td>{{ $transaction->whatsapp_number }}</td>
                </tr>
                <tr>
                    <th>Email Provider</th>
                    <td>{{ $transaction->provider->email }}</td>
                </tr>
                <tr>
                    <th>Nomor WhatsApp Provider</th>
                    <td>{{ $transaction->provider->whatsapp_number }}</td>
                </tr>
            </table>
        </div>

        <div class="invoice-footer">
            <p>Terima kasih atas transaksi Anda!</p>
            <p>&copy; {{ date('Y') }} TanyaJasa. All Rights Reserved.</p>
        </div>
    </div>

</body>
</html>
