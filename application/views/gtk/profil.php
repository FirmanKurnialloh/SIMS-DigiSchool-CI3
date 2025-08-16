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
              <a class="nav-link active" href="<?= base_url('gtk/profil'); ?>">
                <i data-feather="user" class="font-medium-3 me-50"></i>
                <span class="fw-bold">Profil</span>
              </a>
            </li>
            <!-- akun -->
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('gtk/akun'); ?>">
                <i data-feather="lock" class="font-medium-3 me-50"></i>
                <span class="fw-bold">Akun</span>
              </a>
            </li>
          </ul>

          <!-- profile -->
          <div class="card">
            <div class="card-header border-bottom">
              <h4 class="card-title">Profil Details</h4>
            </div>
            <div class="card-body py-2 my-25">
              <form class="validate-form" action="<?= base_url('gtk/editProfil'); ?>" method="POST"
                enctype="multipart/form-data">
                <!-- header section -->
                <div class="d-flex">
                  <a href="#" class="me-25">
                    <?php if ($profilGTK['foto'] && file_exists(FCPATH . "assets/files/images/fotoGuru/" . $profilGTK['foto'])) { ?>
                    <img src="<?= base_url('assets/'); ?>files/images/fotoGuru/<?= $profilGTK['foto']; ?>"
                      id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profil image" height="100"
                      width="100" />
                    <?php  } else { ?>
                    <img src="<?= base_url('assets/'); ?>files/images/logo/pd-square.png" id="account-upload-img"
                      class="uploadedAvatar rounded me-50" alt="profil image" height="100" width="100" />
                    <?php } ?>
                  </a>
                  <!-- upload and reset button -->
                  <div class="d-flex align-items-end mt-75 ms-1">
                    <div>
                      <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                      <input type="file" name="fotoGTK" id="account-upload" hidden
                        accept="image/jpeg, image/jpg, image/png" />
                      <button type="button" id="account-reset"
                        class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                      <p class="mb-0">JPEG, JPG, PNG. Max Filesize 1 MB</p>
                    </div>
                  </div>
                  <!--/ upload and reset button -->
                </div>
                <!--/ header section -->

                <!-- form -->
                <div class="row mt-2 pt-50">
                  <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="namaLengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namaLengkap" name="namaLengkap"
                      placeholder="Nama Lengkap" value="<?= $profilGTK['namaLengkap']; ?>"
                      data-msg="Masukan Nama Lengkap" required />
                  </div>
                  <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="namaPanggil">Nama Panggil</label>
                    <input type="text" class="form-control" id="namaPanggil" name="namaPanggil"
                      placeholder="Nama Panggil" value="<?= $profilGTK['namaPanggil']; ?>"
                      data-msg="Masukan Nama Panggil" required />
                  </div>
                  <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="gelarDepan">Gelar Depan</label>
                    <input type="text" class="form-control" id="gelarDepan" name="gelarDepan" placeholder="Gelar Depan"
                      value="<?= $profilGTK['gelarDepan']; ?>" data-msg="Masukan Gelar Depan" />
                  </div>
                  <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="gelarBelakang">Gelar Belakang</label>
                    <input type="text" class="form-control" id="gelarBelakang" name="gelarBelakang"
                      placeholder="Gelar Belakang" value="<?= $profilGTK['gelarBelakang']; ?>"
                      data-msg="Masukan Gelar Belakang" />
                  </div>
                  <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="jenisKelamin">Jenis Kelamin</label>
                    <select id="jenisKelamin" name="jenisKelamin" class="select2 form-select">
                      <?php if ($profilGTK['jk'] == null) { ?>
                      <option value="" selected disabled>Pilih Jenis Kelamin</option>
                      <option value="L">Laki - Laki</option>
                      <option value="P">Perempuan</option>
                      <?php } elseif ($profilGTK['jk'] == "L") { ?>
                      <option value="" disabled>Pilih Jenis Kelamin</option>
                      <option value="L" selected>Laki - Laki</option>
                      <option value="P">Perempuan</option>
                      <?php } elseif ($profilGTK['jk'] == "P") { ?>
                      <option value="" disabled>Pilih Jenis Kelamin</option>
                      <option value="L">Laki - Laki</option>
                      <option value="P" selected>Perempuan</option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="nik">NIK</label>
                    <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukan 16 Digit Angka"
                      value="<?= $profilGTK['nik']; ?>" data-msg="Masukan 16 Digit Angka" maxlength="16"
                      minlength="16" />
                  </div>
                  <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="nip">NIP</label>
                    <input type="number" class="form-control" id="nip" name="nip" placeholder="Masukan 18 Digit Angka"
                      value="<?= $profilGTK['nip']; ?>" data-msg="Masukan 18 Digit Angka" maxlength="18"
                      minlength="18" />
                  </div>
                  <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="nuptk">NUPTK</label>
                    <input type="number" class="form-control" id="nuptk" name="nuptk"
                      placeholder="Masukan 16 Digit Angka" value="<?= $profilGTK['nuptk']; ?>"
                      data-msg="Masukan 16 Digit Angka" maxlength="16" minlength="16" />
                  </div>
                  <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="nukg">Nomor UKG</label>
                    <input type="number" class="form-control" id="nukg" name="nukg" placeholder="Masukan 12 Digit Angka"
                      value="<?= $profilGTK['nukg']; ?>" data-msg="Masukan 12 Digit Angka" maxlength="12"
                      minlength="12" />
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
