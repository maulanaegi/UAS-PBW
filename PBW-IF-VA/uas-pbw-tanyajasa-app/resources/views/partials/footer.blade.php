<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container py-5">
      <div class="row g-5">
          <div class="col-lg-3 col-md-3">
						<p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jawa Barat, Indonesia</p>
          </div>
          <div class="col-lg-3 col-md-3">
						<p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
          </div>
          <div class="col-lg-3 col-md-3">
              <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
          </div>
          <div class="col-lg-3 col-md-3">
						<div class="d-flex pt-2">
							<a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
							<a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
							<a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
							<a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
						</div>
          </div>
      </div>
  </div>
  <div class="container">
      <div class="copyright">
          <div class="row">
              <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                  &copy; <a class="border-bottom" href="#">TanyaJasa</a>, All Right Reserved. 
    
    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                  </br>Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-lg-square back-to-top" 
   style="background-color: #0077b6; color: white; border: none;">
   <i class="bi bi-arrow-up"></i>
</a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>
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