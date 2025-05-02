<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pd extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'modelApp');
		is_server_pd_active();
		is_logged_in_as_pd();
	}

	public function index()
	{
		redirect(base_url('pd/dashboard'));
	}

	public function dashboard()
	{
		$data['sessionUser']   = $this->session->userdata('username');
		$data['sessionRole1']  = $this->session->userdata('role_id_1');
		$data['sessionRole2']  = $this->session->userdata('role_id_2');
		$data['is_change']     = $this->session->userdata('is_change');
		$data['serverSetting'] = $this->modelApp->getServerSetting();
		$data['profilSekolah'] = $this->modelApp->getProfilSekolah();
		$data['tapelAktif']    = $this->modelApp->getTapelAktif();
		$data['profilPd']     = $this->modelApp->getProfilPd($data['sessionUser']);
		$data['userPd']       = $this->modelApp->getUserPd($data['sessionUser']);
		$data['pageCollumn']   = "1-column";
		// $this->load->view('pd/header', $data);
		$this->load->view('pd/navbar', $data);
		$this->load->view('pd/dashboard', $data);
		// $this->load->view('pd/modal', $data);
		// $this->load->view('pd/footer', $data);
	}
}
