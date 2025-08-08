<script>
$(document).ready(function() {
  sekolahLoad();

  function sekolahLoad() {
    $.ajax({
      cache: false,
      url: "<?= base_url('web/berandaLoad') ?>",
      type: "POST",
      data: {
        page: "gtk/web/settingsLoad"
      },
      success: function(data) {
        $("#sekolahPage").html(data);
      }
    });
  }
})
</script>
