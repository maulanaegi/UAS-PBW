<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
  <a href="/" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
      {{-- <img src="{{ asset('img/tj-logo.png') }}" alt="" width="130"> --}}
	    <h1 class="m-0" style="color: #0077b6;">TanyaJasa</h1>
  </a>
  <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto p-4 p-lg-0">
          <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Beranda</a>
          <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle {{ Request::is('services') || Request::is('services/*') ? 'active' : '' }}" data-bs-toggle="dropdown">
                  Jasa
              </a>
              <div class="dropdown-menu rounded-0 m-0">
                  <a href="/services" class="dropdown-item" style="background-color: {{ Request::is('services') ? '#0077b6' : 'transparent' }}; color: {{ Request::is('services') ? 'white' : '' }};">Daftar Jasa</a>
                  <a href="/services/categories" class="dropdown-item" style="background-color: {{ Request::is('services/categories') ? '#0077b6' : 'transparent' }}; color: {{ Request::is('services/categories') ? 'white' : '' }};">Kategori Jasa</a>
              </div>
          </div>
          <a href="/about" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">Tentang Kami</a>
          
          @auth
              <a href="{{ route('user-profile', ['username' => auth()->user()->username]) }}" 
                 class="btn rounded-0 py-4 px-lg-5 d-none d-lg-block" 
                 style="background-color: #0077b6; color: white; border: none;">
                 <i class="fa fa-user ms-3"></i> Halo, {{ auth()->user()->name }}
              </a>
          @else
              <a href="{{ Route('login') }}" class="btn rounded-0 py-4 px-lg-5 d-none d-lg-block" 
                 style="background-color: #0077b6; color: white; border: none;">
                 Login<i class="fa fa-arrow-right ms-3"></i>
              </a>                 
          @endauth
      </div>
  </div>
</nav>
<!-- Navbar End -->
