<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CustomErrorPage extends CI_Controller
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
    $this->output->set_status_header('404');
    $this->load->view('errors/custom/error', $data);
  }
}
