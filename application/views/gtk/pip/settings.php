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
                <li class="breadcrumb-item">
                  <a href="<?= base_url('settings'); ?>">Pengaturan Aplikasi</a>
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

      <section id="pipSettingsPage">
        <div class='card card-body'>
          <div class='text-center'>
            <img src='<?= base_url('assets/'); ?>files/images/logo/page-loader-2.gif' width='300px' />
            <h1 class='text-center font-400'>Harap Tunggu, Sistem Sedang Mencari Data ...</h1>
            <p class='text-center'>Jika proses ini memakan waktu yang cukup lama, silahkan periksa koneksi internet anda
              dan gunakan Google Chrome Terbaru !</p>
          </div>
        </div>
      </section>

    </div>

  </div>
</div>
<!-- END: Content-->
