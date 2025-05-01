<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
  <div class="navbar-container d-flex content">
    <div class="bookmark-wrapper d-flex align-items-center">
      <?php if ($pageCollumn == "0-column") { ?>
        <ul class="nav navbar-nav d-xl-none">
          <li class="nav-item">
            <a class="nav-link menu-toggle" href="#">
              <i class="ficon" data-feather="menu"></i>
            </a>
          </li>
        </ul>
      <?php } ?>

      <?php if ($tapelAktif) { ?>
        <h4 class="content-header-left float-left mb-0 d-none d-lg-block"><?= $profilSekolah['namaSekolah'] . " Tahun Pelajaran " . $tapelAktif['tapel'] . " Semester " . $tapelAktif['semester'] ?></h4>
      <?php } else { ?>
        <h4 class="content-header-left float-left mb-0 d-none d-lg-block"><?= $profilSekolah['namaSekolah'] ?></h4>
      <?php } ?>
    </div>

    <ul class="nav navbar-nav align-items-center ms-auto">

      <!-- START: DARK/LIGHT -->
      <li class="nav-item">
        <a class="nav-link nav-link-style">
          <i class="ficon" data-feather="moon"></i>
        </a>
      </li>
      <!-- START: END/LIGHT -->

      <!-- START: NOTIFIKASI -->
      <li class="nav-item dropdown dropdown-notification me-25">
        <a class="nav-link" href="#" data-bs-toggle="dropdown">
          <i class="ficon" data-feather="server"></i>
          <!-- <span class="badge rounded-pill bg-danger badge-up">5</span> -->
        </a>
        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
          <li class="dropdown-menu-header">
            <div class="dropdown-header d-flex">
              <h4 class="notification-title mb-0 me-auto">Layanan Daring</h4>
              <!-- <div class="badge rounded-pill badge-light-primary">6 New</div> -->
            </div>
          </li>
          <?php if (is_ppdb_installed()) { ?>
            <li class="scrollable-container media-list">
              <a class="d-flex" href="<?= base_url('LayananPPDB'); ?>">
                <div class="list-item d-flex align-items-start">
                  <div class="me-1">
                    <div class="avatar bg-light-primary">
                      <div class="avatar-content"><i data-feather="user"></i></div>
                    </div>
                  </div>
                  <div class="list-item-body flex-grow-1">
                    <p class="media-heading">
                      <span class="fw-bolder">PPDB</span>
                    </p>
                    <small class="notification-text"> Layanan ini merupakan layanan informasi PPDB.</small>
                  </div>
                </div>
              </a>
            </li>
          <?php } ?>
          <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="<?= base_url('gtk/dashboard'); ?>">Lihat Semua Layanan</a></li>
        </ul>
      </li>
      <!-- END: NOTIFIKASI -->

      <!-- START: FOTO PROFIL -->
      <li class="nav-item dropdown dropdown-user">
        <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="user-nav">
            <span class="user-name fw-bolder d-none d-lg-block"><?= $userGTK['namaLengkap'] ?></span>
            <span class="user-status d-none d-lg-block"><?= $sessionUser ?></span>
          </div>
          <span class="avatar-wrapper">
            <?php if ($profilGTK['foto'] && file_exists(FCPATH . "assets/files/images/fotoGuru/" . $profilGTK['foto'])) { ?>
              <img src="<?= base_url('assets/'); ?>files/images/fotoGuru/<?= $profilGTK['foto']; ?>" alt="Avatar" height="32" width="32">
            <?php  } else { ?>
              <div class="avatar bg-light-<?= warnaPeran(getPeran($sessionRole1)); ?>">
                <div class="avatar-content"><?= namaInisial($profilGTK['namaLengkap']); ?></div>
              </div>
            <?php } ?>
            <span class="avatar-status-online"></span>
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
          <a class="dropdown-item" href="<?= base_url('gtk/profil'); ?>"><i class="me-50" data-feather="user"></i> Profil</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalPanduan"><i class="me-50" data-feather="youtube"></i> Panduan</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalLogout"><i class="me-50" data-feather="power"></i> Logout</a>
        </div>
      </li>
      <!-- END: FOTO PROFIL -->
    </ul>
  </div>
</nav>