<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('App_model');
    is_logged_in_as_gtk();
    is_logged_in_as_admin();
  }

  public function index()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $data['page']          = "Pengaturan Aplikasi";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('settings/menu', $data);
    $this->load->view('settings/index', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('settings/ajax', $data);
  }

  function sekolahLoad()
  {
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $page = $this->input->post("page");
    $this->load->view($page, $data);
  }

  public function swtichServerGuru()
  {
    $checkServerGTK = $this->App_model->getServerSetting();
    $serverGTK = $checkServerGTK['loginGuru'];
    if ($serverGTK == "0") {
      $this->db->set('loginGuru', '1');
      $this->db->update('setting_server');
    } elseif ($serverGTK == "1") {
      $this->db->set('loginGuru', '0');
      $this->db->update('setting_server');
    }
  }

  public function swtichServerSiswa()
  {
    $checkServerSiswa = $this->App_model->getServerSetting();
    $serverSiswa = $checkServerSiswa['loginSiswa'];
    if ($serverSiswa == "0") {
      $this->db->set('loginSiswa', '1');
      $this->db->update('setting_server');
    } elseif ($serverSiswa == "1") {
      $this->db->set('loginSiswa', '0');
      $this->db->update('setting_server');
    }
  }

  public function switchModulPPDB()
  {
    $checkModulPPDB = $this->App_model->getServerSetting();
    $modulPPDB = $checkModulPPDB['modulPPDB'];
    if ($modulPPDB == "0") {
      $this->db->set('modulPPDB', '1');
      $this->db->update('setting_server');
    } elseif ($modulPPDB == "1") {
      $this->db->set('modulPPDB', '0');
      $this->db->update('setting_server');
    }
  }

  public function sekolah()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $data['page']          = "Profil Sekolah";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('settings/menu', $data);
    $this->load->view('settings/sekolah', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('settings/ajax', $data);
  }

  public function tapel()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $data['page']          = "Tahun Pelajaran";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('settings/menu', $data);
    $this->load->view('settings/tapel', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('settings/ajax', $data);
  }

  function tapelLoad()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $page = $this->input->post("page");
    $this->load->view($page, $data);
  }

  public function tambahTapel()
  {
    $data = [
      'tapel'         => htmlspecialchars($this->input->post('tapel', true)),
      'semester'      => htmlspecialchars($this->input->post('semester', true)),
      'is_aktif'      => htmlspecialchars($this->input->post('is_aktif', true)),
    ];
    $checkData        = $this->db->get_where('setting_tapel', ['tapel' => $data['tapel'], 'semester' => $data['semester']]);
    if ($checkData->num_rows() == "0") {
      if ($data['is_aktif'] == "1") {
        $query = "UPDATE `setting_tapel` SET `is_aktif` = '0'";
        $this->db->query($query);
      }
      $this->db->insert('setting_tapel', $data);
      $this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['success'](
            'Tahun Pelajaran " .  $data['tapel'] . " Semester " .  $data['semester'] . " Di Tambahkan !',
            'Berhasil !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
    } elseif ($checkData->num_rows() == "1") {
      $this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['error'](
            'Tahun Pelajaran " .  $data['tapel'] . " Semester " .  $data['semester'] . " Sudah Tersedia !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
    }
    redirect(base_url('settings/tapel'));
  }

  public function switchTapel()
  {
    $data = [
      'id'         => htmlspecialchars($this->input->post('id', true)),
      'is_aktif'   => htmlspecialchars($this->input->post('is_aktif', true)),
    ];
    $checkData     = $this->db->get_where('setting_tapel', ['id' => $data['id']]);
    $row           = $checkData->row_array();
    if ($checkData->num_rows() == "1") {
      if ($data['is_aktif'] == "0") {
        $query = "UPDATE `setting_tapel` SET `is_aktif` = '0'";
        $this->db->query($query);
        $this->db->set('is_aktif', '1');
        $this->db->where('id', $data['id']);
        $this->db->update('setting_tapel');
        $this->session->set_flashdata('toastr', "
        <script>
        $(window).on('load', function() {
          setTimeout(function() {
            toastr['success'](
              'Tahun Pelajaran " .  $row['tapel'] . " Semester " .  $row['semester'] . " Di Aktifkan !',
              'Berhasil !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
      } else {
        $this->session->set_flashdata('toastr', "
        <script>
        $(window).on('load', function() {
          setTimeout(function() {
            toastr['error'](
              'Tahun Pelajaran " .  $row['tapel'] . " Semester " .  $row['semester'] . " Sedang Aktif !',
              'Gagal !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
      }
    } elseif ($checkData->num_rows() == "0") {
      $this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['error'](
            'Tahun Pelajaran " .  $row['tapel'] . " Semester " .  $row['semester'] . " Tidak Tersedia !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
    }
    redirect(base_url('settings/tapel'));
  }

  public function deleteTapel()
  {
    $data = [
      'id'         => htmlspecialchars($this->input->post('id', true)),
      'tapel'      => htmlspecialchars($this->input->post('tapel', true)),
      'semester'   => htmlspecialchars($this->input->post('semester', true))
    ];
    $checkData     = $this->db->get_where('setting_tapel', ['id' => $data['id']]);
    if ($checkData->num_rows() == "1") {
      if ($checkData->row('is_aktif') == "1") {
        $response['status']   = 'error';
        $response['judul']    = 'Gagal !';
        $response['pesan']    = 'Tahun Pelajaran ' . $data['tapel'] . ' Semester ' . $data['semester'] . ' Sedang Aktif!';
      } else {
        $this->db->delete('setting_tapel', ['id' => $data['id']]);
        $response['status']   = 'success';
        $response['judul']    = 'Berhasil !';
        $response['pesan']    = 'Tahun Pelajaran ' . $data['tapel'] . ' Semester ' . $data['semester'] . ' Telah Dihapus!';
      }
    } elseif ($checkData->num_rows() == "0") {
      $response['status']   = 'error';
      $response['judul']    = 'Gagal !';
      $response['pesan']    = 'Tahun Pelajaran ' . $data['tapel'] . ' Semester ' . $data['semester'] . ' Tidak Ditemukan!';
    }
    echo json_encode($response);
  }

  public function mapel()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $data['page']          = "Mata Pelajaran";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('settings/menu', $data);
    $this->load->view('settings/mapel', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('settings/ajax', $data);
  }

  function mapelLoad()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $page = $this->input->post("page");
    $this->load->view($page, $data);
  }

  public function tambahMapel()
  {
    $data = [
      'namaMapel'         => htmlspecialchars($this->input->post('namaMapel', true)),
      'kelompokMapel'     => htmlspecialchars($this->input->post('kelompokMapel', true)),
    ];
    $checkData        = $this->db->get_where('setting_mapel', ['namaMapel' => $data['namaMapel'], 'kelompokMapel' => $data['kelompokMapel']]);
    if ($checkData->num_rows() == "0") {
      $this->db->insert('setting_mapel', $data);
      $this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['success'](
            'Mata Pelajaran " .  $data['namaMapel'] . " Kelompok " .  $data['kelompokMapel'] . " Di Tambahkan !',
            'Berhasil !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
    } elseif ($checkData->num_rows() == "1") {
      $this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['error'](
            'Mata Pelajaran " .  $data['namaMapel'] . " Kelompok " .  $data['kelompokMapel'] . " Sudah Tersedia !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
    }
    redirect(base_url('settings/mapel'));
  }

  public function deleteMapel()
  {
    $data = [
      'id'                => htmlspecialchars($this->input->post('id', true)),
      'namaMapel'         => htmlspecialchars($this->input->post('namaMapel', true)),
      'kelompokMapel'     => htmlspecialchars($this->input->post('kelompokMapel', true)),
    ];
    $checkData     = $this->db->get_where('setting_mapel', ['id' => $data['id']]);
    if ($checkData->num_rows() == "1") {
      $this->db->delete('setting_mapel', ['id' => $data['id']]);
      $response['status']   = 'success';
      $response['judul']    = 'Berhasil !';
      $response['pesan']    = 'Mata Pelajaran ' . $data['namaMapel'] . ' Kelompok ' . $data['kelompokMapel'] . ' Telah Dihapus!';
    } elseif ($checkData->num_rows() == "0") {
      $response['status']   = 'error';
      $response['judul']    = 'Gagal !';
      $response['pesan']    = 'Mata Pelajaran ' . $data['namaMapel'] . ' Kelompok ' . $data['kelompokMapel'] . ' Tidak Ditemukan!';
    }
    echo json_encode($response);
  }

  public function ekskul()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $data['page']          = "Ekstrakurikuler";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('settings/menu', $data);
    $this->load->view('settings/ekskul', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('settings/ajax', $data);
  }

  function ekskulLoad()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $page = $this->input->post("page");
    $this->load->view($page, $data);
  }

  public function tambahEkskul()
  {
    $data = [
      'namaEkskul'         => htmlspecialchars($this->input->post('namaEkskul', true)),
    ];
    $checkData        = $this->db->get_where('setting_ekskul', ['namaEkskul' => $data['namaEkskul']]);
    if ($checkData->num_rows() == "0") {
      $this->db->insert('setting_ekskul', $data);
      $this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['success'](
            'Ekstrakurikuler " .  $data['namaEkskul'] . " Di Tambahkan !',
            'Berhasil !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
    } elseif ($checkData->num_rows() == "1") {
      $this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['error'](
            'Ekstrakurikuler " .  $data['namaEkskul'] . " Sudah Tersedia !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
    }
    redirect(base_url('settings/ekskul'));
  }

  public function deleteEkskul()
  {
    $data = [
      'id'                => htmlspecialchars($this->input->post('id', true)),
      'namaEkskul'        => htmlspecialchars($this->input->post('namaEkskul', true)),
    ];
    $checkData     = $this->db->get_where('setting_ekskul', ['id' => $data['id']]);
    if ($checkData->num_rows() == "1") {
      $this->db->delete('setting_ekskul', ['id' => $data['id']]);
      $response['status']   = 'success';
      $response['judul']    = 'Berhasil !';
      $response['pesan']    = 'Ekstrakurikuler ' . $data['namaEkskul'] . ' Telah Dihapus!';
    } elseif ($checkData->num_rows() == "0") {
      $response['status']   = 'error';
      $response['judul']    = 'Gagal !';
      $response['pesan']    = 'Ekstrakurikuler ' . $data['namaEkskul'] . ' Tidak Ditemukan!';
    }
    echo json_encode($response);
  }

  public function kelas()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $data['page']          = "Kelas";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('settings/menu', $data);
    $this->load->view('settings/kelas', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('settings/ajax', $data);
  }

  function kelasLoad()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $page = $this->input->post("page");
    $this->load->view($page, $data);
  }

  public function tambahKelas()
  {
    $data = [
      'level'         => htmlspecialchars($this->input->post('level', true)),
      'jurusan'       => htmlspecialchars($this->input->post('jurusan', true)),
      'kelas'         => htmlspecialchars($this->input->post('kelas', true)),
    ];
    $checkData        = $this->db->get_where('setting_kelas', ['kelas' => $data['kelas']]);
    if ($checkData->num_rows() == "0") {
      $this->db->insert('setting_kelas', $data);
      $this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['success'](
            'Kelas " .  $data['kelas'] . " Di Tambahkan !',
            'Berhasil !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
    } elseif ($checkData->num_rows() == "1") {
      $this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['error'](
            'Kelas " .  $data['kelas'] . " Sudah Tersedia !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
    }
    redirect(base_url('settings/kelas'));
  }

  public function deleteKelas()
  {
    $data = [
      'id'         => htmlspecialchars($this->input->post('id', true)),
      'kelas'      => htmlspecialchars($this->input->post('kelas', true)),
    ];
    $checkData     = $this->db->get_where('setting_kelas', ['id' => $data['id']]);
    if ($checkData->num_rows() == "1") {
      $this->db->delete('setting_kelas', ['id' => $data['id']]);
      $response['status']   = 'success';
      $response['judul']    = 'Berhasil !';
      $response['pesan']    = 'Kelas ' . $data['kelas'] . ' Telah Dihapus!';
    } elseif ($checkData->num_rows() == "0") {
      $response['status']   = 'error';
      $response['judul']    = 'Gagal !';
      $response['pesan']    = 'Kelas ' . $data['kelas'] . ' Tidak Ditemukan!';
    }
    echo json_encode($response);
  }

  public function gtk()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $data['page']          = "Akun GTK";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('settings/menu', $data);
    $this->load->view('settings/gtk', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('settings/ajax', $data);
  }

  function gtkLoad()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $page = $this->input->post("page");
    $this->load->view($page, $data);
  }

  public function tambahAkunGTK()
  {
    $dataUser = [
      'username'         => htmlspecialchars($this->input->post('username', true)),
      'password'         => password_hash('#MerdekaBelajar!', PASSWORD_DEFAULT),
      'role_id'          => htmlspecialchars($this->input->post('hakAkses', true)),
      'is_active'        => htmlspecialchars($this->input->post('is_aktif', true)),
    ];
    $dataProfile = [
      'username'         => htmlspecialchars($this->input->post('username', true)),
      'namaLengkap'      => htmlspecialchars($this->input->post('namaLengkap', true)),
      'namaPanggil'      => htmlspecialchars($this->input->post('namaPanggil', true)),
      'gelarDepan'       => htmlspecialchars($this->input->post('gelarDepan', true)),
      'gelarBelakang'    => htmlspecialchars($this->input->post('gelarBelakang', true)),
      'jk'               => htmlspecialchars($this->input->post('jenisKelamin', true)),
    ];
    $checkDataUser       = $this->db->get_where('user', ['username' => $dataUser['username']]);
    $checkDataProfile    = $this->db->get_where('profil_gtk', ['username' => $dataProfile['username']]);
    if ($checkDataUser->num_rows() == "0" && $checkDataProfile->num_rows() == "0") {
      $this->db->insert('user', $dataUser);
      $this->db->insert('profil_gtk', $dataProfile);
      $this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['success'](
            'Akun " .  $dataUser['username'] . " Di Tambahkan !',
            'Berhasil !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
    } elseif ($checkDataProfile->num_rows() == "1" && $checkDataProfile->num_rows() == "1") {
      $this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['error'](
            'Akun " .  $dataUser['username'] . " Sudah Tersedia !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
    }
    redirect(base_url('settings/gtk'));
  }

  public function resetDataGTK()
  {
    $query      = "SELECT `username` FROM `user` WHERE `role_id` != '1'";
    $queryUser  = $this->db->query($query)->result_array();
    foreach ($queryUser as $rowUsername) {
      $this->db->delete('profil_gtk', ['username' => $rowUsername['username']]);
      $this->db->delete('user', ['username' => $rowUsername['username']]);
    }
    $response['status']   = 'success';
    $response['judul']    = 'Berhasil !';
    $response['pesan']    = 'Database Telah Direset!';
    echo json_encode($response);
  }

  public function editAkunGTK()
  {
    $username       = htmlspecialchars($this->input->post('username', true));
    $password       = password_hash('#MerdekaBelajar!', PASSWORD_DEFAULT);
    $hakAkses       = htmlspecialchars($this->input->post('hakAkses', true));
    $is_aktif       = htmlspecialchars($this->input->post('is_aktif', true));

    $namaLengkap    = htmlspecialchars($this->input->post('namaLengkap', true));
    $namaPanggil    = htmlspecialchars($this->input->post('namaPanggil', true));
    $gelarDepan     = htmlspecialchars($this->input->post('gelarDepan', true));
    $gelarBelakang  = htmlspecialchars($this->input->post('gelarBelakang', true));
    $jenisKelamin   = htmlspecialchars($this->input->post('jenisKelamin', true));

    $checkDataUser       = $this->db->get_where('user', ['username' => $username]);
    $checkDataProfile    = $this->db->get_where('profil_gtk', ['username' => $username]);

    if ($checkDataUser->num_rows() && $checkDataProfile->num_rows()) {
      $this->db->set(
        [
          'role_id'         => $hakAkses,
          'is_active'       => $is_aktif
        ]
      );
      $this->db->where('username', $username);
      $this->db->update('user');
      $this->db->set(
        [
          'namaLengkap'     => $namaLengkap,
          'namaPanggil'     => $namaPanggil,
          'gelarDepan'      => $gelarDepan,
          'gelarBelakang'   => $gelarBelakang,
          'jk'              => $jenisKelamin
        ]
      );
      $this->db->where('username', $username);
      $this->db->update('profil_gtk');
    }
    $this->session->set_flashdata('toastr', "
    <script>
    $(window).on('load', function() {
      setTimeout(function() {
        toastr['success'](
          'Akun" . $username . " telah diperbarui !',
          'Berhasil !', {
            closeButton: true,
            tapToDismiss: true
          }
        );
      }, 0);
    })
    </script>");
    redirect(base_url('settings/gtk'));
  }

  public function deleteAkunGTK()
  {
    $data = [
      'username'   => htmlspecialchars($this->input->post('username', true)),
    ];
    $checkSession        = $this->session->userdata('username');
    $checkDataUser       = $this->db->get_where('user', ['username' => $data['username']]);
    $checkDataProfile    = $this->db->get_where('profil_gtk', ['username' => $data['username']]);
    if ($checkSession != $data['username']) {
      if ($checkDataUser->num_rows() == "1" && $checkDataProfile->num_rows() == "1") {
        $this->db->delete('user', ['username' => $data['username']]);
        $this->db->delete('profil_gtk', ['username' => $data['username']]);
        $response['status']   = 'success';
        $response['judul']    = 'Berhasil !';
        $response['pesan']    = 'Akun ' . $data['username'] . ' Telah Dihapus!';
      } elseif ($checkDataProfile->num_rows() == "0" && $checkDataProfile->num_rows() == "0") {
        $response['status']   = 'error';
        $response['judul']    = 'Gagal !';
        $response['pesan']    = 'Akun ' . $data['username'] . ' Tidak Ditemukan!';
      }
    } else {
      $response['status']   = 'error';
      $response['judul']    = 'Gagal !';
      $response['pesan']    = 'Akun ' . $data['username'] . ' Sedang Aktif!';
    }
    echo json_encode($response);
  }

  public function resetAkunGTK()
  {
    $data = [
      'username'         => htmlspecialchars($this->input->post('username', true)),
      'password'         => password_hash('#MerdekaBelajar!', PASSWORD_DEFAULT),
    ];
    $checkSession        = $this->session->userdata('username');
    $checkDataUser       = $this->db->get_where('user', ['username' => $data['username']]);
    $checkDataProfile    = $this->db->get_where('profil_gtk', ['username' => $data['username']]);
    if ($checkSession != $data['username']) {
      if ($checkDataUser->num_rows() == "1" && $checkDataProfile->num_rows() == "1") {
        $this->db->set('password', $data['password']);
        $this->db->where('username', $data['username']);
        $this->db->update('user');
        $response['status']   = 'success';
        $response['judul']    = 'Berhasil !';
        $response['pesan']    = 'Akun ' . $data['username'] . ' Telah Direset!';
      } elseif ($checkDataProfile->num_rows() == "0" && $checkDataProfile->num_rows() == "0") {
        $response['status']   = 'error';
        $response['judul']    = 'Gagal !';
        $response['pesan']    = 'Akun ' . $data['username'] . ' Tidak Ditemukan!';
      }
    } else {
      $response['status']   = 'error';
      $response['judul']    = 'Gagal !';
      $response['pesan']    = 'Akun ' . $data['username'] . ' Sedang Aktif!';
    }
    echo json_encode($response);
  }

  public function switchActivateGTK()
  {
    $data = [
      'username'   => htmlspecialchars($this->input->post('username', true)),
      'is_aktif'   => htmlspecialchars($this->input->post('is_aktif', true)),
    ];
    $checkData     = $this->db->get_where('user', ['username' => $data['username']]);
    $row           = $checkData->row_array();
    $checkSession  = $this->session->userdata('username');
    if ($checkSession != $row['username']) {
      if ($checkData->num_rows() == "1") {
        if ($row['is_active'] == "1") {
          $this->db->set('is_active', '0');
          $this->db->where('username', $data['username']);
          $this->db->update('user');
          $this->session->set_flashdata('toastr', "
          <script>
          $(window).on('load', function() {
            setTimeout(function() {
              toastr['success'](
                'Akun " .  $row['username'] . " Di Non-Aktifkan !',
                'Berhasil !', {
                  closeButton: true,
                  tapToDismiss: true
                }
              );
            }, 0);
          })
          </script>");
        } else {
          $this->db->set('is_active', '1');
          $this->db->where('username', $data['username']);
          $this->db->update('user');
          $this->session->set_flashdata('toastr', "
          <script>
          $(window).on('load', function() {
            setTimeout(function() {
              toastr['success'](
                'Akun " .  $row['username'] . " Di Aktifkan !',
                'Berhasil !', {
                  closeButton: true,
                  tapToDismiss: true
                }
              );
            }, 0);
          })
          </script>");
        }
      } elseif ($checkData->num_rows() == "0") {
        $this->session->set_flashdata('toastr', "
        <script>
        $(window).on('load', function() {
          setTimeout(function() {
            toastr['error'](
              'Akun " .  $row['username'] . " Tidak Tersedia !',
              'Gagal !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
      }
    } else {
      $this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['error'](
            'Akun " .  $row['username'] . " Sedang Aktif !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
    }
    redirect(base_url('settings/gtk'));
  }

  public function pd()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $data['page']          = "Akun Peserta Didik";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('settings/menu', $data);
    $this->load->view('settings/pd', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('settings/ajax', $data);
  }

  function pdLoad()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $page = $this->input->post("page");
    $this->load->view($page, $data);
  }

  public function db()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $data['page']          = "Database";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('settings/menu', $data);
    $this->load->view('settings/db', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('settings/ajax', $data);
  }

  function dbLoad()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $page = $this->input->post("page");
    $this->load->view($page, $data);
  }
}
