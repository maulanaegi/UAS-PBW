<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color:rgb(68, 68, 68); color: white;">
    <div class="container-fluid">
        <!-- Logo dan Brand -->
        <a class="navbar-brand" href="index.php" style="color: white;">Futsal HUB</a>

        <a class="navbar-link" href="index.php" style="color: white;">HOME</a>
        
        <!-- Tombol untuk responsive navbar -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Jika pengguna sudah login, tampilkan menu sesuai role -->
                <?php if (isset($_SESSION['role'])): ?>
                    <?php if ($_SESSION['role'] == 'operator'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="operator/profile.php" style="color: white;">Profil</a>
                        </li>
                    <?php elseif ($_SESSION['role'] == 'member'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="member/profile.php" style="color: white;">Profil</a>
                        </li>
                    <?php endif; ?>

                    <!-- Menu Logout -->
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" style="color: white;">Logout</a>
                    </li>
                <?php else: ?>
                    <!-- Menu untuk pengguna yang belum login -->
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" style="color: white;">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php" style="color: white;">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
