<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PPDB_Model extends CI_Model
{
  function getActiveTapel()
  {
    return $this->db->get_where('ppdb_tapel', ['is_active' => "1"])->row_array();
  }

  function getStatusRegister()
  {
    return $this->db->get_where('ppdb_tapel', ['is_active' => "1", 'is_active_reg1' => "1"])->row_array();
  }

  function getStatusDaftarUlang()
  {
    return $this->db->get_where('ppdb_tapel', ['is_active' => "1", 'is_active_reg2' => "1"])->row_array();
  }

  function getStatusPengumuman()
  {
    return $this->db->get_where('ppdb_tapel', ['is_active' => "1", 'is_active_result' => "1"])->row_array();
  }

  function getPersuratan($tapel)
  {
    return $this->db->get_where('ppdb_tapel', ['tapel' => $tapel]);
  }

  function getKepalaSekolah($username)
  {
    return $this->db->get_where('profil_gtk', ['username' => $username]);
  }
}
