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
      <!-- Data Ekstrakurikuler Start -->
      <section id="SettingsMataPelajaran">
        <div class="row">
          <!-- Data Ekstrakurikuler Card -->
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Data Ekstrakurikuler</h4>
                <a href="javascript:void(0)" type="button" class="btn btn-sm btn-primary" data-bs-id="tambahData" id="tambahDataButton" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
                  Tambah Data Ekstrakurikuler
                </a>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="tambahDataModal">Tambah Data Ekstrakurikuler</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="validate-form" action="<?= base_url('settings/tambahEkskul'); ?>" method="POST">
                      <div class="modal-body">
                        <div class="alert alert-primary" role="alert">
                          <div class="alert-body"><strong>Tips: Penulisan Ekstrakurikuler Tidak Boleh Di Singkat !</strong></div>
                        </div>
                        <!-- Ekstrakurikuler input -->
                        <div class="mb-1">
                          <label class="form-label" for="namaEkskul">Ekstrakurikuler</label>
                          <input type="text" class="form-control" id="namaEkskul" placeholder="Ekstrakurikuler" name="namaEkskul" minlength="5" required />
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
              $query = "SELECT * FROM `setting_ekskul` ORDER BY `id` ASC";
              $query = $this->db->query($query);
              if ($query->num_rows() <= 0) { ?>
                <div class="text-center">
                  <h3 class="text-danger">Tidak Ada Data <br> </h3>
                  <h3 class="text-danger myicon"><i data-feather='x-circle' style="width: 100;"></i></h3>
                  <h4 class="mb-3 mt-2">Silahkan Tambah Data Ekstrakurikuler</h4>
                </div>
              <?php } else { ?>
                <div class="card-body">
                  <table class="dataTabel table table-hover table-responsive compact text-center" style="height: 450px;">
                    <thead>
                      <tr>
                        <th style="width: 5%;">Ekstrakurikuler</th>
                        <th style="width: 1%;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($query->result_array() as $i) {
                        $id              = $i['id'];
                        $ekskul        = $i['namaEkskul'];
                      ?>
                        <tr>
                          <td>
                            <span class="font-weight-bold"><?= $ekskul ?></span>
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger btn-sm" aria-expanded="false" data-id="<?= $id; ?>" data-ekskul="<?= $ekskul; ?>" id="hapusEkskul">
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
              <!--/ Data Ekstrakurikuler Card -->

            </div>
          </div>
        </div>
      </section>
      <!-- Data Ekstrakurikuler end -->

    </div>

  </div>
</div>
<!-- END: Content-->