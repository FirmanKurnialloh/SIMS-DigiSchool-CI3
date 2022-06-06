<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
  $sesi = $ci->session->userdata('role_id');
  if (!$sesi) {
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
    if ($sesi > '6') {
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

function is_logged_in_as_pd()
{
  $ci = get_instance();
  $sesi = $ci->session->userdata('role_id');
  if (!$sesi) {
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
    if ($sesi < '7' || $sesi > '7') {
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
function is_logged_in_as_admin()
{
  $ci = get_instance();
  $sesi = $ci->session->userdata('role_id');
  if ($sesi && $sesi != '1') {
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

// Check Add-On PPDB
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
