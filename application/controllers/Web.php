<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
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
		$data['webSekolah'] = $this->modelApp->getWebSekolah();

		// Ambil nama kepala sekolah dari tabel user_gtk
		$data['kepalaSekolah'] = $this->db
			->where('role_id_1', 3)
			->or_where('role_id_2', 3)
			->get('user_gtk')
			->row();

		$this->load->view('web/header', $data);
		$this->load->view('web/home', $data);
		$this->load->view('web/footer', $data);
	}

	public function tentang()
	{
		$data['serverSetting'] = $this->modelApp->getServerSetting();
		$data['profilSekolah'] = $this->modelApp->getProfilSekolah();
		$data['webSekolah'] = $this->modelApp->getWebSekolah();
		$this->load->view('web/header', $data);
		$this->load->view('web/tentang', $data);
		$this->load->view('web/footer', $data);
	}
	public function sambutan()
	{
		$data['serverSetting'] = $this->modelApp->getServerSetting();
		$data['profilSekolah'] = $this->modelApp->getProfilSekolah();
		$data['webSekolah'] = $this->modelApp->getWebSekolah();
		// $this->load->view('web/header', $data);
		$this->load->view('web/sambutan', $data);
		// $this->load->view('web/footer', $data);
	}
}
