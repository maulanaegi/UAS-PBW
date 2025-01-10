<!-- Navbar Header -->
<nav
class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
>
<div class="container-fluid">

  <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

    <li class="nav-item topbar-user dropdown hidden-caret">
      <a
        class="dropdown-toggle profile-pic"
        data-bs-toggle="dropdown"
        href="#"
        aria-expanded="false"
      >
        <div class="avatar-sm">
          <img
            src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('admin/assets/img/profile.jpg') }}"
            alt="..."
            class="avatar-img rounded-circle"
          />
        </div>
        <span class="profile-username">
          <span class="op-7">Hi,</span>
          <span class="fw-bold">{{ Auth::user()->name }}</span>
        </span>
      </a>
      <ul class="dropdown-menu dropdown-user animated fadeIn">
        <div class="dropdown-user-scroll scrollbar-outer">
          <li>
            <div class="user-box">
              <div class="avatar-lg">
                <img
                  src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('admin/assets/img/profile.jpg') }}"
                  alt="image profile"
                  class="avatar-img rounded"
                />
              </div>
              <div class="u-text">
                <h4>{{ Auth::user()->name }}</h4>
                <p class="text-muted">{{ Auth::user()->email }}</p>
              </div>
            </div>
          </li>
          <li>
            <div class="dropdown-divider"></div>
            <form action="/logout" method="post" id="logout-form">
              @csrf
              <button type="submit" class="dropdown-item" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
          </li>
        </div>
      </ul>
    </li>
    
  </ul>
</div>
</nav>
<!-- End Navbar -->