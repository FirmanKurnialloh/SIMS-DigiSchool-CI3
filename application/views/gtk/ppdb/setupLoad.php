<!-- vertical tab pill -->
<div class="row">
  <div class="col-lg-2 col-md-2 col-sm-12">
    <div class="faq-navigation d-flex justify-content-between flex-column mb-2 mb-md-0">
      <!-- pill tabs navigation -->
      <ul class="nav nav-pills nav-left flex-column" role="tablist">
        <!-- Persuratan -->
        <li class="nav-item">
          <a class="nav-link active" id="pill-1" data-bs-toggle="pill" href="#tab-1" aria-expanded="true" role="tab">
            <i data-feather="mail" class="font-medium-3 me-1"></i>
            <span class="fw-bold">Persuratan</span>
          </a>
        </li>
        <!-- Persuratan -->

        <!-- Panitia -->
        <li class="nav-item">
          <a class="nav-link" id="pill-2" data-bs-toggle="pill" href="#tab-2" aria-expanded="true" role="tab">
            <i data-feather="users" class="font-medium-3 me-1"></i>
            <span class="fw-bold">Panitia</span>
          </a>
        </li>
        <!-- Panitia -->

        <!-- Lokasi Sekolah -->
        <li class="nav-item">
          <a class="nav-link" id="pill-3" data-bs-toggle="pill" href="#tab-3" aria-expanded="true" role="tab">
            <i data-feather="link" class="font-medium-3 me-1"></i>
            <span class="fw-bold">Kontak Sekolah</span>
          </a>
        </li>
        <!-- Lokasi Sekolah -->

      </ul>

      <!-- FAQ image -->
      <img src="<?= base_url('assets/'); ?>app-assets/images/illustration/faq-illustrations.svg" class="img-fluid d-none d-md-block hidden" alt="demand img" />
    </div>
  </div>

  <div class="col-lg-10 col-md-10 col-sm-12">
    <!-- pill tabs tab content -->
    <div class="card">
      <div class="card-body">
        <div class="tab-content">

          <!-- Panel 1 -->
          <div role="tabpanel" class="tab-pane active" id="tab-1" aria-labelledby="pill-1" aria-expanded="true">
            <form class="validate-form" action="<?= base_url("LayananPPDB/editPersuratan") ?>" method="POST" enctype="multipart/form-data">
              <!-- icon and header -->
              <div class="d-flex align-items-center">
                <div class="avatar avatar-tag bg-light-primary me-1">
                  <i data-feather="mail" class="font-medium-4"></i>
                </div>
                <div>
                  <h4 class="mb-0">Persuratan PPDB</h4>
                  <span>Informasi Persuratan Dalam Kegiatan PPDB</span>
                </div>
              </div>

              <!-- divider -->
              <div class="col-12">
                <hr class="my-2" />
              </div>

              <div class="row mt-2">
                <!-- Kepala Sekolah input -->
                <div class="mb-1 col-lg-6 col-12">
                  <div class="form-group">
                    <label class="form-label" for="kepalaSekolah">Kepala Sekolah</label>
                    <select class="select2 form-control" id="kepalaSekolah" name="kepalaSekolah" required data-placeholder="Pilih Kepala Sekolah" data-msg="Pilih Kepala Sekolah" autocomplete="off">
                      <?php
                      $query = getWhere('user_gtk', 'username, namaLengkap', ['username' => $persuratan['kepalaSekolah']]);
                      if ($query->num_rows() >= 1) :
                        $userKS = $query->row('username');
                        $namaKS = $query->row('namaLengkap');
                      ?>
                        <optgroup label="Terpilih">
                          <option value="<?= $userKS ?>" selected><?= $namaKS ?></option>
                        </optgroup>
                        <option></option>
                        <optgroup label="Pilih Kepala Sekolah">
                          <?php
                          $query = getWhereOrder('user_gtk', '*', ['role_id_1' <= '10' || 'role_id_2' <= '10'], 'id', 'asc');
                          if ($query->num_rows() >= 1) :
                            $data = $query->result_array();
                            foreach ($data as $data) :
                              $id           = $data['id'];
                              $username     = $data['username'];
                              $namaLengkap  = $data['namaLengkap'];
                          ?>
                              <option value=<?= $username ?>><?= $namaLengkap ?></option>
                          <?php
                            endforeach;
                          endif; ?>
                        <?php else : ?>
                          <option></option>
                        <optgroup label="Pilih Kepala Sekolah">
                          <?php
                          $query = getWhereOrder('user_gtk', '*', ['role_id_1' <= '10' || 'role_id_2' <= '10'], 'id', 'asc');
                          if ($query->num_rows() >= 1) :
                            $data = $query->result_array();
                            foreach ($data as $data) :
                              $id           = $data['id'];
                              $username     = $data['username'];
                              $namaLengkap  = $data['namaLengkap'];
                          ?>
                              <option value=<?= $username ?>><?= $namaLengkap ?></option>
                          <?php
                            endforeach;
                          endif;
                          ?>
                        </optgroup>
                      <?php endif ?>
                    </select>
                  </div>
                </div>
                <!-- NIP input -->
                <div class="mb-1 col-lg-6 col-12">
                  <div class="form-group">
                    <label class="form-label" for="nip">NIP Kepala Sekolah</label>
                    <input type="number" class="form-control" id="nip" name="nip" placeholder="NIP Kepala Sekolah" value="<?= $kepalaSekolah['nip']; ?>" required data-msg="Masukan NIP" autocomplete="off" maxlength="18" oninput="javascript:if(this.value.length>this.maxLength)this.value=this.value.slice(0, this.maxLength);" />
                  </div>
                </div>

                <!-- SK Panitia input -->
                <div class="mb-1 col-lg-3 col-12">
                  <div class="form-group">
                    <label class="form-label" for="SKPanitia">Nomor SK Panitia PPDB</label>
                    <input type="text" class="form-control" id="SKPanitia" name="SKPanitia" placeholder="SK Panitia" value="<?= $persuratan['SKPanitia'] ?>" required data-msg="Masukan Nomor SK Panitia PPDB" autocomplete="off" />
                  </div>
                </div>

                <!-- Tanggal SK Panitia input -->
                <div class="mb-1 col-lg-3 col-12">
                  <div class="form-group">
                    <label class="form-label" for="tanggalSKPanitia">Tanggal Penetapan SK Panitia</label>
                    <input type="text" class="form-control" id="tanggalSKPanitia" name="tanggalSKPanitia" placeholder="tanggal SK Panitia" value="<?= $persuratan['tanggalSKPanitia'] ?>" required data-msg="Masukan Tanggal Penetapan SK Panitia" autocomplete="off" />
                  </div>
                </div>

                <!-- SK Penerimaan input -->
                <div class="mb-1 col-lg-3 col-12">
                  <div class="form-group">
                    <label class="form-label" for="SKPenerimaan">Nomor SK Penerimaan</label>
                    <input type="text" class="form-control" id="SKPenerimaan" name="SKPenerimaan" placeholder="SKPenerimaan" value="<?= $persuratan['SKPenerimaan'] ?>" required data-msg="Masukan Nomor SK Penerimaan" autocomplete="off" />
                  </div>
                </div>

                <!-- Tanggal SK Penerimaan input -->
                <div class="mb-1 col-lg-3 col-12">
                  <div class="form-group">
                    <label class="form-label" for="tanggalSKPenerimaan">Tanggal Penetapan SK Penerimaan</label>
                    <input type="text" class="form-control" id="tanggalSKPenerimaan" name="tanggalSKPenerimaan" placeholder="Tanggal SK Penerimaan" value="<?= $persuratan['tanggalSKPenerimaan'] ?>" required data-msg="Masukan Tanggal Penetapan SK Penerimaan" autocomplete="off" />
                  </div>
                </div>

                <!-- Tanggal SK Penerimaan input -->
                <div class="mb-1 col-lg-4 col-12">
                  <div class="form-group">
                    <label class="form-label" for="tanggalMasuk">Tanggal Masuk Tahun Pelajaran <?= $persuratan['tapel'] ?></label>
                    <input type="text" class="form-control" id="tanggalMasuk" name="tanggalMasuk" placeholder="Tanggal Masuk Tahun Pelajaran <?= $persuratan['tapel'] ?>" value="<?= $persuratan['tanggalMasuk'] ?>" required data-msg="Masukan Tanggal Masuk Tahun Pelajaran <?= $persuratan['tapel'] ?>" autocomplete="off" />
                  </div>
                </div>

                <!-- Status Sekolah input -->
                <div class="mb-1 col-lg-3 col-12">
                  <div class="form-group">
                    <label class="form-label" for="ttd">Tanda Tangan Kepala Sekolah</label>
                    <select class="select2 hide-search form-control" id="ttd" name="ttd" required data-msg="Pilih Tampilan Tanda Tangan">
                      <optgroup label="Terpilih">
                        <option value="<?= $persuratan['ttd'] ?>" selected><?= $persuratan['ttd'] ?></option>
                      </optgroup>
                      <optgroup label="Pilih Tampilan Tanda Tangan">
                        <option value="Kosong">Kosong</option>
                        <option value="QR Code">QR Code</option>
                        <option value="Scan PNG">Scan PNG</option>
                      </optgroup>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row mt-0">
                <div class="col-12">
                  <input type="text" name="id" value="<?= $persuratan['id'] ?>" required hidden readonly />
                  <input type="text" name="tapel" value="<?= $persuratan['tapel'] ?>" required hidden readonly />
                  <button type="submit" class="btn btn-primary mt-2 mr-1">Simpan Perubahan</button>
                  <button type="reset" class="btn btn-outline-secondary mt-2">Batal</button>
                </div>
              </div>
            </form>
          </div>
          <!-- Panel 1 -->

          <!-- Panel 2 -->
          <div class="tab-pane fade" id="tab-2" aria-labelledby="pill-2" aria-expanded="true">
            <!-- icon and header -->
            <div class="d-flex align-items-center">
              <div class="avatar avatar-tag bg-light-primary me-1">
                <i data-feather="users" class="font-medium-4"></i>
              </div>
              <div>
                <h4 class="mb-0">Panitia PPDB</h4>
                <span>Informasi Panitia PPDB</span>
              </div>
            </div>

            <!-- divider -->
            <div class="col-12">
              <hr class="my-2" />
            </div>

          </div>
          <!-- Panel 2 -->

          <!-- Panel 3 -->
          <div class="tab-pane fade" id="tab-3" aria-labelledby="pill-3" aria-expanded="true">
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
          <!-- Panel 3 -->

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