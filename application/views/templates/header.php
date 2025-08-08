<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
  <meta name="description"
    content="<?= $serverSetting['namaAplikasi']; ?> Merupakan Aplikasi Sistem Informasi Manajemen Sekolah Berbasis Web yang dirancang khusus untuk menunjang fasilitas Digitalisasi Sekolah">
  <meta name="keywords"
    content="<?= $serverSetting['namaAplikasi']; ?>, Aplikasi Sekolah Berbasis Web, Aplikasi Sekolah Berbasis Android, Digitalisasi Sekolah, Modernisasi Sekolah, Sistem Informasi Manajemen Sekolah">
  <meta name="author" content="Firman Kurnialloh">
  <title><?= $serverSetting['namaAplikasi'] . ' ' . $profilSekolah['namaSekolah']; ?></title>
  <link rel="apple-touch-icon"
    href="<?= base_url('assets/'); ?>files/images/logo/<?= $profilSekolah['logoSekolah']; ?>">
  <link rel="shortcut icon" type="image/x-icon"
    href="<?= base_url('assets/'); ?>files/images/logo/<?= $profilSekolah['logoSekolah']; ?>">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
    rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css?family=Quicksand:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet"> -->

  <!-- BEGIN: Vendor CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/vendors.min.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/vendors/css/extensions/toastr.min.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/vendors/css/extensions/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/vendors/css/forms/select/select2.min.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/vendors/css/animate/animate.min.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/vendors/css/editors/quill/katex.min.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/vendors/css/editors/quill/quill.bubble.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/vendors/css/editors/quill/quill.snow.css">
  <!-- END: Vendor CSS-->

  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/bootstrap-extended.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/colors.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/components.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/themes/dark-layout.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/themes/bordered-layout.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/themes/semi-dark-layout.css">

  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/css/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/css/plugins/extensions/ext-component-toastr.min.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/css/plugins/extensions/ext-component-sweet-alerts.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/pages/page-knowledge-base.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>app-assets/css/plugins/forms/form-validation.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/pages/page-faq.css">
  <!-- END: Page CSS-->

  <!-- BEGIN: Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>assets/css/style.css">
  <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static menu-fixed <?= $pageCollumn ?>"
  data-open="click" data-menu="vertical-menu-modern" data-col="<?= $pageCollumn ?>">
