<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('App_model');
  }

  public function index()
  {
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $this->load->view('templates/header', $data);
    $this->load->view('welcome.php');
    $this->load->view('templates/footer');
  }

  public function gtk()
  {
    $this->form_validation->set_rules('username', 'Username', 'required|trim', [
      'required' => 'Username Tidak Boleh Kosong!',
      'trim' => 'Username Tidak Boleh Mengandung Spasi!',
      'is_unique' => 'Username Sudah Digunakan!'
    ]);

    $this->form_validation->set_rules('password', 'Password', 'required|trim', [
      'required' => 'Password Tidak Boleh Kosong!',
      'min_length' => 'Password Minimal 8 Karakter Huruf dan Angka!',
      'trim' => 'Password Tidak Boleh Mengandung Spasi!'
    ]);

    if ($this->form_validation->run() == false) {
      $data['serverSetting'] = $this->App_model->getServerSetting();
      $data['profilSekolah'] = $this->App_model->getProfilSekolah();
      $this->load->view('templates/header', $data);
      $this->load->view('auth/login-gtk', $data);
      $this->load->view('templates/modal', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $this->_login_gtk();
    }
  }

  private function _login_gtk()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['username' => $username])->row_array();

    if ($user) {
      if ($user['is_active'] == 1) {
        if (password_verify($password, $user['password'])) {
          $data = [
            'username' => $user['username'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          redirect(base_url('user'));
        } else {
          $this->session->set_flashdata('toastr', "
          <script>
          $(window).on('load', function() {
            setTimeout(function() {
              toastr['error'](
                'Password Salah !',
                'Gagal !', {
                  closeButton: true,
                  tapToDismiss: true
                }
              );
            }, 0);
          })
          </script>");
          $this->session->set_flashdata('notif', '
          <div class="alert alert-danger" role="alert">
              <h4 class="alert-heading">Password Salah !</h4>
              <div class="alert-body">
                Silahkan ulangi password atau hubungi tim IT/Operator !
              </div>
          </div>');
          redirect(base_url('auth/gtk'));
        }
      } else {
        $this->session->set_flashdata('toastr', "
        <script>
        $(window).on('load', function() {
          setTimeout(function() {
            toastr['error'](
              'Akun Tidak Aktif !',
              'Gagal !', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
        $this->session->set_flashdata('notif', '
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Akun tidak aktif !</h4>
            <div class="alert-body">
              Silahkan hubungi tim IT/Operator!
            </div>
        </div>');
        redirect(base_url('auth/gtk'));
      }
    } else {
      $this->session->set_flashdata('toastr', "
      <script>
      $(window).on('load', function() {
        setTimeout(function() {
          toastr['error'](
            'Akun tidak terdaftar !',
            'Gagal !', {
              closeButton: true,
              tapToDismiss: true
            }
          );
        }, 0);
      })
      </script>");
      $this->session->set_flashdata('notif', '
      <div class="alert alert-danger" role="alert">
          <h4 class="alert-heading">Akun tidak terdaftar !</h4>
          <div class="alert-body">
            Silahkan ulangi username atau hubungi tim IT/Operator!
          </div>
      </div>');
      redirect(base_url('auth/gtk'));
    }
  }

  public function forgotPass()
  {

    $serverSetting  = $this->App_model->getServerSetting();
    $profilSekolah  = $this->App_model->getProfilSekolah();
    $nama           = $this->input->post('modalForgotNama');
    $username       = $this->input->post('modalForgotUsername');
    $admin          = $this->input->post('modalForgotSelectAdmin');
    $hpAdmin        = $this->db->get_where('profil_gtk', ['id' => $admin])->row_array();
    $namaPanggil    = $hpAdmin['namaPanggil'];
    $jkKontakAdmin  = $hpAdmin['jk'];
    $hpKontakAdmin  = $hpAdmin['hp'];

    if ($jkKontakAdmin == "L") {
      $jkPanggilAdmin = "Pak";
    } else if ($jkKontakAdmin == "P") {
      $jkPanggilAdmin = "Bu";
    } else {
      $jkPanggilAdmin = "";
    }

    if ($hpKontakAdmin != null) {
      $teks = ("Hallo " . $jkPanggilAdmin . " " . $namaPanggil . " !\n\n" .
        "Saya *" . $nama . "*\n" .
        "Request Reset Akun *" . $username . "* untuk mengakses aplikasi " . $serverSetting['namaAplikasi'] . " " . $profilSekolah['namaSekolah'] . " terima kasih !");
      echo " 
            <textarea id='teks' disabled readonly>$teks</textarea>
            <script>
              var kontak = '$hpKontakAdmin';
              var teks = document.getElementById('teks').value;
              var url = 'https://wa.me/' + kontak + '?text=' + teks;
              var res = encodeURI(url);
              window.open(res);
              window.location.replace('gtk');
            </script>
            ";
      $this->session->set_flashdata('toastr', "
          <script>
          $(window).on('load', function() {
            setTimeout(function() {
              toastr['success'](
                'Pesan Terkirim !',
                'Berhasil !', {
                  closeButton: true,
                  tapToDismiss: true
                }
              );
            }, 0);
          })
          </script>");
      $this->session->set_flashdata('notif', '
          <div class="alert alert-warning" role="alert">
              <h4 class="alert-heading">Pesan Terkirim !</h4>
              <div class="alert-body">
                Jika pesan tidak terkirim, silahkan izinkan Pop Up dan Redirect pada browser anda kemudian ulangi permintaan reset password! 
              </div>
          </div>');
    } else {
      $this->session->set_flashdata('toastr', "
          <script>
          $(window).on('load', function() {
            setTimeout(function() {
              toastr['error'](
                'Pesan Tidak Terkirim !',
                'Gagal !', {
                  closeButton: true,
                  tapToDismiss: true
                }
              );
            }, 0);
          })
          </script>");
      $this->session->set_flashdata('notif', '
          <div class="alert alert-warning" role="alert">
              <h4 class="alert-heading">Pesan Tidak Terkirim !</h4>
              <div class="alert-body">
                Kontak tidak tersedia !
              </div>
          </div>');
      redirect(base_url('auth/gtk'));
    }
  }

  public function ppdb()
  {
    $this->form_validation->set_rules('username', 'Username', 'required|trim', [
      'required' => 'Username Tidak Boleh Kosong!',
      'trim' => 'Username Tidak Boleh Mengandung Spasi!',
      'is_unique' => 'Username Sudah Digunakan!'
    ]);

    $this->form_validation->set_rules('password', 'Password', 'required|trim', [
      'required' => 'Password Tidak Boleh Kosong!',
      'min_length' => 'Password Minimal 8 Karakter Huruf dan Angka!',
      'trim' => 'Password Tidak Boleh Mengandung Spasi!'
    ]);

    if ($this->form_validation->run() == false) {
      $data['serverSetting'] = $this->App_model->getServerSetting();
      $data['profilSekolah'] = $this->App_model->getProfilSekolah();
      $this->load->view('templates/header', $data);
      $this->load->view('auth/login-ppdb');
      $this->load->view('templates/footer');
    } else {
      $this->_login_ppdb();
    }
  }

  private function _login_ppdb()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['username' => $username])->row_array();

    if ($user) {
      if ($user['is_active'] == 1) {
        if (password_verify($password, $user['password'])) {
          $data = [
            'username' => $user['username'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          redirect(base_url('user'));
        } else {
          $this->session->set_flashdata('notif', '
          <div class="alert alert-danger" role="alert">
              <h4 class="alert-heading">Gagal !</h4>
              <div class="alert-body">
                Password Salah !
              </div>
          </div>');
          redirect(base_url('auth/gtk'));
        }
      } else {
        $this->session->set_flashdata('notif', '
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Gagal !</h4>
            <div class="alert-body">
              Akun Tidak Aktif !
            </div>
        </div>');
        redirect(base_url('auth/gtk'));
      }
    } else {
      $this->session->set_flashdata('notif', '
      <div class="alert alert-danger" role="alert">
          <h4 class="alert-heading">Gagal !</h4>
          <div class="alert-body">
            Akun Tidak terdaftar !
          </div>
      </div>');
      redirect(base_url('auth/gtk'));
    }
  }

  public function registration()
  {
    $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
      'required' => 'Username Tidak Boleh Kosong!',
      'trim' => 'Username Tidak Boleh Mengandung Spasi!',
      'is_unique' => 'Username Sudah Digunakan !'
    ]);

    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
      'required' => 'Password Tidak Boleh Kosong!',
      'min_length' => 'Password Minimal 8 Karakter Huruf dan Angka!',
      'trim' => 'Password Tidak Boleh Mengandung Spasi !'
    ]);

    if ($this->form_validation->run() == false) {
      $data['serverSetting'] = $this->App_model->getServerSetting();
      $data['profilSekolah'] = $this->App_model->getProfilSekolah();
      $this->load->view('templates/header', $data);
      $this->load->view('auth/registration');
      $this->load->view('templates/footer');
    } else {
      $data = [
        'username'      => htmlspecialchars($this->input->post('username', true)),
        'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'role_id'       =>  2,
        'is_active'     =>  1,
        'date_created'  => time()
      ];
      $this->db->insert('user', $data);
      $this->session->set_flashdata('notif', '
      <div class="alert alert-primary" role="alert">
          <h4 class="alert-heading">Berhasil !</h4>
          <div class="alert-body">
            Akun anda telah terdaftar! silahkan login untuk melanjutkan pendaftaran.
          </div>
      </div>');
      redirect(base_url('auth/ppdb'));
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('toastr', "
    <script>
    $(window).on('load', function() {
      setTimeout(function() {
        toastr['success'](
          'Anda telah keluar dari sistem !',
          'Berhasil !', {
            closeButton: true,
            tapToDismiss: true
          }
        );
      }, 0);
    })
    </script>");
    redirect(base_url('/'));
  }
}
