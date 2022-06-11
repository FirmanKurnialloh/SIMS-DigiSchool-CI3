<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PPDB_Model extends CI_Model
{
  function getData($table, $select, $sort, $urut)
  {
    $this->db->from($table);
    $this->db->select($select);
    $this->db->order_by($sort, $urut);

    return $this->db->get()->result();
  }

  public function getDataByID($table, $where)
  {
    $this->db->from($table);
    $this->db->where($where);

    return $this->db->get()->row();
  }

  public function save($table, $data)
  {
    $this->db->insert($table, $data);
    return true;
  }

  public function update($table, $data, $where)
  {
    $this->db->update($table, $data, $where);
    return true;
  }

  public function delete($table, $where)
  {
    $this->db->delete($table, $where);
    return true;
  }
}
