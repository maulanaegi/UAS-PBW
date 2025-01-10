<!DOCTYPE html>
<html>
<head>
    <title>CETAK PRINT DATA STOK BARANG</title>
    <style>
        /* Reset margin dan padding untuk elemen body */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Atur elemen halaman dengan background */
        .page {
            background-image: url('assets/img/gd1.jpg'); /* Ganti dengan path gambar Anda */
            background-size: cover; /* Pastikan gambar menutupi seluruh halaman */
            background-position: center; /* Pusatkan gambar */
            background-repeat: no-repeat; /* Hindari pengulangan gambar */
            height: 100vh; /* Pastikan tinggi elemen sesuai dengan viewport */
            width: 100%; /* Pastikan lebar elemen penuh */
            display: flex; /* Gunakan Flexbox untuk memusatkan konten */
            flex-direction: column; /* Atur konten secara vertikal */
            justify-content: center; /* Pusatkan konten secara vertikal */
            align-items: center; /* Pusatkan konten secara horizontal */
        }

        /* Gaya untuk tabel */
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8); /* Transparansi untuk keterbacaan */
        }
        table th, table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        h2, h4 {
            color: #; /* Sesuaikan warna teks agar kontras */
        }

        /* Gaya untuk cetak */
        @media print {
            .page {
                -webkit-print-color-adjust: exact; /* Pastikan warna tercetak */
                print-color-adjust: exact;
            }
            table {
                width: 100%; /* Sesuaikan tabel agar memenuhi lebar halaman cetak */
            }
        }
    </style>
</head>
<body>
 
    <div class="page">
        <h2>DATA LAPORAN STOK BARANG</h2>

        <table>
            <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis</th>
                <th>Merk</th>
                <th>Harga</th>
                <th>Tgl Masuk</th>
                <th>Deskripsi</th>
                <th>Stok</th>
            </tr>
            <?php 
            include 'config/database.php';
            $no = 1;
            $sql = mysqli_query($db,"select * from tbl_barang");
            while($data = mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['jenis']; ?></td>
                <td><?php echo $data['merk']; ?></td>
                <td><?php echo $data['harga']; ?></td>
                <td><?php echo $data['tgl_masuk']; ?></td>
                <td><?php echo $data['deskripsi']; ?></td>
                <td><?php echo $data['stok']; ?></td>
            </tr>
            <?php 
            }
            ?>
        </table>
    </div>
 
    <script>
        window.print();
    </script>
 
</body>
</html>
