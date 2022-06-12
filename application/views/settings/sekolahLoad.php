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
            <form class="validate-form" action="<?= base_url("settings/editProfilSekolah") ?>" method="POST" enctype="multipart/form-data">
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
                    <input type="file" name="logoSekolah" id="account-upload" hidden accept="image/jpeg, image/jpg, image/png" />
                    <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                    <p class="mb-0">JPEG, JPG, PNG. Max Filesize 1 MB</p>
                  </div>
                </div>
                <!--/ upload and reset button -->
              </div>
              <!--/ header section -->

              <div class="row mt-2">
                <!-- Nama Sekolah input -->
                <div class="col-12 col-sm-4 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="nama-sekolah">Nama Sekolah</label>
                    <input type="text" class="form-control" id="nama-sekolah" name="namaSekolah" placeholder="Nama Sekolah" value="<?= $profilSekolah['namaSekolah'] ?>" required autocomplete="off" data-msg="Masukan Nama Sekolah" />
                  </div>
                </div>
                <!-- NPSN input -->
                <div class="col-12 col-sm-2 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="npsn">NPSN</label>
                    <input type="text" class="form-control" id="npsn" name="npsn" placeholder="NPSN" value="<?= $profilSekolah['npsn'] ?>" required autocomplete="off" data-msg="Masukan NPSN" maxlength="8" oninput="javascript:if(this.value.length>this.maxLength)this.value=this.value.slice(0, this.maxLength);" />
                  </div>
                </div>
                <!-- NSS input -->
                <div class="col-12 col-sm-2 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="nss">NSS</label>
                    <input type="text" class="form-control" id="nss" name="nss" placeholder="NSS" value="<?= $profilSekolah['nss'] ?>" required autocomplete="off" data-msg="Masukan NSS" maxlength="12" oninput="javascript:if(this.value.length>this.maxLength)this.value=this.value.slice(0, this.maxLength);" />
                  </div>
                </div>
                <!-- Bentuk Pendidikan input -->
                <div class="col-12 col-sm-2 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="bentukPendidikan">Bentuk Pendidikan</label>
                    <select class="select2 hide-search form-control" id="bentukPendidikan" name="bentukPendidikan" required autocomplete="off" data-msg="Pilih Bentuk Pendidikan">
                      <optgroup label="Terpilih">
                        <option value="<?= $profilSekolah['bentukPendidikan'] ?>" selected><?= $profilSekolah['bentukPendidikan'] ?></option>
                      </optgroup>
                      <optgroup label="Pilih">
                        <option value="PAUD">PAUD</option>
                        <option value="SD">SD</option>
                        <option value="MI">MI</option>
                        <option value="SMP">SMP</option>
                        <option value="MTS">MTS</option>
                        <option value="SMA">SMA</option>
                        <option value="MA">MA</option>
                        <option value="SMK">SMK</option>
                      </optgroup>
                    </select>
                  </div>
                </div>
                <!-- Status Sekolah input -->
                <div class="col-12 col-sm-2 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="statusSekolah">Status Sekolah</label>
                    <select class="select2 hide-search form-control" id="statusSekolah" name="statusSekolah" required autocomplete="off" data-msg="Pilih Status Sekolah">
                      <optgroup label="Terpilih">
                        <option value="<?= $profilSekolah['statusSekolah'] ?>" selected><?= $profilSekolah['statusSekolah'] ?></option>
                      </optgroup>
                      <optgroup label="Pilih">
                        <option value="Negeri">Negeri</option>
                        <option value="Swasta">Swasta</option>
                      </optgroup>
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
            <form class="validate-form" action="<?= base_url("settings/editLokasiSekolah") ?>" method="POST" enctype="multipart/form-data">
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
                    <img src="<?= base_url('assets/'); ?>files/images/logo/<?= $profilSekolah['logoPemerintah']; ?>" id="account-upload-img2" class="uploadedAvatar2 rounded me-50" alt="profil image" height="80" width="80" />
                  <?php  } else { ?>
                    <img src="<?= base_url('assets/'); ?>files/images/logo/kemendikbud.png" id="account-upload-img2" class="uploadedAvatar2 rounded me-50" alt="profil image" height="80" width="80" />
                  <?php } ?>
                </a>
                <!-- upload and reset button -->
                <div class="d-flex align-items-end mt-75 ms-1">
                  <div>
                    <label for="account-upload2" class="btn btn-sm btn-primary mb-75 me-75">Logo Pemerintah</label>
                    <input type="file" name="logoPemerintah" id="account-upload2" hidden accept="image/jpeg, image/jpg, image/png" />
                    <button type="button" id="account-reset2" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                    <p class="mb-0">JPEG, JPG, PNG. Max Filesize 1 MB</p>
                  </div>
                </div>
                <!--/ upload and reset button -->
              </div>
              <!--/ header section -->

              <div class="row mt-2">
                <!-- Nama Pemerintah input -->
                <div class="col-12 col-sm-6 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="namaPemerintah">Nama Pemerintah</label>
                    <input type="text" class="form-control" id="namaPemerintah" name="namaPemerintah" placeholder="Nama Pemerintah" value="<?= $profilSekolah['namaPemerintah'] ?>" required autocomplete="off" data-msg="Masukan Nama Pemerintah" />
                  </div>
                </div>
                <!-- Bentuk Pemerintah input -->
                <div class="col-12 col-sm-6 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="bentukPemerintah">Bentuk Pemerintah</label>
                    <select class="select2 hide-search form-control" id="bentukPemerintah" name="bentukPemerintah" required autocomplete="off" data-msg="Pilih Bentuk Pemerintah">
                      <optgroup label="Terpilih">
                        <option value="<?= $profilSekolah['bentukPemerintah'] ?>" selected><?= $profilSekolah['bentukPemerintah'] ?></option>
                      </optgroup>
                      <optgroup label="Pilih">
                        <option value="Provinsi">Provinsi</option>
                        <option value="Kabupaten">Kabupaten</option>
                        <option value="Kota">Kota</option>
                        <option value="UPTD">UPTD</option>
                        <option value="UPT">UPT</option>
                        <option value="Yayasan">Yayasan</option>
                      </optgroup>
                    </select>
                  </div>
                </div>
                <!-- Telepon input -->
                <div class="col-12 col-sm-3 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="alamat">Alamat / Nama Jalan</label>
                    <input type="text" class="form-control" id="alamat" name="jl" placeholder="Alamat / Nama Jalan" value="<?= $profilSekolah['jl'] ?>" required autocomplete="off" data-msg="Masukan Alamat" />
                  </div>
                </div>
                <!-- Kampung input -->
                <div class="col-12 col-sm-3 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="kampung">Kampung/Dusun</label>
                    <input type="text" class="form-control" id="kampung" name="kp" placeholder="Kampung/Dusun" value="<?= $profilSekolah['kp'] ?>" required autocomplete="off" data-msg="Masukan Kampung/Dusun" />
                  </div>
                </div>
                <!-- RT input -->
                <div class="col-12 col-sm-3 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="rt">RT</label>
                    <input type="number" class="form-control" id="rt" name="rt" placeholder="RT" value="<?= $profilSekolah['rt'] ?>" required autocomplete="off" data-msg="Masukan RT" />
                  </div>
                </div>
                <!-- RW input -->
                <div class="col-12 col-sm-3 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="rw">RW</label>
                    <input type="number" class="form-control" id="rw" name="rw" placeholder="RW" value="<?= $profilSekolah['rw'] ?>" required autocomplete="off" data-msg="Masukan RW" />
                  </div>
                </div>
                <!-- Desa input -->
                <div class="col-12 col-sm-3 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="desa">Desa/Kelurahan</label>
                    <input type="text" class="form-control" id="desa" name="desa" placeholder="Desa/Kelurahan" value="<?= $profilSekolah['desa'] ?>" required autocomplete="off" data-msg="Masukan Desa/Kelurahan" />
                  </div>
                </div>
                <!-- Kecamatan input -->
                <div class="col-12 col-sm-3 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="kecamatan">Kecamatan</label>
                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan" value="<?= $profilSekolah['kecamatan'] ?>" required autocomplete="off" data-msg="Masukan Kecamatan" />
                  </div>
                </div>
                <!-- Kabupaten input -->
                <div class="col-12 col-sm-3 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="kabupaten">Kabupaten/Kota</label>
                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="Kabupaten/Kota" value="<?= $profilSekolah['kabupaten'] ?>" required autocomplete="off" data-msg="Masukan Kabupaten/Kota" />
                  </div>
                </div>
                <!-- Provinsi input -->
                <div class="col-12 col-sm-3 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="provinsi">Provinsi</label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi" value="<?= $profilSekolah['provinsi'] ?>" required autocomplete="off" data-msg="Masukan Provinsi" />
                  </div>
                </div>
                <!-- Kode input -->
                <div class="col-12 col-sm-4 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="pos">Kode Pos</label>
                    <input type="number" class="form-control" id="pos" name="pos" placeholder="Kode Pos" value="<?= $profilSekolah['pos'] ?>" required autocomplete="off" data-msg="Masukan Kode Pos" maxlength="5" oninput="javascript:if(this.value.length>this.maxLength)this.value=this.value.slice(0, this.maxLength);" />
                  </div>
                </div>
                <!-- Latitude input -->
                <div class="col-12 col-sm-4 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="lat">Latitude</label>
                    <input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude" value="<?= $profilSekolah['lat'] ?>" required autocomplete="off" data-msg="Masukan Latitude" />
                  </div>
                </div>
                <!-- Longitude input -->
                <div class="col-12 col-sm-4 mb-1">
                  <div class="form-group">
                    <label class="form-label" for="long">Longitude</label>
                    <input type="text" class="form-control" id="long" name="long" placeholder="Longitude" value="<?= $profilSekolah['long'] ?>" required autocomplete="off" data-msg="Masukan Longitude" />
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
            <form class="validate-form" action="<?= base_url("settings/editKontakSekolah") ?>" method="POST" enctype="multipart/form-data">
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
                      <label class="form-label" for="account-web">Website</label>
                      <div class="input-group input-group-merge mb-2">
                        <span class="input-group-text">
                          <i data-feather="globe" class="font-medium-2"></i>
                        </span>
                        <input type="text" id="account-web" name="web" class="form-control" placeholder="Alamat Website" value="<?= $profilSekolah['web'] ?>" autocomplete="off" data-msg="Masukan Alamat Website" />
                      </div>
                    </div>
                  </div>
                  <!-- Email input -->
                  <div class="col-12 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="account-email">Email</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text">
                          <i data-feather="mail" class="font-medium-2"></i>
                        </span>
                        <input type="text" id="account-email" name="email" class="form-control" placeholder="Alamat Email" value="<?= $profilSekolah['email'] ?>" autocomplete="off" data-msg="Masukan Alamat Email" />
                      </div>
                    </div>
                  </div>
                  <!-- Telepon input -->
                  <div class="col-12 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="account-tel">Telepon</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text">
                          <i data-feather="phone" class="font-medium-2"></i>
                        </span>
                        <input type="text" id="account-tel" name="tel" class="form-control" placeholder="Nomor Telepon" value="<?= $profilSekolah['telepon'] ?>" autocomplete="off" data-msg="Masukan Nomor Telepon" />
                      </div>
                    </div>
                  </div>
                  <!-- Fax input -->
                  <div class="col-12 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="account-fax">Fax</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text">
                          <i data-feather="printer" class="font-medium-2"></i>
                        </span>
                        <input type="text" id="account-fax" name="fax" class="form-control" placeholder="Nomor Fax" value="<?= $profilSekolah['fax'] ?>" autocomplete="off" data-msg="Masukan Nomor Fax" />
                      </div>
                    </div>
                  </div><!-- facebook link input -->
                  <div class="col-12 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="account-facebook">Facebook</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text">
                          <i data-feather="facebook" class="font-medium-2"></i>
                        </span>
                        <input type="text" id="account-facebook" name="facebook" class="form-control" placeholder="Link Facebook" value="<?= $profilSekolah['facebook'] ?>" autocomplete="off" data-msg="Masukan Link Facebook" />
                      </div>
                    </div>
                  </div>
                  <!-- instagram link input -->
                  <div class="col-12 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="account-instagram">Instagram</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text">
                          <i data-feather="instagram" class="font-medium-2"></i>
                        </span>
                        <input type="text" id="account-instagram" name="instagram" class="form-control" placeholder="Link Instagram" value="<?= $profilSekolah['instagram'] ?>" autocomplete="off" data-msg="Masukan Link Instagram" />
                      </div>
                    </div>
                  </div>
                  <!-- instagram link input -->
                  <div class="col-12 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="account-youtube">YouTube</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text">
                          <i data-feather="youtube" class="font-medium-2"></i>
                        </span>
                        <input type="text" id="account-youtube" name="youtube" class="form-control" placeholder="Link YouTube" value="<?= $profilSekolah['youtube'] ?>" autocomplete="off" data-msg="Masukan Link YouTube" />
                      </div>
                    </div>
                  </div>
                  <!-- instagram link input -->
                  <div class="col-12 col-sm-3">
                    <div class="form-group">
                      <label class="form-label" for="account-whatsapp">WhatsApp</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text">
                          <i data-feather="message-circle" class="font-medium-2"></i>
                        </span>
                        <input type="text" id="account-whatsapp" name="whatsapp" class="form-control" placeholder="Link WhatsApp" value="<?= $profilSekolah['whatsapp'] ?>" autocomplete="off" data-msg="Masukan Link WhatsApp" />
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
<script src="<?= base_url('assets/'); ?>assets/js/scripts.js"></script>
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

  var select2 = $('.select2');
  if (select2.length) {
    select2.each(function() {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        dropdownParent: $this.parent()
      });
    });
  }

  var hideSearch = $('.hide-search');
  hideSearch.select2({
    placeholder: 'Select an option',
    minimumResultsForSearch: Infinity
  });
</script>