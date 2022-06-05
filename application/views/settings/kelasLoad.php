<div class="row">
  <!-- Data Kelas Card -->
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Data Kelas</h4>
        <a href="javascript:void(0)" type="button" class="btn btn-sm btn-primary" data-bs-id="tambahData" id="tambahDataButton" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
          Tambah Data Kelas
        </a>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tambahDataModal">Tambah Data Kelas</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="validate-form" action="<?= base_url('settings/tambahKelas'); ?>" method="POST">
              <div class="modal-body">
                <!-- Level input -->
                <div class="mb-1">
                  <label for="level">Level</label>
                  <select class="select2 form-control" id="level" name="level" required>
                    <?php if ($profilSekolah['bentukPendidikan'] == "PAUD") { ?>
                      <option value="" selected disabled>Pilih Kelas Jenjang <?= $profilSekolah['bentukPendidikan'] ?></option>
                      <option value="Kelompok Bermain">Kelompok Bermain</option>
                      <option value="Kelompok A">Kelompok A</option>
                      <option value="Kelompok B">Kelompok B</option>
                    <?php } elseif ($profilSekolah['bentukPendidikan'] == "SD" || $profilSekolah['bentukPendidikan'] == "MI") { ?>
                      <option value="" selected disabled>Pilih Kelas Jenjang <?= $profilSekolah['bentukPendidikan'] ?></option>
                      <option value="1">Kelas 1</option>
                      <option value="2">Kelas 2</option>
                      <option value="3">Kelas 3</option>
                      <option value="4">Kelas 4</option>
                      <option value="5">Kelas 5</option>
                      <option value="6">Kelas 6</option>
                    <?php } elseif ($profilSekolah['bentukPendidikan'] == "SMP" || $profilSekolah['bentukPendidikan'] == "MTS") { ?>
                      <option value="" selected disabled>Pilih Kelas Jenjang <?= $profilSekolah['bentukPendidikan'] ?></option>
                      <option value="7">Kelas 7</option>
                      <option value="8">Kelas 8</option>
                      <option value="9">Kelas 9</option>
                    <?php } elseif ($profilSekolah['bentukPendidikan'] == "SMA" || $profilSekolah['bentukPendidikan'] == "MA" || $profilSekolah['bentukPendidikan'] == "SMK") { ?>
                      <option value="" selected disabled>Pilih Kelas Jenjang <?= $profilSekolah['bentukPendidikan'] ?></option>
                      <option value="10">Kelas 10</option>
                      <option value="11">Kelas 11</option>
                      <option value="12">Kelas 12</option>
                    <?php } ?>
                  </select>
                </div>
                <?php if ($profilSekolah['bentukPendidikan'] == "SMA" || $profilSekolah['bentukPendidikan'] == "MA" || $profilSekolah['bentukPendidikan'] == "SMK") { ?>
                  <!-- Jurusan input -->
                  <div class="mb-1">
                    <label class="form-label" for="jurusan">Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" placeholder="Jurusan" name="jurusan" required />
                  </div>
                <?php } ?>
                <!-- Kelas input -->
                <div class="mb-1">
                  <label class="form-label" for="kelas">Nama Kelas</label>
                  <input type="text" class="form-control" id="kelas" placeholder="Nama Kelas" name="kelas" required />
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-primary">Tambah Data</button>
                <button type="reset" class="btn btn-sm btn-outline-secondary">Reset</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <?php
      $query = "SELECT * FROM `setting_kelas` ORDER BY `id` ASC";
      $query = $this->db->query($query);
      if ($query->num_rows() <= 0) { ?>
        <div class="text-center">
          <h3 class="text-danger">Tidak Ada Data <br> </h3>
          <h3 class="text-danger myicon"><i data-feather='x-circle' style="width: 100;"></i></h3>
          <h4 class="mb-3 mt-2">Silahkan Tambah Data Kelas</h4>
        </div>
      <?php } else { ?>
        <div class="card-body">
          <table class="dataTabel table table-hover table-responsive compact text-center" style="height: 450px;">
            <thead>
              <tr>
                <th style="width: 5%;">Level</th>
                <?php if ($profilSekolah['bentukPendidikan'] == "SMA" || $profilSekolah['bentukPendidikan'] == "MA" || $profilSekolah['bentukPendidikan'] == "SMK") { ?>
                  <th style="width: 5%;">Jurusan</th>
                <?php } ?>
                <th style="width: 5%;">Kelas</th>
                <th style="width: 1%;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($query->result_array() as $i) {
                $id         = $i['id'];
                $level      = $i['level'];
                $jurusan    = $i['jurusan'];
                $kelas      = $i['kelas'];
              ?>
                <tr>
                  <td>
                    <span class="font-weight-bold"><?= $level ?></span>
                  </td>
                  <?php if ($profilSekolah['bentukPendidikan'] == "SMA" || $profilSekolah['bentukPendidikan'] == "MA" || $profilSekolah['bentukPendidikan'] == "SMK") { ?>
                    <td>
                      <span class="font-weight-bold"><?= $jurusan ?></span>
                    </td>
                  <?php } ?>
                  <td>
                    <span class="font-weight-bold"><?= $kelas ?></span>
                  </td>
                  <td>
                    <button type="button" class="btn btn-danger btn-sm" aria-expanded="false" data-id="<?= $id; ?>" data-kelas="<?= $kelas; ?>" id="hapusKelas">
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
      <!--/ Data Kelas Card -->

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
</script>