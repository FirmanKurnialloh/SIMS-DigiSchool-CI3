<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
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
}
