<?php
defined('BASEPATH') or exit('No direct script access allowed');

# LOGIC HELPER
// Check Server
function is_server_gtk_active()
{
  $ci = get_instance();
  $ci->load->model('App_model');
  $checkServerGTK = $ci->App_model->getServerSetting('loginGuru');
  $serverGTK = $checkServerGTK['loginGuru'];
  if ($serverGTK != 1) {
    $ci->session->set_flashdata('toastr', "
            <script>
            $(window).on('load', function() {
              setTimeout(function() {
                toastr['error'](
                  'Silahkan kembali dalam beberapa waktu kedepan!',
                  'Server Ditutup !', {
                    closeButton: true,
                    tapToDismiss: true
                  }
                );
              }, 0);
            })
            </script>");
    $ci->session->unset_userdata('username');
    $ci->session->unset_userdata('role_id');
    redirect(base_url('/'));
  }
}

function is_server_pd_active()
{
  $ci = get_instance();
  $ci->load->model('App_model');
  $checkServerPD = $ci->App_model->getServerSetting('loginSiswa');
  $serverPD = $checkServerPD['loginSiswa'];
  if ($serverPD != 1) {
    $ci->session->set_flashdata('toastr', "
            <script>
            $(window).on('load', function() {
              setTimeout(function() {
                toastr['error'](
                  'Silahkan kembali dalam beberapa waktu kedepan!',
                  'Server Ditutup !', {
                    closeButton: true,
                    tapToDismiss: true
                  }
                );
              }, 0);
            })
            </script>");
    $ci->session->unset_userdata('username');
    $ci->session->unset_userdata('role_id');
    redirect(base_url('/'));
  }
}

// Check Login
function is_logged_in_as_gtk()
{
  $ci = get_instance();
  $role_id_1 = $ci->session->userdata('role_id_1');
  $role_id_2 = $ci->session->userdata('role_id_2');
  if (!$role_id_1) {
    $ci->session->set_flashdata('toastr', "
            <script>
            $(window).on('load', function() {
              setTimeout(function() {
                toastr['error'](
                  'Silahkan Login Kembali !',
                  'Sesi Habis !', {
                    closeButton: true,
                    tapToDismiss: true
                  }
                );
              }, 0);
            })
            </script>");
    $ci->session->unset_userdata('username');
    $ci->session->unset_userdata('role_id_1');
    $ci->session->unset_userdata('role_id_2');
    redirect(base_url('/'));
  } else {
    if (!$role_id_1 > '9' || !$role_id_2 > '9') {
      $ci->session->set_flashdata('toastr', "
              <script>
              $(window).on('load', function() {
                setTimeout(function() {
                  toastr['error'](
                    'Silahkan Login Kembali !',
                    'Sesi Habis !', {
                      closeButton: true,
                      tapToDismiss: true
                    }
                  );
                }, 0);
              })
              </script>");
      $ci->session->unset_userdata('username');
      $ci->session->unset_userdata('role_id_1');
      $ci->session->unset_userdata('role_id_2');
      redirect(base_url('/'));
    }
  }
}

function is_logged_in_as_pd()
{
  $ci = get_instance();
  $role_id = $ci->session->userdata('role_id');
  if (!$role_id) {
    $ci->session->set_flashdata('toastr', "
            <script>
            $(window).on('load', function() {
              setTimeout(function() {
                toastr['error'](
                  'Silahkan Login Kembali !',
                  'Sesi Habis !', {
                    closeButton: true,
                    tapToDismiss: true
                  }
                );
              }, 0);
            })
            </script>");
    $ci->session->unset_userdata('username');
    $ci->session->unset_userdata('role_id');
    redirect(base_url('/'));
  } else {
    if ($role_id < '12' || $role_id > '12') {
      $ci->session->set_flashdata('toastr', "
              <script>
              $(window).on('load', function() {
                setTimeout(function() {
                  toastr['error'](
                    'Silahkan Login Kembali !',
                    'Sesi Habis !', {
                      closeButton: true,
                      tapToDismiss: true
                    }
                  );
                }, 0);
              })
              </script>");
      $ci->session->unset_userdata('username');
      $ci->session->unset_userdata('role_id');
      redirect(base_url('/'));
    }
  }
}

// Check Admin
function is_admin()
{
  $ci = get_instance();
  $role_id_1 = $ci->session->userdata('role_id_1');
  $role_id_2 = $ci->session->userdata('role_id_2');
  if ($role_id_1 == '1' || $role_id_2 == '1') {
    return true;
  } else {
    return false;
  }
}

function is_logged_in_as_admin()
{
  $ci = get_instance();
  if (!is_admin()) {
    $ci->session->set_flashdata('toastr', "
            <script>
            $(window).on('load', function() {
              setTimeout(function() {
                toastr['error'](
                  'Anda tidak memiliki hak akses !',
                  'Akses ditolak !', {
                    closeButton: true,
                    tapToDismiss: true
                  }
                );
              }, 0);
            })
            </script>");
    redirect(base_url('gtk/dashboard'));
  }
}

// Nama Inisial
function namaInisial($namaLengkap)
{
  $words = array($namaLengkap);
  $initials = implode('/', array_map(function ($name) {
    preg_match_all('/\b\w/', $name, $matches);
    return implode('', $matches[0]);
  }, $words));
  $initials = strtoupper($initials);
  return $initials;
}

// Nama Peran
function getPeran($role_id)
{
  $ci = get_instance();
  return $ci->db->get_where('user_role', ['id' => $role_id])->row('role');
}

// Warna Peran
function warnaPeran($role)
{
  if ($role == "Admin") {
    $color = "primary";
  } elseif ($role == "Operator") {
    $color = "info";
  } elseif ($role == "Kepala Sekolah") {
    $color = "danger";
  } elseif ($role == "Tenaga Administrasi") {
    $color = "warning";
  } elseif ($role == "Guru") {
    $color = "success";
  } elseif ($role == "Walikelas") {
    $color = "success";
  } elseif ($role == "Pelatih Ekstrakurikuler") {
    $color = "success";
  } elseif ($role == "Pengelola Koperasi") {
    $color = "warning";
  } elseif ($role == "Pegawai Koperasi") {
    $color = "success";
  } elseif ($role == "Pendaftar Kolektif") {
    $color = "warning";
  } elseif ($role == "Calon Peserta Didik") {
    $color = "danger";
  } elseif ($role == "Peserta Didik") {
    $color = "success";
  } elseif ($role == "Alumni") {
    $color = "secondary";
  } else {
    $color = "primary";
  }
  return $color;
}

// Ikon Peran
function iconPeran($role)
{
  if ($role == "Admin") {
    $icon = "star";
  } elseif ($role == "Operator") {
    $icon = "star";
  } elseif ($role == "Kepala Sekolah") {
    $icon = "user";
  } elseif ($role == "Tenaga Administrasi") {
    $icon = "users";
  } elseif ($role == "Guru") {
    $icon = "users";
  } elseif ($role == "Walikelas") {
    $icon = "users";
  } elseif ($role == "Pelatih Ekstrakurikuler") {
    $icon = "users";
  } elseif ($role == "Pengelola Koperasi") {
    $icon = "users";
  } elseif ($role == "Pegawai Koperasi") {
    $icon = "users";
  } elseif ($role == "Pendaftar Kolektif") {
    $icon = "users";
  } elseif ($role == "Calon Peserta Didik") {
    $icon = "user";
  } elseif ($role == "Peserta Didik") {
    $icon = "user";
  } elseif ($role == "Alumni") {
    $icon = "user";
  } else {
    $icon = "user";
  }
  return $icon;
}

// Jenis Kelamin
function jenisKelamin($jk)
{
  if ($jk == "L") {
    $jkPanjang = "Laki - Laki";
  } else {
    $jkPanjang = "Perempuan";
  }

  return $jkPanjang;
}

// Jenis Kelamin GTK
function panggilJenisKelaminGTK($jk)
{
  if ($jk == "L") {
    $jkPanggil = "Pak";
  } else {
    $jkPanggil = "Bu";
  }

  return $jkPanggil;
}

// Jenis Kelamin PD
function panggilJenisKelaminPD($jk)
{
  if ($jk == "L") {
    $jkPanggil = "Bapak";
  } else {
    $jkPanggil = "Ibu";
  }

  return $jkPanggil;
}

# DB HELPER

// READ HELPER
function getSelect($table, $select, $order, $urut)
{
  $ci = get_instance();
  $ci->db->from($table);
  $ci->db->select($select);
  $ci->db->order_by($order, $urut);

  return $ci->db->get();
}

function getWhere($table, $select, $where)
{
  $ci = get_instance();
  $ci->db->from($table);
  $ci->db->select($select);
  $ci->db->where($where);

  return $ci->db->get();
}

function getWhereOrder($table, $select, $where, $order, $urut)
{
  $ci = get_instance();
  $ci->db->from($table);
  $ci->db->select($select);
  $ci->db->where($where);
  $ci->db->order_by($order, $urut);

  return $ci->db->get();
}

// User GTK
function getUserGTK()
{
  $ci = get_instance();
  return $ci->db->get_where('user_gtk', ['role_id_1' <= '10' || 'role_id_2' <= '10']);
}

// Profil GTK
function getProfilGTK($username)
{
  $ci = get_instance();
  return $ci->db->get_where('profil_gtk', ['username' => $username])->row_array();
}

//User pd
function getUserPD()
{
  $ci = get_instance();
  return $ci->db->get_where('user_pd', ['role_id' => '12']);
}

// Profil PD
function getProfilPdFromTapel($username, $tapelAktif)
{
  $ci = get_instance();
  return $ci->db->get_where('profil_pd', ['nisn' => $username, 'id_tapel' => $tapelAktif])->row_array();
}

// Check Add-On PPDB
function is_ppdb_installed()
{
  return file_exists(APPPATH . "views/gtk/ppdb/dashboard.php");
}

function is_ppdb_active()
{
  $ci = get_instance();
  $ci->load->model('App_model');
  $checkModul = $ci->App_model->getServerSetting('modulPPDB');
  $checkModul = $checkModul['modulPPDB'];
  if ($checkModul != 1) {
    $ci->session->set_flashdata('toastr', "
            <script>
            $(window).on('load', function() {
              setTimeout(function() {
                toastr['error'](
                  'Layanan PPDB Tidak Aktif !',
                  'Akses Ditolak !', {
                    closeButton: true,
                    tapToDismiss: true
                  }
                );
              }, 0);
            })
            </script>");
    redirect(base_url('gtk/dashboard'));
  }
}
