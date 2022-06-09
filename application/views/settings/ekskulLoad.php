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
                  <input type="text" class="form-control" id="namaEkskul" placeholder="Ekstrakurikuler" name="namaEkskul" minlength="5" data-msg="Masukan Nama Ekstrakurikuler" required />
                </div>
                <!-- Pelatih input -->
                <div class="mb-1" hidden>
                  <label for="pelatih">Pelatih / Pembina</label>
                  <select class="select2 hide-search form-control" id="pelatih" name="pelatih" data-placeholder="Pilih Pelatih / Pembina">
                    <option></option>
                    <optgroup label="Pilih Pelatih / Pembina">
                      <?php
                      $query = getSelect('user_gtk', '*', 'id', 'asc');
                      if ($query->num_rows() >= 1) {
                        $data = $query->result_array();
                        foreach ($data as $data) {
                          $username     = $data['username'];
                          $namaLengkap  = $data['namaLengkap'];
                      ?>
                          <option value="<?= $username ?>"><?= $namaLengkap ?></option>
                        <?php
                        }
                      } else { ?>
                        <option value="">Tidak ada GTK</option>
                      <?php }; ?>
                    </optgroup>
                  </select>
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
      $query = getSelect('setting_ekskul', '*', 'id', 'asc');
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
                <th style="width: 5%;">Nama Pelatih</th>
                <th style="width: 1%;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($query->result_array() as $i) {
                $id             = $i['id'];
                $ekskul         = $i['namaEkskul'];
                $pelatih        = $i['pelatih'];
                $query          = getWhere('profil_gtk', '*', ['username' => $pelatih]);
                if ($query->num_rows()) {
                  $namaLengkap    = $query->row('namaLengkap');
                  $gelarDepan     = $query->row('gelarDepan');
                  $gelarBelakang  = ',' . $query->row('gelarBelakang');
                  $namaPelatih    = $gelarDepan . ' ' . $namaLengkap . ' ' . $gelarBelakang;
                } else {
                  $namaPelatih    = "Pelatih Belum Di Pilih";
                }
              ?>
                <tr>
                  <td>
                    <span class="font-weight-bold"><?= $ekskul ?></span>
                  </td>
                  <td>
                    <span class="font-weight-bold"><?= $namaPelatih ?></span>
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