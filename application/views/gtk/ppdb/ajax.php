<script>
  $(window).ready(function() {

    $("#ppdbSettingsPage").ready(function() {
      settingsLoad();
    });

    $("#ppdbSetupPage").ready(function() {
      var tapel = "<?= $url_param ?>";
      setupLoad(tapel);
    });

    $("#ppdbIndexPage").ready(function() {
      indexLoad();
    });

  })

  function settingsLoad() {
    $.ajax({
      cache: false,
      url: "<?= base_url('layananPPDB/settingsLoad') ?>",
      type: "POST",
      data: {
        page: "gtk/ppdb/settingsLoad"
      },
      success: function(data) {
        $("#ppdbSettingsPage").html(data);
      }
    });
  }

  function setupLoad(tapel) {
    $.ajax({
      cache: false,
      url: "<?= base_url('layananPPDB/setupLoad') ?>",
      type: "POST",
      data: {
        // page: "errors/custom/soon"
        page: "gtk/ppdb/setupLoad",
        tapel: tapel
      },
      success: function(data) {
        $("#ppdbSetupPage").html(data);
      }
    });
  }

  function indexLoad() {
    $.ajax({
      cache: false,
      url: "<?= base_url('layananPPDB/indexLoad') ?>",
      type: "POST",
      data: {
        page: "errors/custom/soon"
        // page: "gtk/ppdb/dashboard"
      },
      success: function(data) {
        $("#ppdbIndexPage").html(data);
      }
    });
  }

  $(document).on('click', '#hapusTapelPPDB', function(e) {
    var id = $(this).data('id');
    var tapel = $(this).data('tapel');
    SwalDeleteTapel(id, tapel);
    e.preventDefault();
  });

  function SwalDeleteTapel(id, tapel) {

    Swal.fire({
      title: 'Anda Yakin Ingin Menghapus Tahun Pelajaran ' + tapel + ' ? ',
      text: "Anda tidak dapat mengembalikan data yang dihapus!",
      icon: 'question',
      allowOutsideClick: false,
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus data!',
      cancelButtonText: 'Batalkan!',
      customClass: {
        confirmButton: 'btn btn-primary btn-sm',
        cancelButton: 'btn btn-outline-danger btn-sm ms-1'
      },
      buttonsStyling: false,
      preConfirm: function() {
        return new Promise(function(resolve) {
          $.ajax({
              type: 'POST',
              url: '<?= base_url('LayananPPDB/deleteTapel'); ?>',
              data: 'id=' + id + '&tapel=' + tapel,
              dataType: 'json',
              cache: false,
            })
            .done(function(response) {
              Swal.fire({
                  icon: response.status,
                  title: response.judul,
                  text: response.pesan,
                  allowOutsideClick: false,
                  customClass: {
                    confirmButton: 'btn btn-success btn-sm'
                  }
                })
                .then(function(result) {
                  if (result.value) {
                    location.reload()
                  }
                })
            })
            .fail(function(response) {
              Swal.fire({
                icon: 'error',
                title: 'Terdapat Kesalahan Sistem!',
                text: 'Tahun Pelajaran  ' + tapel + ' Gagal Dihapus!',
                allowOutsideClick: false,
                customClass: {
                  confirmButton: 'btn btn-danger btn-sm'
                }
              }).then(function(result) {
                if (result.value) {
                  location.reload()
                }
              })
            });
        });
      },
    });

  }
</script>