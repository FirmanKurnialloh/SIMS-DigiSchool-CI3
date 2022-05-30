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
          <!-- Login basic -->
          <div class="card mb-0">
            <div class="card-body">

              <!-- Brand logo-->
              <h2 class="brand-text text-primary text-center fw-bolder mt-2"><?= $serverSetting['namaAplikasi']; ?>
                <br>
                <small class="fst-italic"><?= $serverSetting['sloganAplikasi']; ?></small>
              </h2>
              <a href="<?= base_url('/'); ?>" class="brand-logo">
                <img src="<?= base_url('assets/'); ?>files/images/logo/<?= $profilSekolah['logoSekolah']; ?>" class="img-fluid" width="100" alt="Logo Sekolah">
              </a>
              <!-- Brand logo-->

              <?php if ($serverSetting['loginSiswa'] == 1) { ?>
                <?php if ($serverSetting['tipeLoginSiswa'] == 1) { ?>
                  <!-- Login Method NISN -->
                  <h2 class="card-title fw-bolder mb-1 mt-2">Hai, Selamat Datang 👋</h2>
                  <p class="card-text mb-2">Sebelum Lanjut, Tuliskan <b>NISN</b> dulu yuk!</p>
                  <form class="auth-login-form-1 mt-0" action="authSiswa" method="POST" id="formUserNISN">
                    <div class="mb-1">
                      <label for="nisn" class="form-label">Nomor Induk Siswa Nasional (NISN)</label>
                      <input type="number" class="form-control" id="nisn" name="nisn" placeholder="TULISKAN NISN (6 DIGIT ANGKA)" aria-describedby="nisn" tabindex="1" autocomplete="off" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="10" autofocus required />
                    </div>
                    <div class="text-center pb-0 mb-0" id="divAjax"></div>
                  </form>
                  <!-- Login Method NISN -->

                <?php } else { ?>
                  <!-- Login Method USER PASS -->
                  <h2 class="card-title fw-bolder mb-1 mt-2">Hai, Selamat Datang 👋</h2>
                  <p class="card-text mb-2">Sebelum Lanjut, Tuliskan <b>NISN dan Password</b> dulu yuk!</p>
                  <form class="auth-login-form-2 mt-2" action="authSiswa" method="POST" id="formUserPass">
                    <div class="mb-1">
                      <label for="nisn" class="form-label">Nomor Induk Siswa Nasional (NISN)</label>
                      <input type="number" class="form-control" id="nisn" name="nisn" placeholder="TULISKAN NISN (6 DIGIT ANGKA)" aria-describedby="nisn" tabindex="1" autocomplete="off" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="10" autofocus required />
                    </div>
                    <div class="mb-1">
                      <div class="d-flex justify-content-between">
                        <label class="form-label" for="login-password">Password</label>
                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalForgotPD">
                          <small>Lupa Password?</small>
                        </a>
                      </div>
                      <div class="input-group input-group-merge form-password-toggle">
                        <input type="password" class="form-control form-control-merge" id="login-password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" required />
                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                      </div>
                    </div>
                    <div class="mb-1" hidden>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" />
                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                      </div>
                    </div>
                    <button type="submit" name="submitLoginUserPass" class="btn btn-primary w-100" tabindex="4">Login</button>
                  </form>
                  <!-- Login Method USER PASS -->
                <?php } ?>

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

              <!-- <form class="auth-login-form mt-2" action="index.html" method="POST">
                <div class="mb-1">
                  <label for="login-email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="login-email" name="login-email" placeholder="john@example.com" aria-describedby="login-email" tabindex="1" autofocus />
                </div>

                <div class="mb-1">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="login-password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge form-password-toggle">
                    <input type="password" class="form-control form-control-merge" id="login-password" name="login-password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                  </div>
                </div>
                <div class="mb-1">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>
                <button class="btn btn-primary w-100" tabindex="4">Sign in</button>
              </form> -->

              <a class="btn btn-outline-danger mb-2 mt-2 w-100" href="<?= base_url('/'); ?>">Kembali</a>

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
          <!-- /Login basic -->
        </div>
      </div>

    </div>
  </div>
</div>
<!-- END: Content-->