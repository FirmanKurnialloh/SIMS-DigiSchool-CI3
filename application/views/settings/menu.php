<!-- BEGIN: Menu Setting-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
	<div class="navbar-header mb-0">
		<ul class="nav navbar-nav flex-row">
			<li class="nav-item nav-toggle me-auto">
				<a class="navbar-brand" href="<?= base_url('settings'); ?>">
					<span class="brand-logos">
						<img class="round" src="<?= base_url('assets/'); ?>files/images/logo/<?= $profilSekolah['logoSekolah']; ?>"
							alt="logo" height="40" width="40">
					</span>
					<h2 class="brand-text">
						<small>
							<?= $serverSetting['namaAplikasi']; ?>
							<br>
							<sup>
								<?= $serverSetting['sloganAplikasi']; ?>
							</sup>
						</small>
					</h2>
				</a>
			</li>
			<li class="nav-item nav-toggle">
				<a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
					<i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
					<i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
						data-ticon="disc"></i>
				</a>
			</li>
		</ul>
	</div>

	<div class="shadow-bottom"></div>

	<div class="main-menu-content pt-2">
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


			<li class="navigation-header text-dark">
				<span data-i18n="Menu">Menu</span>
				<i data-feather="more-horizontal"></i>
			</li>
			<li class="nav-item">
				<a class="d-flex align-items-center" href="<?= base_url('settings'); ?>">
					<i data-feather="settings"></i>
					<span class="menu-title text-truncate" data-i18n="Pengaturan Aplikasi">Pengaturan Aplikasi</span>
				</a>
				<ul class="menu-content">
					<li class="<?php if ($this->uri->segment(2) == "sekolah") {
						echo "active";
					} ?>">
						<a class="d-flex align-items-center" href="<?= base_url('settings/sekolah'); ?>">
							<i data-feather="circle"></i>
							<span class="menu-item text-truncate" data-i18n="Profil Sekolah">Profil Sekolah</span>
						</a>
					</li>

					<li class="<?php if ($this->uri->segment(2) == "tapel") {
						echo "active";
					} ?>">
						<a class="d-flex align-items-center" href="<?= base_url('settings/tapel'); ?>">
							<i data-feather="circle"></i>
							<span class="menu-item text-truncate" data-i18n="Tahun Pelajaran">Tahun Pelajaran</span>
						</a>
					</li>

					<li class="<?php if ($this->uri->segment(2) == "mapel") {
						echo "active";
					} ?>">
						<a class="d-flex align-items-center" href="<?= base_url('settings/mapel'); ?>">
							<i data-feather="circle"></i>
							<span class="menu-item text-truncate" data-i18n="Mata Pelajaran">Mata Pelajaran</span>
						</a>
					</li>

					<li class="<?php if ($this->uri->segment(2) == "ekskul") {
						echo "active";
					} ?>">
						<a class="d-flex align-items-center" href="<?= base_url('settings/ekskul'); ?>">
							<i data-feather="circle"></i>
							<span class="menu-item text-truncate" data-i18n="Ekstrakurikuler">Ekstrakurikuler</span>
						</a>
					</li>

					<li class="<?php if ($this->uri->segment(2) == "kelas") {
						echo "active";
					} ?>">
						<a class="d-flex align-items-center" href="<?= base_url('settings/kelas'); ?>">
							<i data-feather="circle"></i>
							<span class="menu-item text-truncate" data-i18n="Kelas">Kelas</span>
						</a>
					</li>

					<li>
						<a class="d-flex align-items-center" href="<?= base_url('settings'); ?>">
							<i data-feather="circle"></i>
							<span class="menu-item text-truncate" data-i18n="Akun">Akun</span>
						</a>
						<ul class="menu-content">
							<li class="<?php if ($this->uri->segment(2) == "gtk") {
								echo "active";
							} ?>">
								<a class="d-flex align-items-center" href="<?= base_url('settings/gtk'); ?>">
									<i data-feather="circle"></i>
									<span class="menu-item text-truncate" data-i18n="Guru">GTK</span>
								</a>
							</li>
							<li class="<?php if ($this->uri->segment(2) == "pd") {
								echo "active";
							} ?>">
								<a class="d-flex align-items-center" href="<?= base_url('settings/pd'); ?>">
									<i data-feather="circle"></i>
									<span class="menu-item text-truncate" data-i18n="Peserta Didik">Peserta Didik</span>
								</a>
							</li>
						</ul>
					</li>

					<li class="<?php if ($this->uri->segment(2) == "db") {
						echo "active";
					} ?>">
						<a class="d-flex align-items-center" href="<?= base_url('settings/db'); ?>">
							<i data-feather="circle"></i>
							<span class="menu-item text-truncate" data-i18n="Database">Database</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="nav-item">
				<a class="d-flex align-items-center" href="<?= base_url('settings'); ?>">
					<i data-feather="airplay"></i>
					<span class="menu-title text-truncate" data-i18n="Pengaturan Add-On">Pengaturan Add-On</span>
				</a>
				<ul class="menu-content">
					<?php if (is_web_installed()) { ?>
						<li class="<?php if ($this->uri->segment(1) == "web") {
							echo "active";
						} ?>">
							<a class="d-flex align-items-center" href="<?= base_url('web/beranda'); ?>">
								<i data-feather="circle"></i>
								<span class="menu-title text-truncate" data-i18n="WEB">Modul WEB</span>
							</a>
						</li>
					<?php } ?>
					<?php if (is_ppdb_installed()) { ?>
						<li class="<?php if ($this->uri->segment(1) == "LayananPPDB") {
							echo "active";
						} ?>">
							<a class="d-flex align-items-center" href="<?= base_url('LayananPPDB/settings'); ?>">
								<i data-feather="circle"></i>
								<span class="menu-title text-truncate" data-i18n="PPDB">Modul PPDB</span>
							</a>
						</li>
					<?php } ?>
				</ul>
			</li>

		</ul>
	</div>
</div>
<!-- END: Menu Setting-->
