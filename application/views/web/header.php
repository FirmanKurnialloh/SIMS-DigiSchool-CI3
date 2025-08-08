<!DOCTYPE html>
<html lang="id">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
	<meta name="description"
		content="<?= $serverSetting['namaAplikasi']; ?> Merupakan Aplikasi Sistem Informasi Manajemen Sekolah Berbasis Web yang dirancang khusus untuk menunjang fasilitas Digitalisasi Sekolah">
	<meta name="keywords"
		content="<?= $serverSetting['namaAplikasi']; ?>, Aplikasi Sekolah Berbasis Web, Aplikasi Sekolah Berbasis Android, Digitalisasi Sekolah, Modernisasi Sekolah, Sistem Informasi Manajemen Sekolah">
	<meta name="author" content="Firman Kurnialloh">
	<title><?= $profilSekolah['namaSekolah']; ?></title>
	<link rel="apple-touch-icon"
		href="<?= base_url('assets/'); ?>files/images/logo/<?= $profilSekolah['logoSekolah']; ?>">
	<link rel="shortcut icon" type="image/x-icon"
		href="<?= base_url('assets/'); ?>files/images/logo/<?= $profilSekolah['logoSekolah']; ?>">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
		rel="stylesheet">
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
	<style>
		body {
			font-family: 'Inter', sans-serif;
		}
	</style>
</head>

<body class="bg-white text-gray-800">
	<!-- Loader Overlay -->
	<div id="page-loader"
		class="fixed inset-0 bg-white flex items-center justify-center z-50 transition-opacity duration-500 opacity-100">
		<img src="<?= base_url('assets/files/images/logo/page-loader-1.gif'); ?>" alt="Loading..." class="w-20 h-20">
	</div>

	<!-- Header / Navigation -->
	<header class="bg-white shadow-sm sticky top-0 z-50">
		<div class="container mx-auto px-6 py-4 flex justify-between items-center">
			<div class="flex items-center space-x-4">
				<img src="<?= base_url('assets/'); ?>files/images/logo/<?= $profilSekolah['logoSekolah']; ?>"
					class="h-10 w-10 rounded-full" width="100" alt="Logo Sekolah">
				<span class="text-xl font-bold text-gray-700"><?= $profilSekolah['namaSekolah']; ?></span>
			</div>

			<nav class="hidden md:flex items-center space-x-8">
				<a href="<?= base_url(); ?>" class="<?= set_active(''); ?>">Beranda</a>
				<a href="<?= base_url('web/tentang'); ?>" class="<?= set_active('web/tentang'); ?>">Profil</a>
				<a href="<?= base_url('berita'); ?>" class="<?= set_active('berita'); ?>">Berita</a>
				<a href="<?= base_url('kurikulum'); ?>" class="<?= set_active('kurikulum'); ?>">Kurikulum</a>
				<a href="<?= base_url('ekskul'); ?>" class="<?= set_active('ekskul'); ?>">Ekstrakurikuler</a>
				<a href="<?= base_url('galeri'); ?>" class="<?= set_active('galeri'); ?>">Galeri</a>
				<a href="<?= base_url('kontak'); ?>" class="<?= set_active('kontak'); ?>">Kontak Kami</a>
			</nav>

			<div class="flex items-center space-x-4">
				<img src="<?= base_url('assets/'); ?>files/images/logo/Logo-PBUS.png" alt="Logo PBUS" class="h-10">
				<img src="<?= base_url('assets/'); ?>files/images/logo/Logo-Ramah.png" alt="Logo Ramah" class="h-10">
				<!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
				</svg> -->
				<button onclick="window.location.href='<?= base_url('login'); ?>'"
					class="bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
					Login
				</button>

			</div>
		</div>
	</header>
