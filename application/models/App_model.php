<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');


class App_model extends CI_Model
{
  public function getServerSetting()
  {
    return $this->db->get('setting_server')->row_array();
  }
}
