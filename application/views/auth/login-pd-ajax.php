<script>
  $("#loginNISN").bind('paste change input', function() {
    $("#data-pd").html("<div class='card shadow-none bg-transparent border-primary'><div class='card-body'><img src='<?= base_url('assets/'); ?>files/images/logo/page-loader-2.gif' width='150px' /><h4 class='card-title'>Harap Tunggu, Sistem Sedang Mencari Data ...</h4><p class='card-text'>Jika proses ini memakan waktu yang cukup lama, silahakan periksa koneksi internet dan gunakan Google Chrome Terbaru !</p></div></div>");

    var nisn = $("#loginNISN").val();

    $.ajax({
      type: "POST",
      url: "<?= base_url('auth/pdLoginNISN'); ?>",
      data: "nisn=" + nisn,
      success: function(data) {
        $("#data-pd").html(data);
      }
    });

  });

  $("#tanggalLahirConfirmLogin").bind('change', function() {
    $("#data-pd").html("<img src='<?= base_url('assets/'); ?>files/images/logo/page-loader-2.gif' width='150px' /><h4 class='card-title'>Harap Tunggu, Sistem Sedang Mencari Data ...</h4><p class='card-text'>Jika proses ini memakan waktu yang cukup lama, silahakan periksa koneksi internet dan gunakan Google Chrome Terbaru !</p>");

    var tanggalLahirConfirmLogin = $("#tanggalLahirConfirmLogin").val();

    $.ajax({
      type: "POST",
      url: "<?= base_url('auth/pdLoginConfirmVerify'); ?>",
      data: "data=" + tanggalLahirConfirmLogin,
      success: function(data) {
        $("#data-pd").html(data);
      }
    });

  });
</script>