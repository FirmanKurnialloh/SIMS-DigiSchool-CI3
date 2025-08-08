<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web_Model extends CI_Model
{
	function getWeb()
	{
		return $this->db->get('web_sekolah')->row_array();
	}
}
