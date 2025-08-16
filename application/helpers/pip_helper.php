<?php
defined('BASEPATH') or exit('No direct script access allowed');

function is_pip_active()
{
  $ci = get_instance();
  $ci->load->model('PIP_Model');
  $checkModul = $ci->PIP_Model->getActiveTapel();
  $checkModul = $checkModul['is_active'];
  if ($checkModul != 1) {
    $ci->session->set_flashdata('toastr', "
            <script>
            $(window).on('load', function() {
              setTimeout(function() {
                toastr['error'](
                  'Layanan PIP Tidak Aktif !',
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
  return $checkModul;
}

function is_pip_exist($tapel)
{
  $ci = get_instance();
  $ci->load->model('PIP_Model');
  $checkData = $ci->PIP_Model->getPersuratan($tapel);
  if ($checkData->num_rows() <= 0) {
    $ci->session->set_flashdata('toastr', "
            <script>
            $(window).on('load', function() {
              setTimeout(function() {
                toastr['error'](
                  'Layanan PIP Tidak Ditemukan !',
                  'Akses Ditolak !', {
                    closeButton: true,
                    tapToDismiss: true
                  }
                );
              }, 0);
            })
            </script>");
    redirect(base_url('LayananPIP/settings'));
  }
  return $checkData;
}

function getPanitia($tapel)
{
  $ci = get_instance();
  return $ci->db->get_where('pip_panitia', ['tapel' => $tapel]);
}

function getEncodeURLParam($tapel)
{
  $base_64      = base64_encode($tapel);
  $url_param    = rtrim($base_64, '=');
  return $url_param;
}

function getDecodeURLParam()
{
  $ci         = get_instance();
  $url_param  = $ci->uri->segment('3');
  $base_64    = $url_param . str_repeat('=', strlen($url_param) % 4);
  $tapel      = base64_decode($base_64);
  return $tapel;
}

// Nama Peran
function getPeranPIP($role_id)
{
  $ci = get_instance();
  return $ci->db->get_where('pip_role', ['id' => $role_id])->row('role');
}
