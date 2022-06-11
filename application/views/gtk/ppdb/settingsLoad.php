<div class="row">
  <!-- Card Left -->
  <div class="col-xl-4 col-md-6 col-12" hidden>
    <div class="card">
      <div class="card-body">
        <div class="text-center">
          <h3>
            <strong>
              Sistem Informasi PPDB <br>
              <?= $profilSekolah['namaSekolah']; ?>
            </strong>
            <br>
            <small>
              Tahun Pelajaran <?= $tapelAktif['tapel']; ?>
            </small>
          </h3>
        </div>

        <div class="row text-center pt-2 pb-2">
          <div class="col-xl-6 col-sm-6 col-6 mb-0">
            <h5>
              <strong>
                Registrasi
              </strong>
            </h5>
            <?php if ($serverSetting['loginGuru'] == "1") { ?>
              <form id="formServerGuru" method="post">
                <div class="form-switch">
                  <input type="checkbox" class="form-check-input" id="serverGuruSwitch" checked />
                  <input type="text" name="statusServerGuru" id="statusServerGuru" value="1" hidden />
                  <sub id="serverGuruSwitchLabel">Aktif</sub>
                </div>
              </form>
            <?php } else { ?>
              <form id="formServerGuru" method="post">
                <div class="form-switch">
                  <input type="checkbox" class="form-check-input" id="serverGuruSwitch" />
                  <input type="text" name="statusServerGuru" id="statusServerGuru" value="0" hidden />
                  <sub id="serverGuruSwitchLabel">Tidak Aktif</sub>
                </div>
              </form>
            <?php } ?>
          </div>

          <div class="col-xl-6 col-sm-6 col-6 mb-0">
            <h5>
              <strong>
                Daftar Ulang
              </strong>
            </h5>
            <?php if ($serverSetting['loginSiswa'] == "1") { ?>
              <form id="formSwitchServerGuru" method="post">
                <div class="form-switch">
                  <input type="checkbox" class="form-check-input" id="serverSiswaSwitch" checked />
                  <input type="text" name="statusServerSiswa" id="statusServerSiswa" value="1" hidden />
                  <sub id="serverSiswaSwitchLabel">Aktif</sub>
                </div>
              </form>
            <?php } else { ?>
              <form id="formSwitchServerGuru" method="post">
                <div class="form-switch">
                  <input type="checkbox" class="form-check-input" id="serverSiswaSwitch" />
                  <input type="text" name="statusServerSiswa" id="statusServerSiswa" value="0" hidden />
                  <sub id="serverSiswaSwitchLabel">Tidak Aktif</sub>
                </div>
              </form>
            <?php } ?>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Card Left -->

  <!-- Card Right -->
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
                  <input type="text" class="form-control" id="tahunInput" placeholder="2022/2023" name="tapel" minlength="9" data-msg="Masukan Tahun Pelajaran" required />
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
                  <th style="width: 1%;">No</th>
                  <th style="width: 10%;">Tahun Pelajaran</th>
                  <th style="width: 1%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($query->result_array() as $i) {
                  $id              = $i['id'];
                  $tapel           = $i['tapel'];
                  $is_active_reg1  = $i['is_active_reg1'];
                  $is_active_reg2  = $i['is_active_reg2'];
                ?>
                  <tr>
                    <td class="text-center">
                      <?= $no++ ?>
                    </td>
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
                            <span class="fw-bolder"><?= $tapel ?></span>
                          </a><small class="emp_post text-muted"></small>
                        </div>
                      </div>
                    </td>
                    <td>
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