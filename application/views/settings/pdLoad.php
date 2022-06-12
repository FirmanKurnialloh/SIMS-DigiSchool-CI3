<div class="row">
  <!-- Data Akun PD Card -->
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Data Akun PD</h4>
        <span class="d-flex justify-content-between">
          <a href=" javascript:void(0)" type="button" class="btn btn-sm btn-primary ms-1" data-bs-id="tambahData" id="tambahDataButton" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
            Tambah Data Akun PD
          </a>
          <a href="javascript:void(0)" type="button" class="btn btn-sm btn-success ms-1" data-bs-id="importData" id="importDataButton" data-bs-toggle="modal" data-bs-target="#ImportDataModal">
            Import Data Akun PD
          </a>
          <a href="javascript:void(0)" type="button" class="btn btn-sm btn-danger ms-1" id="resetDataPD">
            Reset Data Akun PD
          </a>
        </span>
      </div>
      <div class="card-body">
        <?php
        if (getUserPD()->num_rows() <= 0) { ?>
          <div class="text-center">
            <h3 class="text-danger">Tidak Ada Data <br> </h3>
            <h3 class="text-danger myicon"><i data-feather='x-circle' style="width: 100;"></i></h3>
            <h4 class="mb-3 mt-2">Silahkan Tambah Data Akun Peserta Didik</h4>
          </div>
        <?php } else { ?>
          <div class="alert alert-primary col-12" role="alert">
            <div class="alert-body">
              <strong>Note : Data yang tampil berdasarkan tahun pelajaran yang sedang aktif</strong>
            </div>
          </div>
          <table class="dataTabel table table-hover table-responsive compact" style="height: 450px;">
            <thead class="text-center">
              <tr>
                <th style="width: 0%;">NO</th>
                <th style="width: 10%;">PD</th>
                <th style="width: 1%;">Status</th>
                <th style="width: 1%;">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-left">
              <?php
              $no = 1;
              foreach (getUserPD()->result_array() as $i) :
                $id_user       = $i['id'];
                $nisn          = $i['nisn'];
                $tanggalLahir  = $i['tanggalLahir'];
                $namaLengkap   = $i['namaLengkap'];
                $is_active     = $i['is_active'];
                $role_id       = $i['role_id'];
                $role          = getPeran($role_id);
                $profilPD      = getProfilPdFromTapel($nisn, $tapelAktif['id']);
                if ($profilPD) {
                  $id_profil   = $profilPD['id'];
                  $id_kelas    = $profilPD['id_kelas'];
                  $namaPD      = $profilPD['namaLengkap'];
                  $namaPanggil = $profilPD['namaPanggil'];
                  if ($profilPD['nis']) {
                    $nis       = ' / ' . $profilPD['nis'];
                  } else {
                    $nis       = "";
                  }
                  $jk          = $profilPD['jk'];
                  $foto        = $profilPD['foto'];
                } else {
                  $namaPD      = $i['namaLengkap'];
                  $namaPanggil = "";
                  $nis         = "";
                  $jk          = "";
                  $foto        = "";
                }

                $dataKelas     = getWhere('setting_kelas', 'kelas', ['id' => $id_kelas])->row('kelas');
                if ($profilPD) {
                  $kelas = $dataKelas;
                } else {
                  $kelas = "";
                }
              ?>
                <tr>
                  <td class="align-items-center">
                    <?= $no++ ?>
                  </td>
                  <td>
                    <div class="d-flex justify-content-left align-items-center">
                      <div class="avatar-wrapper me-1">
                        <?php if ($foto && file_exists(FCPATH . "assets/files/images/fotoSiswa/" . $foto)) { ?>
                          <img src="<?= base_url('assets/'); ?>files/images/fotoSiswa/<?= $foto; ?>" alt="Avatar" height="32" width="32">
                        <?php  } else { ?>
                          <div class="avatar bg-light-<?= warnaPeran($role); ?>">
                            <div class="avatar-content"><?= namaInisial($namaLengkap); ?></div>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="d-flex flex-column">
                        <?php
                        $base_64      = base64_encode($nisn);
                        $url_param    = rtrim($base_64, '=');
                        $data         = array("nisn" => "$nisn");
                        $url_details  = base64_encode(serialize($data)); ?>
                        <a href="<?= base_url('settings/pd/') . $url_param; ?>" class="user_name text-body text-truncate">
                          <?php if ($profilPD) { ?>
                            <span class="fw-bolder"><?= $namaLengkap ?></span>
                          <?php } else { ?>
                            <span class="fw-bolder"><?= $namaPD ?></span>
                          <?php } ?>
                        </a><small class="emp_post text-muted"><?= $nisn . $nis ?></small>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex justify-content-left align-items-center">
                      <?php if (!$profilPD) { ?>
                        <span class="badge bg-secondary me-1">
                          <i data-feather="alert-triangle" class="me-25"></i>
                          <span>Profil Tidak Tersedia</span>
                        </span>
                      <?php }; ?>
                      <div class="d-flex justify-content-left align-items-center">
                        <span class="badge bg-<?= warnaPeran($role); ?> me-1">
                          <i data-feather="<?= iconPeran($role); ?>" class="me-25"></i>
                          <span><?= $role . ' Kelas ' . $dataKelas ?></span>
                        </span>
                      </div>
                  </td>
                  <td>
                    <div class="d-flex justify-content-left align-items-center">
                      <button type="button" class="btn btn-sm btn-icon rounded-circle btn-info me-1" aria-expanded="false" data-bs-id="updateDataButton<?= $id_user; ?>" id="updateDataButton<?= $id_user; ?>" data-bs-toggle="modal" data-bs-target="#updateDataModal<?= $id_user; ?>">
                        <i data-feather='edit'></i>
                      </button>
                      <button type="button" class="btn btn-sm btn-icon rounded-circle btn-danger me-1" aria-expanded="false" data-nisn="<?= $nisn; ?>" id="hapusAkunPD">
                        <i data-feather="trash"></i>
                      </button>
                      <?php if ($is_active == "0") { ?>
                        <form id="switchActivatePDForm<?= $id_user ?>" action="<?= base_url('settings/switchActivatePD') ?>" method="POST">
                          <div class="form-switch">
                            <input type="checkbox" class="form-check-input" id="switchActivatePD" onclick="document.getElementById('switchActivatePDForm<?= $id_user; ?>').submit();" />
                            <input type="text" name="nisn" value="<?= $nisn ?>" hidden />
                            <input type="text" name="is_aktif" id="statusActivatePD" value="0" hidden />
                            <sub id="LabelswitchActivatePD">Tidak Aktif</sub>
                          </div>
                        </form>
                      <?php } elseif ($is_active == "1") { ?>
                        <form id="switchActivatePDForm<?= $id_user ?>" action="<?= base_url('settings/switchActivatePD') ?>" method="POST">
                          <div class="form-switch">
                            <input type="checkbox" class="form-check-input" id="switchActivatePD" checked onclick="document.getElementById('switchActivatePDForm<?= $id_user; ?>').submit();" />
                            <input type="text" name="nisn" value="<?= $nisn ?>" hidden />
                            <input type="text" name="is_aktif" id="statusActivatePD" value="1" hidden />
                            <sub id="LabelswitchActivatePD">Aktif</sub>
                          </div>
                        </form>
                      <?php } ?>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="updateDataModal<?= $id_user; ?>" tabindex="-1" aria-labelledby="updateDataModal" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="updateDataModal">Edit Akun <?= $nisn ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form class="validate-form" action="<?= base_url('settings/editAkunPD'); ?>" method="POST">
                            <div class="modal-body">
                              <div class="alert alert-primary" role="alert">
                                <div class="alert-body">
                                  <strong>Tips:
                                    <li>
                                      Username Akun Peserta Didik hanya NISN
                                    </li>
                                    <li>
                                      Password menggunakan Tanggal Lahir
                                    </li>
                                  </strong>
                                </div>
                              </div>
                              <div class="row">
                                <!-- Nama Lengkap input -->
                                <div class="mb-1 col-lg-6 col-12">
                                  <label class="form-label" for="namaLengkap">Nama Lengkap</label>
                                  <input type="text" class="form-control" id="namaLengkap" placeholder="Nama Lengkap" name="namaLengkap" value="<?= $namaPD ?>" required data-msg="Masukan Nama Lengkap" autocomplete="off" />
                                </div>
                                <!-- Nama Panggil input -->
                                <div class="mb-1 col-lg-6 col-12">
                                  <label class="form-label" for="namaPanggil">Nama Panggil</label>
                                  <input type="text" class="form-control" id="namaPanggil" placeholder="Nama Panggil" name="namaPanggil" value="<?= $namaPanggil ?>" required data-msg="Masukan Nama Panggil" autocomplete="off" />
                                </div>
                                <!-- Tanggal Lahir input -->
                                <div class="mb-1 col-lg-6 col-12">
                                  <label class="form-label" for="tanggalLahirEdit">Tanggal Lahir</label>
                                  <input type="text" class="form-control flatpickr-basic" id="tanggalLahirEdit" placeholder="Tanggal Lahir" name="tanggalLahir" value="<?= $tanggalLahir ?>" required data-msg="Pilih Tanggal Lahir" autocomplete="off" />
                                </div>
                                <!-- Jenis Kelamin input -->
                                <div class="mb-1 col-lg-3 col-12">
                                  <label for="jenisKelaminPDEdit<?= $id_user ?>">Jenis Kelamin</label>
                                  <select class="select2 hide-search form-control" id="jenisKelaminPDEdit<?= $id_user ?>" name="jenisKelamin" required data-placeholder="Pilih Jenis Kelamin" data-msg="Pilih Jenis Kelamin">
                                    <option value="<?= $jk ?>"><?= jenisKelamin($jk) ?></option>
                                    <optgroup label="Pilih Jenis Kelamin">
                                      <option value="L">Laki-Laki</option>
                                      <option value="P">Perempuan</option>
                                    </optgroup>
                                  </select>
                                </div>
                                <!-- NISN input -->
                                <div class="mb-1 col-lg-3 col-12">
                                  <label class="form-label" for="nisn">NISN</label>
                                  <input type="number" class="form-control" id="nisn" placeholder="NISN" name="nisn" value="<?= $nisn ?>" required data-msg="Masukan NISN" autocomplete="off" maxlength="10" oninput="javascript:if(this.value.length>this.maxLength)this.value=this.value.slice(0, this.maxLength);">
                                </div>
                                <!-- Tahun Pelajaran & Semester input -->
                                <div class="mb-1 col-lg-6 col-12">
                                  <label class="form-label" for="tapel">Tahun Pelajaran & Semester</label>
                                  <input type="text" class="form-control" id="tapel" placeholder="<?= 'Tahun Pelajaran ' . $tapelAktif['tapel'] . ' Semester ' . $tapelAktif['semester'] ?>" value="<?= 'Tahun Pelajaran ' . $tapelAktif['tapel'] . ' Semester ' .  $tapelAktif['semester'] ?>" name="tapel" required readonly disabled data-msg="Masukan Tahun Pelajaran & Semester" autocomplete="off" />
                                </div>
                                <!-- Kelas input -->
                                <div class="mb-1 col-lg-6 col-12">
                                  <label for="selectKelasPDEdit<?= $id_user ?>">Pilih Kelas</label>
                                  <select class="select2 form-control" id="selectKelasPDEdit<?= $id_user ?>" name="kelas" data-placeholder="Pilih Kelas" required data-msg="Pilih Kelas">
                                    <option value="<?= $id_kelas ?>"><?= $kelas ?></option>
                                    <optgroup label="Pilih Kelas">
                                      <?php
                                      $query = getSelect('setting_kelas', '*', 'LENGTH(level), level, LENGTH(kelas), kelas', 'asc');
                                      if ($query->num_rows() >= 1) {
                                        $data = $query->result_array();
                                        foreach ($data as $data) {
                                          $id          = $data['id'];
                                          $level       = $data['level'];
                                          $kelas       = $data['kelas'];
                                      ?>
                                          <option value="<?= $id ?>"><?= $kelas ?></option>
                                        <?php }
                                      } else { ?>
                                        <option value="">Tidak ada Kelas</option>
                                      <?php }; ?>
                                    </optgroup>
                                  </select>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <!-- Aktif input -->
                                <div class="mb-0">
                                  <label>Aktifkan? &nbsp;</label>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="aktif1" value="1" name="is_aktif" required />
                                    <label class="form-check-label" for="aktif1">Ya</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="aktif0" value="0" name="is_aktif" required />
                                    <label class="form-check-label" for="aktif0">Tidak</label>
                                  </div>
                                </div>
                                <input type="text" class="form-control" id="id_user" value="<?= $id_user ?>" name="id_user" required readonly hidden autocomplete="off" />
                                <input type="text" class="form-control" id="id_profil" value="<?= $id_profil ?>" name="id_profil" required readonly hidden autocomplete="off" />
                                <button type="submit" class="btn btn-sm btn-primary">Update Data</button>
                                <button type="reset" class="btn btn-sm btn-outline-secondary">Reset</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Modal -->
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        <?php } ?>
      </div>
    </div>
  </div>
  <!--/ Data Akun PD Card -->
</div>
<!-- Modal Tambah -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahDataModal">Tambah Data Akun Peserta Didik</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="validate-form" action="<?= base_url('settings/tambahAkunPD'); ?>" method="POST">
        <div class="modal-body">
          <div class="alert alert-primary" role="alert">
            <div class="alert-body">
              <strong>Tips:
                <li>
                  Username Akun Peserta Didik hanya NISN
                </li>
                <li>
                  Password menggunakan Tanggal Lahir
                </li>
                <li>
                  Akun yang dibuat disini, otomatis mengikuti Tahun Pelajaran dan Semester yang sedang aktif
                </li>
              </strong>
            </div>
          </div>
          <div class="row">
            <!-- Nama Lengkap input -->
            <div class="mb-1 col-lg-6 col-12">
              <label class="form-label" for="namaLengkap">Nama Lengkap</label>
              <input type="text" class="form-control" id="namaLengkap" placeholder="Nama Lengkap" name="namaLengkap" required data-msg="Masukan Nama Lengkap" autocomplete="off" />
            </div>
            <!-- Nama Panggil input -->
            <div class="mb-1 col-lg-6 col-12">
              <label class="form-label" for="namaPanggil">Nama Panggil</label>
              <input type="text" class="form-control" id="namaPanggil" placeholder="Nama Panggil" name="namaPanggil" required data-msg="Masukan Nama Panggil" autocomplete="off" />
            </div>
            <!-- Tanggal Lahir input -->
            <div class="mb-1 col-lg-6 col-12">
              <label class="form-label" for="tanggalLahir">Tanggal Lahir</label>
              <input type="text" class="form-control flatpickr-basic" id="tanggalLahir" name="tanggalLahir" placeholder="Tanggal Lahir" required data-msg="Pilih Tanggal Lahir" autocomplete="off" />
            </div>
            <!-- Jenis Kelamin input -->
            <div class="mb-1 col-lg-3 col-12">
              <label for="jenisKelaminPDAdd">Jenis Kelamin</label>
              <select class="select2 hide-search form-control" id="jenisKelaminPDAdd" name="jenisKelamin" required data-placeholder="Pilih Jenis Kelamin" data-msg="Pilih Jenis Kelamin">
                <option></option>
                <optgroup label="Pilih Jenis Kelamin">
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
                </optgroup>
              </select>
            </div>
            <!-- NISN input -->
            <div class="mb-1 col-lg-3 col-12">
              <label class="form-label" for="nisn">NISN</label>
              <input type="number" class="form-control" id="nisn" placeholder="NISN" name="nisn" required data-msg="Masukan NISN" autocomplete="off" maxlength="10" oninput="javascript:if(this.value.length>this.maxLength)this.value=this.value.slice(0, this.maxLength);">
            </div>
            <!-- Tahun Pelajaran & Semester input -->
            <div class="mb-1 col-lg-6 col-12">
              <label class="form-label" for="tapel">Tahun Pelajaran & Semester</label>
              <input type="text" class="form-control" id="tapel" placeholder="<?= 'Tahun Pelajaran ' . $tapelAktif['tapel'] . ' Semester ' . $tapelAktif['semester'] ?>" value="<?= 'Tahun Pelajaran ' . $tapelAktif['tapel'] . ' Semester ' .  $tapelAktif['semester'] ?>" name="tapel" required readonly disabled data-msg="Masukan Tahun Pelajaran & Semester" autocomplete="off" />
            </div>
            <!-- Kelas input -->
            <div class="mb-1 col-lg-6 col-12">
              <label for="selectKelasAdd">Pilih Kelas</label>
              <select class="select2 form-control" id="selectKelasAdd" name="kelas" data-placeholder="Pilih Kelas" required data-msg="Pilih Kelas">
                <option></option>
                <optgroup label="Pilih Kelas">
                  <?php
                  $query = getSelect('setting_kelas', '*', 'LENGTH(level), level, LENGTH(kelas), kelas', 'asc');
                  if ($query->num_rows() >= 1) {
                    $data = $query->result_array();
                    foreach ($data as $data) {
                      $id          = $data['id'];
                      $level       = $data['level'];
                      $kelas       = $data['kelas'];
                  ?>
                      <option value="<?= $id ?>"><?= $kelas ?></option>
                    <?php }
                  } else { ?>
                    <option value="">Tidak ada Kelas</option>
                  <?php }; ?>
                </optgroup>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <!-- Aktif input -->
            <div class="mb-0">
              <label>Aktifkan? &nbsp;</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="aktif1" value="1" name="is_aktif" required />
                <label class="form-check-label" for="aktif1">Ya</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="aktif0" value="0" name="is_aktif" required />
                <label class="form-check-label" for="aktif0">Tidak</label>
              </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Tambah Data</button>
            <button type="reset" class="btn btn-sm btn-outline-secondary">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Tambah-->
<!-- Modal Import -->
<div class="modal fade" id="ImportDataModal" tabindex="-1" aria-labelledby="ImportDataModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ImportDataModal">Import Data Akun Peserta Didik</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="validate-form" action="<?= base_url('settings/importAkunPD'); ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-body mb-2">
          <ul class="timeline">
            <li class="timeline-item">
              <span class="timeline-point">
                <i data-feather="download"></i>
              </span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Unduh File Template</h6>
                  <span class="timeline-event-time" hidden>12 min ago</span>
                </div>
                <p>Unduh File Template Berdasarkan Tahun Pelajaran</p>
                <div class="d-flex flex-row align-items-center">
                  <img class="me-1" src="<?= base_url('assets/') ?>app-assets/images/icons/xls.png" alt="xls" height="50" />
                  <span>
                    <a href="<?= base_url('settings/exportTemplateAkunPD') ?>" target="blank" id="btnExportExcelAkunPD" class="btn btn-sm btn-success mt-1">Unduh File Template</a>
                  </span>
                </div>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point timeline-point-primary">
                <i data-feather="edit"></i>
              </span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Edit File</h6>
                  <span class="timeline-event-time" hidden>2 hours ago</span>
                </div>
                <p class="mb-50">Edit file template dan isilah sesuai kebutuhan data lalu unggah kembali disini.</p>
                <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="true" aria-controls="collapseExample2">
                  Lihat Kebutuhan Data
                </button>
                <div class="collapse" id="collapseExample2">
                  <ul class="list-group list-group-flush mt-1">
                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span>NISN</span>
                      <i data-feather="share-2" class="cursor-pointer font-medium-2" hidden></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span>NIS</span>
                      <i data-feather="share-2" class="cursor-pointer font-medium-2" hidden></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span>Nama Lengkap</span>
                      <i data-feather="share-2" class="cursor-pointer font-medium-2" hidden></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span>Nama Panggil</span>
                      <i data-feather="share-2" class="cursor-pointer font-medium-2" hidden></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span>Tanggal Lahir</span>
                      <i data-feather="share-2" class="cursor-pointer font-medium-2" hidden></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span>Jenis Kelamin</span>
                      <i data-feather="share-2" class="cursor-pointer font-medium-2" hidden></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between flex-wrap">
                      <span>Kelas</span>
                      <i data-feather="share-2" class="cursor-pointer font-medium-2" hidden></i>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point">
                <i data-feather="download"></i>
              </span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Pilih File</h6>
                  <span class="timeline-event-time" hidden>12 min ago</span>
                </div>
                <p>Pilih file yang telah di edit untuk di unggah kedalam sistem.</p>
                <div class="d-flex flex-row align-items-center">
                  <img id="iconfileimportAkunPD" class="me-1" src="<?= base_url('assets/') ?>app-assets/images/icons/unknown.png" alt="xls" height="50" />
                  <span>
                    <label for="inputImportFileExcelAkunPD" id="lblinputImportFileExcelAkunPD" class="btn btn-sm btn-success mt-1">Pilih File</label>
                    <input type="file" id="inputImportFileExcelAkunPD" name="fileExcelAkunPD" hidden accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                  </span>
                </div>
              </div>
            </li>
            <li class="timeline-item">
              <span class="timeline-point">
                <i data-feather="download"></i>
              </span>
              <div class="timeline-event">
                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                  <h6>Unggah File</h6>
                  <span class="timeline-event-time" hidden>12 min ago</span>
                </div>
                <p>Unggah file yang sudah dipilih untuk diproses sistem.</p>
                <div class="d-flex flex-row align-items-center">
                  <img id="iconfileimportAkunPDUp" class="me-1" src="<?= base_url('assets/') ?>app-assets/images/icons/unknown.png" alt="xls" height="50" />
                  <span>
                    <button type="submit" id="btnImportDataAkunPD" class="btn btn-sm btn-danger mt-1" disabled>Unggah File</button>
                    <button class="btn btn-sm btn-outline-success mt-1" id="btnProsesImportDataAkunPD" type="button" disabled hidden>
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      <span class="ml-25 align-middle">Memproses Data, Silahkan Tunggu . . .</span>
                    </button>
                  </span>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Import -->
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

  var basicPickr = $('.flatpickr-basic');
  if (basicPickr.length) {
    basicPickr.flatpickr({
      // minDate: 'today',
      altInput: true,
      altFormat: 'l, j F Y',
      dateFormat: 'Y-m-d',
      locale: 'id'
    });
  }

  $(basicPickr).on('change', function() {
    console.log(basicPickr.val());
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
    minimumResultsForSearch: Infinity
  });


  $('#inputImportFileExcelAkunPD').change(function() {
    $('#filenameImportAkunPD').html('');
    $('#iconfileimportAkunPD').attr('src', '<?= base_url('assets/') ?>app-assets/images/icons/xls.png');
    $('#iconfileimportAkunPDUp').attr('src', '<?= base_url('assets/') ?>app-assets/images/icons/xls.png');
    $('#lblinputImportFileExcelAkunPD').html('Ubah File');
    $('#lblinputImportFileExcelAkunPD').attr('class', 'btn btn-sm btn-primary mb-75 mr-75');
    $('#btnImportDataAkunPD').removeAttr("disabled");
    $('#btnImportDataAkunPD').attr('class', 'btn btn-success btn-sm mt-2 mb-2');
    $.each(this.files, function() {
      readURLAkunPD(this);
    })
  });

  function readURLAkunPD(file) {

    var reader = new FileReader();
    reader.onload = function(e) {
      $('#filenameImportAkunPD').append('<p><b class="text-success">' + file.name + '</b> terpilih, siap diunggah kedalam sistem!</p>');
      $('#btnImportDataAkunPD').html('Unggah File ' + file.name);
    }

    reader.readAsDataURL(file);
  }
</script>