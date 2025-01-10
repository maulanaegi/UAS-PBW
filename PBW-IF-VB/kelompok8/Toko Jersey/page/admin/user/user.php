<div class="box-title">
    <p>User / <b>Manajemen User</b></p>
</div>
<div id="box">
    <h1>User</h1>

    <?php
    $status = "user";
    include('lib/koneksi.php');

    $query = $conn->prepare("SELECT * FROM tbl_users WHERE title=:title");
    $query->bindparam(':title',$status);
    $query->execute();
    $data = $query->fetchAll();
    $count = $query->rowCount();
    ?>

    <table class="news">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Username</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no=1;
        foreach ($data as $value): ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo "(".$value['id_user'].") ".$value['nama_lengkap'] ?></td>
                <td><?php echo $value['email'] ?></td>
                <td><?php echo $value['username'] ?></td>
                <td><?php echo $value['alamat'] ?></td>
                <td><?php echo $value['no_hp'] ?></td>
                <td>
                    <a class="tombol-biru" href="?page=user_edit&id=<?php echo $value['id_user']; ?>">Ubah</a><br><br>
                    <a class="tombol-merah" href="?page=user_hapus&id=<?php echo $value['id_user']; ?>">Hapus</a>
                </td>
            </tr>
        <?php
        $no++;
        endforeach;
        ?>
    </table>
    <br>
    <?php
    if ($count == 0){
        echo "<center>-- Belum ada pesanan barang --</center>";
        echo "<br>";
    }
    ?>
</div>

<style>
/* Table Styles */
.news {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.news th, .news td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.news th {
    background-color:rgb(0, 0, 0);
    font-weight: bold;
}

.news tr:nth-child(even) {
    background-color: #f9f9f9;
}

.news tr:hover {
    background-color: #f1f1f1;
}

/* Button Styles */
.tombol-biru, .tombol-merah {
    padding: 8px 15px;
    border-radius: 5px;
    color: white;
    text-decoration: none;
    display: inline-block;
    margin-top: 5px;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.tombol-biru {
    background-color: #007bff;
}

.tombol-biru:hover {
    background-color: #0056b3;
}

.tombol-merah {
    background-color: #dc3545;
}

.tombol-merah:hover {
    background-color: #c82333;
}
</style>