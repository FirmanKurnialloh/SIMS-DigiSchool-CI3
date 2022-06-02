<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gtk extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('App_model');
    is_server_gtk_active();
    is_logged_in_as_gtk();
  }

  public function index()
  {
    redirect(base_url('gtk/dashboard'));
  }

  public function dashboard()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('gtk/dashboard', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
  }

  public function profil()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('gtk/profil', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
  }

  public function akun()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['tapelAktif']    = $this->App_model->getTapelAktif();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $data['userGTK']     = $this->db->get_where('user', ['username' => $data['sessionUser']])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('gtk/akun', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
  }

  public function editProfil()
  {
    $username       = $this->session->userdata('username');

    $fotoGTK        = $_FILES['fotoGTK']['name'];
    $namaLengkap    = $this->input->post('namaLengkap');
    $namaPanggil    = $this->input->post('namaPanggil');
    $gelarDepan     = $this->input->post('gelarDepan');
    $gelarBelakang  = $this->input->post('gelarBelakang');
    $jenisKelamin   = $this->input->post('jenisKelamin');
    $nik            = $this->input->post('nik');
    $nukg           = $this->input->post('nukg');
    $nuptk          = $this->input->post('nuptk');
    $nip            = $this->input->post('nip');

    if ($fotoGTK) {
      $file_name                = str_replace(' ', '_', $namaLengkap);
      $file_name                = str_replace('.', '_', $file_name);
      $config['file_name']      = $file_name;
      $extName                  = explode('.', $fotoGTK);
      $extName                  = strtolower(end($extName));
      $new_filename             = $file_name . '.' . $extName;

      $config['allowed_types']  = 'jpeg|jpg|png';
      $config['max_size']       = '1024';
      $config['upload_path']    = './assets/files/images/fotoGuru/';

      $old_foto  = $this->db->get_where('profil_gtk', ['username' => $username])->row_array();
      $old_image = $old_foto['foto'];
      if ($old_image != null) {
        unlink(FCPATH . 'assets/files/images/fotoGuru/' . $new_filename);
      }

      var_dump($old_image);
      var_dump($new_filename);

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('fotoGTK')) {
        $this->db->set('foto', $new_filename);
      } else {
        echo $this->upload->display_errors();
      }
    }

    if ($namaLengkap) {
      $this->db->set(
        [
          'namaLengkap'     => $namaLengkap,
          'namaPanggil'     => $namaPanggil,
          'gelarDepan'      => $gelarDepan,
          'gelarBelakang'   => $gelarBelakang,
          'jk'              => $jenisKelamin,
          'nik'             => $nik,
          'nukg'            => $nukg,
          'nuptk'           => $nuptk,
          'nip'             => $nip
        ]
      );
    }

    $this->db->where('username', $username);
    $this->db->update('profil_gtk');
    $this->session->set_flashdata('toastr', "
    <script>
    $(window).on('load', function() {
      setTimeout(function() {
        toastr['success'](
          'Profil anda telah diperbarui !',
          'Berhasil !', {
            closeButton: true,
            tapToDismiss: true
          }
        );
      }, 0);
    })
    </script>");
    redirect(base_url('gtk/profil'));
  }

  public function editAkun()
  {
    $username       = $this->session->userdata('username');
    $password       = $this->input->post('password');
    $password2      = $this->input->post('password2');
    // var_dump($password);
    // die;
    if ($password) {
      if ($password == $password2) {
        $this->db->set('password', $password);
        $this->db->where('username', $username);
        $this->db->update('user');

        $this->session->set_flashdata('toastr', "
        <script>
        $(window).on('load', function() {
          setTimeout(function() {
            toastr['error'](
              'Akun anda berhasil diperbarui !',
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
              'Akun anda tidak diperbarui !',
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
    redirect(base_url('gtk/akun'));
  }
}
