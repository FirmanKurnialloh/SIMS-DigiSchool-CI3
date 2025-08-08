<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
  <p class="clearfix mb-0">
    <span class="float-md-start d-block d-md-inline-block mt-25">Hak Cipta &copy; <?php echo date("Y"); ?>
      <?= $profilSekolah['namaSekolah'] ?>
      <span class="d-none d-sm-inline-block">Di Lindungi Undang Undang</span>
    </span>
    <span class="float-md-end d-none d-md-block"><?= $serverSetting['namaAplikasi'] ?> is Hand-crafted & Made with<i
        data-feather="heart"></i> By <a class="ms-25" href="https://www.koechingkoding.com/" target="_blank">Firman
        Kurnialloh</a> Support By <a class="ms-25" href="https://www.jayvyn-host.com/" target="_blank">Jayvyn
        Host</a></span>
  </p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->

<!-- BEGIN: Vendor JS-->
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/vendors.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/editors/quill/highlight.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/editors/quill/katex.min.js"></script>
<script src="<?= base_url('assets/'); ?>app-assets/vendors/js/editors/quill/quill.min.js"></script>
<script src="https://npmcdn.com/flatpickr@4.6.9/dist/l10n/id.js"></script>
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
<!-- <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/page-account-settings-account.js"></script> -->
<script src="<?= base_url('assets/'); ?>app-assets/js/scripts/tables/table-datatables-basic.js"></script>
<!-- END: Page JS-->

<?= $this->session->flashdata('sweet'); ?>
<?= $this->session->flashdata('toastr'); ?>
<script>
$(window).on('load', function() {

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

  $('#reload').delay(5000).show(0);
})

var is_change = "<?= $is_change ?>";
if (is_change == true) {
  Swal.fire({
      icon: 'error',
      title: 'Anda Masih Menggunakan Password Default!',
      text: 'Demi Keamanan Data Silahkan Ubah Password!',
      allowOutsideClick: false,
      customClass: {
        confirmButton: 'btn btn-danger btn-sm'
      }
    })
    .then(function(result) {
      if (result.value) {
        top.location.href = '<?= base_url('gtk/akun') ?>';
      }
    });
}
</script>
</body>
<!-- END: Body-->

</html>
