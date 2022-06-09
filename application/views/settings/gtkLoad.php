<div class="row">
  <!-- Data Akun GTK Card -->
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Data Akun GTK</h4>
        <span class="d-flex justify-content-between">
          <a href=" javascript:void(0)" type="button" class="btn btn-sm btn-primary ms-1" data-bs-id="tambahData" id="tambahDataButton" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
            Tambah Data Akun GTK
          </a>
          <a href="javascript:void(0)" type="button" class="btn btn-sm btn-success ms-1" data-bs-id="importData" id="importDataButton" data-bs-toggle="modal" data-bs-target="#soonFeature">
            Import Data Akun GTK
          </a>
          <a href="javascript:void(0)" type="button" class="btn btn-sm btn-danger ms-1" id="resetDataGTK">
            Reset Data Akun GTK
          </a>
        </span>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tambahDataModal">Tambah Data Akun GTK</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="validate-form" action="<?= base_url('settings/tambahAkunGTK'); ?>" method="POST">
              <div class="modal-body">
                <div class="alert alert-primary" role="alert">
                  <div class="alert-body">
                    <strong>Tips:
                      <li>
                        Username Akun GTK dapat berupa Email atau Huruf dan Angka
                      </li>
                      <li>
                        Password Default <u>#MerdekaBelajar!</u>
                      </li>
                      <li>
                        Nama Panggil tidak perlu memasukan "Pak/Bu", sistem otomatis mengenali dari jenis kelamin
                      </li>
                      <li>
                        Penulisan Gelar harap disesuaikan dengan baik dan benar seperti Dr. / S.Pd. / S.Pd., M.Pd.
                      </li>
                    </strong>
                  </div>
                </div>
                <div class="row">
                  <!-- Nama Lengkap input -->
                  <div class="mb-1 col-lg-6 col-12">
                    <label class="form-label" for="namaLengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namaLengkap" placeholder="Nama Lengkap" name="namaLengkap" required data-msg="Masukan Nama Lengkap" autocomplete="off" />
                  </div>
                  <!-- Nama Panggil input -->
                  <div class="mb-1 col-lg-6 col-12">
                    <label class="form-label" for="namaPanggil">Nama Panggil</label>
                    <input type="text" class="form-control" id="namaPanggil" placeholder="Nama Panggil" name="namaPanggil" required data-msg="Masukan Nama Panggil" autocomplete="off" />
                  </div>
                  <!-- Gelar Depan input -->
                  <div class="mb-1 col-lg-3 col-12">
                    <label class="form-label" for="gelarDepan">Gelar Depan</label>
                    <input type="text" class="form-control" id="gelarDepan" placeholder="Gelar Depan" name="gelarDepan" autocomplete="off" />
                  </div>
                  <!-- Gelar Belakang input -->
                  <div class="mb-1 col-lg-3 col-12">
                    <label class="form-label" for="gelarBelakang">Gelar Belakang</label>
                    <input type="text" class="form-control" id="gelarBelakang" placeholder="Gelar Belakang" name="gelarBelakang" autocomplete="off" />
                  </div>
                  <!-- Jenis Kelamin input -->
                  <div class="mb-1 col-lg-6 col-12">
                    <label for="Jenis Kelamin">Jenis Kelamin</label>
                    <select class="select2 hide-search form-control" id="jk" name="jenisKelamin" required data-placeholder="Pilih Jenis Kelamin" data-msg="Pilih Jenis Kelamin" autocomplete="off">
                      <option></option>
                      <optgroup label="Pilih Jenis Kelamin">
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                      </optgroup>
                    </select>
                  </div>
                  <!-- Username input -->
                  <div class="mb-1 col-lg-6 col-12">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username" minlength="5" required data-msg="Masukan Username" autocomplete="off" />
                  </div>
                  <!-- Password input -->
                  <div class="mb-1 col-lg-6 col-12">
                    <label class="form-label" for="password">Password</label>
                    <input type="text" class="form-control" id="password" placeholder="#MerdekaBelajar!" name="password" required readonly disabled autocomplete="off" />
                  </div>
                </div>
                <div class="row">
                  <div class="mb-1 col-lg-6 col-12">
                    <!-- Hak Akses 1 input -->
                    <div class="mb-1 col-12">
                      <label for="hakAkses1">Hak Akses 1</label>
                      <select class="select2 hide-search form-control" id="hakAkses1" name="hakAkses1" required data-placeholder="Pilih Hak Akses 1" data-msg="Pilih Hak Akses 1">
                        <option></option>
                        <optgroup label="Pilih Hak Akses">
                          <option value="1">Admin</option>
                          <option value="2">Operator</option>
                          <option value="3">Kepala Sekolah</option>
                          <option value="4">Tenaga Administrasi</option>
                          <option value="5">Guru</option>
                          <option value="6">Walikelas</option>
                          <option value="7">Pelatih Ekstrakurikuler</option>
                          <option value="8">Pengelola Koperasi</option>
                          <option value="9">Pegawai Koperasi</option>
                        </optgroup>
                      </select>
                    </div>
                    <!-- Kelas input -->
                    <div class="mb-1 col-12" id="divKelas" style="display: none;">
                      <label for="kelas">Pilih Kelas</label>
                      <select class="select2 hide-search form-control" id="selectKelas" name="kelas" data-placeholder="Pilih Kelas" data-msg="Pilih Kelas">
                        <option></option>
                        <optgroup label="Pilih Kelas">
                          <?php
                          $query = getSelect('setting_kelas', '*', 'LENGTH(level), level, LENGTH(kelas), kelas', 'asc');
                          if ($query->num_rows() >= 1) {
                            $data = $query->result_array();
                            foreach ($data as $data) {
                              $id          = $data['id'];
                              $level       = $data['level'];
                              $kelas       = $data['kelas'];
                          ?>
                              <option value="<?= $id ?>"><?= $kelas ?></option>
                            <?php }
                          } else { ?>
                            <option value="">Tidak ada Kelas</option>
                          <?php }; ?>
                        </optgroup>
                      </select>
                    </div>
                    <!-- Ekstrakurikuler input -->
                    <div class="mb-1 col-12" id="divEkskul" style="display: none;">
                      <label for="ekskul">Pilih Ekstrakurikuler</label>
                      <select class="select2 hide-search form-control" id="selectEkskul" name="ekskul" data-placeholder="Pilih Ekstrakurikuler" data-msg="Pilih Ekstrakurikuler">
                        <option></option>
                        <optgroup label="Pilih Ekstrakurikuler">
                          <?php
                          $query = getSelect('setting_ekskul', '*', 'id', 'asc');
                          if ($query->num_rows() >= 1) {
                            $data = $query->result_array();
                            foreach ($data as $data) {
                              $id          = $data['id'];
                              $namaEkskul  = $data['namaEkskul'];
                          ?>
                              <option value="<?= $id ?>"><?= $namaEkskul ?></option>
                            <?php }
                          } else { ?>
                            <option value="">Tidak ada Ekstrakurikuler</option>
                          <?php }; ?>
                        </optgroup>
                      </select>
                    </div>
                  </div>
                  <div class="mb-1 col-lg-6 col-12">
                    <!-- Hak Akses 2 input -->
                    <div class="mb-1 col-12">
                      <label for="hakAkses2">Hak Akses 2</label>
                      <select class="select2 hide-search form-control" id="hakAkses2" name="hakAkses2" data-placeholder="Pilih Hak Akses 2" data-msg="Pilih Hak Akses 2">
                        <option></option>
                        <optgroup label="Pilih Hak Akses">
                          <option value="1">Admin</option>
                          <option value="2">Operator</option>
                          <option value="3">Kepala Sekolah</option>
                          <option value="4">Tenaga Administrasi</option>
                          <option value="5">Guru</option>
                          <option value="6">Walikelas</option>
                          <option value="7">Pelatih Ekstrakurikuler</option>
                          <option value="8">Pengelola Koperasi</option>
                          <option value="9">Pegawai Koperasi</option>
                        </optgroup>
                      </select>
                    </div>
                    <!-- Pilih Kelas input -->
                    <div class="mb-1 col-12" id="divKelas2" style="display: none;">
                      <label for="kelas2">Pilih Kelas</label>
                      <select class="select2 hide-search form-control" id="selectKelas2" name="kelas2" data-placeholder="Pilih Kelas" data-msg="Pilih Kelas">
                        <option></option>
                        <optgroup label="Pilih Kelas">
                          <?php
                          $query = getSelect('setting_kelas', '*', 'LENGTH(level), level, LENGTH(kelas), kelas', 'asc');
                          if ($query->num_rows() >= 1) {
                            $data = $query->result_array();
                            foreach ($data as $data) {
                              $id          = $data['id'];
                              $level       = $data['level'];
                              $kelas       = $data['kelas'];
                          ?>
                              <option value="<?= $id ?>"><?= $kelas ?></option>
                            <?php }
                          } else { ?>
                            <option value="">Tidak ada Kelas</option>
                          <?php }; ?>
                        </optgroup>
                      </select>
                    </div>
                    <!-- Ekstrakurikuler input -->
                    <div class="mb-1 col-12" id="divEkskul2" style="display: none;">
                      <label for="ekskul2">Pilih Ekstrakurikuler</label>
                      <select class="select2 hide-search form-control" id="selectEkskul2" name="ekskul2" data-placeholder="Pilih Ekstrakurikuler" data-msg="Pilih Ekstrakurikuler">
                        <option></option>
                        <optgroup label="Pilih Ekstrakurikuler">
                          <?php
                          $query = getSelect('setting_ekskul', '*', 'id', 'asc');
                          if ($query->num_rows() >= 1) {
                            $data = $query->result_array();
                            foreach ($data as $data) {
                              $id          = $data['id'];
                              $namaEkskul  = $data['namaEkskul'];
                          ?>
                              <option value="<?= $id ?>"><?= $namaEkskul ?></option>
                            <?php }
                          } else { ?>
                            <option value="">Tidak ada Ekstrakurikuler</option>
                          <?php }; ?>
                        </optgroup>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- Pilih Kelas input -->

                <div class="modal-footer">
                  <!-- Aktif input -->
                  <div class="mb-0">
                    <label>Aktifkan? &nbsp;</label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="aktif1" value="1" name="is_aktif" required data-msg="Pilih Status" />
                      <label class="form-check-label" for="aktif1">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="aktif0" value="0" name="is_aktif" required data-msg="Pilih Status" />
                      <label class="form-check-label" for="aktif0">Tidak</label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary">Tambah Data</button>
                  <button type="reset" class="btn btn-sm btn-outline-secondary">Reset</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <?php
      if (getUserGTK()->num_rows() <= 0) { ?>
        <div class="text-center">
          <h3 class="text-danger">Tidak Ada Data <br> </h3>
          <h3 class="text-danger myicon"><i data-feather='x-circle' style="width: 100;"></i></h3>
          <h4 class="mb-3 mt-2">Silahkan Tambah Data Akun GTK</h4>
        </div>
      <?php } else { ?>
        <div class="card-body">
          <table class="dataTabel table table-hover table-responsive compact" style="height: 450px;">
            <thead class="text-center">
              <tr>
                <th style="width: 0%;">NO</th>
                <th style="width: 10%;">GTK</th>
                <th style="width: 1%;">Status</th>
                <th style="width: 1%;">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-left">
              <?php
              $no = 1;
              foreach (getUserGTK()->result_array() as $i) :
                $id_user       = $i['id'];
                $username      = $i['username'];
                $password      = $i['password'];
                $namaLengkap   = $i['namaLengkap'];
                $is_active     = $i['is_active'];

                if ($i['role_id_1']) {
                  $role_id_1     = $i['role_id_1'];
                  $role_1        = getPeran($role_id_1);

                  if ($role_id_1 == '6') {
                    $statusRole = getWhere('setting_kelas', 'kelas', ['walikelas' => $username])->row('kelas');
                  } elseif ($role_id_1 == '7') {
                    $statusRole = getWhere('setting_ekskul', 'namaEkskul', ['pelatih' => $username])->row('namaEkskul');
                  } else {
                    $statusRole =  "";
                  }
                }

                if ($i['role_id_2']) {
                  $role_id_2     = $i['role_id_2'];
                  $role_2        = getPeran($role_id_2);

                  if ($role_id_2 == '6') {
                    $statusRole2 = getWhere('setting_kelas', 'kelas', ['walikelas' => $username])->row('kelas');
                  } elseif ($role_id_2 == '7') {
                    $statusRole2 = getWhere('setting_ekskul', 'namaEkskul', ['pelatih' => $username])->row('namaEkskul');
                  } else {
                    $statusRole2 =  "";
                  }
                }

                $profilGTK     = getProfilGTK($username);
                if ($profilGTK) {
                  $namaLengkap   = $profilGTK['namaLengkap'];
                  $namaPanggil   = $profilGTK['namaPanggil'];
                  $gelarDepan    = $profilGTK['gelarDepan'];
                  $jk            = $profilGTK['jk'];
                  if ($profilGTK['gelarBelakang']) {
                    $gelarBelakang = ', ' . $profilGTK['gelarBelakang'];
                  } else {
                    $gelarBelakang = "";
                  }
                  $namaGelar     = $gelarDepan . ' ' . $namaLengkap . $gelarBelakang;
                  $foto          = $profilGTK['foto'];
                } else {
                  $namaGTK        = $i['namaLengkap'];
                  $namaPanggil   = "";
                  $gelarDepan    = "";
                  $gelarBelakang = "";
                  $foto          = "";
                }
              ?>
                <tr>
                  <td class="align-items-center">
                    <?= $no++ ?>
                  </td>
                  <td>
                    <div class="d-flex justify-content-left align-items-center">
                      <div class="avatar-wrapper me-1">
                        <?php if ($foto && file_exists(FCPATH . "assets/files/images/fotoGuru/" . $foto)) { ?>
                          <img src="<?= base_url('assets/'); ?>files/images/fotoGuru/<?= $foto; ?>" alt="Avatar" height="32" width="32">
                        <?php  } else { ?>
                          <div class="avatar bg-light-<?= warnaPeran($role_1); ?>">
                            <div class="avatar-content"><?= namaInisial($namaLengkap); ?></div>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="d-flex flex-column">
                        <a href="<?= base_url('profil/gtk/') . $id; ?>" class="user_name text-body text-truncate">
                          <?php if ($profilGTK) { ?>
                            <span class="fw-bolder"><?= $namaGelar ?></span>
                          <?php } else { ?>
                            <span class="fw-bolder"><?= $namaLengkap ?></span>
                          <?php } ?>
                        </a><small class="emp_post text-muted"><?= $username ?></small>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex justify-content-left align-items-center">
                      <?php if (!$profilGTK) { ?>
                        <span class="badge bg-secondary me-1">
                          <i data-feather="alert-triangle" class="me-25"></i>
                          <span>Profil Tidak Tersedia</span>
                        </span>
                      <?php }; ?>
                      <?php if ($i['role_id_1']) { ?>
                        <div class="d-flex justify-content-left align-items-center">
                          <span class="badge bg-<?= warnaPeran($role_1); ?> me-1">
                            <i data-feather="<?= iconPeran($role_1); ?>" class="me-25"></i>
                            <span><?= $role_1 . ' ' . $statusRole ?></span>
                          </span>
                        <?php }; ?>
                        <?php if ($i['role_id_2']) { ?>
                          <span class="badge bg-<?= warnaPeran($role_2); ?> me-1">
                            <i data-feather="<?= iconPeran($role_2); ?>" class="me-25"></i>
                            <span><?= $role_2 . ' ' . $statusRole2 ?></span>
                          </span>
                        <?php }; ?>
                        </div>
                  </td>
                  <td>
                    <div class="d-flex justify-content-left align-items-center">
                      <button type="button" class="btn btn-sm btn-icon rounded-circle btn-info me-1" aria-expanded="false" data-bs-id="updateDataButton<?= $id_user; ?>" id="updateDataButton<?= $id_user; ?>" data-bs-toggle="modal" data-bs-target="#updateDataModal<?= $id_user; ?>">
                        <i data-feather='edit'></i>
                      </button>
                      <?php if ($sessionUser != $username) { ?>
                        <button type="button" class="btn btn-sm btn-icon rounded-circle btn-success me-1" aria-expanded="false" data-username="<?= $username; ?>" id="resetPassGTK">
                          <i data-feather='refresh-cw'></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-icon rounded-circle btn-danger me-1" aria-expanded="false" data-username="<?= $username; ?>" id="hapusAkunGTK">
                          <i data-feather="trash"></i>
                        </button>
                      <?php } ?>
                      <?php if ($sessionUser != $username && $is_active == "0") { ?>
                        <form id="switchActivateGTKForm<?= $id ?>" action="<?= base_url('settings/switchActivateGTK') ?>" method="POST">
                          <div class="form-switch">
                            <input type="checkbox" class="form-check-input" id="switchActivateGTK" onclick="document.getElementById('switchActivateGTKForm<?= $id_user; ?>').submit();" />
                            <input type="text" name="username" value="<?= $username ?>" hidden />
                            <input type="text" name="is_aktif" id="statusActivateGTK" value="0" hidden />
                            <sub id="LabelswitchActivateGTK">Tidak Aktif</sub>
                          </div>
                        </form>
                      <?php } elseif ($sessionUser != $username && $is_active == "1") { ?>
                        <form id="switchActivateGTKForm<?= $id ?>" action="<?= base_url('settings/switchActivateGTK') ?>" method="POST">
                          <div class="form-switch">
                            <input type="checkbox" class="form-check-input" id="switchActivateGTK" checked onclick="document.getElementById('switchActivateGTKForm<?= $id_user; ?>').submit();" />
                            <input type="text" name="username" value="<?= $username ?>" hidden />
                            <input type="text" name="is_aktif" id="statusActivateGTK" value="1" hidden />
                            <sub id="LabelswitchActivateGTK">Aktif</sub>
                          </div>
                        </form>
                      <?php } ?>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="updateDataModal<?= $id_user; ?>" tabindex="-1" aria-labelledby="updateDataModal" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="updateDataModal">Edit Akun <?= $username ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form class="validate-form" action="<?= base_url('settings/editAkunGTK'); ?>" method="POST">
                            <div class="modal-body">
                              <div class="alert alert-primary" role="alert">
                                <div class="alert-body">
                                  <strong>Tips:
                                    <li>
                                      Username Akun GTK dapat berupa Email atau Huruf dan Angka
                                    </li>
                                    <li>
                                      Password Default <u>#MerdekaBelajar!</u>
                                    </li>
                                    <li>
                                      Nama Panggil tidak perlu memasukan "Pak/Bu", sistem otomatis mengenali dari jenis kelamin
                                    </li>
                                    <li>
                                      Penulisan Gelar harap disesuaikan dengan baik dan benar seperti Dr. / S.Pd. / S.Pd., M.Pd.
                                    </li>
                                  </strong>
                                </div>
                              </div>
                              <div class="row">
                                <!-- Nama Lengkap input -->
                                <div class="mb-1 col-lg-6 col-12">
                                  <label class="form-label" for="namaLengkap">Nama Lengkap</label>
                                  <input type="text" class="form-control" id="namaLengkap" placeholder="Nama Lengkap" name="namaLengkap" value="<?= $namaLengkap; ?>" required />
                                </div>
                                <!-- Nama Panggil input -->
                                <div class="mb-1 col-lg-6 col-12">
                                  <label class="form-label" for="namaPanggil">Nama Panggil</label>
                                  <input type="text" class="form-control" id="namaPanggil" placeholder="Nama Panggil" name="namaPanggil" value="<?= $namaPanggil; ?>" required />
                                </div>
                                <!-- Gelar Depan input -->
                                <div class="mb-1 col-lg-3 col-12">
                                  <label class="form-label" for="gelarDepan">Gelar Depan</label>
                                  <input type="text" class="form-control" id="gelarDepan" placeholder="Gelar Depan Contoh : Dr. Ir. H." name="gelarDepan" value="<?= $gelarDepan; ?>" />
                                </div>
                                <!-- Gelar Belakang input -->
                                <div class="mb-1 col-lg-3 col-12">
                                  <label class="form-label" for="gelarBelakang">Gelar Belakang</label>
                                  <input type="text" class="form-control" id="gelarBelakang" placeholder="Gelar Belakang Contoh : S.Pd. M.Pd." name="gelarBelakang" value="<?= $profilGTK['gelarBelakang']; ?>" />
                                </div>
                                <!-- Jenis Kelamin input -->
                                <div class="mb-1 col-lg-6 col-12">
                                  <label for="Jenis Kelamin<?= $id_user ?>">Jenis Kelamin</label>
                                  <select class="select2 hide-search form-control" id="jenisKelamin<?= $id_user ?>" name="jenisKelamin" required data-placeholder="Pilih Jenis Kelamin">
                                    <option value="<?= $jk ?>"><?= jenisKelamin($jk) ?></option>
                                    <optgroup label="Pilih Jenis Kelamin">
                                      <option value="L">Laki-Laki</option>
                                      <option value="P">Perempuan</option>
                                    </optgroup>
                                  </select>
                                </div>
                                <!-- Username input -->
                                <div class="mb-1 col-lg-6 col-12">
                                  <label class="form-label" for="username">Username</label>
                                  <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?= $username; ?>" minlength="5" required readonly />
                                </div>
                                <!-- Password input -->
                                <div class="mb-1 col-lg-6 col-12">
                                  <label class="form-label" for="password">Password</label>
                                  <input type="text" class="form-control" id="password" placeholder="#MerdekaBelajar!" name="password" required readonly disabled />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-12">
                                  <!-- Hak Akses 1 input -->
                                  <div class="mb-1 col-12">
                                    <label for="hakAkses1Edit<?= $id_user ?>">Hak Akses 1</label>
                                    <select class="select2 hide-search form-control" id="hakAkses1Edit<?= $id_user ?>" name="hakAkses1" required data-placeholder="Pilih Hak Akses 1" data-msg="Pilih Hak Akses 1">
                                      <option></option>
                                      <optgroup label="Pilih Hak Akses">
                                        <option value="1">Admin</option>
                                        <option value="2">Operator</option>
                                        <option value="3">Kepala Sekolah</option>
                                        <option value="4">Tenaga Administrasi</option>
                                        <option value="5">Guru</option>
                                        <option value="6">Walikelas</option>
                                        <option value="7">Pelatih Ekstrakurikuler</option>
                                        <option value="8">Pengelola Koperasi</option>
                                        <option value="9">Pegawai Koperasi</option>
                                      </optgroup>
                                    </select>
                                  </div>
                                  <!-- Kelas input -->
                                  <div class="mb-1 col-12" id="divKelasEdit<?= $id_user ?>" style="display: none;">
                                    <label for="selectKelasEdit<?= $id_user ?>">Pilih Kelas</label>
                                    <select class="select2 hide-search form-control" id="selectKelasEdit<?= $id_user ?>" name="kelas" data-placeholder="Pilih Kelas" data-msg="Pilih Kelas">
                                      <option></option>
                                      <optgroup label="Pilih Kelas">
                                        <?php
                                        $query = getSelect('setting_kelas', '*', 'LENGTH(level), level, LENGTH(kelas), kelas', 'asc');
                                        if ($query->num_rows() >= 1) {
                                          $data = $query->result_array();
                                          foreach ($data as $data) {
                                            $id          = $data['id'];
                                            $level       = $data['level'];
                                            $kelas       = $data['kelas'];
                                        ?>
                                            <option value="<?= $id ?>"><?= $kelas ?></option>
                                          <?php }
                                        } else { ?>
                                          <option value="">Tidak ada Kelas</option>
                                        <?php }; ?>
                                      </optgroup>
                                    </select>
                                  </div>
                                  <!-- Ekstrakurikuler input -->
                                  <div class="mb-1 col-12" id="divEkskulEdit<?= $id_user ?>" style="display: none;">
                                    <label for="selectEkskulEdit<?= $id_user ?>">Pilih Ekstrakurikuler</label>
                                    <select class="select2 hide-search form-control" id="selectEkskulEdit<?= $id_user ?>" name="ekskul" data-placeholder="Pilih Ekstrakurikuler" data-msg="Pilih Ekstrakurikuler">
                                      <option></option>
                                      <optgroup label="Pilih Ekstrakurikuler">
                                        <?php
                                        $query = getSelect('setting_ekskul', '*', 'id', 'asc');
                                        if ($query->num_rows() >= 1) {
                                          $data = $query->result_array();
                                          foreach ($data as $data) {
                                            $id          = $data['id'];
                                            $namaEkskul  = $data['namaEkskul'];
                                        ?>
                                            <option value="<?= $id ?>"><?= $namaEkskul ?></option>
                                          <?php }
                                        } else { ?>
                                          <option value="">Tidak ada Ekstrakurikuler</option>
                                        <?php }; ?>
                                      </optgroup>
                                    </select>
                                  </div>
                                </div>
                                <div class="mb-1 col-lg-6 col-12">
                                  <!-- Hak Akses 2 input -->
                                  <div class="mb-1 col-12">
                                    <label for="hakAkses2Edit<?= $id_user ?>">Hak Akses 2</label>
                                    <select class="select2 hide-search form-control" id="hakAkses2Edit<?= $id_user ?>" name="hakAkses2" data-placeholder="Pilih Hak Akses 2" data-msg="Pilih Hak Akses 2">
                                      <option></option>
                                      <optgroup label="Pilih Hak Akses">
                                        <option value="1">Admin</option>
                                        <option value="2">Operator</option>
                                        <option value="3">Kepala Sekolah</option>
                                        <option value="4">Tenaga Administrasi</option>
                                        <option value="5">Guru</option>
                                        <option value="6">Walikelas</option>
                                        <option value="7">Pelatih Ekstrakurikuler</option>
                                        <option value="8">Pengelola Koperasi</option>
                                        <option value="9">Pegawai Koperasi</option>
                                      </optgroup>
                                    </select>
                                  </div>
                                  <!-- Pilih Kelas input -->
                                  <div class="mb-1 col-12" id="divKelas2Edit<?= $id_user ?>" style="display: none;">
                                    <label for="selectKelas2Edit<?= $id_user ?>">Pilih Kelas</label>
                                    <select class="select2 hide-search form-control" id="selectKelas2Edit<?= $id_user ?>" name="kelas2" data-placeholder="Pilih Kelas" data-msg="Pilih Kelas">
                                      <option></option>
                                      <optgroup label="Pilih Kelas">
                                        <?php
                                        $query = getSelect('setting_kelas', '*', 'LENGTH(level), level, LENGTH(kelas), kelas', 'asc');
                                        if ($query->num_rows() >= 1) {
                                          $data = $query->result_array();
                                          foreach ($data as $data) {
                                            $id          = $data['id'];
                                            $level       = $data['level'];
                                            $kelas       = $data['kelas'];
                                        ?>
                                            <option value="<?= $id ?>"><?= $kelas ?></option>
                                          <?php }
                                        } else { ?>
                                          <option value="">Tidak ada Kelas</option>
                                        <?php }; ?>
                                      </optgroup>
                                    </select>
                                  </div>
                                  <!-- Ekstrakurikuler input -->
                                  <div class="mb-1 col-12" id="divEkskul2Edit<?= $id_user ?>" style="display: none;">
                                    <label for="selectEkskul2Edit<?= $id_user ?>">Pilih Ekstrakurikuler</label>
                                    <select class="select2 hide-search form-control" id="selectEkskul2Edit<?= $id_user ?>" name="ekskul2" data-placeholder="Pilih Ekstrakurikuler" data-msg="Pilih Ekstrakurikuler">
                                      <option></option>
                                      <optgroup label="Pilih Ekstrakurikuler">
                                        <?php
                                        $query = getSelect('setting_ekskul', '*', 'id', 'asc');
                                        if ($query->num_rows() >= 1) {
                                          $data = $query->result_array();
                                          foreach ($data as $data) {
                                            $id          = $data['id'];
                                            $namaEkskul  = $data['namaEkskul'];
                                        ?>
                                            <option value="<?= $id ?>"><?= $namaEkskul ?></option>
                                          <?php }
                                        } else { ?>
                                          <option value="">Tidak ada Ekstrakurikuler</option>
                                        <?php }; ?>
                                      </optgroup>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <!-- Aktif input -->
                                <div class="mb-0">
                                  <label>Aktifkan? &nbsp;</label>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="aktif1" value="1" name="is_aktif" required />
                                    <label class="form-check-label" for="aktif1">Ya</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="aktif0" value="0" name="is_aktif" required />
                                    <label class="form-check-label" for="aktif0">Tidak</label>
                                  </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Update Data</button>
                                <button type="reset" class="btn btn-sm btn-outline-secondary">Reset</button>
                              </div>
                              <script>
                                $('#hakAkses1Edit<?= $id_user; ?> ').on('change', function() {
                                  if (this.value == '6') {
                                    $('#divKelasEdit<?= $id_user; ?> ').show(0);
                                    $("#selectKelasEdit<?= $id_user; ?> ").attr("required", true);
                                    $('#divEkskulEdit<?= $id_user; ?> ').hide(0);
                                    $('#divEkskulEdit<?= $id_user; ?> ').val('');
                                    $("#selectEkskulEdit<?= $id_user; ?> ").attr("required", false);
                                  } else if (this.value == '7') {
                                    $('#divEkskulEdit<?= $id_user; ?> ').show(0);
                                    $("#selectEkskulEdit<?= $id_user; ?> ").attr("required", true);
                                    $('#divKelasEdit<?= $id_user; ?> ').hide(0);
                                    $('#divKelasEdit<?= $id_user; ?> ').val('');
                                    $("#selectKelasEdit<?= $id_user; ?> ").attr("required", false);
                                  } else {
                                    $('#divKelasEdit<?= $id_user; ?> ').hide(0);
                                    $('#divKelasEdit<?= $id_user; ?> ').val('');
                                    $("#selectKelasEdit<?= $id_user; ?> ").attr("required", false);
                                    $('#divEkskulEdit<?= $id_user; ?> ').hide(0);
                                    $('#divEkskulEdit<?= $id_user; ?> ').val('');
                                    $("#selectEkskulEdit<?= $id_user; ?> ").attr("required", false);
                                  }
                                });

                                $('#hakAkses2Edit<?= $id_user; ?> ').on('change', function() {
                                  if (this.value == '6') {
                                    $('#divKelas2Edit<?= $id_user; ?> ').show(0);
                                    $("#selectKelas2Edit<?= $id_user; ?> ").attr("required", true);
                                    $('#divEkskul2Edit<?= $id_user; ?> ').hide(0);
                                    $('#divEkskul2Edit<?= $id_user; ?> ').val('');
                                    $("#selectEkskul2Edit<?= $id_user; ?> ").attr("required", false);
                                  } else if (this.value == '7') {
                                    $('#divEkskul2Edit<?= $id_user; ?> ').show(0);
                                    $("#selectEkskul2Edit<?= $id_user; ?> ").attr("required", true);
                                    $('#divKelas2Edit<?= $id_user; ?> ').hide(0);
                                    $('#divKelas2Edit<?= $id_user; ?> ').val('');
                                    $("#selectKelas2Edit<?= $id_user; ?> ").attr("required", false);
                                  } else {
                                    $('#divKelas2Edit<?= $id_user; ?> ').hide(0);
                                    $('#divKelas2Edit<?= $id_user; ?> ').val('');
                                    $("#selectKelas2Edit<?= $id_user; ?> ").attr("required", false);
                                    $('#divEkskul2Edit<?= $id_user; ?> ').hide(0);
                                    $('#divEkskul2Edit<?= $id_user; ?> ').val('');
                                    $("#selectEkskul2Edit<?= $id_user; ?> ").attr("required", false);
                                  }
                                });
                              </script>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Modal -->
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>

        </div>
      <?php } ?>
      <!--/ Data Akun GTK Card -->

    </div>
  </div>
</div>
<script src="<?= base_url('assets/'); ?>assets/js/scripts.js"></script>
<script>
  if (feather) {
    feather.replace({
      width: 14,
      height: 14
    });
  }

  $('.dataTabel').DataTable({
    "order": [
      [0, "asc"]
    ],
    "autoWidth": true,
    pageLength: 10,
    "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "All"]
    ],
    "language": {
      "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
    }
  });

  var select2 = $('.select2');
  if (select2.length) {
    select2.each(function() {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        dropdownParent: $this.parent()
      });
    });
  }

  var hideSearch = $('.hide-search');
  hideSearch.select2({
    minimumResultsForSearch: Infinity
  });

  $('#hakAkses1').on('change', function() {
    if (this.value == '6') {
      $('#divKelas').show(0);
      $("#selectKelas").attr("required", true);
      $('#divEkskul').hide(0);
      $('#divEkskul').val('');
      $("#selectEkskul").attr("required", false);
    } else if (this.value == '7') {
      $('#divEkskul').show(0);
      $("#selectEkskul").attr("required", true);
      $('#divKelas').hide(0);
      $('#divKelas').val('');
      $("#selectKelas").attr("required", false);
    } else {
      $('#divKelas').hide(0);
      $('#divKelas').val('');
      $("#selectKelas").attr("required", false);
      $('#divEkskul').hide(0);
      $('#divEkskul').val('');
      $("#selectEkskul").attr("required", false);
    }
  });

  $('#hakAkses2').on('change', function() {
    if (this.value == '6') {
      $('#divKelas2').show(0);
      $("#selectKelas2").attr("required", true);
      $('#divEkskul2').hide(0);
      $('#divEkskul2').val('');
      $("#selectEkskul2").attr("required", false);
    } else if (this.value == '7') {
      $('#divEkskul2').show(0);
      $("#selectEkskul2").attr("required", true);
      $('#divKelas2').hide(0);
      $('#divKelas2').val('');
      $("#selectKelas2").attr("required", false);
    } else {
      $('#divKelas2').hide(0);
      $('#divKelas2').val('');
      $("#selectKelas2").attr("required", false);
      $('#divEkskul2').hide(0);
      $('#divEkskul2').val('');
      $("#selectEkskul2").attr("required", false);
    }
  });
</script>