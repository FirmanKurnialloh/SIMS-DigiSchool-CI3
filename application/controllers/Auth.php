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
      $this->load->view('auth/login');
      $this->load->view('templates/footer');
    } else {
      $this->_login();
    }
  }

  private function _login()
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
          redirect(base_url('auth'));
        }
      } else {
        $this->session->set_flashdata('notif', '
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Gagal !</h4>
            <div class="alert-body">
              Akun Tidak Aktif !
            </div>
        </div>');
        redirect(base_url('auth'));
      }
    } else {
      $this->session->set_flashdata('notif', '
      <div class="alert alert-danger" role="alert">
          <h4 class="alert-heading">Gagal !</h4>
          <div class="alert-body">
            Akun Tidak terdaftar !
          </div>
      </div>');
      redirect(base_url('auth'));
    }
  }

  public function ppdb()
  {
    echo "k";
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
          <h4 class="alert-heading">Selamat !</h4>
          <div class="alert-body">
            Akun anda telah terdaftar! silahkan login untuk melanjutkan pendaftaran.
          </div>
      </div>');
      redirect(base_url('auth'));
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('notif', '
    <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading">Berhasil !</h4>
        <div class="alert-body">
          Anda Berhasil Logout!
        </div>
    </div>');
    redirect(base_url('/'));
  }
}
