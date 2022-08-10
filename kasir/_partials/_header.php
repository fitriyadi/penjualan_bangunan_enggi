<nav class="navbar  navbar-dark bg-secondary">

  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>

  <div class="navbar-content">

    <a class="navbar-brand m-2" href="#"><?=judul?></a>

    <ul class="navbar-nav">
      <li class="nav-item dropdown nav-profile">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="https://via.placeholder.com/30x30" alt="userr">
        </a>
        <div class="dropdown-menu" aria-labelledby="profileDropdown">
          <div class="dropdown-header d-flex flex-column align-items-center">
            <div class="figure mb-3">
              <img src="https://via.placeholder.com/80x80" alt="">
            </div>
            <div class="info text-center">
              <p class="name font-weight-bold mb-0">Kasir</p>
              <p class="email text-muted mb-3">Pengguna</p>
            </div>
          </div>
          <div class="dropdown-body">
            <ul class="profile-nav p-0 pt-3">
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i data-feather="log-out"></i>
                  <span>Log Out</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>