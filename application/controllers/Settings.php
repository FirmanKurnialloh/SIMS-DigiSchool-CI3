<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Settings extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('App_model', 'modelApp');
    is_logged_in_as_gtk();
    is_logged_in_as_admin();
  }

  public function index()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    $data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
    $data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
    $data['page']          = "Pengaturan Aplikasi";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('settings/menu', $data);
    $this->load->view('settings/index', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('settings/ajax', $data);
  }

  public function swtichServerGuru()
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

  public function swtichServerSiswa()
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

  public function switchModulPPDB()
  {
    $checkModulPPDB = $this->modelApp->getServerSetting();
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
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    $data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
    $data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
    $data['page']          = "Profil Sekolah";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('settings/menu', $data);
    $this->load->view('settings/sekolah', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('settings/ajax', $data);
  }

  function sekolahLoad()
  {
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $page = $this->input->post("page");
    $this->load->view($page, $data);
  }

  public function editProfilSekolah()
  {
    $logoSekolah      = $_FILES['logoSekolah']['name'];
    $namaSekolah      = htmlspecialchars($this->input->post('namaSekolah', true));
    $npsn             = htmlspecialchars($this->input->post('npsn', true));
    $nss              = htmlspecialchars($this->input->post('nss', true));
    $bentukPendidikan = htmlspecialchars($this->input->post('bentukPendidikan', true));
    $statusSekolah    = htmlspecialchars($this->input->post('statusSekolah', true));

    if ($logoSekolah) {
      $file_name                = str_replace(' ', '_', $namaSekolah);
      $file_name                = str_replace('.', '_', $file_name);
      $config['file_name']      = $file_name;
      $extName                  = explode('.', $logoSekolah);
      $extName                  = strtolower(end($extName));
      $new_filename             = $file_name . '.' . $extName;

      $config['allowed_types']  = 'jpeg|jpg|png';
      $config['max_size']       = '1024';
      $config['upload_path']    = './assets/files/images/logo/';

      $old_image = $this->modelApp->getProfilSekolah();
      $old_image = $old_image['logoSekolah'];
      if ($old_image != null) {
        unlink(FCPATH . 'assets/files/images/logo/' . $new_filename);
      }

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('logoSekolah')) {
        $this->db->set('logoSekolah', $new_filename);
      } else {
        echo $this->upload->display_errors();
      }
    }

    if ($namaSekolah) {
      $this->db->set(
        [
          'namaSekolah'       => $namaSekolah,
          'npsn'              => $npsn,
          'nss'               => $nss,
          'bentukPendidikan'  => $bentukPendidikan,
          'statusSekolah'     => $statusSekolah,
        ]
      );
    }

    $this->db->update('profil_sekolah');
    $this->session->set_flashdata('toastr', "
    <script>
    $(window).on('load', function() {
      setTimeout(function() {
        toastr['success'](
          'Profil sekolah telah diperbarui !',
          'Berhasil !', {
            closeButton: true,
            tapToDismiss: true
          }
        );
      }, 0);
    })
    </script>");
    redirect(base_url('settings/sekolah'));
  }

  public function editLokasiSekolah()
  {
    $logoPemerintah   = $_FILES['logoPemerintah']['name'];
    $namaPemerintah   = htmlspecialchars($this->input->post('namaPemerintah', true));
    $bentukPemerintah = htmlspecialchars($this->input->post('bentukPemerintah', true));
    $jl               = htmlspecialchars($this->input->post('jl', true));
    $kp               = htmlspecialchars($this->input->post('kp', true));
    $rt               = htmlspecialchars($this->input->post('rt', true));
    $rw               = htmlspecialchars($this->input->post('rw', true));
    $desa             = htmlspecialchars($this->input->post('desa', true));
    $kecamatan        = htmlspecialchars($this->input->post('kecamatan', true));
    $kabupaten        = htmlspecialchars($this->input->post('kabupaten', true));
    $provinsi         = htmlspecialchars($this->input->post('provinsi', true));
    $pos              = htmlspecialchars($this->input->post('pos', true));
    $lat              = htmlspecialchars($this->input->post('lat', true));
    $long             = htmlspecialchars($this->input->post('long', true));

    if ($logoPemerintah) {
      $file_name                = str_replace(' ', '_', $namaPemerintah);
      $file_name                = str_replace('.', '_', $file_name);
      $config['file_name']      = $file_name;
      $extName                  = explode('.', $logoPemerintah);
      $extName                  = strtolower(end($extName));
      $new_filename             = $file_name . '.' . $extName;

      $config['allowed_types']  = 'jpeg|jpg|png';
      $config['max_size']       = '1024';
      $config['upload_path']    = './assets/files/images/logo/';

      $old_image = $this->modelApp->getProfilSekolah();
      $old_image = $old_image['logoPemerintah'];
      if ($old_image != null) {
        unlink(FCPATH . 'assets/files/images/logo/' . $new_filename);
      }

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('logoPemerintah')) {
        $this->db->set('logoPemerintah', $new_filename);
      } else {
        echo $this->upload->display_errors();
      }
    }

    if ($namaPemerintah) {
      $this->db->set(
        [
          'namaPemerintah'    => $namaPemerintah,
          'bentukPemerintah'  => $bentukPemerintah,
          'jl'                => $jl,
          'kp'                => $kp,
          'rt'                => $rt,
          'rw'                => $rw,
          'desa'              => $desa,
          'kecamatan'         => $kecamatan,
          'kabupaten'         => $kabupaten,
          'provinsi'          => $provinsi,
          'pos'               => $pos,
          'lat'               => $lat,
          'long'              => $long,
        ]
      );
    }

    $this->db->update('profil_sekolah');
    $this->session->set_flashdata('toastr', "
    <script>
    $(window).on('load', function() {
      setTimeout(function() {
        toastr['success'](
          'Profil sekolah telah diperbarui !',
          'Berhasil !', {
            closeButton: true,
            tapToDismiss: true
          }
        );
      }, 0);
    })
    </script>");
    redirect(base_url('settings/sekolah'));
  }

  public function editKontakSekolah()
  {
    $web        = htmlspecialchars($this->input->post('web', true));
    $email      = htmlspecialchars($this->input->post('email', true));
    $tel        = htmlspecialchars($this->input->post('tel', true));
    $fax        = htmlspecialchars($this->input->post('fax', true));
    $facebook   = htmlspecialchars($this->input->post('facebook', true));
    $instagram  = htmlspecialchars($this->input->post('instagram', true));
    $youtube    = htmlspecialchars($this->input->post('youtube', true));
    $whatsapp   = htmlspecialchars($this->input->post('whatsapp', true));

    if ($email) {
      $this->db->set(
        [
          'web'       => $web,
          'email'     => $email,
          'telepon'   => $tel,
          'fax'       => $fax,
          'facebook'  => $facebook,
          'instagram' => $instagram,
          'youtube'   => $youtube,
          'whatsapp'  => $whatsapp
        ]
      );
    }

    $this->db->update('profil_sekolah');
    $this->session->set_flashdata('toastr', "
    <script>
    $(window).on('load', function() {
      setTimeout(function() {
        toastr['success'](
          'Profil sekolah telah diperbarui !',
          'Berhasil !', {
            closeButton: true,
            tapToDismiss: true
          }
        );
      }, 0);
    })
    </script>");
    redirect(base_url('settings/sekolah'));
  }

  public function tapel()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    $data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
    $data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
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
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    $data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
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
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    $data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
    $data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
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
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    $data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
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
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    $data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
    $data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
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
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    $data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
    $page = $this->input->post("page");
    $this->load->view($page, $data);
  }

  public function tambahEkskul()
  {
    $data = [
      'namaEkskul'         => htmlspecialchars($this->input->post('namaEkskul', true)),
      // 'pelatih'            => htmlspecialchars($this->input->post('pelatih', true)),
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
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    $data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
    $data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
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
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    $data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
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
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    $data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
    $data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
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
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    $data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
    $page = $this->input->post("page");
    $this->load->view($page, $data);
  }

  public function tambahAkunGTK()
  {
    $dataProfile = [
      'username'         => htmlspecialchars($this->input->post('username', true)),
      'namaLengkap'      => htmlspecialchars($this->input->post('namaLengkap', true)),
      'namaPanggil'      => htmlspecialchars($this->input->post('namaPanggil', true)),
      'gelarDepan'       => htmlspecialchars($this->input->post('gelarDepan', true)),
      'gelarBelakang'    => htmlspecialchars($this->input->post('gelarBelakang', true)),
      'jk'               => htmlspecialchars($this->input->post('jenisKelamin', true)),
    ];

    if ($dataProfile['gelarDepan']) {
      $gelarDepan = $dataProfile['gelarDepan'] . ' ';
    } else {
      $gelarDepan = "";
    }

    $namaLengkap = $dataProfile['namaLengkap'];

    if ($dataProfile['gelarBelakang']) {
      $gelarBelakang = ', ' . $dataProfile['gelarBelakang'];
    } else {
      $gelarBelakang = "";
    }

    $namaGelar = $gelarDepan . $namaLengkap . $gelarBelakang;

    $dataUser = [
      'username'         => htmlspecialchars($this->input->post('username', true)),
      'password'         => password_hash('#MerdekaBelajar!', PASSWORD_DEFAULT),
      'namaLengkap'      => $namaGelar,
      'role_id_1'        => htmlspecialchars($this->input->post('hakAkses1', true)),
      'role_id_2'        => htmlspecialchars($this->input->post('hakAkses2', true)),
      'is_active'        => htmlspecialchars($this->input->post('is_aktif', true)),
      'date_created'     => time(),
    ];

    if ($dataUser['role_id_1'] == 6) {
      $dataKelas = [
        'id'              => htmlspecialchars($this->input->post('kelas', true)),
        'walikelas'       => htmlspecialchars($this->input->post('username', true)),
      ];
    } elseif ($dataUser['role_id_1'] == 7) {
      $dataEkskul = [
        'id'              => htmlspecialchars($this->input->post('ekskul', true)),
        'pelatih'         => htmlspecialchars($this->input->post('username', true)),
      ];
    }

    if ($dataUser['role_id_2'] == 6) {
      $dataKelas = [
        'id'              => htmlspecialchars($this->input->post('kelas2', true)),
        'walikelas'       => htmlspecialchars($this->input->post('username', true)),
      ];
    } elseif ($dataUser['role_id_2'] == 7) {
      $dataEkskul = [
        'id'              => htmlspecialchars($this->input->post('ekskul2', true)),
        'pelatih'         => htmlspecialchars($this->input->post('username', true)),
      ];
    }

    $checkDataUser       = $this->db->get_where('user_gtk', ['username' => $dataUser['username']]);
    $checkDataProfile    = $this->db->get_where('profil_gtk', ['username' => $dataProfile['username']]);
    if ($checkDataUser->num_rows() == "0" && $checkDataProfile->num_rows() == "0") {
      $this->db->insert('user_gtk', $dataUser);
      $this->db->insert('profil_gtk', $dataProfile);
      if ($dataKelas) {
        $this->db->set(
          [
            'walikelas'     => $dataKelas['walikelas'],
          ]
        );
        $this->db->where('id', $dataKelas['id']);
        $this->db->update('setting_kelas');
      }
      if ($dataEkskul) {
        $this->db->set(
          [
            'pelatih'     => $dataEkskul['pelatih'],
          ]
        );
        $this->db->where('id', $dataEkskul['id']);
        $this->db->update('setting_ekskul');
      }

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

  public function exportTemplateAkunGTK()
  {
    $dataServer         = $this->modelApp->getServerSetting();
    $namaAplikasi       = $dataServer['namaAplikasi'];
    $dataTapel          = $this->modelApp->getTapelAktif();
    $id_tapel           = $dataTapel['id'];
    $tapel              = $dataTapel['tapel'];
    $semester           = $dataTapel['semester'];
    $fileName           = "Template Import Akun GTK Tahun Pelajaran " . $tapel . " Semester " . $semester;

    header("Content-type: application/vnd.ms-excel");
    header('Content-Disposition: attachment; filename="' . $fileName . '.xlsx"');

    $spreadsheet = new Spreadsheet();
    $spreadsheet
      ->getProperties()
      ->setCreator($namaAplikasi)
      ->setLastModifiedBy($namaAplikasi)
      ->setTitle($fileName)
      ->setSubject($namaAplikasi)
      ->setDescription($namaAplikasi)
      ->setKeywords($namaAplikasi);

    $style_col = array(
      'font' => array('bold' => true),
      'alignment' => array(
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
      ),
      'borders' => array(
        'top' => array('style'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),
        'right' => array('style'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),
        'bottom' => array('style'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),
        'left' => array('style'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN)
      )
    );

    $sheet0 = $spreadsheet->getActiveSheet(0)->setTitle('PETUNJUK');
    $sheet0->mergeCells('A1:L2');
    $sheet0->getStyle('A1')->getFont()->setBold(TRUE);
    $sheet0->getStyle('A1')->getFont()->setSize(15);
    $sheet0->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet0->getStyle('A1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet0->setCellValue('A1', $fileName);

    $sheet0->mergeCells('A4:L4');
    $sheet0->getStyle('A4')->getFont()->setBold(TRUE);
    $sheet0->getStyle('A4')->getFont()->setSize(12);
    $sheet0->getStyle('A4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet0->getStyle('A4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet0->setCellValue('A4', "Petunjuk Pengisian");

    $sheet0->setCellValue('B6', "1. Sistem hanya akan memproses data pada SHEET DATA GTK");
    $sheet0->setCellValue('B7', "2. Jangan ubah format dan isian tabel, anda hanya dapat mengisi pada cell berikut: ");
    $sheet0->setCellValue('C8', "a. CELL A5 dst. - EMAIL/USERNAME");
    $sheet0->setCellValue('C9', "b. CELL B5 dst. - NAMA LENGKAP");
    $sheet0->setCellValue('C10', "c. CELL C5 dst. - NAMA PANGGIL");
    $sheet0->setCellValue('C11', "d. CELL D5 dst. - GELAR DEPAN");
    $sheet0->setCellValue('C12', "e. CELL E5 dst. - GELAR BELAKANG");
    $sheet0->setCellValue('C13', "f. CELL F5 dst. - JENIS KELAMIN");
    $sheet0->setCellValue('C14', "g. CELL G5 dst. - ID ROLE 1");
    $sheet0->setCellValue('C15', "h. CELL H5 dst. - ID KELAS");
    $sheet0->setCellValue('C16', "i. CELL I5 dst. - ID ROLE 2");
    $sheet0->setCellValue('C17', "j. CELL J5 dst. - ID EKSKUL");
    $sheet0->setCellValue('B19', "3. Pengisian NAMA LENGKAP tidak perlu ditulis beserta gelarnya, tulis gelar pada kolom yang telah di sediakan");
    $sheet0->setCellValue('B20', "4. Pengisian JENIS KELAMIN hanya dapat menggunakan huruf L atau P");
    $sheet0->setCellValue('B21', "5. Pengisian ID ROLE silahkan salin dari SHEET DATA ROLE");
    $sheet0->setCellValue('B22', "6. Jika ID ROLE diisi sebagai walikelas, maka kolom ID_KELAS harus diisi");
    $sheet0->setCellValue('B23', "7. Jika ID ROLE diisi sebagai pembina ekstrakurikuler, maka kolom ID_EKSKUL harus diisi");
    $sheet0->setCellValue('B24', "8. Untuk mengurangi beban kerja server maka disarankan melakukan 1x import untuk 50 orang");

    $sheet0->mergeCells('A25:L25');
    $sheet0->getStyle('A25')->getFont()->setBold(TRUE);
    $sheet0->getStyle('A25')->getFont()->setSize(12);
    $sheet0->getStyle('A25')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet0->getStyle('A25')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet0->setCellValue('A25', "Terimakasih telah menggunakan SIMS DigiSchool");

    $sheet1 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'DATA ROLE');
    $spreadsheet->addSheet($sheet1, 1);
    $sheet1->mergeCells('A1:J2');
    $sheet1->getStyle('A1')->getFont()->setBold(TRUE);
    $sheet1->getStyle('A1')->getFont()->setSize(15);
    $sheet1->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet1->getStyle('A1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet1->setCellValue('A1', $fileName);

    $sheet1->mergeCells('A4:B4');
    $sheet1->getStyle('A4')->getFont()->setBold(TRUE);
    $sheet1->getStyle('A4')->getFont()->setSize(12);
    $sheet1->getStyle('A4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet1->getStyle('A4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet1->setCellValue('A4', "DATA ROLE");

    $sheet1->setCellValue('A5', 'ID_ROLE');
    $sheet1->setCellValue('B5', 'ROLE');

    $sheet1->getStyle('A5')->applyFromArray($style_col);
    $sheet1->getStyle('B5')->applyFromArray($style_col);

    $sheet1->getColumnDimension('A')->setWidth(10);
    $sheet1->getColumnDimension('B')->setWidth(30);

    $dataRole = $this->db->get('user_role')->result_array();
    $no = 1;
    $numrow = 6;
    foreach ($dataRole as $RoleData) {
      $id_role   = $RoleData['id'];
      $role      = $RoleData['role'];
      $sheet1->setCellValueExplicit('A' . $numrow, $id_role, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet1->setCellValue('B' . $numrow, $role);
      $no++;
      $numrow++;
    }

    $sheet1->mergeCells('C4:G4');
    $sheet1->getStyle('C4')->getFont()->setBold(TRUE);
    $sheet1->getStyle('C4')->getFont()->setSize(12);
    $sheet1->getStyle('C4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet1->getStyle('C4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet1->setCellValue('C4', "DATA KELAS");

    $sheet1->setCellValue('C5', 'ID_KELAS');
    $sheet1->setCellValue('D5', 'LEVEL');
    $sheet1->setCellValue('E5', 'JURUSAN');
    $sheet1->setCellValue('F5', 'KELAS');
    $sheet1->setCellValue('G5', 'WALIKELAS');

    $sheet1->getStyle('C5')->applyFromArray($style_col);
    $sheet1->getStyle('D5')->applyFromArray($style_col);
    $sheet1->getStyle('E5')->applyFromArray($style_col);
    $sheet1->getStyle('F5')->applyFromArray($style_col);
    $sheet1->getStyle('G5')->applyFromArray($style_col);

    $sheet1->getColumnDimension('C')->setWidth(10);
    $sheet1->getColumnDimension('D')->setWidth(10);
    $sheet1->getColumnDimension('E')->setWidth(20);
    $sheet1->getColumnDimension('F')->setWidth(30);
    $sheet1->getColumnDimension('G')->setWidth(50);

    $dataKelas = $this->db->get('setting_kelas')->result_array();
    $no = 1;
    $numrow = 6;
    foreach ($dataKelas as $kelasData) {
      $id_kelas   = $kelasData['id'];
      $level      = $kelasData['level'];
      $jurusan    = $kelasData['jurusan'];
      $kelas      = $kelasData['kelas'];
      $walikelas  = $kelasData['walikelas'];
      if ($walikelas) {
        $dataUser      = $this->modelApp->getUserGTK($walikelas);
        $namaWalikelas = $dataUser['namaLengkap'];
      } else {
        $namaWalikelas = "";
      }
      $sheet1->setCellValueExplicit('C' . $numrow, $id_kelas, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet1->setCellValue('D' . $numrow, $level);
      $sheet1->setCellValue('E' . $numrow, $jurusan);
      $sheet1->setCellValue('F' . $numrow, $kelas);
      $sheet1->setCellValue('G' . $numrow, htmlspecialchars_decode($namaWalikelas, ENT_QUOTES));
      $no++;
      $numrow++;
    }

    $sheet1->mergeCells('H4:J4');
    $sheet1->getStyle('H4')->getFont()->setBold(TRUE);
    $sheet1->getStyle('H4')->getFont()->setSize(12);
    $sheet1->getStyle('H4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet1->getStyle('H4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet1->setCellValue('H4', "DATA EKSKUL");

    $sheet1->setCellValue('H5', 'ID_EKSKUL');
    $sheet1->setCellValue('I5', 'EKSKUL');
    $sheet1->setCellValue('J5', 'PELATIH');

    $sheet1->getStyle('H5')->applyFromArray($style_col);
    $sheet1->getStyle('I5')->applyFromArray($style_col);
    $sheet1->getStyle('J5')->applyFromArray($style_col);

    $sheet1->getColumnDimension('H')->setWidth(10);
    $sheet1->getColumnDimension('I')->setWidth(30);
    $sheet1->getColumnDimension('J')->setWidth(50);

    $dataEkskul = $this->db->get('setting_ekskul')->result_array();
    $no = 1;
    $numrow = 6;
    foreach ($dataEkskul as $ekskulData) {
      $id_ekskul   = $ekskulData['id'];
      $ekskul      = $ekskulData['namaEkskul'];
      $pelatih     = $ekskulData['pelatih'];
      if ($pelatih) {
        $dataUser  = $this->modelApp->getUserGTK($pelatih);
        $pelatih   = $dataUser['namaLengkap'];
      } else {
        $pelatih = "";
      }
      $sheet1->setCellValueExplicit('H' . $numrow, $id_ekskul, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet1->setCellValue('I' . $numrow, $ekskul);
      $sheet1->setCellValue('J' . $numrow, htmlspecialchars_decode($pelatih, ENT_QUOTES));
      $no++;
      $numrow++;
    }

    $sheet2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'DATA GTK');
    $spreadsheet->addSheet($sheet2, 2);
    $sheet2->mergeCells('A1:J2');
    $sheet2->getStyle('A1')->getFont()->setBold(TRUE);
    $sheet2->getStyle('A1')->getFont()->setSize(15);
    $sheet2->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet2->getStyle('A1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet2->setCellValue('A1', $fileName);

    $sheet2->setCellValue('A4', 'EMAIL/USERNAME');
    $sheet2->setCellValue('B4', 'NAMA LENGKAP');
    $sheet2->setCellValue('C4', 'NAMA PANGGIL');
    $sheet2->setCellValue('D4', 'GELAR DEPAN');
    $sheet2->setCellValue('E4', 'GELAR BELAKANG');
    $sheet2->setCellValue('F4', 'L/P');
    $sheet2->setCellValue('G4', 'ID_ROLE 1');
    $sheet2->setCellValue('H4', 'ID_KELAS');
    $sheet2->setCellValue('I4', 'ID_ROLE 2');
    $sheet2->setCellValue('J4', 'ID_EKSKUL');

    $sheet2->getStyle('A4')->applyFromArray($style_col);
    $sheet2->getStyle('B4')->applyFromArray($style_col);
    $sheet2->getStyle('C4')->applyFromArray($style_col);
    $sheet2->getStyle('D4')->applyFromArray($style_col);
    $sheet2->getStyle('E4')->applyFromArray($style_col);
    $sheet2->getStyle('F4')->applyFromArray($style_col);
    $sheet2->getStyle('G4')->applyFromArray($style_col);
    $sheet2->getStyle('H4')->applyFromArray($style_col);
    $sheet2->getStyle('I4')->applyFromArray($style_col);
    $sheet2->getStyle('J4')->applyFromArray($style_col);

    $sheet2->getColumnDimension('A')->setWidth(30);
    $sheet2->getColumnDimension('B')->setWidth(50);
    $sheet2->getColumnDimension('C')->setWidth(25);
    $sheet2->getColumnDimension('D')->setWidth(20);
    $sheet2->getColumnDimension('E')->setWidth(20);
    $sheet2->getColumnDimension('F')->setWidth(5);
    $sheet2->getColumnDimension('G')->setWidth(10);
    $sheet2->getColumnDimension('H')->setWidth(10);
    $sheet2->getColumnDimension('I')->setWidth(10);
    $sheet2->getColumnDimension('J')->setWidth(10);

    $spreadsheet->setActiveSheetIndex(0);

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
  }

  public function importAkunGTK()
  {
    $fileExcel                = $_FILES['fileExcelAkunGTK']['name'];
    $config['file_name']      = $fileExcel;
    $config['allowed_types']  = 'xls|xlsx';
    $config['upload_path']    = './assets/files/temp/';

    $this->load->library('upload', $config);
    $this->upload->do_upload('fileExcelAkunGTK');
    $file_data   = $this->upload->data();
    $file_name   = $config['upload_path'] . $file_data['file_name'];

    $extFile   = pathinfo($file_name, PATHINFO_EXTENSION);
    if ($extFile == 'xls') {
      $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
    } elseif ($extFile == 'xlsx') {
      $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }

    $spreadsheet  = $reader->load($file_name);
    $sheetData    = $spreadsheet->getSheet(2)->toArray();

    if (file_exists($file_name))
      unlink($file_name);

    $sheetCount   = count($sheetData);

    if ($sheetCount > 1) {
      for ($i = 5; $i < $sheetCount; $i++) {
        $username         = $sheetData[$i][0];
        $namaLengkap      = $sheetData[$i][1];
        $namaPanggil      = $sheetData[$i][2];
        $gelarDepan       = $sheetData[$i][3];
        $gelarBelakang    = $sheetData[$i][4];
        $jk               = $sheetData[$i][5];
        $id_role_1        = $sheetData[$i][6];
        $id_kelas         = $sheetData[$i][7];
        $id_role_2        = $sheetData[$i][8];
        $id_ekskul        = $sheetData[$i][9];

        if ($gelarDepan) {
          $gelarDepanGabung = $gelarDepan . ' ';
        } else {
          $gelarDepanGabung = "";
        }

        if ($gelarBelakang) {
          $gelarBelakangGabung = ', ' . $gelarBelakang;
        } else {
          $gelarBelakangGabung = "";
        }

        $namaGelar = $gelarDepanGabung . $namaLengkap . $gelarBelakangGabung;

        $dataProfile[] = [
          'username'      => $username,
          'namaLengkap'   => $namaLengkap,
          'namaPanggil'   => $namaPanggil,
          'gelarDepan'    => $gelarDepan,
          'gelarBelakang' => $gelarBelakang,
          'jk'            => $jk,
          'date_created'  => time(),
        ];
        $dataUser[] = [
          'username'     => $username,
          'password'     => password_hash('#MerdekaBelajar!', PASSWORD_DEFAULT),
          'namaLengkap'  => $namaGelar,
          'role_id_1'    => $id_role_1,
          'role_id_2'    => $id_role_2,
          'is_active'    => "1",
          'date_created' => time(),
        ];

        if ($id_role_1 == 6) {
          $dataKelasRole = [
            'id'              => $id_kelas,
            'walikelas'       => $username,
          ];
        } elseif ($id_role_1 == 7) {
          $dataEkskulRole = [
            'id'              => $id_kelas,
            'pelatih'         => $username,
          ];
        }

        if ($id_role_2 == 6) {
          $dataKelasRole = [
            'id'              => $id_ekskul,
            'walikelas'       => $username,
          ];
        } elseif ($id_role_2 == 7) {
          $dataEkskulRole = [
            'id'              => $id_ekskul,
            'pelatih'         => $username,
          ];
        }
      }

      $queryProfil  = $this->db->insert_batch('profil_gtk', $dataProfile);
      $queryUser    = $this->db->insert_batch('user_gtk', $dataUser);

      if ($dataKelasRole) {
        $this->db->set(
          [
            'walikelas'     => $dataKelasRole['walikelas'],
          ]
        );
        $this->db->where('id', $dataKelasRole['id']);
        $this->db->update('setting_kelas');
      }

      if ($dataEkskulRole) {
        $this->db->set(
          [
            'pelatih'     => $dataEkskulRole['pelatih'],
          ]
        );
        $this->db->where('id', $dataEkskulRole['id']);
        $this->db->update('setting_ekskul');
      }

      if ($queryProfil && $queryUser) {
        $this->session->set_flashdata('toastr', "
          <script>
          $(window).on('load', function() {
            setTimeout(function() {
              toastr['success'](
                'Akun GTK Di Import !',
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
            toastr['success'](
              'Terdapat Duplikasi Data !',
              'Gagal !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
      }
    }
    redirect(base_url('settings/pd'));
  }

  public function resetDataGTK()
  {
    $query      = "SELECT `username` FROM `user_gtk` WHERE `role_id_1` != '1'";
    $queryUser  = $this->db->query($query)->result_array();
    foreach ($queryUser as $rowUsername) {
      $this->db->delete('profil_gtk', ['username' => $rowUsername['username']]);
      $this->db->delete('user_gtk', ['username' => $rowUsername['username']]);
    }
    $response['status']   = 'success';
    $response['judul']    = 'Berhasil !';
    $response['pesan']    = 'Database Telah Direset!';
    echo json_encode($response);
  }

  public function editAkunGTK()
  {
    $dataProfile = [
      'username'         => htmlspecialchars($this->input->post('username', true)),
      'namaLengkap'      => htmlspecialchars($this->input->post('namaLengkap', true)),
      'namaPanggil'      => htmlspecialchars($this->input->post('namaPanggil', true)),
      'gelarDepan'       => htmlspecialchars($this->input->post('gelarDepan', true)),
      'gelarBelakang'    => htmlspecialchars($this->input->post('gelarBelakang', true)),
      'jk'               => htmlspecialchars($this->input->post('jenisKelamin', true)),
    ];

    if ($dataProfile['gelarDepan']) {
      $gelarDepan = $dataProfile['gelarDepan'] . ' ';
    } else {
      $gelarDepan = "";
    }

    $namaLengkap = $dataProfile['namaLengkap'];

    if ($dataProfile['gelarBelakang']) {
      $gelarBelakang = ', ' . $dataProfile['gelarBelakang'];
    } else {
      $gelarBelakang = "";
    }

    $namaGelar = $gelarDepan . $namaLengkap . $gelarBelakang;

    $dataUser = [
      'username'         => htmlspecialchars($this->input->post('username', true)),
      'password'         => password_hash('#MerdekaBelajar!', PASSWORD_DEFAULT),
      'namaLengkap'      => $namaGelar,
      'role_id_1'        => htmlspecialchars($this->input->post('hakAkses1', true)),
      'role_id_2'        => htmlspecialchars($this->input->post('hakAkses2', true)),
      'is_active'        => htmlspecialchars($this->input->post('is_aktif', true)),
      'date_created'     => time(),
    ];

    if ($dataUser['role_id_1'] == 3) {
      $this->db->set('role_id_1', '1');
      $this->db->where('role_id_1', '3');
      $this->db->update('user_gtk');
    } elseif ($dataUser['role_id_1'] == 6) {
      $dataKelas = [
        'id'              => htmlspecialchars($this->input->post('kelas', true)),
        'walikelas'       => htmlspecialchars($this->input->post('username', true)),
      ];
    } elseif ($dataUser['role_id_1'] == 7) {
      $dataEkskul = [
        'id'              => htmlspecialchars($this->input->post('ekskul', true)),
        'pelatih'         => htmlspecialchars($this->input->post('username', true)),
      ];
    }

    if ($dataUser['role_id_2'] == 3) {
      $this->db->set('role_id_2', '1');
      $this->db->where('role_id_2', '3');
      $this->db->update('user_gtk');
    } elseif ($dataUser['role_id_2'] == 6) {
      $dataKelas = [
        'id'              => htmlspecialchars($this->input->post('kelas2', true)),
        'walikelas'       => htmlspecialchars($this->input->post('username', true)),
      ];
    } elseif ($dataUser['role_id_2'] == 7) {
      $dataEkskul = [
        'id'              => htmlspecialchars($this->input->post('ekskul2', true)),
        'pelatih'         => htmlspecialchars($this->input->post('username', true)),
      ];
    }

    $checkSession         = $this->session->userdata('username');

    if ($checkSession != $dataUser['username']) {
      $this->db->set(
        [
          'namaLengkap'     => $dataUser['namaLengkap'],
          'role_id_1'       => $dataUser['role_id_1'],
          'role_id_2'       => $dataUser['role_id_2'],
          'is_active'       => $dataUser['is_active'],
          'date_updated'    => time(),
        ]
      );
    } else {
      $this->db->set(
        [
          'namaLengkap'     => $dataUser['namaLengkap'],
          'date_updated'    => time(),
        ]
      );
    }

    $this->db->where('username', $dataUser['username']);
    $this->db->update('user_gtk');

    $this->db->set(
      [
        'namaLengkap'     => $dataProfile['namaLengkap'],
        'namaPanggil'     => $dataProfile['namaPanggil'],
        'gelarDepan'      => $dataProfile['gelarDepan'],
        'gelarBelakang'   => $dataProfile['gelarBelakang'],
        'jk'              => $dataProfile['jk'],
        'date_updated'    => time(),
      ]
    );
    $this->db->where('username', $dataProfile['username']);
    $this->db->update('profil_gtk');

    if ($dataKelas) {
      $this->db->set(
        [
          'walikelas'     => $dataKelas['walikelas'],
        ]
      );
      $this->db->where('id', $dataKelas['id']);
      $this->db->update('setting_kelas');
    }

    if ($dataEkskul) {
      $this->db->set(
        [
          'pelatih'     => $dataEkskul['pelatih'],
        ]
      );
      $this->db->where('id', $dataEkskul['id']);
      $this->db->update('setting_ekskul');
    }

    $this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['success'](
            'Akun " . $dataUser['username'] . " telah diperbarui !',
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
    if ($checkSession != $data['username']) {
      $this->db->delete('user_gtk', ['username' => $data['username']]);
      $this->db->delete('profil_gtk', ['username' => $data['username']]);
      $response['status']   = 'success';
      $response['judul']    = 'Berhasil !';
      $response['pesan']    = 'Akun ' . $data['username'] . ' Telah Dihapus!';
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
    $checkDataUser       = $this->db->get_where('user_gtk', ['username' => $data['username']]);
    $checkDataProfile    = $this->db->get_where('profil_gtk', ['username' => $data['username']]);
    if ($checkSession != $data['username']) {
      if ($checkDataUser->num_rows() == "1" && $checkDataProfile->num_rows() == "1") {
        $this->db->set('password', $data['password']);
        $this->db->where('username', $data['username']);
        $this->db->update('user_gtk');
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
    $checkData     = $this->db->get_where('user_gtk', ['username' => $data['username']]);
    $row           = $checkData->row_array();
    $checkSession  = $this->session->userdata('username');
    if ($checkSession != $row['username']) {
      if ($checkData->num_rows() == "1") {
        if ($row['is_active'] == "1") {
          $this->db->set('is_active', '0');
          $this->db->where('username', $data['username']);
          $this->db->update('user_gtk');
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
          $this->db->update('user_gtk');
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
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    $data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
    $data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
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
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    $data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
    $page = $this->input->post("page");
    $this->load->view($page, $data);
  }

  public function tambahAkunPD()
  {
    $dataTapel          = $this->modelApp->getTapelAktif();
    $tapel              = $dataTapel['id'];

    $dataProfile = [
      'id_tapel'        => $tapel,
      'id_kelas'        => htmlspecialchars($this->input->post('kelas', true)),
      'nisn'            => htmlspecialchars($this->input->post('nisn', true)),
      'namaLengkap'     => htmlspecialchars($this->input->post('namaLengkap', true)),
      'namaPanggil'     => htmlspecialchars($this->input->post('namaPanggil', true)),
      'jk'              => htmlspecialchars($this->input->post('jenisKelamin', true)),
      'tanggalLahir'    => htmlspecialchars($this->input->post('tanggalLahir', true)),
      'date_created'    => time(),
    ];

    $dataUser = [
      'nisn'            => htmlspecialchars($this->input->post('nisn', true)),
      'tanggalLahir'    => htmlspecialchars($this->input->post('tanggalLahir', true)),
      'namaLengkap'     => htmlspecialchars($this->input->post('namaLengkap', true)),
      'role_id'         => "12",
      'is_active'       => htmlspecialchars($this->input->post('is_aktif', true)),
      'date_created'    => time(),
    ];

    $checkDataUser       = $this->db->get_where('user_pd', ['nisn' => $dataUser['nisn']]);
    $checkDataProfile    = $this->db->get_where('profil_pd', ['nisn' => $dataProfile['nisn']]);
    if ($checkDataUser->num_rows() == "0" && $checkDataProfile->num_rows() == "0") {
      $this->db->insert('user_pd', $dataUser);
      $this->db->insert('profil_pd', $dataProfile);

      $this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['success'](
            'Akun " .  $dataUser['nisn'] . " Di Tambahkan !',
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
            'Akun " .  $dataUser['nisn'] . " Sudah Tersedia !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
    }
    redirect(base_url('settings/pd'));
  }

  public function exportTemplateAkunPD()
  {
    $dataServer         = $this->modelApp->getServerSetting();
    $namaAplikasi       = $dataServer['namaAplikasi'];
    $dataTapel          = $this->modelApp->getTapelAktif();
    $id_tapel           = $dataTapel['id'];
    $tapel              = $dataTapel['tapel'];
    $semester           = $dataTapel['semester'];
    $fileName           = "Template Import Akun Peserta Didik Tahun Pelajaran " . $tapel . " Semester " . $semester;

    header("Content-type: application/vnd.ms-excel");
    header('Content-Disposition: attachment; filename="' . $fileName . '.xlsx"');

    $spreadsheet = new Spreadsheet();
    $spreadsheet
      ->getProperties()
      ->setCreator($namaAplikasi)
      ->setLastModifiedBy($namaAplikasi)
      ->setTitle($fileName)
      ->setSubject($namaAplikasi)
      ->setDescription($namaAplikasi)
      ->setKeywords($namaAplikasi);

    $style_col = array(
      'font' => array('bold' => true),
      'alignment' => array(
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
      ),
      'borders' => array(
        'top' => array('style'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),
        'right' => array('style'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),
        'bottom' => array('style'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),
        'left' => array('style'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN)
      )
    );

    $sheet0 = $spreadsheet->getActiveSheet(0)->setTitle('PETUNJUK');
    $sheet0->mergeCells('A1:L2');
    $sheet0->getStyle('A1')->getFont()->setBold(TRUE);
    $sheet0->getStyle('A1')->getFont()->setSize(15);
    $sheet0->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet0->getStyle('A1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet0->setCellValue('A1', $fileName);

    $sheet0->mergeCells('A4:L4');
    $sheet0->getStyle('A4')->getFont()->setBold(TRUE);
    $sheet0->getStyle('A4')->getFont()->setSize(12);
    $sheet0->getStyle('A4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet0->getStyle('A4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet0->setCellValue('A4', "Petunjuk Pengisian");

    $sheet0->setCellValue('B6', "1. Sistem hanya akan memproses data pada SHEET DATA SISWA");
    $sheet0->setCellValue('B7', "2. Jangan ubah format dan isian tabel, anda hanya dapat mengisi pada cell berikut: ");
    $sheet0->setCellValue('C8', "a. CELL F4:F5 - ID KELAS");
    $sheet0->setCellValue('C9', "b. CELL A7 dst. - NISN");
    $sheet0->setCellValue('C10', "c. CELL B7 dst. - NIS");
    $sheet0->setCellValue('C11', "d. CELL C7 dst. - NAMA LENGKAP");
    $sheet0->setCellValue('C12', "e. CELL D7 dst. - NAMA PANGGIL");
    $sheet0->setCellValue('C13', "f. CELL E7 dst. - JENIS KELAMIN");
    $sheet0->setCellValue('C14', "g. CELL F7 dst. - TANGGAL LAHIR");
    $sheet0->setCellValue('B16', "3. Pengisian ID KELAS silahkan salin dari SHEET DATA KELAS");
    $sheet0->setCellValue('B17', "4. Pengisian JENIS KELAMIN hanya dapat menggunakan huruf L atau P");
    $sheet0->setCellValue('B18', "5. Pengisian TANGGAL LAHIR silahkan gunakan format (YYYY-MM-DD) Contoh 31 Desember 2022 maka isiannya 2022-12-31");
    $sheet0->setCellValue('B19', "6. Untuk mengurangi beban kerja server maka disarankan melakukan 1x import untuk 1 kelas");

    $sheet0->mergeCells('A21:L21');
    $sheet0->getStyle('A21')->getFont()->setBold(TRUE);
    $sheet0->getStyle('A21')->getFont()->setSize(12);
    $sheet0->getStyle('A21')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet0->getStyle('A21')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet0->setCellValue('A21', "Terimakasih telah menggunakan SIMS DigiSchool");

    $sheet1 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'DATA KELAS');
    $spreadsheet->addSheet($sheet1, 1);
    $sheet1->mergeCells('A1:E2');
    $sheet1->getStyle('A1')->getFont()->setBold(TRUE);
    $sheet1->getStyle('A1')->getFont()->setSize(15);
    $sheet1->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet1->getStyle('A1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet1->setCellValue('A1', $fileName);

    $sheet1->mergeCells('A4:E4');
    $sheet1->getStyle('A4')->getFont()->setBold(TRUE);
    $sheet1->getStyle('A4')->getFont()->setSize(12);
    $sheet1->getStyle('A4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet1->getStyle('A4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet1->setCellValue('A4', "DATA KELAS");

    $sheet1->setCellValue('A5', 'ID_KELAS');
    $sheet1->setCellValue('B5', 'LEVEL');
    $sheet1->setCellValue('C5', 'JURUSAN');
    $sheet1->setCellValue('D5', 'KELAS');
    $sheet1->setCellValue('E5', 'WALIKELAS');

    $sheet1->getStyle('A4')->applyFromArray($style_col);
    $sheet1->getStyle('A5')->applyFromArray($style_col);
    $sheet1->getStyle('B5')->applyFromArray($style_col);
    $sheet1->getStyle('C5')->applyFromArray($style_col);
    $sheet1->getStyle('D5')->applyFromArray($style_col);
    $sheet1->getStyle('E5')->applyFromArray($style_col);

    $sheet1->getColumnDimension('A')->setWidth(10);
    $sheet1->getColumnDimension('B')->setWidth(10);
    $sheet1->getColumnDimension('C')->setWidth(20);
    $sheet1->getColumnDimension('D')->setWidth(30);
    $sheet1->getColumnDimension('E')->setWidth(50);

    $dataKelas = $this->db->get('setting_kelas')->result_array();
    $no = 1;
    $numrow = 6;
    foreach ($dataKelas as $kelasData) {
      $id_kelas   = $kelasData['id'];
      $level      = $kelasData['level'];
      $jurusan    = $kelasData['jurusan'];
      $kelas      = $kelasData['kelas'];
      $walikelas  = $kelasData['walikelas'];
      if ($walikelas) {
        $dataUser      = $this->modelApp->getUserGTK($walikelas);
        $namaWalikelas = $dataUser['namaLengkap'];
      } else {
        $namaWalikelas = "";
      }
      $sheet1->setCellValueExplicit('A' . $numrow, $id_kelas, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet1->setCellValue('B' . $numrow, $level);
      $sheet1->setCellValue('C' . $numrow, $jurusan);
      $sheet1->setCellValue('D' . $numrow, $kelas);
      $sheet1->setCellValue('E' . $numrow, htmlspecialchars_decode($namaWalikelas, ENT_QUOTES));

      $no++;
      $numrow++;
    }

    $sheet2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'DATA SISWA');
    $spreadsheet->addSheet($sheet2, 2);
    $sheet2->mergeCells('A1:F2');
    $sheet2->getStyle('A1')->getFont()->setBold(TRUE);
    $sheet2->getStyle('A1')->getFont()->setSize(15);
    $sheet2->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet2->getStyle('A1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet2->setCellValue('A1', $fileName);

    $sheet2->setCellValue('A3', 'Tahun Pelajaran');
    $sheet2->setCellValue('A4', 'Semester');
    $sheet2->setCellValue('A5', 'ID');

    $sheet2->setCellValue('C3', $tapel);
    $sheet2->setCellValueExplicit('C4', $semester, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $sheet2->setCellValueExplicit('C5', $id_tapel, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);

    $sheet2->setCellValue('F3', 'ID_KELAS');
    $sheet2->mergeCells('F4:F5');
    $sheet2->getStyle('F4:F5')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('FFFF0000');

    $sheet2->setCellValue('A6', 'NISN');
    $sheet2->setCellValue('B6', 'NIS');
    $sheet2->setCellValue('C6', 'NAMA LENGKAP');
    $sheet2->setCellValue('D6', 'NAMA PANGGIL');
    $sheet2->setCellValue('E6', 'L/P');
    $sheet2->setCellValue('F6', 'TANGGAL LAHIR');

    $sheet2->getStyle('F3')->applyFromArray($style_col);
    $sheet2->getStyle('F4')->applyFromArray($style_col);
    $sheet2->getStyle('A6')->applyFromArray($style_col);
    $sheet2->getStyle('B6')->applyFromArray($style_col);
    $sheet2->getStyle('C6')->applyFromArray($style_col);
    $sheet2->getStyle('D6')->applyFromArray($style_col);
    $sheet2->getStyle('E6')->applyFromArray($style_col);
    $sheet2->getStyle('F6')->applyFromArray($style_col);

    $sheet2->getColumnDimension('A')->setWidth(20);
    $sheet2->getColumnDimension('B')->setWidth(20);
    $sheet2->getColumnDimension('C')->setWidth(50);
    $sheet2->getColumnDimension('D')->setWidth(25);
    $sheet2->getColumnDimension('E')->setWidth(5);
    $sheet2->getColumnDimension('F')->setWidth(20);

    $spreadsheet->setActiveSheetIndex(0);

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
  }

  public function importAkunPD()
  {
    $fileExcel                = $_FILES['fileExcelAkunPD']['name'];
    $config['file_name']      = $fileExcel;
    $config['allowed_types']  = 'xls|xlsx';
    $config['upload_path']    = './assets/files/temp/';

    $this->load->library('upload', $config);
    $this->upload->do_upload('fileExcelAkunPD');
    $file_data   = $this->upload->data();
    $file_name   = $config['upload_path'] . $file_data['file_name'];

    $extFile   = pathinfo($file_name, PATHINFO_EXTENSION);
    if ($extFile == 'xls') {
      $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
    } elseif ($extFile == 'xlsx') {
      $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }

    $spreadsheet  = $reader->load($file_name);
    $sheetData    = $spreadsheet->getSheet(2)->toArray();

    if (file_exists($file_name))
      unlink($file_name);

    $sheetCount   = count($sheetData);

    if ($sheetCount > 1) {
      for ($i = 6; $i < $sheetCount; $i++) {
        $id_tapel       = $sheetData[4][2];
        $id_kelas       = $sheetData[3][5];
        $nisn           = $sheetData[$i][0];
        $nis            = $sheetData[$i][1];
        $namaLengkap    = $sheetData[$i][2];
        $namaPanggil    = $sheetData[$i][3];
        $jk             = $sheetData[$i][4];
        $tanggalLahir   = $sheetData[$i][5];
        $dataProfile[] = [
          'id_tapel'     => $id_tapel,
          'id_kelas'     => $id_kelas,
          'nisn'         => $nisn,
          'nis'          => $nis,
          'namaLengkap'  => $namaLengkap,
          'namaPanggil'  => $namaPanggil,
          'jk'           => $jk,
          'tanggalLahir' => $tanggalLahir,
          'date_created' => time(),
        ];
        $dataUser[] = [
          'nisn'         => $nisn,
          'tanggalLahir' => $tanggalLahir,
          'namaLengkap'  => $namaLengkap,
          'role_id'      => "12",
          'is_active'    => "1",
          'date_created' => time(),
        ];
      }

      $queryProfil  = $this->db->insert_batch('profil_pd', $dataProfile);
      $queryUser    = $this->db->insert_batch('user_pd', $dataUser);
      if ($queryProfil && $queryUser) {
        $this->session->set_flashdata('toastr', "
          <script>
          $(window).on('load', function() {
            setTimeout(function() {
              toastr['success'](
                'Akun Peserta Didik Di Import !',
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
            toastr['success'](
              'Terdapat Duplikasi Data !',
              'Gagal !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
      }
    }
    redirect(base_url('settings/pd'));
  }

  public function resetDataPD()
  {
    $query      = "SELECT `nisn` FROM `user_pd`";
    $queryUser  = $this->db->query($query)->result_array();
    foreach ($queryUser as $rowUsername) {
      $this->db->delete('profil_pd', ['nisn' => $rowUsername['nisn']]);
      $this->db->delete('user_pd', ['nisn' => $rowUsername['nisn']]);
    }
    $response['status']   = 'success';
    $response['judul']    = 'Berhasil !';
    $response['pesan']    = 'Database Telah Direset!';
    echo json_encode($response);
  }

  public function editAkunPD()
  {
    $dataTapel          = $this->modelApp->getTapelAktif();
    $tapel              = $dataTapel['id'];

    $dataProfile = [
      'id_profil'       => htmlspecialchars($this->input->post('id_profil', true)),
      'id_tapel'        => $tapel,
      'id_kelas'        => htmlspecialchars($this->input->post('kelas', true)),
      'nisn'            => htmlspecialchars($this->input->post('nisn', true)),
      'namaLengkap'     => htmlspecialchars($this->input->post('namaLengkap', true)),
      'namaPanggil'     => htmlspecialchars($this->input->post('namaPanggil', true)),
      'jk'              => htmlspecialchars($this->input->post('jenisKelamin', true)),
      'tanggalLahir'    => htmlspecialchars($this->input->post('tanggalLahir', true)),
      'date_updated'    => time(),
    ];

    $dataUser = [
      'id_user'         => htmlspecialchars($this->input->post('id_user', true)),
      'id_kelas'        => htmlspecialchars($this->input->post('kelas', true)),
      'nisn'            => htmlspecialchars($this->input->post('nisn', true)),
      'tanggalLahir'    => htmlspecialchars($this->input->post('tanggalLahir', true)),
      'namaLengkap'     => htmlspecialchars($this->input->post('namaLengkap', true)),
      'role_id'         => "12",
      'is_active'       => htmlspecialchars($this->input->post('is_aktif', true)),
      'date_updated'    => time(),
    ];

    $checkDataUser       = $this->db->get_where('user_pd', ['id' => $dataUser['id_user']]);
    $checkDataProfile    = $this->db->get_where('profil_pd', ['id' => $dataProfile['id_profil']]);

    if ($checkDataUser->num_rows() == "1" && $checkDataProfile->num_rows() == "1") {
      $this->db->set(
        [
          'id_tapel'      => $dataProfile['id_tapel'],
          'id_kelas'      => $dataProfile['id_kelas'],
          'nisn'          => $dataProfile['nisn'],
          'namaLengkap'   => $dataProfile['namaLengkap'],
          'namaPanggil'   => $dataProfile['namaPanggil'],
          'jk'            => $dataProfile['jk'],
          'tanggalLahir'  => $dataProfile['tanggalLahir'],
          'date_updated'  => time(),
        ]
      );
      $this->db->where('id', $dataProfile['id_profil']);
      $this->db->update('profil_pd');

      $this->db->set(
        [
          'nisn'            => $dataUser['nisn'],
          'tanggalLahir'    => $dataUser['tanggalLahir'],
          'namaLengkap'     => $dataUser['namaLengkap'],
          'role_id'         => $dataUser['role_id'],
          'is_active'       => $dataUser['is_active'],
          'date_updated'    => time(),
        ]
      );
      $this->db->where('id', $dataUser['id_user']);
      $this->db->update('user_pd');

      $this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['success'](
            'Akun " .  $dataUser['nisn'] . " Di Perbarui !',
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
            'Akun " .  $dataUser['nisn'] . " Tidak Ditemukan !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
    }
    redirect(base_url('settings/pd'));
  }

  public function deleteAkunPD()
  {
    $data = [
      'nisn'   => htmlspecialchars($this->input->post('nisn', true)),
    ];
    $checkSession        = $this->session->userdata('nisn');
    if ($checkSession != $data['nisn']) {
      $this->db->delete('user_pd', ['nisn' => $data['nisn']]);
      $this->db->delete('profil_pd', ['nisn' => $data['nisn']]);
      $response['status']   = 'success';
      $response['judul']    = 'Berhasil !';
      $response['pesan']    = 'Akun ' . $data['nisn'] . ' Telah Dihapus!';
    } else {
      $response['status']   = 'error';
      $response['judul']    = 'Gagal !';
      $response['pesan']    = 'Akun ' . $data['nisn'] . ' Sedang Aktif!';
    }
    echo json_encode($response);
  }

  public function switchActivatePD()
  {
    $data = [
      'nisn'        => htmlspecialchars($this->input->post('nisn', true)),
      'is_active'   => htmlspecialchars($this->input->post('is_aktif', true)),
    ];
    $checkData     = $this->db->get_where('user_pd', ['nisn' => $data['nisn']]);
    $row           = $checkData->row_array();
    if ($checkData->num_rows() == "1") {
      if ($row['is_active'] == "1") {
        $this->db->set('is_active', '0');
        $this->db->where('nisn', $data['nisn']);
        $this->db->update('user_pd');
        $this->session->set_flashdata('toastr', "
          <script>
          $(window).on('load', function() {
            setTimeout(function() {
              toastr['success'](
                'Akun " .  $row['nisn'] . " Di Non-Aktifkan !',
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
        $this->db->where('nisn', $data['nisn']);
        $this->db->update('user_pd');
        $this->session->set_flashdata('toastr', "
          <script>
          $(window).on('load', function() {
            setTimeout(function() {
              toastr['success'](
                'Akun " .  $row['nisn'] . " Di Aktifkan !',
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
              'Akun " .  $row['nisn'] . " Tidak Tersedia !',
              'Gagal !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
    }
    redirect(base_url('settings/pd'));
  }

  public function db()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    $data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
    $data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
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
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    $data['profilGTK']     = $this->modelApp->getProfilGtk($data['sessionUser']);
    $page = $this->input->post("page");
    $this->load->view($page, $data);
  }
}
