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
        $this->db->delete('setting_tapel', array('id' => $data['id']));
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
      $this->db->delete('setting_mapel', array('id' => $data['id']));
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
      $this->db->delete('setting_ekskul', array('id' => $data['id']));
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
      $this->db->delete('setting_kelas', array('id' => $data['id']));
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
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $page = $this->input->post("page");
    $this->load->view($page, $data);
  }

  public function pd()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
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
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $page = $this->input->post("page");
    $this->load->view($page, $data);
  }
}
