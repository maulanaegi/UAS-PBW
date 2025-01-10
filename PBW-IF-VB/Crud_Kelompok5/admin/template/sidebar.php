<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start -->
        <ul class="sidebar-menu" id="nav-accordion">
            <!-- Profil pengguna -->
            <h5 class="centered"><?php echo $hasil_profil['nm_member']; ?></h5>

            <!-- Menu utama -->
            <li class="mt">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Menu Master -->
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Data <i class="fa fa-angle-down"></i></span>
                </a>
                <ul class="sub">
                    <li><a href="index.php?page=pelanggan">Pembeli</a></li>
                    <li><a href="index.php?page=barang">Barang</a></li>
                    <li><a href="index.php?page=kategori">Kategori</a></li>
                </ul>
            </li>

            <!-- Menu Transaksi -->
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-money"></i>
                    <span>Transaksi <i class="fa fa-angle-down"></i></span>
                </a>
                <ul class="sub">
                    <li><a href="index.php?page=jual">Penjualan</a></li>
                </ul>
            </li>

            <!-- Menu Laporan -->
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Laporan <i class="fa fa-angle-down"></i></span>
                </a>
                <ul class="sub">
                    <li><a href="index.php?page=laporan">Laporan Penjualan</a></li>
                </ul>
            </li>

            <!-- Menu Setting -->
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-cog"></i>
                    <span>Setting <i class="fa fa-angle-down"></i></span>
                </a>
                <ul class="sub">
                    <li><a href="index.php?page=pengaturan">Pengaturan Toko</a></li>
                    <!-- Menu Tentang Kami dengan Modal -->
                    <li>
                        <a href="#" data-toggle="modal" data-target="#tentangModal">
                            <i class="fa fa-info-circle"></i>
                            <span>Tentang Kami</span>
                        </a>
                        <a href="index.php?page=user">
                            <i class="fa fa-user"></i>
                            <span>Profil Pengguna</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Menu Logout dengan ikon -->
            <li>
                <a onclick="return confirm('Ingin Logout?');" href="logout.php">
                    <i class="fa fa-sign-out"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end -->
    </div>
</aside>

<!-- Modal Pop-Up Tentang Kami -->
<div id="tentangModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tentangLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tentangLabel">Tentang Kami</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                Kami adalah Toko Komputer yang menyediakan berbagai kebutuhan teknologi, mulai dari perangkat keras, perangkat lunak, hingga layanan pendukung lainnya. 
                Dengan komitmen untuk memberikan produk berkualitas dan layanan terbaik, kami hadir untuk mendukung produktivitas dan kemudahan Anda dalam menggunakan teknologi.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- CSS -->
<style>
    /* Styling untuk Sidebar */
    #sidebar {
        background-color:rgb(2, 27, 53); /* Latar belakang biru gelap */
        color:rgb(0, 0, 0); /* Warna teks */
    }

    #sidebar .sidebar-menu > li > a {
        color: #ecf0f1; /* Warna teks menu */
        display: block;
        padding: 10px 20px;
        text-decoration: none;
    }

    #sidebar .sidebar-menu > li > a:hover {
        background-color: #34495e; /* Efek hover */
        color: #ffffff; /* Teks saat hover */
    }

    /* Styling untuk Header Profil */
    h5.centered {
        color:rgb(236, 240, 241); /* Warna teks profil */
        margin-top: 10px;
    }

    /* Modal Styling */
    .modal-header {
        background-color: #2c3e50; /* Warna header modal */
        color:rgba(255, 255, 255, 0);
    }
</style>
