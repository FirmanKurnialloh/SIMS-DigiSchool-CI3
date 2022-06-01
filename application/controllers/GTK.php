<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GTK extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('App_model');
    is_logged_in_as_gtk();
  }

  public function dashboard()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole']   = $this->session->userdata('role_id');
    $data['serverSetting'] = $this->App_model->getServerSetting();
    $data['profilSekolah'] = $this->App_model->getProfilSekolah();
    $data['profilGTK']     = $this->db->get_where('profil_gtk', ['username' => $data['sessionUser']])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('gtk/dashboard.php', $data);
    $this->load->view('templates/footer', $data);
  }
}
