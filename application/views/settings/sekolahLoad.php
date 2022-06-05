<!-- vertical tab pill -->
<div class="row">
  <div class="col-lg-2 col-md-2 col-sm-12">
    <div class="faq-navigation d-flex justify-content-between flex-column mb-2 mb-md-0">
      <!-- pill tabs navigation -->
      <ul class="nav nav-pills nav-left flex-column" role="tablist">
        <!-- Identitas Sekolah -->
        <li class="nav-item">
          <a class="nav-link active" id="pill-identitas-sekolah" data-bs-toggle="pill" href="#identitas-sekolah" aria-expanded="true" role="tab">
            <i data-feather="home" class="font-medium-3 me-1"></i>
            <span class="fw-bold">Identitas Sekolah</span>
          </a>
        </li>
        <!-- Identitas Sekolah -->

        <!-- Lokasi Sekolah -->
        <li class="nav-item">
          <a class="nav-link" id="pill-lokasi-sekolah" data-bs-toggle="pill" href="#lokasi-sekolah" aria-expanded="true" role="tab">
            <i data-feather="map-pin" class="font-medium-3 me-1"></i>
            <span class="fw-bold">Lokasi Sekolah</span>
          </a>
        </li>
        <!-- Lokasi Sekolah -->

        <!-- Lokasi Sekolah -->
        <li class="nav-item">
          <a class="nav-link" id="pill-kontak-sekolah" data-bs-toggle="pill" href="#kontak-sekolah" aria-expanded="true" role="tab">
            <i data-feather="link" class="font-medium-3 me-1"></i>
            <span class="fw-bold">Kontak Sekolah</span>
          </a>
        </li>
        <!-- Lokasi Sekolah -->

      </ul>

      <!-- FAQ image -->
      <img src="<?= base_url('assets/'); ?>app-assets/images/illustration/faq-illustrations.svg" class="img-fluid d-none d-md-block" alt="demand img" />
    </div>
  </div>

  <div class="col-lg-10 col-md-10 col-sm-12">
    <!-- pill tabs tab content -->
    <div class="card">
      <div class="card-body">
        <div class="tab-content">

          <!-- Identitas Sekolah panel -->
          <div role="tabpanel" class="tab-pane active" id="identitas-sekolah" aria-labelledby="pill-identitas-sekolah" aria-expanded="true">
            <form class="validate-form1TEST" action="pengaturan_aplikasi" method="POST" enctype="multipart/form-data">
              <!-- icon and header -->
              <div class="d-flex align-items-center">
                <div class="avatar avatar-tag bg-light-primary me-1">
                  <i data-feather="home" class="font-medium-4"></i>
                </div>
                <div>
                  <h4 class="mb-0">Identitas Sekolah</h4>
                  <span>Informasi Identitas Sekolah</span>
                </div>
              </div>

              <!-- divider -->
              <div class="col-12">
                <hr class="my-2" />
              </div>

              <!-- header section -->
              <div class="d-flex">
                <a href="#" class="me-25">
                  <?php if ($profilSekolah['logoSekolah'] && file_exists(FCPATH . "assets/files/images/logo/" . $profilSekolah['logoSekolah'])) { ?>
                    <img src="<?= base_url('assets/'); ?>files/images/logo/<?= $profilSekolah['logoSekolah']; ?>" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profil image" height="80" width="80" />
                  <?php  } else { ?>
                    <img src="<?= base_url('assets/'); ?>files/images/logo/kemendikbud.png" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profil image" height="80" width="80" />
                  <?php } ?>
                </a>
                <!-- upload and reset button -->
                <div class="d-flex align-items-end mt-75 ms-1">
                  <div>
                    <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Logo Sekolah</label>
                    <input type="file" name="fotoGTK" id="account-upload" hidden accept="image/jpeg, image/jpg, image/png" />
                    <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                    <p class="mb-0">JPEG, JPG, PNG. Max Filesize 1 MB</p>
                  </div>
                </div>
                <!--/ upload and reset button -->
              </div>
              <!--/ header section -->

              <div class="row mt-2">
                <!-- Nama Sekolah input -->
                <div class="col-12 col-sm-4">
                  <div class="form-group">
                    <label for="nama-sekolah">Nama Sekolah</label>
                    <input type="text" class="form-control" id="nama-sekolah" name="namaSekolah" placeholder="Nama Sekolah" value="<?= $profilSekolah['namaSekolah'] ?>" />
                  </div>
                </div>
                <!-- NPSN input -->
                <div class="col-12 col-sm-2">
                  <div class="form-group">
                    <label for="npsn">NPSN</label>
                    <input type="text" class="form-control" id="npsn" name="npsn" placeholder="NPSN" value="<?= $profilSekolah['npsn'] ?>" />
                  </div>
                </div>
                <!-- NSS input -->
                <div class="col-12 col-sm-2">
                  <div class="form-group">
                    <label for="nss">NSS</label>
                    <input type="text" class="form-control" id="nss" name="nss" placeholder="NSS" value="<?= $profilSekolah['nss'] ?>" />
                  </div>
                </div>
                <!-- Bentuk Pendidikan input -->
                <div class="col-12 col-sm-2">
                  <div class="form-group">
                    <label for="bentukPendidikan">Bentuk Pendidikan</label>
                    <select class="select2 form-control" id="bentukPendidikan" name="bentukPendidikan">
                      <option value="<?= $profilSekolah['bentukPendidikan'] ?>" selected><?= $profilSekolah['bentukPendidikan'] ?></option>
                      <option value="PAUD">PAUD</option>
                      <option value="SD">SD</option>
                      <option value="MI">MI</option>
                      <option value="SMP">SMP</option>
                      <option value="MTS">MTS</option>
                      <option value="SMA">SMA</option>
                      <option value="MA">MA</option>
                      <option value="SMK">SMK</option>
                    </select>
                  </div>
                </div>
                <!-- Status Sekolah input -->
                <div class="col-12 col-sm-2">
                  <div class="form-group">
                    <label for="statusSekolah">Status Sekolah</label>
                    <select class="select2 form-control" id="statusSekolah" name="statusSekolah">
                      <option value="<?= $profilSekolah['statusSekolah'] ?>" selected><?= $profilSekolah['statusSekolah'] ?></option>
                      <option value="Negeri">Negeri</option>
                      <option value="Swasta">Swasta</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row mt-0">
                <div class="col-12">
                  <button type="submit" name="btnIdentitasSekolah" class="btn btn-primary mt-2 mr-1">Simpan Perubahan</button>
                  <button type="reset" class="btn btn-outline-secondary mt-2">Batal</button>
                </div>
              </div>
            </form>
          </div>
          <!-- Identitas Sekolah panel -->

          <!-- Lokasi Sekolah panel -->
          <div class="tab-pane fade" id="lokasi-sekolah" aria-labelledby="pill-lokasi-sekolah" aria-expanded="true">
            <form class="validate-form1TEST" action="pengaturan_aplikasi" method="POST" enctype="multipart/form-data">
              <!-- icon and header -->
              <div class="d-flex align-items-center">
                <div class="avatar avatar-tag bg-light-primary me-1">
                  <i data-feather="map-pin" class="font-medium-4"></i>
                </div>
                <div>
                  <h4 class="mb-0">Lokasi Sekolah</h4>
                  <span>Informasi Lokasi Sekolah</span>
                </div>
              </div>

              <!-- divider -->
              <div class="col-12">
                <hr class="my-2" />
              </div>

              <!-- header section -->
              <div class="d-flex">
                <a href="#" class="me-25">
                  <?php if ($profilSekolah['logoPemerintah'] && file_exists(FCPATH . "assets/files/images/logo/" . $profilSekolah['logoPemerintah'])) { ?>
                    <img src="<?= base_url('assets/'); ?>files/images/logo/<?= $profilSekolah['logoPemerintah']; ?>" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profil image" height="80" width="80" />
                  <?php  } else { ?>
                    <img src="<?= base_url('assets/'); ?>files/images/logo/kemendikbud.png" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profil image" height="80" width="80" />
                  <?php } ?>
                </a>
                <!-- upload and reset button -->
                <div class="d-flex align-items-end mt-75 ms-1">
                  <div>
                    <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Logo Pemerintah</label>
                    <input type="file" name="fotoGTK" id="account-upload" hidden accept="image/jpeg, image/jpg, image/png" />
                    <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                    <p class="mb-0">JPEG, JPG, PNG. Max Filesize 1 MB</p>
                  </div>
                </div>
                <!--/ upload and reset button -->
              </div>
              <!--/ header section -->

              <div class="row mt-2">
                <!-- Telepon input -->
                <div class="col-12 col-sm-3">
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $profilSekolah['jl'] ?>" />
                  </div>
                </div>
                <!-- Kampung input -->
                <div class="col-12 col-sm-3">
                  <div class="form-group">
                    <label for="kampung">Kampung/Dusun</label>
                    <input type="text" class="form-control" id="kampung" name="kampung" placeholder="Kampung/Dusun" value="<?= $profilSekolah['kp'] ?>" />
                  </div>
                </div>
                <!-- RT input -->
                <div class="col-12 col-sm-3">
                  <div class="form-group">
                    <label for="rt">RT</label>
                    <input type="number" class="form-control" id="rt" name="rt" placeholder="RT" value="<?= $profilSekolah['rt'] ?>" />
                  </div>
                </div>
                <!-- RW input -->
                <div class="col-12 col-sm-3">
                  <div class="form-group">
                    <label for="rw">RW</label>
                    <input type="number" class="form-control" id="rw" name="rw" placeholder="RW" value="<?= $profilSekolah['rw'] ?>" />
                  </div>
                </div>
                <!-- Desa input -->
                <div class="col-12 col-sm-3">
                  <div class="form-group">
                    <label for="desa">Desa/Kelurahan</label>
                    <input type="text" class="form-control" id="desa" name="desa" placeholder="Desa/Kelurahan" value="<?= $profilSekolah['desa'] ?>" />
                  </div>
                </div>
                <!-- Kecamatan input -->
                <div class="col-12 col-sm-3">
                  <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan" value="<?= $profilSekolah['kecamatan'] ?>" />
                  </div>
                </div>
                <!-- Kabupaten input -->
                <div class="col-12 col-sm-3">
                  <div class="form-group">
                    <label for="kabupaten">Kabupaten/Kota</label>
                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="Kabupaten/Kota" value="<?= $profilSekolah['kabupaten'] ?>" />
                  </div>
                </div>
                <!-- Provinsi input -->
                <div class="col-12 col-sm-3">
                  <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="provinsi" value="<?= $profilSekolah['provinsi'] ?>" />
                  </div>
                </div>
                <!-- Kode input -->
                <div class="col-12 col-sm-4">
                  <div class="form-group">
                    <label for="pos">Kode Pos</label>
                    <input type="number" class="form-control" id="pos" name="pos" placeholder="Kode Pos" value="<?= $profilSekolah['pos'] ?>" />
                  </div>
                </div>
                <!-- Latitude input -->
                <div class="col-12 col-sm-4">
                  <div class="form-group">
                    <label for="lat">Latitude</label>
                    <input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude" value="<?= $profilSekolah['lat'] ?>" />
                  </div>
                </div>
                <!-- Longitude input -->
                <div class="col-12 col-sm-4">
                  <div class="form-group">
                    <label for="long">Longitude</label>
                    <input type="text" class="form-control" id="long" name="long" placeholder="Longitude" value="<?= $profilSekolah['long'] ?>" />
                  </div>
                </div>

                <!-- google maps -->
                <div class="col-12 col-sm-12 pt-2">
                  <div class="form-group">
                    <?php if ($profilSekolah['lat'] == null || $profilSekolah['long'] == null) { ?>
                      <iframe id="iframe" src="https://maps.google.com/maps?q=<?= $profilSekolah['namaSekolah'] ?>&output=embed&z=15" width="100%" height="400px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    <?php } else { ?>
                      <iframe id="iframe" src="https://maps.google.com/maps?q=<?= $profilSekolah['lat'] ?>,<?= $profilSekolah['long'] ?>&output=embed&z=15" width="100%" height="400px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    <?php } ?>
                  </div>
                </div>
              </div>

              <div class="row mt-0">
                <div class="col-12">
                  <button type="submit" name="btnLokasiSekolah" class="btn btn-primary mt-2 mr-1">Simpan Perubahan</button>
                  <button type="reset" class="btn btn-outline-secondary mt-2">Batal</button>
                </div>
              </div>
            </form>
          </div>
          <!-- Lokasi Sekolah panel -->

          <!-- Lokasi Sekolah panel -->
          <div class="tab-pane fade" id="kontak-sekolah" aria-labelledby="pill-kontak-sekolah" aria-expanded="true">
            <form class="validate-form1TEST" action="pengaturan_aplikasi" method="POST" enctype="multipart/form-data">
              <!-- icon and header -->
              <div class="d-flex align-items-center">
                <div class="avatar avatar-tag bg-light-primary me-1">
                  <i data-feather="link" class="font-medium-4"></i>
                </div>
                <div>
                  <h4 class="mb-0">Kontak Sekolah</h4>
                  <span>Informasi Kontak Sekolah</span>
                </div>
              </div>

              <!-- divider -->
              <div class="col-12">
                <hr class="my-2" />
              </div>

              <div class="col-12">
                <div class="row">
                  <!-- Website input -->
                  <div class="col-12 col-sm-3">
                    <div class="form-group">
                      <label for="account-web">Website</label>
                      <div class="input-group input-group-merge mb-2">
                        <span class="input-group-text">
                          <i data-feather="globe" class="font-medium-2"></i>
                        </span>
                        <input type="text" id="account-web" name="web" class="form-control" placeholder="Alamat Website" value="<?= $profilSekolah['web'] ?>" />
                      </div>
                    </div>
                  </div>
                  <!-- Email input -->
                  <div class="col-12 col-sm-3">
                    <div class="form-group">
                      <label for="account-email">Email</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text">
                          <i data-feather="mail" class="font-medium-2"></i>
                        </span>
                        <input type="text" id="account-email" name="email" class="form-control" placeholder="Alamat Email" value="<?= $profilSekolah['email'] ?>" />
                      </div>
                    </div>
                  </div>
                  <!-- Telepon input -->
                  <div class="col-12 col-sm-3">
                    <div class="form-group">
                      <label for="account-tel">Telepon</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text">
                          <i data-feather="phone" class="font-medium-2"></i>
                        </span>
                        <input type="text" id="account-tel" name="tel" class="form-control" placeholder="Nomor Telepon" value="<?= $profilSekolah['telepon'] ?>" />
                      </div>
                    </div>
                  </div>
                  <!-- Fax input -->
                  <div class="col-12 col-sm-3">
                    <div class="form-group">
                      <label for="account-fax">Fax</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text">
                          <i data-feather="printer" class="font-medium-2"></i>
                        </span>
                        <input type="text" id="account-fax" name="fax" class="form-control" placeholder="Nomor Fax" value="<?= $profilSekolah['fax'] ?>" />
                      </div>
                    </div>
                  </div><!-- facebook link input -->
                  <div class="col-12 col-sm-3">
                    <div class="form-group">
                      <label for="account-facebook">Facebook</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text">
                          <i data-feather="facebook" class="font-medium-2"></i>
                        </span>
                        <input type="text" id="account-facebook" name="facebook" class="form-control" placeholder="Link Facebook" value="<?= $profilSekolah['facebook'] ?>" />
                      </div>
                    </div>
                  </div>
                  <!-- instagram link input -->
                  <div class="col-12 col-sm-3">
                    <div class="form-group">
                      <label for="account-instagram">Instagram</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text">
                          <i data-feather="instagram" class="font-medium-2"></i>
                        </span>
                        <input type="text" id="account-instagram" name="instagram" class="form-control" placeholder="Link Instagram" value="<?= $profilSekolah['instagram'] ?>" />
                      </div>
                    </div>
                  </div>
                  <!-- instagram link input -->
                  <div class="col-12 col-sm-3">
                    <div class="form-group">
                      <label for="account-youtube">YouTube</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text">
                          <i data-feather="youtube" class="font-medium-2"></i>
                        </span>
                        <input type="text" id="account-youtube" name="youtube" class="form-control" placeholder="Link YouTube" value="<?= $profilSekolah['youtube'] ?>" />
                      </div>
                    </div>
                  </div>
                  <!-- instagram link input -->
                  <div class="col-12 col-sm-3">
                    <div class="form-group">
                      <label for="account-whatsapp">WhatsApp</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text">
                          <i data-feather="message-circle" class="font-medium-2"></i>
                        </span>
                        <input type="text" id="account-whatsapp" name="whatsapp" class="form-control" placeholder="Link WhatsApp" value="<?= $profilSekolah['whatsapp'] ?>" />
                      </div>
                    </div>
                  </div>


                </div>
              </div>


              <div class="row mt-0">
                <div class="col-12">
                  <button type="submit" name="btnLokasiSekolah" class="btn btn-primary mt-2 mr-1">Simpan Perubahan</button>
                  <button type="reset" class="btn btn-outline-secondary mt-2">Batal</button>
                </div>
              </div>
            </form>
          </div>
          <!-- Lokasi Sekolah panel -->

        </div>

      </div>

    </div>
  </div>
</div>
<!--  Identitas Sekolah Ends -->
<script>
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
</script>