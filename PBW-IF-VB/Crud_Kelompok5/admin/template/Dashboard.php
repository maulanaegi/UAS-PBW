<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start -->
        <ul class="sidebar-menu" id="nav-accordion">
            <!-- Profil pengguna -->
            <h5 class="centered"><?php echo $hasil_profil['nm_member']; ?></h5>
            
            <!-- Menu Beranda -->
            <li class="mt">
                <a href="assets\beranda.php\index.php\produk.php">
                    <i class="fa fa-home"></i>
                    <span>Beranda</span>
                </a>
            </li>

            <!-- Menu utama -->
            <li class="mt">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <ul class="dropdown-menu pull-right">
            <li>
              <a onclick="return confirm('Ingin Logout?');" href="logout.php">Logout</a>
            </li>
          </ul>

            <!-- Menu Master -->
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>Master <i class="fa fa-angle-down"></i></span>
                </a>
                <ul class="sub">
                    <li><a href="index.php?page=pelanggan">Pembeli</a></li>
                    <li><a href="index.php?page=barang">Barang</a></li>
                    <li><a href="index.php?page=kategori">Kategori</a></li>
                    <li><a href="index.php?page=user">Petugas</a></li>
                </ul>
            </li>

            <!-- Menu Transaksi -->
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
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
                    <li><a href="index.php?page=tentang">Tentang Kami</a></li>
                </ul>
            <li><a onclick="return confirm('Ingin Logout?');" href="logout.php">Logout</a></li>
            </li>
        </ul>
        <!-- sidebar menu end -->
    </div>
</aside>
