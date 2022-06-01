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
    $this->load->view('templates/auth_header', $data);
    $this->load->view('welcome.php');
    $this->load->view('templates/auth_footer');
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
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login-gtk', $data);
      $this->load->view('templates/modal', $data);
      $this->load->view('templates/auth_footer', $data);
    } else {
      $this->_login_gtk();
    }
  }

  private function _login_gtk()
  {
    is_server_gtk_active();
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
          $this->session->set_flashdata('toastr', "
          <script>
          $(window).on('load', function() {
            setTimeout(function() {
              toastr['success'](
                'Selamat Beraktifitas !',
                'Hai ! 👋', {
                  closeButton: true,
                  tapToDismiss: true
                }
              );
            }, 0);
          })
          </script>");
          redirect(base_url('gtk/dashboard'));
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

  public function forgotPassGTK()
  {

    $serverSetting  = $this->App_model->getServerSetting();
    $profilSekolah  = $this->App_model->getProfilSekolah();
    $nama           = $this->input->post('modalForgotGTKNama');
    $username       = $this->input->post('modalForgotGTKUsername');
    $admin          = $this->input->post('modalForgotGTKSelectAdmin');
    $hpAdmin        = $this->db->get_where('profil_gtk', ['username' => $admin])->row_array();
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

  public function pd()
  {
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $this->load->view('templates/auth_header', $data);
    $this->load->view('auth/login-pd', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/auth_footer', $data);
    $this->load->view('auth/login-pd-ajax', $data);
  }

  public function pdLoginNISN()
  {
    is_server_pd_active();
    $nisn           = $this->input->post('nisn');
    $dataUser       = $this->db->get_where('user', ['username' => $nisn])->row_array();
    if ($dataUser) {
      if ($dataUser['is_active'] == 1) {
        $dataUser = [
          'username'  => $dataUser['username'],
          'role_id'   => $dataUser['role_id']
        ];
        $this->session->set_userdata($dataUser);
        $dataProfil     = $this->db->get_where('profil_pd', ['nisn' => $dataUser['username']])->row_array();
        if ($dataProfil) {
          if ($dataProfil['jk'] == "L") {
            $jkPanjang = "Laki - Laki";
            $jkPanggil = "Bapak";
          } else {
            $jkPanjang = "Laki - Laki";
            $jkPanggil = "Bapak";
          }
          echo "
          <div class='card card-profile shadow-none bg-transparent border-primary'>
            <img src='" . base_url('assets/') . "files/images/logo/banner-login.png' class='img-fluid card-img-top' alt='Profile Cover Photo' />
            <div class='card-body'>
              <div class='profile-image-wrapper'>
                <div class='profile-image'>
                  <div class='avatar'>
                    <img src='" . base_url('assets/') . "files/images/logo/pd-square.png' alt='Profile Picture' />
                  </div>
                </div>
              </div>
              <h5>" . $dataProfil['namaLengkap'] . "</h5>
              <h6>" . $jkPanjang . "</h6>
              <div class='badge badge-light-primary profile-badge'>" . $dataProfil['kelas'] . "</div>
              <hr class='mb-0' />
              <h5>Apakah Data Sudah Benar ?</h5>
              <div class='d-flex justify-content-between'>
                <a href='" . base_url('auth/pd') . "' class='btn btn-sm btn-danger'>Data Salah</a>
                <button type='submit' class='btn btn-sm btn-success'>Data Benar</button>
              </div>
            </div>
          </div>
        ";
        } else {
          echo "
          <script>      
            $(document).ready(function() {
              if (feather) {
                feather.replace({
                  width: 14,
                  height: 14
                });
              }
            })
          </script>
          <div class='card card-profile shadow-none bg-transparent border-primary'>
            <img src='" . base_url('assets/') . "files/images/logo/banner-login.png' class='img-fluid card-img-top' alt='Profile Cover Photo' />
            <div class='card-body'>
              <div class='profile-image-wrapper'>
                <div class='profile-image'>
                  <div class='avatar'>
                  <img src='" . base_url('assets/') . "files/images/logo/pd-square.png' alt='Profile Picture' />
                  </div>
                </div>
              </div>
              <h3 class='display-0 text-warning text-center'>Akun Tidak Memiliki Profil !</h3>
              <h5>Silahkan lengkapi profil !</h5>
              <div class='d-flex justify-content-center pt-1'>
                <button type='submit' class='btn btn-sm btn-primary'>Lanjutkan</button>
              </div>
            </div>
          </div>
          ";
        }
      } else {
        echo "
        <script>      
          $(document).ready(function() {
            if (feather) {
              feather.replace({
                width: 14,
                height: 14
              });
            }
          })
        </script>
        <div class='card card-profile shadow-none bg-transparent border-primary'>
            <img src='" . base_url('assets/') . "files/images/logo/banner-login.png' class='img-fluid card-img-top' alt='Profile Cover Photo' />
            <div class='card-body'>
              <div class='profile-image-wrapper'>
                <div class='profile-image'>
                  <div class='avatar'>
                  <img src='" . base_url('assets/') . "files/images/logo/pd-square.png' alt='Profile Picture' />
                  </div>
                </div>
              </div>
              <h3 class='display-0 text-warning text-center'>Akun Tidak Aktif !</h3>
              <h5>Silahkan hubungi admin !</h5>
              <div class='d-flex justify-content-center pt-1'>
                <a href'javascript:void(0);' data-bs-toggle='modal' data-bs-target='#modalReaktivasiPD' class='btn btn-sm btn-success'>Hubungi Admin</a>
              </div>
            </div>
          </div>
        ";
      }
    } else {
      echo "
      <script>      
        $(document).ready(function() {
          if (feather) {
            feather.replace({
              width: 14,
              height: 14
            });
          }
        })
      </script>
      <div class='card text-center shadow-none bg-transparent border-primary'>
        <div class='card-body'>
          <h3 class='display-1 text-danger text-center myicon'><i data-feather='x-circle'></i></h3>
          <h3 class='display-0 text-danger text-center'>Akun Tidak Ditemukan!</h3>
          <div class='d-flex justify-content-between pt-1'>
            <a href='" . base_url('auth/pd') . "' class='btn btn-sm btn-danger'>Ulangi</a>
            <a href='" . base_url('auth/registration') . "' class='btn btn-sm btn-primary'>Daftar Baru</a>
          </div>
        </div>
      </div>
    ";
    }
  }

  public function pdLoginConfirm()
  {
    $postNISN       = $this->input->post('loginNISN');
    $sessionNISN    = $this->session->userdata('username');
    $sessionROLE    = $this->session->userdata('role_id');
    if ($postNISN == $sessionNISN) {
      $dataUser     = $this->db->get_where('user', ['username' => $sessionNISN, 'role_id' => $sessionROLE])->row_array();
      if ($dataUser) {
        $data['serverSetting'] = $this->App_model->getServerSetting();
        $data['profilSekolah'] = $this->App_model->getProfilSekolah();
        $data['profilPD']      = $this->db->get_where('profil_pd', ['nisn' => $dataUser['username']])->row_array();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login-pd-confirm', $data);
        $this->load->view('templates/modal', $data);
        $this->load->view('templates/auth_footer', $data);
        $this->load->view('auth/login-pd-ajax', $data);
      } else {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('toastr', "
                <script>
                $(window).on('load', function() {
                  setTimeout(function() {
                    toastr['error'](
                      'Terdapat Kesalahan !',
                      'Gagal !', {
                        closeButton: true,
                        tapToDismiss: true
                      }
                    );
                  }, 0);
                })
                </script>");
        redirect(base_url('/'));
      }
    } else {
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('role_id');
      $this->session->set_flashdata('toastr', "
              <script>
              $(window).on('load', function() {
                setTimeout(function() {
                  toastr['error'](
                    'Silahkan Login Kembali !',
                    'Sesi Habis !', {
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

  public function pdLoginConfirmVerify()
  {
    $postTanggalLahir = $this->input->post('data');
    $sessionNISN      = $this->session->userdata('username');
    $sessionROLE      = $this->session->userdata('role_id');
    $dataUser         = $this->db->get_where('user', ['username' => $sessionNISN, 'role_id' => $sessionROLE])->row_array();
    if ($dataUser) {
      $data['serverSetting'] = $this->App_model->getServerSetting();
      $data['profilSekolah'] = $this->App_model->getProfilSekolah();
      $dataProfil            = $this->db->get_where('profil_pd', ['nisn' => $sessionNISN, 'tanggalLahir' => $postTanggalLahir])->row_array();
      if ($dataProfil) {
        $this->session->set_flashdata('toastr', "
        <script>
        $(window).on('load', function() {
          setTimeout(function() {
            toastr['success'](
              'Selamat Beraktifitas !',
              'Hai ! 👋', {
                closeButton: true,
                tapToDismiss: true
              }
            );
          }, 0);
        })
        </script>");
        echo "
          <script>      
            $(document).ready(function() {
              if (feather) {
                feather.replace({
                  width: 14,
                  height: 14
                });
              }
            })
          </script>           
          <h3 class='display-1 text-success text-center myicon'><i data-feather='check-circle'></i></h3>
          <h3 class='display-0 text-success text-center'>Tanggal Lahir Benar!</h3>
          <div class='d-flex justify-content-center pt-1'>
            <a href='" . base_url('pd/dashboard') . "' class='btn btn-sm btn-success w-100'>Lanjutkan</a>
          </div>
          ";
      } else {
        echo "
          <script>      
            $(document).ready(function() {
              if (feather) {
                feather.replace({
                  width: 14,
                  height: 14
                });
              }
            })
          </script>
          <h3 class='display-1 text-danger text-center myicon'><i data-feather='x-circle'></i></h3>
          <h3 class='display-0 text-danger text-center'>Tanggal Lahir Salah!</h3>
          ";
      }
    } else {
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('role_id');
      $this->session->set_flashdata('toastr', "
              <script>
              $(window).on('load', function() {
                setTimeout(function() {
                  toastr['error'](
                    'Terdapat Kesalahan !',
                    'Gagal !', {
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
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login-ppdb');
      $this->load->view('templates/auth_footer');
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
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registration');
      $this->load->view('templates/auth_footer');
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
