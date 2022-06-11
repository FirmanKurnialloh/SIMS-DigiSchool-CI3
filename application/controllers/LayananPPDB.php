<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LayananPPDB extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('App_model', 'modelApp');
    $this->load->model('PPDB_Model', 'ModelPPDB');
    is_server_gtk_active();
    is_logged_in_as_gtk();
  }

  // PAGE DASBOARD
  public function index()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    if ($data['sessionRole1'] != "1" || $data['sessionRole1'] != "1") {
      is_ppdb_active();
    }
    $data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
    $data['profilGTK']     = $this->modelApp->getProfilGTK($data['sessionUser']);

    $url_param = $this->uri->segment('3');
    $base_64 = $url_param . str_repeat('=', strlen($url_param) % 4);
    $tapel = base64_decode($base_64);

    $data['url_param']     = $tapel;
    $data['pageCollumn']   = "1-column";
    $data['page']          = "Layanan PPDB";

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('gtk/ppdb/dashboard', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('gtk/ppdb/ajax', $data);
  }

  function indexLoad()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    if ($data['sessionRole1'] != "1" || $data['sessionRole1'] != "1") {
      is_ppdb_active();
    }
    $data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
    $data['profilGTK']     = $this->modelApp->getProfilGTK($data['sessionUser']);
    $page                  = $this->input->post("page");
    $this->load->view($page, $data);
  }

  public function switchModulPPDB()
  {
    $checkModulPPDB = $this->modelApp->getServerSetting();
    $modulPPDB      = $checkModulPPDB['modulPPDB'];
    if ($modulPPDB == "0") {
      $this->db->set('modulPPDB', '1');
      $this->db->update('setting_server');
    } elseif ($modulPPDB == "1") {
      $this->db->set('modulPPDB', '0');
      $this->db->update('setting_server');
    }
  }

  public function swtichRegister1()
  {
    $checkServerGTK = $this->modelApp->getServerSetting();
    $serverGTK = $checkServerGTK['loginGuru'];
    if ($serverGTK == "0") {
      $this->db->set('loginGuru', '1');
      $this->db->update('setting_server');
    } elseif ($serverGTK == "1") {
      $this->db->set('loginGuru', '0');
      $this->db->update('setting_server');
    }
  }

  public function swtichRegister2()
  {
    $checkServerSiswa = $this->modelApp->getServerSetting();
    $serverSiswa = $checkServerSiswa['loginSiswa'];
    if ($serverSiswa == "0") {
      $this->db->set('loginSiswa', '1');
      $this->db->update('setting_server');
    } elseif ($serverSiswa == "1") {
      $this->db->set('loginSiswa', '0');
      $this->db->update('setting_server');
    }
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

  // PAGE SETTING
  public function settings()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    if ($data['sessionRole1'] != "1" || $data['sessionRole1'] != "1") {
      is_ppdb_active();
    }
    $data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
    $data['profilGTK']     = $this->modelApp->getProfilGTK($data['sessionUser']);
    $data['pageCollumn']   = "0-column";
    $data['page']          = "Modul PPDB";

    $url_param             = $this->uri->segment('3');
    $base_64               = $url_param . str_repeat('=', strlen($url_param) % 4);
    $tapel                 = base64_decode($base_64);
    $data['url_param']     = $tapel;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('settings/menu', $data);
    $this->load->view('gtk/ppdb/settings', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('gtk/ppdb/ajax', $data);
  }

  function settingsLoad()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();

    if ($data['sessionRole1'] != "1" || $data['sessionRole1'] != "1") {
      is_ppdb_active();
    }
    $data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
    $data['profilGTK']     = $this->modelApp->getProfilGTK($data['sessionUser']);

    $page                  = $this->input->post("page");
    $this->load->view($page, $data);
  }

  public function tambahTapel()
  {
    $data = [
      'tapel'              => htmlspecialchars($this->input->post('tapel', true)),
      'kepalaSekolah'      => htmlspecialchars($this->input->post('kepalaSekolah', true)),
      'is_active_reg1'     => htmlspecialchars($this->input->post('is_active_reg1', true)),
    ];
    $checkData        = $this->db->get_where('ppdb_tapel', ['tapel' => $data['tapel']]);
    if ($checkData->num_rows() == "0") {
      $this->db->insert('ppdb_tapel', $data);
      $this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['success'](
            'Tahun Pelajaran " .  $data['tapel'] . " Di Tambahkan !',
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
            'Tahun Pelajaran " .  $data['tapel'] . " Sudah Tersedia !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
    }
    redirect(base_url('LayananPPDB/settings'));
  }

  public function deleteTapel()
  {
    $data = [
      'id'         => htmlspecialchars($this->input->post('id', true)),
      'tapel'      => htmlspecialchars($this->input->post('tapel', true)),
    ];
    $checkData     = $this->db->get_where('ppdb_tapel', ['id' => $data['id']]);
    if ($checkData->num_rows() == "1") {
      $this->db->delete('ppdb_tapel', ['id' => $data['id']]);
      $response['status']   = 'success';
      $response['judul']    = 'Berhasil !';
      $response['pesan']    = 'Tahun Pelajaran ' . $data['tapel'] . ' Telah Dihapus!';
    } elseif ($checkData->num_rows() == "0") {
      $response['status']   = 'error';
      $response['judul']    = 'Gagal !';
      $response['pesan']    = 'Tahun Pelajaran ' . $data['tapel'] . ' Tidak Ditemukan!';
    }
    echo json_encode($response);
  }

  // PAGE SETUP
  public function setUp()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    if ($data['sessionRole1'] != "1" || $data['sessionRole1'] != "1") {
      is_ppdb_active();
    }
    $data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
    $data['profilGTK']     = $this->modelApp->getProfilGTK($data['sessionUser']);

    $url_param             = $this->uri->segment('3');
    $base_64               = $url_param . str_repeat('=', strlen($url_param) % 4);
    $tapel                 = base64_decode($base_64);
    $data['url_param']     = $tapel;
    // $data['persuratan']    = $this->ModelPPDB->getPersuratan($tapel)->row_array();
    // $kepalaSekolah         = $data['persuratan']['kepalaSekolah'];
    // $data['kepalaSekolah'] = $this->ModelPPDB->getKepalaSekolah($kepalaSekolah)->row_array();

    $data['pageCollumn']   = "1-column";
    $data['page']          = "PPDB " . $tapel;
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('gtk/ppdb/setup', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('gtk/ppdb/ajax', $data);
  }

  function setupLoad()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();

    if ($data['sessionRole1'] != "1" || $data['sessionRole1'] != "1") {
      is_ppdb_active();
    }
    $data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
    $data['profilGTK']     = $this->modelApp->getProfilGTK($data['sessionUser']);

    $page                  = $this->input->post("page");
    $url_param             = $this->input->post("tapel");
    $data['persuratan']    = $this->ModelPPDB->getPersuratan($url_param)->row_array();
    $kepalaSekolah         = $data['persuratan']['kepalaSekolah'];
    $data['kepalaSekolah'] = $this->ModelPPDB->getKepalaSekolah($kepalaSekolah)->row_array();

    $this->load->view($page, $data);
  }
}
