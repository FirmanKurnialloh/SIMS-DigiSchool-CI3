<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
      <div class="content-header-left col-md-9 col-8 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-start mb-0"><?= $page ?></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="<?= base_url('gtk/dashboard'); ?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"><?= $page ?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-header-right text-md-end col-md-3 col-4">
        <div class="mb-1 breadcrumb-right">
          <a href="#" type="button" class="btn btn-sm btn-primary" onclick="history.go(-1)">
            <i data-feather='chevrons-left'></i>
            <span>Kembali</span>
          </a>
        </div>
      </div>
    </div>

    <div class="content-body">

      <div class="row" hidden>
        <div class=" col-12">
          <div class="alert alert-primary" role="alert">
            <div class="alert-body"><strong>Info:</strong></div>
          </div>
        </div>
      </div>

      <section id="settings">
        <div class="row match-height">
          <!-- Card Left -->
          <div class="col-xl-4 col-md-6 col-12">
            <div class="card">
              <div class="card-body">
                <div class="text-center">
                  <h3>
                    <strong>
                      <?= $serverSetting['namaAplikasi']; ?>
                    </strong>
                    <br>
                    <small><?= $serverSetting['sloganAplikasi']; ?></small>
                  </h3>

                  <img src="<?= base_url('assets/'); ?>files/images/logo/<?= $profilSekolah['logoSekolah']; ?>"
                    class="pb-2 pt-2" alt="Logo Sekolah" width="150" />

                  <h3>
                    <strong>
                      <?= $profilSekolah['namaSekolah']; ?>
                    </strong>
                  </h3>

                  <a class="card-text font-small-3">Tahun Pelajaran <?= $tapelAktif['tapel']; ?> Semester
                    <?= $tapelAktif['semester']; ?></a>
                </div>

                <div class="row text-center pt-2 pb-2">
                  <div class="col-xl-4 col-sm-4 col-4 mb-0">
                    <h5>
                      <strong>
                        Server Guru
                      </strong>
                    </h5>
                    <?php if ($serverSetting['loginGuru'] == "1") { ?>
                    <form id="formServerGuru" method="post">
                      <div class="form-switch">
                        <input type="checkbox" class="form-check-input" id="serverGuruSwitch" checked />
                        <input type="text" name="statusServerGuru" id="statusServerGuru" value="1" hidden />
                        <sub id="serverGuruSwitchLabel">Aktif</sub>
                      </div>
                    </form>
                    <?php } else { ?>
                    <form id="formServerGuru" method="post">
                      <div class="form-switch">
                        <input type="checkbox" class="form-check-input" id="serverGuruSwitch" />
                        <input type="text" name="statusServerGuru" id="statusServerGuru" value="0" hidden />
                        <sub id="serverGuruSwitchLabel">Tidak Aktif</sub>
                      </div>
                    </form>
                    <?php } ?>
                  </div>

                  <div class="col-xl-4 col-sm-4 col-4 mb-0">
                    <h5>
                      <strong>
                        Server Siswa
                      </strong>
                    </h5>
                    <?php if ($serverSetting['loginSiswa'] == "1") { ?>
                    <form id="formServerSiswa" method="post">
                      <div class="form-switch">
                        <input type="checkbox" class="form-check-input" id="serverSiswaSwitch" checked />
                        <input type="text" name="statusServerSiswa" id="statusServerSiswa" value="1" hidden />
                        <sub id="serverSiswaSwitchLabel">Aktif</sub>
                      </div>
                    </form>
                    <?php } else { ?>
                    <form id="formServerSiswa" method="post">
                      <div class="form-switch">
                        <input type="checkbox" class="form-check-input" id="serverSiswaSwitch" />
                        <input type="text" name="statusServerSiswa" id="statusServerSiswa" value="0" hidden />
                        <sub id="serverSiswaSwitchLabel">Tidak Aktif</sub>
                      </div>
                    </form>
                    <?php } ?>
                  </div>

                  <div class="col-xl-4 col-sm-4 col-4 mb-0">
                    <h5>
                      <strong>
                        Server Web
                      </strong>
                    </h5>
                    <?php if ($serverSetting['web-sekolah'] == "1") { ?>
                    <form id="formServerWeb" method="post">
                      <div class="form-switch">
                        <input type="checkbox" class="form-check-input" id="serverWebSwitch" checked />
                        <input type="text" name="statusServerWeb" id="statusServerWeb" value="1" hidden />
                        <sub id="serverWebSwitchLabel">Aktif</sub>
                      </div>
                    </form>
                    <?php } else { ?>
                    <form id="formServerWeb" method="post">
                      <div class="form-switch">
                        <input type="checkbox" class="form-check-input" id="serverWebSwitch" />
                        <input type="text" name="statusServerWeb" id="statusServerWeb" value="0" hidden />
                        <sub id="serverWebSwitchLabel">Tidak Aktif</sub>
                      </div>
                    </form>
                    <?php } ?>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- Card Left -->

          <!-- Card Right -->
          <div class="col-xl-8 col-md-6 col-12">
            <div class="card card-statistics">
              <div class="card-header">
                <h4 class="card-title">Add-On Aplikasi</h4>
              </div>
              <div class="card-body">
                <div class="row text-center">

                  <!-- Add-On Switcher Web Sekolah -->
                  <div class="col-xl-3 col-sm-6 col-6 mb-2 ">
                    <div class="media justify-content-center pb-1">
                      <div class="avatar bg-light-primary">
                        <div class="avatar-content">
                          <i data-feather='airplay'></i>
                        </div>
                      </div>
                    </div>
                    <h5>
                      <strong>
                        Modul Web Sekolah
                      </strong>
                    </h5>
                    <?php if (is_web_installed() && !is_web_activated()) { ?>
                    <sup>Modul Terpasang Tidak Aktif !</sup>
                    <a href="<?= base_url('web/beranda') ?>" type="button" class="btn btn-md btn-flat-success">
                      <i data-feather="cpu" class="me-25"></i>
                      <span>Atur Modul</span>
                    </a>
                    <?php } elseif (is_web_installed() && is_web_activated()) { ?>
                    <sup>Modul Terpasang Aktif !</sup>
                    <a href="<?= base_url('web/beranda') ?>" type="button" class="btn btn-md btn-flat-success">
                      <i data-feather="cpu" class="me-25"></i>
                      <span>Atur Modul</span>
                    </a>
                    <?php } elseif (!is_web_installed()) { ?>
                    <sup>Add-On Tidak Terpasang !</sup>
                    <a href="https://cdn.smpn1sukaresmi.sch.id" type="button" class="btn btn-md btn-flat-success">
                      <i data-feather="cpu" class="me-25"></i>
                      <span>Pesan Modul</span>
                    </a>
                    <?php } ?>
                  </div>
                  <!-- End Add-On Switcher Web Sekolah -->

                  <!-- Add-On Switcher PPDB -->
                  <div class="col-xl-3 col-sm-6 col-6 mb-2 ">
                    <div class="media justify-content-center pb-1">
                      <div class="avatar bg-light-primary">
                        <div class="avatar-content">
                          <i data-feather='airplay'></i>
                        </div>
                      </div>
                    </div>
                    <h5>
                      <strong>
                        Modul PPDB
                      </strong>
                    </h5>
                    <?php if (is_ppdb_installed() && !is_ppdb_activated()) { ?>
                    <sup>Modul Terpasang Tidak Aktif !</sup>
                    <a href="<?= base_url('layananPPDB/settings') ?>" type="button" class="btn btn-md btn-flat-success">
                      <i data-feather="cpu" class="me-25"></i>
                      <span>Atur Modul</span>
                    </a>
                    <?php } elseif (is_ppdb_installed() && is_ppdb_activated()) { ?>
                    <sup>Modul Terpasang Aktif !</sup>
                    <a href="<?= base_url('layananPPDB/settings') ?>" type="button" class="btn btn-md btn-flat-success">
                      <i data-feather="cpu" class="me-25"></i>
                      <span>Atur Modul</span>
                    </a>
                    <?php } elseif (!is_ppdb_installed()) { ?>
                    <sup>Add-On Tidak Terpasang !</sup>
                    <a href="http://www.jayvyn-host.com/#contact" type="button" class="btn btn-md btn-flat-success">
                      <i data-feather="cpu" class="me-25"></i>
                      <span>Pesan Modul</span>
                    </a>
                    <?php } ?>
                  </div>
                  <!-- End Add-On Switcher PPDB -->

                  <!-- Add-On Switcher PIP -->
                  <div class="col-xl-3 col-sm-6 col-6 mb-2 ">
                    <div class="media justify-content-center pb-1">
                      <div class="avatar bg-light-primary">
                        <div class="avatar-content">
                          <i data-feather='airplay'></i>
                        </div>
                      </div>
                    </div>
                    <h5>
                      <strong>
                        Modul PIP
                      </strong>
                    </h5>
                    <?php if (is_pip_installed() && !is_pip_activated()) { ?>
                    <sup>Modul Terpasang Tidak Aktif !</sup>
                    <a href="<?= base_url('layananPIP/settings') ?>" type="button" class="btn btn-md btn-flat-success">
                      <i data-feather="cpu" class="me-25"></i>
                      <span>Atur Modul</span>
                    </a>
                    <?php } elseif (is_pip_installed() && is_pip_activated()) { ?>
                    <sup>Modul Terpasang Aktif !</sup>
                    <a href="<?= base_url('layananPIP/settings') ?>" type="button" class="btn btn-md btn-flat-success">
                      <i data-feather="cpu" class="me-25"></i>
                      <span>Atur Modul</span>
                    </a>
                    <?php } elseif (!is_pip_installed()) { ?>
                    <sup>Add-On Tidak Terpasang !</sup>
                    <a href="http://www.jayvyn-host.com/#contact" type="button" class="btn btn-md btn-flat-success">
                      <i data-feather="cpu" class="me-25"></i>
                      <span>Pesan Modul</span>
                    </a>
                    <?php } ?>
                  </div>
                  <!-- End Add-On Switcher PIP -->
                </div>
              </div>
            </div>
          </div>
          <!-- Card Right -->
        </div>
      </section>


    </div>

  </div>
</div>
<!-- END: Content-->
