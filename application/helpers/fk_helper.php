<?php
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
      redirect(base_url('/'));
    }
  }
}
