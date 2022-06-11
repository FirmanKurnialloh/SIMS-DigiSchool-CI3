<div class="row">
  <!-- Data Akun PD Card -->
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Data Akun</h4>
        <span class="d-flex justify-content-between">
          <a href=" javascript:void(0)" type="button" class="btn btn-sm btn-primary ms-1" data-bs-id="tambahData" id="tambahDataButton" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
            Tambah Data Akun PD
          </a>
          <a href="javascript:void(0)" type="button" class="btn btn-sm btn-success ms-1" data-bs-id="importData" id="importDataButton" data-bs-toggle="modal" data-bs-target="#ImportDataModal">
            Import Data Akun PD
          </a>
          <a href="javascript:void(0)" type="button" class="btn btn-sm btn-danger ms-1" id="resetDataPD">
            Reset Data Akun PD
          </a>
        </span>
        <div class="alert alert-primary col-12 my-1" role="alert">
          <div class="alert-body">
            <strong>Note : Data yang tampil berdasarkan tahun pelajaran yang sedang aktif</strong>
          </div>
        </div>
      </div>
      <?php
      if (getUserPD()->num_rows() <= 0) { ?>
        <div class="text-center">
          <h3 class="text-danger">Tidak Ada Data <br> </h3>
          <h3 class="text-danger myicon"><i data-feather='x-circle' style="width: 100;"></i></h3>
          <h4 class="mb-3 mt-2">Silahkan Tambah Data Akun Peserta Didik</h4>
        </div>
      <?php } else { ?>
        <div class="card-body">
        </div>
      <?php } ?>
      <!--/ Data Akun PD Card -->

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

  var basicPickr = $('.flatpickr-basic');
  if (basicPickr.length) {
    basicPickr.flatpickr({
      // minDate: 'today',
      altInput: true,
      altFormat: 'l, j F Y',
      dateFormat: 'Y-m-d',
      locale: 'id'
    });
  }

  $(basicPickr).on('change', function() {
    console.log(basicPickr.val());
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