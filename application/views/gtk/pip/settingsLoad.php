<div class="row">

  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Data Tahun Pelajaran</h4>
        <a href="javascript:void(0)" type="button" class="btn btn-sm btn-primary" data-bs-id="tambahData"
          id="tambahDataButton" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
          Tambah Data Tahun Pelajaran
        </a>
      </div>
      <div class="card-body">
        <?php
        $query = getSelect('pip_tapel', '*', 'id', 'desc');
        if ($query->num_rows() <= 0) { ?>
        <div class="text-center">
          <h3 class="text-danger">Tidak Ada Data <br> </h3>
          <h3 class="text-danger myicon"><i data-feather='x-circle' style="width: 100;"></i></h3>
          <h4 class="mb-3 mt-2">Silahkan Tambah Data Tahun Pelajaran</h4>
        </div>
        <?php } else { ?>
        <table class="dataTabel table table-hover table-responsive compact" style="height: 450px;">
          <thead class="text-center">
            <tr>
              <th style="width: 10%;">Tahun Pelajaran</th>
              <th style="width: 5%;">Status Akses</th>
              <th style="width: 5%;">Status Registrasi</th>
              <th style="width: 5%;">Status Pengumuman</th>
              <th style="width: 5%;">Status Daftar Ulang</th>
              <th style="width: 5%;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              foreach ($query->result_array() as $i) {
                $id               = $i['id'];
                $tapel            = $i['tapel'];
                $kepalaSekolah    = $i['kepalaSekolah'];
                $is_active        = $i['is_active'];
                $is_active_reg1   = $i['is_active_reg1'];
                $is_active_reg2   = $i['is_active_reg2'];
                $is_active_result = $i['is_active_result'];
                $query            = getWhere('user_gtk', 'username, namaLengkap', ['username' => $kepalaSekolah]);
                $userKS           = $query->row('username');
                $namaKS           = $query->row('namaLengkap');
              ?>
            <tr>
              <td class="text-left">
                <div class="d-flex justify-content-left align-items-center">
                  <div class="avatar-wrapper me-1" hidden>
                    <div class="avatar bg-light-primary">
                      <div class="avatar-content">
                        <img src="<?= base_url('assets/'); ?>files/images/logo/<?= $profilSekolah['logoSekolah']; ?>"
                          alt="Logo Sekolah" width="35" />
                      </div>
                    </div>
                  </div>
                  <div class="d-flex flex-column">
                    <a href="<?= base_url('LayananPIP/SetUp/') . getEncodeURLParam($tapel); ?>"
                      class="user_name text-body text-truncate">
                      <span class="fw-bolder">PIP Tahun Pelajaran <?= $tapel ?></span>
                    </a><small class="emp_post text-muted"> Kepala Sekolah : <?= $namaKS ?></small>
                  </div>
                </div>
              </td>
              <td class="text-center">
                <?php if ($is_active == "1") { ?>
                <form id="switchAccessPIPForm<?= $id ?>" action="<?= base_url('LayananPIP/switchAccess') ?>"
                  method="POST">
                  <div class="form-switch">
                    <input type="checkbox" class="form-check-input" id="switchAccessPIPButton" checked
                      onclick="document.getElementById('switchAccessPIPForm<?= $id ?>').submit();" />
                    <input type="text" name="id" value="<?= $id ?>" hidden />
                    <input type="text" name="is_active" id="switchAccessPIPStatus" value="1" hidden />
                    <sub id="switchAccessPIPLabel">Aktif</sub>
                  </div>
                </form>
                <?php } elseif ($is_active == "0") { ?>
                <form id="switchAccessPIPForm<?= $id ?>" action="<?= base_url('LayananPIP/switchAccess') ?>"
                  method="POST">
                  <div class="form-switch">
                    <input type="checkbox" class="form-check-input" id="switchAccessPIPButton"
                      onclick="document.getElementById('switchAccessPIPForm<?= $id ?>').submit();" />
                    <input type="text" name="id" value="<?= $id ?>" hidden />
                    <input type="text" name="is_active" id="switchAccessPIPStatus" value="0" hidden />
                    <sub id="switchAccessPIPLabel">Tidak Aktif</sub>
                  </div>
                </form>
                <?php } ?>
              </td>
              <td class="text-center">
                <?php if ($is_active_reg1 == "1") { ?>
                <form id="switchReg1PIPForm<?= $id ?>" action="<?= base_url('LayananPIP/switchRegistrasi1') ?>"
                  method="POST">
                  <div class="form-switch">
                    <input type="checkbox" class="form-check-input" id="switchReg1PIPButton" checked
                      onclick="document.getElementById('switchReg1PIPForm<?= $id ?>').submit();" />
                    <input type="text" name="id" value="<?= $id ?>" hidden />
                    <input type="text" name="is_active_reg1" id="switchReg1PIPStatus" value="1" hidden />
                    <sub id="switchReg1PIPLabel">Aktif</sub>
                  </div>
                </form>
                <?php } elseif ($is_active_reg1 == "0") { ?>
                <form id="switchReg1PIPForm<?= $id ?>" action="<?= base_url('LayananPIP/switchRegistrasi1') ?>"
                  method="POST">
                  <div class="form-switch">
                    <input type="checkbox" class="form-check-input" id="switchReg1PIPButton"
                      onclick="document.getElementById('switchReg1PIPForm<?= $id ?>').submit();" />
                    <input type="text" name="id" value="<?= $id ?>" hidden />
                    <input type="text" name="is_active_reg1" id="switchReg1PIPStatus" value="0" hidden />
                    <sub id="switchReg1PIPLabel">Tidak Aktif</sub>
                  </div>
                </form>
                <?php } ?>
              </td>
              <td class="text-center">
                <?php if ($is_active_result == "1") { ?>
                <form id="switchResultPIPForm<?= $id ?>" action="<?= base_url('LayananPIP/switchResult') ?>"
                  method="POST">
                  <div class="form-switch">
                    <input type="checkbox" class="form-check-input" id="switchResultPIPButton" checked
                      onclick="document.getElementById('switchResultPIPForm<?= $id ?>').submit();" />
                    <input type="text" name="id" value="<?= $id ?>" hidden />
                    <input type="text" name="is_active_result" id="switchResultPIPStatus" value="1" hidden />
                    <sub id="switchResultPIPLabel">Aktif</sub>
                  </div>
                </form>
                <?php } elseif ($is_active_result == "0") { ?>
                <form id="switchResultPIPForm<?= $id ?>" action="<?= base_url('LayananPIP/switchResult') ?>"
                  method="POST">
                  <div class="form-switch">
                    <input type="checkbox" class="form-check-input" id="switchResultPIPButton"
                      onclick="document.getElementById('switchResultPIPForm<?= $id ?>').submit();" />
                    <input type="text" name="id" value="<?= $id ?>" hidden />
                    <input type="text" name="is_active_result" id="switchResultPIPStatus" value="0" hidden />
                    <sub id="switchResultPIPLabel">Tidak Aktif</sub>
                  </div>
                </form>
                <?php } ?>
              </td>
              <td class="text-center">
                <?php if ($is_active_reg2 == "1") { ?>
                <form id="switchReg2PIPForm<?= $id ?>" action="<?= base_url('LayananPIP/switchRegistrasi2') ?>"
                  method="POST">
                  <div class="form-switch">
                    <input type="checkbox" class="form-check-input" id="switchReg2PIPButton" checked
                      onclick="document.getElementById('switchReg2PIPForm<?= $id ?>').submit();" />
                    <input type="text" name="id" value="<?= $id ?>" hidden />
                    <input type="text" name="is_active_reg2" id="switchReg2PIPStatus" value="1" hidden />
                    <sub id="switchReg2PIPLabel">Aktif</sub>
                  </div>
                </form>
                <?php } elseif ($is_active_reg2 == "0") { ?>
                <form id="switchReg2PIPForm<?= $id ?>" action="<?= base_url('LayananPIP/switchRegistrasi2') ?>"
                  method="POST">
                  <div class="form-switch">
                    <input type="checkbox" class="form-check-input" id="switchReg2PIPButton"
                      onclick="document.getElementById('switchReg2PIPForm<?= $id ?>').submit();" />
                    <input type="text" name="id" value="<?= $id ?>" hidden />
                    <input type="text" name="is_active_reg2" id="switchReg2PIPStatus" value="0" hidden />
                    <sub id="switchReg2PIPLabel">Tidak Aktif</sub>
                  </div>
                </form>
                <?php } ?>
              </td>
              <td class="text-center">
                <a href="<?= base_url('LayananPIP/SetUp/') . getEncodeURLParam($tapel); ?>" type="button"
                  class="btn btn-sm btn-icon rounded-circle btn-info me-1" aria-expanded="false">
                  <i data-feather='edit'></i>
                </a>
                <button type="button" class="btn btn-sm btn-icon rounded-circle btn-danger me-1" aria-expanded="false"
                  data-id="<?= $id; ?>" data-tapel="<?= $tapel; ?>" id="hapusTapelPIP">
                  <i data-feather="trash"></i>
                </button>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>

        <?php } ?>

      </div>
    </div>
  </div>
  <!-- Card Right -->
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahDataModal">Tambah Data Tahun Pelajaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="validate-form" action="<?= base_url('LayananPIP/tambahTapel'); ?>" method="POST">
        <div class="modal-body">
          <div class="alert alert-primary" role="alert">
            <div class="alert-body"><strong>Tips: Contoh Penulisan Tahun Pelajaran : 2022/2023</strong></div>
          </div>
          <!-- Tahun Pelajaran input -->
          <div class="mb-1">
            <label class="form-label" for="tahunInput">Tahun Pelajaran</label>
            <input type="text" class="form-control" id="tahunInput" placeholder="2022/2023" name="tapel" minlength="9"
              data-msg="Masukan Tahun Pelajaran" required autocomplete="off" />
          </div>
          <div class="mb-1">
            <label class="form-label" for="kepalaSekolah">Kepala Sekolah</label>
            <select class="select2 form-control" id="kepalaSekolah" name="kepalaSekolah" required
              data-placeholder="Pilih Kepala Sekolah" data-msg="Pilih Kepala Sekolah" autocomplete="off">
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
              <input class="form-check-input" type="radio" id="aktif1" value="1" name="is_active_reg1"
                data-msg="Pilih Status" required />
              <label class="form-check-label" for="aktif1">Ya</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="aktif0" value="0" name="is_active_reg1"
                data-msg="Pilih Status" required />
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
<!-- Modal Tambah -->
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