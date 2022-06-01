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
<div class="container pt-5">
  <div class="content-wrapper">
    <div class="content-body">
      <!-- Knowledge base Jumbotron -->
      <section id="knowledge-base-search">
        <div class="row">
          <div class="col-12">
            <div class="card knowledge-base-bg text-center" style="background-image: url('<?= base_url('assets/') ?>app-assets/images/banner/banner.png')">
              <div class="card-body">
                <h2 class="text-primary">Hai, <?= $jkPanggil . " " . $profilGTK['namaPanggil'] ?></h2>
                <p class="card-text mb-2">
                  <span>Silahkan Pilih Fasilitas Layanan Daring <?= $profilSekolah['namaSekolah'] ?> Di Bawah Ini </span>
                </p>
                <?php if ($sessionRole == "1") { ?>
                  <p class="card-text mb-0 text-success">
                    <span><strong>Anda Login Sebagai Admin</strong></span>
                  </p>
                  <a href="app-settings">
                    <button type="button" class="btn btn-primary">
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
      <!--/ Knowledge base Jumbotron -->

      <!-- Knowledge base -->
      <section id="knowledge-base-content">
        <div class="row kb-search-content-info match-height">

          <?php if (file_exists("addon-profil/profil.php") && $addon_identitas == "1") { ?>
            <div class="col-md-4 col-sm-6 col-12 kb-search-content">
              <div class="card">
                <a href="#">
                  <img src="desktop/app-assets/images/illustration/demand.svg" class="card-img-top mt-4" height="200px" />

                  <div class="card-body text-center">
                    <h4>Profil</h4>
                    <p class="text-body mt-1 mb-0">
                      Layanan ini merupakan layanan penyimpanan data kepegawaian dan akademik.
                    </p>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>

          <?php if (file_exists("addon-informasi/informasi.php") && $addon_informasi == "1") { ?>
            <div class="col-md-4 col-sm-6 col-12 kb-search-content">
              <div class="card">
                <a href="#">
                  <img src="desktop/app-assets/images/illustration/marketing.svg" class="card-img-top" alt="knowledge-base-image" />
                  <div class="card-body text-center">
                    <h4>Informasi</h4>
                    <p class="text-body mt-1 mb-0">
                      Layanan ini menyediakan berbagai informasi akademik.
                    </p>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>

          <?php if (file_exists("addon-absensi/absensi.php") && $addon_absensi == "1") { ?>
            <div class="col-md-4 col-sm-6 col-12 kb-search-content">
              <div class="card">
                <a href="#">
                  <img src="desktop/app-assets/images/illustration/undraw_Confirmed_re_sef7.svg" class="card-img-top mt-4" height="200px" />
                  <div class="card-body text-center">
                    <h4>Absensi</h4>
                    <p class="text-body mt-1 mb-0">Layanan ini merupakan layanan perekaman absensi harian</p>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>

          <?php if (file_exists("addon-pembelajaran/pembelajaran.php") && $addon_pembelajaran == "1") { ?>
            <div class="col-md-4 col-sm-6 col-12 kb-search-content">
              <div class="card">
                <a href="#">
                  <img src="desktop/app-assets/images/illustration/undraw_quiz_nlyh.svg" class="card-img-top mt-4" height="200px" />
                  <div class="card-body text-center">
                    <h4>Pembelajaran</h4>
                    <p class="text-body mt-1 mb-0">Layanan ini merupakan layanan penyampaian materi belajar yang dapat secara langsung dipelajari secara daring oleh peserta didik</p>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>

          <?php if (file_exists("addon-penilaian/app-set-penilaian.php") && $addon_penilaian == "1") { ?>
            <div class="col-md-4 col-sm-6 col-12 kb-search-content">
              <div class="card">
                <a href="#">
                  <img src="desktop/app-assets/images/illustration/email.svg" class="card-img-top" alt="knowledge-base-image" />
                  <div class="card-body text-center">
                    <h4>Penilaian</h4>
                    <p class="text-body mt-1 mb-0">Layanan ini merupakan layanan penilaian daring dan rekaman data digital hasil penilaian peserta didik</p>
                  </div>
                </a>
                <div class="row pb-2 justify-content-center">
                  <?php if ($sesi_walas_guru != null) { ?>
                    <div class="col-lg-6 col-12 text-center pt-2">
                      <a href="app-view-penilaian">
                        <button type="button" class="btn btn-primary btn-sm">
                          <i data-feather="log-in" class="mr-25"></i>
                          <span>Akses Walikelas</span>
                        </button>
                      </a>
                    </div>
                  <?php } ?>
                  <?php if ($jabatan1_data_guru != null) { ?>
                    <div class="col-lg-6 col-12 text-center pt-2">
                      <a href="app-view-penilaian-guru">
                        <button type="button" class="btn btn-primary btn-sm">
                          <i data-feather="log-in" class="mr-25"></i>
                          <span>Akses Guru Mapel</span>
                        </button>
                      </a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>

          <?php if (file_exists("addon-cek-nilai/cek-nilai.php") && $addon_cek_nilai == "1") { ?>
            <div class="col-md-4 col-sm-6 col-12 kb-search-content">
              <div class="card">
                <a href="#">
                  <img src="desktop/app-assets/images/illustration/undraw_Confirmation_re_b6q5.svg" class="card-img-top mt-4" height="200px" />
                  <div class="card-body text-center">
                    <h4>Cek Nilai</h4>
                    <p class="text-body mt-1 mb-0">Layanan ini merupakan layanan penyampaian informasi kelengkapan nilai kepada peserta didik.</p>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>

          <?php if (file_exists("addon-perpustakaan/perpustakaan.php") && $addon_perpustakaan == "1") { ?>
            <div class="col-md-4 col-sm-6 col-12 kb-search-content">
              <div class="card">
                <a href="#">
                  <img src="desktop/app-assets/images/illustration/undraw_Bookshelves_re_lxoy.svg" class="card-img-top mt-4" height="200px" />
                  <div class="card-body text-center">
                    <h4>Perpustakaan</h4>
                    <p class="text-body mt-1 mb-0">Layanan ini merupakan layanan yang menyediakan berbagai macam ebook.</p>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>

          <?php if (file_exists("addon-konseling/konseling.php") && $addon_konseling == "1") { ?>
            <div class="col-md-4 col-sm-6 col-12 kb-search-content">
              <div class="card">
                <a href="#">
                  <img src="desktop/app-assets/images/illustration/undraw_Selecting_team_re_ndkb.svg" class="card-img-top mt-4" height="200px" />
                  <div class="card-body text-center">
                    <h4>Konseling</h4>
                    <p class="text-body mt-1 mb-0">Layanan ini merupakan layanan perekaman berbagai keluhan dan masalah yang dihadapi oleh peserta didik.</p>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>

          <?php if (file_exists("addon-tabungan/tabungan.php") && $addon_tabungan == "1") { ?>
            <div class="col-md-4 col-sm-6 col-12 kb-search-content">
              <div class="card">
                <a href="#">
                  <img src="desktop/app-assets/images/illustration/undraw_Data_re_80ws.svg" class="card-img-top mt-4" height="200px" />
                  <div class="card-body text-center">
                    <h4>Koperasi dan Bank Sekolah</h4>
                    <p class="text-body mt-1 mb-0">Layanan ini merupakan layanan informasi rekapan koperasi dan bank sekolah.</p>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>

          <?php if (file_exists("addon-rapor/rapor.php") && $addon_rapor == "1") { ?>
            <div class="col-md-4 col-sm-6 col-12 kb-search-content">
              <div class="card">
                <a href="#">
                  <img src="desktop/app-assets/images/illustration/undraw_Receipt_re_fre3.svg" class="card-img-top mt-4" height="200px" />
                  <div class="card-body text-center">
                    <h4>Rapor</h4>
                    <p class="text-body mt-1 mb-0">Layanan ini merupakan layanan penyampaian rapor digital peserta didik.</p>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>

          <?php if (file_exists("addon-kelulusan/app-set-kelulusan.php") && $addon_kelulusan == "1") { ?>

            <div class="col-md-4 col-sm-6 col-12 kb-search-content">
              <div class="card">
                <a href="#">
                  <img src="desktop/app-assets/images/illustration/undraw_certification_aif8.svg" class="card-img-top mt-4" height="200px" />
                  <div class="card-body text-center">
                    <h4>Kelulusan</h4>
                    <p class="text-body mt-1 mb-0">Layanan ini merupakan layanan penyampaian surat kelulusan digital peserta didik.</p>
                  </div>
                </a>
                <div class="row pb-2 justify-content-center">
                  <?php if ($sesi_walas_guru != null) { ?>
                    <div class="col-lg-6 col-12 text-center pt-2">
                      <a href="app-view-kelulusan">
                        <button type="button" class="btn btn-primary btn-sm">
                          <i data-feather="log-in" class="mr-25"></i>
                          <span>Akses Walikelas</span>
                        </button>
                      </a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>

          <?php if (file_exists("addon-saran/saran.php") && $addon_saran == "1") { ?>
            <div class="col-md-4 col-sm-6 col-12 kb-search-content">
              <div class="card">
                <a href="#">
                  <img src="desktop/app-assets/images/illustration/undraw_programming_2svr.svg" class="card-img-top mt-4" height="200px" />
                  <div class="card-body text-center">
                    <h4>Kritik & Saran</h4>
                    <p class="text-body mt-1 mb-0">Beri ulasan untuk pengembangan aplikasi agar lebih baik.</p>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>

        </div>
      </section>
      <!-- Knowledge base ends -->

    </div>
  </div>
</div>