<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<!-- BEGIN: Menu Setting-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header mb-0">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item nav-toggle me-auto">
        <a class="navbar-brand" href="#">
          <span class="brand-logos">
            <img class="round" src="<?= base_url('assets/'); ?>files/images/logo/<?= $profilSekolah['logoSekolah']; ?>" alt="logo" height="40" width="40">
          </span>
          <h2 class="brand-text">
            <small>
              <?= $serverSetting['namaAplikasi']; ?>
              <br>
              <sup>
                <?= $serverSetting['sloganAplikasi']; ?>
              </sup>
            </small>
          </h2>
        </a>
      </li>
      <li class="nav-item nav-toggle">
        <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
          <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
          <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
        </a>
      </li>
    </ul>
  </div>

  <div class="shadow-bottom"></div>

  <div class="main-menu-content pt-2">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


      <li class="navigation-header text-dark">
        <span data-i18n="Menu">Menu</span>
        <i data-feather="more-horizontal"></i>
      </li>
      <li class="nav-item">
        <a class="d-flex align-items-center" href="app-settings">
          <i data-feather="settings"></i>
          <span class="menu-title text-truncate" data-i18n="Pengaturan Aplikasi">Pengaturan Aplikasi</span>
        </a>
        <ul class="menu-content">
          <li>
            <a class="d-flex align-items-center" href="app-set-data-sekolah">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate" data-i18n="Identitas Sekolah">Identitas Sekolah</span>
            </a>
          </li>

          <li>
            <a class="d-flex align-items-center" href="app-set-data-tapel">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate" data-i18n="Tahun Pelajaran">Tahun Pelajaran</span>
            </a>
          </li>

          <li>
            <a class="d-flex align-items-center" href="app-set-data-mapel">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate" data-i18n="Mata Pelajaran">Mata Pelajaran</span>
            </a>
          </li>

          <li>
            <a class="d-flex align-items-center" href="app-set-data-ekskul">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate" data-i18n="Ekstrakurikuler">Ekstrakurikuler</span>
            </a>
          </li>

          <li>
            <a class="d-flex align-items-center" href="app-set-data-kelas">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate" data-i18n="Kelas">Kelas</span>
            </a>
          </li>

          <li>
            <a class="d-flex align-items-center" href="app-set-data-jabatan">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate" data-i18n="Jabatan">Jabatan</span>
            </a>
          </li>

          <li>
            <a class="d-flex align-items-center" href="#">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate" data-i18n="Akun">Akun</span>
            </a>
            <ul class="menu-content">
              <li>
                <a class="d-flex align-items-center" href="app-set-data-akun-gtk">
                  <span class="menu-item text-truncate" data-i18n="Guru">GTK</span>
                </a>
              </li>
              <li>
                <a class="d-flex align-items-center" href="app-set-data-akun-pd">
                  <span class="menu-item text-truncate" data-i18n="Peserta Didik">Peserta Didik</span>
                </a>
              </li>
            </ul>
          </li>

          <li>
            <a class="d-flex align-items-center" href="#">
              <i data-feather="circle"></i>
              <span class="menu-item text-truncate" data-i18n="Database">Database</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="d-flex align-items-center" href="app-settings">
          <i data-feather="airplay"></i>
          <span class="menu-title text-truncate" data-i18n="Pengaturan Add-On">Pengaturan Add-On</span>
        </a>
        <ul class="menu-content">
          <li class="nav-item">
            <a class="d-flex align-items-center" href="app-set-profil">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate" data-i18n="Profil">Profil</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="d-flex align-items-center" href="app-set-kartu">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate" data-i18n="Kartu">Kartu Pelajar</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="d-flex align-items-center" href="app-set-informasi">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate" data-i18n="Informasi Akademik">Informasi Akademik</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="d-flex align-items-center" href="app-set-absensi">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate" data-i18n="Absensi">Absensi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="d-flex align-items-center" href="app-set-pembelajaran">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate" data-i18n="Pembelajaran">Pembelajaran</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="d-flex align-items-center" href="app-set-penilaian">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate" data-i18n="Penilaian">Penilaian</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="d-flex align-items-center" href="app-set-cek-nilai">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate" data-i18n="Check Nilai">Check Nilai</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="d-flex align-items-center" href="app-set-perpustakaan">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate" data-i18n="Perpustakaan">Perpustakaan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="d-flex align-items-center" href="app-set-konseling">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate" data-i18n="Konseling">Konseling</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="d-flex align-items-center" href="app-set-bank-sekolah">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate" data-i18n="Bank Sekolah">Bank Sekolah</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="d-flex align-items-center" href="app-set-rapor">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate" data-i18n="Rapor">Rapor</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="d-flex align-items-center" href="app-set-kelulusan">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate" data-i18n="Kelulusan">Kelulusan</span>
            </a>
            <ul class="menu-content">
              <li class="nav-item">
                <a class="d-flex align-items-center" href="app-set-kelulusan">
                  <i data-feather="circle"></i>
                  <span class="menu-title text-truncate" data-i18n="Pengaturan Kelulusan">Pengaturan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="d-flex align-items-center" href="app-data-kelulusan">
                  <i data-feather="circle"></i>
                  <span class="menu-title text-truncate" data-i18n="Data Kelulusan">Data</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="d-flex align-items-center" href="monitor-kelulusan">
                  <i data-feather="circle"></i>
                  <span class="menu-title text-truncate" data-i18n="Monitor Kelulusan">Monitor</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="d-flex align-items-center" href="app-set-saran">
              <i data-feather="circle"></i>
              <span class="menu-title text-truncate" data-i18n="Kritik dan Saran">Kritik dan Saran</span>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </div>
</div>
<!-- END: Menu Setting-->