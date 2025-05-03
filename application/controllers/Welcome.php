<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
		$this->load->view('welcome', $data);
		$this->load->view('templates/auth_footer');
	}
}
