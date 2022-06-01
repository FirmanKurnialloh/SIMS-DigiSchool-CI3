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
