<div class="row">
  <!-- Data Akun PD Card -->
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Data Akun PD</h4>
        <span class="d-flex justify-content-between">
          <a href=" javascript:void(0)" type="button" class="btn btn-sm btn-primary ms-1" data-bs-id="tambahData" id="tambahDataButton" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
            Tambah Data Akun PD
          </a>
          <a href="javascript:void(0)" type="button" class="btn btn-sm btn-success ms-1" data-bs-id="importData" id="importDataButton" data-bs-toggle="modal" data-bs-target="#importDataModal">
            Import Data Akun PD
          </a>
          <a href="javascript:void(0)" type="button" class="btn btn-sm btn-danger ms-1" id="resetDataButton">
            Reset Data Akun PD
          </a>
        </span>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tambahDataModal">Tambah Data Akun PD</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="validate-form" action="<?= base_url('settings/tambahAkunPD'); ?>" method="POST">
              <div class="modal-body">
                <div class="alert alert-primary" role="alert">
                  <div class="alert-body">
                    <strong>Tips:
                      <li>
                        Username Akun PD dapat berupa Email atau Huruf dan Angka
                      </li>
                      <li>
                        Password Default <u>#MerdekaBelajar!</u>
                      </li>
                      <li>
                        Nama Panggil tidak perlu memasukan "Pak/Bu", sistem otomatis mengenali dari jenis kelamin
                      </li>
                      <li>
                        Penulisan Gelar harap disesuaikan dengan baik dan benar seperti <u>Dr. Nama Guru, S.Pd., M.Pd.</u>
                      </li>
                    </strong>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-12">
                    <!-- Nama Lengkap input -->
                    <div class="mb-1">
                      <label class="form-label" for="namaLengkap">Nama Lengkap</label>
                      <input type="text" class="form-control" id="namaLengkap" placeholder="Nama Lengkap" name="namaLengkap" required />
                    </div>
                    <!-- Jenis Kelamin input -->
                    <div class="mb-1">
                      <label for="Jenis Kelamin">Jenis Kelamin</label>
                      <select class="select2 hide-search form-control" id="jenisKelamin" name="jenisKelamin" required data-placeholder="Pilih Jenis Kelamin">
                        <option></option>
                        <optgroup label="Pilih Jenis Kelamin">
                          <option value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>
                        </optgroup>
                      </select>
                    </div>
                    <!-- Username input -->
                    <div class="mb-1">
                      <label class="form-label" for="nisn">NISN</label>
                      <input type="text" class="form-control" id="nisn" placeholder="NISN" name="nisn" minlength="5" required />
                    </div>
                  </div>
                  <div class="col-lg-6 col-12">
                    <!-- Nama Panggil input -->
                    <div class="mb-1">
                      <label class="form-label" for="namaPanggil">Nama Panggil</label>
                      <input type="text" class="form-control" id="namaPanggil" placeholder="Nama Panggil" name="namaPanggil" required />
                    </div>
                    <div class="mb-1">
                      <label class="form-label" for="tanggalLahir">Tanggal Lahir</label>
                      <input type="text" class="form-control" id="tanggalLahir" placeholder="Tanggal Lahir" name="tanggalLahir" minlength="5" required />
                    </div>
                    <!-- Kelas input -->
                    <div class="mb-1">
                      <label for="Jenis Kelamin">Jenis Kelamin</label>
                      <select class="select2 hide-search form-control" id="jenisKelamin" name="jenisKelamin" required data-placeholder="Pilih Jenis Kelamin">
                        <option></option>
                        <optgroup label="Pilih Jenis Kelamin">
                          <option value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>
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
      if (getUserPD()->num_rows() <= 0) { ?>
        <div class="text-center">
          <h3 class="text-danger">Tidak Ada Data <br> </h3>
          <h3 class="text-danger myicon"><i data-feather='x-circle' style="width: 100;"></i></h3>
          <h4 class="mb-3 mt-2">Silahkan Tambah Data Akun PD</h4>
        </div>
      <?php } else { ?>
        <div class="card-body">
          <table class="dataTabel table table-hover table-responsive compact" style="height: 450px;">
            <thead class="text-center">
              <tr>
                <th style="width: 0%;">NO</th>
                <th style="width: 10%;">PD</th>
                <th style="width: 1%;">Status</th>
                <th style="width: 1%;">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-left">
              <?php
              $no = 1;
              foreach (getUserPD()->result_array() as $i) :
                $id            = $i['id'];
                $username      = $i['username'];
                $password      = $i['password'];
                $is_active     = $i['is_active'];
                $role_id       = $i['role_id'];
                $role          = getPeran($role_id);
                $profilPD      = getProfilPdFromTapel($username, $tapelAktif['tapel'], $tapelAktif['semester']);
                if ($profilPD) {
                  $profilExist    = "Lihat Profil";
                  $colorProfile   = "success";
                  $namaLengkap    = $profilPD['namaLengkap'];
                  $foto = $profilPD['foto'];
                } else {
                  $namaLengkap    = $username;
                  $foto           = "";
                  $profilExist    = "Profil Tidak Tersedia";
                  $colorProfile   = "danger";
                }
              ?>
                <tr>
                  <td class="align-items-center">
                    <?= $no++ ?>
                  </td>
                  <td>
                    <div class="d-flex justify-content-left align-items-center">
                      <div class="avatar-wrapper me-1">
                        <?php if ($foto && file_exists(FCPATH . "assets/files/images/fotoSiswa/" . $foto)) { ?>
                          <img src="<?= base_url('assets/'); ?>files/images/fotoSiswa/<?= $foto; ?>" alt="Avatar" height="32" width="32">
                        <?php  } else { ?>
                          <div class="avatar bg-light-<?= $colorProfile; ?>">
                            <div class="avatar-content"><?= namaInisial($namaLengkap); ?></div>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="d-flex flex-column">
                        <a href="<?= base_url('profil/pd/') . $id; ?>" class="user_name text-body text-truncate">
                          <span class="fw-bolder"><?= $namaLengkap ?></span>
                        </a><small class="emp_post text-muted"><?= $username ?></small>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex justify-content-left align-items-center">
                      <span class="badge bg-<?= $colorProfile; ?> me-1">
                        <i data-feather="user" class="me-25"></i>
                        <span><?= $profilExist ?></span>
                      </span>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex justify-content-left align-items-center">
                      <button type="button" class="btn btn-sm btn-icon rounded-circle btn-info me-1" aria-expanded="false" data-bs-id="updateDataButton<?= $id; ?>" id="updateDataButton<?= $id; ?>" data-bs-toggle="modal" data-bs-target="#updateDataModal<?= $id; ?>">
                        <i data-feather='edit'></i>
                      </button>
                      <?php if ($sessionUser != $username) { ?>
                        <button type="button" class="btn btn-sm btn-icon rounded-circle btn-success me-1" aria-expanded="false" data-username="<?= $username; ?>" id="resetPassPD">
                          <i data-feather='refresh-cw'></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-icon rounded-circle btn-danger me-1" aria-expanded="false" data-username="<?= $username; ?>" id="hapusAkunPD">
                          <i data-feather="trash"></i>
                        </button>
                      <?php } ?>
                      <?php if ($sessionUser != $username && $is_active == "0") { ?>
                        <form id="switchActivatePDForm<?= $id ?>" action="<?= base_url('settings/switchActivatePD') ?>" method="POST">
                          <div class="form-switch">
                            <input type="checkbox" class="form-check-input" id="switchActivatePD" onclick="document.getElementById('switchActivatePDForm<?= $id ?>').submit();" />
                            <input type="text" name="username" value="<?= $username ?>" hidden />
                            <input type="text" name="is_aktif" id="statusActivatePD" value="0" hidden />
                            <sub id="LabelswitchActivatePD">Tidak Aktif</sub>
                          </div>
                        </form>
                      <?php } elseif ($sessionUser != $username && $is_active == "1") { ?>
                        <form id="switchActivatePDForm<?= $id ?>" action="<?= base_url('settings/switchActivatePD') ?>" method="POST">
                          <div class="form-switch">
                            <input type="checkbox" class="form-check-input" id="switchActivatePD" checked onclick="document.getElementById('switchActivatePDForm<?= $id ?>').submit();" />
                            <input type="text" name="username" value="<?= $username ?>" hidden />
                            <input type="text" name="is_aktif" id="statusActivatePD" value="1" hidden />
                            <sub id="LabelswitchActivatePD">Aktif</sub>
                          </div>
                        </form>
                      <?php } ?>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="updateDataModal<?= $id; ?>" tabindex="-1" aria-labelledby="updateDataModal" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="updateDataModal">Edit Akun <?= $gelarDepan . ' ' . $namaLengkap . ', ' . $gelarBelakang ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form class="validate-form" action="<?= base_url('settings/editAkunPD'); ?>" method="POST">
                            <div class="modal-body">
                              <div class="alert alert-primary" role="alert">
                                <div class="alert-body">
                                  <strong>Tips:
                                    <li>
                                      Username Akun PD dapat berupa Email atau Huruf dan Angka
                                    </li>
                                    <li>
                                      Password Default <u>#MerdekaBelajar!</u>
                                    </li>
                                    <li>
                                      Nama Panggil tidak perlu memasukan "Pak/Bu", sistem otomatis mengenali dari jenis kelamin
                                    </li>
                                    <li>
                                      Penulisan Gelar harap disesuaikan dengan baik dan benar seperti <u>Dr. Nama Guru, S.Pd., M.Pd.</u>
                                    </li>
                                  </strong>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-12">
                                  <!-- Nama Lengkap input -->
                                  <div class="mb-1">
                                    <label class="form-label" for="namaLengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="namaLengkap" placeholder="Nama Lengkap" name="namaLengkap" value="<?= $namaLengkap; ?>" required />
                                  </div>
                                  <!-- Gelar Depan input -->
                                  <div class="mb-1">
                                    <label class="form-label" for="gelarDepan">Gelar Depan</label>
                                    <input type="text" class="form-control" id="gelarDepan" placeholder="Gelar Depan Contoh : Dr. Ir. H." name="gelarDepan" value="<?= $gelarDepan; ?>" />
                                  </div>
                                  <!-- Jenis Kelamin input -->
                                  <div class="mb-1">
                                    <label for="Jenis Kelamin">Jenis Kelamin</label>
                                    <select class="select2 hide-search form-control" id="jenisKelamin" name="jenisKelamin" required data-placeholder="Pilih Jenis Kelamin">
                                      <optgroup label="Pilih Jenis Kelamin">
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                      </optgroup>
                                    </select>
                                  </div>
                                  <!-- Username input -->
                                  <div class="mb-1">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?= $username; ?>" minlength="5" required readonly />
                                  </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                  <!-- Nama Panggil input -->
                                  <div class="mb-1">
                                    <label class="form-label" for="namaPanggil">Nama Panggil</label>
                                    <input type="text" class="form-control" id="namaPanggil" placeholder="Nama Panggil" name="namaPanggil" value="<?= $namaPanggil; ?>" required />
                                  </div>
                                  <!-- Gelar Belakang input -->
                                  <div class="mb-1">
                                    <label class="form-label" for="gelarBelakang">Gelar Belakang</label>
                                    <input type="text" class="form-control" id="gelarBelakang" placeholder="Gelar Belakang Contoh : S.Pd. M.Pd." name="gelarBelakang" value="<?= $gelarBelakang; ?>" />
                                  </div>
                                  <!-- Hak Akses input -->
                                  <div class="mb-1">
                                    <label for="hakAkses">Hak Akses</label>
                                    <select class="select2 hide-search form-control" id="hakAkses" name="hakAkses" required data-placeholder="Pilih Hak Akses">
                                      <optgroup label="Pilih Hak Akses">
                                        <option value="1">Admin</option>
                                        <?php if ($sessionUser != $username) { ?>
                                          <option value="2">Operator</option>
                                          <option value="3">Kepala Sekolah</option>
                                          <option value="4">Tenaga Administrasi</option>
                                          <option value="5">Guru</option>
                                          <option value="6">Walikelas</option>
                                        <?php } ?>
                                      </optgroup>
                                    </select>
                                  </div>
                                  <!-- Peran input -->
                                  <div class="mb-1">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="text" class="form-control" id="password" placeholder="#MerdekaBelajar!" name="password" required readonly disabled />
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
      <!--/ Data Akun PD Card -->

    </div>
  </div>
</div>
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
</script>