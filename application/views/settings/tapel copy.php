<!-- BEGIN: Content-->
<div class="app-content content">
  <!-- <div class="content-overlay"></div> -->
  <!-- <div class="header-navbar-shadow"></div> -->
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

      <div class="row" hidden>
        <div class=" col-12">
          <div class="alert alert-primary" role="alert">
            <div class="alert-body"><strong>Info:</strong></div>
          </div>
        </div>
      </div>

      <!-- Data Tahun Pelajaran Starts -->
      <section id="settings">
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
              $query = "SELECT * FROM `setting_tapel` ORDER BY `tapel`,`semester` ASC";
              $query = $this->db->query($query);
              if ($query->num_rows() <= 0) { ?>
                <div class="text-center">
                  <h3 class="text-danger">Tidak Ada Data <br> </h3>
                  <h3 class="text-danger myicon"><i data-feather='x-circle' style="width: 100;"></i></h3>
                  <h4 class="mb-3 mt-2">Silahkan Tambah Data Tahun Pelajaran</h4>
                </div>
              <?php } else { ?>
                <div class="card-body">
                  <div class="row" hidden>
                    <div class=" col-12">
                      <div class="alert alert-primary" role="alert">
                        <div class="alert-body"><strong>Info: </strong></div>
                      </div>
                    </div>
                  </div>
                  <table class="dataTabel table table-hover table-responsive compact text-center" style="height: 450px;">
                    <thead>
                      <tr>
                        <th style="width: 40%;">Tahun Pelajaran</th>
                        <th style="width: 30%;">Semester</th>
                        <th style="width: 30%;">Status</th>
                        <th style="width: 30%;">Aksi</th>
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
                              <span class="badge badge-pill badge-light-success mr-1">Aktif</span>
                            <?php } elseif ($is_aktif == "0") { ?>
                              <span class="badge badge-pill badge-light-danger mr-1">Tidak Aktif</span>
                            <?php } ?>
                          </td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Kelola
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalEdit<?= $id; ?>" data-id="<?= $id; ?>">Ubah</a>
                                <a class="dropdown-item" href="#" data-id="<?= $id; ?>">Hapus</a>
                              </div>
                            </div>

                            <div class="dropdown" hidden>
                              <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                <i data-feather="more-vertical"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0)" data-id="<?= $id; ?>" id="ubahDataTahunPelajaran" data-toggle="modal" data-target="#modalEdit<?= $id; ?>">
                                  <i data-feather="edit-2" class="mr-50"></i>
                                  <span>Ubah</span>
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)" data-id="<?= $id; ?>" id="hapusDataTahunPelajaran">
                                  <i data-feather="trash" class="mr-50"></i>
                                  <span>Hapus</span>
                                </a>
                              </div>
                            </div>
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
      <!-- Data Tahun Pelajaran ends -->


    </div>

  </div>
</div>
<!-- END: Content-->