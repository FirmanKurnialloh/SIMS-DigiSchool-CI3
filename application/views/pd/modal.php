<!-- MODAL FEATURE SOON -->
<div class="modal fade" id="soonFeature" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
		<div class="modal-content">
			<div class="modal-header bg-transparent">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body pb-5 px-sm-5 pt-50">
				<div class="text-center mb-2">
					<h2 class="mb-1">Coming Soon 🚀</h2>
					<p class="mb-2">Fitur yang diakses belum tersedia.</p>
					<img class="img-fluid" src="<?= base_url('assets/'); ?>/files/images/logo/working.png" alt="Soon Feature" width="50%" />
				</div>
				<div class="col-12 text-center mt-2 pt-50">
					<button type="reset" class="btn btn-outline-primary" data-bs-dismiss="modal" aria-label="Close">OK</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- MODAL LOGOUT -->

<!-- MODAL LOGOUT -->
<div class="modal fade" id="modalLogout" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
		<div class="modal-content">
			<div class="modal-header bg-transparent">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body pb-5 px-sm-5 pt-50">
				<div class="text-center mb-2">
					<h1 class="mb-1">Anda Yakin Ingin Keluar ?</h1>
				</div>
				<div class="col-12 text-center mt-2 pt-50">
					<a href="<?= base_url('auth/logout') ?>" class="btn btn-danger me-1">Keluar</a>
					<button type="reset" class="btn btn-outline-success" data-bs-dismiss="modal" aria-label="Close">Batalkan</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- MODAL LOGOUT -->