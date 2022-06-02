<!-- MODAL FORGOT PASSWORD GTK -->
<div class="modal fade" id="modalForgotGTK" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
    <div class="modal-content">
      <div class="modal-header bg-transparent">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pb-5 px-sm-5 pt-50">
        <div class="text-center mb-2">
          <h1 class="mb-1">Lupa Password</h1>
          <p>Silahkan Isi Informasi Berikut</p>
        </div>
        <form action="forgotPassGTK" method="POST" id="modalForgotGTKForm" class="modalForgotGTKForm row gy-1 pt-75">
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalForgotGTKNama">Nama Lengkap</label>
            <input type="text" id="modalForgotGTKNama" name="modalForgotGTKNama" class="form-control" placeholder="Nama Lengkap" autocomplete="off" required />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalForgotGTKUsername">Username</label>
            <input type="text" id="modalForgotGTKUsername" name="modalForgotGTKUsername" class="form-control" placeholder="Username" autocomplete="off" required />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalForgotGTKSelectAdmin">Pilih admin yang akan dihubungi</label>
            <select id="modalForgotGTKSelectAdmin" name="modalForgotGTKSelectAdmin" class="select2 form-select" required>
              <?php
              $queryUserAdmin = "SELECT `username` FROM `user` WHERE `role_id` = '1'";
              $queryUserAdmin = $this->db->query($queryUserAdmin)->result_array();
              if (!$queryUserAdmin) {
              ?>
                <option value="" disabled>Data Tidak Ditemukan!</option>
              <?php
              } else {
              ?>
                <option value="" selected disabled>Pilih Admin</option>
                <?php
                foreach ($queryUserAdmin as $adminUsernames) :
                  $adminUsernames   = $adminUsernames['username'];
                  $queryProfilAdmin = "SELECT `username`,`namaLengkap`,`gelarDepan`,`gelarBelakang`,`hp`
                                      FROM `profil_gtk`
                                      WHERE `username` = '$adminUsernames'
                                      ORDER BY LENGTH(`namaLengkap`),`namaLengkap` ASC";
                  $queryProfilAdmin = $this->db->query($queryProfilAdmin)->row_array();
                ?>
                  <option value="<?= $queryProfilAdmin['username'] ?>"><?= $queryProfilAdmin['gelarDepan'] . ' ' . $queryProfilAdmin['namaLengkap'] . ', ' . $queryProfilAdmin['gelarBelakang'] ?></option>
              <?php
                endforeach;
              }
              ?>
            </select>
          </div>
          <div class="col-12 text-center mt-2 pt-50">
            <div class="alert alert-warning" role="alert">
              <h4 class="alert-heading">Penting !</h4>
              <div class="alert-body">
                Silahkan izinkan Pop Up dan Redirect pada browser anda agar dapat mengirimkan pesan via WhatsApp !
              </div>
            </div>
            <button type="submit" class="btn btn-success me-1">Kirim WhatsApp</button>
            <button type="reset" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Batalkan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- MODAL FORGOT PASSWORD GTK -->

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