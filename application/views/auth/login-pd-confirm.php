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
              <h2 class="brand-text text-primary text-center fw-bolder mt-2 mb-2">Verifikasi Tanggal Lahir</h2>
              <!-- Brand logo-->

              <?php if ($serverSetting['loginSiswa'] == 1) { ?>

                <?= $this->session->flashdata('notif'); ?>

                <div class="card card-profile shadow-none bg-transparent border-primary">
                  <img src="<?= base_url('assets/') ?>files/images/logo/banner-login.png" class="img-fluid card-img-top" alt="Profile Cover Photo" />
                  <div class="card-body">
                    <div class="profile-image-wrapper">
                      <div class="profile-image">
                        <div class="avatar">
                          <img src="<?= base_url('assets/') ?>files/images/logo/pd-square.png" alt="Profile Picture" />
                        </div>
                      </div>
                    </div>
                    <h5><?= $profilPD['namaLengkap']; ?></h5>
                    <h6><?= jenisKelamin($profilPD['jk']); ?></h6>
                    <div class=" badge badge-light-primary profile-badge"><?= $kelas['kelas']; ?>
                    </div>
                    <hr class="mb-0" />
                    <form class="auth-login-form mt-1" action="<?= base_url('auth/pdLoginConfirm'); ?>" method="POST">
                      <div class="form-group">
                        <label for="tanggalLahirConfirmLogin">Tanggal Lahir</label>
                        <input type="text" name="tanggalLahirConfirmLogin" class="form-control flatpickr-basic" id="tanggalLahirConfirmLogin" placeholder="Tanggal Lahir" autofocus required />
                      </div>
                    </form>
                    <div class="text-center pt-1 mt-1" id="data-pd"></div>
                  </div>
                </div>

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

              <a class="btn btn-outline-danger mb-2 mt-2 w-100" href="#" onclick="history.go(-1)">Kembali</a>

              <?php if ($profilSekolah['twitter'] != null || $profilSekolah['whatsapp'] != null || $profilSekolah['facebook'] != null || $profilSekolah['instagram'] != null || $profilSekolah['youtube'] != null) { ?>
                <div class=" divider my-2 pt-2">
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
          <!-- /Login basic -->
        </div>
      </div>

    </div>
  </div>
</div>
<!-- END: Content-->