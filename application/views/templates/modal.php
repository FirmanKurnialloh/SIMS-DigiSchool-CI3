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
              $queryUserAdmin = "SELECT `id` FROM `user` WHERE `role_id` = '1'";
              $queryUserAdmin = $this->db->query($queryUserAdmin)->row_array();
              if (!$queryUserAdmin) {
              ?>
                <option value="" disabled>Data Tidak Ditemukan!</option>
              <?php
              } else {
              ?>
                <option value="" selected disabled>Pilih Admin</option>
                <?php
                foreach ($queryUserAdmin as $kontakAdmin) :
                  $idAdmin = $kontakAdmin['id'];
                  $queryKontakAdmin = "SELECT `id`,`namaLengkap`,`gelarDepan`,`gelarBelakang`,`hp`
                                      FROM `profil_gtk`
                                      WHERE `idUser` = '$idAdmin'
                                      ORDER BY LENGTH(`namaLengkap`),`namaLengkap` ASC";
                  $queryKontakAdmin = $this->db->query($queryKontakAdmin)->row_array();
                ?>
                  <option value="<?= $queryKontakAdmin['id'] ?>"><?= $queryKontakAdmin['gelarDepan'] . ' ' . $queryKontakAdmin['namaLengkap'] . ', ' . $queryKontakAdmin['gelarBelakang'] ?></option>
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

<!-- MODAL FORGOT PASSWORD PD -->
<div class="modal fade" id="modalForgotPD" tabindex="-1" aria-hidden="true">
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
        <form action="forgotPassPD" method="POST" id="modalForgotPDForm" class="modalForgotPDForm row gy-1 pt-75">
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalForgotPDNama">Nama Lengkap</label>
            <input type="text" id="modalForgotPDNama" name="modalForgotPDNama" class="form-control" placeholder="Nama Lengkap" autocomplete="off" required />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalForgotPDNISN">NISN</label>
            <input type="text" id="modalForgotPDNISN" name="modalForgotPDNISN" class="form-control" placeholder="TULISKAN NISN (10 DIGIT ANGKA)" autocomplete="off" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="10" required />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalForgotPDSelectAdmin">Pilih admin yang akan dihubungi</label>
            <select id="modalForgotPDSelectAdmin" name="modalForgotPDSelectAdmin" class="select2 form-select" required>
              <?php
              $queryUserAdmin = "SELECT `id` FROM `user` WHERE `role_id` = '1'";
              $queryUserAdmin = $this->db->query($queryUserAdmin)->row_array();
              if (!$queryUserAdmin) {
              ?>
                <option value="" disabled>Data Tidak Ditemukan!</option>
              <?php
              } else {
              ?>
                <option value="" selected disabled>Pilih Admin</option>
                <?php
                foreach ($queryUserAdmin as $kontakAdmin) :
                  $idAdmin = $kontakAdmin['id'];
                  $queryKontakAdmin = "SELECT `id`,`namaLengkap`,`gelarDepan`,`gelarBelakang`,`hp`
                                      FROM `profil_gtk`
                                      WHERE `idUser` = '$idAdmin'
                                      ORDER BY LENGTH(`namaLengkap`),`namaLengkap` ASC";
                  $queryKontakAdmin = $this->db->query($queryKontakAdmin)->row_array();
                ?>
                  <option value="<?= $queryKontakAdmin['id'] ?>"><?= $queryKontakAdmin['gelarDepan'] . ' ' . $queryKontakAdmin['namaLengkap'] . ', ' . $queryKontakAdmin['gelarBelakang'] ?></option>
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
<!-- MODAL FORGOT PASSWORD PD -->