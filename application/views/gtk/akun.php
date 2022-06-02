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
<div class="app-content content">
  <!-- <div class="content-overlay"></div> -->
  <!-- <div class="header-navbar-shadow"></div> -->
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
      <div class="content-header-left col-md-9 col-8 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-start mb-0">Profil</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="<?= base_url('gtk/dashboard'); ?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Profil</li>
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
      <div class="row">
        <div class="col-12">
          <ul class="nav nav-pills mb-2">
            <!-- profil -->
            <li class="nav-item">
              <a class="nav-link " href="<?= base_url('gtk/profil'); ?>">
                <i data-feather="user" class="font-medium-3 me-50"></i>
                <span class="fw-bold">Profil</span>
              </a>
            </li>
            <!-- akun -->
            <li class="nav-item">
              <a class="nav-link active" href="<?= base_url('gtk/akun'); ?>">
                <i data-feather="lock" class="font-medium-3 me-50"></i>
                <span class="fw-bold">Akun</span>
              </a>
            </li>
          </ul>

          <!-- profile -->
          <div class="card">
            <div class="card-header border-bottom">
              <h4 class="card-title">Account Details</h4>
            </div>
            <div class="card-body py-2 my-25">
              <form class="validate-form" action="<?= base_url('gtk/editAkun'); ?>" method="POST">

                <!-- form -->
                <div class="row mt-2 pt-50">
                  <div class="col-12 col-sm-4 mb-1">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $userGTK['username']; ?>" data-msg="Username" required disabled />
                  </div>
                  <div class="col-12 col-sm-4 mb-1">
                    <label class="form-label" for="password">Password Baru</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= $userGTK['password']; ?>" data-msg="Password" required disabled />
                  </div>
                  <div class="col-12 col-sm-4 mb-1">
                    <label class="form-label" for="password2">Ulangi Password</label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password" value="<?= $userGTK['password']; ?>" data-msg="Ulangi Password" required disabled />
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary mt-1 me-1">Simpan Perubahan</button>
                    <button type="reset" class="btn btn-outline-secondary mt-1">Reset</button>
                  </div>
                </div>
              </form>
              <!--/ form -->
            </div>
          </div>

          <!--/ profile -->
        </div>
      </div>

    </div>
  </div>
</div>
<!-- END: Content-->