    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <div class="auth-wrapper auth-basic px-2">
            <div class="auth-inner my-2">
              <div class="card mb-0">
                <div class="card-body">
                  <h2 class="brand-text text-primary text-center fw-bolder mt-2"><?= $serverSetting['namaAplikasi']; ?><br><small class="fst-italic"><?= $serverSetting['sloganAplikasi']; ?></small></h2>

                  <a href="<?= base_url('/'); ?>" class="brand-logo">
                    <img src="<?= base_url('assets/'); ?>files/images/logo/<?= $profilSekolah['logoSekolah']; ?>" class="img-fluid" width="100" alt="Logo Sekolah">
                  </a>

                  <h2 class="card-title fw-bolder mb-1 mt-2">Hai, Selamat Datang 👋</h2>
                  <p class="card-text mb-2">
                    Silahkan pilih pengguna dan mulailah beraktifitas!
                  </p>

                  <a href="<?= base_url('auth/gtk'); ?>" class="btn btn-primary w-100">Gunakan Aplikasi Sebagai GTK</a>

                  <div class="divider">
                    <div class="divider-text">atau</div>
                  </div>

                  <a href="<?= base_url('auth/pd'); ?>" class="btn btn-primary w-100">Gunakan Aplikasi Sebagai Siswa</a>

                  <p class="text-center mt-2 fw-bolder"><span>PPDB Telah Dibuka ! Yuk Daftar ! </span></p>
                  <a href="auth/registration" class="btn btn-success w-100" tabindex="4">Daftar Gratis Sekarang !</a>

                  <?php if ($profilSekolah['twitter'] != null || $profilSekolah['whatsapp'] != null || $profilSekolah['facebook'] != null || $profilSekolah['instagram'] != null || $profilSekolah['youtube'] != null) { ?>
                    <div class="divider my-2 pt-2">
                      <div class="divider-text">Ikuti Informasi Terupdate <br> di Sosial Media Resmi <br> <?= $profilSekolah['namaSekolah'] ?></div>
                    </div>

                    <div class="auth-footer-btn d-flex justify-content-center">
                      <?php if ($profilSekolah['twitter'] != null) { ?>
                        <a class="btn btn-twitter" href="<?= $profilSekolah['twitter'] ?>"><i data-feather="twitter"></i></a>
                      <?php } ?>
                      <?php if ($profilSekolah['whatsapp'] != null) { ?>
                        <a class="btn btn-success" href="<?= $profilSekolah['whatsapp'] ?>"><i data-feather="message-circle"></i></a>
                      <?php } ?>
                      <?php if ($profilSekolah['facebook'] != null) { ?>
                        <a class="btn btn-facebook" href="<?= $profilSekolah['facebook'] ?>"><i data-feather="facebook"></i></a>
                      <?php } ?>
                      <?php if ($profilSekolah['instagram'] != null) { ?>
                        <a class="btn btn-instagram" href="<?= $profilSekolah['instagram'] ?>"><i data-feather="instagram"></i></a>
                      <?php } ?>
                      <?php if ($profilSekolah['youtube'] != null) { ?>
                        <a class="btn btn-danger" href="<?= $profilSekolah['youtube'] ?>"><i data-feather="youtube"></i></a>
                      <?php } ?>
                    </div>
                  <?php } ?>

                  <p class="text-center mt-2">
                    <span>Copyright &copy; <span id="copyright-year"></span> <?= $profilSekolah['namaSekolah'] ?>. <br> Hak Cipta Dilindungi. </span>
                  </p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- END: Content-->