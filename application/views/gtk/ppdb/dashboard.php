<?php
// var_dump($profilGTK);
// die;
if ($profilGTK) {
  if ($profilGTK['jk'] == "L") {
    $jkPanjang = "Laki - Laki";
    $jkPanggil = "Pak";
  } else {
    $jkPanjang = "Perempuan";
    $jkPanggil = "Bu";
  }
}
?>
<!-- BEGIN: Content-->
<div class="app-content content ">
  <!-- <div class="content-overlay"></div> -->
  <!-- <div class="header-navbar-shadow"></div> -->
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
      <div class="content-header-left col-md-9 col-8 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-start mb-0">PPDB</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="<?= base_url('gtk/dashboard'); ?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item hidden">
                  <a href="<?= base_url('gtk/dashboard'); ?>">PPDB</a>
                </li>
                <li class="breadcrumb-item active">PPDB</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-header-right text-md-end col-md-3 col-4">
        <div class="mb-1 breadcrumb-right">
          <a href="<?= base_url('gtk/dashboard'); ?>" type="button" class="btn btn-sm btn-primary">
            <i data-feather='chevrons-left'></i>
            <span>Kembali</span>
          </a>
        </div>
      </div>
    </div>

    <div class="content-body">
      <!-- Dashboard Welcome -->
      <section id="knowledge-base-search">
        <div class="row">
          <div class="col-12">
            <div class="card knowledge-base-bg text-center" style="background-image: url('<?= base_url('assets/') ?>app-assets/images/banner/banner.png')">
              <div class="card-body">
                <h2 class="text-primary">Hai, <?= $jkPanggil . " " . $profilGTK['namaPanggil'] ?></h2>
                <p class="card-text mb-2">
                  <span class="fw-bolder">Silahkan Pilih Fasilitas Layanan Daring <br><?= $profilSekolah['namaSekolah'] ?> Di Bawah Ini </span>
                </p>
                <?php if ($sessionRole == "1") { ?>
                  <p class="card-text mb-0 text-success">
                    <span><strong>Anda Login Sebagai Admin</strong></span>
                  </p>
                  <a href="app-settings">
                    <button type="button" class="btn btn-success">
                      <i data-feather="settings" class="mr-25"></i>
                      <span>Pengaturan Aplikasi</span>
                    </button>
                  </a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--/ Dashboard Welcome -->

      <!-- Layanan Add-On -->
      <section id="knowledge-base-content">
        <div class="row kb-search-content-info match-height">
          <!-- Add-On PPDB -->
          <?php if (file_exists(APPPATH . "views" . "/gtk/ppdb/dashboard.php")) { ?>
            <div class="col-md-4 col-sm-6 col-12 kb-search-content">
              <div class="card">
                <a href="<?= base_url('gtk/ppdb'); ?>">
                  <img src="<?= base_url('assets/'); ?>app-assets/images/illustration/demand.svg" class="card-img-top d-none d-lg-block" />
                  <div class="card-body text-center">
                    <h4>PPDB</h4>
                    <p class="text-body mt-1 mb-0">
                      Layanan ini merupakan layanan Informasi PPDB.
                    </p>
                  </div>
                </a>
                <div class="card-footer">
                  <div class="row justify-content-center">
                    <div class="col-12 text-center pb-0">
                      <a href="<?= base_url('gtk/ppdb'); ?>">
                        <button type="button" class="btn btn-primary btn-sm">
                          <i data-feather="log-in" class="mr-50"></i><span> Akses Layanan PPDB</span>
                        </button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          <!--/ Add-On PPDB-->

        </div>
      </section>
      <!--/  Layanan Add-On -->

    </div>
  </div>
</div>
<!-- END: Content-->