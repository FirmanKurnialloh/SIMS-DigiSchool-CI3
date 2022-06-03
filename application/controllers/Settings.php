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
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/menu', $data);
    $this->load->view('settings/index', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('settings/ajax', $data);
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
}
