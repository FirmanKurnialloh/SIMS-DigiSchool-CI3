<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
      <div class="content-header-left col-md-9 col-8 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-start mb-0"><?= $page ?></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="<?= base_url('gtk/dashboard'); ?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="<?= base_url('settings'); ?>">Pengaturan Aplikasi</a>
                </li>
                <li class="breadcrumb-item active"><?= $page ?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-header-right text-md-end col-md-3 col-4">
        <div class="mb-1 breadcrumb-right">
          <a href="<?= base_url('settings'); ?>" type="button" class="btn btn-sm btn-primary">
            <i data-feather='chevrons-left'></i>
            <span>Kembali</span>
          </a>
        </div>
      </div>
    </div>

    <div class="content-body">

      <!-- Data Tahun Pelajaran Start -->
      <section id="SettingsTahunPelajaran">
        <div class="row">
          <!-- Data Tahun Pelajaran Card -->
          <div class="col-12">
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
                    <form class="validate-form" action="<?= base_url('settings/tambahTapel'); ?>" method="POST">
                      <div class="modal-body">
                        <div class="alert alert-primary" role="alert">
                          <div class="alert-body"><strong>Tips: Contoh Penulisan Tahun Pelajaran : 2022/2023</strong></div>
                        </div>
                        <!-- Tahun Pelajaran input -->
                        <div class="mb-1">
                          <label class="form-label" for="tahunInput">Tahun Pelajaran</label>
                          <input type="text" class="form-control" id="tahunInput" placeholder="2022/2023" name="tapel" minlength="9" required />
                        </div>
                        <!-- Semester input -->
                        <div class="mb-1">
                          <label>Semester&nbsp;&nbsp;</label>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="semester1" value="1" name="semester" required />
                            <label class="form-check-label" for="semester1">1</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="semester2" value="2" name="semester" required />
                            <label class="form-check-label" for="semester2">2</label>
                          </div>
                        </div>
                        <!-- Aktif input -->
                        <div class="mb-1">
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
              $query = "SELECT * FROM `setting_tapel` ORDER BY `tapel`,`semester` DESC";
              $query = $this->db->query($query);
              if ($query->num_rows() <= 0) { ?>
                <div class="text-center">
                  <h3 class="text-danger">Tidak Ada Data <br> </h3>
                  <h3 class="text-danger myicon"><i data-feather='x-circle' style="width: 100;"></i></h3>
                  <h4 class="mb-3 mt-2">Silahkan Tambah Data Tahun Pelajaran</h4>
                </div>
              <?php } else { ?>
                <div class="card-body">
                  <table class="dataTabel table table-hover table-responsive compact text-center" style="height: 450px;">
                    <thead>
                      <tr>
                        <th style="width: 5%;">Tahun Pelajaran</th>
                        <th style="width: 1%;">Semester</th>
                        <th style="width: 1%;">Status</th>
                        <th style="width: 1%;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($query->result_array() as $i) {
                        $id              = $i['id'];
                        $tapel           = $i['tapel'];
                        $semester        = $i['semester'];
                        $is_aktif        = $i['is_aktif'];
                      ?>
                        <tr>
                          <td>
                            <span class="font-weight-bold"><?= $tapel ?></span>
                          </td>
                          <td>
                            <span class="font-weight-bold"><?= $semester ?></span>
                          </td>
                          <td>
                            <?php if ($is_aktif == "1") { ?>
                              <form id="switchTapelForm<?= $id ?>" action="<?= base_url('settings/switchTapel') ?>" method="POST">
                                <div class="form-switch">
                                  <input type="checkbox" class="form-check-input" id="switchTapelButton" checked onclick="document.getElementById('switchTapelForm<?= $id ?>').submit();" />
                                  <input type="text" name="id" value="<?= $id ?>" hidden />
                                  <input type="text" name="is_aktif" id="switchTapelStatus" value="1" hidden />
                                  <sub id="switchTapelLabel">Aktif</sub>
                                </div>
                              </form>
                            <?php } elseif ($is_aktif == "0") { ?>
                              <form id="switchTapelForm<?= $id ?>" action="<?= base_url('settings/switchTapel') ?>" method="POST">
                                <div class="form-switch">
                                  <input type="checkbox" class="form-check-input" id="switchTapelButton" onclick="document.getElementById('switchTapelForm<?= $id ?>').submit();" />
                                  <input type="text" name="id" value="<?= $id ?>" hidden />
                                  <input type="text" name="is_aktif" id="switchTapelStatus" value="0" hidden />
                                  <sub id="switchTapelLabel">Tidak Aktif</sub>
                                </div>
                              </form>
                            <?php } ?>
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger btn-sm" aria-expanded="false" data-id="<?= $id; ?>" data-tapel="<?= $tapel; ?>" data-semester="<?= $semester; ?>" id="hapusTapel">
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
              <!--/ Data Tahun Pelajaran  Card -->

            </div>
          </div>
        </div>
      </section>
      <!-- Data Tahun Pelajaran end -->

    </div>

  </div>
</div>
<!-- END: Content-->