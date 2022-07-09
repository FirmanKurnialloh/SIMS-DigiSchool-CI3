<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('App_model', 'modelApp');
  }

  public function index()
  {
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $this->load->view('templates/auth_header', $data);
    $this->load->view('welcome');
    $this->load->view('templates/auth_footer');
  }

  public function gtk()
  {
    if ($this->session->userdata('username')) {
      redirect(base_url('gtk'));
    }
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
      $data['serverSetting'] = $this->modelApp->getServerSetting();
      $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
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
    $user     = $this->modelApp->getUserGTK($username);

    if ($user) {
      if ($user['is_active'] == 1) {
        if (password_verify($password, $user['password'])) {
          if (password_verify('#MerdekaBelajar!', $user['password'])) {
            $data = [
              'username'  => $user['username'],
              'role_id_1' => $user['role_id_1'],
              'role_id_2' => $user['role_id_2'],
              'is_change' => '1',
            ];
          } else {
            $data = [
              'username'  => $user['username'],
              'role_id_1' => $user['role_id_1'],
              'role_id_2' => $user['role_id_2'],
              'is_change' => '0',
            ];
          }
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
    $serverSetting  = $this->modelApp->getServerSetting();
    $namaAplikasi   = $serverSetting['namaAplikasi'];

    $profilSekolah  = $this->modelApp->getProfilSekolah();
    $namaSekolah    = $profilSekolah['namaSekolah'];

    $nama           = $this->input->post('modalForgotGTKNama');
    $username       = $this->input->post('modalForgotGTKUsername');
    $adminUsername  = $this->input->post('modalForgotGTKSelectAdmin');
    $adminProfil    = $this->modelApp->getProfilGTK($adminUsername);
    $namaPanggil    = $adminProfil['namaPanggil'];
    $jkKontakAdmin  = $adminProfil['jk'];
    $hpKontakAdmin  = $adminProfil['hp'];

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
        "Request Reset Akun *" . $username . "* untuk mengakses aplikasi " . $namaAplikasi . " " . $namaSekolah . " terima kasih !");
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
    if ($this->session->userdata('nisn') && $this->session->userdata('role_id')) {
      redirect(base_url('pd'));
    }
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $this->load->view('templates/auth_header', $data);
    $this->load->view('auth/login-pd', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/auth_footer', $data);
    $this->load->view('auth/login-pd-ajax', $data);
  }

  public function pdLoginNISN()
  {
    is_server_pd_active();
    $nisn     = $this->input->post('nisn');
    $userPD   = $this->modelApp->getUserPD($nisn);
    if ($userPD) {
      $dataUser = [
        'nisn'      => $userPD['nisn'],
      ];
      $this->session->set_userdata($dataUser);
      $dataProfil   = $this->modelApp->getProfilPd($nisn);
      if ($dataProfil) {
        $jk    = jenisKelamin($dataProfil['jk']);
        $kelas = getKelas($dataProfil['id_kelas']);
        $kelas = $kelas['kelas'];
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
              <h6>" . $jk . "</h6>
              <div class='badge badge-light-primary profile-badge'>" . $kelas . "</div>
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
    $sessionNISN    = $this->session->userdata('nisn');
    if ($postNISN == $sessionNISN) {
      $dataUser     = $this->db->get_where('user_pd', ['nisn' => $sessionNISN])->row_array();
      if ($dataUser) {
        $data['serverSetting'] = $this->modelApp->getServerSetting();
        $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
        $data['profilPD']      = $this->modelApp->getProfilPd($sessionNISN);
        $data['kelas']         = $this->modelApp->getKelas($data['profilPD']['id_kelas']);
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login-pd-confirm', $data);
        $this->load->view('templates/modal', $data);
        $this->load->view('templates/auth_footer', $data);
        $this->load->view('auth/login-pd-ajax', $data);
      } else {
        $this->session->unset_userdata('nisn');
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
      $this->session->unset_userdata('nisn');
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
    $sessionNISN      = $this->session->userdata('nisn');
    $dataUser         = $this->db->get_where('user_pd', ['nisn' => $sessionNISN, 'tanggalLahir' => $postTanggalLahir])->row_array();
    if ($dataUser) {
      $data['serverSetting'] = $this->modelApp->getServerSetting();
      $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
      $dataUser = [
        'nisn'      => $dataUser['nisn'],
        'role_id'   => $dataUser['role_id'],
      ];
      $this->session->set_userdata($dataUser);
      $dataProfil = $this->db->get_where('profil_pd', ['nisn' => $sessionNISN, 'tanggalLahir' => $postTanggalLahir])->row_array();
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
          <h3 class='display-1 text-success text-center myicon'><i data-feather='alert-triangle'></i></h3>
          <h3 class='display-0 text-success text-center'>Tanggal Lahir Benar! <br> Lengkapi Profil !</h3>
          <div class='d-flex justify-content-center pt-1'>
            <a href='" . base_url('pd/dashboard') . "' class='btn btn-sm btn-success w-100'>Lanjutkan</a>
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
      <h3 class='display-1 text-danger text-center myicon'><i data-feather='x-circle'></i></h3>
      <h3 class='display-0 text-danger text-center'>Tanggal Lahir Salah!</h3>
      ";
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('nisn');
    $this->session->unset_userdata('role_id');
    $this->session->unset_userdata('role_id_1');
    $this->session->unset_userdata('role_id_2');
    $this->session->unset_userdata('is_change');
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
