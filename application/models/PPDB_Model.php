<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PPDB_Model extends CI_Model
{
  function getPersuratan($tapel)
  {
    return $this->db->get_where('ppdb_tapel', ['tapel' => $tapel]);
  }

  function getKepalaSekolah($username)
  {
    return $this->db->get_where('profil_gtk', ['username' => $username]);
  }
}
