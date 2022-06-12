<div class="row">

  <div class=" col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Data Tahun Pelajaran</h4>
        <a href="javascript:void(0)" type="button" class="btn btn-sm btn-primary" data-bs-id="tambahData" id="tambahDataButton" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
          Tambah Data Tahun Pelajaran
        </a>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tambahDataModal">Tambah Data Tahun Pelajaran</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="validate-form" action="<?= base_url('LayananPPDB/tambahTapel'); ?>" method="POST">
              <div class="modal-body">
                <div class="alert alert-primary" role="alert">
                  <div class="alert-body"><strong>Tips: Contoh Penulisan Tahun Pelajaran : 2022/2023</strong></div>
                </div>
                <!-- Tahun Pelajaran input -->
                <div class="mb-1">
                  <label class="form-label" for="tahunInput">Tahun Pelajaran</label>
                  <input type="text" class="form-control" id="tahunInput" placeholder="2022/2023" name="tapel" minlength="9" data-msg="Masukan Tahun Pelajaran" required autocomplete="off" />
                </div>
                <div class="mb-1">
                  <label class="form-label" for="kepalaSekolah">Kepala Sekolah</label>
                  <select class="select2 form-control" id="kepalaSekolah" name="kepalaSekolah" required data-placeholder="Pilih Kepala Sekolah" data-msg="Pilih Kepala Sekolah" autocomplete="off">
                    <option></option>
                    <optgroup label="Pilih Kepala Sekolah">
                      <?php
                      $query = getWhereOrder('user_gtk', '*', ['role_id_1' <= '10' || 'role_id_2' <= '10'], 'id', 'asc');
                      if ($query->num_rows() >= 1) :
                        $data = $query->result_array();
                        foreach ($data as $data) :
                          $id           = $data['id'];
                          $username     = $data['username'];
                          $namaLengkap  = $data['namaLengkap'];
                      ?>
                          <option value=<?= $username ?>><?= $namaLengkap ?></option>
                      <?php
                        endforeach;
                      endif; ?>
                    </optgroup>
                  </select>
                </div>
                <!-- Aktif input -->
                <div class="mb-1">
                  <label>Aktifkan Registrasi? &nbsp;</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="aktif1" value="1" name="is_active_reg1" data-msg="Pilih Status" required />
                    <label class="form-check-label" for="aktif1">Ya</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="aktif0" value="0" name="is_active_reg1" data-msg="Pilih Status" required />
                    <label class="form-check-label" for="aktif0">Tidak</label>
                  </div>
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
      <div class="card-body">
        <?php
        $query = getSelect('ppdb_tapel', '*', 'id', 'asc');
        if ($query->num_rows() <= 0) { ?>
          <div class="text-center">
            <h3 class="text-danger">Tidak Ada Data <br> </h3>
            <h3 class="text-danger myicon"><i data-feather='x-circle' style="width: 100;"></i></h3>
            <h4 class="mb-3 mt-2">Silahkan Tambah Data Tahun Pelajaran</h4>
          </div>
        <?php } else { ?>
          <div class="card-body">
            <table class="dataTabel table table-hover table-responsive compact" style="height: 450px;">
              <thead class="text-center">
                <tr>
                  <th style="width: 10%;">Tahun Pelajaran</th>
                  <th style="width: 5%;">Status Akses</th>
                  <th style="width: 5%;">Status Registrasi</th>
                  <th style="width: 5%;">Status Daftar Ulang</th>
                  <th style="width: 5%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($query->result_array() as $i) {
                  $id              = $i['id'];
                  $tapel           = $i['tapel'];
                  $kepalaSekolah   = $i['kepalaSekolah'];
                  $is_active       = $i['is_active'];
                  $is_active_reg1  = $i['is_active_reg1'];
                  $is_active_reg2  = $i['is_active_reg2'];
                  $query  = getWhere('user_gtk', 'username, namaLengkap', ['username' => $kepalaSekolah]);
                  $userKS = $query->row('username');
                  $namaKS = $query->row('namaLengkap');
                ?>
                  <tr>
                    <td class="text-left">
                      <div class="d-flex justify-content-left align-items-center">
                        <div class="avatar-wrapper me-1">
                          <div class="avatar bg-light-primary">
                            <div class="avatar-content">
                              <img src="<?= base_url('assets/'); ?>files/images/logo/<?= $profilSekolah['logoSekolah']; ?>" alt="Logo Sekolah" width="35" />
                            </div>
                          </div>
                        </div>
                        <div class="d-flex flex-column">
                          <?php
                          $base_64      = base64_encode($tapel);
                          $url_param    = rtrim($base_64, '='); ?>
                          <a href="<?= base_url('LayananPPDB/SetUp/') . $url_param; ?>" class="user_name text-body text-truncate">
                            <span class="fw-bolder">PPDB Tahun Pelajaran <?= $tapel ?></span>
                          </a><small class="emp_post text-muted"> Kepala Sekolah : <?= $namaKS ?></small>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                      <?php if ($is_active == "1") { ?>
                        <form id="switchAccessPPDBForm<?= $id ?>" action="<?= base_url('layananPPDB/switchAccess') ?>" method="POST">
                          <div class="form-switch">
                            <input type="checkbox" class="form-check-input" id="switchAccessPPDBButton" checked onclick="document.getElementById('switchAccessPPDBForm<?= $id ?>').submit();" />
                            <input type="text" name="id" value="<?= $id ?>" hidden />
                            <input type="text" name="is_active" id="switchAccessPPDBStatus" value="1" hidden />
                            <sub id="switchAccessPPDBLabel">Aktif</sub>
                          </div>
                        </form>
                      <?php } elseif ($is_active == "0") { ?>
                        <form id="switchAccessPPDBForm<?= $id ?>" action="<?= base_url('layananPPDB/switchAccess') ?>" method="POST">
                          <div class="form-switch">
                            <input type="checkbox" class="form-check-input" id="switchAccessPPDBButton" onclick="document.getElementById('switchAccessPPDBForm<?= $id ?>').submit();" />
                            <input type="text" name="id" value="<?= $id ?>" hidden />
                            <input type="text" name="is_active" id="switchAccessPPDBStatus" value="0" hidden />
                            <sub id="switchAccessPPDBLabel">Tidak Aktif</sub>
                          </div>
                        </form>
                      <?php } ?>
                    </td>
                    <td class="text-center">
                      <?php if ($is_active_reg1 == "1") { ?>
                        <form id="switchReg1PPDBForm<?= $id ?>" action="<?= base_url('layananPPDB/switchRegistrasi1') ?>" method="POST">
                          <div class="form-switch">
                            <input type="checkbox" class="form-check-input" id="switchReg1PPDBButton" checked onclick="document.getElementById('switchReg1PPDBForm<?= $id ?>').submit();" />
                            <input type="text" name="id" value="<?= $id ?>" hidden />
                            <input type="text" name="is_active_reg1" id="switchReg1PPDBStatus" value="1" hidden />
                            <sub id="switchReg1PPDBLabel">Aktif</sub>
                          </div>
                        </form>
                      <?php } elseif ($is_active_reg1 == "0") { ?>
                        <form id="switchReg1PPDBForm<?= $id ?>" action="<?= base_url('layananPPDB/switchRegistrasi1') ?>" method="POST">
                          <div class="form-switch">
                            <input type="checkbox" class="form-check-input" id="switchReg1PPDBButton" onclick="document.getElementById('switchReg1PPDBForm<?= $id ?>').submit();" />
                            <input type="text" name="id" value="<?= $id ?>" hidden />
                            <input type="text" name="is_active_reg1" id="switchReg1PPDBStatus" value="0" hidden />
                            <sub id="switchReg1PPDBLabel">Tidak Aktif</sub>
                          </div>
                        </form>
                      <?php } ?>
                    </td>
                    <td class="text-center">
                      <?php if ($is_active_reg2 == "1") { ?>
                        <form id="switchReg2PPDBForm<?= $id ?>" action="<?= base_url('layananPPDB/switchRegistrasi2') ?>" method="POST">
                          <div class="form-switch">
                            <input type="checkbox" class="form-check-input" id="switchReg2PPDBButton" checked onclick="document.getElementById('switchReg2PPDBForm<?= $id ?>').submit();" />
                            <input type="text" name="id" value="<?= $id ?>" hidden />
                            <input type="text" name="is_active_reg2" id="switchReg2PPDBStatus" value="1" hidden />
                            <sub id="switchReg2PPDBLabel">Aktif</sub>
                          </div>
                        </form>
                      <?php } elseif ($is_active_reg2 == "0") { ?>
                        <form id="switchReg2PPDBForm<?= $id ?>" action="<?= base_url('layananPPDB/switchRegistrasi2') ?>" method="POST">
                          <div class="form-switch">
                            <input type="checkbox" class="form-check-input" id="switchReg2PPDBButton" onclick="document.getElementById('switchReg2PPDBForm<?= $id ?>').submit();" />
                            <input type="text" name="id" value="<?= $id ?>" hidden />
                            <input type="text" name="is_active_reg2" id="switchReg2PPDBStatus" value="0" hidden />
                            <sub id="switchReg2PPDBLabel">Tidak Aktif</sub>
                          </div>
                        </form>
                      <?php } ?>
                    </td>
                    <td class="text-center">
                      <a href="<?= base_url('LayananPPDB/SetUp/') . $url_param; ?>" type="button" class="btn btn-sm btn-icon rounded-circle btn-info me-1" aria-expanded="false">
                        <i data-feather='edit'></i>
                      </a>
                      <button type="button" class="btn btn-sm btn-icon rounded-circle btn-danger me-1" aria-expanded="false" data-id="<?= $id; ?>" data-tapel="<?= $tapel; ?>" id="hapusTapelPPDB">
                        <i data-feather="trash"></i>
                      </button>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>
        <?php } ?>

      </div>
    </div>
  </div>
  <!-- Card Right -->
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
</script>