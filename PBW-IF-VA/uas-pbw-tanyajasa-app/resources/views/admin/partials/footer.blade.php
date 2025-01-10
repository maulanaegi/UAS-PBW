<footer class="footer">
  <div class="container-fluid d-flex justify-content-between">
    <nav class="pull-left">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="http://www.themekita.com">
            ThemeKita
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> Help </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> Licenses </a>
        </li>
      </ul>
    </nav>
    <div class="copyright">
      2025, made with <i class="fa fa-heart heart text-danger"></i> by
      TanyaJasa
    </div>
    <div>
      Distributed by
      <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
    </div>
  </div>
</footer>
</div>
</div>

<!--   Core JS Files   -->
<script src="{{ asset('admin/assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('admin/assets/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('admin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ asset('admin/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('admin/assets/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset('admin/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/plugin/jsvectormap/world.js') }}"></script>

{{-- <!-- Sweet Alert -->
<script src="{{ asset('admin/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script> --}}

<!-- Kaiadmin JS -->
<script src="{{ asset('admin/assets/js/kaiadmin.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Mengatur konfirmasi perubahan role
      const changeRoleBtn = document.getElementById('change-role-btn');
      const changeRoleForm = document.getElementById('change-role-form');

      if (changeRoleBtn) {
          changeRoleBtn.addEventListener('click', function (event) {
              event.preventDefault(); // Mencegah form dikirim langsung
              
              Swal.fire({
                  title: 'Yakin ingin mengubah role?',
                  text: 'Role akan diubah menjadi penyedia jasa!',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Ya, Ubah!',
                  cancelButtonText: 'Batal'
              }).then((result) => {
                  if (result.isConfirmed) {
                      changeRoleForm.submit(); // Kirim form hanya setelah konfirmasi
                  }
              });
          });
      }

      // Mengatur konfirmasi logout
      const logoutBtn = document.getElementById('logout-btn');
      const logoutForm = document.getElementById('logout-form');

      if (logoutBtn) {
          logoutBtn.addEventListener('click', function (event) {
              event.preventDefault(); // Mencegah form dikirim langsung

              Swal.fire({
                  title: 'Yakin ingin logout?',
                  text: 'Anda akan keluar dari sesi ini!',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Ya, Logout!',
                  cancelButtonText: 'Batal'
              }).then((result) => {
                  if (result.isConfirmed) {
                      logoutForm.submit(); // Kirim form hanya setelah konfirmasi
                  }
              });
          });
      }

      // Menampilkan alert notifikasi berdasarkan session
      @if (session('alert'))
          Swal.fire({
              title: "{{ session('alert.title') }}",
              text: "{{ session('alert.text') }}",
              icon: "{{ session('alert.icon') }}",
              confirmButtonText: 'OK'
          });
      @endif
  });
</script>
</body>
</html>
