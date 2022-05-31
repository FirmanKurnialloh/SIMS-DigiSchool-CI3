<!-- BEGIN: Content-->
<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="auth-wrapper auth-cover">
        <div class="auth-inner row m-0">
          <!-- Brand logo-->
          <a class="brand-logo" href="<?= base_url('/'); ?>">
            <img src="<?= base_url('assets/'); ?>files/images/logo/<?= $profilSekolah['logoSekolah']; ?>" width="100" alt="Logo Sekolah">
            <h2 class="brand-text text-primary ms-1 mt-2"><?= $serverSetting['namaAplikasi']; ?><br><?= $profilSekolah['namaSekolah']; ?></h2>
          </a>
          <!-- /Brand logo-->
          <!-- Left Text-->
          <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
              <img class="img-fluid" src="<?= base_url('assets/'); ?>app-assets/images/pages/login-v2.svg" alt="Login V2" />
            </div>
          </div>
          <!-- /Left Text-->
          <!-- Login-->
          <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
              <?php if ($serverSetting['loginGuru'] == 1) { ?>
                <h2 class="card-title fw-bolder mb-1 mt-2">Hai, Selamat Datang 👋</h2>
                <p class="card-text mb-2">Silahkan masuk ke akun Anda dan mulailah beraktifitas !</p>
                <?= $this->session->flashdata('notif'); ?>
                <form class="auth-login-form mt-2" action="<?= base_url('auth/gtk'); ?>" method="POST">
                  <div class="mb-1">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" id="username" type="text" name="username" placeholder="Username" aria-describedby="username" autofocus="" tabindex="1" />
                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="mb-1">
                    <div class="d-flex justify-content-between">
                      <label class="form-label" for="password">Password</label>
                      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalForgotGTK">
                        <small>Lupa Password?</small>
                      </a>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                      <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="Password" aria-describedby="password" tabindex="2" />
                      <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="mb-1" hidden>
                    <div class="form-check">
                      <input class="form-check-input" id="remember-me" type="checkbox" tabindex="3" />
                      <label class="form-check-label" for="remember-me"> Remember Me</label>
                    </div>
                  </div>
                  <button class="btn btn-primary w-100" tabindex="4">Masuk</button>
                </form>
              <?php } else { ?>
                <div class="text-center mb-2 mt-2">
                  <h1 class="display-6 text-danger">SERVER DITUTUP</h1>
                  <h1 class="display-1 text-danger myicon"><i data-feather='x-circle'></i></h1>
                  <p class="card-text text-center">
                    Mohon maaf atas ketidaknyamanannya <br>
                    Saat ini kami sedang melakukan beberapa perbaikan <br>
                    Website akan segera kembali online <br>
                    Silahkan kembali dalam beberapa waktu kedepan! <br>
                    <small>- Tim IT</small>
                  </p>
                </div>
              <?php } ?>

              <a class="btn btn-outline-danger mb-2 mt-2 w-100" href="<?= base_url('auth/logout'); ?>">Kembali</a>

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
                <span>Copyright &copy; <span id="copyright-year"><?= date("Y") ?></span> <?= $profilSekolah['namaSekolah'] ?>. <br> Hak Cipta Dilindungi. </span>
              </p>
            </div>
          </div>
          <!-- /Login-->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END: Content-->