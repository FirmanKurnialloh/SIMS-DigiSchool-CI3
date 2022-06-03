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
</script>