<!-- MODAL FORGOT PASSWORD GTK -->
<div class="modal fade" id="modalForgot" tabindex="-1" aria-hidden="true">
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
        <form action="authPublic" method="POST" id="modalForgotForm" class="modalForgotForm row gy-1 pt-75">
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalForgotNama">Nama Lengkap</label>
            <input type="text" id="modalForgotNama" name="modalForgotNama" class="form-control" placeholder="Nama Lengkap" autocomplete="off" required />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalForgotUsername">Username</label>
            <input type="text" id="modalForgotUsername" name="modalForgotUsername" class="form-control" placeholder="Username" autocomplete="off" required />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalForgotSelectAdmin">Pilih admin yang akan dihubungi</label>
            <select id="modalForgotSelectAdmin" name="modalForgotSelectAdmin" class="select2 form-select" required>
              <?php
              $query = "SELECT `username` FROM `user` WHERE `role_id` = '1'";
              $queryUserAdmin = $this->db->query($query)->row_array();
              ?>

              <?php
              foreach ($queryUserAdmin as $kontakAdmin) :
              ?>

              <?php
              endforeach;
              ?>
              <?php
              $sqlAdmin   = mysqli_query($connectBase, "SELECT `id` 
                                                        FROM `user_gtk` 
                                                        WHERE `admin` = '1' 
                                                        ORDER BY `id` ASC
                                                        ");
              $rAdmin     = mysqli_num_rows($sqlAdmin);
              $noAdmin    = 1;


              if ($queryUserAdmin <= 0) {  ?>
                <option value="" disabled>Data Tidak Ditemukan!</option>
              <?php } else { ?>
                <option value="" selected disabled>Pilih Admin</option>
              <?php
              foreach ($queryUserAdmin as $kontakAdmin) :
              ?>
                <?php
                while ($i = mysqli_fetch_array($sqlAdmin)) {
                  $idUserAdmin      = $i['id'];
                  $sqlKontakAdmin   = mysqli_query($connectBase, "SELECT `namaLengkap`,`gelarDepan`,`gelarBelakang`,`hp`
                                                              FROM `profil_gtk` 
                                                              WHERE `idUser` = '$idUserAdmin'
                                                              ORDER BY LENGTH(`namaLengkap`),`namaLengkap` ASC
                                                              ");
                  $rKontakAdmin     = mysqli_num_rows($sqlKontakAdmin);
                  $aKontakAdmin     = mysqli_fetch_array($sqlKontakAdmin);
                  $namaKontakAdmin  = $aKontakAdmin['namaLengkap'];
                  $gelarDepanKontakAdmin  = $aKontakAdmin['gelarDepan'];
                  $gelarBelakangKontakAdmin  = $aKontakAdmin['gelarBelakang'];
                  $hpKontakAdmin    = $aKontakAdmin['hp'];
                ?>
                  <option value="<?= $idUserAdmin ?>"><?= $gelarDepanKontakAdmin . ' ' . $namaKontakAdmin . ', ' . $gelarBelakangKontakAdmin ?></option>
                <?php } ?>
              <?php $noAdmin++;
              } ?>
            </select>
          </div>
          <div class="col-12 text-center mt-2 pt-50">
            <button type="submit" name="submitForgot" class="btn btn-success me-1">Kirim WhatsApp</button>
            <button type="reset" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">Batalkan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>