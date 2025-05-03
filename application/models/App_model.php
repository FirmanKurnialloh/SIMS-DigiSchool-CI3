<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App_model extends CI_Model
{
	public function getServerSetting()
	{
		return $this->db->get('setting_server')->row_array();
	}

	public function getProfilSekolah()
	{
		return $this->db->get('profil_sekolah')->row_array();
	}

	public function getTapel()
	{
		return $this->db->get('setting_tapel')->row_array();
	}

	public function getTapelAktif()
	{
		return $this->db->get_where('setting_tapel', ['is_aktif' => '1'])->row_array();
	}

	public function getMapel()
	{
		return $this->db->get('setting_mapel')->row_array();
	}

	public function getEkskul()
	{
		return $this->db->get('setting_ekskul')->row_array();
	}

	public function getKelas()
	{
		return $this->db->get('setting_kelas')->row_array();
	}

	public function getUserGTK($username)
	{
		return $this->db->get_where('user_gtk', ['username' => $username])->row_array();
	}

	public function getProfilGTK($username)
	{
		return $this->db->get_where('profil_gtk', ['username' => $username])->row_array();
	}

	public function getUserPD($nisn)
	{
		return $this->db->get_where('user_pd', ['nisn' => $nisn])->row_array();
	}

	public function getProfilPd($nisn)
	{
		return $this->db->get_where('profil_pd', ['nisn' => $nisn])->row_array();
	}
}
