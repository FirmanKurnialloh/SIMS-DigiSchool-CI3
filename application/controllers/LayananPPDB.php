<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LayananPPDB extends CI_Controller
{
  protected $table  = 'ppdb_tapel';
  protected $pk     = 'id';
  protected $select = 'tapel';
  protected $order  = 'id';
  protected $sort   = 'asc';
  protected $where, $data;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('App_model', 'modelApp');
    $this->load->model('PPDB_Model', 'ModelPPDB');
    is_server_gtk_active();
    is_logged_in_as_gtk();
  }

  function setWhere($id)
  {
    return $this->where = [$this->pk => $id];
  }

  function getDataByID($id)
  {
    $this->setWhere($id);
    $getDataByID = $this->ModelPPDB->getDataByID($this->table, $this->where);
    var_dump($getDataByID);
  }

  public function setData($user)
  {
    return $this->data = ['tapel' => $user];
  }

  function simpan($user)
  {
    $this->setData($user);
    $simpan = $this->ModelPPDB->save($this->table, $this->data);
    if ($simpan) {
      echo "<script>alert('Data Berhasil Disimpan');</script>";
    } else {
      echo "<script>alert('Data Gagal Disimpan');</script>";
    }
    var_dump($simpan);
  }

  function edit($id, $user)
  {
    $this->setWhere($id);
    $this->setData($user);
    $edit = $this->ModelPPDB->update($this->table, $this->data, $this->where);
    if ($edit) {
      echo "<script>alert('Data Berhasil Diedit');</script>";
    } else {
      echo "<script>alert('Data Gagal Diedit');</script>";
    }
  }

  function hapus($id)
  {
    $this->setWhere($id);
    $hapus = $this->ModelPPDB->delete($this->table, $this->where);
    if ($hapus) {
      echo "<script>alert('Data Berhasil Dihapus');</script>";
    } else {
      echo "<script>alert('Data Gagal Dihapus');</script>";
    }
  }

  public function index()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    if ($data['sessionRole1'] != "1" || $data['sessionRole1'] != "1") {
      is_ppdb_active();
    }
    $data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
    $data['profilGTK']     = $this->modelApp->getProfilGTK($data['sessionUser']);
    $data['pageCollumn']   = "1-column";
    $data['page']          = "Layanan PPDB";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    // $this->load->view('gtk/ppdb/menu', $data);
    $this->load->view('gtk/ppdb/dashboard', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
  }

  public function settings()
  {
    $data['sessionUser']   = $this->session->userdata('username');
    $data['sessionRole1']  = $this->session->userdata('role_id_1');
    $data['sessionRole2']  = $this->session->userdata('role_id_2');
    $data['is_change']     = $this->session->userdata('is_change');
    $data['serverSetting'] = $this->modelApp->getServerSetting();
    $data['profilSekolah'] = $this->modelApp->getProfilSekolah();
    $data['tapelAktif']    = $this->modelApp->getTapelAktif();
    if ($data['sessionRole1'] != "1" || $data['sessionRole1'] != "1") {
      is_ppdb_active();
    }
    $data['userGTK']       = $this->modelApp->getUserGTK($data['sessionUser']);
    $data['profilGTK']     = $this->modelApp->getProfilGTK($data['sessionUser']);
    $data['pageCollumn']   = "0-column";
    $data['page']          = "Modul PPDB";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('settings/menu', $data);
    $this->load->view('gtk/ppdb/settings', $data);
    $this->load->view('templates/modal', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('gtk/ppdb/ajax', $data);
  }
}
