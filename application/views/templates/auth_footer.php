<!-- BEGIN: Vendor JS-->
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr@4.6.9/dist/l10n/id.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?= base_url('assets/'); ?>app-assets/js/core/app-menu.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/js/core/app.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/js/scripts/forms/form-select2.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="<?= base_url('assets/'); ?>assets/js/scripts.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/auth-login.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/auth-register.js"></script>
<!-- END: Page JS-->

<?= $this->session->flashdata('toastr'); ?>

<script>
  $(window).on('load', function() {
    if (feather) {
      feather.replace({
        width: 14,
        height: 14
      });
    }
  })
</script>
</body>
<!-- END: Body-->

</html>