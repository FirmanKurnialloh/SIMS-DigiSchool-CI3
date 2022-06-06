<div class="row">
  <!-- Data Akun GTK Card -->
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Data Akun GTK</h4>
        <a href="javascript:void(0)" type="button" class="btn btn-sm btn-primary" data-bs-id="tambahData" id="tambahDataButton" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
          Tambah Data Akun GTK
        </a>
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
                        Penulisan Gelar harap disesuaikan dengan baik dan benar seperti <u>Dr. Nama Guru, S.Pd., M.Pd.</u>
                      </li>
                    </strong>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <!-- Nama Lengkap input -->
                    <div class="mb-1">
                      <label class="form-label" for="namaLengkap">Nama Lengkap</label>
                      <input type="text" class="form-control" id="namaLengkap" placeholder="Nama Lengkap" name="namaLengkap" minlength="5" required />
                    </div>
                    <!-- Gelar Depan input -->
                    <div class="mb-1">
                      <label class="form-label" for="gelarDepan">Gelar Depan</label>
                      <input type="text" class="form-control" id="gelarDepan" placeholder="Gelar Depan Contoh : Dr. Ir. H." name="gelarDepan" />
                    </div>
                    <!-- Jenis Kelamin input -->
                    <div class="mb-1">
                      <label for="Jenis Kelamin">Jenis Kelamin</label>
                      <select class="select2 form-control" id="jenisKelamin" name="jenisKelamin" required>
                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                    <!-- Username input -->
                    <div class="mb-1">
                      <label class="form-label" for="username">Username</label>
                      <input type="text" class="form-control" id="username" placeholder="Username" name="username" minlength="5" required />
                    </div>
                  </div>
                  <div class="col-6">
                    <!-- Nama Panggil input -->
                    <div class="mb-1">
                      <label class="form-label" for="namaPanggil">Nama Panggil</label>
                      <input type="text" class="form-control" id="namaPanggil" placeholder="Nama Panggil" name="namaPanggil" required />
                    </div>
                    <!-- Gelar Belakang input -->
                    <div class="mb-1">
                      <label class="form-label" for="gelarBelakang">Gelar Belakang</label>
                      <input type="text" class="form-control" id="gelarBelakang" placeholder="Gelar Belakang Contoh : S.Pd. M.Pd." name="gelarBelakang" />
                    </div>
                    <!-- Hak Akses input -->
                    <div class="mb-1">
                      <label for="hakAkses">Hak Akses</label>
                      <select class="select2 form-control" id="hakAkses" name="hakAkses" required>
                        <option value="" selected disabled>Pilih Hak Akses</option>
                        <option value="1">Admin</option>
                        <option value="2">Operator</option>
                        <option value="3">Kepala Sekolah</option>
                        <option value="4">Tenaga Administrasi</option>
                        <option value="5">Guru</option>
                        <option value="6">Walikelas</option>
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
      $query = "SELECT * FROM `user` JOIN `profil_gtk` ON `user`.`username` = `profil_gtk`.`username` ORDER BY `profil_gtk`.`namaLengkap` ASC";
      $query = $this->db->query($query);
      if ($query->num_rows() <= 0) { ?>
        <div class="text-center">
          <h3 class="text-danger">Tidak Ada Data <br> </h3>
          <h3 class="text-danger myicon"><i data-feather='x-circle' style="width: 100;"></i></h3>
          <h4 class="mb-3 mt-2">Silahkan Tambah Data Akun GTK</h4>
        </div>
      <?php } else { ?>
        <div class="card-body">
          <table class="dataTabel table table-hover table-responsive compact text-center" style="height: 450px;">
            <thead>
              <tr>
                <th style="width: 5%;">Username</th>
                <th style="width: 5%;">Nama GTK</th>
                <th style="width: 5%;">Status</th>
                <th style="width: 5%;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($query->result_array() as $i) {
                $id            = $i['id'];
                $username      = $i['username'];
                $namaLengkap   = $i['namaLengkap'];
                $gelarDepan    = $i['gelarDepan'];
                $gelarBelakang = $i['gelarBelakang'];
                $is_active     = $i['is_active'];
              ?>
                <tr>
                  <td>
                    <span class="font-weight-bold"><?= $username ?></span>
                  </td>
                  <td>
                    <span class="font-weight-bold"><?= $gelarDepan . ' ' . $namaLengkap . ', ' . $gelarBelakang ?></span>
                  </td>
                  <td>
                    <?php if ($is_active == "0") { ?>
                      <form id="switchActivateGTKForm<?= $id ?>" action="<?= base_url('settings/switchActivateGTK') ?>" method="POST">
                        <div class="form-switch">
                          <input type="checkbox" class="form-check-input" id="switchActivateGTK" onclick="document.getElementById('switchActivateGTKForm<?= $id ?>').submit();" />
                          <input type="text" name="username" value="<?= $username ?>" hidden />
                          <input type="text" name="is_aktif" id="statusActivateGTK" value="0" hidden />
                          <sub id="LabelswitchActivateGTK">Tidak Aktif</sub>
                        </div>
                      </form>
                    <?php } elseif ($is_active == "1") { ?>
                      <form id="switchActivateGTKForm<?= $id ?>" action="<?= base_url('settings/switchActivateGTK') ?>" method="POST">
                        <div class="form-switch">
                          <input type="checkbox" class="form-check-input" id="switchActivateGTK" checked onclick="document.getElementById('switchActivateGTKForm<?= $id ?>').submit();" />
                          <input type="text" name="username" value="<?= $username ?>" hidden />
                          <input type="text" name="is_aktif" id="statusActivateGTK" value="1" hidden />
                          <sub id="LabelswitchActivateGTK">Aktif</sub>
                        </div>
                      </form>
                    <?php } ?>
                  </td>
                  <td>
                    <a hidden href="<?= base_url('gtk/profil/view/') . $username; ?>" type="button" class="btn btn-primary btn-sm" aria-expanded="false" data-username="<?= $username; ?>" id="lihatProfil">
                      <i data-feather="user"></i>
                      Lihat Profil
                    </a>
                    <button type="button" class="btn btn-success btn-sm" aria-expanded="false" data-username="<?= $username; ?>" id="resetPassGTK">
                      <i data-feather='refresh-cw'></i>
                      Reset Password
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" aria-expanded="false" data-username="<?= $username; ?>" id="hapusAkunGTK">
                      <i data-feather="trash"></i>
                      Hapus
                    </button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>
      <?php } ?>
      <!--/ Data Akun GTK Card -->

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
</script>