
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <!-- Logo dan Brand -->
        <a class="navbar-brand" href="../index.php">Futsal HUB</a>
        
        <a class="navbar-link ms-3" href="../index.php" style="color: white;">HOME</a>

        <!-- Tombol untuk responsive navbar -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Jika pengguna sudah login, tampilkan menu sesuai role -->
                    <!-- Menu Profil -->
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profil</a>
                    </li>
                    
                    <!-- Menu Logout -->
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
            </ul>
        </div>
    </div>
</nav>
