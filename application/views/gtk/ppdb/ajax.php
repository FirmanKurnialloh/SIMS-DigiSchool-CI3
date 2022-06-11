<script>
  $(document).ready(function() {
    sekolahLoad();

    function sekolahLoad() {
      $.ajax({
        cache: false,
        url: "<?= base_url('settings/sekolahLoad') ?>",
        type: "POST",
        data: {
          page: "settings/sekolahLoad"
        },
        success: function(data) {
          $("#sekolahPage").html(data);
        }
      });
    }

  })
</script>