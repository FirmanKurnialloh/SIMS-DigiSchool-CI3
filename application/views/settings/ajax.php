<script>
  $("#serverGuruSwitch").click(function() {
    var formServerGuru = $('#formSwitchServerGuru').serialize();
    var statusServerGuru = document.getElementById("statusServerGuru").value;
    $.ajax({
      type: 'POST',
      url: "<?= base_url('settings/swtichServerGuru'); ?>",
      data: formServerGuru,
      cache: false,
      success: function(data) {
        if (statusServerGuru == 0) {
          setTimeout(function() {
            toastr['success'](
              'Guru dapat login kedalam aplikasi !',
              'Server Guru Aktif !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
          document.getElementById("statusServerGuru").value = "1"
          document.getElementById("serverGuruSwitchLabel").innerHTML = "Aktif";
        } else {
          setTimeout(function() {
            toastr['error'](
              'Guru tidak dapat login kedalam aplikasi !',
              'Server Guru Tidak Aktif !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
          document.getElementById("statusServerGuru").value = "0"
          document.getElementById("serverGuruSwitchLabel").innerHTML = "Tidak Aktif";
        }
      }
    });
  });

  $("#serverSiswaSwitch").click(function() {
    var formServerSiswa = $('#formSwitchServerGuru').serialize();
    var statusServerSiswa = document.getElementById("statusServerSiswa").value;
    $.ajax({
      type: 'POST',
      url: "<?= base_url('settings/swtichServerSiswa'); ?>",
      data: formServerSiswa,
      cache: false,
      success: function(data) {
        if (statusServerSiswa == 0) {
          setTimeout(function() {
            toastr['success'](
              'Siswa dapat login kedalam aplikasi !',
              'Server Siswa Aktif !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
          document.getElementById("statusServerSiswa").value = "1"
          document.getElementById("serverSiswaSwitchLabel").innerHTML = "Aktif";
        } else {
          setTimeout(function() {
            toastr['error'](
              'Siswa tidak dapat login kedalam aplikasi !',
              'Server Siswa Tidak Aktif !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
          document.getElementById("statusServerSiswa").value = "0"
          document.getElementById("serverSiswaSwitchLabel").innerHTML = "Tidak Aktif";
        }
      }
    });
  });

  $("#switchModulPPDB").click(function() {
    var formSwitchModulPPDB = $('#formSwitchModulPPDB').serialize();
    var statusModulPPDB = document.getElementById("statusModulPPDB").value;
    $.ajax({
      type: 'POST',
      url: "<?= base_url('settings/switchModulPPDB'); ?>",
      data: formSwitchModulPPDB,
      cache: false,
      success: function(data) {
        if (statusModulPPDB == 0) {
          setTimeout(function() {
            toastr['success'](
              'Semua User dapat mengakses modul !',
              'Modul PPDB Aktif !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
          document.getElementById("statusModulPPDB").value = "1"
          document.getElementById("LabelswitchModulPPDB").innerHTML = "Aktif";
        } else {
          setTimeout(function() {
            toastr['error'](
              'Semua User tidak dapat mengakses modul !',
              'Modul PPDB Tidak Aktif !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
          document.getElementById("statusModulPPDB").value = "0"
          document.getElementById("LabelswitchModulPPDB").innerHTML = "Tidak Aktif";
        }
      }
    });
  });

  $(document).on('click', '#hapusTapel', function(e) {
    var id = $(this).data('id');
    var tapel = $(this).data('tapel');
    var semester = $(this).data('semester');
    SwalDeleteTapel(id, tapel, semester);
    e.preventDefault();
  });

  function SwalDeleteTapel(id, tapel, semester) {

    Swal.fire({
      title: 'Anda Yakin Ingin Menghapus Tahun Pelajaran ' + tapel + ' Semester ' + semester + ' ? ',
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
              url: '<?= base_url('settings/deleteTapel'); ?>',
              data: 'id=' + id + '&tapel=' + tapel + '&semester=' + semester,
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
                text: 'Tahun Pelajaran  ' + tapel + ' Semester ' + semester + ' Gagal Dihapus!',
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

  $(document).on('click', '#hapusMapel', function(e) {
    var id = $(this).data('id');
    var mapel = $(this).data('mapel');
    var kelompok = $(this).data('kelompok');
    SwalDeleteMapel(id, mapel, kelompok);
    e.preventDefault();
  });

  function SwalDeleteMapel(id, mapel, kelompok) {

    Swal.fire({
      title: 'Anda Yakin Ingin Menghapus Mata Pelajaran ' + mapel + ' Kelompok ' + kelompok + ' ? ',
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
              url: '<?= base_url('settings/deleteMapel'); ?>',
              data: 'id=' + id + '&namaMapel=' + mapel + '&kelompokMapel=' + kelompok,
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
                text: 'Mata Pelajaran  ' + mapel + ' Kelompok ' + kelompok + ' Gagal Dihapus!',
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

  $(document).on('click', '#hapusEkskul', function(e) {
    var id = $(this).data('id');
    var ekskul = $(this).data('ekskul');
    SwalDeleteEkskul(id, ekskul);
    e.preventDefault();
  });

  function SwalDeleteEkskul(id, ekskul) {

    Swal.fire({
      title: 'Anda Yakin Ingin Menghapus Ekstrakurikuler ' + ekskul + ' ? ',
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
              url: '<?= base_url('settings/deleteEkskul'); ?>',
              data: 'id=' + id + '&namaEkskul=' + ekskul,
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
                text: 'Ekstrakurikuler  ' + ekskul + ' Gagal Dihapus!',
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