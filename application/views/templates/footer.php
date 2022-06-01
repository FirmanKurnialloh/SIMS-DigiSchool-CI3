<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
  <p class="clearfix mb-0">
    <span class="float-md-start d-block d-md-inline-block mt-25">Hak Cipta &copy; <?php echo date("Y"); ?>
      <?= $profilSekolah['namaSekolah'] ?>
      <span class="d-none d-sm-inline-block">Di Lindungi Undang Undang</span>
    </span>
    <span class="float-md-end d-none d-md-block"><?= $serverSetting['namaAplikasi'] ?> is Hand-crafted & Made with<i data-feather="heart"></i> By <a class="ms-25" href="https://www.koechingkoding.com/" target="_blank">Firman Kurnialloh</a> Support By <a class="ms-25" href="https://www.jayvyn-host.com/" target="_blank">Jayvyn Host</a></span>
  </p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->

<!-- BEGIN: Vendor JS-->
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/vendors.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?= base_url('assets/'); ?>app-assets/js/core/app-menu.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="<?= base_url('assets/'); ?>assets/js/scripts.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/page-knowledge-base.js"></script>
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