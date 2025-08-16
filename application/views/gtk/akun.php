<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
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
          <a href="#" type="button" class="btn btn-sm btn-primary" onclick="history.go(-1)">
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
            <div class="card-body">
              <form class="validate-form" action="<?= base_url('gtk/editAkun'); ?>" method="POST">
                <!-- form -->
                <div class="row">
                  <div class="col-12 col-sm-4 mb-1">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username" placeholder="Username"
                      value="<?= $sessionUser; ?>" data-msg="Username" required disabled />
                  </div>
                  <div class="col-12 col-sm-4 mb-1">
                    <label class="form-label" for="password">Password Baru</label>
                    <div class="input-group input-group-merge form-password-toggle">
                      <input class="form-control form-control-merge" id="password" type="password" name="password"
                        value="" placeholder="Password" data-msg="Password Baru Minimal 8 Karakter" minlength="8"
                        required />
                      <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                  </div>
                  <div class="col-12 col-sm-4 mb-1">
                    <label class="form-label" for="password2">Ulangi Password Baru</label>
                    <div class="input-group input-group-merge form-password-toggle">
                      <input class="form-control form-control-merge" id="password2" type="password" name="password2"
                        value="" placeholder="Ulangi Password Baru" data-msg="Ulangi Password Baru Minimal 8 Karakter"
                        minlength="8" required />
                      <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
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