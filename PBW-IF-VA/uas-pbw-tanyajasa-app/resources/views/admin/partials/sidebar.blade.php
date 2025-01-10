<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="#" class="logo">
       <h1 class="text-white">TanyaJasa</h1>
      </a>
      <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
          <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
          <i class="gg-menu-left"></i>
        </button>
      </div>
      <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
      </button>
    </div>
    <!-- End Logo Header -->
  </div>
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">
        <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
          <a href="/dashboard">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Detail</h4>
        </li>
        <li class="nav-item {{ Request::is('admin/users*') ? 'active' : '' }}">
          <a href="/admin/users">
            <i class="fas fa-users"></i>
            <p>Manajemen Pengguna</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('admin/services*') ? 'active' : '' }}">
          <a href="/admin/services">
            <i class="fas fa-luggage-cart"></i>
            <p>Manajemen Layanan</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('admin/transactions*') ? 'active' : '' }}">
          <a href="/admin/transactions">
            <i class="fas fa-file-invoice"></i>
            <p>Manajemen Transaksi</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('admin/categories*') ? 'active' : '' }}">
          <a href="/admin/categories">
            <i class="fas fa-tags"></i>
            <p>Manajemen Kategori</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('admin/reviews*') ? 'active' : '' }}">
          <a href="/admin/reviews">
            <i class="fas fa-comments"></i>
            <p>Manajemen Review</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- End Sidebar -->
