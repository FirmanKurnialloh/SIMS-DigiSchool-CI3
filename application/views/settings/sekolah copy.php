<!-- BEGIN: Content-->
<div class="app-content content">
  <!-- <div class="content-overlay"></div> -->
  <!-- <div class="header-navbar-shadow"></div> -->
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
      <div class="content-header-left col-md-9 col-8 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-start mb-0"><?= $page ?></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="<?= base_url('gtk/dashboard'); ?>">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="<?= base_url('settings'); ?>">Pengaturan Aplikasi</a>
                </li>
                <li class="breadcrumb-item active"><?= $page ?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-header-right text-md-end col-md-3 col-4">
        <div class="mb-1 breadcrumb-right">
          <a href="<?= base_url('settings'); ?>" type="button" class="btn btn-sm btn-primary">
            <i data-feather='chevrons-left'></i>
            <span>Kembali</span>
          </a>
        </div>
      </div>
    </div>

    <div class="content-body">

      <div class="row" hidden>
        <div class=" col-12">
          <div class="alert alert-primary" role="alert">
            <div class="alert-body"><strong>Info:</strong></div>
          </div>
        </div>
      </div>

      <!-- Identitas Sekolah Starts -->
      <section id="Identitas Sekolah">
        <div class="row">
          <!-- left menu section -->
          <div class="col-md-3 mb-2 mb-md-0">
            <ul class="nav nav-pills flex-column nav-left">
              <!-- tab identitas sekolah -->
              <li class="nav-item">
                <a class="nav-link active" id="pill-identitas-sekolah" data-toggle="pill" href="#identitas-sekolah" aria-expanded="true">
                  <i data-feather="circle" class="font-medium-3 mr-1"></i>
                  <span class="font-weight-bold">Identitas Sekolah</span>
                </a>
              </li>
              <!-- tab lokasi sekolah -->
              <li class="nav-item">
                <a class="nav-link" id="pill-lokasi-sekolah" data-toggle="pill" href="#lokasi-sekolah" aria-expanded="false">
                  <i data-feather="circle" class="font-medium-3 mr-1"></i>
                  <span class="font-weight-bold">Lokasi Sekolah</span>
                </a>
              </li>
              <!-- information -->
              <li class="nav-item">
                <a class="nav-link" id="pill-kontak-sekolah" data-toggle="pill" href="#kontak-sekolah" aria-expanded="false">
                  <i data-feather="circle" class="font-medium-3 mr-1"></i>
                  <span class="font-weight-bold">Kontak Sekolah</span>
                </a>
              </li>
            </ul>
          </div>
          <!--/ left menu section -->

          <!-- right content section -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="tab-content">

                  <!-- tab identitas sekolah -->
                  <div role="tabpanel" class="tab-pane active" id="identitas-sekolah" aria-labelledby="pill-identitas-sekolah" aria-expanded="true">
                    <form class="validate-form1TEST" action="pengaturan_aplikasi" method="POST" enctype="multipart/form-data">
                      <!-- header -->
                      <div class="row">
                        <div class="col-12">
                          <div class="d-flex align-items-center">
                            <i data-feather="home" class="font-medium-5"></i>
                            <span class="font-weight-bold">&nbsp;Identitas Sekolah</span>
                          </div>
                        </div>

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
                              <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                              <input type="file" name="fotoGTK" id="account-upload" hidden accept="image/jpeg, image/jpg, image/png" />
                              <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                              <p class="mb-0">JPEG, JPG, PNG. Max Filesize 1 MB</p>
                            </div>
                          </div>
                          <!--/ upload and reset button -->
                        </div>
                        <!--/ header section -->

                        <!-- form -->
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
                              <input type="text" class="form-control" id="npsn" name="npsn" placeholder="NPSN" value="<?= $profilSekolah['namaSekolah'] ?>" />
                            </div>
                          </div>
                          <!-- NSS input -->
                          <div class="col-12 col-sm-2">
                            <div class="form-group">
                              <label for="nss">NSS</label>
                              <input type="text" class="form-control" id="nss" name="nss" placeholder="NSS" value="<?= $profilSekolah['namaSekolah'] ?>" />
                            </div>
                          </div>
                          <!-- Bentuk Pendidikan input -->
                          <div class="col-12 col-sm-2">
                            <div class="form-group">
                              <label for="bentukPendidikan">Bentuk Pendidikan</label>
                              <select class="select2 form-control" id="bentukPendidikan" name="bentukPendidikan">
                                <option value="<?= $profilSekolah['namaSekolah'] ?>" selected><?= $profilSekolah['namaSekolah'] ?></option>
                                <option value="PAUD">PAUD</option>
                                <option value="TK">TK</option>
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
                                <option value="<?= $profilSekolah['namaSekolah'] ?>" selected><?= $profilSekolah['namaSekolah'] ?></option>
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
                    <!--/ form -->
                  </div>
                  <!--/ tab identitas sekolah -->

                  <!-- tab lokasi sekolah -->
                  <div class="tab-pane fade" id="lokasi-sekolah" role="tabpanel" aria-labelledby="pill-lokasi-sekolah" aria-expanded="false">
                    <!-- form -->
                    <form class="validate-form2TEST" action="pengaturan_aplikasi" method="POST" enctype="multipart/form-data">
                      <!-- header media -->
                      <div class="row">
                        <div class="col-12">
                          <div class="d-flex align-items-center mb-0">
                            <i data-feather="map-pin" class="font-medium-3"></i>
                            <h4 class="mb-0 ml-75">Lokasi Sekolah</h4>
                          </div>
                        </div>
                        <div class="col-12">
                          <hr class="my-2" />
                        </div>
                        <div class="media pl-75">
                          <a href="#" class="mr-25">
                            <?php if ($logo_kab != null && file_exists("../../../files/images/logo/$logo_kab")) { ?>
                              <img src="./files/images/logo/<?= $logo_kab ?>" id="upload-logo-kab-img" class="rounded mr-50" alt="logo kab/kota" height="80" width="80" />
                            <?php } else { ?>
                              <img src="desktop/app-assets/images/illustration/wuri.png" id="upload-logo-kab-img" class="rounded mr-50" alt="logo kab/kota" height="80" width="80" />
                            <?php }  ?>
                          </a>
                          <div class="media-body mt-75 ml-1">
                            <label for="upload-logo-kab" class="btn btn-sm btn-primary mb-75 mr-75">Upload Logo Kab/Kota</label>
                            <input type="file" id="upload-logo-kab" name="logoKab" hidden accept="image/jpeg, image/jpg, image/png" />
                            <p>JPEG, JPG, PNG. Max size of 2MB</p>
                          </div>
                        </div>
                      </div>
                      <!-- header media -->

                      <div class="row mt-2">
                        <!-- Telepon input -->
                        <div class="col-12 col-sm-3">
                          <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $alamat_sekolah ?>" />
                          </div>
                        </div>
                        <!-- Kampung input -->
                        <div class="col-12 col-sm-3">
                          <div class="form-group">
                            <label for="kampung">Kampung/Dusun</label>
                            <input type="text" class="form-control" id="kampung" name="kampung" placeholder="Kampung/Dusun" value="<?= $kampung_sekolah ?>" />
                          </div>
                        </div>
                        <!-- RT input -->
                        <div class="col-12 col-sm-3">
                          <div class="form-group">
                            <label for="rt">RT</label>
                            <input type="number" class="form-control" id="rt" name="rt" placeholder="RT" value="<?= $rt_sekolah ?>" />
                          </div>
                        </div>
                        <!-- RW input -->
                        <div class="col-12 col-sm-3">
                          <div class="form-group">
                            <label for="rw">RW</label>
                            <input type="number" class="form-control" id="rw" name="rw" placeholder="RW" value="<?= $rw_sekolah ?>" />
                          </div>
                        </div>
                        <!-- Desa input -->
                        <div class="col-12 col-sm-3">
                          <div class="form-group">
                            <label for="desa">Desa/Kelurahan</label>
                            <input type="text" class="form-control" id="desa" name="desa" placeholder="Desa/Kelurahan" value="<?= $desa_sekolah ?>" />
                          </div>
                        </div>
                        <!-- Kecamatan input -->
                        <div class="col-12 col-sm-3">
                          <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan" value="<?= $kecamatan_sekolah ?>" />
                          </div>
                        </div>
                        <!-- Kabupaten input -->
                        <div class="col-12 col-sm-3">
                          <div class="form-group">
                            <label for="kabupaten">Kabupaten/Kota</label>
                            <input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="Kabupaten/Kota" value="<?= $kabupaten_sekolah ?>" />
                          </div>
                        </div>
                        <!-- Provinsi input -->
                        <div class="col-12 col-sm-3">
                          <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="provinsi" value="<?= $provinsi_sekolah ?>" />
                          </div>
                        </div>
                        <!-- Kode input -->
                        <div class="col-12 col-sm-4">
                          <div class="form-group">
                            <label for="pos">Kode Pos</label>
                            <input type="number" class="form-control" id="pos" name="pos" placeholder="Kode Pos" value="<?= $pos_sekolah ?>" />
                          </div>
                        </div>
                        <!-- Latitude input -->
                        <div class="col-12 col-sm-4">
                          <div class="form-group">
                            <label for="lat">Latitude</label>
                            <input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude" value="<?= $lat_sekolah ?>" />
                          </div>
                        </div>
                        <!-- Longitude input -->
                        <div class="col-12 col-sm-4">
                          <div class="form-group">
                            <label for="long">Longitude</label>
                            <input type="text" class="form-control" id="long" name="long" placeholder="Longitude" value="<?= $long_sekolah ?>" />
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
                    <!--/ form -->
                  </div>
                  <!--/ tab lokasi sekolah -->

                  <!-- social -->
                  <div class="tab-pane fade" id="kontak-sekolah" role="tabpanel" aria-labelledby="pill-kontak-sekolah" aria-expanded="false">
                    <!-- form -->
                    <form class="validate-form3TEST" action="pengaturan_aplikasi" method="POST" enctype="multipart/form-data">
                      <div class="row">

                        <!-- Media Sosial header -->
                        <div class="col-12 mt-0">
                          <div class="d-flex align-items-center mb-0">
                            <i data-feather="user" class="font-medium-3"></i>
                            <h4 class="mb-0 ml-75">Narahubung</h4>
                          </div>
                        </div>
                        <!--divider -->
                        <div class="col-12">
                          <hr class="my-2" />
                        </div>

                        <div class="col-12">
                          <div class="row">
                            <!-- Website input -->
                            <div class="col-12 col-sm-3">
                              <div class="form-group">
                                <label for="account-web">Website</label>
                                <div class="input-group input-group-merge">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i data-feather="globe" class="font-medium-2"></i>
                                    </span>
                                  </div>
                                  <input type="text" id="account-web" name="web" class="form-control" placeholder="Alamat Website" value="<?= $website_sekolah ?>" />
                                </div>
                              </div>
                            </div>
                            <!-- Email input -->
                            <div class="col-12 col-sm-3">
                              <div class="form-group">
                                <label for="account-email">Email</label>
                                <div class="input-group input-group-merge">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i data-feather="mail" class="font-medium-2"></i>
                                    </span>
                                  </div>
                                  <input type="text" id="account-email" name="email" class="form-control" placeholder="Alamat Email" value="<?= $email_sekolah ?>" />
                                </div>
                              </div>
                            </div>
                            <!-- Telepon input -->
                            <div class="col-12 col-sm-3">
                              <div class="form-group">
                                <label for="account-tel">Telepon</label>
                                <div class="input-group input-group-merge">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i data-feather="phone" class="font-medium-2"></i>
                                    </span>
                                  </div>
                                  <input type="text" id="account-tel" name="tel" class="form-control" placeholder="Nomor Telepon" value="<?= $telepon_sekolah ?>" />
                                </div>
                              </div>
                            </div>
                            <!-- Fax input -->
                            <div class="col-12 col-sm-3">
                              <div class="form-group">
                                <label for="account-fax">Fax</label>
                                <div class="input-group input-group-merge">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i data-feather="printer" class="font-medium-2"></i>
                                    </span>
                                  </div>
                                  <input type="text" id="account-fax" name="fax" class="form-control" placeholder="Nomor Fax" value="<?= $fax_sekolah ?>" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Media Sosial header -->
                        <div class="col-12 mt-1">
                          <div class="d-flex align-items-center mb-0">
                            <i data-feather="link" class="font-medium-3"></i>
                            <h4 class="mb-0 ml-75">Media Sosial</h4>
                          </div>
                        </div>
                        <!--divider -->
                        <div class="col-12">
                          <hr class="my-2" />
                        </div>

                        <!-- facebook link input -->
                        <div class="col-12 col-sm-3">
                          <div class="form-group">
                            <label for="account-facebook">Facebook</label>
                            <div class="input-group input-group-merge">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i data-feather="facebook" class="font-medium-2"></i>
                                </span>
                              </div>
                              <input type="text" id="account-facebook" name="facebook" class="form-control" placeholder="Link Facebook" value="<?= $facebook ?>" />
                            </div>
                          </div>
                        </div>
                        <!-- instagram link input -->
                        <div class="col-12 col-sm-3">
                          <div class="form-group">
                            <label for="account-instagram">Instagram</label>
                            <div class="input-group input-group-merge">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i data-feather="instagram" class="font-medium-2"></i>
                                </span>
                              </div>
                              <input type="text" id="account-instagram" name="instagram" class="form-control" placeholder="Link Instagram" value="<?= $instagram ?>" />
                            </div>
                          </div>
                        </div>
                        <!-- instagram link input -->
                        <div class="col-12 col-sm-3">
                          <div class="form-group">
                            <label for="account-youtube">YouTube</label>
                            <div class="input-group input-group-merge">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i data-feather="youtube" class="font-medium-2"></i>
                                </span>
                              </div>
                              <input type="text" id="account-youtube" name="youtube" class="form-control" placeholder="Link YouTube" value="<?= $youtube ?>" />
                            </div>
                          </div>
                        </div>
                        <!-- instagram link input -->
                        <div class="col-12 col-sm-3">
                          <div class="form-group">
                            <label for="account-whatsapp">WhatsApp</label>
                            <div class="input-group input-group-merge">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i data-feather="message-circle" class="font-medium-2"></i>
                                </span>
                              </div>
                              <input type="text" id="account-whatsapp" name="whatsapp" class="form-control" placeholder="Link WhatsApp" value="<?= $whatsapp ?>" />
                            </div>
                          </div>
                        </div>

                        <div class="col-12">
                          <!-- submit and Batal button -->
                          <button type="submit" name="btnKontakSekolah" class="btn btn-primary mr-1 mt-1">Simpan Perubahan</button>
                          <button type="reset" class="btn btn-outline-secondary mt-1">Batal</button>
                        </div>
                      </div>
                    </form>
                    <!--/ form -->
                  </div>
                  <!--/ social -->

                </div>
              </div>
            </div>
          </div>
          <!--/ right content section -->
        </div>

      </section>
      <!--  Identitas Sekolah Ends -->

    </div>

  </div>
</div>
<!-- END: Content-->